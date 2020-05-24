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

function getCustomersByFilter(){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name FROM customers WHERE customer_name LIKE '%a%'";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}