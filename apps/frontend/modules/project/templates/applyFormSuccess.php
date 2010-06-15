<?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project', 'sfPhotoGallery', 'Lightbox') ?>

<?php include_partial("home/storage_div")?>

<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'team' ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('project', $tab, $project); ?>
    </ul>
  </div>

  <h1>Applying for a Position</h1>

  <div id="project-details" style="width:100%;float:left;padding: 4px;">
    <div class="blue-shadow"><div class="blue-title blue-content">Applying for position <strong>"<?php echo $position->getTitle() ?>"</strong> in project <em><?php echo short_string($project->getTitle(), 30) ?></em></div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <?php if ($sf_request->hasErrors()): ?>
          <ul>
            <?php foreach ($sf_request->getErrors() as $error): ?>
              <li><span class="form-error"><?php echo $error ?></span></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        
        <?php echo form_tag('project/applyForm', array('class' => 'project-edit')) ?>
        <?php echo input_hidden_tag('position', $position->getUuid()) ?>
            <?php echo label_for('interest', __('What interested you about this project, and this position in particular?')), object_textarea_tag($application, 'getInterest', array ('size' => '20x3',)) ?>
            <?php echo label_for('qualification', __('What makes you feel you meet the qualifications for this position?')), object_textarea_tag($application, 'getQualification', array ('size' => '20x3',)) ?>
            <?php echo label_for('notes', __('Is there anything else you would like to add?')), object_textarea_tag($application, 'getNotes', array ('size' => '20x3',)) ?>
          <?php echo submit_tag('save', array('class' => 'btn')) ?>
        </form>
      </div>
    </div>
  </div>
<hr class="clear" />