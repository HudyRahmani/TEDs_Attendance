<?php require_once("connection.php"); ?>
<?php 
	
	$id = $_GET["id"];
	$result = mysqli_query($con,"SELECT * FROM employee WHERE id='$id'");
	$employee = mysqli_fetch_assoc($result);
	
	 
	if(isset($_POST["submitchange"])){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$posation = $_POST["posation"];
	
			$result = mysqli_query($con,"UPDATE employee SET fullname = '$name',email='$email',phone='$phone',posation='$posation' WHERE id='$id'");
			
			if($result){
				header("location:index.php?update=done");
				move_uploaded_file($_FILES["photo"]["tmp_name"],$folder);
			}
			else {
				header("location:index.php?notupdate=error");
			}
			
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>edit | page</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
		
  
</style>
<body>
  <header id="main-header" class="text-white py-2">
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-sm navbar-dark p-0 px-3">
          <img src="img/logo.jpg" width="200" height="55" class="mr-3 mt-auto">
            <div class="collapse navbar-collapse" id="navbarNav"></div>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="index.php" class="nav-link active">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a href="record.php" class="nav-link">Records</a>
                </li>
              </ul>
            </div>
        </nav>

      </div>
    </div>
  </header>

  <header id="main-header" class="py-2 bg-danger text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3> Record One</h3>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mr-auto">
          <a href="index.php" class="btn btn-light btn-block">
            <i class="fa fa-arrow-left"></i> Back To Dashboard
          </a>
        </div>
        
      </div>
    </div>
  </section>

  <div class="container">
	<form method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Full Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee["fullname"]; ?>" placeholder="Enter your full name">
        </div>
      </div>
      <div class="col-6">
        <div class="form-group">
          <label for="exampleDropdownFormEmail2">E-Mail Address</label>
          <input type="email" class="form-control" id="exampleDropdownFormEmail2" name="email" value="<?php echo $employee["email"]; ?>"   placeholder="Enter your E-mail">
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Phone Number</label>
          <input type="text" class="form-control" id="" name="phone" value="<?php echo $employee["phone"]; ?>"  placeholder="Enter your phone number">
        </div>
      </div>

      <div class="col-6">
        <label for="category" name="posation">Posation</label>
          <select class="form-control" name="posation">
            <option value="Staff">Staff</option>
            <option value="Speaker">Speaker</option>
            <option value="Attendee">Attendee</option>
            <option value="Special guests">Special guests</option>
          </select>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="file">Image Upload</label>
          <input type="file" name="photo" class="form-control-file">
          <small class="form-text text-muted">Max Size 3mb</small>
        </div>
      </div>
	  <div class="row">
		  <div class="col-12">
			<div class="form-group">
			  <input type="submit" class="form-control fa fa-check btn btn-success"  name="submitchange" value="Save Changes"></input>
			</div>
		  </div>
		  
		</div>
    </div>
      
    </div>
  </div>



  <footer class="footer">
    <div class="container">
    <div class="row justify-content-center">
    <div class="col-md-12 text-center my-5">
      <h2 class="py-3"><a href="#" class="text-white">
        <span class="text-danger">TEDx <span class="text-white"> Shar e Naw <b>Youth</b></span>      
      </a></h2>
    <p class="menu">
    <a class="px-5 text-secondary" href="#">About</a>
    <a class="text-secondary" href="#">Blog</a>
    <a class="px-5 text-secondary" href="#">Contact</a>
    </p>
    
    <div class="social_icon">
      <ul>
         <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
         <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
         <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
         <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      </ul>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12 text-center">
    <p class="copyright">
    Copyright &copy; All rights reserved | This template is made by <a class="text-danger" href="https://yalda.com" target="_blank">Yalda Hashemi</a>
    </p>
    </div>
    </div>
    </div>
    </footer>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>
