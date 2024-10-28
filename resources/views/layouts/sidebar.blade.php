<aside class="left-sidebar" data-sidebarbg="skin5">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{  route('home') }}"
            aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
        </li>



        <li class="sidebar-item">
          <a
            class="sidebar-link waves-effect waves-dark sidebar-link"
            href="{{ route('staff.index') }}"
            aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span class="hide-menu">Staff</span></a>
        </li>

        <li class="sidebar-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
            <i class="mdi mdi-relative-scale"></i>
            <span class="hide-menu">Logout</span>
          </a>
        </li>


      </ul>
    </nav>

  </div>

</aside>