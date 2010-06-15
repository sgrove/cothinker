<?php use_helper('Object', 'Form', 'Validation') ?>
<h1 id="give_us_some_of_that_contact_loving!">Give us some of that contact loving!</h1>
<p>
  Thinking about starting a CoThink fan group?<br />
  Wanna tell us how awesome we are?<br />
  Maybe just looking for someone to complain about your cat's new tap-dancing hobby?<br />
  <strong>Go ahead and send us a message. We'll get back one way or another - if you leave your email!</strong></p>
<?php echo form_tag('@submit_contact_form') ?>
  <?php echo label_for('name', __('Your name?').'<span class=form-error>'.__(form_error('name')).'</span>', array('style' => 'display:block;')), object_input_tag($message, 'getName') ?><br />
  <?php echo label_for('email', __('Your email (if you want us to get back to you)').'<span class=form-error>'.__(form_error('email')).'</span>', array('style' => 'display:block;')), object_input_tag($message, 'getEmail') ?><br />
  <?php echo label_for('message', __('Your message').'<span class=form-error>'.__(form_error('message')).'</span>', array('style' => 'display:block;')), object_textarea_tag($message, 'getMessage', array (
    'size' => '30x3',
  )) ?>
  <?php echo submit_tag('Send us your message', array()) ?>
</form>
