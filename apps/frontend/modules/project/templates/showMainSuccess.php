<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

<?php echo include_partial('project/main_form_'.$project->getForm("main", true), array('project' => $project, )); ?>
