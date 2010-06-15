<?php

  
  function checklists_tag($name, $options_array = null, $options = array())
  {
    $options = _convert_options($options);
    if (isset($options['multiple']) && $options['multiple'] && substr($name, -2) !== '[]')
	  {
	    $name .= '[]';
	  }
    
    $options['class'] = "checklist cl1";
    if (isset($options['style']))
    {
      $options['class'] = "checklist ".$options['style'];
    }
    
    $css_path = 'sfChecklistsPlugin/css/checklists.css';
    if (!is_readable(sfConfig::get('sf_web_dir').$css_path))
    {
      //throw new sfConfigurationException("Cannot find the specified css file: ".sfConfig::get('sf_web_dir').'/'.$css_path);
    }
    sfContext::getInstance()->getResponse()->addStylesheet($css_path);
	  
	  $js_path = javascript_path('sfChecklistsPlugin/checklists.js');
	  if (!is_readable(sfConfig::get('sf_web_dir').$js_path))
    {
      //throw new sfConfigurationException('You must install checklists.js to use this helper.');
    }
    sfContext::getInstance()->getResponse()->addJavascript($js_path);

    $option_tags = options_for_checklists($options_array, null, array('name'=>$name));
	  
    return content_tag('ul', $option_tags, array_merge(array('name' => $name, 'id' => $name), $options));
  }
  
  /*
        # Accepts a container (hash, array, enumerable, your type) and returns a string of option tags. Given a container
        # where the elements respond to first and last (such as a two-element array), the "lasts" serve as option values and
        # the "firsts" as option text. Hashes are turned into this form automatically, so the keys become "firsts" and values
        # become lasts. If +selected+ is specified, the matching "last" or element will get the selected option-tag.  +Selected+
        # may also be an array of values to be selected when using a multiple select.
        #
        # Examples (call, result):
        #   options_for_select([["Dollar", "$"], ["Kroner", "DKK"]])
        #     <option value="$">Dollar</option>\n<option value="DKK">Kroner</option>
        #
        #   options_for_select([ "VISA", "MasterCard" ], "MasterCard")
        #     <option>VISA</option>\n<option selected="selected">MasterCard</option>
        #
        #   options_for_select({ "Basic" => "$20", "Plus" => "$40" }, "$40")
        #     <option value="$20">Basic</option>\n<option value="$40" selected="selected">Plus</option>
        #
        #   options_for_select([ "VISA", "MasterCard", "Discover" ], ["VISA", "Discover"])
        #     <option selected="selected">VISA</option>\n<option>MasterCard</option>\n<option selected="selected">Discover</option>
        #
        # NOTE: Only the option tags are returned, you have to wrap this call in a regular HTML select tag.
  */
  function options_for_checklists($options = array(), $selected = '', $html_options = array())
  {
    $html_options = _parse_attributes($html_options);

    if (is_array($selected))
    {
      $valid = array_values($selected);
      $valid = array_map('strval', $valid);
    }

    $html = '';

    $i=0;
    foreach ($options as $key => $value)
    {
      $option_options = array('value' => $key);
      if (
          isset($selected)
          &&
          (is_array($selected) && in_array(strval($key), $valid, true))
          ||
          (strval($key) == strval($selected))
         )
      {
        $option_options['selected'] = 'selected';
      }
      $tagValue = $html_options['name'];
      $value = content_tag('label', checkbox_tag($tagValue,$key).$value, array("for"=>$tagValue) );

      $html .= content_tag('li', $value, ($i++%2)?array('class'=>'alt'):null)."\n";
    }

    return $html;
  }
?>