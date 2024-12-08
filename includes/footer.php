<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-3">
               
               <h4><?php echo $footer[$language][0];?></h4>
                
                <ul>
                    <li><a href="cart.php?language=<?php echo $language;?>"><?php echo $footer[$language][1];?></a></li>
                    <li><a href="contact.php?language=<?php echo $language;?>"><?php echo $footer[$language][2];?></a></li>
                    <li><a href="shop.php?language=<?php echo $language;?>"><?php echo $footer[$language][3];?></a></li>
                    <li><a href="../customer/my_account.php?language=<?php echo $language;?>"><?php echo $footer[$language][4];?></a></li>
                </ul>
                
                <hr>
                
                <h4><?php echo $footer[$language][5];?></h4>
                
                <ul>
                           
                           <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                               
                               echo"<a href='checkout.php?language=$language'>Login</a>";
                               
                           }else{
                               
                              echo"<a href='../customer/my_account.php?my_orders&language=$language'>My Account</a>"; 
                               
                           }
                           
                           ?>
                    
                    <li><a href="customer_register.php?language=<?php echo $language;?>">Register</a></li>
                    <li><a href="terms.php?language=<?php echo $language;?>"><?php echo $footer[$language][6];?></a></li>
                </ul>
                
                <hr class="hidden-md hidden-lg hidden-sm">
                
            </div>
            
            <div class="com-sm-6 col-md-3">
                
                <h4><?php echo $footer[$language][7];?></h4>
                
                <ul>
                
                    <?php 
                    
                        $get_p_cats = "select * from product_categories";
                    
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                    
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            
                            echo "
                            
                                <li>
                                
                                    <a href='shop.php?p_cat=$p_cat_id'>
                                    
                                        $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            
                            ";
                            
                        }
                    
                    ?>
                
                </ul>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4 style="color:crimson;"><?php echo $footer[$language][8];?></h4>
                
                
                <p>
                    
                    <strong><?php echo $footer[$language][9];?></strong>
                    <br/><?php echo $footer[$language][10];?>
                    <br/><a href="tel:+977-1-555-5555">+977-1-555-5555</a>
                    <br/><a href="mailto:himalrasaily@gmail.com">himalrasaily@gmail.com</a>
                    <br/><strong>Group A</strong>
                    
                </p>
                
                <a href="contact.php?language=<?php echo $language;?>"><?php echo $footer[$language][11];?></a>
                
                <hr class="hidden-md hidden-lg">
                
            </div>
            
            <div class="col-sm-6 col-md-3">
                
                <h4><?php echo $footer[$language][12];?></h4>
                
                <p class="text-muted">
                   
                </p>
                
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=M-devMedia', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="post">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="email">
                        
                        <input type="hidden" value="M-devMedia" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        
                        <span class="input-group-btn">
                            
                            <input type="submit" value="subscribe" class="btn btn-danger">
                            
                        </span>
                        
                    </div>
                </form>

                <hr>
                
                <h4>Keep In Touch</h4>
                
                <p class="social">
                    <a href="https://www.facebook.com" class="fa fa-facebook fa-1x"></a>
                    <a href="https://twitter.com/HimalRasaily12" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="https://www.linkedin.com/in/himal-rasaily-742319274/" class="fa fa-linkedin"></a>
                    <a href="https://plus.google.com" class="fa fa-google"></a>
                    <a href="https://www.youtube.com" class="fa fa-youtube"></a>
                </p>
                
            </div>
        </div>
    </div>
</div>


<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            
        <p class="pull-left">&copy; 2024 - <span style="color:crimson;"><?php echo date("Y"."/"."m"); ?></span><?php echo $footer[$language][13];?></p>
            
        </div>
        <div class="col-md-6">
            
            <p class="pull-right"><?php echo $footer[$language][14];?></p>
            
        </div>
    </div>
</div>
</body>
</html>
