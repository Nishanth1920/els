<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon">
      <img src="/els/assets/img/star.jpeg" alt="" class="img-thumbnail rounded-circle border-3 p-0" id="system-logo">
    </div>
    <div class="sidebar-brand-text mx-3 text-lowercase">ner<span class="text-uppercase">x</span>pire</div>
  </a>

  <!-- Query Menu -->
  <?php
  $role_id = $this->session->userdata('role_id');

  $queryMenu = "SELECT `user_menu`.`id`, `menu`
                      FROM `user_menu` JOIN `user_access`
                        ON `user_menu`.`id` = `user_access`.`menu_id`
                     WHERE `user_access`.`role_id` = $role_id
                  ORDER BY `user_access`.`menu_id` ASC";

  $menu = $this->db->query($queryMenu)->result_array();

  foreach ($menu as $mn):
    ?>

    <div class="sidebar-heading">
      <?= $mn['menu']; ?>
    </div>

    <?php
    $menuId = $mn['id'];

    $querySubMenu = "SELECT * FROM `user_submenu`
                                 WHERE `menu_id` = $menuId 
                                   AND `is_active` = 1";

    $subMenu = $this->db->query($querySubMenu)->result_array();

    foreach ($subMenu as $sm):
      if ($title == $sm['title']):
        ?>
        <li class="nav-item active">
        <?php else: ?>
        <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span>
            <?= $sm['title']; ?>
          </span>
        </a>
      </li>

    <?php endforeach; ?>
    <hr class="sidebar-divider mt-3">
  <?php endforeach; ?>

  <!-- Leave Management Heading -->
  <?php
  // Check if the user is an admin
  $is_admin = $this->session->userdata('role_id') == 1; // Assuming role_id 1 represents admin
  
  // Display the code only if the user is an admin
  if ($is_admin):
    ?>
    <div class="sidebar-heading">
      <strong>Leave</strong>
    </div>

    <!-- Leave Management Buttons -->
    <li class="nav-item">
      <a class="nav-link btn btn-link p-1 px-3 py-2" href="<?= base_url('leave/leaveRequests'); ?>">
        <i class="fa fa-share"></i>
        <span>Pending Requests</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link btn btn-link p-1 px-3" href="<?php echo base_url('leave/admin_history'); ?>">
        <i class="fa fa-history"></i>
        <span>History</span>
      </a>
    </li>
    <hr class="sidebar-divider mt-3">
  <?php endif; ?>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->