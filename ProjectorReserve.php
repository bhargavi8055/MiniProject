<?php
$con=mysqli_connect("localhost","root","","mini_project");

if($con)
{
$query1="delete from projector_reservation where 	submission_time<now()";
	mysqli_query($con,$query1);
      $query2="delete from labs_reservation where 	submission_time<now()";
     mysqli_query($con,$query2);

$submissiontime=$_POST["submissionTime"];
$reservetime=$_POST["reservingTime"];
$section = $_POST["myList"];
	if($reservetime>=$submissiontime){
	//echo "<img src="bg_sky.jpg"/>";
		echo "<html>
           <style>
        		body{
				margin: 0;
					padding: 0;
					background: url(image.jpg);
					background-size: cover;
					background-position: left;
					font-family: sans-serif;
	
			}
		</style>
           <body>
            <center><h1>You need to enter submissiontime 			correctly.please check it once .it will make 			you go through the reservation page please wait some 		time</h1></center>
           </body>
		</html>
          ";
		header("refresh:10; url=ProjectorReserve.html");

	}
	else{
		$sql="select * from projector_reservation where  reserved_time = '$reservetime'";
		$q=mysqli_query($con,$sql);
	
		$count=mysqli_num_rows($q);
		echo "$count";
		if($count>=1){
			echo "<html>
           	<style>
        		body{
				margin: 0;
					padding: 0;
					background: url(image.jpg);
					background-size: cover;
					background-position: left;
					font-family: sans-serif;
	
			}
			</style>
	           <body>
      	      <center><h1>Sorry!The Resource is busy right 			now .please try again later</h1></center>
	           </body>
			</html>
	          ";

	
		
		}
		else{
			$q="insert into projector_reservation(section,reserved_time,submission_time)values('$section','$reservetime','$submissiontime')";
			if(mysqli_query($con,$q)){
	
				echo "<html>
			           <style>
        				body{
					margin: 0;
					padding: 0;
					background: url(image.jpg);
					background-size: cover;
					background-position: left;
					font-family: sans-serif;
	
					}
					</style>
			           <body>
			            <center><h1>Reservation 							Successfull</h1></center>
			           </body>
					</html>
		          ";

			header("refresh:1; url=rese.html");
			/*$to='reshmakuchipudi20@gmail.com';
			$subject='resgistartion successfull';
			$text='resgistartion successfull';
			$headers='From:bhargavi8055@gmail.com';
			mail($to,$subject,$text,$headers);*/
	
			}
	
			else{
				echo "<html>
			           <style>
        				body{
					margin: 0;
					padding: 0;
					background: url(image.jpg);
					background-size: cover;
					background-position: left;
					font-family: sans-serif;
	
					}
					</style>
			           <body>
			            <center><h1>Reservation 								falied.Retry!!</h1></center>
			           </body>
					</html>
          			";

			}
		//mysqli_close($con);
		}
	}
}
?>


