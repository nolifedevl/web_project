<?

class Cache extends CI_Model{
	
	function insert($id, $object, $timeout)
	{
		$this->delete($id);
		$blob = serialize($object);		// Serializing the object.
		$timeout += time();				// We set when the object should disappear.

		$data = array(
			"id"		=> $id,
			"object"	=> $blob,
			"timeout"	=> $timeout
		);

		$this->db->insert("cache", $data);

	}

	function fetch($id)
	{
		$this->db->where("id", $id);

		$query = $this->db->get("cache");
		$result = $query->result();
		
		if(!$result)
			return null;

		$cache = $result[0];

		if ((int)$cache->timeout < time())
		{
			$this->delete($cache->id);
			return null;
		}else{
			return unserialize($cache->object);
		}
	}

	function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("cache");
	}

};
?>