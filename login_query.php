<?php
	// session_start();
	// require_once 'conn.php';
  
	// if(ISSET($_POST['login'])){
  //       if($_POST['username'] != "" || $_POST['password'] != ""){
  //         $username = $_POST['username'];
  //         $password = $_POST['password'];
  //         $sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=? ";
  //         $query = $pdo->prepare($sql);
  //         $query->execute(array($username,$password));
  //         $row = $query->rowCount();
  //         $fetch = $query->fetch(); 
  //         if($row > 0) {
  //           $_SESSION['user'] = $fetch['mem_id'];
  //           header("location: home.php");
  //         } else{
  //           echo "
  //           <script>alert('Invalid username or password')</script>
  //           <script>window.location = 'index.php'</script>
  //           ";
  //         }
	// 	}else{
	// 		echo "
	// 			<script>alert('Please complete the required field!')</script>
	// 			<script>window.location = 'index.php'</script>
	// 		";
	// 	}
	// }
?>
<?php
session_start();
require_once 'conn.php';

if (isset($_POST['login'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        try {
            $sql = "SELECT * FROM `member` WHERE `username` = :username";
            $query = $pdo->prepare($sql);
            $query->bindParam(':username', $username);
            $query->execute();

            if ($query->rowCount() > 0) {
                $fetch = $query->fetch(PDO::FETCH_ASSOC);

                // Verify the password
                if (password_verify($password, $fetch['password'])) {
                    $_SESSION['user'] = $fetch['mem_id'];
                    header("location: home.php");
                    exit;
                } else {
                    echo "<script>alert('Invalid username or password');
                            window.location = 'index.php';</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Invalid username or password');
                        window.location = 'index.php';</script>";
                exit;
            }
        } catch (PDOException $e) {
            // Log the detailed error message to a file for debugging
            error_log($e->getMessage(), 3, 'errors.log');

            echo "<script>alert('An error occurred. Please try again later.');
                    window.location = 'index.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Please complete the required fields!');
                window.location = 'index.php';</script>";
        exit;
    }
}
?>
