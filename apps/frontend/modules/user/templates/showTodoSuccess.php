<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global', 'sfFileGallery', 'sfIcon', 'Object') ?>
<span><?php echo link_to_function('Edit Todo', visual_effect('toggle_blind', 'form-holder-blue', array('duration' => '1'))) ?></span>
<div style="border: 1px solid #72BE44;background-color: #D9E1FF;padding: 4px;margin-bottom: 10px;">
  <p style="float:right;text-align:right;">
    Your ToDo was entered on <?php echo format_date($todo->getCreatedAt()) ?><br />
    Set to finish by <?php echo format_date($todo->getFinish()) ?>
  </p>
  <p style="float:left;">
    <h2><?php echo $todo->getName() ?></h2>
    <?php echo nl2br($todo->getDescription()) ?>
  </p>
  <p style="clear: both;">&nbsp;</p>
</div>

<div id="form-holder-blue" style="float:none;display:none;" class="form-holder-blue">
    <div id="task-new-holder" style="margin-bottom:10px;margin-top:5px;">
        <div class="blue-shadow"><div class="blue-title blue-content">Editing <?php echo $todo->getName() ?></div></div>
        <div class="blue-shadow">
            <div class="blue-content">
                <?php echo form_tag('user/updateTodo') ?>
                  <fieldset id="task-details" style="vertical-align:top;border: medium none;">
                    <?php echo input_hidden_tag('todo', $todo->getSlug(), array()) ?>
                    <ul>
                      <li style="float:left;width:50%;margin-right:5px;">
                          <?php echo label_for('name', 'Todo Name'), object_input_tag($todo, 'getName', array('style' => 'width:100%;'))?><br />
                      </li>
                    </ul>
                    <ul style="clear:both;">
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('begin', 'Starts'), object_input_date_tag($todo, 'getBegin', array('rich' => 'true')) ?><br />
                      </li>
                      <li style="float:left;margin-right:5px;">
                          <?php echo label_for('finish', 'Finished'), object_input_date_tag($todo, 'getFinish', array('rich' => 'true')) ?><br />
                      </li>
                      <li style="float:left;margin-right:5px;padding-top:20px;">
                          <?php echo checkbox_tag('status', sfConfig::get('app_task_status_completed'), $todo->getStatus()), label_for('status', 'ToDo Completed', array('style' => 'display:inline;')) ?><br />
                      </li>                      
                    </ul>
                    <div style="clear:left;padding:3px;width:100%;">
                      <?php echo label_for('description', 'Description of Task'), object_textarea_tag($todo, 'getDescription', array('rows' => '3', 'style' => 'clear:left;')) ?>
                    </div>
                    <?php //echo textarea_tag('task_tags', '', array('rows' => '3')) ?>
                  </fieldset>
                  <?php echo submit_tag('Update Task') ?>
                </form>
            </div>
        </div>
    </div>
</div>

<hr class="clear" />