<?

function convert_xml2array(&$result,$root,$rootname='root'){
	if ($root == null) {
		return;
		}

		$n=count($root->children());

	if ($n>0) {

	if (!isset($result[$rootname]['@attributes'])) {
		$result[$rootname]['@attributes']=array();
		foreach ($root->attributes() as $atr=>$value) {
			$result[$rootname]['@attributes'][$atr]=(string)$value;
			}
		}

		foreach ($root->children() as $child) {
			$name=$child->getName();
			convert_xml2array($result[$rootname][],$child,$name);
			}
		}
	else {
        	$result[$rootname]= (array) $root;

        	if (!isset($result[$rootname]['@attributes'])) {
        		$result[$rootname]['@attributes']=array();
        		}
        	}
        }

?>