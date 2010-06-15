<?php

class imgHandling
{
    public static function genThumbnail($mx, $my, $upload_dir, $fileName, $fileNameNew="")
    {
      try {
        if (!$fileNameNew) $fileNameNew = $fileName;
        $thumbnail = new sfThumbnail($mx, $my, false, true, 75, 'sfImageMagickAdapter', array('method' => 'shave_all'));
        $thumbnail->loadFile($upload_dir.$fileName);
        $thumbnail->save(sfConfig::get('sf_upload_dir').'/thumbnails/'.$fileNameNew, 'image/png');
      }
      catch (Exception $e)
      {}
    }
}