<?php
class Database
{
    private $connection;
    function __construct()
    {
        // -> referencing the function
        $this->connect_db();
    }
    public function connect_db()
    {
        $this->connection = mysqli_connect('172.31.22.43', 'Sukhpreet200520246', 'SZSDJ517MV', 'Sukhpreet200520246');
        if (mysqli_connect_error()) {
            die("Database is dead" . mysqli_connect_error() . mysqli_connect_error());
        }
    }
    // insert rows in the database
    // orderFrom(fname, email, contact_no, piz_type, piz_size, cru_type, addResults, delivery, d_address, pay)
    public function create($fname, $email, $contact_no, $piz_type, $piz_size, $cru_type, $addResults, $delivery, $d_address, $pay)
    {
        $sql = "INSERT INTO orderForm(fname, email,contact_no, piz_type, piz_size, cru_type, add_top, delivery, d_address, pay) VALUES ('$fname','$email','$contact_no', '$piz_type', '$piz_size', '$cru_type', '$addResults', '$delivery', '$d_address', '$pay')";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
            return true;
        } else {
            die("Query failed: " . mysqli_error($this->connection));
        }
    }
    // read database
    public function read($id = null)
    {
        $sql = "SELECT * FROM orderForm";
        if ($id) {
            $sql .= "WHERE id =$id";
        }
        $res = mysqli_query($this->connection, $sql);
        return $res;
    }
    // sanitize injection
    public function sanitize($var)
    {
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }
}
$database = new Database();
