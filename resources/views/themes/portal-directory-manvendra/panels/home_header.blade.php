<header>
    <div class="header-home">
        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home.index') }}">
                        <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/logo.png') }}">

                    </a>
                    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="search-box">
                            <form class="d-flex ms-5 custome-search ">
                                <button class="btn btn-outline-success button-custome-s" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                                <input class="form-control me-2 custome-input" type="search" placeholder="Search"
                                    aria-label="Search">
                            </form>
                        </div>


                        @include('themes.portal-directory-manvendra.panels.navbar')
                    </div>
                </div>
            </nav>
            <h1>Search Similar <span>Sites</span></h1>
        </div>
    </div>
    </div>
    </div>

</header>
<!-- end of header-->