<?php use_helper('Date', 'Form', 'Javascript', 'Global') ?>

<strong>We recently got a request from you to reset your password</strong> <br />

If you didn't request anything, please ignore this email.

Otherwise, click the link below, and you'll be able to reset your password:<br />
<a href="<?php echo 'http://'.$this->getContext()->getRequest()->getHost().'/cothink/web/user/resetPassword?user='.$uuid.'&token='.$token ?>">Reset Password</a><br /><br />

If the above link does not work, you can paste the following address into your browser:<br /><br />

<?php echo 'http://'.$this->getContext()->getRequest()->getHost().'/cothink/web/user/resetPassword?user='.$uuid.'&token='.$token ?><br /><br />

Regards,<br />
The Cothink Team<br />
<a href="http://www.cothink.org/">http://www.cothink.org/</a><br /><br />

© 2008, Cothink<br /><br />