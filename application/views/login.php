<div class="col-sm-4"></div>
<div class="col-sm-4">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <?= $title ?>
    </div>
    <div class="panel-body">
      <?php
      if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo $this->session->flashdata('sukses');
        echo '</div>';
      }
      if ($this->session->flashdata('gagal')) {
        echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        echo $this->session->flashdata('gagal');
        echo '</div>';
      }
      ?>
      <?= form_open('user/login') ?>
      <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>