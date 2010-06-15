<?php use_helper('Global', 'Date', 'I18N', 'Number', 'sfFileGallery', 'Object', 'Javascript', 'sfIcon')?>

<?php echo nav_tabs('project', $tab, $project); ?>

<?php echo link_to(icon_tag('add').' Add a new position', '@edit_project_position?project='.$project->getSlug()) ?>
<?php $counter = 0; ?>
<?php foreach($project->getPositions() as $position): ?>
  <?php /*
  <div class="project-position">
        <a id="position_<?php echo $position->getUuid() ?>" /></a>
          <?php echo image_tag($position->getThumbnail(), array('class' => 'primary')) ?>
          <div style="">
                <h1><?php echo $position->getTitle() ?></h1>
                <p>
                  <?php echo $position->getDescription() ?><br />
                  <?php echo $position->getQualifications() ?>
                </p>
                <p>Filled by: <?php if ($position->isFilled()) { echo link_to($position->getUser()->getProfile(), 'user/show?user='.$position->getUser()->getProfile()->getUuid()); } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && !$position->isApplicant($sf_user->getId())) { echo 'Available ('.link_to('Apply', 'project/applyForm?position='.$position->getUuid()).')'; } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && $position->isApplicant($sf_user->getId())) { echo 'Available (Application Received)'; }?></p>
               <?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId()) && !$position->isFilled()): ?>
                <p><?php echo link_to(__('Remove Positions'), 'project/removePosition?position='.$position->getUuid().'&slug='.$project->getSlug()) ?></p>
               <?php endif; ?>
          </div>
  </div>
  */ ?>
  <div class="project-listing">
  	<ul class="description">
      <li class="panels" >
        <?php if ($position->isFilled())
        {
          echo link_to(image_tag($position->getThumbnail()), '@show_user?user='.$position->getUser()->getProfile()->getUuid());
        }
        elseif (!$position->isFilled() && $sf_user->isAuthenticated() && $project->hasPermission('handle-application', $sf_user->getId()))
        {
          echo link_to(image_tag($position->getThumbnail()), '@edit_project_position?position='.$position->getUuid().'&project='.$project->getSlug());
        }
        elseif (!$position->isFilled() && $sf_user->isAuthenticated() && !$position->isApplicant($sf_user->getId())) 
        {
          echo link_to(image_tag($position->getThumbnail()), 'project/applyForm?position='.$position->getUuid());
        }
        else
        {
          echo image_tag($position->getThumbnail());
        }
        ?>
      </li>
  		<li class="panels" style="width:55%;">
  			<h3><?php echo link_to(short_string($position->getTitle(), 55), '@show_project_main?project='.$project->getSlug()) ?><?php if ($sf_user->isAuthenticated() && $project->hasPermission('handle-application', $sf_user->getId()) && !$position->isFilled()): ?>  (<?php echo link_to('Edit', '@edit_project_position?position='.$position->getUuid().'&project='.$project->getSlug()) ?>)<?php endif; ?></h3>
  			<?php echo short_string($position->getQualifications(), 150) ?>
  		</li>

  		<li class="panels" style="width:30%;border-left: 1px dotted #D8D8D8;padding-left:10px;">
  			<ul style="float:left;">
  				<li><?php echo __('Project') ?>:</li>
  				<li><?php echo __('Posted') ?>:</li>
  				<li><?php if ($position->isFilled()) { echo "Filled by:"; } else { echo "Apply:";}?></li>
  				<li><?php echo __('Tags') ?>:</li>
  			</ul>
  			<ul style="float:left;">
  				<li><?php echo link_to(short_string($position->getProject()->getTitle()), '@show_project_main?project='.$position->getProject()->getSlug()) ?></li>
  				<li><?php echo format_date($position->getCreatedAt()) ?></li>
  				<li><?php if ($position->isFilled()) { echo link_to($position->getUser()->getProfile(), '@show_user?user='.$position->getUser()->getProfile()->getUuid()); } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && !$position->isApplicant($sf_user->getId())) { echo 'Available ('.link_to('Apply', 'project/applyForm?position='.$position->getUuid()).')'; } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && $position->isApplicant($sf_user->getId())) { echo 'Available (Application Received)'; } elseif (!$sf_user->isAuthenticated()) { echo "Login to apply"; }?></li>
  				<li><?php foreach ($position->getTags() as $tag) {
  				  echo $tag.' ';
  				}
  				if (count($position->getTags()) == 0) {
  				  echo 'none';
  				}
  				?></li>
  			</ul>
  		</li>
  	</ul>
  </div>
<?php endforeach; ?>
</div>
<hr class="clear" />


