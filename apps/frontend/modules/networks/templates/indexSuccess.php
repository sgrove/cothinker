<?php use_helper('Global', 'sfIcon') ?>

<?php echo nav_tabs('network', $tab) ?>

<?php foreach($connections as $connection): ?>
<?php $user = $connection->getOtherUser($sf_user->getId())->getProfile() ?>
<div class="member-connection">
  <?php echo image_tag($user->getPhoto('medium')) ?>
  <ul>
    <li><?php echo link_to($user->getFullName(), 'user/show?user='.$user->getUuid()) ?></li>
    <li><?php echo 'A '.$user->getDepartment().' '.$user->getTitle().' at '.$user->getCampus() ?></li>
    <li><?php echo link_to(image_tag('sendmessage').' Message', 'messages/compose?recipient='.$user->getUuid()) ?><li>
    <?php if ($connection->isPending() && $connection->isRequested($sf_user->getId())): ?><li><?php echo link_to(icon_tag('add').'Accept request', 'networks/acceptConnection?socon='.$connection->getUuid()) ?><br /><?php echo link_to(image_tag('greenminus').'decline request', 'networks/declineConnection?socon='.$connection->getUuid()) ?></li><?php endif; ?>
    <?php if ($connection->isPending() && $connection->isRequester($sf_user->getId())): ?><li>Waiting for approval</li><?php endif; ?>
    <?php if (!$connection->isPending()): ?><li><?php echo link_to(image_tag('remove').' Remove friend', 'networks/removeConnection?socon='.$connection->getUuid()) ?></li><?php endif; ?>
  </ul>
</div>
<?php endforeach; ?>
</table>
