<?php
require_once APPPATH.'third_party/Classes/PHPExcel.php';
class Sach extends My_controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('sachmodel');

    }
    function home() 
    {
        $data = array();
        $data['temp'] = 'sach/home';
        $list = $this->sachmodel->get_list();
        $data['list'] = $list;
        $this->load->view('sach/index', $data);
    }
    function add() 
    {
        $data = array();
        $data['temp'] = 'sach/add';
        if($this->input->post()) {
            if ($this->input->post('SoForm')==1) {
                $tensach = $this->input->post('TenSach0');
                $tentacgia = $this->input->post('TenTacGia0');
                $input = array('TenSach'=>$tensach,'TenTacGia'=>$tentacgia);
                $this->sachmodel->add($input);
                $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"> Thêm thành công </div>');
            }
            if ($this->input->post('SoForm')>1) {
                $tensach = $this->input->post('TenSach0');
                $tentacgia = $this->input->post('TenTacGia0');
                $input=array('TenSach'=>$tensach,'TenTacGia'=>$tentacgia);
                $this->sachmodel->add($input);
                foreach ($this->input->post('Sach') as $ds) {
                    $ts = $ds['TenSach'];
                    $ttg = $ds['TenTacGia'];
                    $ip = array('TenSach'=>$ts,'TenTacGia'=>$ttg);
                    $this->sachmodel->add($ip);
                    $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert"> Thêm thành công </div>');
                }
            }
        }
        $this->load->view('sach/index',$data);
    }
    
    function edit() 
    {
        $data = array();
        $data['temp'] ='sach/edit';
        $id = $this->uri->segment(3);
        $row = $this->sachmodel->get_info($id);
        $data['row'] = $row;
        if ($this->input->post()) {
            $tensach = $this->input->post('TenSach');
            $tentacgia = $this->input->post('TenTacGia');
            $ip = array('TenSach'=>$tensach,'TenTacGia'=>$tentacgia);
            $this->sachmodel->update($id,$ip);
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Edit thành công </div>');
        }
        $this->load->view('sach/index',$data);
        
    }
    function delete() 
    {
        $id = $this->uri->segment(3);
        $this->sachmodel->delete($id);
        $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Xóa thành công </div>');
        redirect(sach_url('index'));
    }

    function index() 
    {
        $data['temp'] = 'sach/test';
        $this->load->view('sach/index',$data);
    }
    function index_ajax($offset = NULL) 
    {
        $search = array(
			'key' => $this->input->post('search_key'),
		);
		
		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$config['base_url'] = site_url('sach/index_ajax/');
		$config['total_rows'] = $this->sachmodel->get_sach($limit, $search, $offset, $count=true);
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li class="page-link">';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-link current" ><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="page-link">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Previous';
		$config['prev_tag_open'] = '<li class="page-link">';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-link">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-link" >';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['sach'] = $this->sachmodel->get_sach($limit, $search, $offset, $count=false);
	
		$data['pagelinks'] = $this->pagination->create_links();
		
		$this->load->view('sach/test_ajax', $data);
    }
    function importExcel() 
    {
        $data = array();
        $data['temp'] = 'sach/import';
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'xlsx';
        $this->load->library('upload', $config);
        $this->load->view('sach/index', $data);
        if ($this->upload->do_upload("Import")) {
            print_r($this->upload->data());
            $path = $this->upload->data()['full_path'];
            $filename = $this->upload->data()['file_name'];
            $objFile = PHPExcel_IOFactory::identify($path);
            $objData = PHPExcel_IOFactory::createReader($objFile);
            $objData -> setReadDataOnly(true);
            $objPHPExcel = $objData->load($path);
            $sheet = $objPHPExcel->setActiveSheetIndex(0);
            $Totalrow = $sheet->getHighestRow();
            $LastColumn = $sheet->getHighestColumn();
            $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
            $data = [];
            for ($i = 1; $i <= $Totalrow; $i++) {
                for ($j = 0; $j < $TotalCol; $j++) {
                    $data[$i - 1][$j] = $sheet->getCellByColumnAndRow($j, $i)->getValue();;
                }
            }
            foreach ($data as $data => $values) {
                $ts = $values[0];
                $ttg = $values[1];
                $ip = array('TenSach'=>$ts,'TenTacGia'=>$ttg);
                $this->sachmodel->add($ip);
            }
            $this->session->set_flashdata('msg','<div class="alert alert-success" role="alert">Import thành công </div>');
            redirect(sach_url('index'));
        }
    }
}
?>