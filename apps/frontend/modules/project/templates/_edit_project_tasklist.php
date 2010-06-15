<?php use_helper('Date', 'I18N', 'Number', 'Javascript', 'Global')?>

<div id="edit-tasks-holder">
    <?php if ($collapsable): ?>
      <?php echo link_to_function('Project Tasks', visual_effect('toggle_blind', 'project-tasks', array('duration' => 0.5)), array('class' => 'titlebar-clickable project-titlebar')); ?>
    <?php else: ?>
      <div class="project-titlebar">
        <?php echo ucwords(__('project tasks')) ?>
      </div>
    <?php endif; ?>
  <div id="project-tasks" <?php if ($collapsable) { echo 'style="display:true;"'; } ?> >
    <?php if ($project->getTasks() != null): ?>
      <?php foreach($project->getTasks() as $task): ?>
        <div id="task-<?php echo $task->getUuid() ?>-holder" style="border: 1px solid black;margin:4px;padding:4px;">
          <?php include_partial('edit_project_singletask', array('task' => $task, 'projectUsers' => $projectUsers), array('evalScripts' => true))?>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
    
    <?php $task = new Task() ?>
    <?php if ($sf_user->isAuthenticated() && $project->hasPermission('create-task')): ?>
    
    <div id="task-new-holder">
      <div>
        <?php echo form_remote_tag(array(
        'update'   => 'edit-tasks-holder',
        'url'      => 'project/ajaxAddTask',
        )) ?>
          <div id="task-details" class="float-left" style="vertical-align:top;">
            <?php echo input_hidden_tag('project', $project->getUuid(), array()) ?>
            <?php echo input_tag('task_name', 'Task Name')?>
            <?php echo textarea_tag('task_description', 'Task Description', array('rows' => '3')) ?>
            <?php echo textarea_tag('task_tags', '', array('rows' => '3')) ?>
          </div>
          <div id="task-dates" class="float-right" style="text-align:right;">
            <label for="task_begin">Task Starts: <?php echo input_date_tag('task_begin', '', array('rich' => 'true')) ?></label><br />
            <label for="task_finish">Task Due: <?php echo input_date_tag('task_finish', '', array('rich' => 'true')) ?><br />
            <?php echo submit_tag('Add Task') ?>
          </div>
          <div style="height:20px">
            <p id="indicator" style="display:none">
              <?php echo image_tag('indicator.gif') ?> adding task...
            </p>
          </div>
        </form>
      </div>
      <div class="clear-both">&nbsp;</div>
    </div>
  <?php endif; ?>
</div>