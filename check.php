<?php

session_start();

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quiz');
?>

<!DOCTYPE html>
<html>
<body>

<link rel="stylesheet" type="text/css" href="bootstrap.css">

div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-success text-uppercase animateuse" > Quiz World</h1>
    	<br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

<?php
$result=0;
if(isset($_POST['submit']))
{
	if(!empty($_POST['quizcheck']))
	{
		$count = count($_POST['quizcheck']);
?>

   	<td>
            <?php
            echo "Out of 5, You have attempt ".$count." option."; ?>
            </td>
        

<?php
		//	echo "You have selected ".$count." options";
		
		
		
		
		$selected= $_POST['quizcheck'];
		print_r($selected);
		
		$q= "select * from questions";
		$query= mysqli_query($con, $q);
		
		$i = 1;
		
		while ($rows = mysqli_fetch_array($query))
		{
			//print_r($rows['ans_id']);
			$checked = $rows['ans_id'] == $selected[$i];
			
			if($checked)
			{
			   $result++;	
			}
			
		  $i++;
		}
	?>
	
	
	<tr>
    			<td>
    				Your Total score
    			</td>
    			<td colspan="2">
	    	<?php 
	            echo " Your score is ". $result.".";
	            }
	            else{
	            echo "<b>Please Select Atleast One Option.</b>";
	            }
	            } 
	          ?>
	          </td>
            </tr>
	
	<?php	
	echo "<br> total score is".$result;



//$finalresult= "insert into user(totalques,answercorrect) values ('5','$result')";
//$queryresult= mysqli_query($conn,$finalresult);


?>


</table>
      </div>
   </body>
</html>


