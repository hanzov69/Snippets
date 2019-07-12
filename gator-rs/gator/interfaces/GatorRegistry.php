<?

class GatorRegistry extends GatorInterface {
	var $table = 'gator_registry';

	function GatorRegistry () {
		$this->Setup();

		$all_keys = array_first($this->Get());

		if (!empty($all_keys)) {
			foreach (array_keys($all_keys) as $key) {
				$this->{$key} = $all_keys[$key]['value'];
				}
			}
		}

	function Set($key, $value) {
		$data['id'] = $key;
		$data['value'] = $value;
		
		if ($this->$key) {
			$this->Save($key, $data);
			}
		else {
			$this->SaveNew($data);
			}
			
		$this->{$key} = $value;
		}

	function Setup () {
		$query = "CREATE TABLE IF NOT EXISTS `" . TBL_PREFIX . "gator_registry` (
		          `id` varchar(10)     NOT NULL,
		          `value` varchar(255) NOT NULL,
		          PRIMARY KEY  (`id`) );";

		$this->Query($query);
		}
	}