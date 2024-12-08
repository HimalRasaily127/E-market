<?php 

$active="requesting to cancel order";
$order_id = $_GET['order_id'];

include("includes/header.php");
?>

<div class="row">
    <div class="col-md-3">
        <?php include("includes/sidebar.php"); ?>
    </div>
    <div class="col-md-9">
        <?php include("cancel_order.php"); ?>
    </div>
</div>

<?php 
include("includes/footer.php");

