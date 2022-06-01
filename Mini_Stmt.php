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
      <span class="navbar-toggler-icon">Customer</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
    </div>
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
                    $_SESSION['cust'] = $Customer_ID;
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
      <?php
        $CustomerId = $_SESSION['cust'];
      $select = "SELECT Acc_No FROM Account_tbl where Customer_ID ='$CustomerId'";
      $query=mysqli_query($conn,$select);
      $row_num = mysqli_num_rows($query);
      while ($row=mysqli_fetch_array($query)){
            $Acc_No[]= $row ['Acc_No'];
      }
      ?>
      <!--### Content ###-->
      <div class="col-md-10 col-lg-6">
            <form method="post" enctype="multipart/form-data" class="p-4  border rounded-3 bg-light">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default"><strong>ACCOUNT NUMBER:</strong></span>
                    <select class="form-select" name="Acc_No" required id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <?php for($i=0; $i<$row_num; $i++){ ?>
                        <option value="<?php echo $Acc_No[$i];?>"><?php echo $Acc_No[$i]; }?></option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="w-100 btn btn-lg btn-primary" name="Submit">Submit</button>
                </div>
                <div class="input-group mb-3">
                    <button type="reset" class="w-100 btn btn-lg btn-outline-primary">Reset</button>
                </div>
                <?php
                    if(isset($_POST['Submit'])){
                        $Acc_No = $_POST['Acc_No'];
                        $select = "SELECT Acc_No, SUM(Deposit) as Total, SUM(Withdrawal) as Total2 FROM Account_tbl where Acc_No ='$Acc_No'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_array($query)){
                            //$Customer_ID = $row['Customer_ID'];
                                $Acc_Num= $row ['Acc_No'];
                                $Deposit = $row ['Total'];
                                $Withdrawal = $row ['Total2'];
                                //$balance = $row ['Balance'];
                        }
                        if($row_num == 0){
                            echo "This Acount Number is invalid";
                        }else{
                            $balance = $Deposit - $Withdrawal;
                        $select = "SELECT Customer_name FROM Customer_tbl where Customer_ID ='$id2'";
                        $query=mysqli_query($conn,$select);
                        $row_num = mysqli_num_rows($query);
                        while ($row=mysqli_fetch_array($query)){
                                $Customer_name= $row ['Customer_name'];
                        }
                        echo "<table border='1' width='300px' height='200px'>";
                        echo   "<tr>
                            <th>CUSTOMER NAME: </th> 
                            <td> {$Customer_name}</td>
                            </tr>";
                        echo "<tr>
                            <th>ACCOUNT NUMBER:  </th>  
                            <td>  {$Acc_Num}</td>
                            </tr>";
                        echo   "<tr>
                            <th>DEPOSIT</th> 
                            <th>WITHDRAWAL</th>
                            </tr>";
                        echo "<tr>
                            <td>{$Deposit} </td>
                            <td> {$Withdrawal}</td>
                            </tr>";
                            echo "<tr>
                                <th>TOTAL BALANCE:  </th>
                                <td><strong> {$balance}</strong></td>
                                </tr>";
                                echo "</table>";
                    }
                }
               
                    ?>
            </form>
            
      </div>
    </div>
</div>
<!-- End The Main container-->








 <!-- ### Bootstrap JS ###-->
<script src="JS/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>