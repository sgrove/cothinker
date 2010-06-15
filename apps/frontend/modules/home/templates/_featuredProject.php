<div id="cothink-featured">
	<h1>Featured Project</h1>
<?php if (isset($project) && $project != null): ?>
	<h3><?php echo $project->getTitle() ?></h3>
	<div class="featured-project-summary">
	<?php echo image_tag($project->getPhoto("medium")) ?>
		<div style="float:left;margin-right:10px;">
		Owner: 	<br />
		Dep:	<br />
		Started:<br />
		Updated:<br />
		</div>
		<div>
			<?php echo link_to($project->getsfGuardUserRelatedByOwnerId()->getProfile(), '@show_user?user='.$project->getsfGuardUserRelatedByOwnerId()->getProfile()->getUuid()).' ('.$project->getsfGuardUserRelatedByOwnerId()->getProfile()->getTitle().')' ?><br />
			<?php echo $project->getDepartment() ?><br />
			<?php echo format_date($project->getCreatedAt('U')) ?><br />
			<?php $event = $project->getLastUpdated(); echo distance_of_time_in_words($event->getCreatedAt('U')).' ago ', ' ('.$event->getCategory().')'; ?><br />
		</div>
		
		<div style="clear:both;"></div>
	</div>
	<div class="featured-project-description">
		<h2>Description</h2>
		<p><?php echo short_string($project->getDescription(), 200) ?></p>
		<br />
		<h2>Project News</h2>

		<div class="news-item-header">
			<?php echo image_tag($event->getsfGuardUser()->getProfile()->getThumbnail()) ?>
			<h3><?php echo short_string($event->getTitle(), 50) ?></h3>
			<h4><?php echo __('By %1% %2% ago', array('%1%' => $event->getsfGuardUser()->getProfile()->getFullName(), '%2%' => distance_of_time_in_words($event->getCreatedAt('U')))) ?></h4>
		</div>
		<h2>Cothink's Comment</h2>
		<p><?php echo $featured->getComment() ?></p>
	<?php endif ?>
