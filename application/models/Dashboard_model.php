<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard_model extends CI_Model
{
    var $table = 'link';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_datatables()
    {
        $this->get_datatables_query();
        if ($this->input->post('length')) {
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id_link', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function tambah($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data) 
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();    
    }
    
    public function delete_by_id($id)
    {
        $this->db->where('id_link', $id);
        $this->db->delete($this->table);
    }
}
