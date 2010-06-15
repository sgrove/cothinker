<?php echo form_tag('sfContactGrabber/getAddressBook'); ?>

  <table border="0" align="center" cellpadding="2" cellspacing="0">
    <tr><td colspan="3" align="center">Enter login details to fetch your contacts</td></tr>
    <tr><td>Username</td><td colspan="2"> <?php echo input_tag('addressBookUsername' , '')?></td></tr>
    <tr><td>Password</td><td colspan="2"> <?php echo input_password_tag('addressBookPassword' , '')?></td></tr>
    <tr><td colspan="3">
      <?php echo radiobutton_tag('domain' , 'yahoo', true); ?>
      <?php echo image_tag('/sfContactGrabberPlugin/images/yahoo.jpg', array('alt' => 'Yahoo' , 'title' => 'Yahoo'));?>
      <?php echo radiobutton_tag('domain' , 'gmail', false); ?>
      <?php echo image_tag('/sfContactGrabberPlugin/images/gmail.jpg', array('alt' => 'Gmail' , 'title' => 'Gmail'));?>
      <?php //echo radiobutton_tag('domain' , 'myspace', false); ?>
      <?php //echo image_tag('/sfContactGrabberPlugin/images/myspace.jpg', array('alt' => 'Myspace' , 'title' => 'Myspace'));?>
    </td></tr>
    <tr><td colspan="3"></td></tr>
    <tr><td colspan="3" align="center"><? echo submit_tag("Grab My AddressBook") ?></td></tr>
  </table>

</form>