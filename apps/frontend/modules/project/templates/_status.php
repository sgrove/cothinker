<?php use_helper('Number', 'I18N', 'Date')?>
<div>
  <span>
    <?php echo format_number_choice(
      '[0]Complete|[1]Cancelled|[2]Pending approval|[3]In progress|(3,+Inf]Unknown status code', '', $project->getStatus()
      )
        ?>
  </span>
<?php /*
  <div>
    <span>
          <?php echo format_number_choice(
      '[0]this project is no longer accepting applications.|[1]this project has received enough applications and is currently reviewing them.|[2]this project is currently accepting applications.|(2,+Inf]Unknown status code.', '', $project->getApplications()
      )
        ?>
    </span>
	</div>
 */ ?>
</div>
