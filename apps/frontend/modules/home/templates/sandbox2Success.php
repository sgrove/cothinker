<h1>Widget <?php echo $area ?></h1>
You're using <?php echo $form ?> form, and area <?php echo $area ?> will now display the <?php echo $widget ?> widget.<br />
<hr />
Area <?php echo $area ?> is currently set to display the <?php echo $project->getForm("main")->getWidget($area) ?> widget.

<?php /*
<hr />
<?php //echo var_dump($sf_params) ?>
<?php $order = $sf_params->get("order"); ?>

<?php foreach ($order as $key => $value): ?>
  <?php echo $key.': '.CampusPeer::retrieveByUuid($value) ?><br />
<?php endforeach ?>
<?php

  $campus = CampusPeer::retrieveByUuid($order[0]);
  echo "<hr />Your top campus is ".$campus->getName();

*/
?>