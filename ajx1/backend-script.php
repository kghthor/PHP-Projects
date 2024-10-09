<?php
include("database.php");

// Fetch query
function fetch_data($conn) {
    $query = "SELECT * FROM user_detail ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return [];
    }
}

$fetchData = fetch_data($conn);
show_data($fetchData);

function show_data($fetchData) {
    echo '<table border="1">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email Address</th>
             
            </tr>';

    if (count($fetchData) > 0) {
        $sn = 1;
        foreach ($fetchData as $data) {
            echo "<tr>
                    <td>".$sn."</td>
                    <td>".$data['name']."</td>
                    <td>".$data['user']."</td>
                    <td>".$data['email']."</td>
                  
                  </tr>";
            $sn++;
        }
    } else {
        echo "<tr>
                <td colspan='5'>No Data Found</td>
              </tr>";
    }
    echo "</table>";
}
?>
