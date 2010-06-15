<?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project', 'sfPhotoGallery', 'Lightbox') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

  <h1>Edit Project</h1>

  <div id="project-details" style="width:48%;float:left;padding: 4px;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project Details</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <?php if ($sf_request->hasErrors()): ?>
          <ul>
            <?php foreach ($sf_request->getErrors() as $error): ?>
              <li><?php echo $error ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        
        <?php echo form_tag('project/update', array('class' => 'project-edit')) ?>
        <?php echo input_hidden_tag('project', $project->getSlug()) ?>
            <?php echo label_for('department', 'Department'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?><br />
            <?php echo label_for('title', 'Project Title'), object_input_tag($project, 'getTitle', array ('style' => 'width:95%;')) ?>
            <?php echo label_for('description', 'Describe your project (what it involves, the goals, etc.)'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
            <?php echo label_for('notes', 'Additional notes for your project'), object_textarea_tag($project, 'getNotes', array ('size' => '20x3',)) ?>
            <?php echo label_for('tags_as_text', 'Project tags (keywords)'), object_textarea_tag($project, 'getTagsAsText', array ('size' => '20x2',)) ?>
            <?php //echo label_for('goals', 'Project Goals'.image_tag('greenplus')), input_tag('goals[]', '', array ('style' => 'width:95%;')), image_tag('greenminus') ?>
            <ul>
              <li><?php echo label_for('begin', 'Begin'), object_input_date_tag($project, 'getBegin', array ('rich' => true, "style" => "width:20%;")) ?><?php echo label_for('campus', 'Campus'), select_tag_campuses('campus', $project->getCampusId()) ?></li>
              <li><?php echo label_for('finish', 'Finish'), object_input_date_tag($project, 'getFinish', array ('rich' => true, "style" => "width:20%;")) ?><?php echo label_for('published', 'Public'), select_tag_yes_no('published', $project->getPublished()) ?></li>
            </ul>
          <?php echo submit_tag('save', array('class' => 'btn')) ?>
        </form>
      </div>
    </div>
  </div>

  <div style="width:49%; float:right;">
    <div class="blue-shadow"><div class="blue-title blue-content">Upload Photos <span id="photo_indicator" style="display:none;"><?php echo image_tag('indicator.gif') ?>Setting project photo...</span></div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <?php echo icon_tag('add').photo_link_to_add('project', $project->getId(), array('modalbox' =>'true')) ?>
        <table>
          <tbody>
            <?php $counter = 0; ?>
            <?php foreach(photo_get_photos('project', $project->getId()) as $photo): ?>
              <?php if ($counter == 0) echo "<tr>" ?>
              <td>
                <div style="padding: 3px; margin: 3px;" id="photo_<?php echo $photo->getUuid() ?>">
                <?php echo light_image('/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/medium/'.$photo->getRealName(), '/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/large/'.$photo->getRealName(), array()) ?><br />
                <?php echo link_to(icon_tag('accept').__(' Set as project picture'), 'project/setProfilePhoto?photo='.$photo->getUuid().'&project='.$project->getUuid()) ?><br />
                <?php echo link_to(icon_tag('remove').' '.__('Delete'), 'project/removePhoto?photo='.$photo->getUuid().'&project='.$project->getUuid()) ?>
                </div>
              </td>
              <?php $counter++; ?>
              <?php if ($counter == 3) { $counter = 0; echo "</tr>"; } ?>
            <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
        <hr class="clear" />
      </div>
    </div>
  </div>

<hr class="clear" />