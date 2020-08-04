<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
  <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
  <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('adminlte/dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          @auth
          <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
          </div>
          @endauth
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Dashboard
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('home') }}" class="nav-link active">
                              <i class="fa fa-home nav-icon"></i>
                              <p>Home</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-header">Manager</li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Book
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('book.index') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('book.create') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                            <p>Create Book</p>
                        </a>
                    </li>
                </ul>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                      <p>
                          Borrower
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('borrower.index') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List All</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('borrower.create') }}" class="nav-link">
                          <i class="fas fa-angle-right nav-icon"></i>
                            <p>Create Borrower</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('borrower.today') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List Get Today</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('borrower.not_refunded') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List Not Refunded</p>
                          </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                      <p>
                          Borrower ORM
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('borrower-orm.index') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List All</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('borrower-orm.today') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List Get Today</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('borrower-orm.not_refunded') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List Not Refunded</p>
                          </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                      <p>
                          Borrow
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('borrow.index') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List All</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('borrow.from_to_day') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List day to day</p>
                          </a>
                      </li>
                  </ul>
                </li>
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                      <p>
                          Author
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('author.index') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>List All</p>
                          </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('author.create') }}" class="nav-link">
                            <i class="fas fa-angle-right nav-icon"></i>
                              <p>Create Author</p>
                          </a>
                      </li>
                  </ul>
                </li>
              </li>
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>