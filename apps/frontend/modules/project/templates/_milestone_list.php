<?php use_helper('Date') ?>
<?php foreach ($position->getMilestones('deadline', 'asc') as $milestone): ?>
  <?php echo $milestone->getTitle() ?>, <?php echo format_date($milestone->getDeadline()) ?><br />
<?php endforeach ?>

<?php $project = $position->getProject() ?>

<?php if($sf_user->isAuthenticated() && !$position->isFilled() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
  <?php echo include_partial('project/add_milestone', array('project' => $project, 'position' => $position)); ?>
<?php endif; ?>
