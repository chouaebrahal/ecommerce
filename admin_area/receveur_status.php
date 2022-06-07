<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['receveur_status'])){

$status_id = $_GET['receveur_status'];

$requet = "SELECT * FROM receveurs WHERE receveur_id='$status_id'";

$run_cus = mysqli_query($con,$requet);

if($row_cus = mysqli_fetch_array($run_cus)){

$cus_status = $row_cus['receveur_status'];
echo $cus_status;
if($cus_status=='inactive'||$cus_status==""){
    $status_receveur = "UPDATE receveurs SET receveur_status='active' WHERE receveur_id='$status_id'";

    $run_status = mysqli_query($con,$status_receveur);
    if($run_status){

        echo "<script>alert('Status receveur Has Been Updated')</script>";
        
        echo "<script>window.open('index.php?view_receveurs','_self')</script>";
        
        }
}elseif($cus_status=='active'){
    $status_receveur1 = "UPDATE receveurs SET receveur_status='inactive' WHERE receveur_id='$status_id'";

    $run_status1 = mysqli_query($con,$status_receveur1);
    if($run_status1){

        echo "<script>alert('Status receveur Has Been Updated')</script>";
        
        echo "<script>window.open('index.php?view_receveurs','_self')</script>";
        
        
        }
}
 
}





}


?>




<?php } ?>