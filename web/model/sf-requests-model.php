<?php
 function getRequests(){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete
  FROM requests AS qr
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
}*/

function getRequestById($request_id){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, c.customer_id, c.customer_name, cc.contact_id, cc.contact_name 
  FROM requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  WHERE qr.request_id = :request_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function insertRequest($customer_id, $contact_id, $request_datails){
  $db = herokuConnect();
  $sql = "INSERT INTO requests (customer_id,contact_id, request_details)
          VALUES (:customer_id, :contact_id, :request_datails)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':request_datails', $request_datails, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function updateRequest($requestComplete, $request_id) {
  $db = herokuConnect();
  $sql = "UPDATE requests SET request_complete = :requestComplete WHERE request_id = :request_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':requestComplete', $requestComplete, PDO::PARAM_STR);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}
?>