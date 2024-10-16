<?php require_once("connection.php"); ?>

<?php 
 
		if(isset($_POST["name"])){
			$name = $_POST["name"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$posation = $_POST["posation"];
			$photo = $_FILES["photo"]["name"];
			$folder="img/".time().$photo;
			
			$result = mysqli_query($con,"INSERT INTO employee values(NULL,'$name','$email','$phone','$posation','$folder')");
			
			if($result){
				header("location:index.php?insert=done");
				move_uploaded_file($_FILES["photo"]["tmp_name"],$folder);
			}
			else {
				header("location:index.php?notinsert=error");
			}
		     
		}
		$employee_row = mysqli_query($con,"SELECT * FROM employee");
		
	 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>index | page</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  
	<script type="text/javascript">
		
		function deleteconfirm(url){
			var del = window.confirm("are you sure");
			if(del){
				location.assign(url);
			}
		}
	</script>

<style>
		
		
		
</style>
</head>


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
          <h3><i class="fa fa-tachometer"></i> Dashboard</h3>
        </div>
      </div>
    </div>
  </header>

 

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#addPostModal">
            <i class="fa fa-plus pr-2"></i> Add Record			
          </a>
		  <?php if(isset($_GET["insert"])) { ?>
				<span color="color:green">employee Recorded</span>
		  <?php } if(isset($_GET["notinsert"])) {   ?>
				<span color="color:red">somthing went wrong</span>
		  <?php } ?>
		  <?php if(isset($_GET["update"])) { ?>
				<span color="color:green">Selected employee Updated</span>
		  <?php } if(isset($_GET["notupdate"])) {   ?>
				<span color="color:red">somthing went wrong</span>
		  <?php } ?>
		  <?php if(isset($_GET["delete"])) { ?>
				<span color="color:green">Selected employee Deleted</span>
		  <?php } if(isset($_GET["notdelete"])) {   ?>
				<span color="color:red">somthing went wrong</span>
		  <?php } ?>
        </div>
        <div  class="col-md-6">
          <a href="record.php" class="btn btn-danger btn-block">
            <i class="fa fa-pencil pr-2"></i> View Records
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- RECORDS -->
  <section id="record">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Employee List</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>image</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Posation</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
			  <?php foreach($employee_row as $emp){ ?>
                <tr>
                  <td scope="row"><?php echo $emp["id"]; ?></td>
				  <td><img style="border-radius:50px;" width="40px" height="40px;" src ="<?php echo $emp["image"]; ?>"></td>
                  <td><?php echo $emp["fullname"]; ?></td>
                  <td><?php echo $emp["email"]; ?></td>
                  <td><?php echo $emp["posation"]; ?></td>
                  <td><a href="Edit.php?id=<?php echo $emp["id"]; ?>" class="btn btn-secondary">
                    <i class="fa fa-angle-double-right"></i> Edit
                  </a></td>
				 <td><a  onclick="deleteconfirm(this.id);" id="delete.php?id=<?php echo $emp["id"]; ?>" href="#"  class="btn btn-danger">
                     Delete!  
                  </a></td>
                </tr>
			  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>



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
    Copyright &copy; All rights reserved | This template is made by <a class="text-danger" href="https://yalda.com" target="_blank">Hudy Rahmani</a>
    </p>
    </div>
    </div>
    </div>
    </footer>

  <!-- record MODAL -->

  <div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Add Records</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
		
          <form method="post" enctype="multipart/form-data" action="index.php">
            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <label for="title">Full Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>

                <div class="col-md-6">
                  <label for="title">E-mail Address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter your E-mail">
                </div>
            </div>
            
            <div class="row pt-4">
              <div class="col-md-6">
                <label for="title">Phone Number</label>
                <input type="phone" name="phone" class="form-control" placeholder="Enter your phone number">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="category" >Posation</label>
                  <select class="form-control" name="posation">
                    <option value="Staff">Staff</option>
                    <option value="Speaker">Speaker</option>
                    <option value="Attendee">Attendee</option>
                    <option value="Special guests">Special guests</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="file">Image Upload</label>
                  <input type="file" name="photo" class="form-control-file">
                  <small class="form-text text-muted">Max Size 3mb</small>
                </div>
              </div>
            </div>
			<div class="modal-footer">
			  <button class="btn btn-secondary" data-dismiss="modal">Close</button>
			  <input type="submit" class="btn btn-danger" value="Save Changes" ></input>
			</div>
          </form>
		  
        </div>
        
      </div>
    </div>
  </div>
</div>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>
