<?php
// Get the values from the scriptures table a simple query
function getScriptures(){
  $db = herokuConnect();
  $sql = 'SELECT scripture_id, scripture_book, scripture_chapter, scripture_verse, scripture_content FROM scriptures';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getTopics(){
  $db = herokuConnect();
  $sql = 'SELECT topic_id, topic_name FROM topics';
  $stmt = $db->prepare($sql);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function addScripture($scripture_book, $scripture_chapter, $scripture_verse, $scripture_content){
  $db = herokuConnect();
  $sql = 'INSERT INTO scriptures (scripture_book, scripture_chapter, scripture_verse, scripture_content)
          VALUES (:scripture_book, :scripture_chapter, :scripture_verse, :scripture_content)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':scripture_book', $scripture_book, PDO::PARAM_STR);
  $stmt->bindValue(':scripture_chapter', $scripture_chapter, PDO::PARAM_INT);
  $stmt->bindValue(':scripture_verse', $scripture_verse, PDO::PARAM_INT);
  $stmt->bindValue(':scripture_content', $scripture_content, PDO::PARAM_STR);
  $stmt->execute();
  $newId = $db->lastInsertId('scriptures_scripture_id_seq');
  $stmt->closeCursor();
  return $newId;
}

function addScriptureLinks($topic, $rowOutcome){
  $db = herokuConnect();
  $sql = 'INSERT INTO scriptures_topics (scripture_id, topic_id)
          VALUES (:scripture_id, :topic_id)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':scripture_id', $rowOutcome, PDO::PARAM_INT);
  $stmt->bindValue(':topic_id', $topic, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}

function getTopicsById($scriptureId){
  $db = herokuConnect();
  $sql = 'SELECT t.topic_name FROM topics as t INNER JOIN scriptures_topics as st ON t.topic_id = st.topic_id WHERE st.scripture_id = :scripture_id';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':scripture_id', $scriptureId, PDO::PARAM_INT);
  $stmt->execute();
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $rows;
}