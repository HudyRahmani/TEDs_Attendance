<?php require_once("connection.php"); ?>
<?php 

		$employee_row = mysqli_query($con,"SELECT * FROM employee");
		
		if(isset($_GET["search"])){ 
			$search = $_GET["search"];
			$employee_row = mysqli_query($con,"SELECT * FROM employee where fullname like '%$search%'");	
		
		}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>record | page</title>
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
          <h3><i class="fa fa-pencil"></i>Employee List</h3>
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
        <div class="col-md-6 ml-auto">
		<form>
          <div class="input-group">
		
				<input type="text" class="form-control" name="search" placeholder="Search here by Full Name">
				<span class="input-group-btn">
				  <input type="submit" value="Search"  class="btn btn-danger form-control"></input>
				</span>
			
          </div>
		  </form>
        </div>
      </div>
    </div>
  </section>
	
  <!-- Record -->
  <section id="record">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>List Of Employee</h4>
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
            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
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
Copyright &copy; All rights reserved | This template is made by <a class="text-danger" href="https://hudy.com" target="_blank">Hudy Rahmani</a>
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
