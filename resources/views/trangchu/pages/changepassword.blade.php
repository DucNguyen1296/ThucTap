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
                                        <h5 class="f-title"><i class="ti-lock"></i>Thay đổi mật khẩu</h5>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="/change_password" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" id="input" required="required"
                                                    name="old_password" />
                                                <label class="control-label" for="input">Mật khẩu cũ</label><i
                                                    class="mtrl-select"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" required="required" name="new_password" />
                                                <label class="control-label" for="input">Mật khẩu mới</label><i
                                                    class="mtrl-select"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" required="required" name="retype_newpassword" />
                                                <label class="control-label" for="input">Nhập lại mật khẩu mới</label><i
                                                    class="mtrl-select"></i>
                                            </div>
                                            <a class="forgot-pwd underline" title="" href="#">Forgot
                                                Password?</a>
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
    @if (session()->has('old_password'))
        <script>
            alert('{{ session('old_password') }}');
        </script>
    @endif

    @if (session()->has('notmatch'))
        <script>
            alert('{{ session('notmatch') }}');
        </script>
    @endif
@endsection
