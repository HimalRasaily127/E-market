<?php 

$active='Shop';
include("includes/header.php");

?>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Shop
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3 hidden-xs ">
   
                <?php 
                    
                    include("includes/sidebar.php");
                    
                    ?> 
                            
           </div>
           
           <div class="col-md-9">

                <div class='box'>
                    <h1>Shop</h1>
                    <p>
                        This is our shop page. here you can see verious type of product. you can choose any Products as you like. the take this product in add card 
                    </p>
                </div>
               
               <div id="products" class="row">

               <?php getProducts(); ?>
               
               </div>
               
               <center>
                   <ul class="pagination">

                        <?php getPaginator(); ?>

                   </ul>
               </center>
               
           </div>

           <div id="wait" style="position:absolute;top:40%;left:45%;padding: 200px 100px 100px 100px;"></div>
           
       </div>
   </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
   
   
     <?php 
                     
        include("includes/footer.php");
                     
    ?>
    
    <script>
    
        $(document).ready(function(){

            // Hide & Show Sidebar Toggle //

            $('.nav-toggle').click(function(){
                
                $('.panel-collapse,.collapse-data').slideToggle(700,function(){

                    if($(this).css('display')=='none'){

                        $(".hide-show").html('Show');

                    }else{

                        $(".hide-show").html('Hide');

                    }

                });

            });

            // Finish Hide & Show Sidebar Toggle //

            // Search Filters | by Letter // 

            $(function(){

                $.fn.extend({

                    filterTable: function(){

                        return this.each(function(){

                            $(this).on('keyup', function(){

                                var $this = $(this),
                                search = $this.val().toLowerCase(),
                                target = $this.attr('data-filters'),
                                handle = $(target),
                                rows = handle.find('li a');

                                if(search == ''){

                                    rows.show();

                                }else{

                                    rows.each(function(){

                                        var $this = $(this);

                                        $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();

                                    });

                                }
                            });

                        });

                    }

                });

                $('[data-action="filter"][id="dev-table-filter"]').filterTable();

            });

            // Finish Search Filters | by Letter //

        });
    
    </script>

    <script>
    
        $(document).ready(function(){

            // getProducts Function Begin //

            function getProducts(){

                // Code For Manufacturers Begin //

                var sPath = '';
                var aInputs = $('li').find('.get_manufacturer');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'man[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Manufacturers Finish //

                // Code For Product Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_p_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Product Categories Finish //

                // Code For Categories Begin //

                var aInputs = Array();
                var aInputs = $('li').find('.get_cat');
                var aKeys = Array();
                var aValues = Array();

                iKey = 0;

                $.each(aInputs, function(key, oInput){

                    if(oInput.checked){

                        aKeys[iKey] = oInput.value

                    };

                    iKey++;

                });

                if(aKeys.length>0){

                    var sPath = '';

                    for(var i = 0; i < aKeys.length; i++){

                        sPath = sPath + 'cat[]=' + aKeys[i]+'&';

                    }

                }

                // Code For Categories Finish //

                // Loader When Loading Begin //    

                $('#wait').html('<img src="images/load.gif"');

                // Loader When Loading Finish //  

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getProducts',

                    success:function(data){

                        $('#products').html('');
                        $('#products').html(data);
                        $('#wait').empty();

                    }

                });

                $.ajax({

                    url:"load.php",
                    method:"POST",

                    data: sPath+'sAction=getPaginator',

                    success:function(data){

                        $('.pagination').html('');
                        $('.pagination').html(data);

                    }

                });

            }

            // getProducts Function Finish //

            $('.get_manufacturer').click(function(){
                getProducts();
            });

            $('.get_p_cat').click(function(){
                getProducts();
            });

            $('.get_cat').click(function(){
                getProducts();
            });

        });
    
    </script>
    
  