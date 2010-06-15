<?php use_helper('Object', 'Validation') ?>

<?php echo form_tag('sfSupport/createTicket') ?>

<fieldset>
    <legend>New Ticket</legend>

    <div class="oneField">
			<?php echo form_error('subject') ?>
      <label class="preField">Subject</label>
			<?php echo input_tag('subject');  ?>
		</div>

    <div class="oneField">
			<?php echo form_error('message') ?>
      <label class="preField">Message</label>
			<?php echo textarea_tag('message', '', array ('cols' => 80, 'rows' => '10'));  ?>
		</div>

<br />

<?php echo submit_tag('Submit'); ?>

</fieldset>


</form>