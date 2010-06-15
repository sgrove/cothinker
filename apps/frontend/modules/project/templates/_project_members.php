<?php use_helper('Object') ?>

<?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
<div class="project-subtabs" style="background-color:#72BE44;margin-top:-5px;">
        <ul>
                <li id="current"><?php echo link_to('Positions', 'project/show?slug='.$project->getSlug().'&tab=team') ?></li>
                <li><?php echo link_to('Application Manager', 'project/applications?slug='.$project->getSlug()) ?></li>
        </ul>
        <hr class="clear" />
</div>
<?php endif; ?>
<div class="project-positions">
<h1>Positions</h1>
  <?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
        <?php echo link_to_function(icon_tag('add').' Add a position', visual_effect('toggle_blind', 'member-new-holder', array('duration' => 0.5))) ?>
            <div id="member-new-holder" style="display:none;margin-bottom:10px;margin-top:5px;">
                <div class="blue-shadow"><div class="blue-title blue-content">Add a team position to your project</div></div>
                <div class="blue-shadow">
                    <div class="blue-content">
                        <?php echo form_tag('project/addPosition') ?>
                          <fieldset id="task-details" style="vertical-align:top;border: medium none;">
                            <?php echo input_hidden_tag('slug', $project->getSlug(), array()) ?>
                            <?php echo input_hidden_tag('tab', 'team') ?>
                            <?php echo label_for('title', 'Position title'), input_tag('title')?><br />
                            <?php echo label_for('description', 'Describe what this team member would do?'), textarea_tag('description', '', array('rows' => '3')) ?>
                            <?php echo label_for('qualifications', 'Qualifications for the position'), textarea_tag('qualifications', '', array('rows' => '2')) ?>
                            <?php //echo textarea_tag('task_tags', '', array('rows' => '3')) ?>
                          </fieldset>
                          <?php echo submit_tag('Add Position') ?>
                        </form>
                    </div>
                </div>
            </div>
  <?php endif; ?>
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
          echo link_to(image_tag($position->getThumbnail()), 'user/show?user='.$position->getUser()->getProfile()->getUuid());
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
  			<h3><?php echo link_to(short_string($position->getTitle(), 55), 'project/show?slug='.$position->getUuid()) ?></h3>
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
  				<li><?php echo link_to(short_string($position->getProject()->getTitle()), 'project/show?slug='.$position->getProject()->getSlug()) ?></li>
  				<li><?php echo format_date($position->getCreatedAt()) ?></li>
  				<li><?php if ($position->isFilled()) { echo link_to($position->getUser()->getProfile(), 'user/show?user='.$position->getUser()->getProfile()->getUuid()); } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && !$position->isApplicant($sf_user->getId())) { echo 'Available ('.link_to('Apply', 'project/applyForm?position='.$position->getUuid()).')'; } elseif (!$position->isFilled() && $sf_user->isAuthenticated() && $position->isApplicant($sf_user->getId())) { echo 'Available (Application Received)'; } elseif (!$sf_user->isAuthenticated()) { echo "Login to apply"; }?></li>
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


