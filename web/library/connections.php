<?php
//Access the Heroku Database and enclosing into a function
function herokuConnect()
{
  $db = NULL;
  try {
    $dbUrl = getenv('postgres://fixtsckmcihgws:e74a380b7061d9729e140a5fa67a5ac26c9f6a2c82f6b0df5ec34460de566ef4@ec2-54-175-117-212.compute-1.amazonaws.com:5432/d1ue3boa7vgphf');              
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"], '/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword,);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $ex) {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  return $db;
}
