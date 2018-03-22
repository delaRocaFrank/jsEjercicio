<?php 
function suma4($numero){
return $numero + 4;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<tittle> geogram </tittle>
</head>
<body>
<form action="">
	<input type="text" name="location"/>
	<button type="submit">submit</button>
	</br>
	<?php if(!empty($_GET['location']))echo suma4($_GET['location']);  ?>
	</form>
</body>
</html>