<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        
        <br /> <br />

        <?php 
        
            if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //Display Session Message
                    unset($_SESSION['add']); //Removing session message
                }
            if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
            if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
            if(isset($_SESSION['changed-pwd']))
                {
                    echo $_SESSION['changed-pwd'];
                    unset($_SESSION['changed-pwd']);
                }
                
                


        ?>

        <br><br><br>

        <!--Button to Add Admin-->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        
        <br /> <br /> <br />

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>


            <?php 
            
            //query to get all admin
            $sql = "SELECT * FROM tbl_admin";
            //execute query
            $res = mysqli_query($conn, $sql);

            //check whether the query is executed of not
            if($res==TRUE)
            {
                //count rows to check whether have data in database or not
                $count = mysqli_num_rows($res); //function to get all the rows in database

                $sn=1; //create a variable and assign value

                //check the num of rows
                if($count>0)
                {
                    //have data in database
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        //using while loop get all the data from databse.
                        //while loop will run as data in database

                        //get individual data
                        $id=$rows['id'];
                        $full_name=$rows['full_name'];
                        $username=$rows['username'];

                        //Display the the value in our table
                        ?>

                            <tr>
                                <td><?php echo $sn++; ?>.</td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?>x</td>
                                <td>
                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            
                                </td>
                            </tr>

                        <?php
                    }
                }
                else
                {
                    //Do not have data in database
                }
            }
            
            ?>

        </table>
    </div>
</div>


<?php include('partials/footer.php')?>