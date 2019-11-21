let country = $("#country").val()
let city = $("#city").val()
if(country.length){
    $('#country_label').attr('class', 'active')
}else {
    $('#country_label').removeClass();
}
if(city.length){
    $('#city_label').attr('class', 'active')
}else {
    $('#city_label').removeClass();
}

$('#country').on('keyup',function(){
    var input = $(this),
        val = input.val();

    console.log(val)
    if(val.length){
        $('#country_label').attr('class', 'active')
    }else {
        $('#country_label').removeClass();
    }
});

$('#city').on('keyup',function(){
    var input = $(this),
        val = input.val();

    if(val.length){
        $('#city_label').attr('class', 'active')
    }else {
        $('#city_label').removeClass();

    }
});

document.getElementById('fileInput').onchange = function () {
    var filename = this.value.replace(/.*\\/, "");
    $("#filename").val(filename);
    $('#filename').attr('class', 'file-path validate valid')
};

$(document).ready(function () {
    $("#edit").on("click", function () {

        let data = $("#profile-form").serialize();
        let route = $('#profile-form').data('route');

        $.ajax({
            type: "POST",
            url: route,
            dataType: "json",
            data: data,
            success: function (response) {
                // $("#close").click()
                window.location = '/profile/'+response
            },
            error: function (response) {
                console.log(response)
                window.location = '/profile/'+response
                // $("#close").click()
            },
        })
        return false;
    });
});

