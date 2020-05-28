<?php
//This is a functions library file to store constructors

//Construct a scriptures list
function scriptureBuilder($scriptures){
    $scripturesList = "<ul class='list-group'>";
    
    foreach ($scriptures as $scripture) {
      $tl = '';
      $scripturesList .= "<li class='list-group-item'><span class='font-weight-bold'>" . $scripture['scripture_book'] . " " . $scripture['scripture_chapter'] . ":" . $scripture['scripture_verse'] . " - " . "</span>" . $scripture['scripture_content'] ."<br />";
        $topics = getTopicsById($scripture['scripture_id']);
        foreach ($topics as $st){
          $tl .= "<span class='badge badge-pill badge-info mx-1'>".$st['topic_name']."</span>";
        }
        $scripturesList .= $tl . "</li>";
    }
    $scripturesList .= "</ul>";
 
    return $scripturesList;
}

//Build a checkboxex with topics
function topicBuilder($topics) {
    $topicsList = "<div class='form-group row'>
      <label for='comments' class='col-sm-2 col-form-label'>Related Topics</label>
      <div class='col-sm-10'>";
    foreach ($topics as $topic) {
        $topicsList .= "<div class='form-check'>
          <input class='form-check-input' type='checkbox' name='scriptureTopic[]' value='" . $topic['topic_id'] . "' id='" . $topic['topic_name'] . "'>
          <label class='form-check-label' for=" . $topic['topic_name'] . ">"
            . $topic['topic_name'] . "</label></div>";
    }
    $topicsList .= "</div></div>";
    return $topicsList;
  }

?>
