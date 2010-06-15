<div class="project-positions-widget widget">
<h1>Positions</h1>

<?php $counter = 0; ?>
<?php $positions = $project->getPositions(); shuffle($positions) ?>
<?php foreach($positions as $position): ?>
<?php if ($counter == 3) { break; } else { $counter++; } ?>
<div class="project-listing">
  <ul class="description">
    <li class="panels" >
      <?php echo link_to(image_tag($position->getThumbnail()), 'project/show?tab=team&slug='.$project->getSlug().'#position_'.$position->getUuid()) ?>
    </li>
    <li class="panels" style="width:80%;">
      <h3><?php echo link_to(short_string($position->getTitle(), 55), 'project/show?tab=team&slug='.$project->getSlug().'#position_'.$position->getUuid()) ?></h3>
      <?php echo short_string($position->getQualifications(), 100) ?><br />
      <?php echo link_to(__('More'), 'project/show?slug='.$project->getSlug().'&tab=team#position_'.$position->getUuid()) ?>
    </li>
  </ul>
</div>
<?php endforeach; ?>
<?php /* TThis is the full positions listing html code
  <div class="project-position">
          <?php echo image_tag('nopicture.jpg', array('class' => 'primary')) ?>
          <h1><?php echo $position->getTitle() ?><?php echo link_to(__('Apply'), '#') ?></h1>
          <p>
            <?php echo $position->getQualificationsBrief(150) ?>  <?php echo link_to(__('More'), '#') ?>
          </p>
          <p>Filled by: Available (Apply)<?php //if ($position->isFilled()) { echo $position->getSfGuardUser()->getProfile(); } else { echo 'Available ('.link_to('Apply', '#').')'; } ?></p>
          <p>Qualifications: <?php echo $position->getQualifications() ?></p>
          <p>Hours per week: 6</p>
          <p><?php echo link_to('More positions like this', '#') ?></p>
  </div>
*/ ?>
<?php echo link_to(__("View more positions..."), 'project/show?slug='.$project->getSlug().'&tab=team', array('class' => 'big-blue-link')) ?>
</div>
