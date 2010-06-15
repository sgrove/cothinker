<?php myToolkit::prependPageTitle(sfConfig::get('app_title_create_project')); ?>
<?php use_helper('Object', 'Global', 'Project', 'nifty') ?>

<?php include_partial("home/storage_div")?>

<?php echo nav_tabs('projects', $tab); ?>

  <ul style="list-style:horizontal;">
    <li style="float:left;margin-right:5px;">1. Description</li>
    <li style="float:left;margin-right:5px;">2. Details</li>
    <li style="float:left;margin-right:5px;">3. Timeline</li>
  </ul>
  <hr class="clear" />

  <h1>Creating a project on Cothink . . .</h1>
  <div id="project-information" style="width:70%;float:left;background-color:#87B94D;color:white;padding:4px;">
    <h2>Here are a few things you should know...</h2>
    <p>
      Projects on Cothink have to meet certain requirements.<br />
      <span>1. As the project manager, you'll have to show how your proposal will benefit your community, and explain why student work will be a good fit for you.</span><br />
      <span>2. When you create your first project, we take a few extra steps to verify your identity. You might be required to upload a photo of yourself, or fill in extra fields for your profile.</span><br />
      Also, creating a project can be difficult, especially if you're not familiar with the subject area - you know what you want, but you don't know what it involves. At every step of the process, you can flag your application for help. The Cothink community, made up of experts from every field, will then be shown the page of the application you've requested help for. Everyone will make comments, and guide you, offering suggestions on setting reasonable guidelines. Only you can actually make the changes though, so no worries. Take the suggestions you like, and politely decline the ones you don't.
  </div>

  <div style="width:25%;float:right;background-color:#87B94D;color:white;padding:4px;">
    <p style="background-color:#E8B069;">
      Have questions?
      <?php echo link_to('Ask us!', '#') ?>
    </p>
    <br />
    <p>
      Finished Here?
      <?php echo link_to('Let\'s get started!', '@create_project_step1') ?>
  </div>

  <hr class="clear" />

<?php echo javascript_tag(nifty_round_elements( "div#project-information", "all normal" ) ) ?>