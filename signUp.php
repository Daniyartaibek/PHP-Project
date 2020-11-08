<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
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
             $message = '<label>All fields are requierd</label>';
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
                $message = '<label>Wrong data</label>';
            }
         }
     }
 } catch (PDOException $error) {
     $message = $error->getMessage();
 }
?>
    
    <h1>Registration form</h1>
    <form action = "view.php" method = "POST">
    Your Name: <input type = "text" name = "firstName" placeholder = "Enter your name" class = "form-control"><br>
    Your Surname: <input type = "text" name = "lastName" placeholder = "Enter your surname" class = "form-control"><br>
        Your Email: <input type = "email" name = "email" placeholder = "Enter your email" class = "form-control"><br>
        Your Login: <input type = "login" name = "login" placeholder = "Enter your login" class = "form-control"><br>
        Password: <input type="password" name="password" placeholder="Enter your password" class = "form-control"><br>
        <button type = "submit" name = "send" class = "btn btn-success">Press to send</button>
    </form>
</body>
</html>