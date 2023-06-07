<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FIS Admin</title>

  <!-- MATERIAL CDN <ARNOLD>-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

  <!-- STYLESHEET <ARNOLD>-->
  <link rel="stylesheet" href="./style.css">
</head>

<body>
  <div class="container">
    <?php
    $currentFile = $_SERVER['PHP_SELF'];
    $dashboardActive = '';
    $internsActive = '';
    $reportsActive = '';
    $accountsActive = '';
    $loginActive = '';
    $OTActive = '';


    if (strpos($currentFile, 'dashboard.php') !== false) {
      $dashboardActive = 'class="active"';
    } elseif (strpos($currentFile, 'Interns.php') !== false) {
      $internsActive = 'class="active"';
    } elseif (strpos($currentFile, 'Reports.php') !== false) {
      $reportsActive = 'class="active"';
    } elseif (strpos($currentFile, 'listOfAccounts.php') !== false) {
      $accountsActive = 'class="active"';
    } elseif (strpos($currentFile, 'login_admin.php') !== false) {
      $loginActive = 'class="active"';
    } elseif (strpos($currentFile, 'OT.php') !== false) {
      $OTActive = 'class="active"';
    }
    ?>

    <aside>
      <div class="top">
        <div class="logo">
          <img src="./images/logo1.jpg">
          <h2>Admin <span class="primary">Panel</span></h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">close</span>
        </div>
      </div>
      <div class="sidebar">
        <a href="dashboard.php" <?php echo $dashboardActive; ?>>
          <span class="material-icons-sharp">dashboard</span>
          <h3>Dashboard</h3>
        </a>
        <a href="Interns.php" <?php echo $internsActive; ?>>
          <span class="material-icons-sharp">groups</span>
          <h3>Interns</h3>
        </a>
        <a href="Reports.php" <?php echo $reportsActive; ?>>
          <span class="material-icons-sharp">description</span>
          <h3>Reports</h3>
        </a>
        <a href="listOfAccounts.php" <?php echo $accountsActive; ?>>
          <span class="material-icons-sharp">dashboard</span>
          <h3>List of Accounts</h3>
        </a>
        <a href="OT.php" <?php echo $OTActive; ?>>
          <span class="material-icons-sharp">assignment_ind</span>
          <h3>OT Request</h3>
          <span class="message-count">32</span>
        </a>
        <a href="login_admin.php" <?php echo $loginActive; ?>>
          <span class="material-icons-sharp">logout</span>
          <h3>Logout</h3>
        </a>
      </div>
    </aside>



    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-icons-sharp">menu</span>
        </button>
        <div class="theme-toggler">
          <span class="material-icons-sharp active">light_mode</span>
          <span class="material-icons-sharp">dark_mode</span>
        </div>
        <div class="profile">
          <div class="info">
            <p>Hello, <b>Arnold</b></p>
            <small class="text-muted">Admin</small>
          </div>
          <div class="profile-photo">
            <img src="images/zoomDP2x2.jpg" alt="profile">
          </div>
        </div>
      </div>

</html>