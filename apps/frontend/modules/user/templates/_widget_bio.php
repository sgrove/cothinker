<div class="profile-bio">
<h1>A bit about <?php echo $profile->getFirstName() ?>:</h1>
  <?php echo ucwords($profile->getFullName()) ?> is a <?php echo $profile->getTitle() ?> at <?php echo $profile->getCampus() ?>.<br />
  <?php if ($profile->getAbout() == null) { echo __("%1%'s a little bit shy, and hasn't filled out any bio information. Why don't you send a message and encourage %2% to open up and share with everyone?", array('%1%' => $profile->getFirstName(), '%2%' => $profile->getGenderObject())); } else { echo '"'.$profile->getAbout().'"'; } ?>
</div>
