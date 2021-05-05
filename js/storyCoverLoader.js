$(document).ready(function() {
    $('#upload').change(function(){
        read(this);
    })
});

function read(input) {
    if(input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(data) {
            $("#preview-img").attr('src', data.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}