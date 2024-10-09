$(document).on('click', '#showData', function(e) {
    var username = $('#usernameDropdown').val();
    if (username) {
        $.ajax({
            type: "GET",
            url: "backend-script.php",
            data: { username: username },
            dataType: "html",
            success: function(data) {
                $("#table-container").html(data);
            }
        });
    } else {
        alert("Please select a username");
    }
});
