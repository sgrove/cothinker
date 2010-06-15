<div class="project-mini-update">
<h1>What's up with <?php echo $profile->getFirstName() ?>?</h1>
		<?php foreach($profile->getHistory() as $event): ?>
		  <div class="colored-news-entry">
		    <div class="news-item-header">
    			<?php echo image_tag($event->getsfGuardUser()->getProfile()->getThumbnail()) ?>
    			<h3><?php echo $event->getTitle() ?></h3>
    			<h4>team_member_1 on <?php echo format_datetime($event->getCreatedAt()) ?></h4>
    		</div>

		    <p><?php echo short_string($event->getText(), 90) ?></p>
		  </div>
		<?php endforeach; ?>
</div>
