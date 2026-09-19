@extends('layouts.landing')

@section('title', 'آموزش فاکتورین | آموزش سامانه مودیان و صدور صورتحساب')

@section('content')



    <section class="academy-index">


        <div class="academy-container">

            <div class="academy-hero">

                <div class="academy-label">
                    <span class="academy-label-dot"></span>
                    مرکز آموزش فاکتورین
                </div>

                <h1>
                    آموزش کار با <span>فاکتورین</span>
                </h1>

                <p>
                    در این بخش می‌توانید آموزش‌های مربوط به فاکتورین و سامانه
                    مودیان را به صورت مرحله‌به‌مرحله مشاهده کنید و با امکانات
                    مختلف سامانه آشنا شوید.
                </p>

            </div>


            <div class="academy-grid">


                @foreach($academies as $academy)
                <a href="{{ route('academy.item', ['id' => $academy->id, 'title'=> $academy->title]) }}"
                   class="academy-card">

                    <div class="academy-card-top">

                        <div class="academy-card-number">
                            {{$academy->number}}
                        </div>

                        <div class="academy-card-arrow">
                            <svg viewBox="0 0 24 24"
                                 fill="none"
                                 stroke-width="2"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">

                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <polyline points="12 5 19 12 12 19"/>

                            </svg>
                        </div>

                    </div>

                    <h2>
                        {{$academy->title}}
                    </h2>

                    <p>
                        {{$academy->short_description}}
                    </p>

                    <div class="academy-card-footer">
                        مشاهده آموزش ←
                    </div>

                </a>
                @endforeach




            </div>

        </div>


    </section>

@endsection
