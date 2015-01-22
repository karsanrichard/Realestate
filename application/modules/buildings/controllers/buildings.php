<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buildings extends MY_Controller
{

	

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model("m_buildings");
    }
  

    function index()
	{
		$data['house_types']  = $this->get_housetype();
		$data['estate_types'] = $this->get_estate();

		$this->load->view('buildings', $data);
	}
	

	function get_estate()
	{
        $results = $this->m_buildings->get_estates();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        $est = '<option>Select the Estate</option>';

        foreach ($results as $value) {
            $est.= '<option value="' . $value['est_id'] . '">' . $value['est_name'] . '</option>';  
        }
        return $est;
	}

	function get_housetype()
	{
        $results = $this->m_buildings->get_housetype();
        
        //echo '<pre>';print_r($results);echo '</pre>';die;
        $htype = '<option>Select the House Type</option>';

        foreach ($results as $value) {
            $htype .= '<option value="' . $value['housetype_id'] . '">' . $value['house_type'] . '</option>';  
        }
        return $htype;
	}

	function add_building()
	{
		
	   $result = $this->m_buildings->enter_building();
        //echo $result;die();
	}
    


}