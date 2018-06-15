
$(document).ready(function () {

    console.log('load-edit');
    $('#postImg').fileinput({
        showCancel: false,
        language: 'ru',
        maxFileCount: 1,
        showUpload: false,
        required: true,
        initialPreview: '<img style="width:auto;height:auto;max-width:100%;max-height:100%;" src="/'+ postImg +'">',
        allowedFileExtensions: ["jpg", "png", "gif"]
    });

    $('#description').summernote({
        lang: 'ru-RU',
        height: 300,
    })
});