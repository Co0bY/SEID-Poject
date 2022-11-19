<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">SEID</span>
            </a>
            <hr>
            <p>Seja bem vindo {{session()->get('name')}}</p>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('secretary.index') }}" class="nav-link active" aria-current="page" id="Home" name="Home" >
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('secretary.course-index') }}" class="nav-link" aria-current="page" id="Home" name="Home" >
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Gerenciar Cursos
                    </a>
                </li>
                <li>
                    <a href="{{ route('secretary.users-filtro') }}" class="nav-link link-dark" id="GerU" name="GerU">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Usuários;
                    </a>
                </li>
                <li>
                    <a href="{{ route('secretary.discipline-index') }}" class="nav-link link-dark" id="GerD">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Disiciplinas;
                    </a>
                </li>
                <li>
                    <a href="{{ route('secretary.registration-index') }}" class="nav-link link-dark" id="GerM">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Matrículas;
                    </a>
                </li>
                <li>
                    <a href="{{ route('secretary.room-index') }}" class="nav-link link-dark" id="GerS">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Salas;
                    </a>
                </li>

                <li>
                    <a href="{{ route('secretary.class-index') }}" class="nav-link link-dark" id="GerT">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Turmas;
                    </a>
                </li>

                <li>
                    <a href="{{ route('secretary.season-index') }}" class="nav-link link-dark" id="GerP">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Gerenciar Períodos;
                    </a>
                </li>

                <li>
                    <a href="{{ route('secretary.extraction') }}" class="nav-link link-dark" id="Rel">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Relatórios;
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
                    <a href="" class="nav-link link-danger" id="Rel">
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

