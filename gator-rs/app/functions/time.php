<?

function timeDiff ($timestamp,$detailed=false, $max_detail_levels=8, $precision_level='second') {
	$now = time();

    #If the difference is positive "ago" - negative "away"
    ($timestamp > $now) ? $action = 'away' : $action = 'ago';

    # Set the periods of time
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array(1, 60, 3600, 86400, 604800, 2630880, 31570560, 315705600);

    $diff = ($action == 'away' ? $timestamp - $now : $now - $timestamp);

    $prec_key = array_search($precision_level,$periods);

    # round diff to the precision_level
    $diff = round(($diff/$lengths[$prec_key]))*$lengths[$prec_key];

    # if the diff is very small, display for ex "just seconds ago"
    if ($diff <= 10) {
        $periodago = max(0,$prec_key-1);
        $agotxt = $periods[$periodago].'s';
        return "moments $action";
    }

    # Go from decades backwards to seconds
    $time = "";
    for ($i = (sizeof($lengths) - 1); $i>=0; $i--) {
        if($diff > $lengths[$i-1] && ($max_detail_levels > 0)) {        # if the difference is greater than the length we are checking... continue
            $val = floor($diff / $lengths[$i-1]);    # 65 / 60 = 1.  That means one minute.  130 / 60 = 2. Two minutes.. etc
            $time .= $val ." ". $periods[$i-1].($val > 1 ? 's ' : ' ');  # The value, then the name associated, then add 's' if plural
            $diff -= ($val * $lengths[$i-1]);    # subtract the values we just used from the overall diff so we can find the rest of the information
            if(!$detailed) { $i = 0; }    # if detailed is turn off (default) only show the first set found, else show all information
            $max_detail_levels--;
        }
    }

    # Basic error checking.
    if($time == "") {
        return "Error-- Unable to calculate time.";
    } else {
        return $time.$action;
    }
}

function get_age($year, $month = '', $day = '') {
	if ($month == '') {
		list($year, $month, $day) = split("-", $year);
		}

	list($this_year, $this_month, $this_day) = explode(' ', date('Y n j'));
	$age = $this_year - $year;

	if ($month > $this_month || ($this_month == $month && $this_day < $day)) {
		$age--;
		}

	return $age;
	}

?>