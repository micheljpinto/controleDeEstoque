<?php 

class Model_customers extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
//Utilizando como base o modelo MOdel_users, model em construção, Michel

		/*get the active brands information*/
		public function getActiveCustomers()
		{
			$sql = "SELECT * FROM customers WHERE active = ?";
			$query = $this->db->query($sql, array(1));
			return $query->result_array();
		}
	
		/* get the brand data */
		public function getCustomersData($id = null)
		{
			if($id) {
				$sql = "SELECT * FROM customers WHERE id = ?";
				$query = $this->db->query($sql, array($id));
				return $query->row_array();
			}
	
			$sql = "SELECT * FROM customers";
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		public function getCustomersDataByName($var){
			
			$varOut='%'.strtoupper($var).'%';
			$sql = "SELECT * FROM customers WHERE name LIKE ? ";
			$query = $this->db->query($sql, array($varOut));
			return ($query== true) ? true : false ;
		}
		public function create($data)
		{
			
			if($data) {
			
				$insert = $this->db->insert('customers', $data);
				return ($insert == true) ? true : false;
			}
		}
	
		public function update($data, $id)
		{
			if($data && $id) {
				$this->db->where('id', $id);
				$update = $this->db->update('customers', $data);
				return ($update == true) ? true : false;
			}
		}
	
		public function remove($id)
		{
			//echo print_r($id);
			if($id) {
				$this->db->where('id', $id);
				$delete = $this->db->delete('customers');
				return ($delete == true) ? true : false;
			}
		}
	
}