<?php use_helper('Tags', 'Object', 'Global', 'I18N') ?>

<?php echo nav_tabs('projects', $tab); ?>

<h1><?php echo format_number_choice ('[0]0 Projects|[1]1 Project|(1,+Inf]%1% Projects', array('%1%' => $projects->getNbResults()), $projects->getNbResults()) ?></h1>
<?php if ($projects->getNbResults() == 0): ?>
  <div id="pager-holder">Sorry, no results found for your search</div>
<?php else: ?>
<?php echo include_component('project', 'listFilter'); ?>
<div id="pager-holder">
  <?php echo include_partial('project_pager', array('projects' => $projects, 'tab' => $tab)); ?>
</div>
<?php endif; ?>
