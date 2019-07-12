<?

class Gator {
	function Gator () {
		$this->Registry = new GatorRegistry;
		$this->Sanitize = new Sanitize;

		$this->p = ($_GET['p'] == '') ? DEFAULT_HOME : $this->Sanitize->paranoid($_GET['p'], array("_"));
		$this->c = ($_GET['c'] == '') ? 'index' :      $this->Sanitize->paranoid($_GET['c'], array("_"));
		}

	function Display ($file = null, $passed = null) {
		$Gator = $this;

		if (file_exists(APP_SCRIPTS . DIRSEP . "display.php")) {
			require_once(APP_SCRIPTS . DIRSEP . "display.php");
			}

		if (is_array($this->vars)) {
			foreach(array_keys($this->vars) as $key) {
				$$key = $this->vars[$key];
				}
			}
		if ($passed != null) {
			foreach(array_keys($passed) as $key) {
				$$key = $passed[$key];
				}
			}

		if ($file == null) {
			$file = $this->p . DIRSEP . $this->c;
			}

		if (file_exists(APP_TEMPLATES . DIRSEP . $file . ".tpl")) {
			require(APP_TEMPLATES . DIRSEP . $file . ".tpl");
			}
		else if (file_exists(GATOR_TEMPLATES . DIRSEP . $file . ".tpl")) {
			require(GATOR_TEMPLATES . DIRSEP . $file . ".tpl");
			}
		else {
			echo "Template not found";
			}
		}

	function Redirect ($location) {
		if ($location == 'REFERER') {
			$location = $_SERVER['HTTP_REFERER'];
			}
		else {
			$location = "index.php?p=".$location;
			}

		if (headers_sent()) {
			echo "<script type='text/javascript'>location.href='$location';</script>";
			}
		else {
			header("Location: $location");
			}
		}

	function Set($key, $var) {
		$this->vars[$key] = $var;
		return true;
		}

	function Read($key) {
		return $this->vars[$key];
		}
	}

?>