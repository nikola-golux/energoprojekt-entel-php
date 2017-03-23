<?php
// Settings
ini_set('html_errors', 1);
ini_set('display_errors', "on");
ini_set('error_reporting', 9999);

// Config
define('DB_TYPE', 'mysql'); // Database type
define('DB_HOST', 'localhost'); // Database host IP
define('DB_USER', 'root'); // Databse username
define('DB_PASS', ''); // Databse password
define('DB_NAME', 'test'); // Name of database

class Database extends PDO {

    public function __construct() {
        try {
            parent::__construct(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<b>Can't connect to DB:</b> " . $e->getMessage();
        }
    }

    public static function ajaxCustomRequest($query, $pattern) {
        try {
            $db = new Database();
            $sth = $db->query($query);
            $sth->execute();
            $sql_data = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
			die("<b>Can't execute query form ajaxCustomRequest function:</b> " . $e->getMessage());
        }
        // Build up custom names for query feilds / Array return
        $return_array = array();
        foreach ($sql_data as $single_sql_array) {
            foreach ($pattern as $target_key => $new_key) {
                foreach ($single_sql_array as $sql_key => $sql_value) {
                    if ($target_key === $sql_key) {
                        $temp_array[$new_key] = $sql_value;
                    }
                }
            }
            array_push($return_array, $temp_array);
        }

        return $return_array;
    }

    public static function ajaxUpdateRequest($query, $pattern) {
        try {
            // Query has to look like this:
            // SELECT id, user, pass FROM users WHERE id = :Array AND pass = :Array
            $db = new Database();
            $sth = $db->prepare($query);
            // :id => Array_Data, :pass => Array_Data
            return $sth->execute($pattern);
        } catch (PDOException $e) {
			die("<b>Can't execute query form ajaxUpdateRequest function:</b> " . $e->getMessage());
        }
    }

	public static function isertAndRerutnData($query, $pattern) {
        try {
            // Query has to look like this:
            // SELECT id, user, pass FROM users WHERE id = :Array AND pass = :Array
            $db = new Database();
            $sth = $db->prepare($query);
			// :id => Array_Data, :pass => Array_Data
            $sth->execute($pattern);
			
			// Return data from table
            $sthd = $db->query("SELECT * FROM `firms` WHERE `id`=".$db->lastInsertId());
            $sthd->execute();
            return $sthd->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
			die("<b>Can't execute query form isertAndRerutnData function:</b> " . $e->getMessage());
        }
    }
}