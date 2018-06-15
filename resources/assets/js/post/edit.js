
$(document).ready(function () {

    console.log('load-edit');


    $('#description').summernote({
        lang: 'ru-RU',
        height: 300,
    });

    $(document).on('click', '#changeImage', function () {
        $('#imageCard').hide();
        $('#imageBlock').show();
        $('#imageSource').attr('value', '');
        $('#postImg').fileinput('destroy');
        $('#postImg').fileinput({
            showCancel: false,
            language: 'ru',
            maxFileCount: 1,
            required: true,
            showUpload: false,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
        return false;
    });

    $(document).on('click', '#return', function () {
        $('#imageCard').show();
        $('#imageBlock').hide();
        $('#imageSource').attr('value', $(this).data('src'));
        $('#postImg').fileinput('destroy');
        $('#postImg').fileinput({
            showCancel: false,
            language: 'ru',
            maxFileCount: 1,
            required: false,
            showUpload: false,
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
        return false;
    })
});