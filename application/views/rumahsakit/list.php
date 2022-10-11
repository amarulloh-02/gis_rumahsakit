<div class="col-lg-12">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <?= $title ?>
    </div>
    <div class="panel-body">
      <div class="table-responsive">
        <?php if ($this->session->userdata('username') != "") { ?>
          <a href="<?= base_url('rumah_sakit/tambah') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a><br><br>
        <?php } ?>
        <?php
        if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
          echo $this->session->flashdata('sukses');
          echo '</div>';
        }
        ?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Rumah Sakit</th>
              <th>No. Telp</th>
              <th>Alamat</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <?php if ($this->session->userdata('username') != "") { ?>
                <th>Action</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rumahsakit as $key => $value) { ?>
              <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $value->nama_rumahsakit ?></td>
                <td><?= $value->no_telp ?></td>
                <td><?= $value->alamat ?></td>
                <td><?= $value->latitude ?></td>
                <td><?= $value->longitude ?></td>
                <?php if ($this->session->userdata('username') != "") { ?>
                  <td>
                    <a href="<?= base_url('rumah_sakit/edit/' . $value->id_rumahsakit) ?>" class="btn btn-warning">Edit</a>
                    <a href="<?= base_url('rumah_sakit/delete/' . $value->id_rumahsakit) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus data ini ?')">Hapus</a>
                  </td>
                <?php } ?>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>