<?php

namespace Arden;

use OpeningTimesModel;
use TopFiveProductsModel;

use Arden\Enum\Types;


/** Contact Controller, controls the sending of mail and storing of contact data*/
class ContactController extends BaseController
{
    /**
     * We load in the Contact data that was posted
     */
    private $ContactModel;
    public function __construct($post)
    {
        //Store already sent data in session incase it invalidates
        // so we can redisplay it on the contact form
        unset($_SESSION);
        session_start();


        if(!$this->validate($post)){
            $_SESSION = $_SESSION + $post;
            header('Location: index.php');
            exit;
        }
        session_destroy();
        //New session so we can diplay a success
        session_start();
        $_SESSION['success'] = true;
        $this->ContactModel = new ContactModel($post);
        $this->ContactModel->persist();
        $this->sendMail();
        header('Location: index.php');
    }

    public function validate($data){
        /**
         * Super simple validation
         * Check we have a charater and a email is 'valid'
        */
        if(!strlen($data['name']) || !strlen($data['email']) || !strlen($data['message'])){
            $_SESSION['error'] = 'Empty Fields';
            return false;
        }

        if(!stripos($data['email'], '@') || !stripos($data['email'], '.') ) {
            $_SESSION['error'] = 'Invalid EMAIL';
            return false;
        }

        return true;

    }

    public function sendMail(){
        /** I Usually use a third party service....
         * soooo probably not going to work unless you have smtp set up, this is how I would impliment it
         */

        /**
         * Just wanted to flex some UNIX knowlege
         * Computer host name is stored in /etc/hostname.
         * But this should be set in a .env and used from there instead
         */

        $hostFile = fopen('/etc/hostname','r');
        $hostName = fread($hostFile, filesize('/etc/hostname'));
        fclose($hostFile);


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        $headers .= 'From: <no-reply@'.$hostName.'>'."\r\n";

        mail($this->ContactModel->getData()['email'],'New Website Response',$this->ContactModel->getData()['message']);
    }
    public function getModelData($type = null) {
        return $this->ContactModel;
    }
}
