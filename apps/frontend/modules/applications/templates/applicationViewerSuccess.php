<?php use_helper('Date', 'FormatSize', 'Javascript', 'sfIcon', 'Object') ?>

<?php $user = $application->getsfGuardUser()->getProfile() ?>
<h3 style="background-color:#72BE44;color:white;padding:2px;"><?php echo $application->getProjectPosition()->getTitle() ?> Application from: <?php echo link_to($user->getFullName(), 'user/show?user='.$user->getUuid()).' ('.ucfirst($user->getTitle()).')' ?></h3>

<div style="width:47%;float:left;border-right:1px dotted gray;margin:15px 5px 0px">
	Quick history for <?php echo $user->getFullName() ?><br />
	Department: <?php echo $user->getDepartment() ?>, specializing in <?php echo $user->getSubdepartment() ?><br />
	<h4 style="background-color:#dae1fd;border-bottom:1px dotted gray;margin:5px 0px;"><?php echo __('What interested you about this project, and this position in particular?') ?></h4>
	<p><?php echo $application->getInterest() ?></p>
	<h4 style="background-color:#dae1fd;border-bottom:1px dotted gray;margin:5px 0px;"><?php echo __('What makes you feel you meet the qualifications for this position?') ?><br /></h4>
	<p><?php echo $application->getQualification() ?></p>
	<h4 style="background-color:#dae1fd;border-bottom:1px dotted gray;margin:5px 0px;"><?php echo __('Is there anything else you would like to add?') ?></h4>
	<p><?php echo $application->getNotes() ?></p>
</div>

<div class="float-right">
<?php $message = new Message() ?>

<div style="margin: 15px 5px 0px;">
	<div class="blue-shadow"><div class="blue-title blue-content">
	<?php if ($application->getStatus() != sfConfig::get('app_position_application_status_pending')): ?>
		You have processed this application. You <?php echo format_number_choice('['.sfConfig::get('app_position_application_status_accepted').']accepted|['.sfConfig::get('app_position_application_status_declined').']declined', null, $application->getStatus())?> <?php echo $user->getFullName() ?>'s application.
	<?php else: ?>
	<?php echo __('Process this application') ?></div></div>
	<div class="blue-shadow" id="process_form">
		<div class="blue-content">
			<?php echo form_remote_tag(array(
				'update' => 'details',
				'url' => 'applications/ajaxAccept?application='.$application->getUuid())) ?>
				<div class="message-view-single" style="border: medium none;">
					<?php echo submit_tag(ucwords(__('Accept')), array('class' => 'pswipebutton')) ?>
				</div>
			</form>
			<?php echo form_remote_tag(array(
				'update' => 'details',
				'url' => 'applications/ajaxDecline?application='.$application->getUuid())) ?>
				<div class="message-view-single" style="border: medium none;">
					<div class="message-view-single" style="border: medium none;">
					<?php //echo submit_tag(ucwords(__('Decline')), array('class' => 'pswipebutton')) ?>
				</div>
			</form>		
		</div>
		<?php endif; ?>
	</div>
</div>
</div>

<div style="margin: 15px 5px 0px;">
	<div class="blue-shadow"><div class="blue-title blue-content"><?php echo link_to('Send '.$user->getFullName().' a message', 'messages/compose?recipient='.$user->getUuid()) ?></div></div>
	<div class="blue-shadow" style="display:none;" id="message_form">
		<div class="blue-content" id="app_message">
		   <?php echo form_remote_tag(array(
		     'url'    => 'messages/ajaxSend',
		     'update' => 'app_message',
		     'complete' => visual_effect('highlight', 'app_message'),
		   )) ?>
			<div class="message-view-single" style="border: medium none;">
				<ul>
					<li>
						<?php echo ucwords(__('to')) ?>: <?php echo '<em>('.$user->getFullName().')</em><br />'.input_hidden_tag('user_recipient', $user->getUuid()) ?><br />
						<?php echo ucwords(__('subject')) ?>:
					</li>
					<li>
					<?php echo object_input_tag($message, 'getSubject', array('style' => 'width:100%;'))?>
				</li>
			</ul>
			<hr class="clear" />
			<?php echo object_textarea_tag($message, 'getBody', array (
				'style' => 'width:100%;',
					'rows' => '10',
					)) ?>
					<?php echo submit_tag(ucwords(__('send')), array('class' => 'pswipebutton')) ?>
				</div>
			</form>
		</div>
	</div>
</div>

</div>
<hr class="clear" />