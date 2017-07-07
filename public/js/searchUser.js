// User Search
function userSearch() {
    var input, filter, ul, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById("userList");
    li = ul.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

// When One of the links is clicked add it to the input form
$(function() {
    $('li a').click(function(event) {
        event.preventDefault();
        var value = $(this).text();
        var input = $('#myInput');
        input.val(' ');
        input.val(input.val() + value);
    });
});
