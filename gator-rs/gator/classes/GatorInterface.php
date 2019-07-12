<?

class GatorInterface {
	// =========================================================================
	// SaveNew
	// =========================================================================

	function SaveNew ($data) {
		$i = 0;

		foreach (array_keys($data) as $key) {
			$i++;

			$columns_string .= "`".$key."`";
			$values_string  .= quote_smart($data[$key]);

			if ($i < sizeof($data)) {
				$columns_string .= ", ";
				$values_string .= ", ";
				}
			}

		$this->query = sprintf("INSERT INTO `".TBL_PREFIX."%s` (%s) VALUES (%s)", $this->table, $columns_string, $values_string);

		mysql_query($this->query) or print "!SaveNew Query Error";

		$this->Cleanup();

		return mysql_insert_id();
		}

	// =========================================================================
	// Save
	// =========================================================================

	function Save ($id, $data) {
		foreach (array_keys($data) as $key) {
			$this->query = sprintf("UPDATE `".TBL_PREFIX."%s` SET `%s` = %s  WHERE id = %s", $this->table, $key, quote_smart($data[$key]), quote_smart($id));

			mysql_query($this->query) or print "!Save Query Error";
			}

		$this->Cleanup();

		return 1;
		}

	// =========================================================================
	// SELECT - GetArray
	// =========================================================================

	function GetArray ($id = null) {
		if (is_numeric($id)) {
			$this->qCriteria("id", "=", $id);
			}

		$criteria  = $this->get_criteria();
		$order     = $this->get_order();
		$joins     = $this->get_joins();
		$limts     = $this->get_limit();
		$fields    = $this->get_fields();

		$this->query = sprintf("SELECT %s FROM `".TBL_PREFIX."%s` %s %s %s %s", $fields, $this->table, $joins, $criteria, $order, $limts);

		if ($result = mysql_query($this->query)) {
			$data = $this->results_as_array($result);
			$data = $this->__out($data);

			$this->Cleanup();

			return $data;
			}
		else {
			echo "fail";
			return 0;
			}
		}

	// =========================================================================
	// DELETE - Delete
	// =========================================================================

	function Delete($id = null) {
		if (is_numeric($id)) {
			$query_criteria = "WHERE `id` = " . $id;
			}
		else {
			$query_criteria = $this->get_criteria();
			}

		$this->query = sprintf("DELETE FROM `".TBL_PREFIX."%s` %s", $this->table, $query_criteria);

		if (mysql_query($this->query)) {
			return 1;
			}
		else {
			return 0;
			}

		$this->Cleanup();
		}

	// =========================================================================
	// COUNT - Count
	// =========================================================================

	function Count () {
		$criteria_string = $this->get_criteria();

		$this->query = sprintf("SELECT COUNT(id) as 'count' FROM `".TBL_PREFIX."%s` %s", $this->table, $criteria_string);
		$result = mysql_query($this->query) or print "!Count Query Error";
		$row = mysql_fetch_assoc($result);

		$this->Cleanup();

		return $row['count'];
		}

	// =========================================================================
	// SELECT - Get (Depreciated)
	// =========================================================================

	function Get($id = null) {
		if (is_numeric($id)) {
			$this->qCriteria("id", "=", $id);
			}

		$criteria  = $this->get_criteria();
		$order     = $this->get_order();
		$joins     = $this->get_joins();
		$limts     = $this->get_limit();
		$fields    = $this->get_fields();

		$this->query = sprintf("SELECT * FROM `".TBL_PREFIX."%s` %s %s %s %s", $this->table, $joins, $criteria, $order, $limts);

		if ($result = mysql_query($this->query)) {
			$data = $this->results_by_table($result);
			$data = $this->__out($data);

			$this->Cleanup();

			return $data;
			}
		else {
			return 0;
			}
		}

	// =========================================================================
	// qFields
	// =========================================================================

	function qFields($fields, $table = null) {
		if ($table == null) {
			$table = $this->table;
			}

		foreach ($fields as $field) {
			$this->fields[$table][] = $field;
			}

		return 1;
		}

	// =========================================================================

	function get_fields () {
		if (!$this->fields[$this->table]) {
			$this->fields[$this->table][] = "*";
			}


		if (is_array($this->join)) {
			foreach ($this->join as $join) {
				if (!$this->fields[$join[0]]) {
					$this->fields[$join[0]][] = "*";
					}
				}
			}

		$num_fields = count($this->fields, COUNT_RECURSIVE) - count($this->fields);

		if ($this->fields) {
			foreach (array_keys($this->fields) as $key) {
				for ($i = 0; $i <= (sizeof($this->fields[$key]) -1); $i++) {
					$string .= $key . "." . $this->fields[$key][$i];

					if ($j++ < ($num_fields - 1)) {
						$string .= ", ";
						}
					}
				}
			}
		else {
			$string = " * ";
			}

		return $string;
		}

	// =========================================================================
	// qCriteria
	// =========================================================================

	function qCriteria ($field, $operator, $value, $quote = 1) {
		$this->criteria[] = array($field, $operator, $value, $quote);
		}

	// =========================================================================

	function get_criteria () {
		if ($this->criteria) {
			$string = "WHERE ";

			foreach ($this->criteria as $criterion) {
				if ($i == 1) {
					$string .= " AND ";
					}

				if ($criterion[3] != 0) {
					$criterion[2] = quote_smart($criterion[2]);
					}

				$string .= " " . TBL_PREFIX . $this->table . ".`" . $criterion[0] . "` " . $criterion[1] . " " . $criterion[2];
				$i = 1;
				}
			}

		return $string;
		}

	// =========================================================================
	// qOrder
	// =========================================================================

	function qOrder($field) {
		$this->order[] = $field;
		}

	// =========================================================================

	function get_order () {
		if ($this->order) {
			$i = 0;

			foreach ($this->order as $order) {
				if ($i == 0) {
					$string .= "ORDER BY " . TBL_PREFIX . $this->table . "." . $order;
					}
				else {
					$string .= ", " . TBL_PREFIX . $this->table . "." . $order;
					}
				$i++;
				}
			}

		return $string;
		}

	// =========================================================================
	// qLimit
	// =========================================================================

	function qLimit ($limit) {
		$this->limit = $limit;
		}

	// =========================================================================

	function get_limit () {
		if ($this->limit != null) {
			$string = "LIMIT " . $this->limit;
			}

		return $string;
		}

	// =========================================================================
	// qJoin
	// =========================================================================

	function qJoin ($join, $fields = null, $join_field = null) {
		$this->join[] = array($join, $join_field);

		if (!is_null($fields)) {
			$this->qFields($fields, $join);
			}
		}

	// =========================================================================

	function get_joins () {
		if (is_array($this->join)) {
			foreach ($this->join as $join) {
				if ($join[1] != null) {
					$join_field = $join[1];
					}
				else {
					$join_field = $join[0] . "_id";
					}

				$string .= " LEFT JOIN `" . $join[0] . "` ON " . $this->table . "." . $join_field . " = " . $join[0] . ".id ";
				}
			}

		return $string;
		}

	// =========================================================================
	// Parsers
	// =========================================================================

	function results_by_table ($results) {
		$this->results = $results;

		$index = 0;

		while ($column = mysql_fetch_field($results)) {
			$this->map[$index++] = array($column->table, $column->name);
			}

		while ($row = mysql_fetch_row($this->results)) {
			$drow = array();
			foreach ($row as $index => $field) {
				list($table, $column) = $this->map[$index];
				$out[str_replace(TBL_PREFIX, '', $table)][$row[0]][$column] = $row[$index];
				}
			}

		$this->restuls = '';
		$this->map     = '';
		$this->index   = '';

		return $out;
		}

	// =========================================================================

	function results_as_array ($result) {
		while ($row = mysql_fetch_row($result)) {
			for ($i = 0; $i < mysql_num_fields($result); $i++) {
				$meta = mysql_fetch_field($result, $i);

				$this_row[$meta->table . '.' . $meta->name] = $row[$i];
				}
			$data[$this_row[$this->table . ".id"]] = $this_row;
			}

		return $data;
		}
	// =========================================================================
	// Helpers
	// =========================================================================

	function Cleanup () {
		$this->criteria = null;
		$this->join     = null;
		$this->limit    = null;
		$this->order    = null;
		$this->fields   = null;

		$this->error = mysql_error();
		$this->errno = mysql_errno();
		}

	function Query ($sql) {
		$sql = ($this->$sql) ? $this->$sql : $sql;

		mysql_query($sql);

		return 1;
		}

	// =========================================================================
	// __out()
	// =========================================================================

	function __out($input) {
		return $input;
		}
	}

?>