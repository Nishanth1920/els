<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Check for success or error messages -->
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('success'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php elseif ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $this->session->flashdata('error'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>

  <div class="card rounded-0 shadow">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h3 class="card-title font-weight-bolder text-dark h3 mb-0"><?= $account['name'] ?></h3>
      <!-- Buttons -->
      <div>
        <!-- Button to trigger Apply Leave Modal -->
        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#applyLeaveModal">
          <i class="fas fa-plus-circle mr-1"></i> Apply Leave
        </button>
        <!-- Button to link to Leave History -->
        <a href="<?= base_url('leave/user_history'); ?>" class="btn btn-secondary btn-sm">
          <i class="fas fa-history mr-1"></i> Leave History
        </a>
      </div>

    </div>
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
          <!-- left -->
          <div class="col-sm-10 col-md-5 col-lg-4 col-xl-3 offset-sm-1 offset-md-0 offset-lg-0 offset-xl-0 text-center">
            <img src="/els/images/pp/<?= $account['image']; ?>" class="rounded-circle img-thumbnail mx-auto d-block"
              alt="Profile Picture"  style="width: 400px; height: 230px;margin-top:30px">
          </div>
          <!-- right -->
          <div class="col-sm-10 col-md-6 offset-sm-1">
            <h1 class="h3 text-white bg-gradient-dark p-1 rounded-0 mt-1 mb-3">Information</h1>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Employee ID</th>
                  <td>: <?= $account['id']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Gender</th>
                  <td>: <?= ($account['gender'] == 'M') ? 'Male' : 'Female'; ?></td>
                </tr>
                <tr>
                  <th scope="row">Department</th>
                  <td>: <?= $account['department'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Birthday</th>
                  <td>: <?= $account['birth_date']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Joined On</th>
                  <td>: <?= $account['hire_date'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->

<!-- Apply Leave Modal -->
<div class="modal fade" id="applyLeaveModal" tabindex="-1" role="dialog" aria-labelledby="applyLeaveModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="applyLeaveModalLabel">Apply Leave</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Your form content goes here -->
        <form action="<?= base_url('leave/insert'); ?>" method="post">

          <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" name="txtreason" id="reason" class="form-control" placeholder="Reason">
          </div>
          <div class="form-group">
            <label for="leave_from">Leave From</label>
            <input type="date" name="txtleavefrom" id="leave_from" class="form-control">
          </div>
          <div class="form-group">
            <label for="leave_to">Leave To</label>
            <input type="date" name="txtleaveto" id="leave_to" class="form-control">
          </div>
          <!-- <div class="form-group">
            <label for="description">Description</label>
            <textarea name="txtdescription" id="description" class="form-control" placeholder="Description"></textarea>
          </div> -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>