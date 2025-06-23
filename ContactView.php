<?php

namespace Arden;

class ContactView extends View
{
    public function __construct($data = null)
    {
        if ($data) {
            $this->data = $data;
        }
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

    public function render() {
        // Render Contact form,
        //Moved Header out so it's easier to display the error "nicely"
        echo '
            <form method="POST" action="contact.php">
            <span>Name:<input type="text" value="'.$this->data['name'].'" name="name"/></span><br/>
            <span>Email:<input type="email" value="'.$this->data['email'].'" name="email"/></span><br/>
            <span>Message:<textarea name="message">'.$this->data['message'].'</textarea></span><br/>
            <button type="submit">Send</button>
            </form>';
    }
}
