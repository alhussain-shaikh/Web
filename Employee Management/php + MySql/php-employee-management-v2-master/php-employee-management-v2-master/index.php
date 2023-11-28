<?php

require_once 'config/baseConstants.php';
require_once 'config/constants.php';
require_once 'config/db.php';
require_once LIBS . '/classes/Database.php';
require_once LIBS . '/classes/Controller.php';
require_once LIBS . '/classes/View.php';
require_once LIBS . '/classes/Model.php';
require_once LIBS . '/classes/SessionHelper.php';
require_once LIBS . '/Router.php';

$router = new Router();
