<?php 

include('partials/header.php');
require_once('../utilities/functions.php');

// GET the id which we want to UPDATE the DATA

$id =  $_GET['id'];


$sql = "SELECT * FROM tbl_admin WHERE id= $id";

$stmt = DB::get()->prepare($sql);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);


?>




    <main class="main-content">
        <div class="wrapper">
            <h1>Admin bearbeiten</h1>
            <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Vor -Nachname</td>
                    <td>
                        <input type="text" name="full_name" id="" value="<?php echo $admin['full_name']; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Benutzername</td>
                    <td>
                        <input type="text" name="username" id="" placeholder="Benutzername" value=" <?php echo $admin['username']; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Admin aktualisieren" class="btn-sec">
                    </td>
                </tr>

            </table>

            </form>
        </div>
    </main>
    <!-- Main Content End -->

    <?php 
    
    include('partials/footer.php');
    

    
    
    if(isset($_POST['submit'])) {

        // Get all the Form value
          $full_name = $_POST['full_name'];
          $username = $_POST['username'];


          $udpate_admin = update_admin($full_name, $username, $id);
          
          
          if($udpate_admin == true) {

            header("Location:".SITEURL.'/admin/manage-admin.php');

            $_SESSION['update'] = "<div class='alert-s'>Admin wurde aktualisiert</div>";

          }

        //   



    }

    
    
    
    
    
    ?> 








