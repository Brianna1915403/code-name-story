$(document).ready(function() {
    $('#profile').click(function(){
        $('#profile-settings').show();
        $('#account-settings').hide();
        $('#theme-settings').hide();
        $('#2fa-settings').hide();
    });
    $('#password').click(function(){
        $('#profile-settings').hide();
        $('#account-settings').show();
        $('#theme-settings').hide();
        $('#2fa-settings').hide();
    });
    $('#appearance').click(function(){
        $('#profile-settings').hide();
        $('#account-settings').hide();
        $('#theme-settings').show();
        $('#2fa-settings').hide();
    });

    $('#2fa').click(function(){
        $('#profile-settings').hide();
        $('#account-settings').hide();
        $('#theme-settings').hide();
        $('#2fa-settings').show();
    });

    // FIX: The radio buttons don't get checked/unchecked
    // $('#theme-form .radio-button').click(function() {
    //     console.log($('input[name=theme]:checked').val());
    //     var radio = $('input[name=theme]:checked');
    //     var clicked = $(this).attr('id');
    //     console.log(clicked);
    //     switch(radio.val()) {
    //         case 'light': 
    //             if (clicked == 'dark-theme') {
    //                 $('#light-theme').removeClass('light-theme-outline-selected');
    //                 $('#dark-theme').addClass('light-theme-outline-selected');
    //                 $('#light-theme-radio').attr('checked', false);
    //                 $('#dark-theme-radio').attr('checked', true);
    //             } else if (clicked == 'light-theme' && $('#dark-theme').hasClass('light-theme-outline-selected')) {
    //                 $('#light-theme').addClass('light-theme-outline-selected');
    //                 $('#dark-theme').removeClass('light-theme-outline-selected');
    //                 $('#light-theme-radio').attr('checked', true);
    //                 $('#dark-theme-radio').attr('checked', false);
    //             }
    //         break;
    //         case 'dark': 
    //             if (clicked == 'light-theme') {
    //                 $('#light-theme').addClass('light-theme-outline-selected');
    //                 $('#dark-theme').removeClass('light-theme-outline-selected');
    //             }
    //         break;
    //     }
    // });
    
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