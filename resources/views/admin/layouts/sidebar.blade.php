{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
            <span data-feather="file"></span>
            My Posts
          </a>
        </li>



    </div>
  </nav> --}}

  <nav id="sidebarMenu" class="col-md-4 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
      {{-- <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-5 fw-semibold">Collapsible</span>
      </a> --}}
      <ul class="list-unstyled ps-0">
        <li class="mb-1">
          <div class="btn align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Admin Panel
          </div>
        </li>
        <li class="border-top my-3"></li>

        <div class="sidebar-heading">
            Data
        </div>

        <li class="mb-1">
          <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
            Data User
          </button>
          <div class="collapse" id="account-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="{{ url('/users') }}" class="link-dark rounded">List User</a></li>
              <li><a href="{{ url('/users/buyer') }}" class="link-dark rounded">Tambah Buyer</a></li>
              {{-- <li><a href="{{ url('/users/seller') }}" class="link-dark rounded">Tambah Seller</a></li> --}}
              {{-- <li><a href="#" class="link-dark rounded">Settings</a></li>
              <li><a href="#" class="link-dark rounded">Sign out</a></li> --}}
            </ul>
          </div>
        </li>

        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
              Data Barang
            </button>
            <div class="collapse" id="dashboard-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ url('/barang/list') }}" class="link-dark rounded">List Barang</a></li>
                <li><a href="{{ url('/barang/create') }}" class="link-dark rounded">Tambah Barang</a></li>
                {{-- <li><a href="{{ url('/admin/books/categories') }}" class="link-dark rounded">Tambah Kategori</a></li> --}}
                {{-- <li><a href="#" class="link-dark rounded">Annually</a></li> --}}
              </ul>
            </div>
          </li>

        <li class="mb-1">
            <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="false">
              Data Category
            </button>
            <div class="collapse" id="category-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <li><a href="{{ url('/category') }}" class="link-dark rounded">List Categories</a></li>
                <li><a href="{{ url('/category/add') }}" class="link-dark rounded">Tambah Category</a></li>
                {{-- <li><a href="{{ url('/users/seller') }}" class="link-dark rounded">Tambah Seller</a></li> --}}
                {{-- <li><a href="#" class="link-dark rounded">Settings</a></li>
                <li><a href="#" class="link-dark rounded">Sign out</a></li> --}}
              </ul>
            </div>
          </li>

        <li class="border-top my-3"></li>
        <a href="/" class="btn" >
          Info Website
        </a>
      </ul>
    </div>
    </nav>
