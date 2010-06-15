<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global', 'sfFileGallery') ?>
<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'most popular' ?>

<?php echo nav_tabs('features', $tab); ?>

<div style="border: 1px solid #72BE44;background-color: #D9E1FF;padding: 4px;margin-bottom: 10px;">
  <p style="float:right;text-align:right;">
    <?php echo __('A %type% Suggested by %1% %2% ago',
  array('%1%' => link_to($feature->getsfGuardUser()->getProfile(), 'user/show?user='.$feature->getsfGuardUser()->getProfile()->GetUuid()),
    '%2%' => distance_of_time_in_words($feature->getCreatedAt('U')),
    '%type%' => format_number_choice('['.sfConfig::get('app_feature_type_bug').']Bug Report|['.sfConfig::get('app_feature_type_feature').']Feature Request', array(), $feature->getType()))) ?>
    <a href="#comments"><?php echo icon_tag('comment').' '.$feature->getNbComments().' Comments' ?></a>
    <?php echo icon_tag('folder'). ' '.get_nb_files('feature', $feature->getId()).' Files ' ?>
  </p>
  <p style="float:left;">
    <h4><?php echo $feature->getTitle() ?></h4>
    <?php echo nl2br($feature->getDescription()) ?>
  </p>
  <hr class="clear" />
</div>

<div id='files-holder' style='padding:4px;width:48%;float:right;'>
  <h3><a id="files"><?php echo ucwords(__('Files')) ?></a></h3>
  <div style='background-color:#D9E1FF;border:1px solid #72BE44;padding: 4px;'>
    <div style="border-bottom: 1px solid white; padding-bottom: 2px;margin-bottom: 4px;">
      Files currently disabled for sugestions.
    </div>
  </div>
</div>

<div id='comments-holder' style='padding:4px;width:48%;float:left;'>
  <h3><a id="comments"><?php echo ucwords(__('Comments')) ?></a></h3>
  <?php
  include_component('sfComment', 'commentList', array('object' => $feature));
  if ($sf_user->isAuthenticated())
    include_component('sfComment', 'commentForm', array('object' => $feature));
  ?>
</div>
<div style="clear:both;">&nbsp;</div>
