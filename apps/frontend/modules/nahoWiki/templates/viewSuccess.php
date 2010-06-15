<?php use_helper('Global') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

<div class="<?php echo sfConfig::get('app_nahoWikiPlugin_wrap_class', 'nahoWiki') ?>">
<?php echo $page->getWiki()->getTitle() ?>
<?php include_partial('page', array('page' => $page, 'revision' => $revision, 'uriParams' => $uriParams, 'canView' => $canView, 'canEdit' => $canEdit, 'project' => $project)) ?>

</div>