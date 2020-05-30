<?php

function getContacts(){
  $db = herokuConnect();
  $sql = "SELECT contact_id, contact_name, contact_taxid, contact_phone, contact_email FROM contacts ORDER BY contact_name";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getContactsByFilter($filtervalue){
  $db = herokuConnect();
  $sql = "SELECT contact_id, contact_name, contact_taxid, contact_phone, contact_email FROM contacts WHERE contact_name LIKE :filtervalue ORDER BY contact_name";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filtervalue', $filtervalue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getContactDetails($contact_id){
  $db = herokuConnect();
  $sql = "SELECT contact_id, contact_name, contact_taxid, contact_phone, contact_email FROM contacts WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getContactById($contact_id){
  $db = herokuConnect();
  $sql = "SELECT contact_id, contact_name, contact_taxid, contact_phone, contact_email FROM contacts WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function insertContact($contact_name, $contact_taxid, $contact_phone, $contact_email){
  $db = herokuConnect();
  $sql = "INSERT INTO contacts (contact_name, contact_taxid, contact_phone, contact_email)
          VALUES (:contact_name, :contact_taxid, :contact_phone, :contact_email)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_name', $contact_name, PDO::PARAM_STR);
  $stmt->bindValue(':contact_taxid', $contact_taxid, PDO::PARAM_STR);
  $stmt->bindValue(':contact_phone', $contact_phone, PDO::PARAM_STR);
  $stmt->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function updateContact($contact_id, $contact_name, $contact_taxid, $contact_phone, $contact_email){
  $db = herokuConnect();
  $sql = "UPDATE contacts SET contact_name = :contact_name, contact_taxid = :contact_taxid, contact_phone = :contact_phone, contact_email = :contact_email WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_name', $contact_name, PDO::PARAM_STR);
  $stmt->bindValue(':contact_taxid', $contact_taxid, PDO::PARAM_STR);
  $stmt->bindValue(':contact_phone', $contact_phone, PDO::PARAM_STR);
  $stmt->bindValue(':contact_email', $contact_email, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteContact($contact_id) {
  $db = herokuConnect();
  $sql = "DELETE FROM contacts WHERE contact_id = :contact_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

?>