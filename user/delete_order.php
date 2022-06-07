<?php
  session_start();
  $con = mysqli_connect("localhost","root","","ecom_store");
  if(isset($_GET['order_id'])){
    if(isset($_SESSION['customer_email'])){

  
    $delete_id = $_GET['order_id'];
    
    $delete_order = "delete from customer_orders where order_id='$delete_id'";

    $delete_p_order = "delete from pending_orders where order_id='$delete_id'";
    
    $run_delete = mysqli_query($con,$delete_order);

    $run_p_delete = mysqli_query($con,$delete_p_order);
    
    if($run_delete){
    
    echo "<script>alert('One order  Has Been Deleted')</script>";
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
    }
}elseif(isset($_SESSION['receveur_email'])){
    $delete_id = $_GET['order_id'];
    
    $delete_order = "delete from receveur_orders where order_id='$delete_id'";

    $delete_p_order = "delete from receveur_pending_orders where order_id='$delete_id'";
    
    $run_delete = mysqli_query($con,$delete_order);
    
    $run_p_delete = mysqli_query($con,$delete_p_order);
    
    if($run_delete){
    
    echo "<script>alert('One order Has Been Deleted')</script>";
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    
    }
}
    
    }
?>