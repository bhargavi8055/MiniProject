<?php
$con=mysqli_connect("localhost","root","","mini_project");
if($con){
   header("refresh:1; url=background.html");
   //echo "Connection successfull<br>";
}
else{
	echo "<h1>Connection failed</h1>";
}
if(isset($_POST['uname'])){
	$u=$_POST["uname"];
	$pass=$_POST["pwd"];
	$e=$_POST["email"];
	
	/* 
 	
	$timequery="select now()";
	$timeres=mysqli_query($con,$timequery);
	$stack=array();
	while($row=mysqli_fetch_array($timeres,MYSQLI_ASSOC)){
	array_push($stack,$row);
	}
	$theArray=json_encode($stack);
	print_r($theArray);
	
	*/

	$query1="delete from projector_reservation where 	submission_time<now()";
	mysqli_query($con,$query1);
      $query2="delete from labs_reservation where 	submission_time<now()";
     mysqli_query($con,$query2);

	$sql="select username,email,password from 	registration_details where email='$e'";
	$res=mysqli_query($con,$sql);
	if(mysqli_num_rows($res)>0){
		 
		echo "<html>
			<style>
				body{
					margin: 0;
					padding: 0;
					background: url(bg_sky.jpg);
					background-size: cover;
					background-position: left;
					font-family: sans-serif;
				}
			</style>

			<body>
				<center><h1>You are already registered.
				</h1>
				<h2>You can directly login to the website 				</h2>.
				<br>Please wait for 10 seconds 						meanwhile it is trying to make you go 					through login page
				</center>
			</body>
			</html>";
	
		header("refresh:10; url=login.html");
	}
	else{
		$q="insert into registration_details 					values('$u','$e','$pass')";
		if(mysqli_query($con,$q)){
			echo "<html>
				<style>
					body{
						margin: 0;
						padding: 0;
						background:url(bg_sky.jpg);
						background-size: cover;
						background-position: left;
						font-family: sans-serif;
	
					}
				</style>

				<body>	
				<center><h1>Registered Successfully</h1>

				Please wait for 10 seconds meanwhile it 				is trying to make you go through login 				page
				<img src='reg1.png' width='100' 						height='100'/>
				</center>
				</body>
				</html>";
      		header("refresh:10; url=login.html");
		}
		else
			echo "Registartion falied";
	mysqli_close($con);
	}
}
?>
