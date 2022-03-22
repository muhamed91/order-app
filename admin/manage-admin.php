<?php include('partials/header.php') ?>

    <main class="main-content">
        <div class="wrapper">
            <h1>Benutzer Administrator</h1>

            <br>

            <?php 

                if(isset($_SESSION['add'])) {
                    
                    echo $_SESSION['add']; // Show Message
                    unset($_SESSION['add']); // Remove Message
                }


                if(isset($_SESSION['delete'])) {
                    
                    echo $_SESSION['delete']; // Show Message
                    unset($_SESSION['delete']); // Remove Message
                }


                if(isset($_SESSION['update'])) {
                    
                    echo $_SESSION['update']; // Show Message
                    unset($_SESSION['update']); // Remove Message
                }

                if(isset($_SESSION['user-not-found'])) {
                    
                    echo $_SESSION['user-not-found']; // Show Message
                    unset($_SESSION['user-not-found']); // Remove Message
                }


                if(isset($_SESSION['password-not-match'])) {
                    echo $_SESSION['password-not-match'];

                    unset($_SESSION['password-not-match']);
                }  
        




                
            
            ?>

            <!-- Button ADD/Admin -->
            <a class="btn-primary" href="add-admin.php">Admin hinzufügen</a>

            <br>
            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Vor - Nachname</th>
                    <th>Benutzername</th>
                    <th>Aktivitäten</th>
                </tr>

                <?php 
                
                    // get all Admin form DB
                    $sql = "SELECT * FROM tbl_admin";
                    $stmt = DB::get()->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll();

                ?>

                <?php foreach ($result as $user) : ?>

                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['full_name'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>/admin/change-psw.php?id=<?php echo $user['id']?>" class="btn-primary">Passwort ändern</a>
                            <a href="<?php echo SITEURL; ?>/admin/update-admin.php?id=<?php echo $user['id']?>" class="btn-sec">Admin aktualisieren</a>
                            <a href="<?php echo SITEURL; ?>/admin/delete-admin.php?id=<?php echo $user['id']?>" class="btn-danger">Admin löschen</a>
                        </td>
                    </tr>
    
                <?php endforeach; ?>

            </table>
    
        </div>
    </main>
    <!-- Main Content End -->

    <?php include('partials/footer.php') ?>