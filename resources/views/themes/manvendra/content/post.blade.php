@extends('themes.manvendra.layouts.post')

@if ($post->post_type == 'listing')
@section('content')
<!-- like-->
<section>
    <div class="like">
        <div class="container">
            <div class="beener">
                <div class="row">
                    <div class=" col-lg-9 col-md-6 col-12">
                        <h3>{{ optional($post->seo_analyzers_relation)->domain_title ?? "" }}</h3>
                        <p>{{ optional($post->seo_analyzers_relation)->domain_description ?? "" }}</p>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="cc">
                            @if (!empty($post->thumbnail))
                            <img class="img-fluid mt-2"
                                src="https://s3.us-west-1.wasabisys.com/{{ config('filesystems.disks.wasabi.bucket') }}/scrape/thumbnail/{{ $post->thumbnail }}">
                            @endif
                        </div>
                    </div>

                </div>
                <div class="bg-blog-s">
                    <div class="row">
                        <div class=" col-lg-4 col-md-6 col-12">
                            <div class="state-sec">
                                <p class="heading-blog">Stats</p>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; Alexa Rank:&nbsp;<span
                                        class="span-alexa"> {{ optional($post->attributes_relation)->alexa_rank ?? ""
                                        }}</span>
                                </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; Popular in Country:&nbsp;<span
                                        class="span-alexa"> {{ optional($post->attributes_relation)->alexa_country ?? ""
                                        }}</span>
                                </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; Country Alexa Rank: &nbsp;<span
                                        class="span-alexa"> {{ optional($post->attributes_relation)->alexa_country_rank
                                        ?? ""
                                        }}</span>
                                </p>
                                <hr>
                            </div>

                        </div>
                        <div class=" col-lg-4 col-md-6 col-12">
                            <div class="state-sec">
                                <p class="heading-blog" style="visibility: hidden;">Stats</p>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp;language: &nbsp;<span
                                        class="span-alexa">{{ optional($post->seo_analyzers_relation)->language ?? ""
                                        }}</span>
                                </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; Response Time: &nbsp;<span
                                        class="span-alexa">{{ optional($post->seo_analyzers_relation)->loadtime ?? ""
                                        }}</span>
                                </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; SSL: &nbsp;<span class="span-alexa">{{
                                        ( optional($post->Ssl_Details_relation)->isValid ==1) ? "Enable" : "Disable" ??
                                        ""
                                        }}</span> </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; Status: &nbsp;<span
                                        class="span-alexa">up</span> </p>
                                <hr>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-12">
                            <div class="state-sec">
                                <p class="heading-blog">Code To Txt Ratio</p>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp;Word Count &nbsp;<span
                                        class="span-alexa">{{ optional($post->seo_analyzers_relation)->word_count
                                        ?? "" }}</span> </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp;Links &nbsp;<span class="span-alexa">{{
                                        optional($post->seo_analyzers_relation)->links['external'] ?? ""}}</span>
                                </p>
                                <hr>
                                <p class="p-alexa"><span><i class="fa fa-check blog-bgstate"
                                            aria-hidden="true"></i></span>&nbsp; ratio &nbsp;<span class="span-alexa">{{
                                        optional($post->seo_analyzers_relation)->codeToTxtRatio ?? "" }}</span> </p>
                                <hr>
                            </div>
                        </div>

                    </div>
                </div>

                @if (!empty($post->Ssl_Details_relation))
                <div class="bg-blog-blue-s">
                    <div class="row">
                        <div class=" col-lg-6 col-md-6 col-12">
                            <div class="state-sec-ssl">
                                <p class="heading-blogblue">SSL Details</p>
                                <p class="SSL-Details">SSL Issuer: </p>

                                <p class="p-alexa"><b> Issuer:</b><span class="span-alexa"> &nbsp;{{
                                        optional($post->Ssl_Details_relation)->issuer ?? "" }}</span> </p>
                                <hr>
                                <p class="p-alexa"><b> Valid From:</b><span class="span-alexa">&nbsp; {{
                                        optional($post->Ssl_Details_relation)->validFromDate ?? ""}}
                                    </span> </p>
                                <hr>
                                <p class="p-alexa"><b>Expiration Date:</b><span class="span-alexa">&nbsp; &nbsp;{{
                                        optional($post->Ssl_Details_relation)->expirationDate ??
                                        ""}}</span>
                                </p>
                                <hr>
                            </div>

                        </div>
                        <div class=" col-lg-6 col-md-6 col-12">
                            <div class="state-sec-ssl">
                                <p class="heading-blogblue" style="visibility: hidden;">SSL Organization:</p>
                                <p class="SSL-Details">SSL Organization: </p>
                                <p class="p-alexa"><b> Signature </b><span class="span-alexa"> {{
                                        optional($post->Ssl_Details_relation)->getFingerprint ?? ""}}</span> </p>
                                <hr>
                                <p class="p-alexa"><b> Algorithm: </b><span class="span-alexa"> {{
                                        optional($post->Ssl_Details_relation)->getSignatureAlgorithm ?? ""}} </span>
                                </p>
                                <hr>

                            </div>

                        </div>
                    </div>
                </div>
                @endif



            </div>







            <?php
            $i = 1;
            ?>

            @foreach ($post->domain_alternative as $alternative)

            @if ($loop->first)
            <div class="row">
                <div class="col-12 col-md-10">
                    <div class="middle-sec mt-4 mb-4">
                        <h2>Top Alternative to {{ ucfirst($post->slug) }} & Websites like {{ ucfirst($post->slug) }}
                        </h2>
                    </div>
                </div>
            </div>
            @endif

            @if ($alternative->status == 'publish')

            <?php 
              $alternative_data = alternative_data($alternative->slug);
            ?>
            <div class="beener">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="cc">
                            <div class="custome-bage">
                                <span class="custome-1232">
                                    {{ $i++ }}
                                </span>
                            </div>



                            @if (!empty($alternative_data->thumbnail))
                            <img class="img-fluid  mt-2"
                                src="https://s3.us-west-1.wasabisys.com/{{ config('filesystems.disks.wasabi.bucket') }}/scrape/thumbnail/{{ $alternative_data->thumbnail }}">

                            @else
                            <img class="img-fluid  mt-2"
                                src="https://s3.us-west-1.wasabisys.com/{{ config('filesystems.disks.wasabi.bucket') }}/scrape/thumbnail/noimage.png">
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <h2>
                            <img class="img-fluid  mt-2"
                                src="https://t2.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=http://{{ $alternative_data->slug }}&size=32">
                            <a class="link-post" href="{{ route('post.show',['post'=>$alternative_data->slug]) }}">{{
                                ucfirst( $alternative_data->slug) ?? "" }}</a>
                        </h2>
                        <h3>{{ $alternative_data->seo_analyzers_relation->domain_title ?? ""}}</h3>
                        <p>{{ $alternative_data->seo_analyzers_relation->domain_description ?? "" }}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/4.png') }}">
                            {{ $alternative->ip ?? "" }}
                        </a>

                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/5.png') }}">
                            {{ optional($alternative_data->ip_record_relation)->country_name ?? "" }}
                        </a>

                        <a class="btn btn-meta btn-light ">
                            <img class="img-fluid" src="{{ asset('themes/manvendra/assets/images/ssl.png') }}">
                            {{ ((optional($alternative_data->Ssl_Details_relation)->isValid == 1) ? 'Valid SSL' :
                            'InValid
                            SSL') ?? "" }}
                        </a>

                        <a href="{{ route('post.show',['post'=>$alternative->slug]) }}"
                            class="btn btn-success btn-product">Site Like {{
                            ucfirst($alternative->slug) }}</a>
                    </div>
                </div>



            </div>

            @endif

            @endforeach

            <div class="beener">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="cc">
                            <h2>Technologies Used by {{ $post->slug }}</h2>
                            @foreach ($post->technologies as $tech_stack)
                            <li>{{ $tech_stack->name }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



            <div class="beener">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="cc">
                            <h2>Dns Records of {{ $post->slug }}</h2>
                            A Record: {!! optional($post->DnsDetails_relation)->A ?? "" !!}<br>
                            AAAA Record: {!! optional($post->DnsDetails_relation)->AAAA ?? "" !!}<br>
                            CNAME Record: {!! optional($post->DnsDetails_relation)->CNAME ?? "" !!}<br>
                            NS Record: {!! optional($post->DnsDetails_relation)->NS ?? "" !!}<br>
                            SOA Record: {!! optional($post->DnsDetails_relation)->SOA ?? ""!!}<br>
                            MX Record: {!! optional($post->DnsDetails_relation)->MX ?? "" !!}<br>
                            SRV Record: {!! optional($post->DnsDetails_relation)->SRV ?? "" !!}<br>
                            TXT Record: {!! optional($post->DnsDetails_relation)->TXT ?? "" !!}<br>
                            DNSKEY Record: {!! optional($post->DnsDetails_relation)->DNSKEY ?? "" !!}<br>
                            CAA Record: {!! optional($post->DnsDetails_relation)->CAA ?? "" !!}<br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="beener">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="cc">
                            <h2>Whois Detail of {{ $post->slug }}</h2>
                            {!! nl2br(optional($post->who_is_relation)->text) ?? "" !!}
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
</section>
<!-- end of like-->
@endsection
@endif