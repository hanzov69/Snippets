<?

class Babble extends GatorInterface {
	var $table = 'babble';

	function Sizzle () {
		$filename = APP_DATA . DIRSEP . "sizztext.txt";
		$fd = fopen ($filename, "r") or die("can't open file");

		for ($a = 0; !feof($fd); $a++) {
			$snippets[$a] = fgets($fd, 1024);
			}

		$howManySnippets = rand(2, 4);
		$keepTrackOfSnippets[] = "";

		for ($i = 0; $i < $howManySnippets; $i++) {
			$chooseSnippet = rand(0, count($snippets)-1);
			if(in_array($chooseSnippet, $keepTrackOfSnippets)){
				continue;
				}
			$keepTrackOfSnippets[] += $chooseSnippet;
			$tirade = $tirade . $snippets[$chooseSnippet];
			}

		return $tirade;
		}

	function Skullbot ($text) {
		$handle = popen("perl /usr/local/www/apache22/robotskull/perl/hello.pl '" . $text . "'","r");
		$read = fread($handle, 2096);
		return $read;
		pclose($handle);
		}

	function Baconator () {
		$query = "SELECT text FROM babble order by rand() limit 1";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);

		$arraytext = split(" ", $row['text']);

		$arraytext[rand(0, sizeof($arraytext))] = 'baconator';

		foreach ($arraytext as $word) {
			$string .= " " . $word;
			}

		return $string;
		}
	}