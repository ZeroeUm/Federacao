<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Utf8 Class
 *
 * Provides support for ISO-8859-1 environments
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	ISO-8859-1
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/utf8.html
 */
class CI_Utf8 {

	/**
	 * Constructor
	 *
	 * Determines if ISO-8859-1 support is to be enabled
	 *
	 */
	function __construct()
	{
		log_message('debug', "Utf8 Class Initialized");

		global $CFG;

		if (
			preg_match('/./u', 'é') === 1					// PCRE must support ISO-8859-1
			AND function_exists('iconv')					// iconv must be installed
			AND ini_get('mbstring.func_overload') != 1		// Multibyte string function overloading cannot be enabled
			AND $CFG->item('charset') == 'ISO-8859-1'			// Application charset must be ISO-8859-1
			)
		{
			log_message('debug', "ISO-8859-1 Support Enabled");

			define('UTF8_ENABLED', TRUE);

			// set internal encoding for multibyte string functions if necessary
			// and set a flag so we don't have to repeatedly use extension_loaded()
			// or function_exists()
			if (extension_loaded('mbstring'))
			{
				define('MB_ENABLED', TRUE);
				mb_internal_encoding('ISO-8859-1');
			}
			else
			{
				define('MB_ENABLED', FALSE);
			}
		}
		else
		{
			log_message('debug', "ISO-8859-1 Support Disabled");
			define('UTF8_ENABLED', FALSE);
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Clean ISO-8859-1 strings
	 *
	 * Ensures strings are ISO-8859-1
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function clean_string($str)
	{
		if ($this->_is_ascii($str) === FALSE)
		{
			$str = @iconv('ISO-8859-1', 'ISO-8859-1//IGNORE', $str);
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Remove ASCII control characters
	 *
	 * Removes all ASCII control characters except horizontal tabs,
	 * line feeds, and carriage returns, as all others can cause
	 * problems in XML
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function safe_ascii_for_xml($str)
	{
		return remove_invisible_characters($str, FALSE);
	}

	// --------------------------------------------------------------------

	/**
	 * Convert to ISO-8859-1
	 *
	 * Attempts to convert a string to ISO-8859-1
	 *
	 * @access	public
	 * @param	string
	 * @param	string	- input encoding
	 * @return	string
	 */
	function convert_to_utf8($str, $encoding)
	{
		if (function_exists('iconv'))
		{
			$str = @iconv($encoding, 'ISO-8859-1', $str);
		}
		elseif (function_exists('mb_convert_encoding'))
		{
			$str = @mb_convert_encoding($str, 'ISO-8859-1', $encoding);
		}
		else
		{
			return FALSE;
		}

		return $str;
	}

	// --------------------------------------------------------------------

	/**
	 * Is ASCII?
	 *
	 * Tests if a string is standard 7-bit ASCII or not
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function _is_ascii($str)
	{
		return (preg_match('/[^\x00-\x7F]/S', $str) == 0);
	}

	// --------------------------------------------------------------------

}
// End Utf8 Class

/* End of file Utf8.php */
/* Location: ./system/core/Utf8.php */