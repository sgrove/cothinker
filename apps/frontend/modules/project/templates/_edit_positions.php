<?php use_helper('Form', 'Object', 'Javascript', 'I18N')?>
<div id="project-positions-holder">
    
    <?php if ($collapsable): ?>
      <?php echo link_to_function('Positions', visual_effect('toggle_blind', 'project-positions', array('duration' => 0.5)), array('class' => 'titlebar-clickable project-titlebar')); ?>
    <?php else: ?>
      <div class="project-titlebar">
        Positions
      </div>
    <?php endif; ?>
  
  <div id="project-positions" <?php //if ($collapsable && $collapsed == 'true') { echo 'style="display:none;"'; } ?> >
    <div>
      <?php $counter = 0 ?>  
      <?php foreach ($project->getPositions() as $position): ?>
        <?php $counter++ ?>
        <div>
          <span>
            <?php if ($position->isFilled()) 
            { 
              echo $position->getUser()->getProfile().'<br />'; 
            } 
            
            $applicants = $position->getApplicants();
            echo '('.link_to_function(
                format_number_choice('[0]There are no additional applicants|[1]Click here to see the 1 applicant|(1,+Inf]Click here to see the '.count($applicants).' applicants', '', count($applicants)),
                visual_effect('toggle_blind', 'project-position-application-'.$position->getUuid(), array('duration' => 0.5)), array()).')';
            ?>
          </span>
          <span><?php if ($position->isFilled()) { echo image_tag($position->getUser()->getProfile()->getThumbnail()); } ?></span>
          <span>
            <?php //TODO: possibly remove the uuid from the span ids to minimize exposure. randomly generated numbers might work just ask well.?>
            <span id="<?php echo $position->getUuid() ?>-title"><?php echo $position->getTitle() ?></span>
            <?php echo input_in_place_editor_tag($position->getUuid()."-title", 'project/ajaxEditPosition?position='.$position->getUuid().'&field=title', array('cols'        => 10,'rows'        => 5, 'evalScript' => 'true')) ?>
          </span>
          <span><span id="<?php echo $position->getUuid() ?>-qualifications"><?php echo $position->getQualifications() ?></span></span>
          <?php echo input_in_place_editor_tag($position->getUuid()."-qualifications", 'project/ajaxEditPosition?position='.$position->getUuid().'&field=qualifications', array('cols'        => 10,'rows'        => 5, 'evalScript' => 'true')) ?>
          <span><span id="<?php echo $position->getUuid() ?>-hours"><?php echo $position->getWeeklyHours() ?></span></span>
          <?php echo input_in_place_editor_tag($position->getUuid()."-hours", 'project/ajaxEditPosition?position='.$position->getUuid().'&field=hours', array('cols'        => 10,'rows'        => 5, 'evalScript' => 'true')) ?>
          <span id="position-status-holder">
          <?php echo form_remote_tag(array(
            'update'   => array('success' => 'project-positions-holder'),
            'url'    => 'project/ajaxSetPositionStatus',
            'loading'  => "Element.show('indicator-".$project->getUuid()."-status')",
            'complete' => "Element.hide('indicator-".$project->getUuid()."-status');".visual_effect('highlight', 'project-positions-holder'),
            )) ?>
          		<?php echo input_hidden_tag('position', $position->getUuid(), array()) ?>
          		<?php echo select_tag('position_status', options_for_select(array(
          		sfConfig::get('app_project_position_status_open') => 'Open for applications',
          		sfConfig::get('app_project_position_status_closed') => 'Closed for applications',), $position->getStatus())) ?>
          		<?php echo submit_tag('go', array()) ?>
          	</form>
          </span>
          <?php if (!$position->isFilled()): ?>
            <span><?php echo link_to_remote('remove position', array(
            'url'      => 'project/ajaxRemovePosition?uuid='.$position->getUuid(),
            'update'   => array('success' => 'project-positions-holder'),
            'loading'  => "Element.show('indicator')",
            'complete' => "Element.hide('indicator');".visual_effect('highlight', 'project-positions'),
          )); ?>
            </span>
          <?php endif ?>
        </div>
        <?php if (!$position->isFilled()): ?>
          <div id="project-position-application-<?php echo $position->getUuid() ?>" style="display:none;">
            <?php 
            foreach($position->getApplicants() as $user)
            {
              echo '<span style="border-bottom:1px solid black;">'.$user->getSfGuardUser();
              ?>
                <?php echo link_to_remote('Accept applicant', array(
                  'url'      => 'project/ajaxAcceptApplicant?project='.$project->getUuid().'&user='.$user->getSfGuardUser()->getProfile()->getUuid().'&position='.$position->getUuid(),
                  'update'   => array('success' => 'project-positions-holder'),
                  'loading'  => "Element.show('indicator')",
                  'complete' => "Element.hide('indicator');".visual_effect('highlight', 'project-positions'),
                  )); ?>
                </span><br />
            <?php 
            }
            ?>
          </div>
        <?php elseif($position->isFilled()): ?>
          <?php 
            foreach($position->getApplicants() as $user)
            {
              echo $user->getSfGuardUser()->getProfile().' - '.link_to_remote('Accept applicant (will create an additional positions)', array(
                  'url'      => 'project/ajaxCloneAndAcceptApplicant?project='.$project->getUuid().'&user='.$user->getSfGuardUser()->getProfile()->getUuid().'&position='.$position->getUuid(),
                  'update'   => array('success' => 'project-positions-holder'),
                  'loading'  => "Element.show('indicator')",
                  'complete' => "Element.hide('indicator');".visual_effect('highlight', 'project-positions'),
                  ))."</span><br />";
            }
            ?>
      <?php endif; ?>
        <?php endforeach; ?>
        <div>
          <td colspan='6'>
            <?php echo form_remote_tag(array(
      'update'   => 'project-positions-holder',
      'url'      => 'project/ajaxAddPosition',
  )) ?>
            <?php echo object_input_hidden_tag($project, 'getUuid', array()) ?>
            <?php echo input_tag('position_title', 'Position Title')?>
            <?php echo input_tag('position_qualifications', 'Qualifications') ?>
            <?php echo input_tag('position_weekly_hours', '5') ?>
            <?php echo submit_tag('Add Position') ?>
            <div style="height:20px">
              <p id="indicator" style="display:none">
                <?php echo image_tag('indicator.gif') ?> adding position...
              </p>
            </div>
            </form>
          </span>
        </div>
  </div>
</div>