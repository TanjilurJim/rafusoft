
<div class="sidebar max-h-[80vh] border-b">
    <nav   class="mt-2  nav-scroll">
        <ul class="nav  nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @if (auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="/dashboard/sitemap" class="nav-link">
                    <i class="nav-icon fa-solid fa-sitemap"></i>
                    <p>Sitemap</p>
                </a>
            </li>

            @endif
            @if (auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="/dashboard/user-management" class="nav-link">
                    <i class="nav-icon fa-solid fa-user-shield"></i>
                    <p>User Managemnent</p>
                </a>
            </li>
            @endif
            @if (auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-cloud-arrow-up"></i>
                    <p>
                        Download From
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/download-from/add" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/download-from/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/dashboard/menu" class="nav-link">
                    <i class="nav-icon fa-solid fa-solid fa-list"></i>
                    <p>
                        Menu
                    </p>
                </a>
            </li>

            @endif


            @if (auth()->user()->ref == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-file"></i>
                    <p>
                        Ref Pages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/ref/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/ref/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/ref/category" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            @if (auth()->user()->dir == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-file"></i>
                    <p>
                        Dir Pages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/dir/user/files" class="nav-link">
                            <i class="fa-regular fa-folder nav-icon"></i>
                            <p>Files</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/dir/list" class="nav-link">
                            <i class="fa-pager fa-solid nav-icon"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/dir/enquires" class="nav-link">
                            <i class="fa-regular fa-message nav-icon"></i>
                            <p>Enquires</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @if (auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin" ||  auth()->user()->contact == "on" || auth()->user()->career == "on" || auth()->user()->quote == "on")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-inbox"></i>
                    <p>
                        Inbox 
                        @if (auth()->user()->role == "superadmin" || auth()->user()->role == "admin")
                        <span class="right badge" style="background-color: aliceblue; color: black">{{  $unreadMessages}}</span>
                        @endif
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if (auth()->user()->contact == "on" ||  auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
                    <li class="nav-item">
                        <a href="/dasboard/inbox/general" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>General</p>
                            @if ($unreadGeneral > 0)
                            <span class="right badge" style="background-color: aliceblue; color: black">{{$unreadGeneral}} </span>
                            @endif
                        </a>
                    </li>
                    @endif


                    @if (auth()->user()->contact == "on" ||  auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
                    <li class="nav-item">
                        <a href="/dasboard/inbox/contact" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Contact 
                                @if ($unreadcontact > 0)
                                <span class="right badge" style="background-color: aliceblue; color: black">{{$unreadcontact}} </span>
                                @endif
                            </p>
                        </a>
                    </li>
                    @endif

                    @if (auth()->user()->career == "on" ||  auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
                    <li class="nav-item">
                        <a href="/dasboard/inbox/career" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Career 
                                @if ($unreadCareer > 0)
                                <span class="right badge" style="background-color: aliceblue; color: black">{{$unreadCareer}} </span>
                                @endif
                            </p>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->quote == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
                    <li class="nav-item">
                        <a href="/dasboard/inbox/quote" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Quote  
                                @if ($unreadQuote > 0)
                               <span class="right badge" style="background-color: aliceblue; color: black">{{$unreadQuote}} </span>
                                @endif
                            </p>
                        </a>
                    </li>
                    @endif
                </ul>
            </li>
            @endif

            @if (auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")


            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-file-lines"></i>
                    <p>
                        Pages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/pages/privacy-policy" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Privacy Policy</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/pages/terms-and-conditions" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Terms & Condition</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/pages/refund" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Refund Policy</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-people-group"></i>
                    <p>
                        Our Team
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/tean/category" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/team/create" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/team/team-members" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Team Members</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @if (auth()->user()->file == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-folder"></i>
                    {{-- <i class=""></i> --}}
                    <p>
                        File Manager
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/file/icon" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Icon</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/favicon" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Favicon</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/og-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>OG Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/schema-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Schema Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/publisher-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Publisher Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/dir-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dir Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/ref-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ref Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/static-image" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Static Page Image</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/gallery" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gallery</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/file/png" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Image Upload</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @if (auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-regular fa-image"></i>
                    {{-- <i class=""></i> --}}
                    <p>
                       Gallery
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/gallery" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/gallery/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Gallery List</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif

            @if (auth()->user()->product == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-store"></i>
                    {{-- <i class=""></i> --}}
                    <p>
                       Product
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/product/setting" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Setting Shop</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/product" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/product/list" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/product/enquirelist" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Enquire List</p>
                        </a>
                    </li>
                </ul>
            </li>

            @endif


             @if (auth()->user()->invoice == "on" || auth()->user()->role == "admin" ||  auth()->user()->role == "superadmin")
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa-solid fa-receipt"></i>
                    {{-- <i class=""></i> --}}
                    <p>
                       Invoice
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/dashboard/my-invoice-profile" class="nav-link">
                            <i class="fa-solid fa-gears nav-icon"></i>
                            <p>Invoice Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard/invoice" class="nav-link">
                            <i class="fa-solid fa-user-group nav-icon"></i>
                            <p>Client List</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif



            <li class="nav-item">
                <a href="/dashboard/subscribe" class="nav-link">
                    <i class="nav-icon fa-solid fa-crown"></i>
                    <p>
                        Subscription
                    </p>
                </a>
            </li>
        </ul>
    </nav>

</div>
