<?php
class EmployeeController extends Controller
{
  public function __call($method, $arguments)
  {
    // Method called when no method matches the one passed
    return false;
  }

  public function defaultMethod(bool $isAjaxRequest)
  {
    $this->getEmployees($isAjaxRequest);
  }
  function getEmployees(bool $isAjaxRequest)
  {
    $contents = $this->model->get();
    if ($isAjaxRequest) {
      http_response_code(200);
      header("Content-Type: application/json");
      echo json_encode($contents);
    } else {
      $this->view->render('dashboard');
    }
  }

  function createEmployee(bool $isAjaxRequest)
  {
    if ($isAjaxRequest && $_SERVER['REQUEST_METHOD'] === 'POST') {
      $result = $this->model->insertByAjax($_POST);
      if ($result === true) {
        http_response_code(200);
      } else {
        http_response_code(400);
        echo $result;
      }
    } else {
      if (!empty($_POST)) {
        $result = $this->model->insert($_POST);
        if ($result) {
          header('Location: ./employee');
        } else {
          $message = $result;
          $messageType = 'danger';
          $this->view->message = $message;
          $this->view->messageType = $messageType;
        }
      }
      $this->view->render('employee');
    }
  }

  function getByIdEmployee($id)
  {
    $result = $this->model->getById($id[0]);
    if (is_array($result)) {
      $this->view->employee = $result;
    } else {
      $message =  'Id not found';
      $messageType = 'danger';
      $this->view->message = $message;
      $this->view->messageType = $messageType;
    }

    $this->view->render('employee');
  }

  function updateEmployee($id)
  {
    if (!empty($_POST)) {
      $result = $this->model->update($id[0], $_POST);
      if ($result === true) {
        $message = 'Updated employee';
        $messageType = 'success';
      } else {
        $message = $result;
        $messageType = 'danger';
      }
      $this->view->message = $message;
      $this->view->messageType = $messageType;
    }
    $this->getByIdEmployee($id);
  }

  function deleteEmployee($params)
  {
    $id = $params[0];
    $isAjaxRequest = $params[count($params) - 1];
    if ($isAjaxRequest && $_SERVER['REQUEST_METHOD'] === 'DELETE') {

      $result = $this->model->delete($id);
      if ($result === true) {
        http_response_code(200);
      } elseif ($result === false) {
        http_response_code(400);
      } else {
        http_response_code(400);
        echo $result;
      }
    }
  }
}
