
var pictureContainers = document.getElementsByClassName('picturecontainer card');
var inputPicid = document.getElementById('inputPicid');
var latestChatTimestamp;

// Load chat when CommentModal displays
{ 
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
            while (modalBody.lastChild) {
                modalBody.removeChild(modalBody.lastChild);
            }

            for (let i = 0; i < chatCollection.length; i++) {
                var divMediaBody = document.createElement('div');   divMediaBody.className = 'media-body msg';
                var smallTime = document.createElement('small');    smallTime.className = 'pull-right time';    
                var iClock = document.createElement('i');           iClock.className = 'fa fa-clock-o';       
                var h5Heading = document.createElement('h5');       h5Heading.className = 'media-heading';      
                var smallComment = document.createElement('small'); smallComment.className = 'col-sm-11';       
                
                smallTime.innerHTML = chatCollection[i]['timestamp'] + ' ';
                h5Heading.innerHTML = chatCollection[i]['username'];
                smallComment.innerHTML = chatCollection[i]['comment'];

                modalBody.appendChild(divMediaBody);
                divMediaBody.appendChild(smallTime);
                smallTime.appendChild(iClock);
                divMediaBody.appendChild(h5Heading);
                divMediaBody.appendChild(smallComment);

                // Updating latest chatTimestamp
                if (latestChatTimestamp < chatCollection[i]['timestamp']) {
                    latestChatTimestamp = chatCollection[i]['timestamp'];
                    console.log(latestChatTimestamp + " < " + chatCollection[i]['timestamp']);
                }
                latestChatTimestamp = chatCollection[i]['timestamp'];
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
}

var inputComment = document.getElementById('inputComment');
var commentPost = document.getElementById('commentPost');
// Post comment

commentPost.onclick = function() {
    let formData = new FormData();
    formData.append("picid", inputPicid.value);
    formData.append("comment", inputComment.value);

    fetch('/Mschr18-Phans18-Mach018/mvc/public/chat/postChat', {
        method: 'POST',
        body: formData
    })
    .then(response => { if(response.ok) console.log('Post Successful!'); return response.text() })
    .then(data => { if(data == 1) console.log('success, data was 1!') })
    .catch((error) => {
        console.error('Error:', error);
    });
};


// Automatically update chat 
var timer;
$("#modalCommentImage").on('show.bs.modal', function(){
    clearInterval(timer);
    timer = setInterval( updateChat, 1000 );
});
$("#modalCommentImage").on('hide.bs.modal', function(){
    clearInterval(timer);
});

function updateChat() {
    console.log('time');
}

