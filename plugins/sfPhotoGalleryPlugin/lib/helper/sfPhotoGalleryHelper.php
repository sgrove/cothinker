<?php
// Author: Alessio Piccioli <mailto:piccioli@netseven.it>
// Date: 2008/04

require_once(SF_ROOT_DIR.'/plugins/sfPhotoGalleryPlugin/lib/sfPhotoGalleryDefault.php');

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


function photo_link_to_add ($entity,$entity_id,$options=array()) {
  // Convert options string to option array
  if (is_string($options)) {
    $options=_convert_string_option($options);
  }

  $label = 'Add photo' ;

  // CUSTOMIZE LABEL TEXT
  if(isset($options['label'])) {
    $label=$options['label'];
  }
  
  // ICON
  if (isset($options['icon']) && $options['icon']=='true') {
    use_helper('sfIcon');
    $label=icon_tag('image_add').' '.$label;
  }

  $url="sfPhotoGallery/create?entity=$entity&entity_id=$entity_id";
  $url="@create_photo?entity=$entity&entity_id=$entity_id";
  // swicth link to with or without modalBox
  if (isset($options['modalbox']) && $options['modalbox']=='true') {
    use_helper('ModalBox');
    return m_link_to($label,$url, array('title' => 'upload photo')) ;
  }
  else {
    return link_to($label,$url) ;
  }
}


function photo_has_gallery($entity,$entity_id) {
  return sfPhotoGalleryPeer::hasGallery($entity,$entity_id);
}

function photo_thumbnail_tag($entity,$entity_id, $options = array()) {
  if (!is_array($options))
  {
    $options = array();
  }
  
  if (photo_has_gallery($entity,$entity_id)) {
    return image_tag('/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.sfPhotoGalleryPeer::getFirst($entity,$entity_id), $options);
  }
  
  return image_tag('nopicture.jpg', $options);
}

// TODO: Aggiungere terzo parametro options (array o stringa che si trasforma in array -> vedere se c'è qualcosa che già lo fa)
function photo_lightbox_slideshow($entity,$entity_id,$options=array()) {

  // Convert options string to option array
  if (is_string($options)) {
    $options=_convert_string_option($options);
  }

  use_helper('Lightbox');

  // Recupera l'array delle foto
  $images_raw=sfPhotoGalleryPeer::getLightboxArray($entity,$entity_id);

  if (count($images_raw)>0) {
    // TODO AGGIUNGERE IL THUMB
    foreach ($images_raw as $image_raw) {
      
      $image=array();
      $image['image']=image_path('/'.sfConfig::get('sf_upload_dir_name').'/photos/'.$image_raw['real_name']);
      $image['thumbnail']=image_path('/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.$image_raw['real_name']);
      $image['options']=$image_raw['options'];
      $images[]=$image;
    }

    $link_opt = array(
		      'title'     => $entity,
		      'slidename' => $entity.'_'.$entity_id,
		      );  

    // $label = icon_path('image_multi');
    $label = 'Gallery' ;

    // CUSTOMIZE LABEL TEXT
    if(isset($options['label'])) {
      $label=$options['label'];
    }
    
    // ICON
    if (isset($options['icon']) && $options['icon']=='true') {
      use_helper('sfIcon');
      $label=icon_path('image_multi');
    }

    return light_slide_image(
			     $label,
			     $images, 
			     $link_opt);
  }
  

  return '';
}

function photo_light_slide_thumb($entity,$entity_id) {

  use_helper('Lightbox');
  //require_once('../model/sfPhotoGalleryPeer.php');

  // Recupera l'array delle foto
  $images_raw=sfPhotoGalleryPeer::getLightboxArray($entity,$entity_id);

  if (count($images_raw)>0) {
    // TODO AGGIUNGERE IL THUMB
    foreach ($images_raw as $image_raw) {
      
      $image=array();
      $image['image']=image_path('/'.sfConfig::get('sf_upload_dir_name').'/photos/'.$image_raw['real_name']);
      $image['thumbnail']=image_path('/'.sfConfig::get('sf_upload_dir_name').'/thumbnails/'.$image_raw['real_name']);
      $image['options']=$image_raw['options'];
      $images[]=$image;
    }
    $link_opt = array(
		      'title'     => $entity,
		      'slidename' => $entity.'_'.$entity_id,
		      );  

    return light_slide_image(
			     $images[0]['thumbnail'],
			     $images, 
			     $link_opt);
  }

  return '';
}

function photo_get_photos($entity, $entity_id)
{
  // Retrieve the photos associated with the entity
  return sfPhotoGalleryPeer::getPhotos($entity,$entity_id);

}
?>
