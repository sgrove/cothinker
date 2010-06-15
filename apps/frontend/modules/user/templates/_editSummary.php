<div class="project-titlebar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Info Summary</div>
<div>
  <span><?php echo $profile->getFullName() ?></span>
  <span>School: </span>
  <span><?php echo ucwords(__($profile->getTitle())) ?> of <?php echo $profile->getCampus() ?></span>
  <span>Department: </span>
  <span><?php echo $profile->getDepartment() ?> / <?php echo $profile->getSubdepartment() ?></span>
  <div><?php echo image_tag($profile->getThumbnail()) ?></div>
  <span>Cothink Rating: </span>
  <span><?php echo $profile->getRating() ?> (<?php echo $profile->getRatingCount() ?>)</span>
  <span>Privacy: </span>
  <span><?php echo format_number_choice('[0]High[1]High|[2]Medium|[3]Low|(3,+Inf]Unknown', '', $profile->getPrivacyLevel()) ?></span>
</div>
