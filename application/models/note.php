<?php

class Note extends CI_Model {

	public function create_note($title, $description = null) {
		$query = "INSERT INTO notes (title, description, created_on, updated_on) VALUES (?, ?, NOW(), NOW())";
		$this->db->query($query, array($title, $description));
		return $this->db->insert_id();
	}

	public function read_notes() {
		$query = "SELECT * FROM notes";
		return $this->db->query($query)->result_array();
	}

	public function update_note($note_id, $title, $description = null) {
		$query = "UPDATE notes SET title = ?, description = ?, updated_on = NOW() WHERE id = {$note_id}";
		$this->db->query($query, array($title, $description));
	}

	public function delete_note($note_id) {
		$query = "DELETE FROM notes WHERE id = {$note_id}";
		$this->db->query($query);
	}

}

?>