<?php use_helper('Global', 'sfIcon') ?>
<?php echo nav_tabs('project', $tab, $project); ?>

<div class="project-positions">

  <?php if ($project->isNew()): ?>
    <h1>Create a New Position</h1>  
  <?php else: ?>
    <h1>Edit Position Details</h1>  
  <?php endif ?>

  <?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
    <div id="position_form_holder">
      <?php echo include_partial('project/edit_position_form', array('project' => $project, 'position' => $position)); ?>
    </div>
    

  <?php if ($position->isNew()): ?>
    <h2>You'll enter in position-specific milestones after creating the position</h2>
  <?php else: ?>
    <h2>Edit Position Milestones</h2>
    <div id="milestone_list">
      <?php echo include_partial('project/milestone_list', array('position' => $position)); ?>
      <br />
    </div>
    
  <?php endif ?>
<?php endif; ?>
</div>