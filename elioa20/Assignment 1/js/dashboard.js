var login = new XMLHttpRequest();

login.onload = () => {
    let responseObject = null;

    try {
        responseObject = JSON.parse(login.responseText);
    } catch (e) {
        console.error('Could not parse JSON');
    }

    if (responseObject) {
        checkLoggedIn(responseObject);
    }
};

login.open("get", "../php/index.php", true);
login.send();

function checkLoggedIn(responseObject) {
    if(!responseObject.ok){
        window.location = "../views/login.html";
    }
}

const topNavBar = {
    feed: document.getElementById('feed'),
    upload: document.getElementById('upload'),
    users: document.getElementById('users'),
    logout: document.getElementById('logout')
};

if(topNavBar.feed.className === "active"){

    var mainContent = document.getElementsByClassName('main_content')[0];
    mainContent.innerHTML = "";

    let divContainer = document.createElement('div');
    divContainer.setAttribute('class','container');

    //Get images from db
    var request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;

        try {
            responseObject = JSON.parse(request.responseText);
        } catch (e) {
            console.error('Could not parse JSON');
        }

        if (responseObject) {
            handleGetImagesResponse(responseObject,mainContent,divContainer);
        }
    };

    request.open("get", "../php/getImages.php", true);
    request.send();
}

topNavBar.feed.addEventListener('click',()=>{

    //Clear contents from main content div
    var mainContent = document.getElementsByClassName('main_content')[0];
    mainContent.innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "active";
    topNavBar.upload.className = "";
    topNavBar.users.className = "";

    let divContainer = document.createElement('div');
    divContainer.setAttribute('class','container');

    //Get images from db
    var request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;

        try {
            responseObject = JSON.parse(request.responseText);
        } catch (e) {
            console.error('Could not parse JSON');
        }

        if (responseObject) {
            handleGetImagesResponse(responseObject,mainContent,divContainer);
        }
    };

    request.open("get", "../php/getImages.php", true);
    request.send();

});

topNavBar.upload.addEventListener('click',()=>{

    //Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "";
    topNavBar.upload.className = "active";
    topNavBar.users.className = "";


    //Create form to upload image
    var mainContent = document.getElementsByClassName('main_content')[0];

    var displayMessages = document.createElement('ul');
    displayMessages.setAttribute('id','messages');


    var form = document.createElement("form");

    form.setAttribute('id','upload-form');
    form.setAttribute('method',"post");
    form.setAttribute('enctype',"multipart/form-data");

    var labelHeader = document.createElement('label');
    labelHeader.setAttribute("for",'header');
    labelHeader.innerHTML = "Image Header";

    var header = document.createElement("input"); //input element, text
    header.setAttribute('type',"text");
    header.setAttribute('name',"header");
    header.setAttribute('id',"header");

    var labelDescription = document.createElement('label');
    labelDescription.setAttribute("for",'description');
    labelDescription.innerHTML = "Image Description";


    var description = document.createElement("input"); //input element, text
    description.setAttribute('type',"text");
    description.setAttribute('name',"description");
    description.setAttribute('id',"description");

    var file = document.createElement("input");
    file.setAttribute('type','file');
    file.setAttribute('id','file');

    var uploadButton = document.createElement("input");
    uploadButton.setAttribute('type',"button");
    uploadButton.setAttribute('id',"upload_image");
    uploadButton.setAttribute('id',"upload_image");
    uploadButton.setAttribute('value',"Upload Image");



    form.appendChild(labelHeader);
    form.appendChild(header);
    form.appendChild(labelDescription);
    form.appendChild(description);
    form.appendChild(file);
    form.appendChild(uploadButton);

    mainContent.appendChild(displayMessages);
    mainContent.appendChild(form);

});

topNavBar.users.addEventListener('click', () => {

    //Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "";
    topNavBar.upload.className = "";
    topNavBar.users.className = "active";

    var request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;

        try {
            responseObject = JSON.parse(request.responseText);
        } catch (e) {
            console.error('Could not parse JSON');
        }

        if (responseObject) {
            handleGetUsersResponse(responseObject);
        }
    };

    request.open("get", "../php/users.php", true);
    request.send();

});

topNavBar.logout.addEventListener('click',()=>{

    var request = new XMLHttpRequest();

    request.onload = () => {
        let responseObject = null;

        try {
            responseObject = JSON.parse(request.responseText);
        } catch (e) {
            console.error('Could not parse JSON');
        }

        if (responseObject) {
            window.location = "../views/login.html";
        }
    };

    request.open("post", "../php/logout.php", true);
    request.send();

});

//Used DOM Event Delegation because the button is dynamically created
document.addEventListener('click',function(e){
    if(e.target && e.target.id === 'upload_image'){
        var request = new XMLHttpRequest();

        var form = document.getElementById('upload-form');
        var formData = new FormData(form);

        var inputFile = document.getElementById('file');
        formData.append('file',inputFile.files[0]);


        request.onload = () => {
            let responseObject = null;

            try{
                responseObject = JSON.parse(request.responseText);
            }
            catch (e) {
                console.error('Could not parse JSON');
            }

            if(responseObject){
                handleUploadImageResponse(responseObject);
            }
        };

        request.open("post", "../php/uploadImage.php", true);
        request.send(formData);

    }
});

function handleGetUsersResponse(responseObject) {
    if (responseObject.ok) {
        var mainContent = document.getElementsByClassName('main_content')[0];
        var userTable = document.createElement("TABLE");


        //Create header
        let thead = userTable.createTHead();
        let row = thead.insertRow();
        let th = document.createElement("th");
        let text = document.createTextNode('Users');
        th.appendChild(text);
        row.appendChild(th);

        responseObject.messages.forEach((message) => {
                let row = userTable.insertRow();
                let cell = row.insertCell();
                let text = document.createTextNode(message);
                cell.appendChild(text);
            }
        );

        mainContent.appendChild(userTable);
    }
}


function handleUploadImageResponse(responseObject) {

    let messagesList = document.getElementById('messages');
    //In case they were errors before. Need to clear the list.
    while(messagesList.firstChild){
        messagesList.removeChild(messagesList.firstChild);
    }

    if(!responseObject.ok) {
        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            messagesList.appendChild(li);
        });

        messagesList.display = 'block';
    }
}


function handleGetImagesResponse(responseObject,mainContent,divContainer){

    if(responseObject.messages !== null) {
        responseObject.messages.forEach((image) => {

            let divPic = document.createElement('div');
            divPic.setAttribute('class', 'picture');

            let divTitle = document.createElement('div');
            divTitle.setAttribute('class', 'title');
            divTitle.innerText = image.header + " Username: " + image.username + " Uploaded Time: " + image.uploadTime;

            let img = document.createElement('img');
            img.setAttribute('src', image.path);

            let divDescription = document.createElement('div');
            divDescription.setAttribute('class', 'desc');
            divDescription.innerText = image.description;

            divPic.appendChild(divTitle);
            divPic.appendChild(img);
            divPic.appendChild(divDescription);

            divContainer.appendChild(divPic);
        });

        mainContent.appendChild(divContainer);
    }
}


document.getElementById("link_feed").onclick = function () {
    return false;
};

document.getElementById("link_upload").onclick = function () {
    return false;
};

document.getElementById("link_users").onclick = function () {
    return false;
};