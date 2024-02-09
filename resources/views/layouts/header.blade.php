<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/"><img class="logo_aid" src="/image/logo-aid.png" /></a>

    {{--         <button class="navbar-toggler" type="button" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">--}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{--        <div class="navbar" id="navbarsExampleDefault">--}}
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="/" class="nav-link"> <i class="fa fa-home nav-link-icon"></i>&nbsp;</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/institucions">Institucione</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Regjistri i Magjistratëve</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="/persons/{{1}}"> Gjyqtar </a>
                    <a class="dropdown-item" href="/persons/{{2}}"> Prokuror </a>
                    <a class="dropdown-item" href="/persons/{{3}}"> Anëtarë të institucioneve të reja të drejtësisë </a>
                    <a class="dropdown-item" href="/persons/{{4}}"> Gjyqtar/Prokuror të pezulluar/dorëhequr </a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Akte & Dokumentacion</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="/informacion/{{7}}"> Kushtetuta </a>
                    <a class="dropdown-item" href="/informacion/{{13}}"> Kode </a>
                    <a class="dropdown-item" href="/informacion/{{1}}"> Ligje </a>
                    <a class="dropdown-item" href="/informacion/{{6}}"> VKM </a>
                    <a class="dropdown-item" href="/informacion/{{4}}"> Vendime </a>
                    <a class="dropdown-item" href="/informacion/{{9}}"> Rregullore </a>
                    <a class="dropdown-item" href="/informacion/{{8}}"> Udhëzime </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/informacion/{{10}}"> Proceverbalet e mbedhjeve </a>
                    <a class="dropdown-item" href="/informacion/{{11}}"> Projekt-akte </a>
                    <a class="dropdown-item" href="/informacion/{{12}}"> Dokumenta strategjike </a>
                    {{-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" style="color: red" href="/informacion/{{17}}"> Covid - 19 </a>
                    <a class="dropdown-item" style="color: red" href="/informacion/{{18}}"> Fatkeqësitë Natyrore (Tërmeti) </a> --}}
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/articlesOrg">Monitorim Reforma</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/articlesMedia">Media per Vettingun</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">Shpenzime Drejtësi </a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                    <a class="dropdown-item"
                        href="/transaction"> Transaksione
                        Institucione Drejtësi </a>
                    <a class="dropdown-item" href="/budget"> Buxheti Gjyqësor </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list/{{901}}">Covid-19</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="/list/{{902}}">Fatkeqësi Natyrore (Tërmeti)</a>
            </li>
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0"> --}}
        {{-- <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> --}}
        {{-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button> --}}
        {{-- </form> --}}
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="/searchform"><span class="hidden-xs-up">Kërko</span> <i
                        class="fa fa-search nav-link-icon"></i> </a>
            </li>
        </ul>
    </div>
</nav>
