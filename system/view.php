<?php
/**
 * View
 *
 * Provides fetching of HTML template files
 *
 * @package		MicroMVC
 * @author		http://github.com/tweetmvc/tweetmvc-app
 * @copyright	(c) 2011 MicroMVC Framework
 * @license		http://micromvc.com/license
 ********************************** 80 Columns *********************************
 */
class View
{

private $__view = NULL;

/**
 * Returns a new view object for the given view.
 *
 * @param string $file the view file to load
 * @param string $module name (blank for current theme)
 */
public function __construct($file, $module = NULL)
{
	$this->__view = SP . ($module ? $module : config('theme')) . "/view/" . $file . EXT;
}


/**
 * Set an array of values
 *
 * @param array $array of values
 */
public function set($array)
{
	foreach($array as $k => $v)
	{
		$this->$k = $v;
	}
}


/**
 * Return the view's HTML
 * 
 * @return string
 */
public function __toString()
{
	ob_start();
	extract((array) $this);
	require $this->__view;
	return ob_get_clean();
}

}

// END
