<?php
// Get the values from the customers table a simple query
 function getRequests(){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_id, c.customer_name, cc.contact_id, cc.contact_name, qr.request_delivery_date, 
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete 
  FROM quote_requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

/*function getCustomersByFilter($filterName, $filterValue){
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
*/
function insertRequest($customer_id, $contact_id, $request_datails, $address_id, $delivery_date){
  $db = herokuConnect();
  $sql = "INSERT INTO quote_requests (customer_id,contact_id, request_details, address_id, request_delivery_date)
          VALUES (:customer_id, :contact_id, :request_datails, :address_id, :delivery_date)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':request_datails', $request_datails, PDO::PARAM_STR);
  $stmt->bindValue(':address_id', $address_id, PDO::PARAM_INT);
  $stmt->bindValue(':delivery_date', $delivery_date, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}
/*
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
} */

?>