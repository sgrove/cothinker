<?php use_helper('I18N') ?>
  <?php $tab = $sf_params->get('tab') ?>
  <?php if (!isset($tab)): ?>
    <?php $tab = 'inbox'; ?>
  <?php endif; ?>

  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('messages', $tab); ?>
    </ul>
  </div>