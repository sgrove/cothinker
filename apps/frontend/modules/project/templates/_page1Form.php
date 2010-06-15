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
    <li style="float:left;margin-right:5px;"><strong><?php echo link_to('1. Description', '@create_project_step1'.$rule) ?></strong></li>
    <li style="float:left;margin-right:5px;">2. Details</li>
    <li style="float:left;margin-right:5px;">3. Timeline</li>
    <li style="float:left;margin-right:5px;">4. Submit</li>
  </ul>
  <hr class="clear" />

  <h1>Start with some general info . . .</h1>

  <?php echo form_tag('@create_project_save_step1', array('class' => 'project-edit',)) ?>
    <div style="width:70%;float:left;">
      <div class="blue-shadow"><div class="blue-title blue-content">Project Description</div></div>
      <div class="blue-shadow">
        <div class="blue-content">
          <fieldset style="border: medium none;" >
            <?php echo input_hidden_tag('id', $project->getUuid(), array()) ?>
            <?php if ($sf_request->hasError('department')) { echo '<span class="form-error">'.$sf_request->getError('department').'</span>'; } ?>
            <?php echo label_for('department_id', 'Department'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?>
            <?php if ($sf_request->hasError('campus')) { echo '<span class="form-error">'.$sf_request->getError('campus').'</span>'; } ?>
            <?php echo label_for('campus', 'Campus'), select_tag_campuses('campus', $project->getCampusId()) ?><br />
            <?php if ($sf_request->hasError('title')) { echo '<span class="form-error">'.$sf_request->getError('title').'</span>'; } ?>
            <?php echo label_for('title', 'Project Title'), object_input_tag($project, 'getTitle', array ('style' => 'width:95%;')) ?>
            <?php if ($sf_request->hasError('description')) { echo '<span class="form-error">'.$sf_request->getError('description').'</span>'; } ?>
            <?php echo label_for('description', 'Description'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
            <?php echo label_for('notes', 'Additional notes for your project'), object_textarea_tag($project, 'getNotes', array ('size' => '20x3',)) ?>
            <?php echo label_for('tags_as_text', 'Project tags (keywords)'), object_textarea_tag($project, 'getTagsAsText', array ('size' => '20x2',)) ?>
            <?php //echo label_for('goals', 'Project Goals'.image_tag('greenplus')), input_tag('goals[]', '', array ('style' => 'width:95%;')), image_tag('greenminus') ?>
            <?php if ($sf_request->hasError('community_benefits')) { echo '<span class="form-error">'.$sf_request->getError('community_benefits').'</span>'; } ?>
            <?php echo label_for('community_benefits', 'Describe how your project will benefit the community.'), object_textarea_tag($project, 'getCommunityBenefits', array ('size' => '20x3',)) ?>
            <?php if ($sf_request->hasError('student_reasons')) { echo '<span class="form-error">'.$sf_request->getError('student_reasons').'</span>'; } ?>
            <?php echo label_for('student_reasons', 'Tell us why this is a good project for students.'), object_textarea_tag($project, 'getStudentReasons', array ('size' => '20x3',)) ?>
          </fieldset>
          <hr class="clear" />
        </div>
      </div>
    </div>
    <div style="width:25%;float:right;">
      <div style="background-color:#87B94D;color:white;padding:4px;">
        <p style="background-color:#E8B069;">
          Have questions, or unsure about how to describe your project to catch attention?<br />
          <?php echo link_to('Cothink can help!', '#') ?>
        </p>
        <br />
        <p>
          Finished Here?
          <?php echo submit_tag('Let\'s go to the next step', array()) ?>
      </div>
    </div>
    <hr class="clear" />
  </form>