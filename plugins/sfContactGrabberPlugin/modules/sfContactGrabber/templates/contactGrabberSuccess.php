<?php echo count($contacts); ?> contacts were found.

<br>
<br>

<?php //echo form_tag('@processContacts'); ?>

  <?php foreach($contacts as $contact): ?>
    <div>
      <?php echo checkbox_tag('contacts['.$contact["email"].']',$contact["email"]); ?>
      Name: <?php echo $contact["name"]; ?>,
      Email: <?php echo $contact["email"]; ?>
      <?php if (false): ?>
        <br />
        <strong>Member: <?php echo $user->getProfile()->getFullName() ?></strong>
      <?php endif ?>
    </div>
  <?php endforeach; ?>

  <?php //echo submit_tag('Send invites!'); ?>

</form>