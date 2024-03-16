<?php include('partials/menu.php')?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br><br>

    <?php
    
    if(isset($_SESSION['add'])) //checking whether the session is set or not
    {
        echo $_SESSION['add']; //Display the Session Message
        unset($_SESSION['add']); //Remove session message
    }

    ?>

    <form action="" method="POST">

        <table class="tbl-30">

            <tr>
                <td>Full Name</td>
                <td>
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </td>
            </tr>

            <tr>
                <td>User Name</td>
                <td>
                    <input type="text" name="username" placeholder="Enter User Name">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="password" placeholder="Enter Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>

        </table>
    </form>
  </div>  
</div>

<?php include('partials/footer.php')?>

<?php

    //process the value from form and save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit'])) {
        // Check if form fields are not empty
        if(!empty($_POST['full_name']) && !empty($_POST['username']) && !empty($_POST['password'])) {
            // Get the Data from form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']); //password encryption with MD5
    
            // SQL Query to save the data into database
            $sql = "INSERT INTO tbl_admin SET
                    full_name = '$full_name',
                    username = '$username',
                    password = '$password'
            ";
    
            // Execute Query and Save Data in Database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());
    
            // Check whether the query is executed, data is inserted or not and display appropriate message
            if($res==TRUE) {
                $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
                header("location:".SITEURL.'admin/manage-admin.php');
                exit(); // Exit to avoid executing code below unnecessarily
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to add Admin. </div>";
                header("location:".SITEURL.'admin/manage-admin.php');
                exit();
            }
        } else {
            // Form fields are empty, show error message
            $_SESSION['add'] = "<div class='error'>Error. All fields are required! </div>"; 
            header("location:".SITEURL.'admin/add-admin.php');
            exit();
        }
    }
    

?>