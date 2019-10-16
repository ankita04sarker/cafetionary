<?php
include("connect.php");
final class adminoperations{
		///ADMIN PANEL QUERY STARTS FROM HERE ///////////////////////////////////////
		public static function showfoods(){
			global $pdo;
			$sql="SELECT *FROM foods";
			$query=$pdo->prepare($sql);
			$query->execute();
			while($obj=$query->fetchObject()){
				$id=$obj->id;
				$name=$obj->name;
				$price=$obj->price;
				$type=$obj->type;

				echo "
					<tr>
						<td>$id</td>
						<td>$name</td>
						<td>$type</td>
						<td>$price</td>
						<td>
							<a href='food_edit.php?foodid=$id' class='btn btn-success btn-circle'><i class='fas fa-edit'></i></a>
                         	 <a href=food_view.php?foodid=$id' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>
						</td>
					</tr>
				";
			}
		}
		public static function updatefood($id,$name,$type,$price,$image){
			Global $pdo;
			$sql = "UPDATE foods SET name=:name,type=:type,price=:price,image=:image where id=:id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->bindParam(':type',$type,PDO::PARAM_STR);
			$stmt->bindParam(':price',$price,PDO::PARAM_INT);
			$stmt->bindParam(':image',$image,PDO::PARAM_STR);
			$stmt->execute();
		}
		public static function insertfood($name,$price,$type,$filepath){
				Global $pdo;
				$sql = "INSERT INTO foods(name,price,type,image)
						VALUES(:name,:price,:type,:image)";				
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':name',$name,PDO::PARAM_STR);
				$stmt->bindParam(':price',$price,PDO::PARAM_INT);
				$stmt->bindParam(':type',$type,PDO::PARAM_STR);
				$stmt->bindParam(':image',$filepath,PDO::PARAM_STR);
				$stmt->execute();
				echo "<p class='text-success'>Food Item Added Successfully!</p>";
				//header('Location:food_view.php');
		}
		public static function food_already_exist_checking($name,$price,$type,$filepath){
			Global $pdo;
			$sql="SELECT * from foods WHERE name='$name'";
			$stmt = $pdo->prepare($sql);
		    $stmt->execute();

		   $n=$stmt->rowCount();
		   if(!$n){
		   	adminoperations::insertfood($name,$price,$type,$filepath);
		   }
		   else{
		   		echo"<p class='text-danger'>Food Already exists. Try inserting Another</p>";
		   }
		}
		public static function acceptorder($id){
			//echo $id;
			global $pdo;
			$sql="UPDATE orders SET status='Success' where id=:id";
			$qry=$pdo->prepare($sql);
			$qry->bindParam(':id',$id,PDO::PARAM_INT);
			$qry->execute();
			
		}
		public static function denyorder($id){
			global $pdo;
			$sql="DELETE FROM orders WHERE id=:id";
			$qry=$pdo->prepare($sql);
			$qry->bindParam(':id',$id,PDO::PARAM_INT);
			$qry->execute();
			

		}
		public static function showorders(){
			//echo "Hello";
			global $pdo;
			$sql="SELECT orders.id,user.user_id,orders.name as cname,orders.address,orders.phone,foods.name,foods.type,foods.price,orders.status from orders inner join foods on orders.foodid=foods.id inner join user on orders.userid=user.id";
			$query=$pdo->prepare($sql);
			$query->execute();
			
			//$obj=$query->fetchObject(); print_r($obj);
			$sl=1;
			while($obj=$query->fetchObject()){
				$id=$obj->id;
				$uid=$obj->user_id;
				$cname=$obj->cname;
				$address=$obj->address;
				$phone=$obj->phone;
				$name=$obj->name;
				$type=$obj->type;
				$price=$obj->price;
				$status=$obj->status;

				echo "
					<tr>
						<td>$sl</td>
						<td>$uid</td>
						<td>$cname</td>
						<td>$address</td>
						<td>$phone</td>
						<td>$name</td>
						<td>$type</td>
						<td>$price</td>
						<td>$status</td>
						<td style='width:190px;'>
							<form action='#' method='post' style='width:100%;'>
								<select name='todo' style='width:90px;display:inline-block;float:left;'>
									<option value=''>----------</option>
									<option value='cancelled'>Cancel</option>
									<option value='success'>Success</option>
								</select>
								<input type='submit' name='submit' value='Submit' class='btn btn-primary' style='width:80px;float:right;'>
							</form>
							";
							if(isset($_POST['submit'])){
								if($_POST['todo']=='success'){
									adminoperations::acceptorder($id);
								}else{
									adminoperations::denyorder($id);
								}
							}
							echo"
						</td>
					</tr>
				";
				$sl++;
			}
		}

		public static function showuser(){
			global $pdo;
			$sql="SELECT *FROM user";
			$query=$pdo->prepare($sql);
			$query->execute();
			while($obj=$query->fetchObject()){
				$id=$obj->id;
				$user=$obj->user_id;
				$password=$obj->password;
				$mail=$obj->mail;

				echo "
					<tr>
						<td>$id</td>
						<td>$user</td>
						<td>$password</td>
						<td>$mail</td>
						<td>
							<a href='client_edit.php?userid=$id' class='btn btn-success btn-circle'><i class='fas fa-edit'></i></a>
                         	 <a href=clients.php?userid=$id' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>
						</td>
					</tr>
				";
			}
		}
		public static function updateuser($id,$user_id,$mail,$password){

			//echo "$id  : $user_id  : $password : $mail ";
			Global $pdo;
			$sql = "UPDATE user SET user_id=:user_id,mail=:mail,password=:password where id=:id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$stmt->bindParam(':user_id',$user_id,PDO::PARAM_STR);
			$stmt->bindParam(':mail',$mail,PDO::PARAM_STR);
			$stmt->bindParam(':password',$password,PDO::PARAM_STR);
			$stmt->execute();
		}
		public static function showreviews(){
			global $pdo;
			$sql="SELECT *FROM reviews";
			$query=$pdo->prepare($sql);
			$query->execute();
			while($obj=$query->fetchObject()){
				$id=$obj->id;
				$user_id=$obj->userid;
				$stars=$obj->stars;
				$review=$obj->comment;

				echo "
					<tr>
						<td>$id</td>
						<td>$user_id</td>
						<td>$stars</td>
						<td>$review</td>
						<td>
                         	 <a href=reviews.php?reviewid=$id' class='btn btn-danger btn-circle'><i class='fas fa-trash'></i></a>
						</td>
					</tr>
				";
			}
		}
		public static function send_user_mail($userid,$name,$email,$phone,$message,$status){
			Global $pdo;
				$sql = "INSERT INTO mail(userid,name,email,phone,message,status)
						VALUES(:userid,:name,:email,:phone,:message,:status)";				
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':userid',$userid,PDO::PARAM_STR);
				$stmt->bindParam(':name',$name,PDO::PARAM_STR);
				$stmt->bindParam(':email',$email,PDO::PARAM_STR);
				$stmt->bindParam(':phone',$email,PDO::PARAM_STR);
				$stmt->bindParam(':message',$message,PDO::PARAM_STR);
				$stmt->bindParam(':status',$status,PDO::PARAM_STR);
				$stmt->execute();
				echo "<p class='text-success'>Message Sent Successfully!</p>";
		}




		///////////////////////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////FOOD ITEM PART USER VIEW /////////////////////////////////
		//////////////////////////////////////////////////////////////////////////////////////////////
		public static function foods($type){

			global $pdo;
			$foodcount=1;
			$sql="SELECT *FROM foods where type=:type";
			$query=$pdo->prepare($sql);
			$query->bindParam(':type',$type,PDO::PARAM_STR);
			$query->execute();
			while($obj=$query->fetchObject()){
				$id=$obj->id;
				$name=$obj->name;
				$price=$obj->price;
				$type=$obj->type;
				$file=$obj->image;
				$file='admin/'.$file;

				echo "
					<div class='product-list-item'>
						<img class='img-responsive' src='$file' height='261px' width='450px' alt='$name'/>
  						<a href='order.php?foodid=$id' style='color:white;background-color:blue;border-radius:15px;text-decoration:none;padding:5px;'> Order </a>
						<h3 class='product-heading'>".$foodcount.".".$name."</h3>
						<p>PRICE:$price TK</p>
					</div>
					";
				$foodcount++;
			}
		}
		public static function usersignup($user_id,$mail,$password,$confirm){

			//echo "<p>$user_id  : $mail  : $password : $confirm</p>";
			global $pdo;
			if($password!=$confirm){
				echo "<p style='color:red;'>Password Missmatched! Try Again.</p>";
			}else{
				$sql="INSERT INTO user(user_id,mail,password)
					  VALUES(:user_id,:mail,:password)";
				$qry=$pdo->prepare($sql);
				$qry->bindParam(':user_id',$user_id,PDO::PARAM_STR);
				$qry->bindParam(':mail',$mail,PDO::PARAM_STR);
				$qry->bindParam(':password',$password,PDO::PARAM_STR);
				$qry->execute();
				echo "<p style='color:green;'>Sigup Done Successfully!</p>";
			}
		}
		public static function user_already_exist_checking($user_id,$mail,$password,$confirm){
			Global $pdo;
			$sql="SELECT * from user WHERE user_id='$user_id'";
			$stmt = $pdo->prepare($sql);
		    $stmt->execute();

		   $n=$stmt->rowCount();
		   if(!$n){
		   	adminoperations::usersignup($user_id,$mail,$password,$confirm);
		   }
		   else{
		   		echo"<p class='text-danger'>User Already exists. Try inserting Another</p>";
		   }
		}
		public static function place_order($userid,$foodid,$name,$phone,$address,$status){
			Global $pdo;
				$sql = "INSERT INTO orders(userid,foodid,name,phone,address,status)
						VALUES(:userid,:foodid,:name,:phone,:address,:status)";				
				$stmt = $pdo->prepare($sql);
				$stmt->bindParam(':userid',$userid,PDO::PARAM_STR);
				$stmt->bindParam(':foodid',$foodid,PDO::PARAM_STR);
				$stmt->bindParam(':name',$name,PDO::PARAM_STR);
				$stmt->bindParam(':phone',$phone,PDO::PARAM_STR);
				$stmt->bindParam(':address',$address,PDO::PARAM_STR);
				$stmt->bindParam(':status',$status,PDO::PARAM_STR);
				$stmt->execute();
				echo "<p style='color:green;'>Order Placed Successfully!</p>";
		}
}
?>