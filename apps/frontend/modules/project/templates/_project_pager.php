<?php use_helper('Javascript', 'PagerNavigation', 'I18N', 'sfPhotoGallery', 'Date', 'Global')?>
<?php if (!isset($uri_options)) { $uri_options = 'section='.$tab; } ?>

<?php foreach ($projects->getResults() as $project): ?>
  <div class="project-listing">
    <ul class="description">
      <li class="panels" >
        <?php echo link_to(image_tag($project->getThumbnail()), '@show_project?project='.$project->getSlug()) ?>
      </li>
      <li class="panels" style="width:55%;">
        <h3><?php echo link_to(short_string($project->getTitle(), 55), '@show_project?project='.$project->getSlug()) ?></h3>
        <?php echo $project->getDescriptionBrief(200) ?>
      </li>

      <li class="panels" style="width:30%;border-left: 1px dotted #D8D8D8;padding-left:10px;">
        <ul style="float:left;">
          <li><?php echo __('Owner') ?>:</li>
          <li><?php echo __('Dept') ?>:</li>
          <li><?php echo __('Updated') ?>:</li>
        </ul>
        <ul style="float:left;">
          <li><?php echo link_to($project->getOwner(), '@show_user?user='.urlencode($project->getOwner()->getUuid())) ?> (<?php echo ucwords(__($project->getOwner()->getTitle())) ?>)</li>
          <li><?php echo ucwords(__($project->getDepartment())) ?></li>
          <li><?php $event = $project->getLastUpdated(); echo format_date($event->getCreatedAt()), ' ('.$event->getCategory().')'; ?></li>
        </ul>
      </li>
    </ul>
  </div>

<?php endforeach; ?>

<div id="pager-navigation">
  <?php if ($projects->haveToPaginate()): ?>
  <?php echo pager_navigation_ajax($projects, 'project/ajaxProjectPager?'.$uri_options, array(
    'update' => 'pager-holder',
      'loading' => 'Element.show("indicator");',
      'complete' => 'Element.hide("indicator");')) ?>
    <?php endif ?>
</div>

