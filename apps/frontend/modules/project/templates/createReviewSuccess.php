  <?php
// auto-generated by sfPropelCrud
// date: 2008/04/03 03:08:20
?>
<?php use_helper('Object', 'Global', 'Project') ?>

<?php include_partial("home/storage_div")?>

<?php echo nav_tabs('projects', $tab); ?>

  <ul style="list-style:horizontal;">
    <li style="float:left;margin-right:5px;"><?php echo link_to('Instructions', '#') ?></li>
    <li style="float:left;margin-right:5px;"><?php echo link_to('1. Description', '@create_project_step1?id='.$project->getUuid()) ?></li>
    <li style="float:left;margin-right:5px;"><?php echo link_to('2. Details', '@create_project_step2?id='.$project->getUuid()) ?></li>
    <li style="float:left;margin-right:5px;"><?php echo link_to('3. Timeline', '@create_project_step3?id='.$project->getUuid()) ?></li>
    <li style="float:left;margin-right:5px;"><strong>4. Submit</strong></li>
  </ul>
  <hr class="clear" />

  <h1>Submit your project for approval . . .</h1>
  <h2><?php echo link_to('Click here to preview your project', 'project/previewApplication?id='.$project->getUuid()) ?>
  <div id="project-information" style="background-color:#87B94D;color:white;padding:4px;">
    <?php echo form_tag('@create_project_save_submit?id='.$project->getUuid(), array()) ?>
      <?php echo input_hidden_tag('id', $project->getUuid(), array()) ?>
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
    <div style="text-align:center;">
      <?php echo submit_tag('I agree to the Terms of Service. Submit my project for review', array()) ?><br />
      It should be reviewed within 24 hours, and we'll let you know by if there are any changes needed!<br /> Thank you again for using Cothink, we love seeing the community grow!
    </div>
    </form>
  </div>
  
  <hr class="clear" />