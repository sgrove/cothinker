<?php use_helper('Object', 'Validation') ?>

User: <?php echo $ticket->getsfGuardUser() ?>
<br/>
Date:<?php echo $ticket->getCreatedAt(); ?>
<br/>
Subject: <?php echo $ticket->getSubject(); ?>
<br/>
Status: <?php echo $ticket->getsfTicketStatus(); ?>
<br/>
Message: <pre><?php echo $ticket->getMessage(); ?></pre>
<br/>
<hr/>

<table width=100%>
<tbody>

<?php if ($threads) foreach ($threads as $thread): ?>

<tr>
  <td>Date:</td><td><?php echo $thread->getCreatedAt(); ?></td>
</tr>
<tr>
  <td>Sender:</td><td><?php echo $thread->getsfGuardUser(); ?></td>
</tr>
<tr>
  <td>Message:</td><td><?php echo $thread->getMessage(); ?></td>
</tr>
<tr>
  <td colspan="2"><hr/></td>
</tr>

<?php endforeach; ?>

</tbody>
</table>

<br/>

<?php echo form_tag('sfSupport/createReply') ?>

<?php echo textarea_tag('message', '', array ('cols' => 80, 'rows' => '10'));  ?>
<?php echo input_hidden_tag('ticket_id', $ticket_id);  ?>

<br />

<?php echo submit_tag('Reply'); ?>

</form>