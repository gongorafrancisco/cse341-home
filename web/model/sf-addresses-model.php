<?php

function getAddresses(){
  $db = herokuConnect();
  $sql = "SELECT ca.address_id, c.customer_id, c.customer_name, ca.customer_address, 
  CASE WHEN shipping_address = TRUE THEN 'Yes' WHEN shipping_address = FALSE THEN 'No' END as shipping_address 
  FROM customer_addresses as ca LEFT JOIN customers AS c ON c.customer_id = ca.customer_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getAddressesByFilter($filterName, $filtervalue){
  $db = herokuConnect();
  $sql = "SELECT ca.address_id, c.customer_id, c.customer_name, ca.customer_address, 
  CASE WHEN shipping_address = TRUE THEN 'Yes' WHEN shipping_address = FALSE THEN 'No' END as shipping_address 
  FROM customer_addresses as ca LEFT JOIN customers AS c ON c.customer_id = ca.customer_id
  WHERE $filterName LIKE :filtervalue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', $filtervalue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getAddressesByBoolean($filtervalue){
  $db = herokuConnect();
  $sql = "SELECT ca.address_id, c.customer_id, c.customer_name, ca.customer_address, 
  CASE WHEN shipping_address = TRUE THEN 'Yes' WHEN shipping_address = FALSE THEN 'No' END as shipping_address 
  FROM customer_addresses as ca LEFT JOIN customers AS c ON c.customer_id = ca.customer_id
  WHERE ca.shipping_address = :filtervalue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', $filtervalue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getAddressById($address_id){
  $db = herokuConnect();
  $sql = "SELECT ca.address_id, c.customer_id, c.customer_name, ca.customer_address, 
  CASE WHEN shipping_address = TRUE THEN 'Yes' WHEN shipping_address = FALSE THEN 'No' END as shipping_address 
  FROM customer_addresses as ca LEFT JOIN customers AS c ON c.customer_id = ca.customer_id
  WHERE address_id = :address_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':address_id', $address_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function insertAddress($customer_id, $customer_address, $shipping_address){
  $db = herokuConnect();
  $sql = "INSERT INTO customer_addresses (customer_id, customer_address, shipping_address) values (:customer_id, :customer_address, :shipping_address)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':customer_address', $customer_address, PDO::PARAM_STR);
  $stmt->bindValue(':shipping_address', $shipping_address, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function updateAddress($address_id, $customer_id, $customer_address, $shipping_address){
  $db = herokuConnect();
  $sql = "UPDATE customer_addresses SET customer_id = :customer_id, customer_address = :customer_address, shipping_address = :shipping_address WHERE address_id = :address_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':address_id', $address_id, PDO::PARAM_INT);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':customer_address', $customer_address, PDO::PARAM_STR);
  $stmt->bindValue(':shipping_address', $shipping_address, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteAddress($address_id) {
  $db = herokuConnect();
  $sql = "DELETE FROM customer_addresses WHERE address_id = :address_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':address_id', $address_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

?>