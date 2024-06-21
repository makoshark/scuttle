<?php
class TemplateService {
  var $basedir;

  function &getInstance() {
    static $instance;
    if (!isset($instance)) {
      $instance = new TemplateService();
    }
    return $instance;
  }

  function __construct() {
    $this->basedir = $GLOBALS['TEMPLATES_DIR'];    
  }

  function loadTemplate($template, $vars = NULL) {
    if (substr($template, -4) != '.php') {
      $template .= '.php';
    }
    $tpl = new Template($this->basedir .'/'. $template, $vars, $this);
    $tpl->parse();
    return $tpl;
  }
}

class Template {
  var $vars = array();
  var $file = '';
  var $templateservice;

  function __construct($file, $vars = NULL, &$templateservice) {
    $this->vars = $vars;
    $this->file = $file;
    $this->templateservice = $templateservice; 
  }

  function parse() {
    if (isset($this->vars)) {
      extract($this->vars);
    }
    include $this->file;
  }

  function includeTemplate($name) {
    return $this->templateservice->loadTemplate($name, $this->vars);
  }
}
