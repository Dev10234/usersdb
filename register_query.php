<?php


session_start();
require_once 'conn.php';
if(isset($_POST['register'])){
    // Input validation
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if(empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($confirmPassword)){
        echo "<script>alert('Please fill up all the required fields!')</script>";
        echo "<script>window.location = 'registration.php'</script>";
        exit;
    }
    // Password confirmation
    if($password !== $confirmPassword){
        echo "<script>alert('Passwords do not match!')</script>";
        echo "<script>window.location = 'registration.php'</script>";
        exit;
    }
    // Secure password handling
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    // Prepared statement to prevent SQL injection
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `member` (firstname, lastname, username, password) VALUES (:firstname, :lastname, :username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
        $_SESSION['message'] = array("text" => "User successfully created.", "alert" => "info");
        header('location:index.php');
        exit;
    }catch(PDOException $e){
        echo "<script>alert('An error occurred while creating the user. Please try again later.')</script>";
        echo "<script>window.location = 'registration.php'</script>";
        exit;
    }
}


?>
