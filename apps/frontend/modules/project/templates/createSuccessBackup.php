  <?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project') ?>

<?php include_partial("home/storage_div")?>

<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'create' ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('projects', $tab); ?>
    </ul>
  </div>

<h1>Create New Project</h1>
<?php echo form_tag('project/saveNew', array('class' => 'project-edit',)) ?>
  <div style="width:45%;float:left;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project Description</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;" >
          <?php echo label_for('department_id', 'Department'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?><br />
          <?php echo label_for('title', 'Project Title'), object_input_tag($project, 'getTitle', array ('style' => 'width:95%;')) ?>
          <?php echo label_for('description', 'Description'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
          <?php echo label_for('notes', 'Additional notes for your project'), object_textarea_tag($project, 'getNotes', array ('size' => '20x3',)) ?>
          <?php echo label_for('tags_as_text', 'Project tags (keywords)'), object_textarea_tag($project, 'getTagsAsText', array ('size' => '20x2',)) ?>
          <?php //echo label_for('goals', 'Project Goals'.image_tag('greenplus')), input_tag('goals[]', '', array ('style' => 'width:95%;')), image_tag('greenminus') ?>
        </fieldset>
        <hr class="clear" />
      </div>
    </div>
  </div>
  <div style="width:45%;float:right;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project Details</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;">
            <ul>
            <?php //<li><?php echo label_for('season', 'Season'), select_tag_seasons('season', $project->getSeason()), select_tag_project_years('year', $project->getYear()) </li> ?>
            <li><?php echo label_for('begin', 'Begin'), object_input_date_tag($project, 'getBegin', array ('rich' => true, 'style' => 'width:15%;margin-right:5px;')) ?><?php echo label_for('campus', 'Campus'), select_tag('campus', objects_for_select($campuses, 'getId', 'getName', '', array()), array('class'=>'xxx')) ?></li>
            <li><?php echo label_for('finish', 'Finish'), object_input_date_tag($project, 'getFinish', array ('rich' => true, 'style' => 'width:15%;margin-right:5px;')) ?><?php echo label_for('published', 'Public'), select_tag_yes_no('published', $project->getPublished()) ?></li>
            <?php //<li><?php echo label_for('applications', 'Applications'), select_tag_project_applications('applications', $project->getApplications()) </li> ?>
            <li></li>
            <li></li>
            <?php //Views:echo $project->getHits() ?>
            </ul>
        </fieldset>
        <fieldset style="width:100%;">
          <legend>Legal Stuff</legend>
          <?php echo label_for('agree', "I have read and agree to ".link_to('Cothink\'s Terms of Service', 'home/tos', array('target' => 'blank'))), checkbox_tag('agree') ?>
           <?php echo submit_tag('save', array('class' => 'btn')) ?>
        </fieldset>
        <hr class="clear" />
      </div>
    </div>
  </div>
  <hr class="clear" />
</form>
