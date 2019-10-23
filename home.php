
<?php

$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quiz');
?>

<html>
<body>

<link rel="stylesheet" type="text/css" href="bootstrap.css">
<div class="container">
<br>
<h1 class="text-center text-primary"> Welcome to Quiz </h1>
<div class="col-lg-8 m-auto d-block">
<div class="card">
  <h3 class="text-center card-header">You have to select one out of four, BEST OF LUCK!!!</h3>
</div>
<br>

<form action="check.php" method="post">



<?php

for($i=1 ; $i < 16 ; $i++)
{
$q = "select * from questions where qid= $i";
$query = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($query) )
{
?>

<div clas="card">
<h6 class="card-header"><?php echo $rows['question'] ?></h6>

<?php

$q = "select * from answers where ans_id= $i";
$query = mysqli_query($con,$q);

while($rows = mysqli_fetch_array($query) )
{

?>

<div class"class-body">
<input type="radio" name=" quizcheck[<?php echo $rows['ans_id'] ?>]" value="<?php echo $rows['aid']; ?>">
<?php echo $rows['answer']; ?>

</div>
	
<?php
}
}
}	
?>	

<input type="submit"  name="submit" value="submit" class="btn btn-success m-auto d-block">
</form>	
</div>
</div>	
</div>
</body>
</html>