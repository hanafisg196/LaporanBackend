
    <nav class="pcoded-navbar">
        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
        <div class="pcoded-inner-navbar main-menu">

            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='kegiatan'? 'active' : '' }}">
                    <a href="/kegiatan">
                        <span class="pcoded-micon"><i class="ti-agenda"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kegiatan</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Setting</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='user'? 'active' : '' }}">
                    <a href="/user">
                        <span class="pcoded-micon"><i class="ti-id-badge"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Setting User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

        </div>

    </nav>
