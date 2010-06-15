<?php $form = $project->getForm("main") ?>

<div class="project-main-default-header full-widget">
  <?php include_partial('widget_project_header', array('project' => $project)) ?>
</div>

<div class="project-widget medium-widget" style="float:left;">
  <?php include_partial('widget_'.$form->getWidget1("minifeed"), array('project' => $project)) ?>
</div>

<div class="project-widget medium-widget" style="float:right;">
  <?php include_partial('widget_'.$form->getWidget2("team"), array('project' => $project)) ?>
</div>

<div style="clear:both;">
</div>

