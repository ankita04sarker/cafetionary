<?php
	require_once("admin/db/connect.php");
	require_once("check.php");

	final class check_admin {
		public static function user_check($userid,$password){
			$user = check_input::test_input($userid);
			$pass = $password;
				
			Global $pdo;
			$qry = "SELECT user_id,mail,password FROM user WHERE user_id=$user and password=$pass";
			$stmt = $pdo->prepare($qry);
			$stmt->execute();
			$row=$stmt->rowCount();
				if($row){
					$_SESSION['userid'] =$user;
					$_SESSION['pass'] = $pass;
					if(isset($_SESSION['userid']) && isset($_SESSION['pass'])){
					header("Location:index.php");
				}else{
					$msg="Wrong Information!! Try Again.";
					echo "<p style='color:red;font-size:17px;'>".$msg."</p>";					
				}
							
			}
		}
	}
?>