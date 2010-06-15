<?php use_helper('Date', 'FormatSize', 'Javascript', 'sfIcon') ?>
<?php
// auto-generated by sfPropelCrud
// date: 2008/04/21 22:32:09
?>
    <table style="width:100%;">
        <thead>
            <tr>
                <td>Applicant</td>
                <td>Date</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 2; $direction = 1;?>
            <?php foreach($position->getApplications() as $application): ?>
            <?php if ($counter == 3 || $counter == 1) $direction = -1 * $direction; ?>
            <?php $counter = $counter + (1 * $direction) ?>
                <tr class="row-<?php echo $counter % 3?>">
                    <td><?php echo link_to($application->getsfGuardUser()->getProfile()->getFullName(), 'user/show?user='.$application->getsfGuardUser()->getProfile()->getUuid()) ?></td>
                    <td><?php echo format_date($application->getCreatedAt()) ?></td>
                    <td><?php echo link_to_remote(icon_tag('users').' View Application', array(
                            'url'      => 'applications/applicationViewer?application='.$application->getUuid(),
                            'update'   => array('success' => 'details'),
                            'loading'  => "Element.show('loader')",
                            'complete' => "Element.hide('loader');".visual_effect('highlight', 'details'),
                            )); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>