<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
                Artikel
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.index.tag')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tag</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.index.artikel')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Artikel</p>
                </a>
            </li>
        </ul>
    </li>
    </li>
    </li>
</ul>
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
                <a href="{{ route('kategoriBootcamp.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Bootcamp</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Bootcamp.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Bootcamp</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('index.transaksi')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Transaksi Bootcamp</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Product.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> Product</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Kategori.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori</p>
                </a>
            </li>
        </ul>
    </li>
    </li>
    </li>
</ul>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
                Data User
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Admin</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.index.data.mentor')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mentor</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                </a>
            </li>
        </ul>
    </li>
    </li>
    </li>
</ul>