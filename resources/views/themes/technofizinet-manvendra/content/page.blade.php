@extends('themes.technofizinet-manvendra.layouts.post')


@if ($post->post_type == 'page')
@section('content')
<section>
    <div class="like">
        <div class="container">
            <div class="beener">
                <div class="row">
                    <div class=" col-lg-9 col-md-6 col-12">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
@endif