<div class="project-titlebar"><h3>Positions</h3></div>
<div>
<?php if ($project->getPositions() != null): ?>
  <?php foreach ($project->getPositions() as $position): ?>
    <div class="project-position-holder">
      <div class="float-left">
        <?php if ($position->isFilled()) echo image_tag($position->getUser()->getProfile()->getThumbnail()) ?><br />
        <span class="caption">
        	<?php 
        	if ($position->isFilled()) 
        	{ 
	    		echo $position->getUser()->getProfile(); 
    		} 
			else 
    		{
    		  if ($position->getStatus() == sfConfig::get('app_project_position_status_closed'))
    		  {
    		    echo 'Position filled';
    		  }
    			elseif ($sf_user->isAuthenticated() && $position->getStatus() == sfConfig::get('app_project_position_status_open') && !$position->isApplicant())
    			{
    				echo ucfirst(__('open')).' ('.link_to_function(ucfirst(__('click here to apply')), visual_effect('toggle_blind', 'project-position-application-'.$position->getUuid(), array('duration' => 0.5)), array()).')';
  				}
  				elseif ($sf_user->isAuthenticated() && $position->isApplicant())
  				{
  				  echo 'Your application has been received';
  				}
  				else
  				{
  					echo 'Open (Log in to apply)';
  				}
    		}
    		?>
		</span>
      </div>
      <span><?php echo $position->getTitle() ?></span><br />
      <span><?php echo ucwords(__("qualifications")) ?>: </span><span><?php echo $position->getQualifications() ?></span><br />
      <span><?php echo format_number_choice("[0]0 hours per week|[1]1 hour per week|(1,+Inf]%1% hours per week", array("%1%" => $position->getWeeklyHours()), $position->getWeeklyHours()) ?></span>
      <?php if (!$position->isFilled() && $sf_user->isAuthenticated()): ?>
	      <div id="project-position-application-<?php echo $position->getUuid() ?>" class="project-position-application-holder" style="display: none;overflow: hidden;">
	      	<?php echo form_tag('project/apply', array()) ?>
	      		<?php echo input_hidden_tag('position', $position->getUuid(), array()) ?>
	      		<?php echo input_tag('subject', ucfirst(__('regarding project %1%, applying for position "%2%".', array('%1%' => $project->getTitle(), '%2%' => $position->getTitle()))), array('style' => 'width:100%;')) ?><br />
	      		<?php echo textarea_tag('message', ucfirst(__('dear %1%, my name is %2% and I am very interested in applying for the above position.', array('%1%' => $project->getOwner(), '%2%' => $sf_user->getProfile()->getFullName()))) , array('style' => 'width:100%;', 'rows' => '3')) ?>
	      		<?php echo submit_tag('send', array()) ?>
	      	</form>
	      </div>
      <?php endif ?>
      <div class="clear-both"></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
</div>