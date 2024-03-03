<nav class="navbar">
    <div class="logo">Logo</div>
    <ul class="nav-links">
        <li><a href="/">Home</a></li>
        <li class="dropdown">
            <a href="{{ route('characters') }}">Personagens</a>
            <!-- Dropdown Menu -->
            <ul class="dropdown-menu">
                @foreach(config('links.characters') as $title => $link)
                    <li><a href="{{ route('character', $link) }}">{{ $title }}</a></li>
                @endforeach
            </ul>
        </li>
        <!-- Dropdown Item -->
        <li class="dropdown">
            <a href="/">Missões</a>
            <!-- Dropdown Menu -->
            <ul class="dropdown-menu">
            @foreach(config('links.missions') as $title => $link)
                <li><a href="{{ route('quest', $link) }}">{{ $title }}</a></li>
            @endforeach
            </ul>
        </li>
        <li class="dropdown">
            <a href="{{ route('vehicles') }}">Veículos</a>
            <!-- Dropdown Menu -->
            <ul class="dropdown-menu">
                @foreach(config('links.vehicles') as $title => $link)
                    <li><a href="{{ route('vehicle', $link) }}">{{ $title }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('about') }}">Sobre</a></li>
    </ul>
</nav>
<main>
    @yield('content')
</main>


<style>
    /* Variáveis de cor */
    * {
        padding: 0;
        margin: 0;
    }

    :root {
        --navbar-bg-color: #000;
        --nav-link-color: #fff;
        --dropdown-bg-color: #333;
    }

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    main {
        width:60%; /* Define a largura como 70% da largura da viewport */
        margin: 0 auto; /* Centraliza o <main> horizontalmente */
        display: flex;
        flex-direction: column;
        align-items: center; /* Centraliza o conteúdo dentro de <main> */
        margin-bottom: 40px;
    }

    .navbar {
        display: flex;
        justify-content: center; /* Centraliza o conteúdo horizontalmente */
        align-items: center; /* Centraliza o conteúdo verticalmente */
        background-color: var(--navbar-bg-color);
        padding: 1rem;
        /*width: 100%; !* Garante que a navbar ocupe a largura total *!*/
    }

    .nav-links {
        list-style-type: none;
        display: flex;
        gap: 1rem;
        padding: 0;
        margin: 0;
        align-items: center; /* Centraliza os itens da lista verticalmente */
    }

    .nav-links a {
        text-decoration: none;
        color: var(--nav-link-color);
        transition: color 0.3s ease;
    }

    .nav-links a:hover {
        color: #ddd;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%; /* Posiciona o dropdown logo abaixo do item do menu */
        left: 50%;
        transform: translateX(-50%); /* Centraliza o dropdown abaixo do item do menu */
        background-color: var(--dropdown-bg-color);
        padding: 0.5rem;
        border-radius: 4px;
        flex-direction: column;
    }

    .dropdown-menu li {
        padding: 0.5rem 0;
        list-style: none;
    }

    .dropdown-menu a {
        color: var(--nav-link-color);
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }


    @yield('style')
</style>

