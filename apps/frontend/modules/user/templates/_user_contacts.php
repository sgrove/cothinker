<?php
// auto-generated by sfPropelCrud
// date: 2008/04/04 15:24:10
?>
<?php foreach($user->getContacts() as $contact): ?>
  <div>
    <h3><?php echo $contact->getTitle() ?></h3>
    <?php echo $contact->getAddress1() ?><br />
    <span><?php if ($contact->getAddress2() != null) echo $contact->getAddress2().'<br />' ?></span>
    <?php echo $contact->getCity().', '.$contact->getState().' '.$contact->getPostal() ?><br />
    <span><?php echo $contact->getPhone() ?></span><br />
    <?php echo $contact->getEmail() ?>
  </div>
<?php endforeach; ?>
