<?

// _________________________________________________________________________
//
// wtf
// _________________________________________________________________________

function wtf($omfg) {
	echo "<div class='wtf' style='text-align: left'>\n";
	echo "<h1>Data dump</h1>\n";
	echo "<pre>\n";
	print_r($omfg);
	echo "</pre>\n";
	echo "</div>";
	}

// _________________________________________________________________________
//
// array_first
// _________________________________________________________________________

function array_first($input) {
	if (is_array($input)) {
		$keys = array_keys($input);
		return $input[$keys[0]];
		}
	}

// _________________________________________________________________________
//
// use_interface
// _________________________________________________________________________

function use_interface ($table) {
	static $instances;

	if (is_object($instances[strtolower($table)])) {
		$ref = &$instances[strtolower($table)];
		return $ref;
		}
	else {
		if (file_exists(APP_INTERFACES . DIRSEP . $table . ".php")) {
			require_once(APP_INTERFACES . DIRSEP . $table . ".php");
			$instances[strtolower($table)] = new $table;
			}
		else if (file_exists(GATOR_INTERFACES . DIRSEP . $table . ".php")) {
			require_once(GATOR_INTERFACES . DIRSEP . $table . ".php");
			$instances[strtolower($table)] = new $table;
			}
		else {
			$instances[strtolower($table)] = new GatorInterface;
			$instances[strtolower($table)]->table = $table;
			}

		return $instances[strtolower($table)];
		}
	}

// _________________________________________________________________________
//
// record_sort
// _________________________________________________________________________

function sortArrayByField ($original, $field, $descending = true) {
	$sortArr = array();

	foreach ( $original as $key => $value ) {
		$sortArr[ $key ] = $value[ $field ];
		}

	if ( $descending ) {
		arsort( $sortArr );
		}
	else {
		asort( $sortArr );
		}

	$resultArr = array();
	foreach ( $sortArr as $key => $value ) {
		$resultArr[ $key ] = $original[ $key ];
		}

	return $resultArr;
	}

// _________________________________________________________________________
//
// simple_curl
// _________________________________________________________________________

function simple_curl($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);

	if ($data) {
		return $data;
		}
	else {
		return curl_error($ch);
		}
	}