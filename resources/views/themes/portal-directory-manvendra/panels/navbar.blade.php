<ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
    @foreach ($menus as $item)

    @if ($item['name'] == "Home")
    <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page" href="{{ route('home.index') }}">{{ $item['name']
            }}</a>
    </li>
    @else
    <li class="nav-item">
        <a class="nav-link active text-white" aria-current="page"
            href="{{ route('page.show',['post'=>$item['value']]) }}">{{ $item['name']
            }}</a>
    </li>
    @endif
    @endforeach
</ul>