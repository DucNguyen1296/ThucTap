@extends('trangchu/layout')

@section('content')
    @include('trangchu/topbar')
    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            @include('trangchu/sidebarleft')
                            <!-- sidebar -->
                            <div class="col-lg-6">
                                <div class="central-meta">
                                    <ul class="photos">

                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-22.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo2.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-33.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo3.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-44.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo4.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-55.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo5.jpg') }}" alt=""></a>
                                        </li>

                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-66.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo6.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-77.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo7.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-88.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo8.jpg') }}" alt=""></a>
                                        </li>

                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-99.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo12.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-101.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo10.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-101.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo11.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-22.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo1.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-33.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo9.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-99.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo12.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-66.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo6.jpg') }}" alt=""></a>
                                        </li>
                                        <li>
                                            <a class="strip" href="{{ asset('images/resources/photo-66.jpg') }}"
                                                title="" data-strip-group="mygroup"
                                                data-strip-group-options="loop: false">
                                                <img src="{{ asset('images/resources/photo13.jpg') }}"
                                                    alt=""></a>
                                        </li>
                                    </ul>
                                    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                </div><!-- photos -->
                            </div><!-- centerl meta -->
                            @include('trangchu/sidebarright')
                            <!-- sidebar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
