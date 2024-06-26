<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Departments Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-primary text-white h-100">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">Departments</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $display['c_department']; ?></div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
          <a class="small text-primary stretched-link" href="<?= base_url('master') ?>">
            <i class="fas fa-building fa-2x mr-2"></i>
            <span class="text-primary">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Shifts Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-info text-white h-100">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">Shifts</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $display['c_shift']; ?></div>
        </div>
        <div class="card-footer bg-light">
          <a class="small text-info stretched-link" href="<?= base_url('master/shift') ?>">
            <i class="fas fa-exchange-alt fa-2x mr-2"></i>
            <span class="text-info">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Employees Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-success text-white h-100 ">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">Employees</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $display['c_employee']; ?></div>
        </div>
        <div class="card-footer bg-light">
          <a class="small text-success stretched-link" href="<?= base_url('master/employee') ?>">
            <i class="fas fa-id-badge fa-2x mr-2"></i>
            <span class="text-success">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Users Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-danger text-white h-100 ">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">Users</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $display['c_users']; ?></div>
        </div>
        <div class="card-footer bg-light">
          <a class="small text-danger stretched-link" href="<?= base_url('master/users') ?>">
            <i class="fas fa-users fa-2x mr-2"></i>
            <span class="text-danger">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-warning text-white h-100">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">Pending Requests</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $pending_leave_requests_count ?></div>
        </div>
        <div class="card-footer bg-light">
          <a class="small text-warning stretched-link" href="<?= base_url('leave/leaveRequests') ?>">
            <i class="fas fa-bell fa-2x mr-2"></i>
            <span class="text-warning">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- All Leave Requests Card -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="card bg-secondary text-white h-100 ">
        <div class="card-body">
          <div class="text-lg font-weight-bold mb-1">All Leave Requests</div>
          <div class="h5 mb-0 font-weight-bold text-right"><?= $all_leave_requests_count ?></div>
        </div>
        <div class="card-footer bg-light">
          <a class="small text-secondary stretched-link" href="<?= base_url('leave/admin_history') ?>">
            <i class="fas fa-user-clock fa-2x mr-2"></i>
            <span class="text-secondary">View Details</span>
            <i class="fas fa-arrow-right ml-2"></i>
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->


  <!-- Content Row -->

  <div class="row">

    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <!-- Pie Chart -->
      <div class="col p-0">
        <div class="card shadow mb-4 rounded-0 ">
          <!-- Card Header - Dropdown -->
          <div
            class="card-header py-3 d-flex flex-rowz align-items-center justify-content-between bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Departments' Employees</h6>
            <a class="text-reset font-weight-bolder text-muted" title="Go to Department List"
              href="<?= base_url('admin') ?>"><i class="fa fa-arrow-right"></i></a>
          </div>
          <!-- Card Body -->
          <div class="card-body overflow-auto" style="max-height: 400px;">
            <table class="table table-bordered table-striped">
              <thead class="text-dark" style=" text-align: center;">
                <tr>
                  <th class="text-center p-1" scope="col">#</th>
                  <th class="p-1" scope="col">Dept Code</th>
                  <th class="p-1" scope="col">Employees</th>
                </tr>
              </thead>
              <tbody style=" text-align: center;">
                <?php $i = 1;
                foreach ($d_list as $d): ?>
                  <tr>
                    <th class="text-center p-1" scope="row"><?= $i++ ?></th>
                    <td class="p-1"><?= $d['d_id'] ?></td>
                    <td class="p-1"><?= number_format($d['qty']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <div class="col p-0">
        <div class="card shadow mb-4 rounded-0">
          <!-- Card Header - Dropdown -->
          <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Employees per Shift</h6>
          </div>
          <!-- Card Body -->
          <div class="card-body" style="max-height: 370px;">
            <table class="table table-bordered table-striped ">
              <thead class="text-dark" style=" text-align: center;">
                <tr>
                  <th class="text-center p-1" scope="col">#</th>
                  <th class="p-1" scope="col">Shift</th>
                  <th class="p-1" scope="col">Employees</th>
                </tr>
              </thead>
              <tbody style=" text-align: center;">
                <?php $i = 1;
                foreach ($s_list as $s): ?>
                  <?php if ($s['s_id'] == 0) {
                    continue;
                  }
                  ?>
                  <tr>
                    <th class="text-center p-1" scope="row"><?= $i++ ?></th>
                    <td class="p-1 align-middle">Shift: <?= $s['s_id'] ?>
                      <small>(<?= date('h:i A', strtotime("2022-06-23" . $s['start'])) ?> -
                        <?= date('h:i A', strtotime("2022-06-23" . $s['end'])) ?>)</small>
                    </td>
                    <td class="p-1"><?= number_format($s['qty']) ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->