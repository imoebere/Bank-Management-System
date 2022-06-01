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
                                <li><a class="w-100 btn btn-lg dropdown-item" href="../LogOut.php">Log Out</a></li>
                            </ul>
                    </li>
                </div>
            </ul>
      </div>
      <!--### Content ###-->
      <div class="col-md-10 col-lg-6">
            <?php 
                  if (isset($_POST['Submit'])){
                    $name = trim($_POST['name']);
                    $gender = trim($_POST['gender']);
                    $dob = trim($_POST['dob']);
                    $address = trim($_POST['address']);
                    $city = trim($_POST['city']);
                    $state = trim($_POST['state']);
                    $pin = trim($_POST['pin']);
                    $phone = trim($_POST['phone']);
                    $email = trim(strtolower($_POST['email']));
                    $pwd = chr(rand(65, 122)).chr(rand(65, 90)).chr(rand(58,96)).rand(12345, 50000).chr(rand(32,126)).chr(rand(97,122)).chr(rand(90,65));
                    $Customer_ID = rand(999, 246).rand(123, 321);
                    $select = "SELECT * FROM Customer_tbl where Customer_name ='$name'";
                    $query=mysqli_query($conn,$select);
                    $row_num = mysqli_num_rows($query);
                    if ($row_num>0){
                        echo '<script type="text/javascript">alert("CUSTOMER ALREADY HAVE AN ID!")</script>'.'<br>';
                        echo '<script type="text/javascript">alert("YOU CAN CREATE NEW ACCOUNT FOR THE CUSTOMER!")</script>'.'<br>';
                    }else{
                      $insert = "INSERT INTO Customer_tbl (Customer_name,Gender,DOB,Address,City,State,PIN,phone,Email,pwd,Customer_ID)
                      VALUES('$name','$gender','$dob','$address','$city','$state','$pin','$phone','$email','$pwd','$Customer_ID')";
                      $result=mysqli_query($conn,$insert);
                      if ($insert){
                        echo "<h3>YOUR PASSWORD IS:  {$pwd} </h3>";
                        echo "<h3>YOUR CUSTOMER ID:  {$Customer_ID}</h3>";
                          //header("location: New_Customer.php");
                         // echo"<META http-equiv='refresh' content='0;URL=New_Customer.php'>";
                      }}} ?>
            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
            <h3>ADD NEW CUSTOMER</h3>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>CUSTOMER NAME:</strong></span>
                    <input type="text" class="form-control"  required name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><strong>GENDER:</strong></label>
                    <select class="form-select" name="gender" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>DATE OF BIRTH:</strong></span>
                    <input type="date" class="form-control" required name="dob" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><strong>ADDRESS:</strong></span>
                    <textarea class="form-control" row="5" required name="address"aria-label="With textarea"></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>CITY:</strong></span>
                    <input type="text" class="form-control"  required name="city" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01"><strong>STATE OF ORIGIN:</strong></label>
                    <select class="form-select" name="state" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="Abia">Abia</option>
                        <option value="Adamawa">Adamawa</option>
                        <option value="Akwa Ibom">Akwa Ibom</option>
                        <option value="Anambra">Anambra</option>
                        <option value="Bauchi">Bauchi</option>
                        <option value="Bayelsa">Bayelsa</option>
                        <option value="Benue">Benue</option>
                        <option value="Borno">Borno</option>
                        <option value="Cross River">Cross River</option>
                        <option value="Delta">Delta</option>
                        <option value="Ebonyi">Ebonyi</option>
                        <option value="Edo">Edo</option>
                        <option value="Ekiti">Ekiti</option>
                        <option value="Enugu">Enugu</option>
                        <option value="FCT">Federal Capital Territory</option>
                        <option value="Gombe">Gombe</option>
                        <option value="Imo">Imo</option>
                        <option value="Jigawa">Jigawa</option>
                        <option value="Kaduna">Kaduna</option>
                        <option value="Kano">Kano</option>
                        <option value="Katsina">Katsina</option>
                        <option value="Kebbi">Kebbi</option>
                        <option value="Kogi">Kogi</option>
                        <option value="Kwara">Kwara</option>
                        <option value="Lagos">Lagos</option>
                        <option value="Nasarawa">Nasarawa</option>
                        <option value="Niger">Niger</option>
                        <option value="Ogun">Ogun</option>
                        <option value="Ondo">Ondo</option>
                        <option value="Osun">Osun</option>
                        <option value="Oyo">Oyo</option>
                        <option value="Plateau">Plateau</option>
                        <option value="Rivers">Rivers</option>
                        <option value="Sokoto">Sokoto</option>
                        <option value="Taraba">Taraba</option>
                        <option value="Yobe">Yobe</option>
                        <option value="Zamfara">Zamfara</option>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>PIN: <i>(Must be 6 digit)</i></strong></span>
                    <input type="number" class="form-control" required name="pin" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>MOBILE NUMBER:</strong></span>
                    <input type="number" class="form-control" required name="phone" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>E-MAIL:</strong></span>
                    <input type="email" class="form-control" required name="email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-primary" name="Submit">Submit</button>
                </div>

                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-primary">Reset</button>
                </div>
                  
            </form>

                
      </div>
    </div>
</div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="../JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>