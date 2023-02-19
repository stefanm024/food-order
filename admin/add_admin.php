<?php include('partials/menu.php'); ?>


<div class="main-content">  
    <div class="wrapper">
        <h1>Add Admin</h1>
        
        <br><br>

        <?php
            if(isset($_SESSION['add'])){    //check if session is set or not
                echo $_SESSION['add'];      //display msg if set
                unset($_SESSION['add']);    //remove session msg  
            }
        ?>

        <br><br>
        
        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Fullname: </td>
                    <td>
                    <input type="text" name="fullname" placeholder="Enter your name">
                    </td>
                </tr>
                
                 <tr>
                    <td>Username: </td>
                    <td>
                    <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>
                
                <tr>
                    <td>Password: </td>
                    <td>
                    <input type="password" name="password" placeholder="Enter your password">
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


<?php include('partials/footer.php'); ?>

<?php 
//adding to database
//if btn is clicked or not
if(isset($_POST['submit']))
{
    //1. get data from form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //pswd enc with md5

    //2. sql for data adding to database
    $sql = "INSERT INTO admin SET
    fullname = '$fullname',
    username = '$username',
    password = '$password'
    ";

    //3. execute query and saving data into db
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. check if data is inserted
    if($res == TRUE)
    {
        //echo "Data inserted";
        $_SESSION['add'] = "Admin added successfully!";
        //redirect to admin page
        header("location:".SITEURL.'admin/admin.php');
    }
    else
    {
        //echo "Failed";
        $_SESSION['add'] = "Failed to add!";
        //redirect to add admin page
        header("location:".SITEURL.'admin/add_admin.php');
    }
}

?>
















