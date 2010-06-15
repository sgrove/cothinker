<?php use_helper('Object', 'Form', 'Javascript') ?>	
<div class="signup-panal">
  <?php echo form_tag('user/register', array('name' => 'signup')) ?>
      <div>
        <fieldset style="display:inline;">
          <legend>Account Info</legend>
          <label for="email">Email:
          <div class="registration-input"><?php echo input_tag('register_email', '', array ('size' => 15,)) ?><?php if ($sf_request->hasError('register_email')) { echo '<span class="form-error">'.$sf_request->getError('register_email').'</span>'; } ?></div></label>
          <label for="password">Password:
          <div class="registration-input"><?php echo input_password_tag('register_password', '', array('size' => 15)) ?><?php if ($sf_request->hasError('register_password')) { echo '<span class="form-error">'.$sf_request->getError('register_password').'</span>'; } ?></div></label></label>
          <label for="password_confirm">Confirm Password:
          <div class="registration-input"><?php echo input_password_tag('register_password_confirm', '', array('size' => 15)) ?><?php if ($sf_request->hasError('register_password_confirm')) { echo '<span class="form-error">'.$sf_request->getError('register_password_confirm').'</span>'; } ?></div></label></label>
        </fieldset>
        <fieldset style="display:inline;">
          <legend>Personal Info</legend>
          <label for="first_name">First Name:
            <div class="registration-input"><?php echo object_input_tag($profile, 'getFirstName') ?><?php if ($sf_request->hasError('first_name')) { echo '<span class="form-error">'.$sf_request->getError('first_name').'</span>'; } ?></div></label>
          <label for="last_name">Last Name:
            <div class="registration-input"><?php echo object_input_tag($profile, 'getLastName') ?><?php if ($sf_request->hasError('last_name')) { echo '<span class="form-error">'.$sf_request->getError('last_name').'</span>'; } ?></div></label>
          <label for="department">Department:
            <div class="registration-input"><?php echo select_tag('department', objects_for_select($departments, 'getUuid', 'getName', $profile->getDepartmentId(), array()), array('class'=>'xxx')) ?><?php if ($sf_request->hasError('department')) { echo '<span class="form-error">'.$sf_request->getError('department').'</span>'; } ?></div></label>
        </fieldset>
      </div>
      <div>
        You will be able to change your primary email address later by clicking on profile->edit
      </div>
      <div class="submit-row" style="text-align:center;"><?php echo submit_tag('Sign Up', array()) ?><p/></div>
  </form>
  <div class='hr'></div>
</div>