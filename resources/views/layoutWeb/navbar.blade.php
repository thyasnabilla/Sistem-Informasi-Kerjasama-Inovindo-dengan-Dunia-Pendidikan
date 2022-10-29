<link href="assets/img/logo.png" rel="icon">

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar fixed-top" aria-label="">
    <ul class="navbar-nav navbar-right" style="margin-left:850px;">
        <li class="dropdown"><a href="" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                
                <div class="d-sm-none d-lg-inline-block">{{ auth('institusi')->user()->institusi['nama_institusi']??'' }}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="/input/edit/{{auth('institusi')->user()->institusi['id']??''}}" class="dropdown-item has-icon">
                    <span class="far fa-user"></span> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="/logout" class="dropdown-item has-icon text-danger">
                    <span class="fas fa-sign-out-alt"></span> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
