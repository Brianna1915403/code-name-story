$(document).ready(function() {
    var url = "https://localhost/assignment-2/";
    $(".like").click(function() {
        var picture_id = $(this).attr("pic");        
        var user_id = $(this).attr("user");        
        var request = "PictureLike/like/" + picture_id + "/" + user_id;
        $.post(url + request, function( data, status ) {});
        console.log($(this).attr("value"));
        if ($(this).attr("value") == "Like") {
            var counter = $(this).parent().text();
            counter = "Likes: " + (parseInt(counter.substring(7)) + 1);
            $(this).parent().html(counter + "<input type='button' class='like' value='Like' pic='"+ picture_id +"' user='"+ user_id +"'>");
            $(this).attr("value", "Unlike");
        } else {
            var counter = $(this).parent().text();
            counter = "Likes: " + (parseInt(counter.substring(7)) - 1);
            $(this).parent().html(counter + "<input type='button' class='like' value='Like' pic='"+ picture_id +"' user='"+ user_id +"'>");
            $(this).attr("value", "Like");
        }   
        location.reload();     
    }); 
});