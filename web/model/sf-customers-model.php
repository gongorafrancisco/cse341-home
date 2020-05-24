<?php
// Get the values from the customers table a simple query
function getCustomers(){
  $db = herokuConnect();
  $sql = 'SELECT customer_id, customer_name FROM customers';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getCustomersByFilter($filtervalue){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name FROM customers WHERE customer_name LIKE :filtervalue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', "'%".$filtervalue."%'", PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}