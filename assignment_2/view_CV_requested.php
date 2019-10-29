<?php
//connection for database
require_once 'db.php';
//select database
$sql = "SELECT * FROM cv_requests";
$result = $db_connection->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>CV Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
    <style>
        table.db-table { margin-left: 40px; border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
        table.db-table th { background:#eee; padding:5px; border-left:1px solid #ccc;
        }
    </style>
</head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">CV Requests</h1>
            </div>
        </div>
<table style="width:500px;">
        
    <thead>
        <tr>
            <th>Company name</th>
            <th>CV Type Requested</th>
            <th>Comment Left</th>
        </tr>
    </thead>
<?php
//fetch data from database
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
    ?>
        <tbody>
                <tr>
        <td><?php echo htmlspecialchars($row['business_name']); ?></td>
        <td><?php echo htmlspecialchars($row['cv_type']); ?></td>
        <td><?php echo htmlspecialchars($row['user_comment']); ?></td>
    </tr>
<?php
    }
}
else
{
    ?>
    <tr>
        <th colspan="3">There's no data found!!!</th>        
    </tr>
    <?php
}

    </tbody>
    </table>
    
    </body>
</html>