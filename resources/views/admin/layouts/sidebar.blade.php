 <div class="sidebar">
    <div class="sidebar-header">

     <div class="account-info">
    <div class="account-info-picture">
        <img src="{{asset('../admin-assets/images/profile.png')}}" alt="Account">
    </div>
    <div class="account-info-name">{{ Auth::guard('admin')->user()->name }}</div>
    <div class="dropdown">
        <button class="account-info-more">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                <circle cx="12" cy="12" r="1" />
                <circle cx="19" cy="12" r="1" />
                <circle cx="5" cy="12" r="1" />
            </svg>
        </button>
        <div class="dropdown-content">
            <a href="{{ route('admin.showChangePassword') }}">Change Password</a>
            <a href="{{ route('admin.logout') }}">Logout</a>

        </div>
    </div>
</div>

      </div>
    <ul class="sidebar-list">

<!-- In your Blade template -->
<li class="sidebar-list-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
    <a href="{{ route('admin.dashboard') }}">

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="24"   viewBox="0 0 256 256" xml:space="preserve">

<defs>
</defs>
<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
	<path d="M 49.501 20 H 7.378 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 42.123 c 0.553 0 1 0.448 1 1 S 50.054 20 49.501 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 82.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 83.175 20 82.622 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 73.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 74.175 20 73.622 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 46.907 79.28 h -3.814 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 3.814 c 0.553 0 1 0.447 1 1 S 47.46 79.28 46.907 79.28 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 85.427 10.719 H 4.573 C 2.052 10.719 0 12.771 0 15.292 v 59.416 c 0 2.521 2.052 4.572 4.573 4.572 h 31.5 c 0.552 0 1 -0.447 1 -1 s -0.448 -1 -1 -1 h -31.5 C 3.154 77.28 2 76.126 2 74.708 V 26.016 h 86 v 48.692 c 0 1.418 -1.154 2.572 -2.573 2.572 h -31.5 c -0.553 0 -1 0.447 -1 1 s 0.447 1 1 1 h 31.5 c 2.521 0 4.573 -2.051 4.573 -4.572 V 15.292 C 90 12.771 87.948 10.719 85.427 10.719 z M 2 24.016 v -8.723 c 0 -1.419 1.154 -2.573 2.573 -2.573 h 80.854 c 1.419 0 2.573 1.154 2.573 2.573 v 8.723 H 2 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 22.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 v -8.482 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 8.482 C 25.393 70.686 24.203 71.875 22.741 71.875 z M 16.259 60.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 8.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 v -8.482 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 16.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 39.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 56.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 12.482 C 42.393 70.686 41.203 71.875 39.741 71.875 z M 33.259 56.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 12.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 56.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 33.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 56.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 46.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 22.482 C 59.393 70.686 58.203 71.875 56.741 71.875 z M 50.259 46.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 22.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 46.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 50.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
	<path d="M 73.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 34.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 34.482 C 76.393 70.686 75.203 71.875 73.741 71.875 z M 67.259 34.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 34.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 34.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 67.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
</g>
</svg>


        <span>Dashboard</span>
    </a>
</li>
<li class="sidebar-list-item {{ request()->routeIs('category.list') ? 'active' : '' }}">
    <a href="{{ route('category.list') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder">
            <path d="M2 20h20a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H8l-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z"/>
        </svg>
        <span>Category</span>
    </a>
</li>
<li class="sidebar-list-item {{ request()->routeIs('product.list') ? 'active' : '' }}">
        <a href="{{route('product.list')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Products</span>
        </a>
      </li>
      <li class="sidebar-list-item {{ request()->routeIs('shipping.create') ? 'active' : '' }}">
        <a href="{{route('shipping.create')}}"  >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 6H3V17.25H3.375H4.5H4.52658C4.70854 18.5221 5.80257 19.5 7.125 19.5C8.44743 19.5 9.54146 18.5221 9.72342 17.25H15.0266C15.2085 18.5221 16.3026 19.5 17.625 19.5C18.9474 19.5 20.0415 18.5221 20.2234 17.25H21.75V12.4393L18.3107 9H16.5V6ZM16.5 10.5V14.5026C16.841 14.3406 17.2224 14.25 17.625 14.25C18.6721 14.25 19.5761 14.8631 19.9974 15.75H20.25V13.0607L17.6893 10.5H16.5ZM15 15.75V9V7.5H4.5V15.75H4.75261C5.17391 14.8631 6.07785 14.25 7.125 14.25C8.17215 14.25 9.07609 14.8631 9.49739 15.75H15ZM17.625 18C17.0037 18 16.5 17.4963 16.5 16.875C16.5 16.2537 17.0037 15.75 17.625 15.75C18.2463 15.75 18.75 16.2537 18.75 16.875C18.75 17.4963 18.2463 18 17.625 18ZM8.25 16.875C8.25 17.4963 7.74632 18 7.125 18C6.50368 18 6 17.4963 6 16.875C6 16.2537 6.50368 15.75 7.125 15.75C7.74632 15.75 8.25 16.2537 8.25 16.875Z" fill="#080341"/>
</svg>
    <span>Shipping</span>
        </a>
      </li>
      <li class="sidebar-list-item {{ request()->routeIs('coupan.list') ? 'active' : '' }}">
        <a href="{{route('coupan.list')}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="none"  xmlns="http://www.w3.org/2000/svg">
<path d="M10 8.99998C10.5523 8.99998 11 9.44769 11 9.99998C11 10.5523 10.5523 11 10 11C9.44775 11 9.00004 10.5523 9.00004 9.99998C9.00004 9.44769 9.44775 8.99998 10 8.99998Z" fill="#000000"/>
<path d="M13 14C13 14.5523 13.4478 15 14 15C14.5523 15 15 14.5523 15 14C15 13.4477 14.5523 13 14 13C13.4478 13 13 13.4477 13 14Z" fill="#000000"/>
<path d="M10.7071 14.7071L14.7071 10.7071C15.0977 10.3166 15.0977 9.6834 14.7071 9.29287C14.3166 8.90235 13.6835 8.90235 13.2929 9.29287L9.29293 13.2929C8.90241 13.6834 8.90241 14.3166 9.29293 14.7071C9.68346 15.0976 10.3166 15.0976 10.7071 14.7071Z" fill="#000000"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M16.3117 4.07145L15.1708 4.34503L14.5575 3.34485C13.3869 1.43575 10.6131 1.43575 9.44254 3.34485L8.82926 4.34503L7.68836 4.07145C5.51069 3.54925 3.54931 5.51063 4.07151 7.6883L4.34509 8.8292L3.34491 9.44248C1.43581 10.6131 1.43581 13.3869 3.34491 14.5575L4.34509 15.1708L4.07151 16.3117C3.54931 18.4893 5.51069 20.4507 7.68836 19.9285L8.82926 19.6549L9.44254 20.6551C10.6131 22.5642 13.3869 22.5642 14.5575 20.6551L15.1708 19.6549L16.3117 19.9285C18.4894 20.4507 20.4508 18.4893 19.9286 16.3117L19.655 15.1708L20.6552 14.5575C22.5643 13.3869 22.5643 10.6131 20.6552 9.44248L19.655 8.8292L19.9286 7.6883C20.4508 5.51063 18.4894 3.54925 16.3117 4.07145ZM11.1475 4.3903C11.5377 3.75393 12.4623 3.75393 12.8525 4.3903L13.8454 6.00951C14.0717 6.37867 14.51 6.56019 14.9311 6.45922L16.7781 6.01631C17.504 5.84225 18.1578 6.49604 17.9837 7.22193L17.5408 9.06894C17.4398 9.49003 17.6213 9.92827 17.9905 10.1546L19.6097 11.1475C20.2461 11.5377 20.2461 12.4623 19.6097 12.8525L17.9905 13.8453C17.6213 14.0717 17.4398 14.5099 17.5408 14.931L17.9837 16.778C18.1578 17.5039 17.504 18.1577 16.7781 17.9836L14.9311 17.5407C14.51 17.4398 14.0717 17.6213 13.8454 17.9904L12.8525 19.6097C12.4623 20.246 11.5377 20.246 11.1475 19.6097L10.1547 17.9904C9.92833 17.6213 9.49009 17.4398 9.069 17.5407L7.22199 17.9836C6.4961 18.1577 5.84231 17.5039 6.01637 16.778L6.45928 14.931C6.56026 14.5099 6.37873 14.0717 6.00957 13.8453L4.39036 12.8525C3.75399 12.4623 3.75399 11.5377 4.39036 11.1475L6.00957 10.1546C6.37873 9.92827 6.56026 9.49003 6.45928 9.06894L6.01637 7.22193C5.84231 6.49604 6.4961 5.84225 7.22199 6.01631L9.069 6.45922C9.49009 6.56019 9.92833 6.37867 10.1547 6.00951L11.1475 4.3903Z" fill="#000000"/>
</svg>
  <span>Discount Coupan</span>
        </a>
      </li>
      <li class="sidebar-list-item {{ request()->routeIs('orders.index') ? 'active' : '' }}">
        <a href="{{route('orders.index')}}">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="circle" stroke-linejoin="round">
    <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8zm-1-14h2v6h-2zm0 8h2v2h-2z"/>
</svg>


  <span>Orders</span>
        </a>
      </li>
      <li class="sidebar-list-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a href="{{route('users.index')}}">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="7" r="4"/>
    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
</svg>

  <span>Users</span>
        </a>
      </li>
      <li class="sidebar-list-item {{ request()->routeIs('home.list') ? 'active' : '' }}">
        <a href="{{route('home.list')}}">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
    <circle cx="12" cy="7" r="4"/>
    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
</svg>

  <span>General Settings</span>
        </a>
      </li>

    </ul>
  </div>
