<div class="project-main-header" style="border:2px solid black; width:80%">
	<?php echo image_tag($project->getPhoto('medium'), array('class' => 'primary')) ?>
	<h1><?php echo $project->getTitle() ?></h1>
	<p><?php echo $project->getDescription() ?></p>
<?php if ($sf_user->isAuthenticated() && $project->isAdmin($sf_user->getProfile()->getUserId())): ?><span><?php echo link_to(__('Edit Details'), 'project/edit?slug='.$project->getSlug()); ?></span><?php endif; ?>

	<div style="float: left; margin-right: 10px;">
		Campus:<br />
                Department:<br />
		Updated:<br />
		Tags:<br />
	</div>
	<div>
                <?php echo $project->getCampus() ?><br />
		<?php echo $project->getDepartment() ?><br />
		<?php $event = $project->getLastUpdated(); echo ucfirst(distance_of_time_in_words($event->getCreatedAt('U')).' ago'), ' ('.$event->getCategory().')'; ?><br />
        <?php foreach($project->getTags() as $tag): ?>
          <?php echo link_to($tag, '#') ?> 
        <?php endforeach; ?>
	</div>
</div>

<div id="project_widget_1" class="project-widget-edit">
<h1>Widget 1</h1>
  Drag the widget you would like to appear here.<br />
  Area 1 is currently set to display the {<?php echo $project->getForm("main")->getWidget1() ?>} widget.
</div>

<div id="project_widget_2" class="project-widget-edit">
<h1>Widget 2</h1>
  Drag the widget you would like to appear here.<br />
  Area 2 is currently set to display the {<?php echo $project->getForm("main")->getWidget2() ?>} widget.
</div>

<?php echo drop_receiving_element('project_widget_1', array(
  'update'     => 'project_widget_1',
  'url'        => 'home/sandbox2?project='.$project->getSlug().'&form=main&area=1',
  'accept'     => 'droppable',
  'script'     => 'true',
  'hoverclass' => 'project-widget-edit-active',
  'loading'    => "Element.show('indicator')",
  'complete'   => "Element.hide('indicator')"
)) ?>


<div style="clear:both;">
</div>

<?php echo drop_receiving_element('project_widget_2', array(
  'update'     => 'project_widget_2',
  'url'        => 'home/sandbox2?project='.$project->getSlug().'&form=main&area=2',
  'accept'     => 'droppable',
  'script'     => 'true',
  'hoverclass' => 'project-widget-edit-active',
  'loading'    => "Element.show('indicator')",
  'complete'   => "Element.hide('indicator')"
)) ?>
