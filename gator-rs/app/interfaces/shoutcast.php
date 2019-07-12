<?

class Shoutcast {
	function stats () {
		$stream = $this->get_stream();
		$Users = use_interface('Users');

		$Users->qCriteria("username", "=", $stream->AIM);
		$id = $Users->Get();

		$id = array_first($id);
		$id = array_first($id);

		$radio['listeners'] = $stream->CURRENTLISTENERS;
		$radio['status']    = $stream->STREAMSTATUS;
		$radio['song']      = $stream->SONGTITLE;
		$radio['url']       = $stream->SERVERURL;
		$radio['username']  = $id['username'];
		$radio['users_id']  = $id['id'];

		return $radio;
		}

	function get_listeners () {
		$Users = use_interface('users');
		$stream = $this->get_stream();

		foreach ($stream->LISTENERS->LISTENER as $listener) {
			$ips[] = "$listener->HOSTNAME";
			}

		$i = 0;

		if (!empty($ips)) {
			foreach ($ips as $ip) {
				$Users->qCriteria("ip", "=", $ip);
				$listener = array_first(array_first($Users->Get()));
				$listeners[$i]['id'] = $listener['id'];
				$listeners[$i++]['username'] = $listener['username'];
				}
			}

		return $listeners;
		}

	function get_songs () {
		$stream = $this->get_stream();

		foreach ($stream->SONGHISTORY->SONG as $song) {
			$songs[] = "$song->TITLE";
			}

		return $songs;
		}

	function get_stream() {
		if (!$this->stream) {
			$xml = simple_curl('http://'. RADIO_USERNAME . ':' . RADIO_PASSWORD . '@localhost:8000/admin.cgi?mode=viewxml');
			$doc = simplexml_load_string($xml);

			$this->stream = $doc;
			}

		return $this->stream;
		}
	}