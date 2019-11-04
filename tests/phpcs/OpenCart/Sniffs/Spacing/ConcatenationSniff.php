<?php

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Makes sure there are the needed spaces between the concatenation operator (.) and
 * the strings being concatenated.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Peter Philipp <peter.philipp@cando-image.com>
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 * @Licence   http://www.gnu.org/licenses/gpl-2.0.html
 */
class OpenCart_Sniffs_Spacing_ConcatenationSniff implements Sniff {
	/**
	 * Returns an array of tokens this test wants to listen for.
	 *
	 * @return array
	 */
	public function register() {
		return array(T_STRING_CONCAT);

	}//end register()


	/**
	 * Processes this test, when one of its tokens is encountered.
	 */
	public function process(File $phpcsFile, $stackPtr) {
		$tokens = $phpcsFile->getTokens();
		if ($tokens[($stackPtr - 1)]['code'] !== T_WHITESPACE || $tokens[($stackPtr + 1)]['code'] !== T_WHITESPACE) {
			$message = 'PHP concat operator must be surrounded by spaces';
			$phpcsFile->addError($message, $stackPtr, 'Missing');
		}
	}
}//end class