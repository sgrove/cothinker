<?php use_helper('sfIcon') ?>
<div id="result" style="height:15px;">
  <?php if (!$sf_request->hasErrors()): ?>
    <?php echo icon_tag('accept')  ?> The position has been successfully saved
    <?php else: ?>
      <?php echo icon_tag('remove') ?> There are errors in the form, please correct them
  <?php endif ?>
</div>
<?php echo include_partial('project/edit_position_form', array('project' => $project, 'position' => $position)); ?>

<?php if (!$positionWasNew): ?>
  <?php 
  javascript_tag(
    "$('milestone_list').replace('<div id=\"milestone_list\">".include_partial('project/milestone_list', array('position' => $position))."</div>)"
    )
    ?>
<?php endif ?>