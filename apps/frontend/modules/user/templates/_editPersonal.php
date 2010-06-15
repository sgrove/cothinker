<div class="project-titlebar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Info</div>
<?php echo form_tag('user/updateProfile', 'multipart=true', array('name' => 'profile')) ?>
<?php echo input_hidden_tag('tab', $tab, array()) ?>
<label for="department">department: <?php echo select_tag('department', objects_for_select($departments, 'getUuid', 'getName', $profile->getDepartment()->getUuid(), array()), array('class'=>'xxx')) ?><?php if ($sf_request->hasError('department')) { echo $sf_request->getError('department'); } ?></label><br />
<label for="subdepartment">subdepartment: <?php echo select_tag('subdepartment', objects_for_select($subdepartments, 'getUuid', 'getName', $profile->getSubdepartment()->getUuid(), array()), array('class'=>'xxx')) ?><?php if ($sf_request->hasError('subdepartment')) { echo $sf_request->getError('subdepartment'); } ?></label><br />

<div id="privacy-settings">
  <?php echo label_for('privacy', __('privacy level')) ?><br />
  <?php echo radiobutton_tag('privacy[]', '1', $profile->checkPrivacyLevel(1)) ?> - High (Only projects or people you've joined/corresponded with)<br />
  <?php echo radiobutton_tag('privacy[]', '2', $profile->checkPrivacyLevel(2)) ?> - Medium (Anyone from your campus can contact you, see your picture)<br />
  <?php echo radiobutton_tag('privacy[]', '3', $profile->checkPrivacyLevel(3)) ?> - Low (Anyone on Cothink can see you)<br />
</div>
<?php echo submit_tag('update profile', array()) ?>
</form>


<?php /*
<label for="campus">campus: <?php echo select_tag('campus', objects_for_select($campuses, 'getId', 'getName', $profile->getCampusId(), array()), array('class'=>'xxx')) ?><?php if ($sf_request->hasError('campus')) { echo $sf_request->getError('campus'); } ?></label><br />
<label for="first_name">First Name: <?php echo object_input_tag($profile, 'getFirstName') ?><?php if ($sf_request->hasError('first_name')) { echo $sf_request->getError('first_name'); } ?><br /></label>
<label for="last_name">Last Name: <?php echo object_input_tag($profile, 'getLastName') ?><?php if ($sf_request->hasError('last_name')) { echo $sf_request->getError('last_name'); } ?><br /></label>
<label for="title">Title: <?php echo select_tag('title', options_for_select(array(
    'student' => ucfirst(__('student')),
    'professor' => ucfirst(__('professor')),
), $profile->getTitle()))?><?php if ($sf_request->hasError('title')) { echo $sf_request->getError('title'); } ?><br />
*/ ?>