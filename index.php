<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ### Bootstrap CSS ###-->
    <link href="CSS/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="CSS/bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <title>Banking System</title>
</head>
<body>
     <!--### Nav Bar ###-->
<header>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">BANKING SYSTEM</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
   <!--### The Main container ###-->
   <div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">BANKING SYSTEM</h1>
        <p class="col-lg-10 fs-4">Online banking allows a user to conduct financial transactions via the Internet. 
            Online banking is also known as Internet banking or web banking</p>
      </div>
      <!--### Login Container ###-->
      <div class="col-md-10 mx-auto col-lg-5">
        <form method="post" enctype="multipart/form-data" class="p-4 p-md-5 border rounded-3 bg-light">
        <h4>LOGIN </h4>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" autocomplete="off" id="floatingInput" required placeholder="name@example.com" name="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" required placeholder="Password" name="pwd">
            <label for="floatingPassword">Password</label>
          </div>
         
          <button class="w-100 btn btn-lg btn-primary" type="submit" name="Login">Login</button>
          <hr class="my-4">
        
         <?php 
          session_start();
          include 'DB/connect.php';
          if(isset($_POST['Login'])){
              $username = trim($_POST['username']);
              $pwd = trim($_POST['pwd']);
              $select = "SELECT * FROM Admin_tbl where username ='$username' and password = '$pwd'";
              $query=mysqli_query($conn,$select);
              $row_num = mysqli_num_rows($query);
              while ($row=mysqli_fetch_assoc($query)){
                    $id = $row ['id'];
                    $user = $row ['username'];
              }
              if ($row_num>0){
                $_SESSION['go'] = $id;
                //header error
                header('location: Manager/Manager.php');
              }
              $sel = "SELECT * FROM Customer_tbl where Customer_ID ='$username' and pwd = '$pwd'";
              $query1=mysqli_query($conn,$sel);
              $row_num1 = mysqli_num_rows($query1);
              while ($row1=mysqli_fetch_assoc($query1)){
                    $id1 = $row1 ['id'];
                    $Customer_name = $row1 ['Customer_name'];
              }
                    if($row_num1>0){
                      $_SESSION['gone'] = $id1;
                      $insert = "INSERT INTO Login_Tbl (Email,pwd)
                          VALUES('$username','$pwd')";
                          $result=mysqli_query($conn,$insert);
                          echo"<META http-equiv='refresh' content='0;URL=Customer.php'>";
                      
                        }else{?>
                          <div class="alert alert-warning">
                              <strong>Invalid Login Detail!</strong><br/>
                          </div>
                        <?php } } ?>
        </form>
      </div>
    </div>
  </div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>