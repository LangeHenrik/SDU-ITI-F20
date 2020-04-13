
var pictureContainers = document.getElementsByClassName('picturecontainer card');
var inputPicid = document.getElementById('inputPicid');
var latestChatId = 0;

// Load chat when CommentModal displays 
for (let i = 0; i < pictureContainers.length; i++) {
    pictureContainers[i].onclick = function() { 
        updateModalPicturecard(this);
        fetchModalChat(this.id);
        // Set picid for posting
        inputPicid.value = this.id;
        // Display modal
        $('#modalCommentImage').modal();
    };
}
        // Show right image content.
function updateModalPicturecard(obj) {
    var commentImg = document.getElementById('commentImg');
    var commentImgTitle = document.getElementById('commentImgTitle')
    var commentImgDescription = document.getElementById('commentImgDescription');
    var commentImgAuther = document.getElementById('commentImgAuther');
    var commentImgDate = document.getElementById('commentImgDate');
    commentImg.src = obj.firstElementChild.src;
    commentImgTitle.innerHTML = obj.getElementsByTagName('h5')[0].innerHTML;
    commentImgDescription.innerHTML = obj.getElementsByTagName('p')[0].innerHTML;
    commentImgAuther.innerHTML = obj.getElementsByTagName('small')[0].innerHTML;
    commentImgDate.innerHTML = obj.getElementsByTagName('small')[1].innerHTML;
}
        // Fetch right chat content.
async function fetchModalChat(picid) {
    let formData = new FormData();
    formData.append("picid", picid);

    fetch('/Mschr18-Phans18-Mach018/mvc/public/chat/getChat', {
        method: 'POST',
        body: formData
    })
    .then(response => { return response.json() })
    .then(chatCollection => {
        var modalBody = $('#modalCommentImage')[0].getElementsByClassName('modal-body')[0];
            // Clearing modal body
        while (modalBody.lastChild) {
            modalBody.removeChild(modalBody.lastChild);
        }
            // Inserting new chat elements
        for (let i = 0; i < chatCollection.length; i++) {
            insertNewChat(chatCollection[i]);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function insertNewChat(chatObj) {
    // If we are updating with latest chat id put it in.
    if (latestChatId < parseInt(chatObj['chatid'])) {
        latestChatId = parseInt(chatObj['chatid']);
    
        var modalBody = $('#modalCommentImage')[0].getElementsByClassName('modal-body')[0];

        var divMediaBody = document.createElement('div');   divMediaBody.className = 'media-body msg';
        var smallTime = document.createElement('small');    smallTime.className = 'pull-right time';    
        var iClock = document.createElement('i');           iClock.className = 'fa fa-clock-o';       
        var h5Heading = document.createElement('h5');       h5Heading.className = 'media-heading';      
        var smallComment = document.createElement('small'); smallComment.className = 'col-sm-11';       
        
        smallTime.innerHTML = chatObj['timestamp'] + ' ';
        h5Heading.innerHTML = chatObj['username'];
        smallComment.innerHTML = chatObj['comment'];

        modalBody.appendChild(divMediaBody);
        divMediaBody.appendChild(smallTime);
        smallTime.appendChild(iClock);
        divMediaBody.appendChild(h5Heading);
        divMediaBody.appendChild(smallComment);
    }
    // else dont insert anything
}

var inputComment = document.getElementById('inputComment');
var commentPost = document.getElementById('commentPost');
// Post comment

commentPost.onclick = function() {
    let formData = new FormData();
    formData.append("picid", inputPicid.value);
    formData.append("comment", inputComment.value);
    inputComment.value = '';

    fetch('/Mschr18-Phans18-Mach018/mvc/public/chat/postChat', {
        method: 'POST',
        body: formData
    })
    .then(response => { return response.text() })
    .then(data => { 
        if(data == 1) {
            // console.log('success, data was 1!')
            updateChat();
        } 
        else {
            console.error('Post comment returned false');
        } 
    })
    .catch((error) => {
        console.error('Error:', error);
    });
};



// Automatically update chat 
var timer;
$("#modalCommentImage").on('shown.bs.modal', function(){ // used to be 'show.bs.modal'
    clearInterval(timer);
    timer = setInterval( updateChat, 1000 );

    scrollToBottomOfModal();
});
$("#modalCommentImage").on('hide.bs.modal', function(){
    clearInterval(timer);
    latestChatId = 0;
});

function updateChat() {
    let formData = new FormData();
    formData.append("picid", inputPicid.value);
    formData.append("chatid", latestChatId);

    fetch('/Mschr18-Phans18-Mach018/mvc/public/chat/updateChat', {
        method: 'POST',
        body: formData
    })
    .then(response => { return response.json() })
    .then(newChat => {
        var modalBody = $('#modalCommentImage')[0].getElementsByClassName('modal-body')[0];
            // Inserting new chat elements
        for (let i = 0; i < newChat.length; i++) {
            insertNewChat(newChat[i]);
        }
        scrollToBottomOfModal();
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

function scrollToBottomOfModal() {
    // Scroll into view
    var modalBody = $('#modalCommentImage')[0].getElementsByClassName('modal-body')[0];
    if (modalBody.clientHeight < modalBody.scrollHeight) {
        modalBody.scrollTop = modalBody.scrollHeight;
    }
}

