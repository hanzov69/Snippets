<?

class GatorUsers extends GatorInterface {
	var $table = 'users';

	function GatorUsers() {
		$this->Setup();

		$this->register();
		}

	function login ($username, $password) {
		$this->qFields(array('id', 'username'));
		$this->qCriteria('username', '=', $_POST['username']);
		$this->qCriteria('password', '=', $_POST['password']);

		$user = array_first($this->GetArray());

		//wtf($user);
		//wtf($this->query);
		//exit;

		if (isset($user['users.id'])) {
			$_SESSION['id'] = $user['users.id'];

			return 1;
			}
		else {
			$this->logout();

			return 0;
			}
		}

	function logout () {
		$_SESSION = array();
		session_destroy();
		}

	function register() {
		if ($_SESSION['id']) {
			$this->qCriteria("id", "=", $_SESSION['id']);

			$user = array_first($this->GetArray());

			if (empty($user)) {
				$this->logout();

				return 0;
				}
			else {
				$data['ip'] = $_SERVER['REMOTE_ADDR'];
				$data['time_last_seen'] = date("Y-m-d G:i:s");
				$this->Save($_SESSION['id'], $data);

				$_SESSION = array();

				foreach (array_keys($user) as $key) {
					$_SESSION[str_replace($this->table . ".", "", $key)] = $user[$key];
					}

				return 1;
				}
			}
		}

	function __out($input) {
		return $input;
		}

	function Setup () {
		$query = "CREATE TABLE IF NOT EXISTS `" . TBL_PREFIX . "users` (
			  `id` int(7) unsigned NOT NULL default '0',
			  `username` varchar(20) NOT NULL default '',
			  `password` varchar(20) NOT NULL default '',
			  `time_last_seen` datetime NOT NULL default '0000-00-00 00:00:00',
			  `ip` varchar(20) NOT NULL default '',
			  `type` int(7) default NULL,
			  `first_name` varchar(50) NOT NULL default '',
			  `last_name` varchar(50) NOT NULL default '',
			  `email` varchar(255) NOT NULL default '',
			  PRIMARY KEY  (`id`) );";

		$this->Query($query);
		}
	}

?>