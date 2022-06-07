<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['receveur_delete'])){

$delete_id = $_GET['receveur_delete'];

$delete_receveur = "delete from receveurs where receveur_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_receveur);


if($run_delete){

echo "<script>alert('Receveur Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_receveurs','_self')</script>";


}

}


?>




<?php } ?>