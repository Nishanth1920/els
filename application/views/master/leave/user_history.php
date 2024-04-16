<!-- Leave History Table -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark py-3">
                    <h6 class="m-0 font-weight-bold text-light">Leave History</h6>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr style="text-align: center;">
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Reason</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Applied On</th>
                                    <th>Status</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($leave_history)): ?>
                                    <?php foreach ($leave_history as $index => $leave): ?>
                                        <tr style="text-align: center;">
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $leave['staff_id'] ?></td>
                                            <td><?= $leave['leave_reason'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($leave['leave_from'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($leave['leave_to'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($leave['applied_on'])) ?></td>
                                            <td>
                                                <?php if ($leave['status'] == 0): ?>
                                                    <span class="badge badge-info">
                                                        <i class="fas fa-clock"></i> Pending
                                                    </span>
                                                <?php elseif ($leave['status'] == 1): ?>
                                                    <span class="badge badge-success">
                                                        <i class="fas fa-check-circle"></i> Approved
                                                    </span>
                                                <?php elseif ($leave['status'] == 2): ?>
                                                    <span class="badge badge-danger">
                                                        <i class="fas fa-times-circle"></i> Rejected
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <!-- <td style="text-align: center;">
                                                <a href="<?= base_url('leave/userdelete/' . $leave['id']) ?>"
                                                    class="delete-leave" data-toggle="modal" data-target="#deleteModal">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>
                                            </td> -->

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">No leave history available</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?= base_url('profile') ?>" class="btn btn-dark btn-sm"> <!-- Adjusted button size -->
                        <i class="fas fa-arrow-left mr-2"></i> Go Back
                    </a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!-- Bootstrap Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this leave record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" id="confirmDelete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- Add these lines before the closing </body> tag -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.delete-leave').on('click', function () {
            // Get the URL to delete the leave record
            var url = $(this).attr('href');
            // Set the href attribute of the confirmation button in the modal
            $('#confirmDelete').attr('href', url);
        });
    });
</script>