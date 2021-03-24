<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();

		$this->data['page_title'] = 'Cliente';

		$this->load->model('model_customers');
	}

	/* 
	* It only redirects to the manage product page and
	*/
	public function index()
	{
		if(!in_array('viewBrand', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$result = $this->model_customers->getCustomersData();

		$this->data['results'] = $result;
		//echo print_r($result, true);

		$this->render_template('customers/index', $this->data);
	}

	/*
	* Fetches the brand data from the brand table 
	* this function is called from the datatable ajax function
	*/
	public function fetchCustomersData()
	{
		$result = array('data' => array());

		$data = $this->model_customers->getCustomersData();
		foreach ($data as $key => $value) {

			// button
			$buttons = '';

			if(in_array('viewBrand', $this->permission)) {
				$buttons .= '<button type="button" class="btn btn-default" onclick="editCustomer('.$value['id'].')" data-toggle="modal" data-target="#editCustomerModal"><i class="fa fa-pencil"></i></button>';	
			}
			
			if(in_array('deleteBrand', $this->permission)) {
				$buttons .= ' <button type="button" class="btn btn-default" onclick="removeCustomer('.$value['id'].')" data-toggle="modal" data-target="#removeCustomerModal"><i class="fa fa-trash"></i></button>
				';
			}				


			$result['data'][$key] = array(
				$value['id'],
				$value['name'],
				$value['street'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);

	}

	/*
	* It checks if it gets the brand id and retreives
	* the brand information from the brand model and 
	* returns the data into json format. 
	* This function is invoked from the view page.
	*/
	public function fetchCustomersDataById($id)	{
		if($id) {
			$data = $this->model_customers->getCustomersData($id);
			echo json_encode($data);
		}

		return false;
	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it inserts the data into the database 
	* and returns the json format operation messages
	*/
	public function create() {
		
		if(!in_array('createBrand', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		$response=array();
		$varTest=strtoupper($_POST['customer_name']);
		 
 		$this->form_validation->set_rules('customer_name', 'Customer_name', 'trim|required');
		$this->form_validation->set_rules('customer_email', 'Customer_email', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>'); 
		

		if ($this->form_validation->run() === true) {
			//Verify if exists other customer with same name or other
			$test= $this->model_customers->getCustomersDataByName($varTest);
			
			if(!$test){
				$data = array(
					'id' => null,
					'name' => strtoupper($this->input->post('customer_name')),	
					'tel' => $this->input->post('customer_tel'),	
					'cel' => $this->input->post('customer_cel'),	
					'email' => $this->input->post('customer_email'),	
					'street' => $this->input->post('customer_street'),	
					'district' => $this->input->post('customer_district'),
					'cep' => $this->input->post('customer_cep'),	
					'city' => $this->input->post('customer_city'),	
					'province' => $this->input->post('customer_province'),	
					'cpf-cnpj' => $this->input->post('customer_cpf-cnpj'),	
					'rg-ie' => $this->input->post('customer_rg-ie'),	
					'obs' => $this->input->post('customer_obs'),	
				);
				$create = $this->model_customers->create($data);
			} else {
				$create = 2;
			}
				
			if($create===true) {
				$response['success'] = true;
				$response['messages'] = 'Registro salvo com sucesso';			
			} else if($create == 2) {
				$response['success'] = false;
				$response['messages'] = 'Cadastro já existente no banco de dados';
			} else {
				$response['success'] = false;
				$response['messages'] = 'Error no banco de dados ao gravar registro';			
			} 
		
		}  else {
			$response['success'] = false;
			foreach ($_POST as $key => $value) {
        		$response['messages'][$key] = form_error($key);
        	}				
		}
        echo json_encode($response); 
	}

	/*
	* Its checks the brand form validation 
	* and if the validation is successfully then it updates the data into the database 
	* and returns the json format operation messages
	*/
	public function update($id){
		if(!in_array('updateBrand', $this->permission)) {
			redirect('dashboard', 'refresh');
		}

		$response = array();

		if($id) {
			$this->form_validation->set_rules('edit_customer_name', 'customer name', 'trim|required');
			$this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

			$this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

	        if ($this->form_validation->run() == TRUE) {
	        	$data = array(
	        		'name' => $this->input->post('edit_customer_name'),
	        		'active' => $this->input->post('edit_active'),	
	        	);

	        	$update = $this->model_customers->update($data, $id);
	        	if($update == true) {
	        		$response['success'] = true;
	        		$response['messages'] = 'Succesfully updated';
	        	}
	        	else {
	        		$response['success'] = false;
	        		$response['messages'] = 'Error in the database while updated the brand information';			
	        	}
	        }
	        else {
	        	$response['success'] = false;
	        	foreach ($_POST as $key => $value) {
	        		$response['messages'][$key] = form_error($key);
	        	}
	        }
		}
		else {
			$response['success'] = false;
    		$response['messages'] = 'Error please refresh the page again!!';
		}

		echo json_encode($response);
	}

	/*
	* It removes the brand information from the database 
	* and returns the json format operation messages
	*/
	public function remove(){
		
		if(!in_array('deleteBrand', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
		
		$customer_id = $this->input->post('customer_id');
		
		$response = array();
		if($customer_id) {
			$delete = $this->model_customers->remove($customer_id);

			if($delete == true) {
				//echo print_r('1');
				$response['success'] = true;
				$response['messages'] = "Removido com sucesso";	
			} else {
				$response['success'] = false;
				$response['messages'] = "Erro no banco de dados durante remoção";
			}
		} else {
			$response['success'] = false;
			$response['messages'] = "Reinicie a página!";
		}

		//echo print_r($response);
		echo json_encode($response);
	}

}