
                    <h1 class="text-center">Order Tracking</h1>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="order_id">Order Number</label>
                            <input type="text" class="form-control" id="order_id" name="order_id" placeholder="Enter Your Order Number">
                        </div>
                        <div class="form-group">
                            <label for="bc">invoice Number</label>
                            <input type="text" class="form-control" id="bc" name="bc" placeholder="Enter Your Bill Number">
                        </div>
                        <button type="submit" class="btn btn-primary" name="track_order">Track My Order</button>
                    </form>
                    <?php
                    if (isset($_POST['track_order'])) {
                        $order_id = $_POST['order_id'];
                        $bc = $_POST['bc'];
                        $get_order = "select * from pending_orders where order_id='$order_id' and invoice_no='$bc'";
                        $run_order = mysqli_query($con, $get_order);
                        $row_order = mysqli_fetch_array($run_order);
                        if (mysqli_num_rows($run_order) > 0) {
                            $order_status = $row_order['order_status'];
                            echo "<div class='alert alert-success'>Your Order Status is: $order_status</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Invalid Order Number or Bill Number</div>";
                        }
                    }
                    ?>
                </div>
    
