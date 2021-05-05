$(document).ready(function() {
    $('#by-tags').hover(function() {
        $('.drop-content-tags').show();
        $('.drop-content-numbers').hide();
        $('#by-tags').addClass('selected-light');
        $('#by-numbers').removeClass('selected-light');
        $('#all').removeClass('selected-light');
    });

    $('#by-numbers').hover(function() {
        $('.drop-content-tags').hide();
        $('.drop-content-numbers').show();
        $('#by-tags').removeClass('selected-light');
        $('#by-numbers').addClass('selected-light');
        $('#all').removeClass('selected-light');
    });

    $('#all').hover(function() {
        $('.drop-content-tags').hide();
        $('.drop-content-numbers').hide();
        $('#by-tags').removeClass('selected-light');
        $('#by-numbers').removeClass('selected-light');
        $('#all').addClass('selected-light');
    });

    $('#search').keypress(function(event) {
        if (event.which == 13) {
            event.preventDefault();
            var url = "https://localhost/code-name-story/";
            var request = "Search/browse?search=" + $(this).val();
            window.location = url + request;
        }
    })
});