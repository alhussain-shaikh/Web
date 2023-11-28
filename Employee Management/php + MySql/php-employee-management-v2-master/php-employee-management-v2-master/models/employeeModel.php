<?php
class EmployeeModel extends Model
{
  function __destruct()
  {
    $this->query = null;
  }
  function get()
  {
    try {
      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");

      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare("SELECT id, first_name, email, age, street_number, city, state, postal_code, phone_number FROM employee;");
      $this->query->execute();
      return $this->query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e;
    }
  }

  function insert($employeeArray)
  {
    try {
      $request = "
      INSERT INTO employee
        (first_name,
        last_name,
        email,
        gender,
        city,
        street_number,
        state,
        age,
        postal_code,
        phone_number)
      VALUES 
        ('{$employeeArray['name']}',
        '{$employeeArray['lastName']}',
        '{$employeeArray['email']}',
        '{$employeeArray['gender'][0]}',
        '{$employeeArray['city']}',
        '{$employeeArray['streetAddress']}',
        '{$employeeArray['state']}',
        {$employeeArray['age']},
        '{$employeeArray['postalCode']}',
        '{$employeeArray['phoneNumber']}');
      ";

      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");

      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare($request);
      $this->query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function insertByAjax($employeeArray)
  {
    try {
      $request = "
      INSERT INTO employee
        (first_name,
        email,
        city,
        street_number,
        state,
        age,
        postal_code,
        phone_number)
      VALUES 
        ('{$employeeArray['first_name']}',
        '{$employeeArray['email']}',
        '{$employeeArray['city']}',
        '{$employeeArray['street_number']}',
        '{$employeeArray['state']}',
        {$employeeArray['age']},
        '{$employeeArray['postal_code']}',
        '{$employeeArray['phone_number']}');
      ";

      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");
      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare($request);
      $this->query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function getById(int $id)
  {
    try {
      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");
      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare("SELECT * FROM employee WHERE id = {$id};");
      $this->query->execute();
      $result = $this->query->fetch();
      return $result;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function update(int $id, $employeeArray = [])
  {
    try {
      $request = "
      UPDATE employee
      SET 
        first_name = '{$employeeArray['name']}',
        last_name = '{$employeeArray['lastName']}',
        email = '{$employeeArray['email']}',
        gender = '{$employeeArray['gender'][0]}',
        city = '{$employeeArray['city']}',
        street_number = '{$employeeArray['streetAddress']}',
        state = '{$employeeArray['state']}',
        age = {$employeeArray['age']},
        postal_code = '{$employeeArray['postalCode']}',
        phone_number = '{$employeeArray['phoneNumber']}'
      WHERE id = {$id};
      ";

      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");
      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare($request);
      $this->query->execute();
      return true;
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }

  function delete(int $id)
  {
    try {

      // We check if holidays table exists or not
      $this->query = $this->db->connect()->prepare("SELECT 1 FROM employee LIMIT 1");
      if (!$this->query) {
        // Holiday does not exist, we create it dinamically
        require_once("./resources/createEmployee.php");
      }

      $this->query = $this->db->connect()->prepare("DELETE FROM employee WHERE id = {$id};");
      $this->query->execute();
      if (($this->query->rowCount()) > 0) {
        return true;
      } else {
        return false;
      }
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
}
