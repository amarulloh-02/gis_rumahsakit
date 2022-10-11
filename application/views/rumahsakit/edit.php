<div class="col-lg-5">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Edit Rumah Sakit
    </div>
    <div class="panel-body">
      <?= form_open('rumah_sakit/edit/' . $rs->id_rumahsakit) ?>
      <div class="form-group">
        <label>Nama Rumah Sakit</label>
        <input type="text" name="nama_rumahsakit" value="<?= $rs->nama_rumahsakit ?>" class="form-control" placeholder="Nama Rumah Sakit" required>
      </div>
      <div class="form-group">
        <label>No. Telepon</label>
        <input type="number" name="no_telp" value="<?= $rs->no_telp ?>" class="form-control" placeholder="No. Telepon" required>
      </div>
      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" cols="10" rows="2" class="form-control" placeholder="Alamat"><?= $rs->alamat ?></textarea>
      </div>
      <div class="form-group">
        <label>Latitude</label>
        <input type="text" name="latitude" value="<?= $rs->latitude ?>" class="form-control" placeholder="Latitude" required readonly>
      </div>
      <div class="form-group">
        <label>Longitude</label>
        <input type="text" name="longitude" value="<?= $rs->longitude ?>" class="form-control" placeholder="Longitude" required readonly>
      </div>
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" cols="10" rows="2" class="form-control" placeholder="Deskripsi"><?= $rs->deskripsi ?></textarea>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('rumah_sakit') ?>" class="btn btn-primary">Kembali</a>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div class="col-lg-7">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Lokasi Rumah Sakit
    </div>
    <div class="panel-body">
      <?= $map['html'] ?>
    </div>
  </div>
</div>