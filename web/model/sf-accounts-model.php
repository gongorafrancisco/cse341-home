<?php

/* Model for Sales Follow UP Team Members */

function insertTeamMember($member_email, $member_name, $member_lastname, $member_password) {
 $db = herokuConnect();
 $sql = 'INSERT INTO team_users (member_email, member_name, member_lastname, member_password)
         VALUES (:member_email, :member_name, :member_lastname, :member_password)';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':member_email', $member_email, PDO::PARAM_STR);
 $stmt->bindValue(':member_name', $member_name, PDO::PARAM_STR);
 $stmt->bindValue(':member_lastname', $member_lastname, PDO::PARAM_STR);
 $stmt->bindValue(':member_password', $member_password, PDO::PARAM_STR);
 $stmt->execute();
 $rowsChanged = $stmt->rowCount();
 $stmt->closeCursor();
 return $rowsChanged;
  }

  // Check for an existing email address
/* function checkExistingEmail($clientEmail) {
 $db = herokuConnect();
 $sql = 'SELECT clientEmail FROM clients WHERE clientEmail = :email';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
 $stmt->execute();
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 $stmt->closeCursor();
 if(empty($matchEmail)){
  return 0;
 } else {
  return 1;
 }
}*/

// Get client data based on an email address
function getMemberByEmail($member_email){
 $db = herokuConnect();
 $sql = 'SELECT member_name, member_password FROM team_users WHERE member_email = :member_email';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':member_email', $member_email, PDO::PARAM_STR);
 $stmt->execute();
 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $row;
}

/*function updateAccount($clientFirstname, $clientLastname, $clientEmail, $clientId) {
// Create a connection
$db = herokuConnect();
// The SQL statement to be used with the database
$sql = 'UPDATE clients SET clientFirstname = :clientFirstname, clientLastname = :clientLastname, clientEmail = :clientEmail WHERE clientId = :clientId';
$stmt = $db->prepare($sql);
$stmt->bindValue(':clientFirstname', $clientFirstname, PDO::PARAM_STR);
$stmt->bindValue(':clientLastname', $clientLastname, PDO::PARAM_STR);
$stmt->bindValue(':clientEmail', $clientEmail, PDO::PARAM_STR);
$stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
$stmt->execute();
$rowsChanged = $stmt->rowCount();
$stmt->closeCursor();
return $rowsChanged;
}
// Get client data based on an client ID
function getClientId($clientId){
 $db = herokuConnect();
 $sql = 'SELECT clientId, clientFirstname, clientLastname, clientEmail, clientLevel, clientPassword
         FROM clients
         WHERE clientId = :clientId';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
 $stmt->execute();
 $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $clientData;
}

//This function updates the password based on the client ID
function passwordUpdate($hashedPassword, $clientId){
// Create a connection object using the heroku connection function
 $db = herokuConnect();
 // The SQL statement
 $sql = 'UPDATE clients SET clientPassword = :hashedPassword WHERE clientId = :clientId';
 // Create the prepared statement using the heroku connection
 $stmt = $db->prepare($sql);
 // The next four lines replace the placeholders in the SQL
 // statement with the actual values in the variables
 // and tells the database the type of data it is
 $stmt->bindValue(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
 $stmt->bindValue(':clientId', $clientId, PDO::PARAM_STR);
 // Insert the data
 $stmt->execute();
 // Ask how many rows changed as a result of our insert
 $rowsChanged = $stmt->rowCount();
 // Close the database interaction
 $stmt->closeCursor();
 // Return the indication of success (rows changed)
 return $rowsChanged;
  } */