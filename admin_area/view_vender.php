<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Dashboard / View Venders
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Venders
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th> No: </th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Number</th>
                                <th>Logo</th>
                                <th>Address</th>
                                <th>Discription</th>
                                <th>want to sell</th>
                                <th>status</th>
                                <th class="text-center">Action</th>

                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                        <?php 
                                $get_vendors = "select * from vendors";
                                $run_vendors = mysqli_query($con, $get_vendors);
                                
                                while($row_vendors = mysqli_fetch_array($run_vendors)){
                                    $vendor_id = $row_vendors['vendor_id'];
                                    $vendor_name = $row_vendors['vendor_name'];
                                    $vendor_email = $row_vendors['vendor_email'];
                                    $vendor_number= $row_vendors['vendor_contact'];
                                    $v_province=$row_vendors['vendor_province'];
                                    $v_district=$row_vendors['vendor_district'];
                                    $v_rural=$row_vendors['vendor_Rural_municipality'];
                                    $v_word=$row_vendors['vendor_word_no'];
                                    $v_logo=$row_vendors['vendor_image'];
                                    $v_dis=$row_vendors['vendor_bio'];
                                    $v_cat=$row_vendors['vendor_category'];
                                    $vendor_status = $row_vendors['status'];

                                    
                                    echo "<tr>
                                            <td>$vendor_id</td>
                                            <td>$vendor_name</td>
                                            <td>$vendor_email</td>
                                            <td>$vendor_number</td>
                                            <td>$v_logo</td>
                                            
                                            <td>$v_district</td>
                                            <td>$v_dis</td>
                                             <td>$v_cat</td>

                                            <td>$vendor_status</td>
                                            <td>
                                                <form method='post' action='' style='display: flex;align-items: center;justify-content: center;'>
                                                    <input type='hidden' name='vendor_id' value='$vendor_id'>
                                                    <select name='new_status' class='form-control' style='margin-right: 10px;'>
                                                        <option value='active'>Active</option>
                                                        <option value='inactive'>Inactive</option>
                                                    </select>
                                                    <button type='submit' name='update_status' class='btn btn-primary' style='margin-left: 10px;margin-right: 10px;'>Update</button>
                                                     <a href='index.php?delete_vendor=$vendor_id'>
                                     
                                                        <i class='fa fa-trash-o'></i> Delete
                                                    
                                                    </a> 
                                                </form>
                                            </td>
                                         </tr>";
                                }
                            ?>

                            
                            <?php } ?>
                            
                        </tbody><!-- tbody finish -->
                        
                    </table><!-- table table-striped table-bordered table-hover finish -->
                </div><!-- table-responsive finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->
<?php
if(isset($_POST['update_status'])){
    $vendor_id = $_POST['vendor_id'];
    $new_status = $_POST['new_status'];
    
    $update_vendor_status = "update vendors set status='$new_status' where vendor_id='$vendor_id'";
    $run_update = mysqli_query($con, $update_vendor_status);
    
    if($run_update){
        echo "<script>alert('Vendor status updated successfully');</script>";
        echo "<script>window.open('index.php?view_vender','_self');</script>"; // replace 'current_page.php' with the actual page name
    }
}
?>