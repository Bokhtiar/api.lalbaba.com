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
            <a href="" data-bs-toggle="modal" data-bs-target="#basicModal">
              <i class="bi bi-circle"></i><span>Date to Date Filter</span>
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

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-coupone" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Coupone</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-coupone" class="nav-content collapse " data-bs-parent="#sidebar-coupone">
          <li>
            <a href="@route('admin.coupone.index')">
              <i class="bi bi-circle"></i><span>List Of Coupone</span>
            </a>
          </li>
          <li>
            <a href="@route('admin.coupone.create')">
              <i class="bi bi-circle"></i><span>Create Of Coupone</span>
            </a>
          </li>
        </ul>
      </li><!-- End coupon Code Nav -->


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
  <!--modal date filtering -->
  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Date TO Date Filter </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.report.filter') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Start Date</label>
              <input required type="date" name="startDate" class="form-control" placeholder="start Date" id="">
            </div>

            <div class="form-group">
              <label for="">End Date</label>
              <input type="date" name="endDate" class="form-control" placeholder="end Date" id="">
            </div>
            <div class="my-2">
              <input type="submit" class="btn btn-success" value="Date Filter" name="" id="">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
