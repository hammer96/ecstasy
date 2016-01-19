<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Personal_m');
		$this->load->model('Principal_m');
		$this->load->model('Perfiles_m');
		$this->load->helper("form");

	}

	public function insert_nuevo_perfil()
	{
		$r = $this->Perfiles_m->guardar_perfil();
		if($r)
		{
			$res = $this->traer_perfil()."|1";
			echo $res;
		}
		else
		{
			$res = $this->traer_perfil()."|0";
			echo $res;
		}
	}

	public function traer_perfil()
	{

		$distritos = $this->Perfiles_m->todos();
		$array = array();
		$array[""] = "Seleccione Perfil";

		foreach ($distritos as $value)
		{
			$array[$value->id_perfil_usuario] = $value->descripcion;
		}

		echo form_dropdown('idperfil_usuario', $array, '', 'class="form-control"');

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

		if($this->input->post())
		{
			if($this->input->post("id_empleado"))
			{
				$r = $this->Personal_m->modificar();
			}
			else
			{
				$r = $this->Personal_m->insertar();
				if($r)
				{
					echo 1;
				}
				else
				{
					echo 0;
				}
			}
			// redirect("Personal_c");
		}
		else
		{
			$permisos = $this->Principal_m->traer_modulos();
			$departamentos = $this->Personal_m->get_departamentos();
			$perfil = $this->Perfiles_m->todos();
			$depa = array();
			$perfiles = array();
			$depa[""] = "Seleccione Departamento";
			$perfiles[""] = "Seleccione Perfil";
			foreach ($departamentos as $value)
			{
				$depa[$value->iddepartamento] = $value->departamento;
			}

			foreach ($perfil as $value)
			{
				$perfiles[$value->id_perfil_usuario] = $value->descripcion;
			}

			$data["departamentos"] = $depa;
			$data["permisos"] = $permisos;
			$data["perfiles"] = $perfiles;

			$this->load->view('seguridad/personal/nuevo_v',$data);
		}
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
			$res = $this->traer_sector()."|1";
			echo $res;
		}
		else
		{
			$res = $this->traer_sector()."|0";
			echo $res;
		}
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */