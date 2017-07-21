$(document).ready(function () {

    var busName = '';

// When bussiness is clicked
    $('.giveMeEllipsis').on('click', function () {
        modalText($(this).text());
    });

    function modalText (text) {
        var newDiv = $('div');
        newDiv.append(text);
        // $('#myModal').append(newDiv);
    }



















});
