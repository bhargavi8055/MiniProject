<?php
$con=mysqli_connect("localhost","root","","mini_project");
if($con)
{
$e=$_POST["email"];
$p=$_POST["pwd"];

$query1="delete from projector_reservation where 	submission_time<now()";
	mysqli_query($con,$query1);
      $query2="delete from labs_reservation where 	submission_time<now()";
     mysqli_query($con,$query2);

$sql="select * from  registration_details where email='$e' and password='$p'";
$q=mysqli_query($con,$sql);


$count=mysqli_num_rows($q);

if($count==1){
	
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
            <center><h1>Welcome  $e</h1></center>
           </body>
		</html>
          ";
	header("refresh:2; url=Menu.html");
	
}
else
	echo "<html><body style='color:blue;background:grey' align='center'><h3>Invalid username/password</h3><br><a href='login.html'/>Click on the link to login again</body></html>";

}

?>


