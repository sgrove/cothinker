<?php
// Author: Alessio Piccioli <mailto:piccioli@netseven.it>
// Date: 2008/04

// function used to convert option string (key1=value1 key2=value2 ...)
// in aray array(key1=>value1,key2=>value2,...)
function _convert_string_option ($str) {
  $ar = explode (' ',$str);
  $ret = array() ;
  foreach ($ar as $elem) {
    $vals=explode('=',$elem) ;
    $ret[$vals[0]]=$vals[1];
  }
  return $ret;
}


function file_link_to_add ($entity,$entity_id,$options=array()) {
  // Convert options string to option array
  if (is_string($options)) {
    $options=_convert_string_option($options);
  }

  $label = 'Add file' ;

  // CUSTOMIZE LABEL TEXT
  if(isset($options['label'])) {
    $label=$options['label'];
  }
  
  // ICON
  if (isset($options['icon']) && $options['icon']=='true') {
    use_helper('sfIcon');
    $label=icon_tag('folder_add').' '.$label;
  }

  $url="files/create?entity=$entity&entity_id=$entity_id";
  // swicth link to with or without modalBox
  if (isset($options['modalbox']) && $options['modalbox']=='true') {
    use_helper('ModalBox');
    return m_link_to($label,$url) ;
  }
  else {
    return link_to($label,$url) ;
  }
}


function file_has_gallery($entity,$entity_id) {
  return sfFileGalleryPeer::hasGallery($entity,$entity_id);
}

function file_download_tag($entity,$entity_id, $options = array()) {
  if (!is_array($options))
  {
    $options = array();
  }
  
  if (photo_has_gallery($entity,$entity_id)) {
    return image_tag('/'.sfConfig::get('sf_upload_dir_name').'/files/'.sfFileGalleryPeer::getFirst($entity,$entity_id), $options);
  }
  
  //return "no files";
}

function get_nb_files($entity, $entity_id)
{
  return sfFileGalleryPeer::getNbFiles($entity, $entity_id);
}

?>
