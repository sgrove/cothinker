<?php use_helper('Date', 'Number', 'I18N', 'Form', 'Javascript', 'Star', 'Global', 'sfFileGallery') ?>

<?php echo nav_tabs('project', $tab, $project); ?>

  <?php
  // Initialize the event calendar with two parameters
  // 1.) The style of the calendar (day, week, month, year)
  // 2.) Any date within the specified time period. The script will automatically determine the best calendar days to return.
  //     For example, if you choose "month" and pass 1/15/2006, the calendar will return all dates and events from 01/01/2006 - 01/31/2006.
  //     If you choose "week" and pass 1/18/2006, the calender will return all dates and events from 01/16/2006 - 01/22/2006.
  $c = new sfEventCalendar('month', date('Y-m-d')); // The style of the calendar, any date within the specified time period

  // Add an event to the calendar
  // You must enter a date for the calendar event.
  // You can enter as many options as you'd like that best fit your circumstances.
  // For example, i've passed a title, and url to the calendar.  
  // You can pass these, or any number of parameters you'd like to associate with the event

  foreach ($project->getTasks() as $task) {
    $c->addEvent(format_date($task->getFinish()), array('title' => $task->getName(), 'url' => '@show_task?project='.$project->getSlug().'&task='.$task->getUuid(), 'alt' => 'Task deadline approaching: "'.strip_tags($task->getDescription()).'"' ));
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
