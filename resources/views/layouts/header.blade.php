<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          Hogwarts School
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('home.first')}}" class="nav-link px-2 link-secondary">Home</a></li>
        <li><a href="#" class="nav-link px-2">ติดตามผล</a></li>
        <li><a href="#" class="nav-link px-2">เอกสาร</a></li>
        <li><a href="#" class="nav-link px-2">ติดต่อ</a></li>
        @can('viewAny', App\Models\Party::class)
        <li><a href="{{route('parties.index')}}" class="nav-link px-2">Dashboard</a></li>
        @endcan
      </ul>

      <div class="col-md-3 text-end">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-outline-primary me-2">Logout</button>
        </form>
      </div>
    </header>
  </div>