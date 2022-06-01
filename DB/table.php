<?php 
include ('connect.php'); 

//Customer table 
$Customer_tbl = "create table Customer_tbl (
                id int not null AUTO_INCREMENT PRIMARY KEY,
                Customer_name VARCHAR(200) not null,
                Gender VARCHAR(7) not null,
                DOB VARCHAR(11) not null,
                Address VARCHAR(200) not null,
                City VARCHAR(100) not null,
                State VARCHAR(50) not null,
                PIN VARCHAR(6) not null,
                phone VARCHAR(15) not null,
                Email VARCHAR(50) not null,
                pwd VARCHAR(15) NOT NULL,
                Customer_ID VARCHAR(6) NOT NULL,
                datess TIMESTAMP
                )";
if (mysqli_query($conn, $Customer_tbl)) {
    echo "Customer Table created successfully"."<br/>";
} else {
    echo "Error creating Customer Table: "."<br/>" . mysqli_error($conn);
}
//Login Table
$Login_Tbl = "create table Login_Tbl (
            id int not null AUTO_INCREMENT PRIMARY KEY,
            Email VARCHAR(50) not null,
            pwd VARCHAR(15) NOT NULL,
            datess TIMESTAMP
            )";
    
if (mysqli_query($conn, $Login_Tbl)) {
    echo "Login Table created successfully"."<br/>";
} else {
    echo "Error creating Login Table: "."<br/>" . mysqli_error($conn);
}
//Account Table 
$Account_tbl = "create table Account_tbl (
                id int not null AUTO_INCREMENT PRIMARY KEY,
                Customer_ID VARCHAR(6) not null,
                Acc_Type VARCHAR(8) not null,
                Acc_No  VARCHAR(11) NOT NULL,
                Deposit VARCHAR(200) NOT NULL,
                Withdrawal VARCHAR(200) NOT NULL,
                Description VARCHAR(200) NOT NULL,
                Balance VARCHAR(200) NOT NULL,
                datess TIMESTAMP
                )";
if (mysqli_query($conn, $Account_tbl)) {
    echo "Account Table created successfully"."<br/>";
} else {
    echo "Error creating Account Table: "."<br/>" . mysqli_error($conn);
}
//Admin table
$Admin_tbl = "create table Admin_tbl (
            id int not null AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(50) NOT NULL,
            datess TIMESTAMP
            )";
$insert="INSERT INTO Admin_tbl (username,password)VALUES('Bank_Manager@Bank','Manager2000')";
$check=mysqli_query($conn, $insert);
if (mysqli_query($conn, $Admin_tbl)) {
        echo "Admin Table created successfully"."<br/>";
} else {
        echo "Error creating table: "."<br/>" . mysqli_error($conn);
    }
    $sqltr="SELECT * FROM Admin_tbl WHERE username='Bank_Manager@Bank' and password='Manager2000'";
    $resultr=mysqli_query($conn,$sqltr);
    //$countre=mysqli_num_rows($resultr);

    
mysqli_close($conn);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table Creation</title>
</head>

<body>
</body>
</html>