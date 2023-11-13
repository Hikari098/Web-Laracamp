<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Data Bootcamp
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('peserta.mybootcamp')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Bootcamp</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('peserta.transaksi')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Transaksi Bootcamp</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('peserta.profile')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Profile</p>
                </a>
            </li>
        </ul>
    </li>
    </li>
    </li>
</ul>