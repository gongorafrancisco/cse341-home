<?php
// Get the values from the customers table a simple query
function getCustomers(){
  $db = herokuConnect();
  $sql = 'SELECT customer_id, customer_name, customer_taxid, customer_phone, customer_email FROM customers ORDER BY customer_name';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getCustomersByFilter($filtervalue){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name, customer_taxid, customer_phone, customer_email FROM customers WHERE customer_name LIKE :filtervalue ORDER BY customer_name";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', $filtervalue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getCustomerDetails($customer_id){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name, customer_taxid, customer_phone, customer_email FROM customers WHERE customer_id = :customer_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}