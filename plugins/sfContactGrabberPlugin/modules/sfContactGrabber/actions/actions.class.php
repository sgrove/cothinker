<?php

/* sfContactGrabber
*
*  Written by Adam Tombleson - rekarnar@gmail.com
*
*  Losely based on code by Asif Ali Muhammad - asifali.mohd@gmail.com
*
*  His notes:
*
*   I am using the third party librarier for grabbing the address book
*   and just converted that in to as standalone symfony plugin
*   The original contact grabber library cab be downloaded from the followinf link
*   http://www.phpclasses.org/browse/package/3895.html
*
*
*/


class sfContactGrabberActions extends sfActions
{

  public function executeGetAddressBook()
  {

    $username = $this->getRequestParameter('addressBookUsername');
    $password = $this->getRequestParameter('addressBookPassword');
    $domain   = $this->getRequestParameter('domain');

    $this->setTemplate('contactGrabber');

    switch($domain){
      case 'yahoo'   : $obj = new Yahoo(); break;
      case 'gmail'   : $obj = new Gmail(); break;
      case 'myspace' : $obj = new myspace(); break;
      default : return sfView::ERROR; break;
    }

    $this->contacts = $obj->getAddressbook($username,$password);

    if(!is_array($this->contacts)){
      $this->error = $this->contacts == "" ? "No contacts were found" : $this->contacts;
      return sfView::ERROR;
    }



  }
}
