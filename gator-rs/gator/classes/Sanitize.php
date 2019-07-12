<?php

class Sanitize{
	function paranoid ($string, $allowed = array()) {
		// Removes any non-alphanumeric characters.
		$allow = null;

		if (!empty($allowed)) {
			foreach($allowed as $value) {
				$allow .= "\\$value";
				}
			}
		
		$cleaned = preg_replace("/[^{$allow}a-zA-Z0-9]/", '', $string);

		return $cleaned;
		}

	function sql_safe($value) {
		//Makes a string SQL-safe.

		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
			}
		if (!is_numeric($value) || $value[0] == '0') {
			$value = "'" . mysql_real_escape_string($value) . "'";
			}

		return $value;
		}

	function html($string, $allowed = null) {
		$patterns = array("/</", "/>/");
		$replacements = array("&lt;", "&gt;");
		$string = preg_replace($patterns, $replacements, $string);

		if (is_array($allowed)) {
			foreach ($allowed as $tag) {
				if ($tag == 'a') {
					$string = preg_replace('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.\-\%]*(\?\S+)?)?)?)@', '<a href="$1">$1</a>', $string);
					}
				else {
					$string = preg_replace('|&lt;(/?)' . (strtolower($tag)|strtoupper($tag)) . '&gt;|i', "<$1"  . $tag . ">", $string);
					}
				}
			}

		return $string;
		}

	function is_email_address($email) {
		if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
			return false;
			}

		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) {
				return false;
				}
			}

		if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
			}

			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {
					return false;
					}
				}
			}
		return true;
		}

	function nltobr ($text) {
		$text = str_replace("\n", "<br>", $text);
		return $text;
		}

	function brtonl ($text) {
		$text = str_replace("<br>", "\n", $text);
		return $text;
		}

	}

?>