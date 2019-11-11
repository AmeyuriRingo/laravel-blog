const textarea = document.getElementById('comment');
// Учитываем padding
const padding = textarea.offsetHeight - textarea.clientHeight;

textarea.oninput = e => {
    // Схлопываем
    textarea.style.height = 'auto';
    // Расхлопываем
    textarea.style.height = textarea.scrollHeight + padding + 'px';
}

$(document).ready(function () {
    $("#edit").on("click", function () {

        let data = $("#add-comment").serialize();
        let route = $('#add-comment').data('route');

        $.ajax({
            type: "POST",
            url: route,
            dataType: "json",
            data: data,
            success: function (response) {
                console.log(response)
                window.location = '/category/'+response.category+'/'+response.id
            },
            error: function (response) {
                console.log(response)
                if(typeof response.responseJSON != 'undefined') {
                    window.location = '/category/'+response.category+'/'+response.id
                }
            },
        })
        return false;
    });
});
