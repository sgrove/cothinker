<?php use_helper('Date', 'Form', 'Javascript', 'Global') ?>

<strong>Thank you for registering with Cothink:</strong> <br />

Click <a href="<?php echo 'http://'.$this->getContext()->getRequest()->getHost().url_for($user->getApprovalUrl()) ?>">here</a> to confirm your email address.<br /><br />

If the above link does not work, you can paste the following address into your browser:<br /><br />

<?php echo 'http://'.$this->getContext()->getRequest()->getHost().url_for($user->getApprovalUrl()) ?><br /><br />

We ask you to confirm your email address before actively participating in the Cothink community. You can have several email addresses, but we need one primary account to confirm your identity.<br /><br />

Regards,<br />
The Cothink Team<br />
<a href="http://www.cothink.org/">http://www.cothink.org/</a><br /><br />

© 2008, Cothink<br /><br />