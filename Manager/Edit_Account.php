<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ### Bootstrap CSS ###-->
    <link href="../CSS/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../CSS/bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
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
          include '../DB/connect.php';
          $id2 = $_SESSION['go'];
          $select = "SELECT * FROM Admin_tbl where id ='$id2'";
              $query=mysqli_query($conn,$select);
              $row_num = mysqli_num_rows($query);
              while ($row=mysqli_fetch_assoc($query)){
                    $id = $row ['id'];
                    $user = $row ['username'];
                    $password = $row ['password'];
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
                        <strong><a class="active w-100 btn btn-lg btn-outline-primary" aria-current="page" href="Manager.php"><?php echo "Welcome  " .substr($user,0,12);?></a></strong>
                    </div>
                </li>

                <div class="input-group mb-3">
                    <li class="nav-item dropdown">
                            <a class="w-80 btn btn-lg btn-outline-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Customer
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="w-100 btn btn-lg dropdown-item" href="New_Customer.php">New Customer</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Edit_Customer.php">Edit Customer</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Delete_Customer.php">Delete Customer</a></li>
                            </ul>
                    </li>
                </div>

                <div class="input-group mb-3">
                    <li class="nav-item dropdown">
                            <a class="w-80 btn btn-lg btn-outline-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Account
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="w-100 btn btn-lg dropdown-item" href="New_Account.php">New Account</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Edit_Account.php">Edit Account</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Delete_Account.php">Delete Account</a></li>
                            </ul>
                    </li>
                </div>

                <div class="input-group mb-3">
                    <li class="nav-item dropdown">
                            <a class="w-80 btn btn-lg btn-outline-primary dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Others
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Deposit.php">Deposit</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Withdrawal.php">Withdrawal</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Fund_Transfer.php">Fund Transfer</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Change_Password.php">Change Password</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Balance_Enquiry.php">Balance Enquiry</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Mini_Statement.php">Mini Statement</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="Customized_Statement.php">Customized Statement</a></li>
                                <li><a class="w-100 btn btn-lg dropdown-item" href="#">Log Out</a></li>
                            </ul>
                    </li>
                </div>
            </ul>
      </div>
      <!--### Content ###-->
      <div class="col-md-10 col-lg-6">
            
        <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>ACCOUNT NUMBER:</strong></span>
                    <input type="number" class="form-control" required name="acc" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-primary" name="Submit">Submit</button>
                </div>
                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-primary">Reset</button>
                </div>
                <?php 
                    if(isset($_POST['Submit'])){
                        $acc = trim($_POST['acc']);
                        $select = "SELECT * FROM Account_tbl WHERE Acc_No='$acc'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_assoc($query)){
                                $Customer_ID = $row ['Customer_ID'];
                                $Acc_Type = $row ['Acc_Type'];
                                $Balance = $row ['Balance'];
                        }?>
                   
            
            </form>   

            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
            <h3>EDIT ACCOUNT</h3>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>ACCOUNT TYPE:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $Acc_Type; ?>" readonly name="acc_type" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>BALANCE:</strong></span>
                    <input type="text" class="form-control" value="<?php echo $Balance; ?>" readonly name="balance" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-primary" name="Submit">Submit</button>
                </div>
                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-primary">Reset</button>
                </div>
            </form>   
            <?php  }
                
            ?>
      </div>
    </div>
</div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="../JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>