const topNavBar = {
    feed: document.getElementById('feed'),
    upload: document.getElementById('upload'),
    users: document.getElementById('users'),
    logout: document.getElementById('logout')
};

if (topNavBar.feed.className === "active") {
    var mainContent = document.getElementsByClassName('main_content')[0];
    mainContent.innerHTML = "";

    let divContainer = document.createElement('div');
    divContainer.setAttribute('class', 'container');

    ajaxCallGetImages(mainContent, divContainer);

}

$("#feed").click(function () {
    //Clear contents from main content div
    var mainContent = document.getElementsByClassName('main_content')[0];
    mainContent.innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "active";
    topNavBar.upload.className = "";
    topNavBar.users.className = "";

    let divContainer = document.createElement('div');
    divContainer.setAttribute('class', 'container');

    ajaxCallGetImages(mainContent, divContainer);
});

$("#upload").click(function () {
//Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "";
    topNavBar.upload.className = "active";
    topNavBar.users.className = "";

    //Create form to upload image
    var mainContent = document.getElementsByClassName('main_content')[0];

    var displayMessages = document.createElement('ul');
    displayMessages.setAttribute('id', 'messages');

    var form = createImageUploadForm();

    mainContent.appendChild(displayMessages);
    mainContent.appendChild(form);
});

function handleGetImagesResponse(responseObject, mainContent, divContainer) {

    if (responseObject.messages !== null) {
        responseObject.messages.forEach((image) => {

            let divPic = document.createElement('div');
            divPic.setAttribute('class', 'card');
            divPic.setAttribute('style','width: 18rem;');

            let cardBody = document.createElement('div');
            cardBody.setAttribute('class','cared-body');


            let cardName = document.createElement('h3');
            cardName.innerText=image.header;

            let cardBodyUsername = document.createElement('p');
            cardBodyUsername.innerText="Username: " + image.username + " Uploaded Time: " + image.uploadTime;

            cardBody.appendChild(cardName);
            cardBody.appendChild(cardBodyUsername);



            // let divTitle = document.createElement('div');
            // divTitle.setAttribute('class', 'title');
            // divTitle.innerText = image.header + " Username: " + image.username + " Uploaded Time: " + image.uploadTime;

            let img = document.createElement('img');
            img.setAttribute('src', image.image_blob);
            img.setAttribute('class','card-img-top');


            let divDescription = document.createElement('div');
            divDescription.setAttribute('class', 'desc');
            divDescription.innerText = image.description;

            // divPic.appendChild(divTitle);
            divPic.appendChild(img);
            divPic.appendChild(cardBody);
            divPic.appendChild(divDescription);

            divContainer.appendChild(divPic);
        });

        mainContent.appendChild(divContainer);
    }
}

$("#users").click(function () {
    //Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.feed.className = "";
    topNavBar.upload.className = "";
    topNavBar.users.className = "active";

    ajaxCallGetUsers();
});

$("#logout").click(function () {
    var requestLogOut = $.ajax({
        type: "POST",
        url: "/elioa20/mvc/public/home/logout",
    });
    requestLogOut.done(function () {
        document.location = "/elioa20/mvc/public/home/index";
    });
    requestLogOut.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
})

//Used DOM Event Delegation because the button is dynamically created
document.addEventListener('click', function (e) {
    if (e.target && e.target.id === 'upload_image') {
        ajaxCallUploadImage();
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
                let cellUserID = row.insertCell();
                let cellUsername = row.insertCell();
                let userID = document.createTextNode(message.user_id);
                cellUserID.appendChild(userID);
                let username = document.createTextNode(message.username);
                cellUsername.appendChild(username);
            }
        );

        mainContent.appendChild(userTable);
    }
}

function handleUploadImageResponse(responseObject) {
    let messagesList = document.getElementById('messages');
    //In case they were errors before. Need to clear the list.
    while (messagesList.firstChild) {
        messagesList.removeChild(messagesList.firstChild);
    }

    if (responseObject.ok) {
        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            messagesList.appendChild(li);
        });

        messagesList.display = 'block';
    }

    if (!responseObject.ok) {
        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            messagesList.appendChild(li);
        });

        messagesList.display = 'block';
    }
}



function ajaxCallGetImages(mainContent, divContainer) {
    //JQuery AJAX call to get images
    var requestImages = $.ajax({
        type: "GET",
        url: "/elioa20/mvc/public/home/feed",
        dataType: "json"
    });
    requestImages.done(function (response) {
        handleGetImagesResponse(response, mainContent, divContainer);
    });
    requestImages.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

function createImageUploadForm() {
    var form = document.createElement("form");

    form.setAttribute('id', 'upload-form');
    form.setAttribute('method', "post");
    form.setAttribute('enctype', "multipart/form-data");

    var labelHeader = document.createElement('label');
    labelHeader.setAttribute("for", 'header');
    labelHeader.innerHTML = "Image Header";

    var header = document.createElement("input"); //input element, text
    header.setAttribute('type', "text");
    header.setAttribute('name', "header");
    header.setAttribute('id', "header");

    var labelDescription = document.createElement('label');
    labelDescription.setAttribute("for", 'description');
    labelDescription.innerHTML = "Image Description";


    var description = document.createElement("input"); //input element, text
    description.setAttribute('type', "text");
    description.setAttribute('name', "description");
    description.setAttribute('id', "description");

    var file = document.createElement("input");
    file.setAttribute('type', 'file');
    file.setAttribute('id', 'file');

    var uploadButton = document.createElement("input");
    uploadButton.setAttribute('type', "button");
    uploadButton.setAttribute('id', "upload_image");
    uploadButton.setAttribute('id', "upload_image");
    uploadButton.setAttribute('value', "Upload Image");


    form.appendChild(labelHeader);
    form.appendChild(header);
    form.appendChild(labelDescription);
    form.appendChild(description);
    form.appendChild(file);
    form.appendChild(uploadButton);

    return form;
}

function ajaxCallGetUsers(){
    //JQuery AJAX call to get users
    var requestUsers = $.ajax({
        type: "GET",
        url: "/elioa20/mvc/public/home/users",
        dataType: "json"
    });
    requestUsers.done(function (response) {
        handleGetUsersResponse(response);
    });
    requestUsers.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}

function ajaxCallUploadImage(){
    var form = document.getElementById('upload-form');
    var formData = new FormData(form);

    var inputFile = document.getElementById('file');
    formData.append('file', inputFile.files[0]);

    var requestUploadImage = $.ajax({
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        url: "/elioa20/mvc/public/api/uploadImage",
        dataType: "json",
    });
    requestUploadImage.done(function (response) {
        handleUploadImageResponse(response);
    });
    requestUploadImage.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
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