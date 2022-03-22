<?php


// Start Session

session_start();

define('SITEURL', 'http://localhost/order-app');



class DB {
    private static $db;

    /**
     * Die $db wird sogenannt "lazy" initialisiert
     * @return PDO eine offene PDO Datenbank-Verbindung
     */
    public static function get() {

        //im ersten Durchgang ist $db noch null. Also wird initialisiert
        if (DB::$db == null) {
            $host = "localhost";
            $db_name = "library_books";
            $username = "root";
            $password = "";

            $dsn = 'mysql:host='. $host .';dbname='. $db_name;

            try {
                $conn = new PDO( $dsn, $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //das Resultat der Initialisierung wird hier in die statische Variable gespeichert
                DB::$db = $conn;
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
        return DB::$db;
    }
}
