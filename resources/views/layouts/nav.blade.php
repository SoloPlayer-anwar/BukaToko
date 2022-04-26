<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{route('home')}}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Master Admin
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('raja_ongkir.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Raja Ongkir</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('upload_status.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Upload Status</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('daftar_seller.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Daftar Seller</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('gudang.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gudang</p>
            </a>
          </li>


          <li class="nav-item">
           <form action="{{route('logout')}}" method="POST" id="logout">
            @csrf
            <a class="nav-link" href="#" onclick="document.getElementById('logout').submit()">
                <i class="nav-icon fas fa-sign-out-alt">Logout</i>
            </a>
        </form>
          </li>

        </ul>
      </li>

      <li class="nav-item menu-open">
        <a href="{{route('home')}}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Master Product
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Product</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('komentar.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Komentar Penilaian</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Category Product</p>
            </a>
          </li>

          <li class="nav-item mb-10">
            <a href="{{route('transaction.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Transaction User</p>
            </a>
          </li>

        </ul>
      </li>


    </ul>
  </nav>
