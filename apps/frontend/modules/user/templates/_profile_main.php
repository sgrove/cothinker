<div class="project-main-header">
	<?php echo image_tag($profile->getPhoto('large'), array('class' => 'primary')) ?>
	<h1><?php echo $profile->getFullName() ?></h1>
	<p></p>
<?php if ($sf_user->isAuthenticated() && $profile->isUser($sf_user->getId())): ?><span><?php echo link_to(__('Edit Details'), 'user/show?tab=edit&user='.$profile->getUuid()); ?></span><?php endif; ?>
	<div style="float: left; margin-right: 10px;">
		Status:<br />
		Department:<br />
		Campus:<br />
		Last Signed In:<br />
                <?php if ($sf_user->isAuthenticated())
                {
                  $message = __("Message Member");
                  if ($sf_user->getId() == $profile->getUserId())
                  {
                     $message = __('Message yourself');
                  }
                  echo icon_tag('mail').link_to(' '.$message, 'messages/compose?recipient='.$profile->getUuid());
                } ?><br />
	</div>
	<div>
		<?php echo ucwords($profile->getTitle()) ?><br />
		<?php echo $profile->getDepartment() ?><br />
		<?php echo $profile->getCampus() ?><br />
		<?php echo distance_of_time_in_words($profile->getsfGuardUser()->getLastLogin('U')).' ago'; $sf_context->getLogger()->info('checking sfguarduser'); $profile->getsfGuardUser(); $sf_context->getLogger()->info('finished checking...');//format_date($profile->getSfGuardUser()->getLastLogin()) ?><br />
	</div>
        <div style="float: right; right:10px; bottom: 10px;display:inline;">
    <?php if ($sf_user->isAuthenticated()): ?>
      <?php if ($sf_user->getId() == $profile->getUserId()): ?>
          What...you want to add yourself as a friend?
      <?php else: ?>
      <?php $socon = $sf_user->getProfile()->getConnection($profile->getUserId()) ?>
      <?php if ($socon != null): ?>
        <?php if ($socon->getStatus() == sfConfig::get('app_socon_status_pending')): ?>
          <?php echo "You have a pending connection request." ?>
        <?php elseif ($socon->getStatus() == sfConfig::get('app_socon_status_approved')): ?>
          <?php echo $profile->getFullName().' joined your network on '.format_date($socon->getCreatedAt()).'.' ?>
        <?php elseif ($socon->getStatus() == sfConfig::get('app_socon_status_declined')): ?>
          <?php echo "You have a declined connection request. (".link_to('re-attempt', 'networks/retryConnection?socon='.$socon->getUuid()).')' ?>
        <?php endif; ?>
      <?php elseif(!$sf_user->isAuthenticated()): ?>
        <?php echo link_to('Login', '@sf_guard_signin').' to connect to '.$profile->getFullName(); ?>
      <?php else: ?>
        <?php echo link_to(ucfirst(__('add '.$profile->getFullName().' as a connection')), 'networks/requestConnection?connect='.$profile->getUuid()) ?>
    <?php endif; ?>
    <?php endif; ?>
  <?php else: ?>
    Log in to add <strong><?php echo $profile->getFullName() ?></strong> to your network.
  <?php endif; ?>
        </div>
</div>

<?php include_partial('widget_projects', array('profile' => $profile)) ?>

<?php include_partial('widget_minifeed', array('profile' => $profile)) ?>

<div style="clear:both;">
</div>

