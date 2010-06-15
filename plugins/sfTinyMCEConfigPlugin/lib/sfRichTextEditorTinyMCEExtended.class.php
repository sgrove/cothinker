<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfRichTextEditorTinyMCE implements the TinyMCE rich text editor.
 *
 * <b>Options:</b>
 *  - css - Path to the TinyMCE editor stylesheet
 *
 *    <b>Css example:</b>
 *    <code>
 *    / * user: foo * / => without spaces. 'foo' is the name in the select box
 *    .foobar
 *    {
 *      color: #f00;
 *    }
 *    </code>
 *
 * @package    symfony
 * @subpackage helper
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfRichTextEditorTinyMCE.class.php 3284 2007-01-15 19:05:48Z fabien $
 */
class sfRichTextEditorTinyMCEExtended extends sfRichTextEditor
{
  /**
   * Returns the rich text editor as HTML.
   *
   * @return string Rich text editor HTML representation
   */
  public function toHTML()
  {
    $options = $this->options;

    // we need to know the id for things the rich text editor
    // in advance of building the tag
    $id = _get_option($options, 'id', $this->name);

    // use tinymce's gzipped js?
    $tinymce_file = _get_option($options, 'tinymce_gzip') ? '/tiny_mce_gzip.php' : '/tiny_mce.js';

    // tinymce installed?
    $js_path = sfConfig::get('sf_rich_text_js_dir') ? '/'.sfConfig::get('sf_rich_text_js_dir').$tinymce_file : '/sf/tinymce/js'.$tinymce_file;
    if (!is_readable(sfConfig::get('sf_web_dir').$js_path))
    {
      throw new sfConfigurationException('You must install TinyMCE to use this helper (see rich_text_js_dir settings).');
    }

    sfContext::getInstance()->getResponse()->addJavascript($js_path);

    use_helper('Javascript');

    $tinymce_options = '';
    $style_selector  = '';

    // custom CSS file?
    if ($css_file = _get_option($options, 'css'))
    {
      $css_path = stylesheet_path($css_file);

      sfContext::getInstance()->getResponse()->addStylesheet($css_path);

      $css    = file_get_contents(sfConfig::get('sf_web_dir').DIRECTORY_SEPARATOR.$css_path);
      $styles = array();
      preg_match_all('#^/\*\s*user:\s*(.+?)\s*\*/\s*\015?\012\s*\.([^\s]+)#Smi', $css, $matches, PREG_SET_ORDER);
      foreach ($matches as $match)
      {
        $styles[] = $match[1].'='.$match[2];
      }

      $tinymce_options .= '  content_css: "'.$css_path.'",'."\n";
      $tinymce_options .= '  theme_advanced_styles: "'.implode(';', $styles).'"'."\n";
      $style_selector   = 'styleselect,separator,';
    }

    

    $config = sfConfig::get('sf_config_dir_name');
    $path = sfConfigCache::getInstance()->checkConfig($config.DIRECTORY_SEPARATOR.'tiny_mce.yml');
    $config = sfYaml::load($path);

    $culture = isset($config['culture']) ? $config['culture'] : sfContext::getInstance()->getUser()->getCulture();
    
    $mode = $config['options']['mode'];
    $plugins = implode(',', $config['options']['plugins']);
    $theme = $config['options']['theme'];
    $tbLocation = $config['options']['theme_settings']['theme_'.$theme.'_toolbar_location'];
    $tbAlign = $config['options']['theme_settings']['theme_'.$theme.'_toolbar_align'];
    $pathLocation = $config['options']['theme_settings']['theme_'.$theme.'_path_location'];

    $buttons = array();
    reset($config['options']['theme_settings']['buttons']);
    while ( ($key = key($config['options']['theme_settings']['buttons'])) !== null ) {
      $current = current($config['options']['theme_settings']['buttons']);

      $buttons[] = $key.': "'.implode(',',$current).'"';

      next($config['options']['theme_settings']['buttons']);
    }
    $buttons = implode(",\n", $buttons);

    $extendedValidElements = array();
    reset($config['options']['theme_settings']['extended_valid_elements']);
    while ( ($key = key($config['options']['theme_settings']['extended_valid_elements'])) !== null) {
      $current = current($config['options']['theme_settings']['extended_valid_elements']);

      $extendedValidElements[] = $key.'['.implode('|', $current).']';

      next($config['options']['theme_settings']['extended_valid_elements']);
    }
    $extendedValidElements = '"'.implode(",\n", $extendedValidElements).'"';

    $relativeUrls = $config['options']['relative_urls'] ? 'true' : 'false';
    $debug = $config['options']['debug'] ? 'true' : 'false';

    $tinymce_js = 'tinyMCE.init({';
    // Mode
    $tinymce_js .= "mode: '$mode'";
    // Language
    $tinymce_js .= ', language: "'.strtolower(substr($culture, 0, 2)).'"';
    // Elements
    $tinymce_js .= ', elements: "'.$id.'"';
    // Plugins
    if ($plugins) {
      $tinymce_js .= ', plugins: "'.$plugins.'"';
    }
    // Theme
    $tinymce_js .= ", theme: '$theme'";
    // Toolbar
    $tinymce_js .= ', theme_'.$theme.'_toolbar_location: "'.$tbLocation.'"';
    $tinymce_js .= ', theme_'.$theme.'_toolbar_align: "'.$tbAlign.'"';
    $tinymce_js .= ', theme_'.$theme.'_path_location: "'.$pathLocation.'"';
    // Buttons
    if ($buttons) {
      $tinymce_js .= ', '.$buttons;
    }
    // Extended Valid Elements
    $tinymce_js .= ', extended_valid_elements: '.$extendedValidElements;
    // Relative Urls
    $tinymce_js .= ', relative_urls: '.$relativeUrls;
    // Debug
    $tinymce_js .= ', debug: '.$debug;

    // Custom Options
    $tinymce_js .= ($tinymce_options ? ','.$tinymce_options : '');
    $tinymce_js .= (isset($options['tinymce_options']) ? ','.$options['tinymce_options'] : '');

    if (isset($config['options']['misc']))
    {
      foreach ( $config['options']['misc'] as $name => $value)
      {
        $tinymce_js .= ", $name: \"$value\"";
      }
    }
    
    if (isset($options['tinymce_options'])) {
      unset($options['tinymce_options']);
    }
    $tinymce_js .= '});';

    return
      content_tag('script', javascript_cdata_section($tinymce_js), array('type' => 'text/javascript')).
      content_tag('textarea', $this->content, array_merge(array('name' => $this->name, 'id' => get_id_from_name($id, null)), _convert_options($options)));
  }
}
