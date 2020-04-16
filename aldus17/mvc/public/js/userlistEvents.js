$(document).ready(function() {
    var $this;
    var loadingText;
    getUserlist();
    $('#getUserlistbtn').on('click', function() {
        getUserlist();
    });
});

$(document).ajaxSend(function(event, request, settings) {
    $('.bs-example').show();
});

$(document).ajaxComplete(function(event, request, settings) {
    $('.bs-example').hide();
});

function getUserlist() {
    $.ajax({

        url: "/aldus17/mvc/public/api/users",
        type: "GET",
        async: true,
        success: function(data) {

            console.log(data);
            var data = jQuery.parseJSON(JSON.stringify(data));
            console.log(data);

            var html = "";

            for (var a = 0; a < data.length; a++) {
                console.log(data[a]['user_id']);
                console.log(data[a]['username']);
                var userID = data[a]['user_id'];
                var username = data[a]['username'];

                html += "<tr>";
                html += "<td>" + userID + "</td>";
                html += "<td>" + username + "</td>";
                html += "</tr>";
            }
            $(".userlistdata").html(html);
        },
        error: function(response) {

        }
    });

}