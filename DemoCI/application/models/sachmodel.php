<?php
    class Sachmodel extends My_model
    {
        function __construct() {
            parent::__construct();
            $this->table='sach';
        }
        public function get_sach($limit, $search, $offset, $count=true) {
            $this->db->select("*");
            $this->db->from("sach");
            if($search){
                $search_key=$search['key'];
                if($search_key){
                    $this->db->where("TenSach LIKE '%$search_key%'");
                }
            }
            if($count){
                return $this->db->count_all_results();
            }
            else{
                $this->db->limit($limit, $offset);
                $query=$this->db->get();
                if($query->num_rows() >0) {
                    return $query->result();
                }
            }
            return array();
        }
    }
?>