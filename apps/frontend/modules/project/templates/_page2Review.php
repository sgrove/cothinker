  <?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project') ?>
  <h1>Due Diligence</h1>
        <div class="blue-content">
            Will the project generate any profit? <strong><?php echo yes_no($project->getProfit()) ?></strong><br />
            <?php echo $project->getProfitDetails() ?><br />
            Are there any liability concerns for this project? <strong><?php echo yes_no($project->getLiability()) ?></strong><br />
            <?php echo $project->getLiabilityDetails() ?>
        </div>
