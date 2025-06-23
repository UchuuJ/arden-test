<?php

namespace Arden;

use Arden\Model;

class ContactModel extends Model
{
    public function __construct($data)
    {
        parent::__construct();
        $this->data = [
            'name' => $data['name'] ?? '',
            'email' => $data['email'] ?? '',
            'message'=> $data['message'] ?? '',
        ];
    }

    public function getData()
    {
        return $this->data;
    }

    public function persist()
    {
        $this->database->insert($this->data,'contact');
    }

}
