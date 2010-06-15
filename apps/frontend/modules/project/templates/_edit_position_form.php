<?php use_helper('Object', 'Javascript') ?>
  <div id="member-new-holder" style="margin-bottom:10px;margin-top:5px;">
    <div class="blue-shadow"><div class="blue-title blue-content">Add a team position to your project (<?php echo $project->getSlug() ?>)</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <?php echo form_remote_tag(array(
          'url'    => 'project/updatePosition',
          'update' => 'position_form_holder',
          'script' => true, 
        )) ?>
        
        <fieldset id="task-details" style="vertical-align:top;border: medium none;">
          <?php echo input_hidden_tag('project', $project->getSlug(), array()) ?>
          <?php echo input_hidden_tag('tab', 'team') ?>
          <?php echo input_hidden_tag('position', $position->getUuid(), array()) ?>
          <?php if ($sf_request->hasError('title')) { echo '<span class="form-error">'.$sf_request->getError('title').'</span>'; } ?>
          <?php echo label_for('title', 'Position title'), input_tag('title', $position->getTitle())?><br />
          <?php if ($sf_request->hasError('description')) { echo '<span class="form-error">'.$sf_request->getError('description').'</span>'; } ?>
          <?php echo label_for('description', 'Describe what this team member would do?'), textarea_tag('description', $position->getDescription(), array('rows' => '3')) ?>
          <?php if ($sf_request->hasError('qualifications')) { echo '<span class="form-error">'.$sf_request->getError('qualifications').'</span>'; } ?>
          <?php echo label_for('qualifications', 'Qualifications for the position'), textarea_tag('qualifications', $position->getQualifications(), array('rows' => '2')) ?>
        </fieldset>
        <?php echo ($position->isNew()) ?  submit_tag('Add Position') : submit_tag('Update Position'); ?>
      </form>
    </div>
  </div>
</div>
