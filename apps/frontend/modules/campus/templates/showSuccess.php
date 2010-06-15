<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:48:34
?>
<table>
<tbody>
<tr>
<th><?php echo ucwords(__('name')) ?>: </th>
<td><?php echo $campus->getName() ?></td>
</tr>
<tr>
<th><?php echo ucwords(__('address')) ?>: </th>
<td><?php echo $campus->getAddress() ?><br />
<?php echo $campus->getCity() ?>, <?php echo $campus->getState() ?> <?php echo $campus->getZip() ?></td>
</tr>
<tr>
<th><?php echo ucwords(__('phone')) ?>: </th>
<td><?php echo $campus->getPhone() ?></td>
</tr>
<tr>
<th><?php echo ucwords(__('website')) ?>: </th>
<td><?php echo link_to($campus->getUrl(), $campus->getUrl()) ?></td>
</tr>
<tr>
<th><?php echo ucwords(__('about %2%', array('%2%' => $campus->getName()))) ?>: </th>
<td><?php echo $campus->getAbout() ?></td>
</tr>
</tbody>
</table>
<hr />
<?php echo link_to(ucwords(__('edit')), 'campus/edit?id='.$campus->getId()) ?>
&nbsp;<?php echo link_to(ucwords(__('list')), 'campus/list') ?>
