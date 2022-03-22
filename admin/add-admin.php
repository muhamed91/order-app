<?php 

    include('partials/header.php');
    require_once('../utilities/functions.php')
?>


    <main class="main-content">
        <div class="wrapper">
            <h1>Admin hinzufügen</h1>
            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Vor -Nachname</td>
                    <td>
                        <input type="text" name="full_name" id="" placeholder="Vor -Nachname">
                    </td>
                </tr>

                <tr>
                    <td>Benutzername</td>
                    <td>
                        <input type="text" name="username" id="" placeholder="Benutzername">
                    </td>
                </tr>


                <tr>
                    <td>Passwort</td>
                    <td>
                        <input type="password" name="password" id="" placeholder="Passwort">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-sec">
                    </td>
                </tr>

            </table>

            </form>
        </div>
    </main>
    <!-- Main Content End -->

    <?php include('partials/footer.php') ?> 



    <?php 
        //  Process the Value save in the Databease
        // Check whether the submit is clicked or not

        if(isset($_POST['submit'])) 
        {
            // Get data from Form
            $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $password = md5($_POST['password']); // Password Encryptions

            create_admin($full_name, $username, $password);


            $_SESSION['add'] = "<div class='alert-s'>Admin addes succesfully</div>";
            // Redirect
            header("Location:".SITEURL.'/admin/manage-admin.php');


        }
    ?>