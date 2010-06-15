<?php use_helper('Date', 'I18N', 'Number')?>
<div class="project-titlebar"><h3><?php echo ucwords(__('project tasks')) ?></h3></div>
<table style="width:100%;" style="text-align:left;">
  <tbody>
    <tr>
      <th><?php echo ucwords(__('name'))       ?> </th>
      <th><?php echo ucwords(__('owner'))      ?> </th>
      <th><?php echo ucwords(__('begin'))      ?>   - Finish</th>
      <th><?php echo ucwords(__('assigned to'))?> </th>
      <th><?php echo ucwords(__('status'))     ?> </th>
    </tr>
    <?php if ($project->getTasksJoinOwner() != null): ?>
      <?php foreach($project->getTasks() as $task): ?>
      <tr style="border-bottom: 1px solid black;">
      	<?php if (!$task->isComplete()): ?>
	        <td><?php echo link_to($task->getName(), 'tasks/show?slug='.$task->getSlug()) ?></td>
	        <td><?php echo $task->getSfGuardUser()->getProfile() ?></td>
	        <td><?php echo format_date($task->getBegin()).' - '.format_date($task->getFinish()) ?></td>
	        <td><?php foreach($task->getUsers() as $user) { echo $user->getSfGuardUser()->getProfile().'<br />'; }  ?></td>
	        <td><?php echo format_number_choice('[0]Complete|[1]In Progress|[2]Pending/Planning|(2,+Inf]Unknown task status code)', '', $task->getStatus()) ?></td>
	      <?php else: ?>
	    		<td colspan="4"><s><?php echo link_to($task->getName(), 'tasks/show?slug='.$task->getSlug()) ?></td>
	    		<td>complete</td>
	    	<?php endif; ?>
      </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

