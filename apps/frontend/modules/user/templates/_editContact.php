<?php echo form_tag('user/updateProfile', 'multipart=true', array('name' => 'profile')) ?>
<?php echo input_hidden_tag('tab', 'contact', array()) ?>
<div class="project-titlebar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Contacts</div>
<?php include_partial('user_contacts', array('user' => $profile)) ?>
<hr />

<?php echo submit_tag('update profile', array()) ?>
</form>