<?php

//include constants.php file here
include('../config/constants.php');


//1.get the id of admin to be deleted
$id = $_GET['id'];

//2.create SQL query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//execute the query
$res = mysqli_query($conn, $sql);

//check whether the query executed successfully or not
if($res==true)
{
    //query executed successfully and admin deleted
    //echo "admin deleted";
    //create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else
{
    //failed to delete admin
    //echo "failed to delete admin";

    $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}

//3.redirect to manage admin page with message (success/error)

?>