@extends('themes.technofizinet-manvendra.layouts.home')


@section('content')
<!-- like-->
<section>
    <div class="like">
        <div class="container">


            @foreach ($posts as $post)
            <div class="beener">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="cc">
                            @if (!empty($post->thumbnail))
                            <img class="img-fluid mt-2"
                                src="https://s3.us-west-1.wasabisys.com/{{ config('filesystems.disks.wasabi.bucket') }}/scrape/thumbnail/{{ $post->thumbnail }}">
                            @else
                            <img class="img-fluid  mt-2"
                                src="https://s3.us-west-1.wasabisys.com/{{ config('filesystems.disks.wasabi.bucket') }}/scrape/thumbnail/noimage.png">
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <h2>
                            <img class="img-fluid  mt-2"
                                src="https://t2.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=http://{{ $post->slug }}&size=32">
                            <a class="link-post" href="{{ route('post.show',['post'=>$post->slug]) }}">Sites Like {{
                                ucfirst($post->slug) }}</a>
                        </h2>
                        <h3>{{ optional($post->seo_analyzers_relation)->domain_title }}</h3>
                        <p>{{ optional($post->seo_analyzers_relation)->domain_description }}</p>

                    </div>

                    <div class="col-12 col-md-4">
                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/4.png') }}">
                            {{ $post->ip ?? "" }}
                        </a>

                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/5.png') }}">
                            {{ $post->ip_record_relation->country_name ?? "" }}
                        </a>

                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/ssl.png') }}">
                            {{ ((optional($post->Ssl_Details_relation)->isValid == 1) ? 'Valid SSL' : 'invalid SSL') ??
                            "test" }}
                        </a>

                        <a href="{{ route('post.show',['post'=>$post->slug]) }}" class="btn btn-product"><strong>SITE
                                LIKE {{
                                Str::upper($post->slug) }}</strong></a>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="container">
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>

        </div>

    </div>

</section>
<!-- end of like-->
@endsection