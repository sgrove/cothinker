<?php echo nav_tabs('project', $tab, $project); ?>

<?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
<div class="project-subtabs" style="background-color:#72BE44;margin-top:-5px;">
        <ul>
                <li id="current"><?php echo link_to('Positions', '@show_project_team?project='.$project->getSlug()) ?></li>
                <li><?php echo link_to('Application Manager', 'project/applications?slug='.$project->getSlug()) ?></li>
        </ul>
        <hr class="clear" />
</div>
<div class="project-positions">

<?php if ($project->isNew()): ?>
  <h1>Create a New Position</h1>  
  <?php else: ?>
  <h1>Edit Position Details</h1>  
<?php endif ?>
  <?php if($sf_user->isAuthenticated() && $project->hasPermission('handle-applications', $sf_user->getId())): ?>
            <div id="member-new-holder" style="display:none;margin-bottom:10px;margin-top:5px;">
                <div class="blue-shadow"><div class="blue-title blue-content">Add a team position to your project</div></div>
                <div class="blue-shadow">
                    <div class="blue-content">
                        <?php echo form_tag('project/updatePosition') ?>
                          <fieldset id="task-details" style="vertical-align:top;border: medium none;">
                            <?php echo input_hidden_tag('slug', $project->getSlug(), array()) ?>
                            <?php echo input_hidden_tag('tab', 'team') ?>
                            <?php echo label_for('title', 'Position title'), input_tag('title')?><br />
                            <?php echo label_for('description', 'Describe what this team member would do?'), textarea_tag('description', '', array('rows' => '3')) ?>
                            <?php echo label_for('qualifications', 'Qualifications for the position'), textarea_tag('qualifications', '', array('rows' => '2')) ?>
                            <?php //echo textarea_tag('task_tags', '', array('rows' => '3')) ?>
                          </fieldset>
                          <?php echo submit_tag('Add Position') ?>
                        </form>
                    </div>
                </div>
            </div>
  <?php endif; ?>
