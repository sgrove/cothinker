<?php use_helper('Date', 'I18N', 'Number', 'sfFileGallery', 'Object')?>
<?php echo javascript_tag("
  function hide_blind_class(target)
  {
    $$('.'+target).each(function(el) { Element.hide(el); });
    color_table('task_table');
  }
  
  function show_blind_class(target)
  {
    $$('.'+target).each(function(el) { Element.show(el); });
    color_table('task_table');
  }
  
  function color_table(target)
  {
    target = 'task_table';
    counter = 1;
    direction = 1;
    $$('#task_table tr').each(function(el) {
      Element.removeClassName('row-1');
      Element.removeClassName('row-2');
      Element.removeClassName('row-3');
      //Element.addClassName('row-'.counter);
      if (counter == 5 || counter == 1) {
        direction = direction * -1;
      }
      counter += direction;
      });
  }
") ?>


<h3><?php echo ucwords(__('project tasks')) ?></h3>
<?php $task = new Task() ?>
<?php if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())): ?>
<?php echo link_to_function(icon_tag('add').'New Task', visual_effect('toggle_blind', 'task-new-holder', array('duration' => 0.4)), array('class' => '')); ?>  |  
<?php endif; ?>
<?php echo link_to(icon_tag('chart').'View a Gantt Chart of Project', '@gantt_chart?project='.$project->getSlug().'&title=progress') ?> |
<span id="hide_overdue_control"><?php echo link_to_function('Hide Overdue', "hide_blind_class('dynamic_status_overdue');hide_blind_class('dynamic_status_overdue_details');Element.hide('hide_overdue_control');Element.show('show_overdue_control')") ?></span><span id="show_overdue_control" style="display:none;"><?php echo link_to_function('Show Overdue', "show_blind_class('dynamic_status_overdue');Element.hide('show_overdue_control');Element.show('hide_overdue_control')") ?></span> |
<span id="hide_completed_control"><?php echo link_to_function('Hide Completed', "hide_blind_class('dynamic_status_completed');hide_blind_class('dynamic_status_completed_details');Element.hide('hide_completed_control');Element.show('show_completed_control')") ?></span><span id="show_completed_control" style="display:none;"><?php echo link_to_function('Show Completed', "show_blind_class('dynamic_status_completed');Element.hide('show_completed_control');Element.show('hide_completed_control')") ?></span>

<?php if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())): ?>

<div id="form-holder-blue" style="float:none;" class="form-holder-blue">
    <div id="task-new-holder" style="display:none;margin-bottom:10px;margin-top:5px;">
        <div class="blue-shadow"><div class="blue-title blue-content">Add a task to your project</div></div>
        <div class="blue-shadow">
            <div class="blue-content">
                <?php echo form_tag('project/addTask') ?>
                  <fieldset id="task-details" style="vertical-align:top;border: medium none;">
                    <?php echo input_hidden_tag('slug', $project->getUuid(), array()) ?>
                    <ul>
                      <li style="float:left;width:50%;margin-right:5px;">
                          <?php echo label_for('name', 'Task Name'), object_input_tag($task, 'getName', array('style' => 'width:100%;'))?><br />
                      </li>
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('task_user', 'Assigned to'), select_tag('task_user', options_for_select($users, $task->getSingleUser('uuid'))) ?>
                      </li>
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('priority', 'Task Priority'), select_task_priority('priority', $task->getPriority()) ?><br />
                      </li>
                    </ul>
                    <ul style="clear:both;">
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('begin', 'Task Begins Date'), object_input_date_tag($task, 'getBegin', array('rich' => 'true')) ?><br />
                      </li>
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('finish', 'Task Finish Date'), object_input_date_tag($task, 'getFinish', array('rich' => 'true')) ?><br />
                      </li>
                    </ul>
                    <div style="clear:left;padding:3px;width:100%;">
                      <?php echo label_for('description', 'Description of Task'), object_textarea_tag($task, 'getDescription', array('rows' => '3', 'style' => 'clear:left;')) ?>
                    </div>
                    <?php //echo textarea_tag('task_tags', '', array('rows' => '3')) ?>
                  </fieldset>
                  <?php echo submit_tag('Add Task') ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<table id="task_table_key" border="0" class="grspd-wave" style="width:100%;">
  <tbody>
  <tr>
    <td>Key</td>
    <td class="task-status-completed">&nbsp;</td>
    <td>Completed</td>
    <td class="task-status-open">&nbsp;</td>
    <td>On Schedule</td>
    <td class="task-status-upcoming">&nbsp; </td>
    <td>Upcoming</td>
    <td class="task-status-overdue">&nbsp;</td>
    <td>Overdue</td>
  </tr>
</tbody>
</table>
<?php /*
<div>
    <?php if ($project->getTasksJoinOwner() != null): ?>
	<?php foreach($project->getTasks() as $task): ?>
	    <div style="border: 1px solid #72BE44;background-color: #D9E1FF;padding: 4px;margin-bottom: 10px;">
		<p style="float:right;text-align:right;">
		    Assigned by <?php echo link_to($task->getSfGuardUser()->getProfile(), 'user/show?user='.$task->getSfGuardUser()->getProfile()->getUuid()) ?> on <?php echo format_date($task->getCreatedAt()) ?><br />
		    <?php echo icon_tag('comment').' '.$task->getNbComments().' Comments ',
                    icon_tag('folder').' '.get_nb_files('Task', $task->getId()).' Files '; if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())) { echo icon_tag('note_edit').' '.link_to('Edit Task', 'tasks/edit?task='.$task->getUuid()).' '.icon_tag('note_remove').' '.link_to('Delete Task', 'tasks/delete?task='.$task->getUuid(), 'post=true&confirm=Are you sure you want to delete the task "'.$task->getName().'"?'); } ?>
		</p>
		<p style="float:left;">
		    <h2><?php echo link_to($task->getName(), 'project/showTask?tab=tasks&task='.$task->getUuid()) ?></h2>
		    <?php echo short_string($task->getDescription(), 120) ?>
		</p>
	    </div>
	  <?php endforeach; ?>
	<?php endif; ?>
</div>
*/ ?>

<div class="">

<?php 
  $sort_by = strtolower($sf_request->getParameter('sort_by', 'finish'));
  $dir = strtolower($sf_request->getParameter('direction', 'asc'));
  
  if ($dir == 'asc') {
    $dir_opposite = 'desc';
  }
  else {
    $dir_opposite = 'asc';
  }

?>
<?php $tasks = $project->getSortedTasks($sort_by, $dir) ?>
<table id="task_table" border="0" class="grspd-wave" style="width:100%;">
  <thead>
  <tr style="background-color:#87B94D;">
    <th></th>
    <th><?php echo link_to('Task', '@list_project_tasks?slug='.$project->getSlug().'&sort_by=name&direction='.$dir_opposite) ?></th>
    <th>Assigned to</th>
    <th><?php echo link_to('By', '@list_project_tasks?slug='.$project->getSlug().'&sort_by=assigned_by&direction='.$dir_opposite) ?></th>
    <th><?php echo link_to('Due On', '@list_project_tasks?slug='.$project->getSlug().'&sort_by=finish&direction='.$dir_opposite) ?></th>
    <th><?php echo link_to('Status', '@list_project_tasks?slug='.$project->getSlug().'&sort_by=status&direction='.$dir_opposite) ?></th>
  </tr>
  </thead>
  <tbody>
  <?php $counter = 2; $direction = 1;?>
<?php foreach ($tasks as $task): ?>
  <?php if ($counter == 3 || $counter == 1) $direction = -1 * $direction; ?>
  <?php $counter = $counter + (1 * $direction) ?>
  <tr class="row-<?php echo $counter?> dynamic_status_<?php echo $task->getStatusInWords() ?>">
    <td class="task-status-<?php echo $task->getStatusInWords() ?>">&nbsp; </td>
    
    <td><?php echo link_to_function($task->getName(), visual_effect('toggle_blind', 'task-details-'.$task->getUuid(), array('duration' => '0.5'))) ?> (<?php echo link_to('Details', 'project/showTask?task='.$task->getUuid()) ?>)</td>
    <td><?php $t_user = $task->getSingleUser(); if ($t_user == null) {
      echo "Unassigned";
    }
    else
    {
     echo $task->getSingleUser('user')->getProfile()->getFullName();
    } ?></td>
    <td><?php echo $task->getsfGuardUser()->getProfile()->getFullName() ?></td>
    <td><?php echo format_date($task->getFinish()) ?></td>
    <td><?php echo $task->getStatusInWords() ?></td>
  </tr>
  <tr id="task-details-<?php echo $task->getUuid() ?>" style="display:none;" class="dynamic_status_<?php echo $task->getStatusInWords() ?>_details">
    <td>
      &nbsp;
    </td>
    <td colspan="5">
  		<p>
  		  <?php echo ucfirst($task->getPriorityInWords()) ?> Priority<br />
  		</p>
  		<p>
  		    <?php echo short_string(strip_tags($task->getDescription()), 320) ?>
  		</p>
  		<p>
          <?php echo icon_tag('comment').' '.$task->getNbComments().' Comments ',
                      icon_tag('folder').' '.get_nb_files('Task', $task->getId()).' Files '; if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())) { echo icon_tag('note_edit').' '.link_to('Edit Task', 'tasks/edit?task='.$task->getUuid()).' '.icon_tag('note_remove').' '.link_to('Delete Task', 'tasks/delete?task='.$task->getUuid(), 'post=true&confirm=Are you sure you want to delete the task "'.$task->getName().'"?'); } ?>
  		</p>
  	</td>
  </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
