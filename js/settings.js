$(document).ready(function() {
    $('#profile').click(function(){
        $('#profile-settings').show();
        $('#account-settings').hide();
        $('#theme-settings').hide();
        // $('#profile-settings').hide();
    });
    $('#password').click(function(){
        $('#profile-settings').hide();
        $('#account-settings').show();
        $('#theme-settings').hide();
        // $('#profile-settings').hide();
    });
    $('#appearance').click(function(){
        $('#profile-settings').hide();
        $('#account-settings').hide();
        $('#theme-settings').show();
        // $('#profile-settings').hide();
    });

    $('#theme-form input').ready(function() {
        console.log($('input[name=theme]:checked').val());
        if ($('input[name=theme]:checked').val() == 'light') {
            $('#light-theme').addClass('light-theme-outline-selected');
            $('#dark-theme').removeClass('light-theme-outline-selected');
        } else {
            $('#light-theme').removeClass('light-theme-outline-selected');
            $('#dark-theme').addClass('light-theme-outline-selected');
        }
    });
    
    $('#theme-form input').click(function() {
        console.log($('input[name=theme]:checked').val());
        if ($('input[name=theme]:checked').val() == 'light') {
            $('#light-theme').addClass('light-theme-outline-selected');
            $('#dark-theme').removeClass('light-theme-outline-selected');
        } else {
            $('#light-theme').removeClass('light-theme-outline-selected');
            $('#dark-theme').addClass('light-theme-outline-selected');
        }
    });
    
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