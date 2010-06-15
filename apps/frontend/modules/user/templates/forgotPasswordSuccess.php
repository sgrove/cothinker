<?php use_helper('Object', 'Form', 'Javascript') ?>	
Enter your school email address, and we'll send you instructions on how to reset your password.
<div class="signup-panel">
  <?php echo form_tag('user/forgotPassword', array('name' => 'signup')) ?>
      <div>
        <label for="email">Email:
        <div class="registration-input"><?php echo input_tag('username', '', array ('size' => 35,)) ?><?php if ($sf_request->hasError('username')) { echo '<span class="form-error">'.$sf_request->getError('username').'</span>'; } ?></div></label>
      </div>
      <div class="submit-row"><?php echo submit_tag('Submit', array()) ?><p/></div>
  </form>
  <div class='hr'></div>
</div>