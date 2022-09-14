
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span class="fs-4">SEID</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('secretary.index')}}" class="nav-link active" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="{{route('secretary.users')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Usuários;
        </a>
      </li>
      <li>
        <a href="{{route('secretary.discipline-index')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Disiciplinas;
        </a>
      </li>
      <li>
        <a href="{{route('secretary.registration-index')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Matrículas;
        </a>
      </li>
      <li>
        <a href="{{route('secretary.room-index')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Salas;
        </a>
      </li>

      <li>
        <a href="{{route('secretary.class-index')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Turmas;
        </a>
      </li>

      <li>
        <a href="{{route('secretary.active-index')}}" class="nav-link link-dark">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Gerenciar Discilpinas Ativas;
        </a>
      </li>


    </ul>
    </div>
  </div>
