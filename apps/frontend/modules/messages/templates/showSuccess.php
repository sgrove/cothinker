<?php
// auto-generated by sfPropelCrud
// date: 2008/02/18 20:39:10
?>
<table>
<tbody>
<tr>
<th>Id: </th>
<td><?php echo $message->getId() ?></td>
</tr>
<tr>
<th>Sender: </th>
<td><?php echo $message->getSenderId() ?></td>
</tr>
<tr>
<th>Recipient: </th>
<td><?php echo $message->getRecipientId() ?></td>
</tr>
<tr>
<th>Subject: </th>
<td><?php echo $message->getSubject() ?></td>
</tr>
<tr>
<th>Body: </th>
<td><?php echo $message->getBody() ?></td>
</tr>
<tr>
<th>Html body: </th>
<td><?php echo $message->getHtmlBody() ?></td>
</tr>
<tr>
<th>Read at: </th>
<td><?php echo $message->getReadAt() ?></td>
</tr>
<tr>
<th>Parent: </th>
<td><?php echo $message->getParentId() ?></td>
</tr>
<tr>
<th>Message type: </th>
<td><?php echo $message->getMessageType() ?></td>
</tr>
<tr>
<th>Created at: </th>
<td><?php echo $message->getCreatedAt() ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo link_to('edit', 'message/edit?id='.$message->getId()) ?>
&nbsp;<?php echo link_to('list', 'message/list') ?>