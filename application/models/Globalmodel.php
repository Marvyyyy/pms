<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

date_default_timezone_set('Asia/Manila');
class Globalmodel extends CI_Model {

	function selectrow($select,$table,$join,$where) {
		
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == '') {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		$query = $this->db->get();
		return $query->row_array();
	}
	function selectresultarray($select,$table,$join,$where) {
		
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == '') {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		$query = $this->db->get();
		return $query->result_array();
	}
	function selectresult($select,$table,$join,$where) {
		
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == '') {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		$query = $this->db->get();
		return $query->result();
	}
	function countrows($select,$table,$join,$where) {
		
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		if (!empty($join)) {
            foreach ($join as $join) {
                if ($join['join_type'] == '') {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id']);
                } else {
                    $this->db->join($join['table'], $join['join_table_id'] . '=' . $join['from_table_id'], $join['join_type']);
                }
            }
        }
		$query = $this->db->get();
		return $query->num_rows();
	}

	function insert_data($data,$table){
        $result=$this->db->insert($table,$data);
        return $result;
	}

	function delete_data($table,$where){
        $result=$this->db->delete($table,$where);
        return $result;
	}

	function insertBatch($data,$table){
        $result=$this->db->insert_batch($table,$data);
        return $result;
	}
	function deletInsertBatch($data,$table,$where) {
		$this->db->delete($table, $where);
		$this->db->insert_batch($table, $data);
		return;
	}

	function update_data($update,$table,$where,$id) {
		$this->db->set($update);
		$this->db->where($where, $id);
		$this->db->update($table,);
		return;
	}

	public function selectwherearray($select,$table,$where){
		$this->db->select($select);
		$this->db->from($table);
		$this->db->where($where);
		  $query = $this->db->get();
		  if ( $query->num_rows() > 0 )
		{
			$data =  $query->result_array();
			return $data;
		}
		else
		{
			return FALSE;
		}
	}

	//  sql syntax
	function sqlSelectResultArray($select, $table, $join, $where)
	{
		$sql = "SELECT $select FROM $table $join WHERE $where";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$rows = $query->result_array();
		} else {
			$rows = null;
		}
		return $rows;
	}

	function sqlSelectRow($select, $table, $join, $where)
	{
		$sql = "SELECT $select FROM $table $join WHERE $where";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$rows = $query->row_array();
		} else {
			$rows = null;
		}
		return $rows;
	}

	function insertData($table,$column,$value){
		$query = "INSERT INTO $table
        ($column)
        VALUES ($value)";
        $this->db->query($query);
	}
	
	function checkrow($select,$table,$where){
		$sql = "SELECT $select FROM $table WHERE $where";
		$query = $this->db->query($sql);
		$rows = $query->num_rows();
		return $rows;
	}


}
?>
