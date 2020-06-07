<?php
 function getRequests(){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete
  FROM requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  ORDER BY qr.request_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getRequestsByFilter($filterName, $filterValue){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete
  FROM requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  WHERE $filterName LIKE :filterValue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filterValue', $filterValue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getRequestsByDate($filterName, $dateStart, $dateEnd){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete
  FROM requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  WHERE $filterName BETWEEN :dateStart AND :dateEnd";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':dateStart', $dateStart, PDO::PARAM_STR);
  $stmt->bindValue(':dateEnd', $dateEnd, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getRequestsByBoolean($filterName, $filterValue){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete
  FROM requests AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  WHERE $filterName = :filterValue";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':filterValue', $filterValue, PDO::PARAM_STR);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getRequestDetails($customer_id){
  $db = herokuConnect();
  $sql = "SELECT customer_id, customer_name, customer_taxid, customer_phone, customer_email FROM customers WHERE customer_id = :customer_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getRequestById($request_id){
  $db = herokuConnect();
  $sql = "SELECT qr.request_id, qr.request_date, c.customer_id, c.customer_name, cc.contact_id, cc.contact_name, qr.request_details,
  CASE WHEN qr.request_complete = TRUE THEN 'Yes' WHEN qr.request_complete = FALSE THEN 'No' END as request_complete 
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

function insertRequest($customer_id, $contact_id, $request_details){
  $db = herokuConnect();
  $sql = "INSERT INTO requests (customer_id,contact_id, request_details)
          VALUES (:customer_id, :contact_id, :request_datails)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':request_datails', $request_details, PDO::PARAM_STR);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function completeRequest($requestComplete, $request_id) {
  $db = herokuConnect();
  $sql = "UPDATE requests SET request_complete = :requestComplete WHERE request_id = :request_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':requestComplete', $requestComplete, PDO::PARAM_STR);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->execute();
  $stmt->closeCursor();
}

function updateRequest($request_id, $customer_id, $contact_id, $request_details) {
  $db = herokuConnect();
  $sql = "UPDATE requests SET customer_id = :customer_id, contact_id = :contact_id, request_details = :request_details  WHERE request_id = :request_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':request_details', $request_details, PDO::PARAM_STR);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}

function deleteRequest($request_id) {
  $db = herokuConnect();
  $sql = "DELETE FROM requests WHERE request_id = :request_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->execute();
  $rowsChanged = $stmt->rowCount();
  $stmt->closeCursor();
  return $rowsChanged;
}
?>