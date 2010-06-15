<?php

class TwitterService extends Arc90_Service_Twitter
{
  public function simpleVerifyCredentials()
  {
    try
    { 
      $response = $this->verifyCredentials();

        // If Twitter returned an error (401, 503, etc), print status code
        if($response->isError())
        {
            return false;
        }
        
        $response = json_decode($response->getData(), true);
        return $response["authorized"];
    }
    catch(Arc90_Service_Twitter_Exception $e)
    {
        // Print the exception message (invalid parameter, etc)
        //print $e->getMessage();
        return false;
    }
  }
}