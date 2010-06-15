<div class="signup-panel">
  <?php echo form_tag('user/resetPassword', array()) ?>
        <fieldset style="display:inline;">
          <legend>Resetting Password</legend>
          <?php echo input_hidden_tag('token', $token, array()) ?>
          <?php echo input_hidden_tag('user', $profile->getUuid(), array()) ?>
          <?php echo label_for('password', __('Password')), input_password_tag('password', '', array('size' => 15)) ?><?php if ($sf_request->hasError('password')) { echo '<span class="form-error">'.$sf_request->getError('password').'</span>'; } ?>
          <?php echo label_for('password_confirm', __('Confirm Password')), input_password_tag('password_confirm', '', array('size' => 15)) ?><?php if ($sf_request->hasError('password_confirm')) { echo '<span class="form-error">'.$sf_request->getError('password_confirm').'</span>'; } ?>
        </fieldset>
      <div class="submit-row"><?php echo submit_tag('Reset Password', array()) ?></div>
  </form>
  <div class='hr'></div>
</div>