$(document).ready(function () {
    console.log('load-create');
    $('#postImg').fileinput({
        showCancel: false,
        language: 'ru',
        maxFileCount: 1,
        showUpload: false,
        required: true,
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    $('#description').summernote({
        lang: 'ru-RU',
        height: 300,
    })
});