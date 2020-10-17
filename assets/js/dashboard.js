$('document').ready(function () {
    $('#add-link-button').click(function () {
        $('.link').prepend('<div class="alert alert-danger">Form kosong!</div>');
    });
});