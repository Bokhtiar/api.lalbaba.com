<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">LalBaba</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="data:image/png;base64,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" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->role ? Auth::user()->role->name : "" }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="@route('admin.profile.info')">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="@route('admin.profile.account')">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
