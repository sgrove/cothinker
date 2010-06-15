<?php use_helper('Date', 'Javascript') ?>
<div id="new_position_milestone">
  <?php echo form_remote_tag(array(
      'update'   => 'milestone_list',
      'url'      => 'project/addPositionMilestone',
      'name' => 'milestone_form_'.$position->getUuid(), 
  )) ?>
      <?php echo input_hidden_tag('milestone_position', $position->getUuid(), array()) ?>
    <?php echo label_for('milestone_title', __('Milestone Title')), input_tag('milestone_title'), label_for('milestone_deadline', __('When is the deadline for this milestone?')), input_date_tag('milestone_deadline', '', array('rich' => 'true', )) ?><br />
    <?php echo label_for('milestone_description', __('Describe this milestone. What does this milestone measure?')), textarea_tag('milestone_description', '', array('rows' => '3')) ?>
    <?php echo label_for('milestone_deliverables', __('What do you want delivered by this position on this milestone? Be specific!')), textarea_tag('milestone_deliverables', '', array('rows' => '3')) ?><br />
    <?php echo submit_tag('Add Milestone', array()) ?>
  </form>
</div>