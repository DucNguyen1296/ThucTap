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
                                    <div class="editing-info">
                                        <h5 class="f-title"><i class="ti-info-alt"></i>Thay đổi thông tin cá nhân</h5>

                                        <form action="/edit_profile" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" id="input" name="name"
                                                    value="{{ $user->name }}" required="required" />
                                                <label class="control-label" for="input">Họ và tên</label><i
                                                    class="mtrl-select"></i>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required="required" name="location"
                                                    value="{{ $user->location }}" required />
                                                <label class="control-label" for="input">Địa chỉ</label><i
                                                    class="mtrl-select"></i>
                                            </div>

                                            <div class="form-group">
                                                <input type="text" required="required" name="title"
                                                    value="{{ $user->title }}" required />
                                                <label class="control-label" for="input">Giới thiệu bản thân</label><i
                                                    class="mtrl-select"></i>
                                            </div>

                                            <div class="form-group">
                                                <input type="date" required="required" name="date"
                                                    value="{{ $user->date }}" required />
                                                <label class="control-label" for="input">Ngày sinh nhật</label><i
                                                    class="mtrl-select"></i>
                                            </div>

                                            <div class="form-radio">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" checked="checked" name="radio"><i
                                                            class="check-box"></i>Male
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="radio"><i class="check-box"></i>Female
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="submit-btns">
                                                <button type="submit" class="mtr-btn"><span>Cập nhập</span></button>
                                            </div>
                                        </form>
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
