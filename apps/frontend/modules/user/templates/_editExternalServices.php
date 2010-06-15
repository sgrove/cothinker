<?php use_helper('Javascript', 'Object', 'sfIcon') ?>
<?php //echo form_tag('', array('name' => 'services', 'class' => 'blue',)) ?>

<?php echo form_remote_tag(array(
'url' => 'user/updateExternalServices',
'update' => 'external_services',
'complete' => visual_effect('highlight', 'external_services')
), 'id=services_form class="blue"') ?>

<?php if ($sf_request->getMethod() == sfRequest::POST): ?>
  <?php if ($sf_request->hasErrors()): ?>
    <?php echo icon_tag('remove').__(' Woops! Seems there were some errors!') ?>
  <?php else: ?>
    <?php echo icon_tag('accept').__(' Great, seems like we got everything!') ?>
  <?php endif ?>
<?php endif ?>

<?php $es = $profile->getExternalServices() ?>

  <?php echo label_for('twitter_username', __('Twitter Username'), array('style' => 'display:block;')), input_tag('twitter_username', $es->getTwitterUsername()) ?><?php if ($sf_request->hasError('twitter_username')) { echo '<span class="form-error">'.$sf_request->getError('twitter_username').'</span>'; } ?><br />
  <?php echo label_for('twitter_password', __('Twitter Password'), array('style' => 'display:block;')), input_password_tag('twitter_password', $es->getTwitterEncryptedPassword()) ?><?php if ($sf_request->hasError('twitter_password')) { echo '<span class="form-error">'.$sf_request->getError('twitter_password').'</span>'; } ?><br />
  <?php echo label_for('twitter_update', __('Send updates via twitter?')), checkbox_tag('twitter_update', '1', $es->getTwitterUpdate(), array()) ?><br />
  <?php echo label_for('twitter_status_update', __('Update CoThink status via twitter?')), checkbox_tag('twitter_status_update', '1', $es->getTwitterStatusUpdate(), array()) ?><br />
  <?php echo submit_tag(__('Save Changes'), array('class' => 'btn', 'style' => 'margin-top:6px;')) ?>
</form>

<hr class="clear" />
