<?php echo image_tag($project->getPhoto('medium'), array('class' => 'primary')) ?>
<h1><?php echo $project->getTitle() ?></h1>
<p><?php echo $project->getDescription() ?></p>
<?php if ($sf_user->isAuthenticated() && $project->isAdmin($sf_user->getProfile()->getUserId())): ?><span><?php echo link_to(__('Edit Details'), '@edit_project?project='.$project->getSlug()); ?></span><?php endif; ?>

  <div style="float: left; margin-right: 10px;">
    Campus:<br />
    Department:<br />
    Updated:<br />
  </div>
  <div>
    <?php echo $project->getCampus() ?><br />
    <?php echo $project->getDepartment() ?><br />
    <?php $event = $project->getLastUpdated(); echo ucfirst(distance_of_time_in_words($event->getCreatedAt('U')).' ago'), ' ('.$event->getCategory().')'; ?><br />
  </div>
  <div style="float: right; right:10px; bottom: 10px;display:inline;">
    <?php if ($sf_user->isAuthenticated()): ?>
      <span>Favorite <?php echo link_to_favorite($project, array()) ?></span> |
      <?php if ($sf_user->getProfile()->isSubscribedToHistoryGroup($project->getHistoryGroup()) == false): ?>
        <span>Subscribe <?php echo link_to(icon_tag('rss'), 'user/subscribeToFeed?feed='.$project->getHistoryGroup()->getUuid()) ?></span>
      <?php else: ?>
        <span>Unsubscribe <?php echo link_to(icon_tag('rss'), 'user/unsubscribeToFeed?feed='.$project->getHistoryGroup()->getUuid()) ?></span>
      <?php endif; ?>
    <?php endif; ?> 
  </div>