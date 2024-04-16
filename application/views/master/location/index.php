<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-flex w-100 align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <h1 class="h3 mb-0 text-gray-800 font-weight-bold"><?= $title; ?></h1>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
      <a href="<?= base_url('master/a_location'); ?>" class="btn btn-primary btn-sm rounded-pill shadow-sm py-2 px-3">
        <span class="icon mr-2">
          <i class="fas fa-map-marker-alt"></i>
        </span>
        <span class="text">Add New Location</span>
      </a>
    </div>

  </div>
  <hr>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Data Table Location-->
  <div class="card shadow mb-4 rounded-0">
    <div class="card-header py-3 bg-primary">
      <h6 class="m-0 font-weight-bold text-white">
        <i class="fas fa-map-marker-alt mr-2"></i> <!-- Font Awesome icon -->
        Location Table
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <colgroup>
            <col width="10%">
            <col width="75%">
            <col width="15%">
          </colgroup>
          <thead style=" text-align: center;">
            <tr>
              <th>#</th>
              <th>Location Name</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody style=" text-align: center;">
            <?php
            $i = 1;
            foreach ($location as $lct):
              ?>
              <tr>
                <td class="align-middle"><?= $i++; ?></td>
                <td class="align-middle"><?= $lct['name']; ?></td>
                <td class="align-middle text-center">
                  <a href="<?= base_url('master/e_location/') . $lct['id'] ?>"
                    class="btn btn-primary rounded-0 btn-sm text-xs">
                    <span class="icon text-white" title="Edit">
                      <i class="fas fa-edit"></i>
                    </span>
                  </a> |
                  <a href="<?= base_url('master/d_location/') . $lct['id'] ?>"
                    class="btn btn-danger rounded-0 btn-sm text-xs"
                    onclick="return confirm('Deleted Location will lost forever. Still want to delete?')">
                    <span class="icon text-white" title="Delete">
                      <i class="fas fa-trash-alt"></i>
                    </span>
                  </a>
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

</div>
<!-- End of Main Content -->