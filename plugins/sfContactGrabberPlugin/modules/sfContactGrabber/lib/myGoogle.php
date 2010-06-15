<?php

class Gmail{

  function getAddressbook($gmail_acc, $gmail_pwd){

    $my_timezone = 0;
    $gmailer = new GMailer();
    if ($gmailer->created) {
      $gmailer->setLoginInfo($gmail_acc, $gmail_pwd, $my_timezone);
      echo "Created gmailer obj...<br />";

      if ($gmailer->connect()) {
        echo 'connected with gmailer obj...<br />';
      // GMailer connected to Gmail successfully.
      // Do something with it.

      //Get the contacts
      // For "Inbox"

      $gmailer->fetchBox(GM_CONTACT, "all", "");
      $snapshot = $gmailer->getSnapshot(GM_CONTACT);

      //Outputs an array of the contacts
      return $snapshot;
      return $snapshot->contacts;
      //Outputs the number of contacts
      //var_dump($snapshot->contacts_total);

      } else {
        return $gmailer->lastActionStatus();
      }
    }
  }

}