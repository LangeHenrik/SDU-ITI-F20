
// WARNING

// this script should not be loaded using blocking (i.e. putting in in the middle of the HTML)
// instead please load this script as <script src="js/script.js" defer></script> within the <head>
// https://stackoverflow.com/questions/436411/where-should-i-put-script-tags-in-html-markup/24070373#24070373


// page naviation /////////////////////////////////////////////////////////////////////////////////

function updateUI(is_logged_in) {

  if (is_logged_in) {

    // show navigation (logged in)
    document.querySelector(`nav a[href="#feed"]`).style.display = "";
    document.querySelector(`nav a[href="#users"]`).style.display = "";
    document.querySelector(`nav a[href="#login"]`).innerHTML = "Logout";

  } else {

    // hide navigation (not logged in)
    document.querySelector(`nav a[href="#feed"]`).style.display = "none";
    document.querySelector(`nav a[href="#users"]`).style.display = "none";
    document.querySelector(`nav a[href="#login"]`).innerHTML = "Login / Register";

  }

}

async function loadContent(hash) {

  // extract url from hash
  const url = hash.substr(1);

  // check for user session
  const is_logged_in = await checkLogin();

  // update UI
  updateUI(is_logged_in);

  // login/register module
  if (hash.includes("login") && !is_logged_in) {
    showEntryForm();
    return;
  }

  // logout module
  if (hash.includes("login") && is_logged_in) {
    logout();
    return;
  }

  // login-check for private pages
  if (!is_logged_in && hash !== "#home") {
    alert("Please login to access this page.");
    window.location.hash = "#home";
    return;
  }

  // close all dialogs
  hideEntryForm();

  // update page (nav + content) based on hash
  document.querySelectorAll("nav a")
    .forEach( (e) => { e.setAttribute("data-state", "") });

  document.querySelector(`nav a[href="${hash}"]`).setAttribute("data-state", "selected");
  document.querySelector("div#entry-container").setAttribute("data-state", "closed");

  fetch(`/pages/${url}.php`)
  .then(function(response)
  {
    return response.text();
  })
  .then(function(body)
  {
    // document.querySelector("section#content").innerHTML = body;
    setInnerHTML(document.querySelector("section#content"), body);
    // document.querySelector("section#content").innerHTML = body;
  });

}

window.onhashchange = (e) => {

  loadContent(location.hash);

};

window.onload = (e) => {

  const hash = location.hash;

  if (!hash) {
    window.location.hash = "#home";
    return;
  }

  loadContent(hash);

}

// login  /////////////////////////////////////////////////////////////////////////////////////////

// login check
async function checkLogin() {

  const response = await fetch("/php/check_login.php", { method: "POST" });
  const data = await response.text();

  return Boolean(data == "success");

}

// login form function
function login(form)
{

  // using FormData
  // https://stackoverflow.com/a/59847337

  fetch("php/login.php", {

    method: "POST",
    body: new FormData(form)

  }).then(function (response) {

    return response.text();

  }).then(function (data) {

    if (data == "success")
      window.location.hash = "#home";

    else
      showEntryError();

  }).catch(function (err) {

    // failure
    showEntryError(err);

  });

  // stop page from refreshing
  return false;

};

// logout
async function logout() {

  // run server-side logout script and goto home page (invoking updateUI)
  await fetch("/php/logout.php");
  window.location.hash = "#home";

}

// register form function
function register(form) {

  fetch("php/register.php", {

    method: "POST",
    body: new FormData(form)

  }).then(function (response) {

    return response.text();

  }).then(function (data) {

    if (data === "success")
    {
      alert("Registration successful!");
      location.reload();
    }

    else
      showEntryError(data);

  }).catch(function (err) {

    // failure
    alert("There was an error submitting the form.")
    alert(err);

  });

  // stop page from refreshing
  return false;

}

// show entry error box; show default if called empty
function showEntryError(msg = "") {

  if (msg === "")
    msg = "There was an error with the login submission. Please enter valid information or just stop trying.";

  document.querySelector("div#entry-error").style.display = "block";
  document.querySelector("div#entry-error").innerHTML = msg;

}

// hide entry error box
function hideEntryError() {

  document.querySelector("div#entry-error").style.display = "";

}

// show login/register (entry) form
function showEntryForm() {

  // open container
  document.querySelector("div#entry-container").setAttribute("data-state", "open");

  // reset forms
  document.querySelectorAll("div#entry-box form")
    .forEach((e) => { e.reset(); });

  // hide error message
  hideEntryError();

}

// hide login/register (entry) form
function hideEntryForm() {

  // close container
  document.querySelector("div#entry-container").setAttribute("data-state", "closed");
  document.querySelector("div#entry-error").style.display = "";

}

// login form toggle button
document.querySelectorAll("div#entry-box div.radio-group input").forEach((e) => { e.onclick = () => {

  // extract id from event
  let id = e.id.match("-.+")[0].substring(1);

  // hide and reset all forms
  document.querySelectorAll("div#entry-box form")
    .forEach((e) => { e.style.display = "none"; e.reset(); });

  // hide error message
  hideEntryError();

  // show form from id
  document.querySelector("form#" + id).style.display = "block";
  document.querySelector("div#entry-box button[type=\"submit\"]").setAttribute("form", id);

}});

// cancel button
document.querySelector("div#entry-box button[type=\"cancel\"]").onclick = (e) => {

  // stop navigation
  e.stopPropagation();
  e.preventDefault();

  // close forms
  hideEntryForm();

  // go to previous hash
  window.history.back();

};

// feed ///////////////////////////////////////////////////////////////////////////////////////////

async function getPosts() {

  const response = await fetch("/php/get_posts.php");
  const data = await response.json();

  return data;

}

async function updateFeed() {

  let posts = await getPosts();

  // use <template> to populate posts
  // https://developer.mozilla.org/en-US/docs/Web/HTML/Element/template

  let template = document.querySelector("template#feed-post-template");
  let container = document.querySelector("div.feed-container");

  // remove all posts
  container.textContent = "";

  // iterate all posts and append to container
  posts.forEach((post) => {

    // create post DOM node
    let node = template.content.cloneNode(true);

    // fill node
    node.querySelector("div.feed-post img.feed-post-img").src = post.img;
    node.querySelector("div.feed-post p.feed-post-username").textContent = "@" + post.username;
    node.querySelector("div.feed-post p.feed-post-title").textContent = post.title;
    node.querySelector("div.feed-post p.feed-post-description").textContent = post.description;

    // append to container
    container.appendChild(node);

  });

}

// upload /////////////////////////////////////////////////////////////////////////////////////////

// show login/register (entry) form
function showUploadForm() {

  // open container
  document.querySelector("div#upload-container").setAttribute("data-state", "open");

  // reset form
  document.querySelector("div#upload-container img#preview").style.display = "none";
  document.querySelector("div#upload-container form").reset();

  // hide error message
  hideUploadError();

}

// hide login/register (upload) form
function hideUploadForm() {

  // close container
  document.querySelector("div#upload-container").setAttribute("data-state", "closed");

}

// show upload error box; show default if called empty
function showUploadError(msg = "") {

  if (msg === "")
    msg = "There was an error with the upload submission.";

  document.querySelector("div#upload-error").style.display = "block";
  document.querySelector("div#upload-error").innerHTML = msg;

}

// hide upload error box
function hideUploadError() {

  document.querySelector("div#upload-error").style.display = "";

}

function uploadPreview(input) {

  // https://developer.mozilla.org/en-US/docs/Web/API/FileReader/readAsDataURL

  const preview = document.querySelector("img#preview");
  const file = input.files[0];
  const reader = new FileReader();

  // hide image preview and return if no input provided
  if (!file)
  {
    preview.style.display = "none";
    return;
  }


  // convert image file to base64 string
  reader.onload = () => {

    preview.style.display = "";
    preview.src = reader.result;

  };

  // read file
  reader.readAsDataURL(file);

}

// upload form function
function upload(form) {

  // using Fetch API + JSON
  // https://stackoverflow.com/a/45370541

  // create JSON object
  let post = {
    username: "",
    title: form.title.value,
    description: form.description.value,
    img: form.img.src
  };

  // fetch server
  fetch("php/upload.php", {

    method: "POST",
    body: JSON.stringify(post)

  }).then(function (response) {

    return response.text();

  }).then(function (data) {

	if (data == "success")
	{
		hideUploadForm();
		updateFeed();
	}

    else
      showUploadError(data);

  }).catch(function (err) {

    // failure
    showUploadError(err);

  });

  // stop page from refreshing
  return false;

}

// etc ////////////////////////////////////////////////////////////////////////////////////////////

document.addEventListener("click", (e) => { if (e.target.closest("div.feed-post")) {

//   alert("");

}});

// update innerHTML + scripts
function setInnerHTML(elm, html) {

  elm.innerHTML = html;

  Array.from(elm.querySelectorAll("script")).forEach(oldScript => {

    const newScript = document.createElement("script");

    Array.from(oldScript.attributes)
      .forEach(attr => newScript.setAttribute(attr.name, attr.value));

    newScript.appendChild(document.createTextNode(oldScript.innerHTML));
    oldScript.parentNode.replaceChild(newScript, oldScript);

  });

}