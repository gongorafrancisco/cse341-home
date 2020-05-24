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

function getCustomersByFilter($customer, $filter_value){
  $db = herokuConnect();
  $sql = 'SELECT customer_id, customer_name: FROM customers WHERE :customer LIKE :filter_value';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer', $customer, PDO::PARAM_STR);
  $stmt->bindValue(':filter_value', "'%".$filter_value."%'", PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}