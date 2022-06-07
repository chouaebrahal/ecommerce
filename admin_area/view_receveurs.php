
<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

    
?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Receveurs

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View receveurs

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Receveur No:</th>
<th>Receveur Name:</th>
<th>Receveur Email:</th>
<th>Receveur Image:</th>
<th>Receveur Country:</th>
<th>Receveur City:</th>
<th>Receveur Phone Number:</th>
<th>Receveur Status:</th>
<th>Receveur Delete:</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$i=0;

$get_c = "select * from receveurs";

$run_c = mysqli_query($con,$get_c);

while($row_c=mysqli_fetch_array($run_c)){

$c_id = $row_c['receveur_id'];

$c_name = $row_c['receveur_name'];

$c_email = $row_c['receveur_email'];

$c_image = $row_c['receveur_image'];

$c_country = $row_c['receveur_country'];

$c_city = $row_c['receveur_city'];

$c_contact = $row_c['receveur_contact'];

$c_status = $row_c['receveur_status'];

$i++;




?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $c_name; ?></td>

<td><?php echo $c_email; ?></td>

<td><img src="../user/receveur_images/<?php echo $c_image; ?>" width="60" height="60" ></td>

<td><?php echo $c_country; ?></td>

<td><?php echo $c_city; ?></td>

<td><?php echo $c_contact; ?></td>
<td>
<div class="btn btn-success" style="text-decoration:none;">
<a href="index.php?receveur_status=<?php echo $c_id; ?>" >

Active

</a>
</div>
</td>

<td>

<a href="index.php?receveur_delete=<?php echo $c_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

</a>


</td>


</tr>

<?php } ?>


</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 

<?php } ?>