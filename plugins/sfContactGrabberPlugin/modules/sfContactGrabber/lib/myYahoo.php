<?php

class Yahoo{

  function getAddressbook($login,$password)
  {
    // Initializing Class
    $yahoo  = new GrabYahoo();

    /*
    Setting the desired Service
      1. addressbook => Used to grab Yahoo! Address Book
      2. messenger => Used to grab Yahoo! Messenger List
      3. newmail => Used to grab number of new Yahoo! mails
      4. calendar => Used to grab Yahoo! Calendar entries
    */
    $yahoo->service = "addressbook";

    /*
    Set to true if HTTP proxy is required to browse net
      - Setting it to true will require to provide Proxy Host Name and Port number
    */
    $yahoo->isUsingProxy = false;

    // Set the Proxy Host Name, isUsingProxy is set to true
    $yahoo->proxyHost = "";

    // Set the Proxy Port Number
    $yahoo->proxyPort = "";

    // Set the location to save the Cookie Jar File
    $yahoo->cookieJarPath = $_SERVER['DOCUMENT_ROOT'] . sfConfig::get('app_sfContactGrabber2Plugin_cookie_path', 'GrabYahoo1.4');

    /*
    Execute the Service
      - Require to pass Yahoo! Account Username and Password
    */
    $yahooList = $yahoo->execService($login, $password);

    /*
    Printing new mail status
      - True (1) if there is new mail(s)
      - False (0) if there is no new mail
    */
    //$newMailStatus  = $yahoo->getNewMailStatus();
    //echo $newMailStatus;

    // return errors if there were any, else return what we asked for.
    if($yahoo->errorInfo != ""){
      return $yahoo->errorInfo;
    }else{
      // make the yahoo contact information conform.
      $yahooList = $this->array_change_key_name( "E-mail Address", 'email', $yahooList );
      return $this->array_change_keys_name( 'First Name', 'Last Name', 'name', $yahooList );
    }

    function dump($var)
    {
      echo "<pre>";
        print_r($var);
      echo "</pre>";
    }
  }

  // change one key name into another
  function array_change_key_name( $orig, $new, &$array )
  {
    foreach ( $array as $k => $v )
        $return[ $k === $orig ? $new : $k ] = ( is_array( $v ) ? $this->array_change_key_name( $orig, $new, $v ) : $v );
    return $return;
  }

  // put key one and key two into the new third key.
  function array_change_keys_name( $part1, $part2, $new, &$array )
  {
    foreach ( $array as $k => $v )
      $array[$k][$new] = $v[$part1] . " " . $v[$part2];
    return $array;
  }

}