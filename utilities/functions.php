<?php
    require_once('../config/db.php');



    function create_admin($full_name, $username, $password) {

        $sql = "INSERT INTO tbl_admin (full_name, username, password) VALUES(:full_name, :username, :password)";
        // Insert into DB
        $stmt = DB::get()->prepare($sql);
        $new_admin = $stmt->execute(['full_name' => $full_name, 'username'=> $username, 'password'=>$password]);

        return $new_admin;
    }



    function update_admin($full_name, $username, $id) {

        $sql = "UPDATE tbl_admin SET full_name=:full_name, username=:username WHERE id = :id";
        // Insert into DB
        $stmt = DB::get()->prepare($sql);
        $update_admin = $stmt->execute(['full_name' => $full_name, 'username'=> $username, 'id' => $id]);


        return $update_admin;
    }



    function deleteAdmin($id) {
        $sql = "DELETE FROM tbl_admin WHERE id = :id";
        $stmt = DB::get()->prepare($sql);
        $delete_admin = $stmt->execute(['id' => $id]);

        return $delete_admin;
    }



    function user_not_found($id, $current_password) {
        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password= '$current_password'";

        $stmt = DB::get()->prepare($sql);
        
        $stmt->execute();

        $total_users = $stmt->rowCount();

        return $total_users;
    }


