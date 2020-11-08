<style>
table
{
  border-collapse: collapse;
}
td, th
{
  padding: 10px;
  border: 2px solid darkgray;
}
</style>
<?php
  require_once "p.php";
  $stmt = $pdo->query("SELECT * FROM gymfit_db_table");
?>
  <table><tr><th>Name</th><th>Photo</th><th>Price</th><th>Description</th></tr>
  <?php
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    echo "<tr><td>";
    echo($row['Name']);
    echo "</td>";

 

   
    echo "<td>";
    ?>
    <img src="<?= $row['Img'] ?>"  width="165">
    <?php
    echo "</td>";
    
    echo "<td>";
echo($row['Price']);
    echo "</td>";
    

 

     echo "<td>";
echo($row['Description']);
    echo "</td>";

 

    echo "</tr>";
  }
  ?>
  </table>
  <p>Delete by product name</p>
    <form action="m.php" method = "post">
        Product : <input type="text" name="delete">
        <input type="submit" id = "deletebutton">
    </form>
    <?php
    if(isset($_POST['delete'])){
        $delete = $_POST['delete'];
        $sql_query_delete_by_title = "DELETE FROM gymfit_db_table WHERE gymfit_db = '$delete'";
        
        mysqli_query($connection, $sql_query_delete_by_title);
        echo '<script>alert("The item was successfully deleted, Thank you!!");</script>';
        header("Refresh:0");
    }
?>