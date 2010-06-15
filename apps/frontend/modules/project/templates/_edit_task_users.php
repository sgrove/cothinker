<?php use_helper('Date', 'I18N', 'Number', 'Javascript')?>

        <div id='<?php echo 'task-'.$task->getUuid().'-users' ?>' style="float:right;">
          <?php echo form_remote_tag(array(
            'update' => 'task-'.$task->getUuid().'-users',
            'url'    => 'project/ajaxAssignTaskUsers',
            'loading'  => "Element.show('indicator-".$task->getUuid()."')",
            'complete' => "Element.hide('indicator-".$task->getUuid()."');".visual_effect('highlight', 'task-'.$task->getUuid()),
            )) ?>
          <fieldset>
            <legend>Assign Task</legend>
            <?php echo input_hidden_tag('task', $task->getUuid(), array()) ?>
          <?php 
            $userlist = array();
            foreach($projectUsers as $user) 
            { 
                if (!in_array($user->getUuid(), $userlist))
                {
                  $userlist[] = $user->getUuid(); // TODO: This seems like a hack, the original function to get users should not include duplicates
                  echo '<label for="taskusers_'.$task->getUuid().'_'.$user->getUuid().'">';
                  echo $user;
                  echo checkbox_tag('taskusers[]', $user->getUuid(), $task->isUser($user), array()).'</label><br />';
                }
            }  
          ?>
          <?php echo submit_tag('Assign Users', array()) ?>
          </fieldset>
          </form>
          <div style="height:20px">
            <p id="indicator-<?php echo $task->getUuid() ?>" style="display:none">
            	<?php echo image_tag('indicator.gif') ?> Assigning users...
            </p>
          </div>
          
          <div id="task-status-holder">
          <?php echo form_remote_tag(array(
            'update' => 'task-'.$task->getUuid().'-holder',
            'url'    => 'project/ajaxSetTaskStatus',
            'loading'  => "Element.show('indicator-".$task->getUuid()."-status')",
            'complete' => "Element.hide('indicator-".$task->getUuid()."-status');".visual_effect('highlight', 'task-'.$task->getUuid()),
            )) ?>
          		<?php echo input_hidden_tag('task', $task->getUuid(), array()) ?>
          		<?php echo select_tag('task-status', options_for_select(array(
          		'2' => 'Pending/In Planning',
          		'1' => 'In Progress',
          		'0' => 'Complete'), $task->getStatus()))?>
          		<?php echo submit_tag('go', array()) ?>
          	</form>
          </div>
          <div style="height:20px">
            <p id="indicator-<?php echo $task->getUuid() ?>-status" style="display:none">
            	<?php echo image_tag('indicator.gif') ?> Settings task status...
            </p>
          </div>
        </div>
