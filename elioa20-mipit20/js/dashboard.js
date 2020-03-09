var request = new XMLHttpRequest();

request.onload = () => {
    let responseObject = null;

    try {
        responseObject = JSON.parse(request.responseText);
    } catch (e) {
        console.error('Could not parse JSON');
    }

    if (responseObject) {
        checkLoggedIn(responseObject);
    }
};

request.open("get", "../php/index.php", true);
request.send();

const topNavBar = {
    dashboard: document.getElementById('dashboard'),
    upload: document.getElementById('upload'),
    users: document.getElementById('users'),
    logout: document.getElementById('logout')
};

function checkLoggedIn(responseObject) {
        if(!responseObject.ok){
            window.location = "../views/login.html";
        }
}

topNavBar.dashboard.addEventListener('click',()=>{

    //Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.dashboard.className = "active";
    topNavBar.upload.className = "";
    topNavBar.users.className = "";

});

topNavBar.upload.addEventListener('click',()=>{

    //Clear contents from main content div
    document.getElementsByClassName('main_content')[0].innerHTML = "";

    //Change active tab
    topNavBar.dashboard.className = "";
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
    topNavBar.dashboard.className = "";
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

    if(!responseObject.ok) {

        let messagesList = document.getElementById('messages');
        //In case they were errors before. Need to clear the list.
        while(messagesList.firstChild){
            messagesList.removeChild(messagesList.firstChild);
        }

        responseObject.messages.forEach((message) => {
            var li = document.createElement('li');
            li.textContent = message;
            messagesList.appendChild(li);
        });

        messagesList.display = 'block';
    }
}


document.getElementById("link_dashboard").onclick = function () {
    return false;
};

document.getElementById("link_upload").onclick = function () {
    return false;
};

document.getElementById("link_users").onclick = function () {
    return false;
};