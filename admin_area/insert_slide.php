<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li>
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Slide
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Slide
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group 1 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Name 
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_name" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 1 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Url
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input name="slide_url" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide for
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <select name="slide_type" class="form-control"><!-- form-control begin -->
                                <option value="mobile"> mobile </option>
                                <option value="desktop"> side </option>
                            </select><!-- form-control finish -->
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    <div class="form-group"><!-- form-group 3 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                            Slide Image
                        
                        </label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="file" name="slide_image" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 3 finish -->
                    <div class="form-group"><!-- form-group 4 begin -->
                    
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --></label><!-- control-label col-md-3 finish --> 
                        
                        <div class="col-md-6"><!-- col-md-6 begin -->
                        
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 4 finish -->
                </form><!-- form-horizontal finish -->
            </div><!-- panel-body finish -->
            
        </div><!-- panel panel-default finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 2 finish -->

<?php  

    if(isset($_POST['submit'])){
        
        $slide_name = $_POST['slide_name'];
        
        $slide_url = $_POST['slide_url'];
        
        $slide_type = $_POST['slide_type'];
        
        $slide_image = $_FILES['slide_image']['name'];
        
        $temp_name = $_FILES['slide_image']['tmp_name'];
        
        $view_slides = "select * from slider";
        
        $view_run_slide = mysqli_query($con,$view_slides);
        
        $count = mysqli_num_rows($view_run_slide);
        
        $mobile_count = 0;
        $slide_count = 0;
        
        $view_slides = "select * from slider";
        
        $view_run_slide = mysqli_query($con,$view_slides);
        
        while($row_slides = mysqli_fetch_array($view_run_slide)){
            
            if($row_slides['type']=="mobile"){
                
                $mobile_count++;
                
            }elseif($row_slides['type']=="desktop"){
                
                $slide_count++;
                
            }
            
        }
        
        if($slide_type=="mobile" and $mobile_count<4){
            
            move_uploaded_file($temp_name,"slides_images/$slide_image");
            
            $insert_slide = "insert into slider (slide_name,slide_url,type, slide_image) values ('$slide_name','$slide_url','$slide_type','$slide_image')";
            
            $run_slide = mysqli_query($con,$insert_slide);
            
            echo "<script>alert('Your new slide image has been inserted')</script>";
            
            echo "<script>window.open('index.php?view_slides','_self')</script>";
            
        }elseif($slide_type=="desktop" and $slide_count<4){
            
            move_uploaded_file($temp_name,"slides_images/$slide_image");
            
            $insert_slide = "insert into slider (slide_name,slide_url,type, slide_image) values ('$slide_name','$slide_url','$slide_type','$slide_image')";
            
            $run_slide = mysqli_query($con,$insert_slide);
            
            echo "<script>alert('Your new slide image has been inserted')</script>";
            
            echo "<script>window.open('index.php?view_slides','_self')</script>";
            
        }else{
            
           echo "<script>alert('You have already inserted 4 slides')</script>"; 
            
        }
        
    }

?>

<?php } ?>