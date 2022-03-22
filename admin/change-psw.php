<?php 

require_once('../utilities/functions.php');
include('partials/header.php');


$id = $_GET['id'];


?>

    <main class="main-content">
    <div class="wrapper">
            <h1>Passwort ändern</h1>

            <?php  if(isset($_SESSION['password-not-match'])) {
                        echo $_SESSION['password-not-match'];

                        unset($_SESSION['password-not-match']);
            }  
            
            
            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Altes Passwort:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Altes Passwort" id="">
                        </td>
                    </tr>
                    <tr>
                        <td>Neues Passwort:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="Neues Passwort" id="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Password bestätitgen:
                        </td>
                        <td>
                            <input type="password" name="confirm_password" id="" placeholder="Passwort bestätigen">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" value="Passwort ändern" name="submit">
                        </td>
                    </tr>

                </table>

            </form>
           
        </div>
    </main>
    <!-- Main Content End -->

    <?php

    
    if(isset($_POST['submit'])) 
    {
        // Get data from Form


        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);



       $found_user = user_not_found($id, $current_password);
       
 

        if($found_user > 0) {
            
            if($new_password == $confirm_password) {
                // Update the Password
                $sql = "UPDATE tbl_admin SET password = :password WHERE id = :id";

                $stmt = DB::get()->prepare($sql);

                $set_password = $stmt->execute(['password' => $new_password, 'id' => $id]);

                echo 'set new Password';



            } else {
                $_SESSION['password-not-match'] = "<div class='alert-error'>Die Passwörter sind nicht identisch</div>";
                // Redirect
                header("Location:".SITEURL.'/admin/change-psw.php?id='.$id);
            }

        } else {
            echo 'Nuk e kena xhetur';
            $_SESSION['user-not-found'] = "<div class='alert-error'>Nutzer wurde nicht gefunden</div>";
            // Redirect
            header("Location:".SITEURL.'/admin/manage-admin.php');
        }
       

       

    }



    ?>

    <?php 
    include('partials/footer.php');


   
  

  

?>