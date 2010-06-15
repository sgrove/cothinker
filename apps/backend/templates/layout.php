<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>
<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>
  <div id="container">
    <div id="page-header"></div>

    <ul id="admin-navlist">
      <ul style="border:1px solid green;padding: 2px;">
        <li>User-Related</li>
        <li><?php echo link_to('sfGuardUsers', 'sfGuardUser/list') ?></li>
        <li><?php echo link_to('Users', 'users/list') ?></li>
        <li><?php echo link_to('User Credential Groups', 'sfGuardGroup') ?></li>
        <li><?php echo link_to('User Permissions', 'sfGuardPermission') ?></li>
        <li><?php echo link_to('User Profiles', 'sfGuardUserProfile/list') ?></li>
        <li><?php echo link_to('contact infos', 'contactinfo/list') ?></li>
        <li><?php echo link_to('ToDos', 'todos/list') ?></li>
        <li><?php echo link_to('External Services', 'externalServices/list') ?>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Projects</li>
        <li><?php echo link_to('Proposals', 'projectproposals/list') ?></li>
        <li><?php echo link_to('Projects', 'project/list') ?></li>
        <li><?php echo link_to('Project Users', 'projectuser/list') ?></li>
        <li><?php echo link_to('Project Positions', 'projectposition/list') ?></li>
        <li><?php echo link_to('Project Urls', 'url/list') ?></li>
        <li><?php echo link_to('Tasks', 'task/list') ?></li>
        <li><?php echo link_to('Task Users', 'taskuser/list') ?></li>
        <li><?php echo link_to('Featured Project', 'featuredProjects/list') ?></li>
        <li><?php echo link_to('Applications', 'projectApplications/list') ?></li>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>History Feeds</li>
        <li><?php echo link_to('Events', 'events/list') ?></li>
        <li><?php echo link_to('Event Groups', 'eventgroups/list') ?></li>
        <li><?php echo link_to('Event Group-Users', 'eventgroupusers/list') ?></li>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Wikis</li>
        <li><?php echo link_to('Wikis', 'wikis/list') ?></li>
        <li><?php echo link_to('Pages', 'wikipages/list') ?></li>
        <li>| Interfaces</li>
        <li><?php echo link_to('Panels', 'panels/list?') ?>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Forums</li>
        <li><?php echo link_to('Categories', 'forumcategories/list') ?></li>
        <li><?php echo link_to('Forums', 'forums/list') ?></li>
        <li><?php echo link_to('Posts', 'forumposts/list') ?></li>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Forms</li>
        <li><?php echo link_to('Forms', 'forms/list') ?></li>
        <li><?php echo link_to('Fields', 'fields/list') ?></li>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Debug</li>
        <li><?php echo link_to('Error Log', 'sfErrorLogViewer') ?></li>
        <li><?php echo link_to('Debug Emails', 'sfEmail') ?></li>
        <li><?php echo link_to('Email Templates', 'sfEmailTemplateAdmin') ?></li>
        <li><?php echo link_to('Asset Library', 'sfAsset') ?></li>
        <li><?php echo link_to('FAQ Categories', 'sfFaqAdminCategories') ?></li>
        <li><?php echo link_to('FAQs Questions', 'sfFaqAdminFaq') ?></li>
      </ul>
      <ul style="border:1px solid green;padding: 2px;">
        <li>Other</li>
        <li><?php echo link_to('campuses', 'campus/list') ?></li>
        <li><?php echo link_to('departments', 'department/list') ?></li>
        <li><?php echo link_to('subdepartment', 'subdepartment/list') ?></li>
        <li><?php echo link_to('Messages', 'message/list') ?></li>
        <li><?php echo link_to('DidYouKnow', 'didyouknow/list') ?></li>
        <li><?php echo link_to('Support Messages', 'support/list') ?></li>
        <li><?php echo link_to('Comments', 'sfCommentAdmin/list') ?></li>
        <li><?php echo link_to('Features & Bugs', 'features/list') ?></li>
      </ul>
    </ul>

    <?php echo $sf_data->getRaw('sf_content') ?>
  </div>

</body>
</html>
