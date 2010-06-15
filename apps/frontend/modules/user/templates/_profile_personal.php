<?php use_helper('I18N', 'Javascript', 'sfIcon', 'Global') ?>

<?php 

  $content = 'These widgets over here don\'t do much now, but we have plenty of useful things planned for them. If you\'re really anxious to get these things going, head over to the <strong>'.link_to('suggestions page', 'features/list?tab=mostpopular#70').'</strong> and vote for #70! Better yet, tell us what interested ideas you have for Cothink widgets!';

  $panel = array();
  $panel['title']   = "Forgetful widgets";
  $panel['content'] = $content;
  $panel['id']      = 'panel-user-recent-activity';
  $panel['class']   = 'panel-holder panel-size-1 float-right clear-both';

  echo output_panel($panel);
?>
<?php 

  $content = '';

  $events = $sf_user->getProfile()->getHistory(5);
  $counter = 0;
  foreach ($events as $event)
  {
    $counter++;
    $content .= "<span>$counter. ".substr($event->getTitle().' : '.$event->getText(), 0, 30).'...</span><br />';
  }


  $panel = array();
  $panel['title']   = "Recent Activity";
  $panel['content'] = $content;
  $panel['id']      = 'panel-user-recent-activity';
  $panel['class']   = 'panel-holder panel-size-1 float-right clear-both';

  echo output_panel($panel);
?>
<?php include_component('messages', 'recentMessages') ?>

<div style="width:60%;">
  <h2 style="border-bottom: 2px solid #D4D4D4;">News     <?php echo link_to(icon_tag('rss'), 'feeds/latest?feed='.$profile->getUuid()) ?></h2>
  <?php foreach ($sf_user->getProfile()->getHistory(8) as $event): ?>
  <div class="news-feed-entry">
    <h3><?php echo link_to_function(icon_tag('add').' '.$event->getTitle(), visual_effect('toggle_blind', 'entry_'.$event->getUuid(), array('duration' => '0.25'))) ?></h3>
    <span><?php echo __('By <strong>%user%</strong> of the %department% dept. on %time%', array('%user%' => $event->getSfGuardUser()->getProfile(), '%department%' =>  $event->getSfGuardUser()->getProfile()->getDepartment(), '%time%' => format_date($event->getCreatedAt('U')))) ?></span>
    <div id="entry_<?php echo $event->getUuid() ?>" style="padding: 5px 0px;display:none;"><?php echo $event->getText() ?></div>
  </div>
  <?php endforeach ?>
</div>

<hr class="clear" />