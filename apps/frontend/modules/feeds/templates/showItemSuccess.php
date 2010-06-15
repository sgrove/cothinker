<?php use_helper('Date', 'I18N') ?>
<div>
  <h2 style="border-bottom: 2px solid #D4D4D4;">News Item</h2>
  <div class="news-feed-entry">
    <h3><?php echo $event->getTitle() ?></h3>
    <span><?php echo __('By <strong>%user%</strong> of the %department% dept. on %time%', array('%user%' => $event->getSfGuardUser()->getProfile(), '%department%' =>  $event->getSfGuardUser()->getProfile()->getDepartment(), '%time%' => format_date($event->getCreatedAt('U')))) ?></span>
    <div id="entry_<?php echo $event->getUuid() ?>" style="padding: 5px 0px;"><?php echo $event->getText() ?></div>
  </div>
</div>