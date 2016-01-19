<?php

class Personal_m extends CI_Model {

   	public function __construct()
    {
        parent::__construct();

    }

    public function insertar()
    {

        $datos = array(
            "dni" => $this->input->post("dni"),
            "direccion" => $this->input->post("direccion"),
            "email" => $this->input->post("email"),
            "sector" => $this->input->post("idsector"),
            "nombre" => $this->input->post("nombres"),
            "apellido_paterno" => $this->input->post("apellido_paterno"),
            "apellido_materno" => $this->input->post("apellido_materno"),
            "clave" => $this->input->post("dni"),
            "telefono" => $this->input->post("telefono"),
            "usuario" => $this->input->post("dni"),
            "id_perfil_usuario" => $this->input->post("idperfil"),
            "estado" => "1"
            );


        $r = $this->db->insert("empleado",$datos);
        return $r;
    }

    public function modificar_perfil()
    {


        $datos = array(
            "descripcion" => $this->input->post("descripcion")
            );

        $this->db->where("id_perfil_usuario",$this->input->post("idperfil"));
        $r = $this->db->update("perfil_usuario",$datos);
        return $r;
    }

    public function todos()
    {
       $this->db->where("estado","1");
       $this->db->order_by("id_empleado","desc");
       $r = $this->db->get("empleado");
       return $r->result();
    }

    public function get_departamentos()
    {
        $r = $this->db->get("departamentos");
        return $r->result();
    }

    public function get_provincias()
    {
        $r = $this->db->get_where("provincias",array("iddepartamento"=>$this->input->post("iddepartamento")));
        return $r->result();
    }

    public function get_distritos()
    {
        $r = $this->db->get_where("distritos",array("idprovincia"=>$this->input->post("idprovincia")));
        return $r->result();
    }

    public function get_sectores()
    {
        $r = $this->db->get_where("sector",array("iddistrito"=>$this->input->post("iddistrito")));
        return $r->result();
    }


    public function eliminar_perfil()
    {
       $datos = array(
            "estado" => "0"
            );

        $this->db->where("id_perfil_usuario",$this->input->post("idperfil"));
        $r = $this->db->update("perfil_usuario",$datos);
        return $r;
    }

    public function insertar_nuevo_sector()
    {
        $datos = array(
                "descripcion" => $this->input->post("nuevo_sector"),
                "iddistrito" => $this->input->post("iddistrito")
            );

       $r = $this->db->insert("sector",$datos);
       return $r;
    }

}
?>