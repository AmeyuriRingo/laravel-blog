tinymce.init({
    selector:'textarea',
    plugins:'link image'
});
$(document).ready(function () {
    $("#createArticle").on("click", function () {

        let data = $("#createArticle-form").serialize();
        let title = $("#title").val()
        let title_preview = $("#title_preview").val()
        let category = $("#category").val()
        let image_preview = $("#image_preview").val()
        let route = $('#create-form').data('route');
        tinyMCE.triggerSave();
        let text = tinyMCE.activeEditor.getContent()

        $.ajax({
            type: "POST",
            url: route,
            // processData: false,
            dataType: "json",
            data: {
                title: title,
                title_preview: title_preview,
                image_preview: image_preview,
                category: category,
                text: text,
            },
            success: function () {
                window.location = '/'
            },
            error: function (response) {
                console.log(response)
                $('strong', '#title_error').empty().remove();
                $('strong', '#text_error').empty().remove();
                $('strong', '#title_preview_error').empty().remove();
                $('strong', '#image_preview_error').empty().remove();
                if(typeof response.responseJSON != 'undefined') {
                    if(typeof response.responseJSON.errors.title !== 'undefined'){
                        $('#title_error').append('<strong>'+response.responseJSON.errors.title+'</strong>');
                        $('#title').attr('class', ' form-control is-invalid')
                    } else {
                        $('#title').attr('class', ' form-control')
                    }
                    if(typeof response.responseJSON.errors.title_preview !== 'undefined'){
                        $('#title_preview_error').append('<strong>'+response.responseJSON.errors.title_preview+'</strong>');
                        $('#title_preview_').attr('class', ' form-control is-invalid')
                    } else {
                        $('#title_preview_').attr('class', ' form-control')
                    }
                    if(typeof response.responseJSON.errors.image_preview !== 'undefined'){
                        $('#image_preview_error').append('<strong>'+response.responseJSON.errors.image_preview+'</strong>');
                        $('#image_preview').attr('class', ' form-control is-invalid')
                    } else {
                        $('#image_preview').attr('class', ' form-control')
                    }
                    if(typeof response.responseJSON.errors.text !== 'undefined'){
                        $('#text_error').append('<strong>'+response.responseJSON.errors.text+'</strong>');
                        $('#text').attr('class', ' form-control is-invalid')
                    }else {
                        $('#text').attr('class', ' form-control')
                    }
                } else {
                    window.location = '/'
                }
            }
        })
        return false;
    });
});
