<?php use_helper('Date', 'I18N', 'Number', 'Javascript', 'Global')?>
          <?php include_partial('edit_task_users', array('task' => $task, 'projectUsers' => $projectUsers), array('evalScripts' => true))?>
          <span><?php echo link_to($task->getName(), 'tasks/show?slug='.$task->getSlug()) ?></span><br />
          <span><?php echo ucfirst(__('created by %1%', array('%1%' => $task->getSfGuardUser()->getProfile()))) ?></span><br />
          <span><?php echo ucfirst(__('beginning %1%, ending %2%', array('%1%' => format_date($task->getBegin()), '%2%' => format_date($task->getFinish())))) ?></span><br />
          <span><?php echo nl2br($task->getDescription()) ?></span><br />
          <span><?php echo tags_to_links($task->getTags()) ?></span><br />
          <span><?php echo format_number_choice('[0]Complete|[1]In Progress|[2]Pending/Planning|(2,+Inf]Unknown task status code)', '', $task->getStatus()) ?></span>
          <div style="clear:both;"></div>
