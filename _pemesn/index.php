<?php
// Create database connection using config file
include "config.php";
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM tb_pemesan");
?>
 
<html>
<head>    
    <title>Pemesan</title>
</head>
 
<body>

    <table width='80%' border=1>
    <tr>
        <th>Nama</th> <th>No Hp</th>
    </tr>
    <?php  
    foreach ($result as $user_data) {         
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['no_hp']."</td>";  
        echo "<td><a href='edit.php?id=$user_data[id_pemesan]'>Edit</a> | <a href='delete.php?id=$user_data[id_pemesan]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>
