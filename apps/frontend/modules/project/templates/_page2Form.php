  <?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project') ?>

  <?php 
  $rule = '';
  if ($project->getUuid() != null) {
    $rule = '?id='.$project->getUuid();
  }
  ?>
  <ul style="list-style:horizontal;">
    <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '@create_project_instructions'.$rule) ?></li>
    <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '@create_project_step1'.$rule) ?></li>
    <li style="float:left;margin-right:5px;"><strong><?php echo link_to('2. Details', '@create_project_step2'.$rule) ?></strong></li>
    <li style="float:left;margin-right:5px;">3. Timeline</li>
    <li style="float:left;margin-right:5px;">4. Submit</li>
  </ul>
  <hr class="clear" />

  <h1>2. Let's get to the nitty-gritty . . .</h1>
  <?php echo form_tag('@create_project_save_step2', array('class' => 'project-edit',)) ?>
    <div style="width:70%;float:left;">
      <div class="blue-shadow"><div class="blue-title blue-content">Project-Specific Details</div></div>
      <div class="blue-shadow">
        <div class="blue-content">
          <fieldset style="border: medium none;" >
            <?php echo input_hidden_tag('id', $project->getUuid(), array()) ?>
            
            <?php if ($sf_request->hasError('profit')) { echo '<span class="form-error">'.$sf_request->getError('profit').'</span>'; } ?>
            <?php echo label_for('profit', 'Will your project generate any profit, or intellectual property? If so, please explain.'), select_tag_yes_no('profit', $project->getProfit()), object_textarea_tag($project, 'getProfitDetails', array ('size' => '20x3',)) ?>
            
            <?php if ($sf_request->hasError('liability')) { echo '<span class="form-error">'.$sf_request->getError('liability').'</span>'; } ?>
            <?php echo label_for('liability', 'Are there any concerns over liability in your project?') ?><?php echo select_tag_yes_no('liability', $project->getLiability()) ?>
            
            <?php echo object_textarea_tag($project, 'getLiabilityDetails', array ('size' => '20x3',)) ?>
            
            <?php if (isset($hasSpecialNotes) && $hasSpecialNotes == true): ?>
              Here are some questions that are specific to projects in <?php echo $project->getCategory() ?>:
            <?php endif ?>
          </fieldset>
          <hr class="clear" />
        </div>
      </div>
    </div>
    <div style="width:25%;float:right;">
      <div style="background-color:#87B94D;color:white;padding:4px;">
        <p style="background-color:#E8B069;">
          This part could be a little bit harder.<br />
          <?php echo link_to('Want some help?', '#') ?>
        </p>
        <br />
        <p>
          Got it figured out?
          <?php echo submit_tag('Let\'s go to the next step', array()) ?>
      </div>
    </div>
    <hr class="clear" />
  </form>
