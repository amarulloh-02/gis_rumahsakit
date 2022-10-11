<body>

  <div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="<?= base_url() ?>">GIS - Rumah Sakit</a>
      </div>
      <ul class="nav navbar-right navbar-top-links">
        <li>
          <?php if ($this->session->userdata('username') != "") { ?>
            <a href="<?= base_url('user/logout') ?>">
              <i class="fa fa-sign-in fa-fw"></i> Logout
            </a>
          <?php } else { ?>
            <a href="<?= base_url('user/login') ?>">
              <i class="fa fa-sign-in fa-fw"></i> Login
            </a>
          <?php } ?>
        </li>
      </ul>
      <!-- /.navbar-top-links -->