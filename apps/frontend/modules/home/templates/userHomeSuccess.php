<?php use_helper('I18N', 'Javascript') ?>


<div id="user-recent-activity" class="panel-holder panel-size-1 float-right">
  <div class="project-titlebar">
    Recent Activity
  </div>
  <div class="panel-default">
    <?php $events = $sf_user->getProfile()->getHistory(5); ?>
    <ul>
      <?php foreach ($events as $event): ?>
        <li><?php echo substr($event->getTitle().' : '.$event->getText(), 0, 33).'...' ?></li>
      <?php endforeach ?>
    </ul>
  </div>
</div>

<br />
<?php include_component('messages', 'recentMessages') ?>
<br />
<?php include_component('home', 'didYouKnow') ?>

<?php $events = $sf_user->getProfile()->getHistory(25); ?>

<div>
  <h1>News Feed</h1>
  <?php foreach ($events as $event): ?>
    <h2><?php echo $event->getTitle() ?></h2>
    <h3><?php echo $event->getText() ?></li>
  <?php endforeach ?>
