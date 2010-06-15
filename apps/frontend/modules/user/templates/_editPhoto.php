<div class="project-titlebar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Personal Info</div>
<?php echo form_tag('user/updateProfile', 'multipart=true', array('name' => 'profile')) ?>
<div><?php echo image_tag($profile->getThumbnail()) ?></div>
<?php echo input_file_tag('photo', array()) ?><br /><?php echo label_for('photo_remove', __('remove photo:')),checkbox_tag('photo_remove', '0', false, array()) ?><?php if ($sf_request->hasError('photo')) { echo $sf_request->getError('photo'); } ?><br />

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
