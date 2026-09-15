<?php
class CacheService {
  var $basedir;
  var $fileextension = '.cache';

  function &getInstance() {
    static $instance;
    if (!isset($instance)) {
      $instance = new CacheService();
    }
    return $instance;
  }

  function __construct() {
    $this->basedir = rtrim($GLOBALS['dir_cache'], '/');
  }

  function Start($hash, $time = 300) {
    $cachefile = $this->basedir .'/'. $hash . $this->fileextension;
    if (file_exists($cachefile) && filesize($cachefile) > 0 && time() < filemtime($cachefile) + $time) {
      @readfile($cachefile);
      echo "\n<!-- Cached: ". date('r', filemtime($cachefile)) ." -->\n";
      unset($cachefile);
      exit;
    }
    ob_start("ob_gzhandler");
  }

  function End($hash) {
    if (ob_get_level() == 0) {
      return;
    }
    $contents = ob_get_contents();
    $cachefile = $this->basedir .'/'. $hash . $this->fileextension;
    $tmpfile = $cachefile .'.'. getmypid() .'.tmp';
    $handle = @fopen($tmpfile, 'w');
    if ($handle !== false) {
      fwrite($handle, $contents);
      fclose($handle);
      @rename($tmpfile, $cachefile);
    }
    ob_flush();
  }
}
