<div class="project-positions-widget">
<h1>Open Positions</h1>

<?php $counter = 0; ?>
<?php $positions = $project->getPositions(); shuffle($positions) ?>
<?php foreach($positions as $position): ?>
<?php if ($position->isFilled()) continue ?>
<?php if ($counter == 3) { break; } else { $counter++; } ?>
<div class="project-listing">
  <ul class="description">
    <li class="panels" >
      <?php echo link_to(image_tag($position->getThumbnail()), '@show_project_team?project='.$project->getSlug().'#position_'.$position->getUuid()) ?>
    </li>
    <li class="panels" style="width:80%;">
      <h3><?php echo link_to(short_string($position->getTitle(), 55), '@show_project_team?project='.$project->getSlug().'#position_'.$position->getUuid()) ?></h3>
      <?php echo short_string($position->getQualifications(), 100) ?><br />
      <?php echo link_to(__('More'), '@show_project_team?project='.$project->getSlug().'#position_'.$position->getUuid()) ?>
    </li>
  </ul>
</div>
<?php endforeach; ?>
<?php echo link_to(__("View more open positions..."), '@show_project_team?project='.$project->getSlug(), array('class' => 'big-blue-link')) ?>
</div>
