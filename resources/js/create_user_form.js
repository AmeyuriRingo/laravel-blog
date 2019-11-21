$(document).ready(function () {
    $("#create").on("click", function () {

        let data = $("#create-form").serialize();
        let route = $('#create-form').data('route');

        $.ajax({
            type: "POST",
            url: route,
            dataType: "json",
            data: data,
            success: function () {
                window.location = '/admin'
            },
            error: function (response) {
                $('strong', '#first_name_error').empty().remove();
                $('strong', '#last_name_error').empty().remove();
                $('strong', '#email_error').empty().remove();
                $('strong', '#password_error').empty().remove();
                $('strong', '#rank_error').empty().remove();
                console.log(response)
                if(typeof response.responseJSON != 'undefined') {
                    if (typeof response.responseJSON.errors.first_name !== 'undefined') {
                        $('#first_name_error').append('<strong>' + response.responseJSON.errors.first_name + '</strong>');
                        $('#first_name').attr('class', ' form-control is-invalid')
                    } else {
                        $('#first_name').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.last_name !== 'undefined') {
                        $('#last_name_error').append('<strong>' + response.responseJSON.errors.last_name + '</strong>');
                        $('#last_name').attr('class', ' form-control is-invalid')
                    } else {
                        $('#last_name').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.email !== 'undefined') {
                        $('#email_error').append('<strong>' + response.responseJSON.errors.email + '</strong>');
                        $('#email').attr('class', ' form-control is-invalid')
                    } else {
                        $('#email').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.password !== 'undefined') {
                        $('#password_error').append('<strong>' + response.responseJSON.errors.password + '</strong>');
                        $('#password').attr('class', ' form-control is-invalid')
                    } else {
                        $('#password').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.rank !== 'undefined') {
                        $('#rank_error').append('<strong>' + response.responseJSON.errors.rank + '</strong>');
                        $('#rank').attr('class', ' form-control is-invalid')
                    } else {
                        $('#rank').attr('class', ' form-control')
                    }
                } else {
                    window.location = '/admin'
                }
            },
        })
        return false;
    });
});


$(document).ready(function () {
    $("#edit").on("click", function () {

        let data = $("#edit-form").serialize();
        let route = $('#edit-form').data('route');

        $.ajax({
            type: "POST",
            url: route,
            dataType: "json",
            data: data,
            success: function () {
                window.location = '/admin'
            },
            error: function (response) {
                $('strong', '#first_name_error').empty().remove();
                $('strong', '#last_name_error').empty().remove();
                $('strong', '#email_error').empty().remove();
                $('strong', '#rank_error').empty().remove();
                console.log(response)
                if(typeof response.responseJSON != 'undefined') {
                    if (typeof response.responseJSON.errors.first_name !== 'undefined') {
                        $('#first_name_error').append('<strong>' + response.responseJSON.errors.first_name + '</strong>');
                        $('#first_name').attr('class', ' form-control is-invalid')
                    } else {
                        $('#first_name').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.last_name !== 'undefined') {
                        $('#last_name_error').append('<strong>' + response.responseJSON.errors.last_name + '</strong>');
                        $('#last_name').attr('class', ' form-control is-invalid')
                    } else {
                        $('#last_name').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.email !== 'undefined') {
                        $('#email_error').append('<strong>' + response.responseJSON.errors.email + '</strong>');
                        $('#email').attr('class', ' form-control is-invalid')
                    } else {
                        $('#email').attr('class', ' form-control')
                    }
                    if (typeof response.responseJSON.errors.rank !== 'undefined') {
                        $('#rank_error').append('<strong>' + response.responseJSON.errors.rank + '</strong>');
                        $('#rank').attr('class', ' form-control is-invalid')
                    } else {
                        $('#rank').attr('class', ' form-control')
                    }
                } else {
                    window.location = '/admin'
                }
            },
        })
        return false;
    });
});
