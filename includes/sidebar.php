<?php 

$aMan = array();
$aCat = array();
$aPcat = array();

// This is TOP  Begin //

if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){

    foreach($_REQUEST['man'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aMan[(int)$sVal] = (int)$sVal;

        }

    }

}





if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aCat[(int)$sVal] = (int)$sVal;

        }

    }

}



// This is for products_categories Begin //

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aPcat[(int)$sVal] = (int)$sVal;

        }

    }

}



?>

<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <h3 class="panel-title">
            Brands

            <div class="pull-right">
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show">

                        Hide
                    
                    </span>
                
                </a>
            
            </div>

        </h3>
    </div>

    <div class="panel-collapse collapse-data">
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-manufacturer" data-action="filter" placeholder="Choose Brands">

                    <a class="input-group-addon">

                        <i class="fa fa-search"></i>
                        
                    </a>

            </div>
            </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer">
                
                <?php 
                
                $get_manufacturer = "select * from manufacturers where manufacturer_top='yes'";
                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                    $manufacturer_image = $row_manufacturer['manufacturer_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aMan[$manufacturer_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer'>

                                <span>
                                $manufacturer_image
                                $manufacturer_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                $get_manufacturer = "select * from manufacturers where manufacturer_top='no'";
                $run_manufacturer = mysqli_query($con,$get_manufacturer);

                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){

                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                    $manufacturer_image = $row_manufacturer['manufacturer_image'];

                    if($manufacturer_image == ""){

                    }else{

                        $manufacturer_image = "<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                        <label>

                            <input ";
                            
                            if(isset($aMan[$manufacturer_id])){
                                echo "checked='checked'";
                            }
                            
                            echo " value='$manufacturer_id' type='checkbox' class='get_manufacturer' name='manufacturer'>

                            <span>
                            $manufacturer_image
                            $manufacturer_title
                            </span>

                        </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
                
            </ul>
        </div>

    </div>

</div>

<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        
        <h3 class="panel-title">
            Categories

            <div class="pull-right">
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show">
                    
                        Hide
                    
                    </span>
                
                </a>
            
            </div>

        </h3>
    </div>

    <div class="panel-collapse collapse-data">
    
        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-cat" data-action="filter" placeholder="Filter Categories">

                    <a class="input-group-addon">
                    
                        <i class="fa fa-search"></i>
                        
                    </a>

            </div>
            </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-cat">
                
                <?php 
                
                $get_cat = "select * from categories where cat_top='yes'";
                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    $cat_image = $row_cat['cat_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                        <label>

                            <input ";
                            
                            if(isset($aCat[$cat_id])){
                                echo "checked='checked'";
                            }
                            
                            echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                            <span>
                            $cat_image
                            $cat_title
                            </span>

                        </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                $get_cat = "select * from categories where cat_top='no'";
                $run_cat = mysqli_query($con,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    $cat_image = $row_cat['cat_image'];

                    if($cat_image == ""){

                    }else{

                        $cat_image = "<img src='admin_area/other_images/$cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aCat[$cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                                <span>
                                $cat_image
                                $cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
                
            </ul>
        </div>

    </div>

    
</div>

<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title">
            Product Categories

            <div class="pull-right">
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show">
                    
                        Hide
                    
                    </span>
                
                </a>
            
            </div>

        </h3>
    </div>

    <div class="panel-collapse collapse-data">

        <div class="panel-body">
            <div class="input-group">
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-p-cat" data-action="filter" placeholder="Filter Product Categories">

                    <a class="input-group-addon">
                    
                        <i class="fa fa-search"></i>
                        
                    </a>

            </div>
            </div>
        <div class="panel-body scroll-menu">
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cat">
                
                <?php 
                
                $get_p_cat = "select * from product_categories where p_cat_top='yes'";
                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['p_cat_id'];
                    $p_cat_title = $row_p_cat['p_cat_title'];
                    $p_cat_image = $row_p_cat['p_cat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aPcat[$p_cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                $get_p_cat = "select * from product_categories where p_cat_top='no'";
                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['p_cat_id'];
                    $p_cat_title = $row_p_cat['p_cat_title'];
                    $p_cat_image = $row_p_cat['p_cat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aPcat[$p_cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
                
            </ul>
        </div>

    </div>
    
</div>