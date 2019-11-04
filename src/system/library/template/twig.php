<?php

namespace Template;

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;

final class Twig {
	private static $twig;
	private $data = array();

	private static function twig($cache) {
		if( !self::$twig) {
			// specify where to look for templates
			$loader = new FilesystemLoader(DIR_TEMPLATE);
			
			// initialize Twig environment
			if ($cache) {
				$config = array(
					'autoescape' => false,
					'cache'      => DIR_CACHE 
				);
			} else {
				$config = array('autoescape' => false);	
			}
			
			self::$twig = new Environment($loader, $config);
		}
		return self::$twig;
	}

	public function set($key, $value) {
		$this->data[$key] = $value;
	}
	
	public function render($template, $cache = false) {
		try {
			// load template
			$template = self::twig($cache)->loadTemplate($template . '.twig');
			
			return $template->render($this->data);
		} catch (Exception $e) {
			trigger_error('Error: Could not load template ' . $template . '!');
			exit();	
		}	
	}	
}
