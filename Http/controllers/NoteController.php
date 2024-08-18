<?php


namespace App\Controllers;

use App\Core\Database;

class NoteController
{
    public $config;
    public $db;
    public function __construct()
    {
        $this->config = require '../config/config.php';
        $this->db = new Database($this->config);
    }
    public function index()
    {

        $notes = $this->db->query('select * from notes where user_id = :id order by id desc', 1);

        return view('../views/notes/notes.php', [
            'notes' => $notes
        ]);
    }

    public function show()
    {
        $id = $_GET['id'];
        $note = $this->db->findOrFail('notes', $id);
        return view('../views/notes/note.php', [
            'note' => $note
        ]);
    }

    public function create() {}

    public function store() {}

    public function edit() {}

    public function update() {}

    public function destroy() {}
};
