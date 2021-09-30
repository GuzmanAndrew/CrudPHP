<?php
// including the database connection file
include_once("conection.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$identification = mysqli_real_escape_string($mysqli, $_POST['identification']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($identification) || empty($email)) {
				
		if(empty($firstname)) {
			echo "<font color='red'>firstname field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>lastname field is empty.</font><br/>";
		}
		
		if(empty($identification)) {
			echo "<font color='red'>identification field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		//link to the previous plastname
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET first_name='$firstname',last_name='$lastname',identification='$identification',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$firstname = $res['first_name'];
	$lastname = $res['last_name'];
	$identification = $res['identification'];
	$email = $res['email'];
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Crud PHP</title>
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css">
  <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="./index.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create-user.php">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Create User</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="col-xl-12" style="position: relative; top: 128px;">
        <div class="card">
          <div class="card-header" style="background-color: #1c345d;">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0" style="color: white;">Create User</h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form action="edit.php" method="POST">
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">First Name</label>
                      <input type="text" id="input-username" name="firstname" value="<?php echo $firstname;?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Last Name</label>
                      <input type="text" id="input-email" name="lastname" value="<?php echo $lastname;?>" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Identification</label>
                      <input type="text" id="input-first-name" name="identification" value="<?php echo $identification;?>" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Email</label>
                      <input type="text" id="input-last-name" name="email" value="<?php echo $email;?>" class="form-control">
                    </div>
                  </div>
                </div>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <button type="submit" name="update" class="btn btn-success">Crear</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="./assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="./assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.2.0"></script>
</body>

</html>