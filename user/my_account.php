<?php

session_start();

if(!isset($_SESSION['customer_email'])&&!isset($_SESSION['receveur_email'])){

echo "<script>window.open('../checkout.php','_self')</script>";


}else {

include("includes/db.php");
include("../includes/header.php");
include("functions/functions.php");
include("includes/main.php");


?>
  <main>
    <!-- HERO -->
    <div class="nero">
      <div class="nero__heading">
        <span class="nero__bold">My </span>Account
      </div>
      <p class="nero__text">
      </p>
    </div>
  </main>

<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->



<div class="col-md-12"><!-- col-md-12 Starts -->

<?php
if(isset($_SESSION['customer_email'])){
$c_email = $_SESSION['customer_email'];

$get_user = "select * from customers where customer_email='$c_email'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_confirm_code = $row_user['customer_confirm_code'];

$c_name = $row_user['customer_name'];
}elseif(isset($_SESSION['receveur_email'])){
$c_email = $_SESSION['receveur_email'];

$get_user = "select * from receveurs where receveur_email='$c_email'";

$run_user = mysqli_query($con,$get_user);

$row_user = mysqli_fetch_array($run_user);

$user_confirm_code = $row_user['receveur_confirm_code'];

$c_name = $row_user['receveur_name'];
}

if(!empty($user_confirm_code)){

?>

<div class="alert alert-danger"><!-- alert alert-danger Starts -->

<strong> Warning! </strong> Please Confirm Your Email and if you have not received your confirmation email

<a href="my_account.php?send_email" class="alert-link">

Send Email Again

</a>

</div><!-- alert alert-danger Ends -->

<?php } ?>

</div><!-- col-md-12 Ends -->

<div class="col-md-3"><!-- col-md-3 Starts -->

<?php include("includes/sidebar.php"); ?>

</div><!-- col-md-3 Ends -->

<div class="col-md-9" ><!--- col-md-9 Starts -->

<div class="box" ><!-- box Starts -->

<?php

if(isset($_GET[$user_confirm_code])){
  if(isset($_SESSION['customer_email'])){
    $update_user = "update customers set customer_confirm_code='' where customer_confirm_code='$user_confirm_code'";

    $run_confirm = mysqli_query($con,$update_user);
  }elseif(isset($_SESSION['receveur_email'])){
    $update_user = "update receveurs set receveur_confirm_code='' where receveur_confirm_code='$user_confirm_code'";

    $run_confirm = mysqli_query($con,$update_user);
  }



echo "<script>alert('Your Email Has Been Confirmed')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}

if(isset($_GET['send_email'])){

$subject = "Email Confirmation Message";

$from = "chouaib.rahal2019@gmail.com";

$message = "

<h2>
Email Confirmation By Computerfever.com $c_name
</h2>

<a href='localhost/ecom_store/customer/my_account.php?$user_confirm_code'>

Click Here To Confirm Email

</a>

";

$headers = "From: $from \r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email,$subject,$message,$headers);

echo "<script>alert('Your Confirmation Email Has Been sent to you, check your inbox')</script>";

echo "<script>window.open('my_account.php?my_orders','_self')</script>";

}



if(isset($_GET['my_orders'])){

include("my_orders.php");

}

if(isset($_GET['pay_offline'])) {

include("pay_offline.php");

}

if(isset($_GET['edit_account'])) {

include("edit_account.php");

}

if(isset($_GET['change_pass'])){

include("change_pass.php");

}

if(isset($_GET['delete_account'])){

include("delete_account.php");

}

if(isset($_GET['my_wishlist'])){

include("my_wishlist.php");

}

if(isset($_GET['delete_wishlist'])){

include("delete_wishlist.php");

}

?>

</div><!-- box Ends -->


</div><!--- col-md-9 Ends -->

</div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("../includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>
<?php } ?>
