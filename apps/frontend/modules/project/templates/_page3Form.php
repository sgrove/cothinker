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
  <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '@create_project_step1'.$rule) ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('2. Details', '@create_project_step2'.$rule) ?></li>
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('3. Timeline', '@create_project_step3'.$rule) ?></strong></li>
  <li style="float:left;margin-right:5px;">4. Submit</li>
</ul>
<hr class="clear" />

<h1>3. Finally, a little timeline . . .</h1>

<?php echo form_tag('@create_project_save_step3', array('class' => 'project-edit',)) ?>
  <div style="width:70%;float:left;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project-Specific Details</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;" >
          <?php echo input_hidden_tag('id', $project->getUuid(), array()) ?>
          <?php if ($sf_request->hasError('length')) { echo '<span class="form-error">'.$sf_request->getError('length').'</span>'; } ?>
          <?php echo label_for('length', 'How long do you expect the project to last?') ?>
          <?php
          echo select_tag('length', 
          options_for_select(array(
            sfConfig::get('app_time_length_less_one_quarter') => 'Less than 1 quarter (10 weeks)',
            sfConfig::get('app_time_length_one_quarter') => 'Around 1 quarter (10 weeks)',
            sfConfig::get('app_time_length_one_semester') => 'Around 1 semester (16 weeks)',
            sfConfig::get('app_time_length_one_year') => 'Around 1 year',
            sfConfig::get('app_time_length_ongoing') => 'It\'s an ongoing project',
            sfConfig::get('app_time_length_unknown') => 'I have no idea, and the Cothink community isn\'t even sure')
          , $project->getLength()))?><br />
          
          <?php echo label_for('preferred_term_length', 'Do you prefer to work with students who are on a specific term-length?'), select_tag('preferred_term_length', 
          options_for_select(array(
            sfConfig::get('app_time_length_no_preference') => 'No preference',
            sfConfig::get('app_time_length_quarter') => 'Quarter system',
            sfConfig::get('app_time_length_semester') => 'Semester system',
            sfConfig::get('app_time_length_year') => 'Year long commitment',
            sfConfig::get('app_time_length_ongoing') => 'Ongoing commitment',
          ), $project->getLength())) ?>
          <br />
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
        This is a great place to get community input, form people who know how long projects take.<br />
        <?php echo link_to('Shall we get their input?', '#') ?>
      </p>
      <br />
      <p>
        Ready? Sure you are.
        <?php echo submit_tag('Let\'s finish this up', array()) ?>
    </div>
  </div>
  <hr class="clear" />
</form>