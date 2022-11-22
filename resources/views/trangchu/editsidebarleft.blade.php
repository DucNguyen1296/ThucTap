<div class="col-lg-3">
    <aside class="sidebar static">
        <div class="widget">
            <h4 class="widget-title">Thông tin cá nhân</h4>
            <ul class="short-profile">
                <li>
                    <span>Giới thiệu</span>
                    <p>{{ $user->title }} </p>
                </li>
                <li>
                    <span>Họ và tên</span>
                    <p>{{ $user->name }} </p>
                </li>
                <li>
                    <span>Ngày sinh nhật</span>
                    <p>{{ $user->date }}</p>
                </li>
                <li>
                    <span>Địa chỉ</span>
                    <p>{{ $user->location }}</p>
                </li>
            </ul>
        </div>
        <div class="widget stick-widget">
            <h4 class="widget-title">Thông tin cài đặt</h4>
            <ul class="naves">
                <li>
                    <i class="ti-info-alt"></i>
                    <a href="{{ route('user.edit.profile') }}" title="">Thông tin cá nhân</a>
                </li>
                <li>
                    <i class="ti-mouse-alt"></i>
                    <a href="edit-work-eductation.html" title="">Học vấn và công việc</a>
                </li>
                <li>
                    <i class="ti-heart"></i>
                    <a href="edit-interest.html" title="">Sở thích</a>
                </li>
                <li>
                    <i class="ti-settings"></i>
                    <a href="edit-account-setting.html" title="">Cài đặt nâng cao</a>
                </li>
                <li>
                    <i class="ti-lock"></i>
                    <a href="change_password" title="">Thay đổi mật khẩu</a>
                </li>
            </ul>
        </div><!-- settings widget -->
    </aside>
</div>
<!-- sidebar -->
