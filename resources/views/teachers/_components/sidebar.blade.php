<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">SEID</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{route('teacher.index')}}" class="nav-link active" aria-current="page">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                      Home
                    </a>
                  </li>
                  <li>
                    <a href="{{route('teacher.attendance')}}" class="nav-link link-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Fazer Chamada;
                    </a>
                  </li>
                  <li>
                    <a href="{{route('teacher.score')}}" class="nav-link link-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Notas;
                    </a>
                  </li>
                  <li>
                    <a href="{{route('teacher.homework')}}" class="nav-link link-dark">
                      <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                      Atribuir Atividades;
                    </a>
                  </li>

                  <li>
                    <a href="" class="nav-link link-danger" id="Rel">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Manual do Usuário
                    </a>
                </li>

                <li>
                    <a href="/logout" class="nav-link link-danger" id="Rel">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        SAIR
                    </a>
                </li>
            </ul>
        </div>
    </div>

</div>
</div>

