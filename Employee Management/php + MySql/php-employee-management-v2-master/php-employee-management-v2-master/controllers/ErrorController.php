<?php
class ErrorController extends Controller
{
    function __construct()
    {

        parent::__construct();
        $this->view->message = "400. Ilegal request";
        $this->view->render('error');
    }
}
