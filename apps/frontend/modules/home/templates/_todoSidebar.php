<?php use_helper('Global', 'Object') ?>
<table border="0">
  <tbody>
    <?php echo include_partial('home/list_tasks', array('max' => 4, 'tasks' => $tasks, 'type' => 'tasks', )); ?>
    <tr>
      <td colspan="3">
        <hr />
      </td>
    </tr>
    <tr>
      <td colspan="3">
        <?php $todo = new ToDo() ?>
        <?php echo link_to_function('Add new personal todo', visual_effect('toggle_blind', 'todo_sidebar_add_todo', array('duration' => 0.25))) ?>
        <div id="todo_sidebar_add_todo" style="display:none;text-align:right;">
          <?php echo form_remote_tag(array(
               'url'    => 'user/ajaxAddTodo',
               'update' => 'todo_sidebar',
               'complete' => visual_effect('highlight', 'todo_sidebar'),
             ))?>
             <?php if ($sf_request->hasError('name')) { echo '<span class="form-error">'.$sf_request->getError('name').'</span>'; } ?>
             <?php echo label_for('name', 'Todo Name'), object_input_tag($todo, 'getName', array())?><br />
             <?php if ($sf_request->hasError('begin')) { echo '<span class="form-error">'.$sf_request->getError('begin').'</span><br />'; } ?>
             <?php echo label_for('begin', 'Starts'), object_input_date_tag($todo, 'getBegin', array('rich' => 'true')) ?><br />
             <?php if ($sf_request->hasError('finish')) { echo '<span class="form-error">'.$sf_request->getError('finish').'</span><br />'; } ?>
             <?php echo label_for('finish', 'Finished'), object_input_date_tag($todo, 'getFinish', array('rich' => 'true')) ?><br />
             <?php if ($sf_request->hasError('description')) { echo '<span class="form-error">'.$sf_request->getError('description').'</span><br />'; } ?>
             <?php echo label_for('description', 'Descrip.'), object_textarea_tag($todo, 'getDescription', array('rows' => '3', 'cols' => '10', 'style' => 'clear:left;')) ?>
             <?php echo submit_tag('Add Task') ?>
          </form>
        </div>
      </td>
    </tr>
    <?php echo include_partial('home/list_tasks', array('max' => 4, 'tasks' => $todos, 'type' => 'todos', )); ?>
  </tbody>
</table>