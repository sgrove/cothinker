<?php use_helper('Date', 'I18N', 'Form', 'Javascript', 'sfIcon', 'Global') ?>
<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'resources' ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('project', $tab, $project); ?>
    </ul>
  </div>
  
<h2>Managing resources for <em><?php echo $project->getTitle() ?></em></h2>
Navigation and Tags
<div class="resource-manager-panel1" style="width:30%;float:left;" id="wtf">
    <div id="indicator" style="display: none"></div>
    <ul>
        <li id="entry-1">
            <?php echo link_to_function('Tasks', visual_effect('toggle_blind', 'subentry-1', array('duration' => '0.5')), array('class' => 'header')) ?>
            <ul id="subentry-1" style="display: none">
                <?php foreach ($project->getTasks() as $task): ?>
                <li><?php echo link_to_remote(icon_tag('comment_edit').' '.short_string($task->getName(), 30), array(
                            'url'      => 'files/fileBrowser?type=task&id='.$task->getUuid(),
                            'update'   => array('success' => 'resources'),
                            'loading'  => "Element.show('loader')",
                            'complete' => "Element.hide('loader');".visual_effect('highlight', 'resources'),
                            )); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li id="entry-2">
            <?php echo link_to_function('Positions', visual_effect('toggle_blind', 'subentry-2', array('duration' => '0.5')), array('class' => 'header')) ?>
            <ul id="subentry-2" style="display: none">
                <?php foreach ($project->getPositions() as $position): ?>
                <li><?php echo link_to_remote(icon_tag('comment_edit').' '.short_string($position->getTitle(), 30), array(
                            'url'      => 'files/fileBrowser?type=positions&id='.$position->getUuid(),
                            'update'   => array('success' => 'resources'),
                            'loading'  => "Element.show('loader')",
                            'complete' => "Element.hide('loader');".visual_effect('highlight', 'resources'),
                            )); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
        <li id="entry-3">
            <?php echo link_to_function('General', visual_effect('toggle_blind', 'subentry-3', array('duration' => '0.5')), array('class' => 'header')) ?>
            <ul id="subentry-3" style="display: none">
                <?php foreach ($project->getTags() as $tag): ?>
                <li><?php echo link_to_remote(icon_tag('comment_edit').' '.short_string($tag->getTitle(), 30), array(
                            'url'      => 'files/fileBrowser?type=positions&id='.$tag->getUuid(),
                            'update'   => array('success' => 'resources'),
                            'loading'  => "Element.show('loader')",
                            'complete' => "Element.hide('loader');".visual_effect('highlight', 'resources'),
                            )); ?>
                </li>
                <?php endforeach; ?>
        </li>
    </ul>
</div>

<div class="resource-manager-panel2" id="resources" style="height: 200px; width:65%;">
    <table style="width:100%;">
        <thead>
            <tr>
                <td>Files</td>
                <td>Size</td>
                <td>Uploaded</td>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 2; $direction = 1;?>
            <?php for ($i = 0; $i < 25; $i++): ?>
            <?php if ($counter == 3 || $counter == 1) $direction = -1 * $direction; ?>
            <?php $counter = $counter + (1 * $direction) ?>
                <tr class="row-<?php echo $counter % 3?>">
                    <td><?php echo link_to('numerous_1.zip', '#') ?></td>
                    <td>1 MB</td>
                    <td><?php echo format_date(time()) ?> by <?php echo link_to('Sean Grove', '#') ?></td>
                </tr>
            <?php endfor; ?>
        </tbody>
    </table>
</div>

<div style="float:left;clear:left;padding-top:15px;width:30%;" id="file_uploader">
<div class="blue-shadow"><div class="blue-title blue-content">Upload File</div></div>
  <div class="blue-shadow">
    <div class="blue-content">
      <?php echo form_tag('#') ?>
      
      <?php echo label_for('file', __('File Path'), array('style' => 'display:block;')), input_file_tag('file') ?>
      <?php echo label_for('tags', __('Tags'), array('style' => 'display:block;')), input_tag('tags') ?>
     
      <?php echo submit_tag('save', array('class' => 'btn')) ?>
      </form>
    </div>
  </div>
</div>
<hr class="clear" />
