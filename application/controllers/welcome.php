<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$queryAllcustomer = $this->M_customer->getCustomerData();
		$DATA = array('queryAllcus' => $queryAllcustomer);
		$this->load->view('dashboard', $DATA);
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_customer');
	}
	public function Addcust()
	{
		$this->load->view('AddCust');
	}
	public function Editcust($ID)
	{
		$custDetQuer = $this->M_customer->GetCustDetail($ID);
		$DATA = array('custDetQuer' => $custDetQuer);
		$this->load->view('EditCust', $DATA);
	}
	public function AddFunc()
	{
		$ID = rand(100, 10000);
		$Name = $this->input->post('Name');
		$Dob = $this->input->post('Dob');

		$ArrInsert = array(
			'ID' => $ID,
			'Name' => $Name,
			'Dob' => $Dob
		);
		$this->M_customer->InsertCustData($ArrInsert);
		redirect(base_url(''));

		// echo "<pre>";
		// print_r($ArrInsert);
		// echo "</pre>";
	}
	public function EditFunc()
	{
		$ID = $this->input->post('ID');
		$Name = $this->input->post('Name');
		$Dob = $this->input->post('Dob');
		$ArrUpdate = array(
			'Name' => $Name,
			'Dob' => $Dob
		);
		// echo "<pre>";
		// print_r($ArrUpdate);
		// echo "</pre>";
		$this->M_customer->CustDataUpdate($ID, $ArrUpdate);
		redirect(base_url(''));
	}

	public function DeleteFunc($ID)
	{
		$this->M_customer->DeleteCustData($ID);
		redirect(base_url(''));
	}
}
