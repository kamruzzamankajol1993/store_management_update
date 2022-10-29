@php
     $usr = Auth::guard('admin')->user();
 @endphp
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboards</span>
                    </a>
                </li>
                @if ($usr->can('product_add') || $usr->can('product_view') ||  $usr->can('product_update') ||  $usr->can('product_update'))
                <li class="menu-title" key="t-menu">Product</li>

                  @if ($usr->can('category_add') || $usr->can('category_view') ||  $usr->can('category_update') ||  $usr->can('category_update'))
                <li class="{{ Route::is('admin.category_information')  ? 'active' : '' }}">
                       <a href="{{ route('admin.category_information') }}">
                        <i class="bx bx-label"></i>
                        <span>Category</span>
                    </a>
                   </li>

               @endif


               @if ($usr->can('product_add') || $usr->can('product_view') ||  $usr->can('product_update') ||  $usr->can('product_update'))
               <li class="{{ Route::is('admin.product_information')  ? 'active' : '' }}">
                      <a href="{{ route('admin.product_information') }}">
                       <i class="bx bx-cart-alt"></i>
                       <span>Product</span>
                   </a>
                  </li>

              @endif
@endif

              @if ($usr->can('rack_add') || $usr->can('rack_view') ||  $usr->can('rack_update') ||  $usr->can('rack_update'))

                <li class="menu-title" key="t-menu">RACK & SUPPLIER</li>


                @if ($usr->can('rack_add') || $usr->can('rack_view') ||  $usr->can('rack_update') ||  $usr->can('rack_update'))
                <li class="{{ Route::is('admin.rack_information')  ? 'active' : '' }}">
                       <a href="{{ route('admin.rack_information') }}">
                        <i class="bx bx-building"></i>
                        <span>Rack</span>
                    </a>
                   </li>

               @endif



                @if ($usr->can('supplier_add') || $usr->can('supplier_view') ||  $usr->can('supplier_update') ||  $usr->can('supplier_update'))
                <li class="{{ Route::is('admin.supplier_information')  ? 'active' : '' }}">
                       <a href="{{ route('admin.supplier_information') }}">
                        <i class="bx bx-user-plus"></i>
                        <span>Supplier</span>
                    </a>
                   </li>

               @endif


               <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bxs-truck"></i>
                    <span key="t-projects">Request Product</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">

                    @if ($usr->can('request_product_add') || $usr->can('request_product_view') ||  $usr->can('request_product_update') ||  $usr->can('request_product_delete'))
                    <li class="{{ Route::is('admin.request_product_information.create')   ? 'active' : '' }}">
                           <a href="{{ route('admin.request_product_information.create') }}"><span>Add Request Product</span> </a>
                       </li>

                   @endif

                   @if ($usr->can('request_product_add') || $usr->can('request_product_view') ||  $usr->can('request_product_update') ||  $usr->can('request_product_delete'))
                   <li class="{{ Route::is('admin.request_product_information')   ? 'active' : '' }}">
                          <a href="{{ route('admin.request_product_information') }}"><span>Request Product List</span> </a>
                      </li>

                  @endif


                </ul>
             </li>

@endif

               @if ($usr->can('inventory_add') || $usr->can('inventory_view') ||  $usr->can('inventory_update') ||  $usr->can('inventory_delete'))
                <li class="menu-title" key="t-menu">INVENTORY</li>


               <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-label"></i>
                    <span key="t-projects">Manage Inventory</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">

                    @if ($usr->can('inventory_add') || $usr->can('inventory_view') ||  $usr->can('inventory_update') ||  $usr->can('inventory_delete'))
                    <li class="{{ Route::is('admin.inventory_information.create')   ? 'active' : '' }}">
                           <a href="{{ route('admin.inventory_information.create') }}"><span>Add Inventory</span> </a>
                       </li>

                   @endif

                   @if ($usr->can('inventory_add') || $usr->can('inventory_view') ||  $usr->can('inventory_update') ||  $usr->can('inventory_delete'))
                   <li class="{{ Route::is('admin.inventory_information')   ? 'active' : '' }}">
                          <a href="{{ route('admin.inventory_information') }}"><span>Inventory List</span> </a>
                      </li>

                  @endif


                </ul>
             </li>
             @endif
             <li class="menu-title" key="t-menu">STAFF & PRODUCT REQUISITION</li>


             @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
             <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                 <a href="{{ route('admin.admins') }}"><i class="bx bx-user"></i><span>Staff</span> </a>
             </li>

           @endif


           <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="bx bx-archive"></i>
                <span key="t-projects">Manage Requisition</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">

                @if ($usr->can('requisition_add') || $usr->can('requisition_view') ||  $usr->can('requisition_update') ||  $usr->can('requisition_delete'))
                <li class="{{ Route::is('admin.requisition_information.create')   ? 'active' : '' }}">
                       <a href="{{ route('admin.requisition_information.create') }}"><span>Add Requisition</span> </a>
                   </li>

               @endif

               @if ($usr->can('requisition_add') || $usr->can('requisition_view') ||  $usr->can('requisition_update') ||  $usr->can('requisition_delete'))
               <li class="{{ Route::is('admin.requisition_information')   ? 'active' : '' }}">
                      <a href="{{ route('admin.requisition_information') }}"><span>Requisition List</span> </a>
                  </li>

              @endif


            </ul>
         </li>
         @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
         <li class="menu-title" key="t-menu">OTHER</li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-projects">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>Company Information</span> </a></li>

            @endif




                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif




                        {{-- <li><a href="projects-grid.html" key="t-p-grid">Projects Grid</a></li>
                        <li><a href="projects-list.html" key="t-p-list">Projects List</a></li>
                        <li><a href="projects-overview.html" key="t-p-overview">Project Overview</a></li>
                        <li><a href="projects-create.html" key="t-create-new">Create New</a></li> --}}
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
{{-- <div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>

        <a href="index.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('/') }}{{ $icon }}" alt="" height="22">
                        </span>
            <span class="logo-lg">
                            <img src="{{ asset('/') }}{{ $logo }}" alt="" height="20">
                        </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                @if ($usr->can('dashboard.view'))
                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
@endif

@if ($usr->can('product_main'))
<li class="menu-title">PRODUCT SECTION</li>

<li>
    <a href="javascript: void(0);" class="has-arrow waves-effect">
        <i class="uil-label"></i>
        <span>Product</span>
    </a>
    <ul class="sub-menu" aria-expanded="false">

        @if ($usr->can('product_add'))
        <li class="{{ Route::is('admin.product_list_add')  ? 'active' : '' }}"><a href="{{ route('admin.product_list_add') }}"> <span>Add Product</span> </a></li>
@endif
@if ($usr->can('product_view'))
        <li class="{{ Route::is('admin.product_list')  ? 'active' : '' }}"><a href="{{ route('admin.product_list') }}"> <span>Manage Product</span> </a></li>
@endif



    </ul>
</li>

@endif

                <li class="menu-title">Setting</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-setting"></i>
                        <span>System Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        @if ($usr->can('system_information_add') || $usr->can('system_information_view') ||  $usr->can('system_information_update') ||  $usr->can('system_information_delete'))
                        <li class="{{ Route::is('admin.system_information')  ? 'active' : '' }}"><a href="{{ route('admin.system_information') }}"> <span>System Information</span> </a></li>

            @endif

                        @if ($usr->can('admin.create') || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins') || Route::is('admin.admins.create') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.admins') }}"><span>User</span> </a>
                        </li>

                   @endif


                   @if ($usr->can('role.create') || $usr->can('role.view') ||  $usr->can('role.edit') ||  $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles') || Route::is('admin.roles.create') || Route::is('admin.roles.edit') ? 'active' : '' }}"><a href="{{ route('admin.roles') }}"> <span>Role List</span> </a></li>

            @endif
                   @if ($usr->can('permission.create') || $usr->can('permission.view') ||  $usr->can('permission.edit') ||  $usr->can('permission.delete'))
                     <li class="{{ Route::is('admin.permission') || Route::is('admin.permission.create') || Route::is('admin.permission.edit') ? 'active' : '' }}">
                            <a href="{{ route('admin.permission') }}"><span>Permission</span> </a>
                        </li>

                    @endif



                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div> --}}







