<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('note');
	}

	public function index()
	{
		$this->load->view('index', array('notes' => $this->note->read_notes()));
	}

	public function process_note() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Note\'s Title', 'required');
		if($this->form_validation->run()) {
			$note_id = $this->create_note($this->input->post('title'), $this->input->post('description'));
			$data = array('note_id' => $note_id,
						  'title' => $this->input->post('title'),
						  'description' => $this->input->post('description'));
			echo json_encode($data);
		} else {
			$data = array('createflag' => false,
						  'errors' => validation_errors());
			echo json_encode($data);
		}
	}

	public function process_update() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Note\'s Title', 'required');
		if($this->form_validation->run()) {
			$this->update_note($this->input->post('note_id'), $this->input->post('title'), $this->input->post('description'));
		} else {
			$data = array('updateflag' => false,
						  'errors' => validation_errors());
			echo json_encode($data);
		}
	}

	public function create_note($title, $description = null) {
		return $this->note->create_note($title, $description);
	}

	public function update_note($note_id, $title, $description = null) {
		$this->note->update_note($note_id, $title, $description);
	}

	public function delete_note($note_id) {
		$this->note->delete_note(intval($note_id));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */