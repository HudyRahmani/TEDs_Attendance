<?php require_once("connection.php") ?>
<?php 
	
	
		$id = $_GET["id"];
			
			$employee = mysqli_query($con,"SELECT image FROM employee WHERE id='$id'");
			$emp = mysqli_fetch_assoc($employee);
			unlink($emp["image"]);
			
			$result = mysqli_query($con,"DELETE FROM employee WHERE id='$id'");
			
			if($result){
				header("location:index.php?delete=done");
			}
			else {
				header("location:index.php?notdelete=error");
			}
	
?>