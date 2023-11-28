<?php
class UserController extends Controller
{
     public function defaultMethod()
     {
          $this->loginUser();
     }

     public function loginUser()
     {
          if (!empty($_POST)) {
               $login = $this->model->login();
               if ($login) {
                    SessionHelper::login();
                    header('Location: ' . BASE_URL . 'employee');
               } else {
                    $this->view->messageType = "error";
                    $this->view->message = "Wrong email or password";
                    $this->view->render('login');
               }
          } else {
               $this->view->render('login');
          }
     }

     public function logoutUser()
     {
          if (empty($_POST)) {
               SessionHelper::logout(false);
          } else {
               $this->loginUser();
          }
     }
}
