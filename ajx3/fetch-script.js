$(document).ready(function() {
    $('#fetchData').on('click', function() {
        fetch('https://jsonplaceholder.typicode.com/users')
            .then(response => response.json())
            .then(data => {
                var html = '<table border="1">';
                html += '<tr><th>ID</th><th>Name</th><th>Username</th><th>Email</th></tr>';
                $.each(data, function(index, user) {
                    html += '<tr>';
                    html += '<td>' + user.id + '</td>';
                    html += '<td>' + user.name + '</td>';
                    html += '<td>' + user.username + '</td>';
                    html += '<td>' + user.email + '</td>';
                    html += '</tr>';
                });
                html += '</table>';
                $('#data-container').html(html);
            })
            .catch(error => {
                console.error('Error:', error);
                $('#data-container').html('<p>An error occurred while fetching data.</p>');
            });
    });
});
