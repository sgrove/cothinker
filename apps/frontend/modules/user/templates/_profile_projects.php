<div class="project-positions">
<h2>You are viewing <?php echo $profile->getFirstName() ?>'s Projects</h2>
<?php echo link_to('Click here', '@list_projects') ?> to view all projects

<?php $counter = 0; ?>
<?php foreach($profile->getProjects() as $project): ?>
  <div class="project-listing">
  	<ul class="description">
                  <li class="panels" >
                          <?php echo link_to(image_tag($project->getThumbnail()), 'project/show?slug='.$project->getSlug()) ?>
                  </li>
  		<li class="panels" style="width:55%;">
  			<h3><?php echo link_to(short_string($project->getTitle(), 55), 'project/show?slug='.$project->getSlug()) ?></h3>
  			<?php echo $project->getDescriptionBrief(200) ?>
  		</li>

  		<li class="panels" style="width:30%;border-left: 1px dotted #D8D8D8;padding-left:10px;">
  			<ul style="float:left;">
  				<li><?php echo __('Owner') ?>:</li>
  				<li><?php echo __('Dept') ?>:</li>
  				<li><?php echo __('Updated') ?>:</li>
  			</ul>
  			<ul style="float:left;">
  				<li><?php echo link_to($project->getOwner(), 'user/show?user='.urlencode($project->getOwner()->getUuid())) ?> (<?php echo ucwords(__($project->getOwner()->getTitle())) ?>)</li>
  				<li><?php echo ucwords(__($project->getDepartment())) ?></li>
  				<li><?php $event = $project->getLastUpdated(); echo format_date($event->getCreatedAt()), ' ('.$event->getCategory().')'; ?></li>
  			</ul>
  		</li>
  	</ul>
  </div>
<?php endforeach; ?>
<?php if (count($profile->getProjects()) == 0): ?>
<div>
        Sorry, <?php echo $profile->getFirstName() ?> doesn't seem to have any projects right now.
</div>
<?php endif; ?>
<hr class="clear" />
<br />
<?php if ($sf_user->isAuthenticated() && $profile->isUser($sf_user->getId())): ?>
  <?php $applications = $sf_user->getProfile()->getProjectApplications() ?> 

  <?php if (count($applications) > 0): ?>
    <h2><?php echo format_number_choice ('[0]0 Project applications|[1]1 Project application|(1,+Inf]%1% Project applications', array('%1%' => count($applications)), count($applications)) ?></h2>
    <?php foreach ($applications as $project): ?>
      <div class="project-listing">
      	<ul class="description">
                      <li class="panels" >
                              <?php echo link_to('<img alt="Noproject" src="/cothink/web/uploads/thumbnails/small/noproject.png"/>', 'project/show?slug='.$project->getSlug()) ?>
                      </li>
      		<li class="panels" style="width:55%;">
      			<h3><?php echo link_to(short_string($project->getTitle(), 55), '@show_project_application?id='.$project->getUuid()) ?></h3>
      			<?php echo short_string($project->getDescription(), 100) ?><br />
      			<?php echo link_to('Delete Application', '@remove_project_application?id='.$project->getUuid(), 'post=true&confirm=Are you sure you want to delete the application "'.$project->getTitle().'"?') ?> | <?php echo link_to('Get some help on this application', '@flag_project_application_for_help?id='.$project->getUuid()) ?> | <?php echo link_to('Preview', '@create_project_preview?id='.$project->getUuid()) ?>
      		</li>

      		<li class="panels" style="width:30%;border-left: 1px dotted #D8D8D8;padding-left:10px;">
      			<ul style="float:left;">
      				<li><?php echo __('Complete') ?>:</li>
      				<li><?php echo __('Dept') ?>:</li>
      				<li><?php echo __('Status') ?>:</li>
      			</ul>
      			<ul style="float:left;">
      			  <li><?php echo $project->getPercentComplete() ?>%</li>
      				<li><?php echo ucwords(__($project->getDepartment())) ?></li>
      				<li><?php echo ucwords($project->getStatusInWords()) ?></li>
      			</ul>
      		</li>
      	</ul>
      </div>
    <?php endforeach ?>
  <?php endif ?>
  <hr class="clear" />
  <span><?php echo link_to(__('Would you like to create a new project?'), '@create_project_step1'); ?></span><?php endif; ?>
<?php /* This is the full positions listing html code
*/ ?>
</div>
