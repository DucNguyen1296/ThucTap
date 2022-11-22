@extends('trangchu/layout')
@section('content')
    @include('trangchu/topbar')
    <section>
        <div class="gap gray-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row" id="page-contents">
                            @include('trangchu/editsidebarleft')
                            <!-- sidebar -->
                            <div class="col-lg-6">
                                <div class="central-meta">
                                    <div class="about">
                                        <div class="personal">
                                            <h5 class="f-title"><i class="ti-info-alt"></i> Giới thiệu bản thân</h5>
                                            <p>
                                                {{ $user->title }}
                                            </p>
                                        </div>
                                        <div class="d-flex flex-row mt-2">
                                            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                                                <li class="nav-item">
                                                    <a href="#basic" class="nav-link active" data-toggle="tab">Thông tin cá
                                                        nhân</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#location" class="nav-link" data-toggle="tab">Vị trí</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#work" class="nav-link" data-toggle="tab">Học vấn và công
                                                        việc</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#interest" class="nav-link" data-toggle="tab">Sở thích</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#lang" class="nav-link" data-toggle="tab">Ngôn ngữ</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="basic">
                                                    <ul class="basics">
                                                        <li><i class="ti-user"></i>{{ $user->name }}</li>
                                                        <li><i class="ti-map-alt"></i>{{ $user->location }}</li>
                                                        <li><i class="ti-mobile"></i>+1-234-345675</li>
                                                        <li><i class="ti-email"></i>{{ $user->email }}</li>
                                                        <li><i class="ti-world"></i>www.fakebook.com</li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="location" role="tabpanel">
                                                    <div class="location-map">
                                                        <div id="map-canvas"></div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="work" role="tabpanel">
                                                    <div>

                                                        <a href="#" title="">Envato</a>
                                                        <p>work as autohr in envato themeforest from 2013</p>
                                                        <ul class="education">
                                                            <li><i class="ti-facebook"></i> BSCS from Oxford University</li>
                                                            <li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="interest" role="tabpanel">
                                                    <ul class="basics">
                                                        <li>Footbal</li>
                                                        <li>internet</li>
                                                        <li>photography</li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" id="lang" role="tabpanel">
                                                    <ul class="basics">
                                                        <li>english</li>
                                                        <li>french</li>
                                                        <li>spanish</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
