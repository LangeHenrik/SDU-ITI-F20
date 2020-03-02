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

function checkLoggedIn(responseObject) {
        if(!responseObject.ok){
            window.location = "../views/login.html";
        }
}


const topNavBar = {
    dashboard: document.getElementById('dashboard'),
    upload: document.getElementById('upload'),
    users: document.getElementById('users'),
};

topNavBar.dashboard.addEventListener('click',()=>{

    //Clear contents from main content div
    document.getElementById('main_content').innerHTML = "";

    //Change active tab
    topNavBar.dashboard.className = "active";
    topNavBar.upload.className = "";
    topNavBar.users.className = "";


});

topNavBar.upload.addEventListener('click',()=>{

    //Clear contents from main content div
    document.getElementById('main_content').innerHTML = "";

    //Change active tab
    topNavBar.dashboard.className = "";
    topNavBar.upload.className = "active";
    topNavBar.users.className = "";

    //Create form to upload image
    var mainContent = document.getElementById('main_content');
    var form = document.createElement("form");


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
    file.setAttribute('name','file');


    var uploadButton = document.createElement("input");
    uploadButton.setAttribute('type',"button");
    uploadButton.setAttribute('id',"upload_image");
    uploadButton.setAttribute('value',"Upload Image");



    form.appendChild(labelHeader);
    form.appendChild(header);
    form.appendChild(labelDescription);
    form.appendChild(description);
    form.appendChild(file);
    form.appendChild(uploadButton);

    mainContent.appendChild(form);

});

topNavBar.users.addEventListener('click', () => {

    //Clear contents from main content div
    document.getElementById('main_content').innerHTML = "";

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

//Used DOM Event Delegation because the button is dynamically created
document.addEventListener('click',function(e){
    if(e.target && e.target.id === 'upload_image'){

        const uploadForm = {
            imageHeader: document.getElementById('header'),
            imageDescription: document.getElementById('description'),
            selectImage: document.getElementById('file'),
            uploadImage: document.getElementById('upload_image')
        };

        var request = new XMLHttpRequest();
        var requestData = `imageHeader=${uploadForm.imageHeader.value}&imageDescription=${uploadForm.imageDescription.value}&image=${uploadForm.selectImage["files"][0]}`;

        request.onload = () => {
            let responseObject = null;

            try {
                responseObject = JSON.parse(request.responseText);
            } catch (e) {
                console.error('Could not parse JSON');
            }

            if (responseObject) {
                handleUploadImageResponse(responseObject);
            }
        };

        request.open("post", "../php/uploadImage.php", true);
        request.send(requestData);
    }
});

function handleGetUsersResponse(responseObject) {
    if (responseObject.ok) {
        var mainContent = document.getElementById('main_content');
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
        responseObject.messages.forEach((message) => {
            console.log(message);
        });
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