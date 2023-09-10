<div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url('public/')?>images/logo/simon-pps.png" alt=""></a></div>
            <div class="dark-logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url('public/')?>images/logo/dark-logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle"></i></div>
          </div>
          <div class="left-menu-header col">
            <ul>
              <li>
              </li>
            </ul>
          </div>
          <div class="nav-right col pull-right right-menu p-0">
            <ul class="nav-menus">
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

              <li class="onhover-dropdown p-0">
                <button class="btn btn-primary-light" type="button"><a href="<?= base_url('auth/logout')?>"><i data-feather="settings"></i>Pengaturan</a></button>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>