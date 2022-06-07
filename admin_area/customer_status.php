<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['customer_status'])){

$status_id = $_GET['customer_status'];

$requet = "SELECT * FROM customers WHERE customer_id='$status_id'";

$run_cus = mysqli_query($con,$requet);

if($row_cus = mysqli_fetch_array($run_cus)){

$cus_status = $row_cus['customer_status'];
echo $cus_status;
if($cus_status=='inactive'){
    $status_customer = "UPDATE customers SET customer_status='active' WHERE customer_id='$status_id'";

    $run_status = mysqli_query($con,$status_customer);
    if($run_status){

        echo "<script>alert('Status Customer Has Been Updated')</script>";
        
        echo "<script>window.open('index.php?view_customers','_self')</script>";
        
        }
}elseif($cus_status=='active'){
    $status_customer1 = "UPDATE customers SET customer_status='inactive' WHERE customer_id='$status_id'";

    $run_status1 = mysqli_query($con,$status_customer1);
    if($run_status1){

        echo "<script>alert('Status Customer Has Been Updated')</script>";
        
        echo "<script>window.open('index.php?view_customers','_self')</script>";
        
        
        }
}
 
}





}


?>




<?php } ?>