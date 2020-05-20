<?php
// Make a simple query
function getScriptures(){
$db = herokuConnect();
$sql = 'SELECT scripture_book, scripture_chapter, scripture_verse, scripture_content FROM scriptures';
$stmt = $db->prepare($sql);
$stmt->execute();
$scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->closeCursor();
return $scriptures;
}