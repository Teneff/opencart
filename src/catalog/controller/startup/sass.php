<?php

use ScssPhp\ScssPhp\Compiler;

class ControllerStartupSass extends Controller {
	public function index() {
		$file = DIR_PUBLIC . 'theme/' . $this->config->get('theme_directory') . '/stylesheet/bootstrap.css';

		if (!is_file($file) || (is_file(DIR_APPLICATION . 'view/theme/' . $this->config->get('theme_directory') . '/stylesheet/sass/_bootstrap.scss') && !$this->config->get('developer_sass'))) {
			
			$scss = new Compiler();
			$scss->setImportPaths(DIR_PUBLIC . 'theme/' . $this->config->get('theme_directory') . '/stylesheet/sass/');

			$output = $scss->compile('@import "_bootstrap.scss"');

			$handle = fopen($file, 'w');

			flock($handle, LOCK_EX);

			fwrite($handle, $output);

			fflush($handle);

			flock($handle, LOCK_UN);

			fclose($handle);
		}
	}
}
