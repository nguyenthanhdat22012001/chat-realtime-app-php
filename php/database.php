<?php
  function getConnection()
  {
      //Khai báo server
      $host = 'localhost';
      $dbname = 'chatapp';
      $username ='root';
      $password = '';
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
      //tạo đối tượng thuộc PDO
      $DBH = new PDO('mysql:host='.$host.';dbname='.$dbname,$username,$password,$options);
      return $DBH;
  }
  function query($sql){
      $connect = getConnection();
      $result = $connect->query($sql);
      return $result;
  }
  function countRow($sql){
    $connect = getConnection();
    $result = $connect->query($sql);
    $count = $result->fetchColumn();
    return $count;
}
  function query_one($sql){
      $connect = getConnection();
      $result = $connect->query($sql);
      $row = $result->fetch(PDO::FETCH_ASSOC);
      return $row;
  }
  function execute($sql){
      $connect = getConnection();
      $result = $connect->exec($sql);
      return $result;
  }
?>