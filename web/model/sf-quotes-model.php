<?php
/*  function getQuotes(){
  $db = herokuConnect();
  $sql = "SELECT qr.quote_id, qr.quote_date, c.customer_name, cc.contact_name,
  CASE WHEN qr.quote_complete = TRUE THEN 'Yes' WHEN qr.quote_complete = FALSE THEN 'No' END as quote_complete
  FROM quotes AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
} */

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

/* function getQuoteById($quote_id){
  $db = herokuConnect();
  $sql = "SELECT qr.quote_id, c.customer_id, c.customer_name, cc.contact_id, cc.contact_name 
  FROM quotes AS qr
  INNER JOIN customers AS c ON c.customer_id = qr.customer_id
  INNER JOIN customer_contacts AS cc ON cc.contact_id = qr.contact_id
  WHERE qr.quote_id = :quote_id";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':quote_id', $quote_id, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
} */

function insertQuote($request_id, $customer_id, $contact_id, $quote_datails, $quote_subtotal, $quote_taxes, $quote_total){
  $db = herokuConnect();
  $sql = "INSERT INTO quotes (request_id, customer_id, contact_id, quote_details, quote_subtotal, quote_taxes, quote_total)
          VALUES (:request_id, :customer_id, :contact_id, :quote_datails,:quote_subtotal, :quote_taxes, :quote_total)";
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':request_id', $request_id, PDO::PARAM_INT);
  $stmt->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
  $stmt->bindValue(':contact_id', $contact_id, PDO::PARAM_INT);
  $stmt->bindValue(':quote_datails', $quote_datails, PDO::PARAM_STR);
  $stmt->bindValue(':quote_subtotal', $quote_subtotal, PDO::PARAM_STR);
  $stmt->bindValue(':quote_taxes', $quote_taxes, PDO::PARAM_STR);
  $stmt->bindValue(':quote_total', $quote_total, PDO::PARAM_STR);
  $stmt->execute();
  $newId = $db->lastInsertId('quotes_quote_id_seq');
  $stmt->closeCursor();
  return $newId;
}

?>