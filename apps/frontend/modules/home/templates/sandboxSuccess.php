<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'sfIcon', 'Global', 'sfFileGallery', 'Object') ?>
<script type="text/javascript">
/* Optional this is to get notified when a video is posted */
function videoFromRecorder(videoUri, title, url_thumbnail,
  recState, hasTitle) {
    if($('cb_error').checked)
    {
      seesmic.player.setError('Please fill the name and email in the html page!')
      return
    }
    alert('videoUri ' + videoUri + ' title ' + title +
    ' thumbnail ' + url_thumbnail + ' recState ' + recState +
    ' hasTitle' + hasTitle)

    /**Third party developers can now refresh the page / close the recorder
    *  Third party developers can also use the data from videoFromRecorder
    *  and display them accordingly */
    return;
  }
  </script>

  <!-- use this style for opening  / closing of thumbnail -->
  <style type="text/css">
  .playerExample {
    margin-bottom: 12px;
  }
  .seePlayOverlay {
    width:50px !important;
    height:50px !important;
    float:left !important;
    padding-left:55px !important;
    padding-top:35px !important;
  }
  </style>

  <div>
       This example is to create a player.
     </div>
     <div class="playerExample">
       <form action="">
         <input type="button"
           onclick="seesmic.player.createPlayer($('playerHolder'), 'I3CFMk9wOo', false);"
           value="Show Player"/>
       </form>
       <div id="playerHolder">
         <!-- This is where the player will go -->
       </div>
     </div>
     <div>
       This example is to create a recorder.
     </div>
     <div class="recorderExample">
       <form action="">
         <input type="button"
           onclick="seesmic.player.createRecorder($('recorderHolder'), 'testsite', 'I3CFMk9wOo');"
           value="Show Recorder"/>
       </form>
       <div id="recorderHolder">
         <!-- This is where the recorder will go -->
       </div>
     </div>
     <div>
       This example is to create a player with thumbnail
     </div>
     <div class="playerExample">
       <div id='I3CFMk9wOo_preview'>
         <div>
           <a href="http://v.seesmic.com/video/I3CFMk9wOo"
             target="_blank" class="see_link">
             Re : Test
           </a>
         </div>
         <div style="display: block; width: 160px; height: 120px; border:none;
           background-image:url(http://t.seesmic.com/thumbnail/iqJS1MOPDN_th1.jpg);">
           <div id="I3CFMk9wOo_hide" class="seePlayOverlay" style="display:none;">
             <?php echo image_tag('stop_overlay.png', array('onclick' => 'seePlayVideo("I3CFMk9wOo",false)', 'width' => '50', 'height' => '50', 'style' => 'cursor:pointer; cursor:hand; border:none;', )) ?>
           </div>
           <div id="I3CFMk9wOo_show" class="seePlayOverlay">
             <?php echo image_tag('play_overlay.png', array('onclick' => 'seePlayVideo("I3CFMk9wOo",true)', 'width' => '50', 'height' => '50', 'style' => 'cursor:pointer; cursor:hand; border:none;', )) ?>
           </div>
         </div>
       </div>
       <div id="I3CFMk9wOo_content">
         <!-- This is where the player will go -->
       </div>
     </div>

     <div>
       This example is to create a recorder and that it will cause validation error
     </div>

     <div class="playerExample">
       <form action="">
         <input type="button"
           onclick="seesmic.player.createRecorder($('recorderHolder2'), 'testrc', 'I3CFMk9wOo');"
           value="Show Recorder"/>
       </form>
       <div id="recorderHolder2">
         <!-- This is where the recorder will go -->Will be replaced
       </div>
      <label for="cb_error"><input id="cb_error" value="1" checked="checked" type="checkbox">
</div>
<?php /*
<div class="project-positions">
<h1>Positions</h1>
  <?php foreach ($project->getPositions() as $position): ?>
    <div id="position_<?php echo $position->getUuid() ?>" style="margin: 10px;border:1px solid black;padding:10px;">
      <?php echo $position->getTitle() ?>
        <div id="milestone_list">
          <h3>Milestones for this position</h3>
          <?php echo include_partial('home/milestone_list', array('position' => $position)); ?>
          <br />
        </div>
      </div>
    <?php endforeach; ?>
</div>


<?php /* Drag-n-drop form editing template code, be sure to use
<?php
  $droppers = array();
  $droppers[] = array('image' => 'statusorb_g', 'title' => 'blog', 'description' => 'A blog widget to update readers');
  $droppers[] = array('image' => 'statusorb_r', 'title' => 'minifeed', 'description' => 'A widget containing all project activity');
  $droppers[] = array('image' => 'statusorb_g', 'title' => 'team', 'description' => 'A widget displaying project team members');
  $droppers[] = array('image' => 'statusorb_y', 'title' => 'openpositions', 'description' => 'A  widget advertising open positions');
  $droppers[] = array('image' => 'statusorb_y', 'title' => 'events', 'description' => 'A upcoming events widget');
?>


<div id="droppables" style="float:right;">
  <div style="height:20px">
    <p id="indicator" style="display:none">
      <?php echo image_tag('indicator.gif') ?> updating layout...
    </p>
  </div>

  <?php foreach ($droppers as $dropper): ?>
    <div id="<?php echo $dropper["title"] ?>_droppable" class="droppable">
      <?php echo image_tag($dropper["image"], array()) ?><?php echo $dropper["title"] ?>
      <p><?php echo $dropper["description"] ?></p>
    </div>
    <?php echo draggable_element($dropper["title"].'_droppable', array('revert' => true)) ?>
  <?php endforeach ?>
</div>

<?php echo include_partial('project/main_form_'.$project->getForm("main").'_edit', array('project' => $project, )); ?>

?>

<?php echo javascript_tag("
  function hide_blind_class(target)
  {
    myItems = $$('.'+target);
    myItems.each(function(el) { Element.hide(el); } )
  }

  function show_blind_class(target)
  {
    myItems = $$('.'+target);
    myItems.each(function(el) { Element.show(el); } )
  }
") ?>
<h1>Organize your To-do list</h1>
<h3><span id="hide_control"><?php echo link_to_function('Hide Completed', "hide_blind_class('markup');Element.hide('hide_control');Element.show('show_control')") ?></span><span id="show_control" style="display:none;"><?php echo link_to_function('Show Completed', "show_blind_class('markup');Element.hide('show_control');Element.show('hide_control')") ?></span></h3>
<ul id="order">
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Position-based milestones<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Position/project reports<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>User reputation system (karma)<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Expansion of 3rd party integration (email, twitter, rss, facebook)<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Letter of recommendation (form based, research appropriate questions)<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Project-creation redesign, along with project type-specific questions and explanations (software licenses plus explanation)<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Contracts implemented throughout site<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Video guides, walkthroughs, and text instructions. Need to find a consistent way to present the help. More prominent link to the FAQ. Perhaps user votable/editable FAQs.<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Drag-and-drop management of project page widgets, ties in with flexible form framework (cothink-designed templates<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Community management of projects - project waiting area ("pool", "edge", etc.), project voting<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Ability to "ally" projects, in order to link projects together that can benefit from one another<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Funding sources - integration with tipjoy, possibly donorschoose, initial research into grant and funding database connections for cothink projects<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Centralized forums for all to communicate. Need to find embeddable forum (gallery2?)<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Improved contact form<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Photo/audio/video/media gallery widget for projects<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Invite incentives. Track how many invites each user has successfully given out, and credit them in some way for spreading the word at the grassroots level<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>"Did you know" contest page, same as the bug request form.<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Groups - beginnings of the social networking/user classification and tracking functionality.<span class="markup">&lt;/li&gt;</span></li>
<li class="sortable"><span class="markup">&lt;li class="sortable"&gt;</span>Research into hostable solutions, white-label services<span class="markup">&lt;/li&gt;</span></li>

</ul>
<div id="feedback"></div>
<?php echo sortable_element('order', array(
  'url'    => 'home/sandbox2',
  'update' => 'feedback',
  'only'   => 'sortable',
)) ?>


<?php

 
/*
  if ($sf_user->isAuthenticated()) {
    $sf_user->getProfile()->notify('Hey, what\'s up there? Just checking out external notifications!');
  }
*/
/*
  $es = $sf_user->getProfile()->getExternalServices();
  if ($es->getTwitterConfirmed()) {
    
    echo "We got your twitter right here, ".$es->getTwitterUsername().'.<br /> Proceeding to connect...';
    
    $twitter = new TwitterService($es->getTwitterUsername(), $es->getTwitterPassword());
    
    echo "connection created.<br />Verifying credentials....";
    if ($twitter->simpleVerifyCredentials() == true) { echo "verified"; } else { echo "incorrect account credentials.";};
    echo "<br />";
    
    $response = $twitter->friendshipExists('cothink', $es->getTwitterUsername(), 'xml');
    echo "<br />Checking for friendship with Cothink....";
    
    if ($response->getData() == "true") { echo "exists";} else { echo "non-existant (sad, so sad)";}
    
    echo "<br />Following cothink....";
    
    $response = $twitter->follow('cothink');
    echo print_r($response->getData(), true);

    $response = $twitter->createFriendship('cothink');
    echo print_r($response->getData(), true);
        
    //if ($response["data"] == "false") { echo "ok"; } else { echo "not ok".$response["data"];}
    
    echo "<br />Attempting to send a direct message to cothink....";
    
    $response = $twitter->sendMessage('cothink', 'This is an automated test...kind of, anyway.');
    
    echo "done (".print_r($response, true).")";
    
    $twitter2 = new TwitterService(sfConfig::get('app_external_twitter_username'), sfConfig::get('app_external_twitter_password'));

    $response = $twitter2->verifyCredentials();
    echo "<hr />Vardump:<br />".var_dump($response->getData());
    echo "<hr />Verifying credentials....";
    
    if ($twitter2->simpleVerifyCredentials() == true) { echo "verified"; } else { echo "incorrect account credentials.";};
    echo '<br />';
    
    
    $response = $twitter2->follow($es->getTwitterUsername());
    echo print_r($response->getData(), true);

    $response = $twitter2->createFriendship($es->getTwitterUsername());
    echo print_r($response->getData(), true);
    
    $response = $twitter2->sendMessage($es->getTwitterUsername(), 'Hey, we\'re following each other now - exciting stuff! We\'ll include twitter updates from now on for you.');
    echo print_r($response->getData(), true);
  }
/*
 $twitter = new twitterService(sfConfig::get('app_external_twitter_username'), sfConfig::get('app_external_twitter_password'));
 
  try  
  {   
      // Gets the authenticated user's friends timeline in XML format  
      $response = $twitter->friendshipExists('sgrove', 'cothink', 'xml');  
    
      // Print the XML response  
      echo $response->getData();  
    
      // If Twitter returned an error (401, 503, etc), print status code  
      if($response->isError())  
      {  
          echo $response->http_code . "\n";  
      }  
  }  
  catch(Arc90_Service_Twitter_Exception $e)  
  {  
      // Print the exception message (invalid parameter, etc)  
      print $e->getMessage();  
  }



/*
echo print_r(myToolkit::isTwitterFollower('sgrove'), true).'<hr />';
myToolkit::sendTwitterUpdate('Another separate test of the api...general update');

echo $sf_user->getProfile()->getTwitterAccount().'<br /><hr />';
  if (myToolkit::sendDirectTwitterMsg($sf_user->getId(), 'Here\'s a nice little test of the newly integrated twitter functionality! Enjoy!'))
  {
    echo "Sent! Enjoy your new message!";
  }
  else
  {
    echo "<hr />Error, error! Abort!";
  }
/*
// The message you want to send
$message = 'Testing out the twitter API from within Cothink\'s site.';
// The twitter API address
$url = 'http://twitter.com/statuses/update.xml';
// Alternative JSON version
// $url = 'http://twitter.com/statuses/update.json';
// Set up and execute the curl process
$curl_handle = curl_init();
curl_setopt($curl_handle, CURLOPT_URL, "$url");
curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl_handle, CURLOPT_POST, 1);
curl_setopt($curl_handle, CURLOPT_POSTFIELDS, "status=$message");
curl_setopt($curl_handle, CURLOPT_USERPWD, "$username:$password");
$buffer = curl_exec($curl_handle);
curl_close($curl_handle);
// check for success or failure
if (empty($buffer)) {
    echo 'message';
} else {
    echo 'success';
}
?>

<?php /*
<h1>Draggable divs test</h1>
<div style="height:20px">
  <p id="indicator" style="display:none">
    <?php echo image_tag('indicator.gif') ?> updating cart...
  </p>
</div>

<?php echo link_to_remote('Add Product',array(
      'url'    => 'product/create?cid='.$category->getId(),
      'update' => 'product_add',
    'loading'  => "Element.show('indicator')",
      'complete' => "Element.hide('indicator');".visual_effect('highlight', 'product_add'),
    )) ?>

<div id="shopping_cart"> 
  <h2>Items:</h2>
  <div id="product_list">
    <?php foreach ($campuses as $campus): ?>
      <div id="<?php echo 'project_'.$campus->getUuid() ?>" class="draggable-widget campuses">
  	      <?php echo image_tag('statusorb_g', array()) ?><strong><?php echo $campus->getName() ?></strong>
      </div>
      <?php echo draggable_element('project_'.$campus->getUuid(), array('revert' => 'true')) ?>
    <?php endforeach; ?>
  </div>

  <div id="cart" class="cart" style="float:right;">
    <h2>Target:</h2>
    <div id="items">
      <?php include_partial('cart') ?>
    </div>
    <hr class="clear" />
  </div>

  <?php echo drop_receiving_element('cart', array(
    'update'     => 'items',
    'url'        => 'home/addItem',
    'accept'     => 'campuses',
    'script'     => 'true',
    'hoverclass' => 'cart-active',
    'loading'    => "Element.show('indicator')",
    'complete'   => "Element.hide('indicator')"
  )) ?>

  <hr class="clear" />

</div>
<hr class="clear" />
<?php /*echo $project->getTitle().': <br />' ?>

<?php
    echo "Project Created: ".format_date($project->getCreatedAt()).'<br />';
    echo "Unformatted: ".$project->getCreatedAt().'<br />';
    
    $dt2 = new sfDate(format_date($project->getCreatedAt()));
    echo $dt2->dump().'<br />';
    echo $dt2->addHour()->dump().'<br />';
    echo $dt2->tomorrow()->dump().'<br />';
    echo $dt2->tomorrow()->dump().'<br /><br />';

    //echo "Project Created (sfDateTime): ".$date;
    // defaults to now
    $dt = new sfDate();
    // accepts existing sfDate object
    //$dt = new sfDate($dt);
    // accepts a timestamp integer, like from time() or mktime()
    //$dt = new sfDate(1176856745);
    // parses date from a string using strtotime
    //$dt = new sfDate('2007-04-17 19:39:05');

    echo $dt->firstDayOfWeek()->tomorrow()->dump().'<br />';
    // => 2007-04-16 19:39:05
    echo $dt->addYear()->subtractQuarter()->dump().'<br />';
    // => 2008-01-16 19:39:05
    echo $dt->finalDayOfQuarter()->clearTime()->dump().'<br />';
    // => 2008-03-31 00:00:00
    echo $dt->finalDayOfYear()->subtractWeek(4)->addDay(5)->dump().'<br />';
    // => 2008-12-08 00:00:00
    echo $dt->reset()->dump().'<br />';
    // => 2007-04-17 19:39:05
    ?>
<h2>Project Tasks:</h2>
<table style="width:100%;">
  <thead>
    <th>
      Name
    </th>
    <th>
      Created
    </th>
    <th>
      Due
    </th>
    <th>
      Upcoming in <?php echo sfConfig::get('app_task_status_upcoming_days') ?> days?
    </th>
    <th>
      Status
    </th>
  </thead>
  <?php $tasks = $project->getSortedTasks('finish') ?>
<?php foreach ($tasks as $task): ?>
  <tr>
    <td>
      <?php echo '['.$task->getId().'] '.$task->getName().' ['.$task->getStatus().']' ?>
    </td>
    <td>
      <?php echo format_date($task->getCreatedAt()) ?>
    </td>
    <td>
      <?php echo format_date($task->getFinish()) ?>
    </td>
    <td>
      <?php 
      if ($task->getStatus() == sfConfig::get('app_task_status_upcoming'))
      {
        echo "Yes"; 
      } else { 
        echo "no"; } 
      ?>
    </td>
    <td>
      <?php echo ucfirst($task->getStatusInWords()) ?>
    </td>
  </tr>
<?php endforeach ?>
</table>
<?php /*
<?php include_partial("home/storage_div")?>

<?php $tab = $sf_params->get('tab') ?>
<?php if (!isset($tab)) $tab = 'create' ?>
  <div id="project-tabs">
    <ul>
	<?php echo nav_tabs('projects', $tab); ?>
    </ul>
  </div>

<ul style="list-style:horizontal;">
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('Instructions', '#') ?></strong></li>
  <li style="float:left;margin-right:5px;">1. Description</li>
  <li style="float:left;margin-right:5px;">2. Details</li>
  <li style="float:left;margin-right:5px;">3. Timeline</li>
  <li style="float:left;margin-right:5px;">4. Submit</li>
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
    <?php echo link_to('Let\'s get started!', '#') ?>
</div>

<hr class="clear" />
<hr />

<ul style="list-style:horizontal;">
  <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('1. Description', '#') ?></strong></li>
  <li style="float:left;margin-right:5px;">2. Details</li>
  <li style="float:left;margin-right:5px;">3. Timeline</li>
  <li style="float:left;margin-right:5px;">4. Submit</li>
</ul>
<hr class="clear" />

<h1>Start with some general info . . .</h1>

<?php echo form_tag('project/saveNew', array('class' => 'project-edit',)) ?>
  <div style="width:70%;float:left;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project Description</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;" >
          <?php echo label_for('department_id', 'Department'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?><br />
          <?php echo label_for('title', 'Project Title'), object_input_tag($project, 'getTitle', array ('style' => 'width:95%;')) ?>
          <?php echo label_for('description', 'Description'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
          <?php echo label_for('notes', 'Additional notes for your project'), object_textarea_tag($project, 'getNotes', array ('size' => '20x3',)) ?>
          <?php echo label_for('tags_as_text', 'Project tags (keywords)'), object_textarea_tag($project, 'getTagsAsText', array ('size' => '20x2',)) ?>
          <?php echo label_for('campus', 'Campus'), select_tag('campus', objects_for_select($campuses, 'getId', 'getName', '', array()), array('class'=>'xxx')) ?>
          <?php //echo label_for('goals', 'Project Goals'.image_tag('greenplus')), input_tag('goals[]', '', array ('style' => 'width:95%;')), image_tag('greenminus') ?>
        </fieldset>
        <hr class="clear" />
      </div>
    </div>
  </div>
  <div style="width:25%;float:right;">
    <div style="background-color:#87B94D;color:white;padding:4px;">
      <p style="background-color:#E8B069;">
        Have questions, or unsure about how to describe your project to catch attention?<br />
        <?php echo link_to('Cothink can help!', '#') ?>
      </p>
      <br />
      <p>
        Finished Here?
        <?php echo submit_tag('Let\'s go to the next step', array()) ?>
    </div>
  </div>
  <hr class="clear" />
</form>

<hr class="clear" />
<div id="comments">
  <h3>Community feedback on this page of your application</h3>
  No feedback yet! Feel free to ask though, everyone's way nice!
</div>

<hr class="clear" />
<hr />

<ul style="list-style:horizontal;">
  <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '#') ?></li>
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('2. Details', '#') ?></strong></li>
  <li style="float:left;margin-right:5px;">3. Timeline</li>
  <li style="float:left;margin-right:5px;">4. Submit</li>
</ul>
<hr class="clear" />

<h1>2. Let's get to the nitty-gritty . . .</h1>

<?php echo form_tag('project/saveNew', array('class' => 'project-edit',)) ?>
  <div style="width:70%;float:left;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project-Specific Details</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;" >
          <?php echo label_for('department_id', 'How long do you expect the project to last?'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?><br />
          <?php echo label_for('description', 'Will your project generate any profit, or intellectual property? If so, please explain.'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
          <?php echo label_for('notes', 'Is there any concerns over liability in your project? If so, please explain.'), object_textarea_tag($project, 'getNotes', array ('size' => '20x3',)) ?>
          <?php if (isset($hasSpecialNotes) && $hasSpecialNotes == true): ?>
            Here are some questions that are specific to projects in <?php echo $project->getCategory() ?>:
          <?php endif ?>
        </fieldset>
        <hr class="clear" />
      </div>
    </div>
  </div>
  <div style="width:25%;float:right;">
    <div style="background-color:#87B94D;color:white;padding:4px;">
      <p style="background-color:#E8B069;">
        This part could be a little bit harder.<br />
        <?php echo link_to('Want some help?', '#') ?>
      </p>
      <br />
      <p>
        Got it figured out?
        <?php echo submit_tag('Let\'s go to the next step', array()) ?>
    </div>
  </div>
  <hr class="clear" />
</form>

<div id="comments">
  <h3>Community feedback on this page of your application</h3>
  No feedback yet! Feel free to ask though, everyone's way nice!
</div>

<ul style="list-style:horizontal;">
  <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('2. Details', '#') ?></li>
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('3. Timeline', '#') ?></strong></li>
  <li style="float:left;margin-right:5px;">4. Submit</li>
</ul>
<hr class="clear" />

<h1>3. Finally, a little timeine . . .</h1>

<?php echo form_tag('project/saveNew', array('class' => 'project-edit',)) ?>
  <div style="width:70%;float:left;">
    <div class="blue-shadow"><div class="blue-title blue-content">Project-Specific Details</div></div>
    <div class="blue-shadow">
      <div class="blue-content">
        <fieldset style="border: medium none;" >
          <?php echo label_for('description', 'How long do you expect your project to last?'), object_textarea_tag($project, 'getDescription', array ('size' => '20x3',)) ?>
          <?php echo label_for('title', 'Do you prefer to work with students who are on a specific term-length?'), object_select_tag($project, 'getDepartmentId', array ('related_class' => 'Department', 'peer_method' => 'retrieveAlphabetical')) ?><br />
          <?php if (isset($hasSpecialNotes) && $hasSpecialNotes == true): ?>
            Here are some questions that are specific to projects in <?php echo $project->getCategory() ?>:
          <?php endif ?>
        </fieldset>
        <hr class="clear" />
      </div>
    </div>
  </div>
  <div style="width:25%;float:right;">
    <div style="background-color:#87B94D;color:white;padding:4px;">
      <p style="background-color:#E8B069;">
        This is a great place to get community input, form people who know how long projects take.<br />
        <?php echo link_to('Shall we get their input?', '#') ?>
      </p>
      <br />
      <p>
        Ready? Sure you are.
        <?php echo submit_tag('Let\'s finish this up', array()) ?>
    </div>
  </div>
  <hr class="clear" />
</form>


<div id="comments">
  <h3>Community feedback on this page of your application</h3>
  No feedback yet! Feel free to ask though, everyone's way nice!
</div>

<hr>

<ul style="list-style:horizontal;">
  <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('2. Details', '#') ?></li>
  <li style="float:left;margin-right:5px;"><?php echo link_to('3. Timeline', '#') ?></li>
  <li style="float:left;margin-right:5px;"><strong><?php echo link_to('4. Submit', '#') ?></strong></li>
</ul>
<hr class="clear" />

<h1>Submit your project for approval . . .</h1>
<div id="project-information" style="background-color:#87B94D;color:white;padding:4px;">
  <h2>Please read through our project-creation contract, it's really important. It involves you!</h2>
  <textarea name="name" rows="8" cols="40" style="width:100%;">
    Cothink Terms of Service

    1. ACCEPTANCE OF TERMS

    Cothink provides services to you subject to the following Terms of Service ("TOS"), which may be updated without notice; You can review the most current version of the TOS at any time at: http://www.cothink.org/home/tos.html.

    2. DESCRIPTION OF SERVICE

    Cothink currently provides users with centralized hosting of and access to "community projects" (the "Service"). Unless explicitly stated otherwise, any new features, including new features or resources, shall be subject to the TOS. Please be aware that certain areas on Cothink may deal with mature content. You must be at least 18 years of age to access and view such areas.

    3. REGISTRATION OBLIGATIONS

    In consideration of use of and access to the Service, you agree to:
    (a) provide true, accurate, current and complete information about yourself as prompted by the Service's registration form (such information being the "Registration Data") and
    (b) maintain and promptly update the Registration Data to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, not current or incomplete, or Cothink has reasonable grounds to suspect that such information is untrue, inaccurate, not current or incomplete, Cothink has the right to suspend or terminate your account and refuse any and all current or future use of the Service (or any portion thereof). You also understand and agree that the service may include certain communications from Cothink, such as service announcements, administrative messages and the Cothink Newsletter, though you will be able to opt out of receiving them.

  </textarea>
  Everything ready? Then...<br />
  <?php echo submit_tag('Submit your project for review', array()) ?><br />
  It should be reviewed within 24 hours, and we'll let you know by if there are any changes needed! Thank you again for using Cothink, we love seeing the community grow!
</div>

<hr class="clear" />
<hr />





<?php //echo link_to('download file', 'home/sandbox2') ?>
<?php /*
<?php echo javascript_tag("
  function hide_blind_class(target)
  {
    $$('.'+target).each(function(el) { Element.hide(el); });
  }
  
  function show_blind_class(target)
  {
    $$('.'+target).each(function(el) { Element.show(el); });
  }
") ?>


<div class="">
  <span id="hide_overdue_control"><?php echo link_to_function('Hide Overdue', "hide_blind_class('dynamic_status_overdue');hide_blind_class('dynamic_status_overdue_details');Element.hide('hide_overdue_control');Element.show('show_overdue_control')") ?></span><span id="show_overdue_control" style="display:none;"><?php echo link_to_function('Show Overdue', "show_blind_class('dynamic_status_overdue');Element.hide('show_overdue_control');Element.show('hide_overdue_control')") ?></span> |
  <span id="hide_completed_control"><?php echo link_to_function('Hide Completed', "hide_blind_class('dynamic_status_completed');hide_blind_class('dynamic_status_completed_details');Element.hide('hide_completed_control');Element.show('show_completed_control')") ?></span><span id="show_completed_control" style="display:none;"><?php echo link_to_function('Show Completed', "show_blind_class('dynamic_status_completed');Element.hide('show_completed_control');Element.show('hide_completed_control')") ?></span>
  
<?php $tasks = $project->getTasks() ?>
<table border="0" class="grspd-wave" style="width:100%;">
  <thead>
  <tr style="background-color:#87B94D;">
    <th>P</th>
    <th>Task</th>
    <th>Assigned to</th>
    <th>By</th>
    <th>Due on</th>
    <th>Status</th>
  </tr>
  </thead>
  <tbody>
  <?php $counter = 2; $direction = 1;?>
<?php foreach ($tasks as $task): ?>
  <?php if ($counter == 3 || $counter == 1) $direction = -1 * $direction; ?>
  <?php $counter = $counter + (1 * $direction) ?>
  <tr class="row-<?php echo $counter?> dynamic_status_<?php echo $task->getStatusInWords() ?>">
    <td class="task-status-<?php echo $task->getStatusInWords() ?>">&nbsp; </td>
    
    <td><?php echo link_to_function($task->getName(), visual_effect('toggle_blind', 'task-details-'.$task->getUuid(), array('duration' => '0.5'))) ?> (<?php echo link_to('Details', 'project/showTask?task='.$task->getUuid()) ?>)</td>
    <td><?php $t_user = $task->getSingleUser(); if ($t_user == null) {
      echo "Unassigned";
    }
    else
    {
     echo $task->getSingleUser('user')->getProfile()->getFullName();
    } ?></td>
    <td><?php echo $task->getsfGuardUser()->getProfile()->getFullName() ?></td>
    <td><?php echo format_date($task->getFinish()) ?></td>
    <td><?php echo $task->getStatusInWords() ?></td>
  </tr>
  <tr id="task-details-<?php echo $task->getUuid() ?>" style="display:none;" class="dynamic_status_<?php echo $task->getStatusInWords() ?>_details">
    <td>
      &nbsp;
    </td>
    <td colspan="5">
  		<p>
  		  <?php echo ucfirst($task->getPriorityInWords()) ?> Priority<br />
  		</p>
  		<p>
  		    <?php echo short_string($task->getDescription(), 320) ?>
  		</p>
  		<p>
          <?php echo icon_tag('comment').' '.$task->getNbComments().' Comments ',
                      icon_tag('folder').' '.get_nb_files('Task', $task->getId()).' Files '; if ($sf_user->isAuthenticated() && $project->hasPermission('create-task', $sf_user->getId())) { echo icon_tag('note_edit').' '.link_to('Edit Task', 'tasks/edit?task='.$task->getUuid()).' '.icon_tag('note_remove').' '.link_to('Delete Task', 'tasks/delete?task='.$task->getUuid(), 'post=true&confirm=Are you sure you want to delete the task "'.$task->getName().'"?'); } ?>
  		</p>
  	</td>
  </tr>
<?php endforeach ?>
</tbody>
</table>
</div>
<?php /*
// Taken from the php.net comments on preg_replace
function AddBB($var) {
        $search = array(
                '/\[b\](.*?)\[\/b\]/is',
                '/\[i\](.*?)\[\/i\]/is',
                '/\[u\](.*?)\[\/u\]/is',
                '/\[img\](.*?)\[\/img\]/is',
                '/\[link\](.*?)\[\/link\]/is',
                '/\[link\=(.*?)\](.*?)\[\/link\]/is'
                );

        $replace = array(
                '<strong>$1</strong>',
                '<em>$1</em>',
                '<u>$1</u>',
                '<img src="$1" />',
                '<a href="$1">$1</a>',
                '<a href="'.url_for("$1").'">$2</a>'
                );

        $var = preg_replace ($search, $replace, $var);
        return $var;
}
 ?>
 
<?php $text = 'This is a test of the automated linking system: [link=@homepage]test[/link]' ?>

Test text: <?php echo $text ?><br />
<br />
Processed: <?php echo AddBB($text) ?>
<?php /*
// Initialize the event calendar with two parameters
// 1.) The style of the calendar (day, week, month, year)
// 2.) Any date within the specified time period. The script will automatically determine the best calendar days to return.
//     For example, if you choose "month" and pass 1/15/2006, the calendar will return all dates and events from 01/01/2006 - 01/31/2006.
//     If you choose "week" and pass 1/18/2006, the calender will return all dates and events from 01/16/2006 - 01/22/2006.
$c = new sfEventCalendar('month', '2008-06-01'); // The style of the calendar, any date within the specified time period

// Add an event to the calendar
// You must enter a date for the calendar event.
// You can enter as many options as you'd like that best fit your circumstances.
// For example, i've passed a title, and url to the calendar.  
// You can pass these, or any number of parameters you'd like to associate with the event
$c->addEvent('06/15/2008', array('title' => 'Doctor Appointment', 'url' => '/module/action?id=1', 'alt' =>'See your doctor'));

$todos = $profile->getTodos();
$tasks = $todos['tasks'];
$todos = $todos['todos'];

foreach ($tasks as $task) {
  echo $task->getName().'<br />';
  $c->addEvent(format_date($task->getFinish()), array('title' => $task->getName(), 'url' => '@show_task?project='.$project->getSlug().'&task='.$task->getUuid(), 'alt' => 'Upcoming deadline for task "'.$task->getName().'"' ));
}
echo "<hr />";
foreach ($todos as $todo) {
  echo $todo->getName().':'.format_date($todo->getFinish()).'<br />';
  $c->addEvent(format_date($todo->getFinish()), array('title' => $todo->getName(), 'url' => '@show_todo?user='.$todo->getsfGuardUser()->getProfile()->getUuid().'&todo='.$todo->getSlug(), 'alt' => 'Upcoming deadline for personal todo "'.$todo->getName().'"' ));
}
// Return an array of calendar dates with the events attached to them.
// You can use this array to formulate a calendar in any way you'd like. 
// The array automatically breaks years into months and months into weeks, etc...
$calendar = $c->getEventCalendar();
?>

<table style="width:100%;">
  <thead>
    <tr>
      <th><?php echo __('Monday') ?></th>
      <th><?php echo __('Tuesday') ?></th>
      <th><?php echo __('Wednesday') ?></th>
      <th><?php echo __('Thursday') ?></th>
      <th><?php echo __('Friday') ?></th>
      <th><?php echo __('Saturday') ?></th>
      <th><?php echo __('Sunday') ?></th>
    </tr>
  </thead>
  
  <tbody>
  <?php
  foreach ($calendar as $week)
  {  
    ?>
    <tr>
      <?php
      foreach ($week as $day => $events)
      {
        echo ($day == date('Y-m-d')) ? '<td id="calendar-today">' : '<td class="calendar-day">';
        
          echo '<div class="">' . date('d', strtotime($day)) . '</div>';
          if (!empty($events))
          {
            foreach ($events as $event)
            {
              ?><p><?php echo link_to_if(isset($event['url']), $event['title'], $event['url'], array('title' => $event['alt'])); ?></p><?php
            }
          }
          ?>
        </td>
        <?php
      }
      ?>
    </tr>
    <?php
  }
  ?>
  </tbody>
</table>

<hr class="clear" />
<?php /*
<img src="<?php echo url_for('@gantt_chart?project='.$project->getSlug().'&title=progress') ?>" />

<hr class="clear" />
<?php //echo phpinfo() ?>
<?php /*
<h2>Managing resources for <em><?php echo $project->getTitle() ?></em></h2>
Navigation and Tags
<div class="resource-manager-panel1" style="width:30%;float:left;" id="wtf">
    <div id="indicator" style="display: none"></div>
    <ul>
        <li id="entry-1">
            <?php echo link_to_function('Tasks', visual_effect('toggle_blind', 'subentry-1', array('duration' => '0.5')), array('class' => 'header')) ?>
            <ul id="subentry-1">
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
            <ul id="subentry-2">
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
            <ul id="subentry-3">
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

<?php /*foreach($user->getProfile()->getPhotos() as $photo): ?>
<div>
    <?php echo image_tag('/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.$photo->getUuid().'.'.$photo->getSuffix()) ?>
</div>
<?php endforeach; ?>
      */ ?>

<?php /*
<?php //if ( photo_has_gallery('entity',$entity->getId() ) ?>
<?php echo '/'.sfConfig::get('sf_upload_dir_name').'/photos/' ?><br />
<?php echo $user.':'.photo_link_to_add('User',$user->getId(),array('label' => 'Upload Picture', 'icon' => true, 'modalbox' => true)) ?> <br />
<?php echo 'thumbnail:'.photo_thumbnail_tag('User',$user->getId()) ?><hr />


      *
<?php echo photo_lightbox_slideshow('User',$user->getId(),$options=array('icon' => true)) ?>
<?php $project = ProjectPeer::retrieveBySlug('cothink_next_gen_social_collaboration_platform'); ?>

[<?php echo $project->getTitle() ?>]
Creating groups....<br />
<?php //$project->createDefaultPermissions() ?>Done!<br />
Adding you to admin group....
<?php if ($sf_user->isAuthenticated()) {
    if ($project->addUserToGroup($sf_user->getId(), 'admins'))
    {
        echo 'Done!';
    }
    else
    {
        echo "Couldn't add you to the group...";
    }
}
?>
TODO: Find a way to sync the permissions groups found in the fixtures with regenerated uuids when using propel-load-data
      
<?php /*
<h1 style="color: white; background-color: green;">Project Information</h1>
<div class="project-main-header">
	<?php echo image_tag('nopicture.jpg', array('class' => 'primary')) ?>
	<h1>National Campaign for Chemical Warning Reform</h1>
	<p>It's about time America realized that simply putting warnings on chemicals isn't enough to protect our most valuable resources: our fellow humans. We need to have nation-wide campaigns to educate children on the proper uses of chemicals, to make them more expensive to discourage recreational use, and start a pro-active de-licing campiagn. The last one isn't directly related, per se.</p>
	<div style="float: left; margin-right: 10px;">
		Department:<br />
		Updated:<br />
		Status:<br />
		Tags:<br />
	</div>
	<div>
		Chemistry<br />
		May 10th, 2012 at 6:10am (news)<br />
		Accepting applications (<?php echo link_to('Apply', '#') ?>)<br />
		<?php echo link_to('benevolent', '#') ?> <?php echo link_to('caring', '#') ?> <?php echo link_to('bashful', '#') ?>
	</div>
        <div style="float: right; right:10px; bottom: 10px;display:inline;">
          <span>Favorite <?php echo link_to_star($project, array()) ?></span> | <span>Subscribe <?php echo link_to(image_tag('rss', array('class' =>'rss')), '#') ?></span>
        </div>
</div>

<div class="news">
<h1>News</h1>
		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Site going down</h3>
			<h4>Anon Admin on Feb 10th, 2016 at 2:30pm</h4>
		</div>

		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>

		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Site going down</h3>
			<h4>Anon Admin on Feb 10th, 2016 at 2:30pm</h4>
		</div>

		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>
<?php echo link_to(__("More news"), '#', array('class' => 'big-blue-link')) ?>
</div>

<div class="project-mini-update">
<h1>Recent Activity</h1>
		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Completed Task: Map Sea Monkey Genome</h3>
			<h4>team_member_1 on Feb 11th, 2016 at 2:30pm</h4>
		</div>

		<p>Assignment Details: Map the sea monkey genome to determin whether or not it should lose its monkey status.</p>
		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Completed Task: Map Sea Monkey Genome</h3>
			<h4>team_member_1 on Feb 11th, 2016 at 2:30pm</h4>
		</div>

		<p>Assignment Details: Map the sea monkey genome to determin whether or not it should lose its monkey status.</p>
		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Completed Task: Map Sea Monkey Genome</h3>
			<h4>team_member_1 on Feb 11th, 2016 at 2:30pm</h4>
		</div>

		<p>Assignment Details: Map the sea monkey genome to determin whether or not it should lose its monkey status.</p>

</div>
<div style="clear:both;">
</div>



<?php /*
<div class="shcontainer">
	<?php echo image_tag('shineyheader2.gif') ?>
	<p>
		<?php echo __("Cothink is a place where professors and students can come together with their communities to manage projects for the betterment of the world - or at least GPA's.") ?><br />
	(<?php echo link_to('Take a video tour', '#', 'style="color:orange;font-weight:bold; 	"') ?>)
	</p>
</div>
<div id="cothink-steps">
	<h1>Let's get started</h1>
	<div class="cothink-steps" id="step-one">
		<h2>Search for your project</h2>
		<p>
			You can sort projects based on interest, subject, or even class!
		</p>
	</div>
	<div class="cothink-steps" id="step-two">
		<h2>Make a difference</h2>
		<p>
			After a quick application process for the project, join in and use your unique skills to help others.
		</p>
	</div>
	<div class="cothink-steps" id="step-three">
		<h2>Get a better grade</h2>
		<p>
			Use Cothink to auto-notify your professor, or directly print out detailed reports to turn in.
		</p>
	</div>
	<div class="cothink-steps" id="step-four">
		<h2>Explore Cothink</h2>
		<p>
		Cothink offers many innovative features. </p><p style="display:none;">, from permanent storage and free postage for your Letters of Recommendation to auto resume building, even automated migration of history to professional networking sites like LinkedIn.	 <?php echo link_to(__("More Cothink features"), '#') ?> In fact, Cothink has more features than you could shake a stick at. If you could find a stick anywhere nowadays. And assuming you wanted to shake it.
		</p>
	</div>
	<div id="cothink-signup-frontpage">
		<h1>Join Us</h1>
		<?php echo form_tag('home/sandbox') ?>
			<ul>
			<li>
				<label for="first_name">First Name</label><?php echo input_tag("first_name") ?><br />
				<label for="last_name">Last Name</label><?php echo input_tag("first_name") ?>
			</li>
			<li>
				<label for="password">Password</label><?php echo input_tag("first_name") ?><br />
				<label for="confirm">Confirm Password</label><?php echo input_tag("first_name") ?>

			</li>
			<li>
				<label for="email">Email</label><?php echo input_tag("first_name") ?><br />
				<label for="department">Department</label><?php echo input_tag("first_name") ?>
			</li>
			</ul>
			<div style="text-align:center;clear:both;">
				<?php echo submit_tag('Submit', array('class' => 'btn')) ?>
			</div>
		</form>
	</div>
</div>
<div id="cothink-featured">
	<h1>Featured Project</h1>
	<h3>Build Humanity's Future!</h3>
	<div class="featured-project-summary">
	<?php echo image_tag('nopicture.jpg') ?>
		<div style="float:left;margin-right:10px;">
		Owner: 	<br />
		Dep:	<br />
		Started:<br />
		Updated:<br />
		Status: <br />
		</div>
		<div>
			<?php echo link_to('saveyourworld', '#') ?> (savior)<br />
			Architecure<br />
			Jan 2nd, 2011<br />
			Today<br />
			Completed<br />
		</div>
		
		<div style="clear:both;"></div>
	</div>
	<div class="featured-project-description">
		<h2>Description</h2>
		<p>Discovered in 2011, 'Fat Bastard' is nearly upon us, while we have unfortunately stopped accepting aplicaitons for salvation, I would like to wish you all luck. Also, try to avoid becoming some kind of flesh-eating zombies or something while we're locked in the shelter. ther very last thing we want the doors opening to is a...<a href="#">cont.</a>
		</p>
		<br />
		<h2>Recent News <?php echo link_to(image_tag('rss'), '#') ?></h2>

		<div class="news-item-header">
			<?php echo image_tag('nopicture.jpg') ?>
			<h3>Site going down</h3>
			<h4>Anon Admin on Feb 10th, 2016 at 2:30pm</h4>
		</div>

		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>
		<p> Hey everyone....So the site's going to go down, you know impending comet dom and all that. It was really nice knowing you all, well those of you who knew me as more than Anon Admin. You will be missed. Special thanks to <?php echo link_to('drawyourworld', '#') ?> for securing a place for my family and I in one of the comet shelters.<br />Oh, and on the off chance the comet doesn't hit or destroy the earth, see you all in 10 years when the shelter doors open....no sooner, damned time locks.</p>
	</div>
</div>
<div>
	<div style="clear:both;">
		&nbsp;
	</div>
</div>
<?php /*
<div style="background-color:#36499d;color:white;">
  <div style="background-image:url(/cothink/web/images/shineyheader.gif);height:75px;width:333px;float:left;">test</div>
  <div>
        <strong><?php echo __("Cothink is a place where professors and students can come together with their communities to manage projects for the betterment of the world - or at least GPA's.") ?></strong>
        
  </div>
  <div class="clear-both">&nbsp;</div>
</div>
 test2
suggested code: 
<makk> srgrove, .container {display: inline-block;} .container {overflow: hidden; background: #009;} .container img {float: left;} .container p {margin-left: <widthOfImage>px;}
<makk> srgrove, .container {display: inline-block;} .container {display: block; overflow: hidden; background: #009;} .container img {float: left;} .container p {margin-left: <widthOfImage>px;}
 
<div class="clear-both">&nbsp;</div>
 */ ?>
<?php /*
Project: <?php echo $project->getTitle() ?>

Project History:
<ul>
  <?php foreach ($project->getHistory() as $event): ?>
    <li><?php echo $event->getTitle().' : '.$event->getText() ?></li>
  <?php endforeach ?>
</ul>
Adding History Event
<?php
  $group = $project->getHistoryGroup();
  $project->addHistoryEvent('Entry #'.($group->countHistoryEvents() + 1).' for project.', 'Just another entry.');
?>
<ul>
  <?php foreach ($project->getHistory() as $event): ?>
    <li><?php echo $event->getTitle() ?></li>
  <?php endforeach ?>
</ul>

Subscribing user:
<?php $sf_user->getProfile()->subscribeToHistory($project->getHistoryGroup()->getName()) ?> <br />

Your Relevant History:
<?php $events = $sf_user->getProfile()->getHistory(10); ?>
<ul>
  <?php foreach ($events as $event): ?>
    <li><?php echo $event->getTitle().' : '.$event->getText() ?></li>
  <?php endforeach ?>
</ul>
*/
?>

<?php /*
  <div>
    Your groups and permisions:<br />
    <?php if ($sf_user->isAuthenticated()): ?>
      <?php $user = $sf_user; echo $user; ?>:<br />
      <?php foreach ($user->getGroups() as $group): ?>
        <?php echo $group->getName() ?>: <?php echo $group->getDescription() ?>
      <?php endforeach ?>
      <br />
      Permissions (<?php echo count($user->getAllPermissions()) ?>):<br />
      <?php foreach ($user->getAllPermissions() as $permission): ?>
        <?php echo $permission->getName() ?>: <?php echo $permission->getDescription() ?><br />
      <?php endforeach ?>  
    <?php endif; ?>
  </div>
  <div class="clear-both">
<br />
<h1>Attempting to refresh Credentials...</h1>
<?php $sf_user->refreshCredentials() ?>
  <div>
    Your <strong>new</strong> groups and permisions:<br />
    <?php if ($sf_user->isAuthenticated()): ?>
      <?php $user = $sf_user; echo $user; ?>:<br />
      <?php foreach ($user->getGroups() as $group): ?>
        <?php echo $group->getName() ?>: <?php echo $group->getDescription() ?>
      <?php endforeach ?>
      <br />
      Permissions (<?php echo count($user->getAllPermissions()) ?>):<br />
      <?php foreach ($user->getAllPermissions() as $permission): ?>
        <?php echo $permission->getName() ?>: <?php echo $permission->getDescription() ?><br />
      <?php endforeach ?>  
    <?php endif; ?>
  </div>
  <div class="clear-both">
*/ ?>
<?php /*
Group:<br />
<?php echo $group->getName() ?><br />
<?php echo $group->getDescription() ?><br />
Group Permissions:<br />
<?php foreach ($group->getsfGuardGroupPermissions() as $permission): ?>
  #. <?php echo $permission->getsfGuardPermission()->getName() ?><br />
<?php endforeach ?>
<hr>
Users In Group:<br />
<?php //$sf_user->addGroupByName('Test group for mass orgy') ?>
<?php foreach($group->getsfGuardUserGroupsJoinsfGuardUser() as $user): ?>
  <?php echo ''.$user->getSfGuardUser() ?>:<br />
  Permissions (<?php echo count($user->getSfGuardUser()->getAllPermissions()) ?>):<br />
  <?php foreach ($user->getSfGuardUser()->getAllPermissions() as $permission): ?>
    #. <?php echo $permission->getName() ?><br />
  <?php endforeach ?>
<?php endforeach ?>
*/ ?>
<?php /*
Culture: <?php echo $tculture ?><br /><br />

Culture2: <?php echo $sf_user->getCulture() ?><br /><br />

Date: <?php echo format_date(time()) ?><br /><br />

Date Time: <?php echo format_datetime(time()) ?><br /><br />
 
Number: <?php echo format_number(12000.10) ?><br /><br />
 
Currency: <?php echo format_currency(1350, 'USD') ?><br /><br />

Country: <?php echo format_country('US') ?><br /><br />
 
Language: <?php echo format_language('en') ?><br /><br />
 
Date Input: <?php echo input_date_tag('birth_date', mktime(0, 0, 0, 9, 14, 2006)) ?><br /><br />

Country Select: <?php echo select_country_tag('country', 'US') ?><br /><br />

strtotime-1: <?php echo date('m/d/Y', strtotime('4-3-2008')) ?><br /><br />
strtotime-2: <?php echo date('F d, Y', strtotime('4-3-2008')) ?>
<hr>
*/
?>
