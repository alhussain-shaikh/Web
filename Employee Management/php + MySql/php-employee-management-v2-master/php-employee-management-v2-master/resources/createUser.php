<?php

// Setting query
$createUserTable = "CREATE TABLE IF NOT EXISTS user(
  id INT AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  password VARCHAR(100) NOT NULL,
  email VARCHAR(60) NOT NULL,
  PRIMARY KEY (id)
)";

// Creating table
if ($employeeDBConnection->query($createUserTable) === TRUE) {
  // echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $employeeDBConnection->error;
}

// Filling table
$fillinUserTable = "INSERT INTO user (name, password, email)
VALUES ('admin', '$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC', 'admin@assemblerschool.com')";

// Inserting data
if ($employeeDBConnection->query($fillinUserTable) === TRUE) {
  // echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $employeeDBConnection->error;
}
