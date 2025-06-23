<?php

use Arden\ContactController;

include __DIR__ . '/DBDriver/include.php';
include __DIR__ . '/BaseController.php';
include __DIR__ . '/Model.php';
include __DIR__ . '/Enums/Types.php';
include __DIR__ . '/ContactController.php';
include __DIR__ . '/ContactModel.php';

$ContactController = new ContactController($_POST);