<?php
// auto-generated by sfPropelCrud
// date: 2008/02/18 20:39:10
?>
<?php use_helper('Object') ?>

<?php echo form_tag('message/update') ?>

<?php echo object_input_hidden_tag($message, 'getId') ?>

<table>
<tbody>
<tr>
  <th>Sender:</th>
  <td><?php echo object_select_tag($message, 'getSenderId', array (
  'related_class' => 'User',
  'include_blank' => true,
)) ?></td>
</tr>
<tr>
  <th>Recipient:</th>
  <td><?php echo object_select_tag($message, 'getRecipientId', array (
  'related_class' => 'User',
  'include_blank' => true,
)) ?></td>
</tr>
<tr>
  <th>Subject:</th>
  <td><?php echo object_textarea_tag($message, 'getSubject', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Body:</th>
  <td><?php echo object_textarea_tag($message, 'getBody', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Html body:</th>
  <td><?php echo object_textarea_tag($message, 'getHtmlBody', array (
  'size' => '30x3',
)) ?></td>
</tr>
<tr>
  <th>Read at:</th>
  <td><?php echo object_input_date_tag($message, 'getReadAt', array (
  'rich' => true,
  'withtime' => true,
)) ?></td>
</tr>
<tr>
  <th>Parent:</th>
  <td><?php echo object_select_tag($message, 'getParentId', array (
  'related_class' => 'Message',
  'include_blank' => true,
)) ?></td>
</tr>
<tr>
  <th>Message type:</th>
  <td><?php echo object_input_tag($message, 'getMessageType', array (
  'size' => 7,
)) ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('save') ?>
<?php if ($message->getId()): ?>
  &nbsp;<?php echo link_to('delete', 'message/delete?id='.$message->getId(), 'post=true&confirm=Are you sure?') ?>
  &nbsp;<?php echo link_to('cancel', 'message/show?id='.$message->getId()) ?>
<?php else: ?>
  &nbsp;<?php echo link_to('cancel', 'message/list') ?>
<?php endif; ?>
</form>
