<?php
/*
** Scriptures Controller
*/

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
// Make a simple query

$sql = 'SELECT scripture_book, scripture_chapter, scripture_verse, scripture_content FROM scriptures';
$stmt = $db->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
default:
$scriptures = $rows;
if(count($scriptures) > 0){
 $scripturesList = '<ul>';
 foreach ($scriptures as $scripture) {
  $scripturesList .= "<li><$scripture[scripture_content]</li>";
 }
  $scripturesList .= '</ul>';
 } else {
  $message = '<p class="notify">Sorry, no scriptures were returned.</p>';
}
include '../view/teamprojects/week05/scriptures-resources.php';
break;
}
