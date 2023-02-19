<?php include('partials/menu.php'); ?>
        
        <!-- Main content start -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
                <br><br>
                
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; //display session message
                        unset($_SESSION['add']); //removing session message
                    }
                ?>

                 <br><br>       

                <!-- btn to add -->
                <a href="add_admin.php" class="btn-primary">Add Admin</a>
                
                <br><br><br> 
                
            <table class="table-full">
                <tr>
                    <th>Number</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //query to get all admin
                    $sql = "SELECT * FROM admin";

                    //execute query
                    $res = mysqli_query($conn, $sql);

                    //check if query is executed
                    if($res == TRUE)
                    {
                        //count rows to check if we have data in db
                        $count = mysqli_num_rows($res);  //fn to get all rows from db

                        $sn = 1; //create variable and assign the value

                        //check num of rows
                        if($count > 0)
                        {
                            //we have data
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                //while loop to get all data from db
                                //individual data
                                $id = $rows['id'];
                                $fullname = $rows['fullname'];
                                $username = $rows['username'];

                                //display values in table
                                ?>

                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $fullname ?></td>
                                        <td><?php echo $username ?></td>
                                        <td>
                                            <a href="#" class="btn-secondary">Update Admin</a>
                                            <a href="#" class="btn-delete">Delete Admin</a>
                                        </td>
                                    </tr>

                                <?php
                            }
                        }
                        else
                        {
                            //no data
                        }
                    }
                ?>
                
                </table>
                
            </div>
        </div>  
        <!-- Main content end -->
        
<?php include('partials/footer.php'); ?>