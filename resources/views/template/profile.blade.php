<li class="nav-item dropdown no-arrow">
    <a
       class="nav-link dropdown-toggle"
       href="#"
       id="userDropdown"
       role="button"
       data-toggle="dropdown"
       aria-haspopup="true"
       aria-expanded="false"
    >
       <span
          class="mr-2 d-none d-lg-inline text-gray-600 small"
          >{{auth()->user()->nama}}</span
       >
       @if (auth()->user()->photo != null)
       <img src="{{ asset('/img/user.jpg' . auth()->user()->photo) }}">
       @else
       <img
       class="img-profile rounded-circle"
       src="{{asset('img/user.jpg')}}"
    />
       @endif
    </a>
    <!-- Dropdown - User Information -->
    <div
       class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
       aria-labelledby="userDropdown"
    >
       <a class="dropdown-item" href="/profile">
          <i
             class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"
          ></i>
          Profile
       </a>
       <form action="/logout" method="post">
         @csrf
         <button type="submit" class="dropdown-item" name="logout">
             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
             Logout
         </button>
     </form>
     
    </div>
 </li>