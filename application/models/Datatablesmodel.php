<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

date_default_timezone_set('Asia/Manila');
class Datatablesmodel extends CI_Model {
	///////////////////////////////////////////////// DATATABLES
	function _get_datatables_query($table,$where,$select,$join,$column_order,$column_search,$ordering){
        $this->db->select($select);
        $this->db->from($table);
        //join
        if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == ''){
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		if ($table == "project") {
			$this->db->group_by("project.id");
		}
			$this->db->where($where);
		$i = 0;

		foreach ($column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}else{
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($ordering))
		{
				$order = $ordering;
				$this->db->order_by(key($order), $order[key($order)]);

		}
	}

	function get_datatables($table,$where,$select,$join,$column_order,$column_search,$ordering){
		$this->_get_datatables_query($table,$where,$select,$join,$column_order,$column_search,$ordering);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($table,$where,$select,$join,$column_order,$column_search,$ordering){
        $this->_get_datatables_query($table,$where,$select,$join,$column_order,$column_search,$ordering);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($table,$where,$select,$join,$column_order,$column_search,$ordering){
        $this->db->from($table);
        //join
        if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == '') {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		return $this->db->count_all_results();
	}
	///////////////////////////////////////////////// DATATABLES //
}
?>
