<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Delivery Address
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Delivery Address
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th> Reciver Name: </th>
                                <th> Reciver Phone: </th>
                                <th> Reciver E-mail: </th>
                                <th> Reciver Province: </th>
                                <th> Reciver District: </th>
                                <th> Reciver Municipality: </th>
                                <th> Reciver Word-number: </th>
                                <th>Reciver Location</th>
                                <th> Action: </th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                            <?php 
          
                                $i=0;
                                $c_id=$_GET['view_delivery_address'];
                            
                                $get_address = "select * from order_reciver_details where customer_id='$c_id'";
                                
                                $run_address = mysqli_query($con,$get_address);
          
                                while($row_address=mysqli_fetch_array($run_address)){

                                    
                                   $Reciver_name=$row_address['reciver_name'];
                                    
                                   $Reciver_phone=$row_address['reciver_phone'];
                                    
                                   $Reciver_email=$row_address['reciver_email'];
                                    
                                   $Reciver_provine=$row_address['reciver_province'];
                                    
                                   $Reciver_district=$row_address['reciver_district'];

                                   $Reciver_municipality=$row_address['reciver_Rural_municipality'];

                                   $Reciver_word_no=$row_address['reciver_word_no'];

                                   $Reciver_location=$row_address['reciver_location'];

                                    $i++;
                            
                            ?>
                            
                            <tr><!-- tr begin -->
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo $Reciver_name; ?> </td>
                                <td> <?php echo $Reciver_phone; ?> </td>
                                <td> <?php echo $Reciver_email; ?></td>
                                <td> <?php echo $Reciver_provine; ?> </td>
                                <td> <?php echo $Reciver_district; ?></td>
                                <td> <?php echo $Reciver_municipality; ?> </td>
                                <td> <?php echo $Reciver_word_no; ?> </td>
                                <td> <?php echo $Reciver_location; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_delivery_address=<?php echo $c_id; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                
                            </tr><!-- tr finish -->
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php } ?>