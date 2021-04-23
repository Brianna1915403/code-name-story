$(document).ready(function(){
    $('#account-type').change(function() {
        $('#account-type-description').text(
            this.value == 'reader'? 
            "As a reader you can keep track of all the stories you love, while showing their creatures love in the comments!"
             : "As a writer you can publish your stories, and much like readers you can read to you hearts content!");
    });
});