<?php use_helper('sfPhotoGallery') ?>
<div class="project-positions-widget widget">

  <h1><?php echo $profile->getFirstName() ?>'s Projects</h1>
<?php $counter = 0; ?>
<?php foreach($profile->getProjects() as $project): ?>
  <?php if ($counter == 3) { break; } else { $counter++; } ?>
  <div class="project-listing">
    <ul class="description">
      <li class="panels" >
        <?php echo link_to(image_tag($project->getThumbnail()), '@show_project?project='.$project->getSlug()) ?>
      </li>
      <li class="panels" style="width:80%;">
        <h3><?php echo link_to(short_string($project->getTitle(), 55), '@show_project?project='.$project->getSlug()) ?></h3>
        <?php echo $project->getDescriptionBrief(100) ?>
      </li>

    </ul>
  </div>
<?php endforeach; ?>

<?php /* TThis is the full positions listing html code
<div class="project-position">
  <?php echo image_tag('nopicture.jpg', array('class' => 'primary')) ?>
<h1><?php echo $project->getTitle() ?><?php echo link_to(__('Apply'), '#') ?></h1>
<p>
  <?php echo $project->getQualificationsBrief(150) ?>  <?php echo link_to(__('More'), '#') ?>
</p>
  <p>Filled by: Available (Apply)<?php //if ($project->isFilled()) { echo $project->getSfGuardUser()->getProfile(); } else { echo 'Available ('.link_to('Apply', '#').')'; } ?></p>
<p>Qualifications: <?php echo $project->getQualifications() ?></p>
<p>Hours per week: 6</p>
  <p><?php echo link_to('More positions like this', '#') ?></p>
</div>
  */ ?>
</div>
