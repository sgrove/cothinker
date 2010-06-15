<h1>Project Team</h1>

<?php $counter = 0; ?>
<?php foreach($project->getPositions() as $position): ?>
<?php if ($counter == 3) { break; } else { $counter++; } ?>
  <div class="project-position">
          <?php if ($position->isFilled()) { echo image_tag($position->getUser()->getProfile()->getThumbnail(), array('class' => 'primary')); } else { echo image_tag('nopicture.jpg', array('class' => 'primary')); } ?>
          <h1><?php echo $position->getTitle() ?></h1>
          <p>
            <?php echo $position->getQualificationsBrief(150) ?>  <?php echo link_to(__('More'), '#') ?>
          </p>
  </div>
  <br />
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
<?php echo link_to(__("More Positions"), '#', array('class' => 'big-blue-link')) ?>
