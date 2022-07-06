<footer>
    <div class="footer mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3">
                    <p class="heading-footer">Quick Links</p>

                    <ul class="ff ">
                        @foreach ($menus as $item)
                        @if ($item['name'] == "Home")
                        <li>
                            <a href="{{ route('home.index') }}">{{ $item['name']
                                }}</a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('page.show',['post'=>$item['value']]) }}">{{
                                $item['name']
                                }}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                </div>
                <div class="col-12 col-md-3">
                    <p class="heading-footer">Recent Updated</p>
                    <ul class="ff">
                        @foreach ($recent_update as $recent_update_item)
                        <li><a href="{{ route('post.show',['post'=>$recent_update_item['slug']]) }}">{{
                                $recent_update_item['slug'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <p class="heading-footer">Top Visited</p>
                    <ul class="ff">
                        @foreach ($top_visited as $top_visited_item)
                        <li><a href="{{ route('post.show',['post'=>$top_visited_item['slug']]) }}">{{
                                $top_visited_item['slug'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-md-3">
                    <p class="heading-footer">Recent Added</p>
                    <ul class="ff">
                        @foreach ($recent_added as $recent_added_item)
                        <li><a href="{{ route('post.show',['post'=>$recent_added_item['slug']]) }}">{{
                                $recent_added_item['slug'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-footer">
        <div class="container">
            <div class="main-header">
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
                    <div class="container">
                        <a class="navbar-brand" href="{{ route('home.index') }}">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/logo.png') }}">
                        </a>

                        <div class=" navbar-collapse">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                                @foreach ($menus as $item)
                                @if ($item['name'] == "Home")
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('home.index') }}">{{ $item['name']
                                        }}</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link text-white"
                                        href="{{ route('page.show',['post'=>$item['value']]) }}">{{ $item['name']
                                        }}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <a class="nav-link text-white">{{ Version::version() }}</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer-->