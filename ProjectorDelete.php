<?php
$con=mysqli_connect("localhost","root","","mini_project");
if($con)
{
$query1="delete from projector_reservation where 	submission_time<now()";
	mysqli_query($con,$query1);
      $query2="delete from labs_reservation where 	submission_time<now()";
     mysqli_query($con,$query2);

$sql="select * from projector_reservation ";
$result=mysqli_query($con,$sql);
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Projector Details for Deleting</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
body{
background:grey;
}
a{
color:black;

margin:100px 150px 300px 750px;
}

    </style>
</head>
 <body>
    <section>
        <h1>Reserved Projector Details</h1>
        <!-- TABLE CONSTRUCTION-->
        <table>
            <tr>
                <th>ID</th>
                <th>SECTION</th>
	<th>RESERVED_TIME</th>
                <th>SUBMISSION_TIME</th>
	
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS-->
            <?php   // LOOP TILL END OF DATA 
                while($rows=$result->fetch_assoc())
                {
             ?>
            <tr>
                <!--FETCHING DATA FROM EACH 
                    ROW OF EVERY COLUMN-->
                <td><?php echo $rows['ID'];?></td>
                <td><?php echo $rows['section'];?></td>
                <td><?php echo $rows['reserved_time'];?></td>
                <td><?php echo $rows['submission_time'];?></td>
               
            </tr>
            <?php
                }
             ?>
        </table>
    </section>
    <br>
   <br><br><br>	
     <form style="color:red" method="post" action="ProjectorDelete1.php" align="center">
           <fieldset>
                <legend >Select the Date  which is already Reserved</legend>
	<p>
	<label style="color:blue">Select the Reserved Date to Delete :</label>
	<input type="datetime-local" name="YetToDelete"/>
	</br>
               </p>
               <input  style="color:green" type="submit" value="SUBMIT"/>
          </fieldset>
    </form>

<br><br><br><br>
<a href="Menu.html"/>Click on the link to go to the main page
</body>
  
</html>

