<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:24:10
?>
<?php use_helper('Object') ?>

<?php echo form_tag('user/update') ?>

<?php echo object_input_hidden_tag($sf_guard_user_profile, 'getId') ?>

<table>
<tbody>
<tr>
  <th>User*:</th>
  <td><?php echo object_select_tag($sf_guard_user_profile, 'getUserId', array (
  'related_class' => 'sfGuardUser',
)) ?></td>
</tr>
<tr>
  <th>Uuid*:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getUuid', array (
  'size' => 36,
)) ?></td>
</tr>
<tr>
  <th>Campus*:</th>
  <td><?php echo object_select_tag($sf_guard_user_profile, 'getCampusId', array (
  'related_class' => 'Campus',
)) ?></td>
</tr>
<tr>
  <th>Department*:</th>
  <td><?php echo object_select_tag($sf_guard_user_profile, 'getDepartmentId', array (
  'related_class' => 'Department',
)) ?></td>
</tr>
<tr>
  <th>Subdepartment*:</th>
  <td><?php echo object_select_tag($sf_guard_user_profile, 'getSubdepartmentId', array (
  'related_class' => 'Subdepartment',
)) ?></td>
</tr>
<tr>
  <th>First name:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getFirstName', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Last name:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getLastName', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Title:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getTitle', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Picture:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getPicture', array (
  'size' => 80,
)) ?></td>
</tr>
<tr>
  <th>Rating:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getRating', array (
  'size' => 7,
)) ?></td>
</tr>
<tr>
  <th>Rating count:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getRatingCount', array (
  'size' => 7,
)) ?></td>
</tr>
<tr>
  <th>Version:</th>
  <td><?php echo object_input_tag($sf_guard_user_profile, 'getVersion', array (
  'size' => 7,
)) ?></td>
</tr>
<tr>
  <th>Deleted at:</th>
  <td><?php echo object_input_date_tag($sf_guard_user_profile, 'getDeletedAt', array (
  'rich' => true,
  'withtime' => true,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($sf_guard_user_profile->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'user/delete?id='.$sf_guard_user_profile->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'user/show?id='.$sf_guard_user_profile->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'user/list') ?>
<?php endif; ?>
</form>
