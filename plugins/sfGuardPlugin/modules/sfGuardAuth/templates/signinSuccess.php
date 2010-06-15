<?php use_helper('Validation', 'I18N') ?>

<div id="cothink_auth_form">
<h1>Cothink Login</h1>
<?php echo form_tag('@sf_guard_signin') ?>
<?php if ($sf_request->hasError('username')): ?>
    <?php echo '<h2>'.$sf_request->getError('username').'</h2>' ?>
<?php endif; ?>
  <fieldset>
  <ul>
    <li class="form-row" id="sf_guard_auth_username">
      <?php
      echo  
      label_for('username', __('Email')),
      input_tag('username', $sf_data->get('sf_params')->get('username'));
?><br />
      <?php
      echo label_for('remember', __('Remember me'), array('style' => 'display:inline;vertical-align: middle;')),checkbox_tag('remember', '1', array('style' => 'vertical-align: middle;'));
      ?>

    </li>

    <li class="form-row" id="sf_guard_auth_password">
      <?php
      echo 
        label_for('password', __('Password')),
        input_password_tag('password');
?><br />
<?php echo 'Did you '.link_to(__('forget your password?'), '@sf_guard_password', array('id' => 'sf_guard_auth_forgot_password')) ?>
    </li>
    <li class="form-row" id="sf_guard_auth_remember">
	<?php echo submit_tag(__('sign in'), array('class' => 'btn')) ?>
    </li>
  </ul>
  </fieldset>

</form>
</div>
