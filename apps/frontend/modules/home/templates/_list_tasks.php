<?php use_helper('Date') ?>
<?php $count = 0; ?>
   <?php foreach ($tasks as $task): ?>
     <?php if ($task->getStatus() != sfConfig::get('app_task_status_completed')): ?>
     <?php if ($count == $max) break; ?>
     <tr>
       <td colspan="3">
         <?php if ($type == 'tasks')
         {
           $url = '@show_task?project='.$task->getProject()->getSlug().'&task='.$task->getUuid().'&tab=tasks';
         }
         else {
          $url = '@show_todo?user='.$task->getsfGuardUser()->getProfile()->getUuid().'&todo='.$task->getSlug();
         }
         ?>
          <?php echo link_to(short_string($task->getName(), 25), $url, array('title' => strip_tags($task->getDescription()))) ?>
       </td>
     </tr>
     <tr>
       <td>Due <?php echo format_date($task->getFinish()) ?></td>
       <td class="task-status-<?php echo $task->getStatusInWords() ?>">&nbsp;</td>
     </tr>
     <?php $count++; ?>
    <?php endif; ?>
   <?php endforeach ?>
   <?php if (count($tasks) == 0): ?>
    <?php if ($type == 'tasks'): ?>
      No upcoming project tasks
    <?php endif ?>
   <?php endif ?>