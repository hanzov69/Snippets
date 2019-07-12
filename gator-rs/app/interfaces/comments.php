<?

class Comments extends GatorInterface {
	var $table = 'comments';

	function qType ($type) {
		$this->type = $type;
		$this->qCriteria("type", "=", $type);

		return 1;
		}

	function qResource ($resource) {
		$this->resource = $resource;
		$this->qCriteria("resource", "=", $resource);

		return 1;
		}

	function __out ($input) {
		$data['comments'] = $input;
		$data['data']['type']     = $this->type;
		$data['data']['resource'] = $this->resource;

		return $data;
		}
	}