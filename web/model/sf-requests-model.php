<?php
// Get the values from the customers table a simple query
function getCustomers(){
  $db = herokuConnect();
  $sql = "SELECT * FROM customers ORDER BY customer_name";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getCustomersByFilter($filterName, $filterValue){
  $db = herokuConnect();
  $sql = "SELECT * FROM customers WHERE $filterName LIKE :filterValue ORDER BY customer_name";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filterValue', $filterValue, PDO::PARAM_STR);
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

function getCustomerById($customer_id){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name, customer_taxid, customer_phone, customer_email FROM customers WHERE customer_id = :customer_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function insertCustomer($customer_name, $customer_taxid, $customer_phone, $customer_email){
  $db = herokuConnect();
  $sql = "INSERT INTO customers (customer_name, customer_taxid, customer_phone, customer_email)
          VALUES (:customer_name, :customer_taxid, :customer_phone, :customer_email)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_name', $customer_name, PDO::PARAM_STR);
  $stmt->bindValue(':customer_taxid', $customer_taxid, PDO::PARAM_STR);
  $stmt->bindValue(':customer_phone', $customer_phone, PDO::PARAM_STR);
  $stmt->bindValue(':customer_email', $customer_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function updateCustomer($customer_id, $customer_name, $customer_taxid, $customer_phone, $customer_email){
  $db = herokuConnect();
  $sql = "UPDATE customers SET customer_name = :customer_name, customer_taxid = :customer_taxid, customer_phone = :customer_phone, customer_email = :customer_email WHERE customer_id = :customer_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':customer_name', $customer_name, PDO::PARAM_STR);
  $stmt->bindValue(':customer_taxid', $customer_taxid, PDO::PARAM_STR);
  $stmt->bindValue(':customer_phone', $customer_phone, PDO::PARAM_STR);
  $stmt->bindValue(':customer_email', $customer_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteCustomer($customer_id) {
  $db = herokuConnect();
  $sql = "DELETE FROM customers WHERE customer_id = :customer_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

?>