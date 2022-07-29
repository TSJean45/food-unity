
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="adminDashboard.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="./assets/img/logoLeaf.png" style="width: 30px;" alt="logo">
        </div>
        <div class="sidebar-brand-text mx-3">Food Unity</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider mb-3">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php echo ($page == 'dashboard') ? "active" : ""; ?>">
        <a class="nav-link" href="adminDashboard.php">
        <img src="./assets/img/lineIcon/dashboard.svg">
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item <?php echo ($page == 'admin') ? "active" : ""; ?>">
      <a class="nav-link" href="admin.php">
        <img src="./assets/img/lineIcon/cog.svg">
          <span>Admin</span>
        </a>
      </li>
      <li class="nav-item <?php echo ($page == 'ticket') ? "active" : ""; ?>">
      <a class="nav-link" href="adminTicket.php">
        <img src="./assets/img/lineIcon/license.svg">
          <span>Ticket</span>
        </a>
      </li>
      <li class="nav-item <?php echo ($page == 'contact') ? "active" : ""; ?>">
      <a class="nav-link" href="contact.php">
        <img src="./assets/img/lineIcon/phone.svg">
          <span>Contact</span>
        </a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="adminLogout.php">
        <img src="./assets/img/lineIcon/exit.svg">
          <span>Log Out</span></a>
      </li>
    </ul>