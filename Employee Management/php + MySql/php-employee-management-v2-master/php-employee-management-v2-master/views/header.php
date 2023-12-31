<div class="card-header d-flex align-items-center">
  <div class="d-flex mr-5">
    <img class="mr-2" src="<?php echo BASE_URL ?>/node_modules/bootstrap-icons/icons/file-earmark-person.svg" alt="" width="20" height="20" />
    <h6 class="m-0">Employees Management</h6>
  </div>
  <div class="d-flex">
    <a href="<?= BASE_URL ?>employee" class="mr-2 nav" id="dashboard">Dashboard</a>
    <a href="<?= BASE_URL ?>employee/create" class="mr-2 nav" id="employee">Employee</a>
  </div>
  <a href="user/logout" class="ml-auto text-muted justify-self-end">Logout</a>
</div>

<script>
  let completePath = window.location.pathname;
  let currentPath = completePath.split("/");
  currentPath = currentPath[currentPath.length - 1];
  if (currentPath === "dashboard.php") {
    $("#dashboard").addClass("text-primary");
    $("#employee").addClass("text-muted");
  } else if (currentPath === "employee.php") {
    $("#dashboard").addClass("text-muted");
    $("#employee").addClass("text-primary");
  }
</script>