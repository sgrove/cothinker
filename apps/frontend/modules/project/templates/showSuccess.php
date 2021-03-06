<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global') ?>
<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'main' ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('project', $tab, $project); ?>
    </ul>
  </div>

<?php if ($tab == 'main')   include_partial('project_main',     array('project' => $project)) ?>
<?php if ($tab == 'tasks')  include_partial('project_progress', array('project' => $project, 'users' => $users)) ?>
<?php if ($tab == 'team')   include_partial('project_members',  array('project' => $project)) ?>