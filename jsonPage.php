<html>
    <head>
    <title>data of json</title>
    </head>
    <body>
        <?php
$connect = mysqli_connect("localhost","daniyartaibek","12345","roko34");
$sql = "SELECT * FROM client";

$result = mysqli_query($connect,$sql);

$json_array = array();

while($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
    
}
echo "<br>";
echo json_encode($json_array);

        ?>
    </body>
</html>