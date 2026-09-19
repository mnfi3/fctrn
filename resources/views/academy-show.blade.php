@extends('layouts.landing')

@section('title', $academy->title)

@section('content')



    <section class="academy-detail">


        <div class="academy-detail-container">


            {{-- Header --}}
            <header class="academy-detail-header">

                <div class="academy-detail-label">
                    <span></span>
                    آموزش فاکتورین
                </div>

                <h1>
                    {{$academy->title}}
                </h1>

                <p>
                    {{$academy->short_description}}
                </p>

            </header>


            {{-- Video --}}
            <div class="academy-detail-video">
                @if(strlen($academy->aparat_embeded) > 3)
                    {!! $academy->aparat_embeded !!}
                @else
                    <iframe src="{{asset($academy->video_path)}}" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe>
                @endif
            </div>


            {{-- Content --}}
            <article class="academy-content">

                <div class="academy-content-title">
                    توضیحات آموزش
                </div>

                <div class="academy-content-body">

                   {!! $academy->description !!}

                </div>

            </article>


            {{-- Back --}}
            <div class="academy-back">

                <a href="{{ route('academy.index') }}">

                    <svg width="18"
                         height="18"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         stroke-linecap="round"
                         stroke-linejoin="round">

                        <polyline points="15 18 9 12 15 6"></polyline>

                    </svg>

                    بازگشت به آموزش‌ها

                </a>

            </div>


        </div>


    </section>

@endsection
