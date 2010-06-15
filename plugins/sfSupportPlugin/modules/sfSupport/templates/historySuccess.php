<?php use_helper('Date') ?>

<h3>My Tickets</h3>

<div id="history">

<table width=100%>
<thead>

<?php if ($elements) { ?>

<tr>
  <th>Ticket</th>
  <th>Status</th>
  <th>Updated</th>
</tr>

<div class="history">

<?php foreach ($elements as $i => $e): $odd = fmod(++$i, 2) ?>

<tr class="list-<?php echo $odd ?>">
  <td><?php echo link_to($e->getSubject() ? $e->getSubject() : 'N/A', 'sfSupport/reply?id='.$e->getId()); ?></td>
  <td><?php echo $e->getTicketStatus(); ?></td>
  <td><?php echo format_datetime($e->getLatestMessage()->getCreatedAt()) .' by ' . 
            $e->getLatestMessage()->getsfGuardUser(); ?></td>
</tr>

<?php endforeach; } else { ?>

<tr class="news-sidebar-1">
  <td colspan="3">No Tickets Are Available So Far</td>
</tr>

<?php } ?>


</div>

</tbody>
</table>

</div>