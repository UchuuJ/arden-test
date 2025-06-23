<?php
namespace DBDriver;

class LoadConfig
{
    const SETTING_NAME = 0,
        SETTING_OPTION =1,
        DB_HOST = 0,
        DB_NAME = 1,
        DB_USERNAME = 2,
        DB_PASSWORD = 3;
    private $file = '.env';
    private $settings = [
        'DB_HOST',
        'DB_NAME',
        'DB_USERNAME',
        'DB_PASSWORD',
    ];

    /**
     * This method loads our .env file.
     * We pass a reference through because the data is in the object that instanced this
     * helper class
     */
    public function load(&$host, &$userName, &$password, &$dbName)
    {
       /**
        * open .env
        */
       $fileHandler = fopen($this->file, 'r');
       if(!$fileHandler){
           throw new \Exception("Unable to open .env file!",500);
       }

       $fileData = fread($fileHandler, filesize($this->file));
       fclose($fileHandler);
       if(strlen($fileData) == false) {
           throw new \Exception("Empty .env file!",500);
       }
       /**
        * We split the config into lines
        * and then loop though trying to find the matching setting
        * if it matches we set the setting
        */
       $fileDataArray = explode("\n", $fileData);
       foreach ($fileDataArray as $line) {
           $userSetting = explode("=",$line);
           if($userSetting[self::SETTING_NAME] == $this->settings[self::DB_HOST]) {
               $host = $userSetting[self::SETTING_OPTION];
           } else if($userSetting[self::SETTING_NAME] == $this->settings[self::DB_NAME]) {
               $dbName = $userSetting[self::SETTING_OPTION];
           } else if($userSetting[self::SETTING_NAME] == $this->settings[self::DB_USERNAME]) {
               $userName = $userSetting[self::SETTING_OPTION];
           } else if($userSetting[self::SETTING_NAME] == $this->settings[self::DB_PASSWORD]) {
               $password = $userSetting[self::SETTING_OPTION];
           }
       }


        return true;
    }
}