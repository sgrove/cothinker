<?php use_helper('Global') ?>
<?php 
  $panel = array();
  $panel['title']   = "Did you know...";
  $panel['content'] = $didYouKnow->getText();
  $panel['id']      = 'panel-did-you-know';
  $panel['class']   = 'panel-holder panel-size-1 float-right clear-both';

  echo output_panel($panel);
?>