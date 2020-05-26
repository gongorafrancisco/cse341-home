<?php
//Access the Heroku Database and enclosing into a function
function herokuConnect() {
    $db = NULL;

    try {
      // default Heroku Postgres configuration URL
      $dbUrl = getenv('DATABASE_URL');
  
      if (!isset($dbUrl) || empty($dbUrl)) {
        // and a database called "cse341"
        $dbUrl = "postgres://cseuser:Spring2020@localhost:5432/cse341";
      }
  
      // Get the various parts of the DB Connection from the URL
      $dbopts = parse_url($dbUrl);
  
      $dbHost = $dbopts["host"];
      $dbPort = $dbopts["port"];
      $dbUser = $dbopts["user"];
      $dbPassword = $dbopts["pass"];
      $dbName = ltrim($dbopts["path"],'/');
  
      // Create the PDO connection
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  
      // this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $ex) {
      // If this were in production, you would not want to echo
      // the details of the exception.
      echo "Error connecting to DB. Details: $ex";
      die();
    }
  
    return $db;
}
