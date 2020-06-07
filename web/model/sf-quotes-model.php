<?php
  function getQuotes(){
  $db = herokuConnect();
  $sql = "SELECT q.quote_id, q.quote_date, qr.request_id, c.customer_id, c.customer_name, cc.contact_id, cc.contact_name, q.quote_total FROM quotes AS q
  LEFT JOIN requests AS qr ON qr.request_id = q.request_id
  LEFT JOIN customers AS c ON c.customer_id = q.customer_id
  LEFT JOIN customer_contacts AS cc ON cc.contact_id = q.contact_id
  ORDER BY q.quote_id";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

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