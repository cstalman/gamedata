<?php 

function getData($dbh, $table) {
  $sql = "SELECT * 
          FROM $table";
  $stmt = $dbh->query($sql);
  
  $data = array();
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[$row['id']] = $row['title'];
  }
  
  return $data; 
}

function getDataById($dbh, $table, $id) {
  $sql = "SELECT * 
          FROM $table
          WHERE id = $id";
  $stmt = $dbh->query($sql);
  
  $data = array();
  if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    return $row['title']; 
  }
  
  return false; 
}

function makeSelect($data, $name) {
  $html = array();
  $html[] = "<select name=$name>";
  foreach ($data as $key => $value) {
    $html[] = "<option value=$key>$value</option>";
  }
  $html[] = "</select>";
  return $html;
}

?>