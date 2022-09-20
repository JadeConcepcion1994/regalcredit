<?php 
    class Database
    {
    	static private $conn;

    	function __construct()
        {
            Database::$conn = new mysqli('localhost','root','','weatherapp_test');
        }

        public function addApiKey()
        {
        	$api_key = mysqli_real_escape_string(Database::$conn, $this->api_key);
        	$api_name = mysqli_real_escape_string(Database::$conn, $this->api_name);
        	$sql = "INSERT INTO api_keys (api_key, name, date_added) VALUES ('".$api_key."', '".$api_name."', '".$this->date_added."')";
        	$result = mysqli_query(Database::$conn, $sql);
        	return $result;
        }

        public function getAllApiKeys()
        {
        	$sql = "SELECT * FROM api_keys";
        	$result = mysqli_query(Database::$conn, $sql);
        	$row = array();
            while ($rows = $result->fetch_object()) {
                $row[] = $rows;
            }

             echo json_encode(["result" => $row]);

        }

        public function getAllLocationKeys()
        {
        	$sql = "SELECT * FROM location_keys";
        	$result = mysqli_query(Database::$conn, $sql);
        	$row = array();
            while ($rows = $result->fetch_object()) {
                $row[] = $rows;
            }

             echo json_encode(["result" => $row]);

        }

        public function getLocationAndApi()
        {

        	$sql = "SELECT api_key AS api_value FROM api_keys WHERE selected = 1 UNION SELECT location_key AS location_value FROM location_keys  WHERE selected = 1";
        	$result = mysqli_query(Database::$conn, $sql);
        	$row = array();
            while ($rows = $result->fetch_object()) {
                $row[] = $rows;
            }

             echo json_encode(["result" => $row]);
        }

        public function updateThisApiKey($value)
        {
        	$sql = "UPDATE api_keys SET selected = 0 WHERE id <> $value";
        	$result = mysqli_query(Database::$conn, $sql);

        	$sql = "UPDATE api_keys set selected = 1 WHERE id = $value";
        	$result = mysqli_query(Database::$conn, $sql);
        	return $result;
        }

        public function updateThisLocationKey($value)
        {
        	$sql = "UPDATE location_keys SET selected = 0 WHERE id <> $value";
        	$result = mysqli_query(Database::$conn, $sql);

        	$sql = "UPDATE location_keys set selected = 1 WHERE id = $value";
        	$result = mysqli_query(Database::$conn, $sql);
        	return $result;
        }


        public function addLocationKey()
        {
        	$location_key = mysqli_real_escape_string(Database::$conn, $this->location_key);
        	$location_name = mysqli_real_escape_string(Database::$conn, $this->location_name);
        	$sql = "INSERT INTO location_keys (location_key, location_name, date_added) VALUES ('".$location_key."', '".$location_name."', '".$this->date_added."')";
        	$result = mysqli_query(Database::$conn, $sql);
        	return $result;
        }

    }

?>