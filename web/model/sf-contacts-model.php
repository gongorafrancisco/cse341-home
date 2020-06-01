<?php

function getContacts(){
  $db = herokuConnect();
  $sql = "SELECT cc.contact_id, cc.contact_name, cc.customer_id, c.customer_name, cc.contact_department, cc.contact_phone, cc.contact_email FROM customer_contacts AS cc 
  LEFT JOIN customers AS c ON c.customer_id = cc.customer_id
  ORDER BY contact_name";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getContactsByFilter($filterName, $filtervalue){
  $db = herokuConnect();
  $sql = "SELECT cc.contact_id, cc.contact_name, c.customer_name, cc.contact_department, cc.contact_phone, cc.contact_email FROM customer_contacts AS cc 
  LEFT JOIN customers AS c ON c.customer_id = cc.customer_id
  WHERE $filterName LIKE :filtervalue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', $filtervalue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

/* function getContactDetails($contact_id){
  $db = herokuConnect();
  $sql = "SELECT contact_id, contact_name, contact_taxid, contact_phone, contact_email FROM contacts WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
} */

function getContactById($contact_id){
  $db = herokuConnect();
  $sql = "SELECT cc.contact_id, cc.contact_name, cc.customer_id, c.customer_name, cc.contact_department, cc.contact_phone, cc.contact_email FROM customer_contacts AS cc 
  LEFT JOIN customers AS c ON c.customer_id = cc.customer_id
  WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function insertContact($customer_id, $contact_name, $contact_department, $contact_phone, $contact_email){
  $db = herokuConnect();
  $sql = "INSERT INTO customer_contacts (customer_id, contact_name, contact_department, contact_phone, contact_email)
          VALUES (:customer_id, :contact_name, :contact_department, :contact_phone, :contact_email)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_name', $contact_name, PDO::PARAM_STR);
  $stmt->bindValue(':contact_department', $contact_department, PDO::PARAM_STR);
  $stmt->bindValue(':contact_phone', $contact_phone, PDO::PARAM_STR);
  $stmt->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function updateContact($customer_id, $contact_name, $contact_department, $contact_phone, $contact_email, $contact_id){
  $db = herokuConnect();
  $sql = "UPDATE customer_contacts SET customer_id = :customer_id, contact_name = :contact_name, contact_department = :contact_department, contact_phone = :contact_phone, contact_email = :contact_email WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_name', $contact_name, PDO::PARAM_STR);
  $stmt->bindValue(':contact_department', $contact_department, PDO::PARAM_STR);
  $stmt->bindValue(':contact_phone', $contact_phone, PDO::PARAM_STR);
  $stmt->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteContact($contact_id) {
  $db = herokuConnect();
  $sql = "DELETE FROM customer_contacts WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

?>