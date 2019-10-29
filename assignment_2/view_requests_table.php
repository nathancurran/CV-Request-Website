<?php
//connection for database
require_once 'db.php';
//select database
$sql = "SELECT business_name, cv_type, user_comment FROM cv_requests";
$result = $db_connection->query($sql);

$sql = mysqli_query($db_connection, "SELECT * FROM viewcounter WHERE pagename='CV_Request_Form';");
while($row = mysqli_fetch_array($sql)){
    $id = $row["id"];
    $pagename = $row["pagename"];
    $views = $row["views"];
};

$countAll = "SELECT COUNT(*) as total FROM unique_visitors";
$countResult = mysqli_query($db_connection, $countAll);
$numOfRows = mysqli_fetch_assoc($countResult);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>CV Requests</title>
    <!--Determines the default stylesheet for computer and phone screen-->
    <link rel="stylesheet" type="text/css" href="css/view_requests_table.css" media="screen,projector" />
</head>
<body>
    <header>
    <h1>CV Requests</h1>
    </header>
    <table>    
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
        <th colspan="3">The table is empty.</th>        
    </tr>
    <?php
}
?>

    </tbody>
    </table>
    <div id="views">
        <p><bold>No. of unique views: <?php print $numOfRows['total']?><br>
        The <?php print $pagename; ?> has been viewed a total of <?php print $views; ?> times.</bold></p>
    </div>
    </body>
</html>