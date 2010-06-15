<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<!--[if lt IE 6]>
<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
<![endif]-->

<?php include_title() ?>
<?php include_slot('auto_discovery_link_tag') ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>

<?php use_helper('I18N', 'Javascript', 'nifty', 'sfIcon', 'ModalBox') ?>
<?php use_helper('Validation', 'I18N') ?>

<body>
  <?php //$sf_user->refreshCredentials() //NOTE: This adds considerable overhead with the additional SQL queries ?>
  <div id="container">

    <div id="page-header">
      <div id="header-menu" style="color: white;">
        <?php if (!$sf_user->isAuthenticated()): ?>
          <div id="header-login"><?php echo link_to_function('<span>'.ucwords(__("login")).'</span>', visual_effect("toggle_appear", "sf_guard_auth_form")) ?></div>
          <div id="register">
            <?php echo link_to(ucwords(__('register')), '@register') ?>
          </div>
          <div id="sf_guard_auth_form" style="display:none;">
            <?php echo form_tag('@sf_guard_signin', array('name' => 'login')) ?>
            <fieldset style="border: medium none; padding-top: 5px;">
              <div class="form-row" id="sf_guard_auth_username" style="display:inline;float:left;">
                <?php
              echo form_error('email'), 
                label_for('username', __('Email').':'),
                input_tag('username', $sf_data->get('sf_params')->get('username'));
              ?>
            </div>

            <div class="form-row" id="sf_guard_auth_password"  style="display:inline;float:left;">
              <?php
            echo form_error('password'), 
              label_for('password', __('password:')),
              input_password_tag('password');
            ?>
            <?php //echo input_hidden_tag('remember', '1', array()) ?>
            <?php echo label_for('remember', 'Remember me'), checkbox_tag('remember', '1', true, array()) ?>
          </div>
          <?php echo submit_tag(__('sign in'), array('class' => 'btn'));?>
        </fieldset>
      </form>
    </div>
  <?php endif; ?>
  <?php if ($sf_user->isAuthenticated()): ?>
    <?php $nbNewMessages = $sf_user->getNbNewMessages();
  if ($nbNewMessages <= 0)
  {
    $nbNewMessages = "";
  }
  else
  {
    $nbNewMessages = " (".$nbNewMessages.")";
  }
  ?>
  <div id="header-logout"><?php   echo link_to('<span>'.  ucwords(__("logout")).'</span>', '@sf_guard_signout') ?></div>
  <div id="header-messages"><?php echo link_to('<span>'.  ucwords(__("message center")).$nbNewMessages.'</span>', '@show_user_mailbox') ?></div>
  <div id="header-network"><?php  echo link_to('<span>'.  ucwords(__("network")).'</span>', "networks/index") ?></div>
  <div id="header-profile"><?php  echo link_to('<span>'.  ucwords(__("profile")).'</span>', '@edit_user_profile') ?></div>
  <div id="header-suggest"><?php  echo m_link_to('<span>'.ucwords(__("quick suggest")).'</span>', 'features/kwiky', array('title' => __('Give us a quick suggestion'), )) ?></div>
<?php endif ?>
</div>
<div id="page-header-logo" onclick="location.href='<?php echo 'http://'.$this->getContext()->getRequest()->getHost().url_for('@homepage') ?>';" style="cursor: pointer;"> </div>
</div>

<div id="left-menubar">
  <div id="navlist-holder">
    <ul id="navbar">
      <?php if ($sf_user->isAuthenticated()): ?>
        <li style="text-align:center;border-bottom: 1px solid gray;"><strong><?php echo $sf_user->getProfile()->getFullName() ?></strong></li>
      <?php endif; ?>
      <li><?php echo link_to(ucwords(__("home")), "home/index") ?></li>
      <li><?php echo link_to(ucwords(__('members')), 'user/list') ?></li>
      <li><?php echo link_to(ucwords(__("projects")), "project/list") ?></li>
      <li style="text-align:center;border-top: 1px solid gray;"><strong><?php echo link_to('Suggest a feature', 'features/list') ?></strong></li>
    </ul>
  </div>


  <?php if ($sf_user->isAuthenticated()): ?>

    <div class="adframe">
      <div class="adsense">
        <div class="adsense-in">
          <h4>Upcoming Tasks</h4>
          <div class="adunit" id="todo_sidebar">
            <?php include_component('home', 'todoSidebar') ?>
            <hr class="clear" />
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <div class="adframe">
    <div class="adsense">
      <?php include_component('home', 'didYouKnowText') ?>
    </div>
  </div>

</div>

<div id="content-holder">
  <?php echo $sf_data->getRaw('sf_content') ?>
</div>

<div id="cothink-footer">
  <p style="float:right;text-align:right;">&copy;2008 Cothink. Making the world a better place, one project at a time, for people who like better places.<br /><em>"Kinda too late now to do anything but succeed..."</em></p>
  <ul>
    <li><?php echo link_to(__("Help"), "help/index") ?></li>
    <li><?php echo link_to(__("TOS"), "static/tos") ?></li>
    <li><?php echo link_to(__("Privacy Policy"), "static/tos#privacy") ?></li>
    <li><?php echo link_to(__("Contact Us"), "@contact_form") ?></li>
    <li><?php echo link_to(__("Sitemap"), "@sitemap") ?></li>
    <li><a href="http://blog.cothink.org"><?php echo __("Blog") ?></a></li>
    <li class="last"><?php echo link_to(__("About"), "static/about") ?></li>
  </ul>
</div>

<?php //echo javascript_tag(nifty_round_elements( "div#content-holder", "all normal" ) ) ?>
<?php echo javascript_tag(nifty_round_elements( "div.adframe", "all normal" ) ) ?>
<?php echo javascript_tag(nifty_round_elements( "div#navlist-holder", "all normal" ) ) ?>

</div>
</body>
</html>
