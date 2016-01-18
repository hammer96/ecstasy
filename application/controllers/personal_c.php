<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personal_m');
		$this->load->model('Principal_m');
		$this->load->helper("form");

	}


	public function index()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$personal = $this->Personal_m->todos();
		$data["permisos"] = $permisos;
		$data["personal"] = $personal;
		$this->load->view('seguridad/personal/personal_v',$data);
	}



	public function insertar()
	{
		$r = $this->Personal_m->insertar();

		if($r == true)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}

	public function nuevo()
	{
		$permisos = $this->Principal_m->traer_modulos();
		$departamentos = $this->Personal_m->get_departamentos();
		$depa = array();
		$depa[""] = "Seleccione Departamento";

		foreach ($departamentos as $value)
		{
			$depa[$value->iddepartamento] = $value->departamento;
		}

		$data["departamentos"] = $depa;
		$data["permisos"] = $permisos;
		$this->load->view('seguridad/personal/nuevo_v',$data);
	}

	public function traer_provincia()
	{
		$provincias = $this->Personal_m->get_provincias();
		$array = array();
		$array[""] = "Seleccione Provincia";

		foreach ($provincias as $value)
		{
			$array[$value->idprovincia] = $value->provincia;
		}

		echo form_dropdown('idprovincia', $array, '', 'class="form-control" onchange="traer_distrito(this.value)"');

	}

	public function traer_distrito()
	{

		$distritos = $this->Personal_m->get_distritos();
		$array = array();
		$array[""] = "Seleccione Distrito";


		foreach ($distritos as $value)
		{
			$array[$value->iddistrito] = $value->distrito;
		}

		echo form_dropdown('iddistrito', $array, '', 'class="form-control" onchange="traer_sector(this.value)"');

	}

	public function traer_sector()
	{

		$distritos = $this->Personal_m->get_sectores();
		$array = array();
		$array[""] = "Seleccione Sector";


		foreach ($distritos as $value)
		{
			$array[$value->idsector] = $value->descripcion;
		}

		echo form_dropdown('idsector', $array, '', 'class="form-control"');

	}

	public function insert_nuevo_sector()
	{

		$r = $this->Personal_m->insertar_nuevo_sector();

		if($r)
		{
			echo "1|".$this->traer_sector();
		}
		else
		{
			echo "0|".$this->traer_sector();
		}
	}

	public function nuevo_personal()
	{
		if($this->input->post())
		{

		}
		else
		{

		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */