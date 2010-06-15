<?php use_helper('Date', 'I18N', 'Form', 'Javascript', 'sfIcon', 'Global') ?>

<?php if (!isset($tab)) $tab = 'team' ?>

<?php echo nav_tabs('project', $tab, $project); ?>
  
<h2>Managing applications for <em><?php echo $project->getTitle() ?></em></h2>
Step 1. Select the position to review applications for
<div class="resource-manager-panel1" style="width:30%;float:left;">
    <div id="indicator" style="display: none"></div>
    <ul>
        <li id="entry-1">
            <?php echo link_to_function('Positions', visual_effect('toggle_blind', 'subentry-1', array('duration' => '0.5')), array('class' => 'header')) ?>
            <ul id="subentry-1" style="">
                <?php foreach ($project->getPositions() as $position): ?>
                <li><?php echo link_to_remote(icon_tag('users').' '.short_string($position->getTitle(), 30), array(
                            'url'      => 'applications/applicationBrowser?position='.$position->getUuid(),
                            'update'   => array('success' => 'resources'),
                            'loading'  => "Element.show('loader')",
                            'complete' => "Element.hide('loader');".visual_effect('highlight', 'resources'),
                            )); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>

<div class="resource-manager-panel2" id="resources" style="height: 200px; width:65%;">
    Step 2. After selecting a position on the left, the applications will appear here.
</div>
<hr class="clear" />
<div class="resource-manager-application" id="details" style="border: 2px solid black; clear:both;margin-top:15px;">
	Step 3. Review, mark, and process applications here.
</div>

