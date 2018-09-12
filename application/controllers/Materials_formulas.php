<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Materials_formulas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('materials_formulas.php',(array)$output);
	}

	public function materials_formulas_management()
	{
		try{
                        $crud = new grocery_CRUD();

                        $crud->set_theme('bootstrap-v4');
						//$crud->set_table('recipe');
						$crud->set_table('formula_material');
						$crud->set_subject('配方原料組合');
						$crud->unset_fields('unit_id');
						$crud->set_relation('material_id', "material",'label');
						$crud->set_relation('formula_id', "formula",'name');
                        $crud->display_as('formula_id', '配方');
                        $crud->display_as('material_id', '原料');
                        $crud->display_as('amount', '總重量');
                        $crud->display_as('sort', '排序');
						//$crud->set_relation('ingredient_id', "ingredient",'label');

						$output = $crud->render();

						$this->_example_output($output);

                }catch(Exception $e){
                        show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

}
