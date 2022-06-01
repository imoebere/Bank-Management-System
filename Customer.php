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
    
  </div>
</nav>
</header>
<?php 
          session_start();
          include 'DB/connect.php';
          $id2 = $_SESSION['gone'];
          $select = "SELECT * FROM Customer_tbl where id ='$id2'";
              $query=mysqli_query($conn,$select);
              $row_num = mysqli_num_rows($query);
              while ($row=mysqli_fetch_assoc($query)){
                    $id = $row ['id'];
                    $Customer_name = $row ['Customer_name'];
                    $Email = $row ['Email'];
                    $phone = $row ['phone'];
                    $DOB = $row ['DOB'];
                    $Customer_ID = $row ['Customer_ID'];
              }
          ?>
   <!--### The Main container ###-->
<div class="container-fluid px-4 py-5">
    <div class="row  g-lg-5 py-5">
        <!--### Nav Bar ###-->
      <div class="col-lg-3">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <div class="input-group mb-3">
                        <strong><a class="active w-100 btn btn-lg btn-outline-primary" aria-current="page" href="Customer.php"><?php echo "Welcome  ".$Customer_name;?></a></strong>
                    </div>
                </li>
                    <li class="nav-item dropdown">
                        <a class="w-80 btn btn-lg btn-outline-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Manage Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Balance.php">Balance Enquiry</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Fund_Transfer.php">Fund Transfer</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Change_Password.php">Change Password</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Mini_Stmt.php">Mini Statement</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="Customized_Stmt.php">Customized Statement</a></li>
                            <li><a class="w-100 btn btn-lg dropdown-item" href="LogOut.php">LogOut</a></li>
                        </ul>
                    </li>
            </ul>
      </div>
      <!--### Content ###-->
      <div class="col-md-10 col-lg-6">
            <form class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>FULL NAME:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo $Customer_name;?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>E-MAIL:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo $Email;?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>MOBILE NUMBER:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo $phone;?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>DATE OF BIRTH:</strong></span>
                    <input type="text" class="form-control" readonly value="<?php echo $DOB;?>" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </form>
                
      </div>
    </div>
</div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>