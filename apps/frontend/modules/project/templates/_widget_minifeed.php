<?php use_helper('Global') ?>
<h1>Recent Activity</h1>
<?php foreach($project->getHistory() as $event): ?>
  <div class="news-item-header">
    <?php echo image_tag($event->getsfGuardUser()->getProfile()->getThumbnail()) ?>
    <h3><?php echo short_string($event->getTitle(), 50) ?></h3>
    <h4><?php echo __('By %1% %2% ago', array('%1%' => $event->getsfGuardUser()->getProfile()->getFullName(), '%2%' => distance_of_time_in_words($event->getCreatedAt('U')))) ?></h4>
  </div>

  <p><?php echo $event->getText() ?></p>
<?php endforeach; ?>
