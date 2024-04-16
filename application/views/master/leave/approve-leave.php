<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- Data Table Users-->
  <div class="card shadow mb-4">
    <div class="card-header bg-dark py-3">
      <h6 class="m-0 font-weight-bold text-light">Leave Requests</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="text-align: center;">
            <tr>
              <th>#</th>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>From</th>
              <th>To</th>
              <th>Reason</th>
              <!-- <th>Description</th> -->
              <th>Applied On</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($leave_requests as $index => $request): ?>
              <tr style="text-align: center;">
                <td><?= $index + 1; ?></td>
                <td><?= $request['staff_id']; ?></td>
                <td>
                  <div class="d-flex align-items-center" style="style="width: 40px; height: 40px; border: 2px solid #ccc; border-radius: 50%; overflow: hidden; margin-right: 8px; display: flex; justify-content: center; align-items: center;"" >
                    <img src="/els/images/pp/<?= $request['profile_picture']; ?>" alt="Profile Picture"
                      class="rounded-circle mr-2" style="width: 35px; height: 35px;">
                    <?= $request['name']; ?>
                  </div>
                </td>
                <td><?= $request['email']; ?></td>
                <td><?= $request['leave_from']; ?></td>
                <td><?= $request['leave_to']; ?></td>
                <td><?= $request['leave_reason']; ?></td>
                <!-- <td><?= $request['description']; ?></td> -->
                <td><?= $request['applied_on']; ?></td>
                <td>
                  <button type="button" class="btn btn-success btn-sm rounded-circle ml-2 mr-2" data-toggle="modal"
                    data-target="#approveModal<?= $request['id'] ?>"
                    style="width: 35px; height: 35px; border: none; background-color: #28a745;">
                    <i class="fa fa-check" style="color: white; font-size: 15px;"></i>
                  </button>

                  <!-- Button trigger modal for reject -->
                  <button type="button" class="btn btn-danger btn-sm rounded-circle" data-toggle="modal"
                    data-target="#rejectModal<?= $request['id'] ?>"
                    style="width: 35px; height: 35px; border: none; background-color: #dc3545;">
                    <i class="fa fa-times" style="color: white; font-size: 15px;"></i>
                  </button>



                  <!-- Approve Modal -->
                  <div class="modal fade" id="approveModal<?= $request['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="approveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="approveModalLabel">Confirm Leave Approval</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to approve this leave request?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <a href="<?= base_url('leave/approveLeave/' . $request['id']); ?>"
                            class="btn btn-success">Approve</a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Reject Modal -->
                  <div class="modal fade" id="rejectModal<?= $request['id'] ?>" tabindex="-1" role="dialog"
                    aria-labelledby="rejectModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="rejectModalLabel">Confirm Leave Rejection</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to reject this leave request?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <a href="<?= base_url('leave/rejectLeave/' . $request['id']); ?>"
                            class="btn btn-danger">Reject</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>



              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<!-- End of Main Content -->