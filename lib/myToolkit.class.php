<?php

class myToolkit
{
    public static function prepareTags($text)
    {
      return explode(',', trim(strip_tags($text)));
    }
    
    public static function stripText($text)
    {
      $text = strtolower($text);
   
      // strip all non word chars
      $text = preg_replace('/\W/', ' ', $text);
   
      // replace all white space sections with a dash
      $text = preg_replace('/\ +/', '-', $text);
   
      // trim dashes
      $text = preg_replace('/\-$/', '', $text);
      $text = preg_replace('/^\-/', '', $text);
   
      return $text;
    }
    
    public static function customUuid($length)
    {
      $uuid = '';
      
      while (strlen($uuid) != $length)
      {
        $uuid = substr(md5(uniqid(rand(), true)), 0, $length);
      }
      
      return $uuid;
    }
    
    public static function retrieveUserByEmail($email)
    {
      sfContext::getInstance()->getLogger()->info('checking to see if ['.$email.'] is a username...');
      $user = sfGuardUserPeer::retrieveByUsername($email);
      if ($user != null) return $user;
      
      sfContext::getInstance()->getLogger()->info('checking to see if ['.$email.'] is in any contacts...');
      $user = sfGuardUserProfilePeer::retrieveByEmail($email);
      if ($user != null) return $user->getsfGuardUser();
      
      return $user;
    }
    
    // Taken from "http://spindrop.us/2007/07/18/dynamically-adjusting-your-page-title-in-symfony/" 08-12-08
    public static function prependPageTitle($title)
    {
      $r = sfContext::getInstance()->getResponse();
      $d = sfConfig::get("app_site_title_delimiter");
      $t = sfConfig::get("app_site_title");
      $r->setTitle($t.$d.ucfirst($title), false);
    }
    
    // Taken from php.net: http://uk2.php.net/manual/en/function.fread.php#84115
    public static function dl_file_resumable($file, $is_resume=TRUE)
    {
        //First, see if the file exists
        if (!is_file($file))
        {
            return false;
        }

        //Gather relevent info about file
        $size = filesize($file);
        $fileinfo = pathinfo($file);

        //workaround for IE filename bug with multiple periods / multiple dots in filename
        //that adds square brackets to filename - eg. setup.abc.exe becomes setup[1].abc.exe
        $filename = (strstr($_SERVER['HTTP_USER_AGENT'], 'MSIE')) ?
                      preg_replace('/\./', '%2e', $fileinfo['basename'], substr_count($fileinfo['basename'], '.') - 1) :
                      $fileinfo['basename'];

        $file_extension = strtolower($path_info['extension']);

        //This will set the Content-Type to the appropriate setting for the file
        switch($file_extension)
        {
            case 'exe': $ctype='application/octet-stream'; break;
            case 'zip': $ctype='application/zip'; break;
            case 'mp3': $ctype='audio/mpeg'; break;
            #case 'mpg': $ctype='video/mpeg'; break;
            #case 'avi': $ctype='video/x-msvideo'; break;
            default:    $ctype='application/force-download';
        }

        //check if http_range is sent by browser (or download manager)
        if($is_resume && isset($_SERVER['HTTP_RANGE']))
        {
            list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);

            if ($size_unit == 'bytes')
            {
                //multiple ranges could be specified at the same time, but for simplicity only serve the first range
                //http://tools.ietf.org/id/draft-ietf-http-range-retrieval-00.txt
                list($range, $extra_ranges) = explode(',', $range_orig, 2);
            }
            else
            {
                $range = '';
            }
        }
        else
        {
            $range = '';
        }

        //figure out download piece from range (if set)
        list($seek_start, $seek_end) = explode('-', $range, 2);

        //set start and end based on range (if set), else set defaults
        //also check for invalid ranges.
        $seek_end = (empty($seek_end)) ? ($size - 1) : min(abs(intval($seek_end)),($size - 1));
        $seek_start = (empty($seek_start) || $seek_end < abs(intval($seek_start))) ? 0 : max(abs(intval($seek_start)),0);

        //add headers if resumable
        if ($is_resume)
        {
            //Only send partial content header if downloading a piece of the file (IE workaround)
            if ($seek_start > 0 || $seek_end < ($size - 1))
            {
                header('HTTP/1.1 206 Partial Content');
            }

            header('Accept-Ranges: bytes');
            header('Content-Range: bytes '.$seek_start.'-'.$seek_end.'/'.$size);
        }

        //headers for IE Bugs (is this necessary?)
        //header("Cache-Control: cache, must-revalidate");  
        //header("Pragma: public");

        header('Content-Type: ' . $ctype);
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: '.($seek_end - $seek_start + 1));

        //open the file
        $fp = fopen($file, 'rb');
        //seek to start of missing part
        fseek($fp, $seek_start);

        //start buffered download
        while(!feof($fp))
        {
            //reset time limit for big files
            set_time_limit(0);
            print(fread($fp, 1024*8));
            flush();
            ob_flush();
        }

        fclose($fp);
        exit;
    }
}