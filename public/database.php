<?php
class database{
    private $host;
    private $user;
    private $pass;
    private $database;
    public $conn;

    function __construct($host, $user, $pass, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die ("could not connect to mysql");
        if(!$this->conn){
            return false;
        } else {
            return true;
        }
    }
}

class connect{
    private $mysqli;

    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function connect(){
        $db = $this->mysqli->conn;
        return $db;
    }
}

class sql{
    public $mysqli;
    public $data;
    public $query;

    function __construct($conn){
        $this->mysqli = $conn;
    }

    public function amil(){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM amil WHERE uname = '$_SESSION[uname]'";
        $query = $db->query($sql);
        return $query;
    }
    public function all_muzakki(){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM muzakki";
        $query = $db->query($sql);
        return $query;
    }
    public function all_mustahik(){
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM mustahik";
        $query = $db->query($sql);
        return $query;
    }
    public function all_org_mustahik(){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(jml_tanggungan) FROM mustahik";
        $query = $db->query($sql);
        return $query;
    }
    public function all_org_muzakki(){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(jml_tanggungan) FROM muzakki";
        $query = $db->query($sql);
        return $query;
    }
    public function besarbayar($jenis){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(besar_bayar) FROM bayarzakat WHERE $jenis = 1";
        $query = $db->query($sql);
        return $query;
    }
    public function distribusi(){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(jml_tanggungan) FROM distribusi";
        $query = $db->query($sql);
        return $query;
    }
    public function bsrdistribusi(){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(besar) FROM distribusi";
        $query = $db->query($sql);
        return $query;
    }
    public function bayar(){
        $nm_db = 'bayarzakat';
        include "limit.php";
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM bayarzakat LIMIT $awalData, $jumlahDataPerHalaman";
        $query = $db->query($sql);
        return $query;
    }
    public function data_muzakki(){
        $nm_db = 'muzakki';
        include "limit.php";
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM muzakki LIMIT $awalData, $jumlahDataPerHalaman";
        $query = $db->query($sql);
        return $query;
    }
    public function data_mustahik(){
        $nm_db = 'mustahik';
        include "limit.php";
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM mustahik LIMIT $awalData, $jumlahDataPerHalaman";
        $query = $db->query($sql);
        return $query;
    }
    public function data_distribusi(){
        $nm_db = 'distribusi';
        include "limit.php";
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM distribusi LIMIT $awalData, $jumlahDataPerHalaman";
        $query = $db->query($sql);
        return $query;
    }
    public function det_mustahik($jenis){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(jml_tanggungan) FROM mustahik WHERE kategori = '$jenis'";
        $query = $db->query($sql);
        $fetch = $query->fetch_array();
        return $fetch['SUM(jml_tanggungan)'];
    }
    public function det_distribusi($jenis){
        $db = $this->mysqli->conn;
        $sql = "SELECT SUM(jml_tanggungan) FROM distribusi WHERE kategori = '$jenis'";
        $query = $db->query($sql);
        $fetch = $query->fetch_array();
        return $fetch['SUM(jml_tanggungan)'];
    }

}

function query($query){
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

?>