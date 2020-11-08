<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Log-In</title>
</head>
<body>
<?php
 session_start();
require_once('p.php');
 $message="";
 
 try {
     $connect = $pdo;
     $connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
     if(isset($_POST["sign"]))
     {
         if(empty($_POST["login"]) || empty($_POST["password"]))
         {
             $message = 'just input all';
         } else 
         {
             $query="SELECT * FROM user WHERE login = :login AND password = :password";
             $stmt=$connect->prepare($query);
             $stmt->execute(
                 array(
                     'login' => $_POST['login'],
                     'password' => $_POST['password']
                 )
            );
            $count=$stmt->rowCount();
            if($count>0)
            {
                $_SESSION["login"] = $_POST["login"];
                header("Location:user.php");
            }
            elseif($_POST['login'] === "danik" && $_POST['password'] === "danik321")
            {
                $_SESSION["login"] = $_POST["login"];
                header("Location:admin.php");
            }
            else 
            {
                $message = 'incorrect!';
            }
         }
     }
 } catch (PDOException $error) {
     $message = $error->getMessage();
 }
?>

<h1>Log-In form</h1>
    <form action = "viewMain.php" method = "POST">
        Your Login: <input type = "login" name = "login" placeholder = "Enter your login" class = "form-control"><br>
        Password: <input type="password" name="password" placeholder="Enter your password" class = "form-control"><br>
        <button type = "submit" name = "send" class = "btn btn-success">Press to send</button>
    </form>

</body>
</html>