<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="@route('admin.dashboard')">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-banner" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Banner</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-banner" class="nav-content collapse " data-bs-parent="#sidebar-banner">
          <li>
            <a href="@route('admin.banner.index')">
              <i class="bi bi-circle"></i><span>List Of Banner</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.banner.create')">
              <i class="bi bi-circle"></i><span>Create Of Banner</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-banner1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Banner Bundle</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-banner1" class="nav-content collapse " data-bs-parent="#sidebar-banner">
          <li>
            <a href="@route('admin.banner-bundle.index')">
              <i class="bi bi-circle"></i><span>List Of Banner Bundle</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.banner-bundle.create')">
              <i class="bi bi-circle"></i><span>Create Of Banner Bundle</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-category" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-category" class="nav-content collapse " data-bs-parent="#sidebar-category">
          <li>
            <a href="@route('admin.category.index')">
              <i class="bi bi-circle"></i><span>List Of Category</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.category.create')">
              <i class="bi bi-circle"></i><span>Create Of Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-subcategory" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Sub Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-subcategory" class="nav-content collapse " data-bs-parent="#sidebar-subcategory">
          <li>
            <a href="@route('admin.subcategory.index')">
              <i class="bi bi-circle"></i><span>List Of SubCategory</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.subcategory.create')">
              <i class="bi bi-circle"></i><span>Create Of SubCategory</span>
            </a>
          </li>
        </ul>
      </li><!-- End subcategory Nav -->

      

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-report" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-report" class="nav-content collapse " data-bs-parent="#sidebar-report">
          <li>
            <a href="@route('admin.report.today')">
              <i class="bi bi-circle"></i><span>Current Today</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.report.yesterday')">
              <i class="bi bi-circle"></i><span>Current Yesterday</span>
            </a>
          </li>
          
          <li>
            <a href="@route('admin.report.week')">
              <i class="bi bi-circle"></i><span>Current Week</span>
            </a>
          </li>

          <li>
            <a href="@route('admin.report.month')">
              <i class="bi bi-circle"></i><span>Current Month</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.report.year')">
              <i class="bi bi-circle"></i><span>Current Year</span>
            </a>
          </li>

          <li>
            <a href="@route('admin.report.between')">
              <i class="bi bi-circle"></i><span>Date To Date</span>
            </a>
          </li>
        </ul>
      </li><!-- End subcategory Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-product" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-product" class="nav-content collapse " data-bs-parent="#sidebar-product">
          <li>
            <a href="@route('admin.product.index')">
              <i class="bi bi-circle"></i><span>List Of Product</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.product.create')">
              <i class="bi bi-circle"></i><span>Create Of Product</span>
            </a>
          </li>

          <li>
            <a href="@route('admin.variant.index')">
              <i class="bi bi-circle"></i><span>List Of Product Variants</span>
            </a>
          </li>

          <li>
            <a href="@route('admin.variant.create')">
              <i class="bi bi-circle"></i><span>Create Of Product Variants</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-order" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-order" class="nav-content collapse " data-bs-parent="#sidebar-order">
          <li>
            <a href="{{ url('admin/order/type','express') }}">
              <i class="bi bi-circle"></i><span>Express Order</span>
            </a>
          </li> 
          <li>
            <a href="{{ url('admin/order/type','24') }}">
              <i class="bi bi-circle"></i><span>24/7 Order</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


      {{-- <li class="nav-heading">Pages</li> --}}

{{--
      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav --> --}}

    </ul>

  </aside>
