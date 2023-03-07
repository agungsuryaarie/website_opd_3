<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <a href="{{ 'dashboard' }}" class="nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('halaman.index') }}"
                class="nav-link {{ request()->segment(1) == 'halaman' ? 'active' : '' }}">
                <i class="nav-icon fa fa-address-card"></i>
                <p>
                    Menu Profile
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('layanan.index') }}"
                class="nav-link {{ request()->segment(1) == 'layanan' ? 'active' : '' }}">
                <i class="nav-icon fa fa-window-restore"></i>
                <p>
                    Layanan
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('berita.index') }}"
                class="nav-link {{ request()->segment(1) == 'berita' ? 'active' : '' }}">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Berita
                </p>
            </a>
        </li>
        <li
            class="nav-item {{ request()->segment(1) == 'galeri' ||
            request()->segment(1) == 'video' ||
            request()->segment(1) == 'slideshow' ||
            request()->segment(1) == 'banner' ||
            request()->segment(1) == 'file-download'
                ? 'menu-open'
                : '' }}">
            <a href="#"
                class="nav-link {{ request()->segment(1) == 'galeri' ||
                request()->segment(1) == 'video' ||
                request()->segment(1) == 'slideshow' ||
                request()->segment(1) == 'banner' ||
                request()->segment(1) == 'file-download'
                    ? 'active'
                    : '' }}">
                <i class="nav-icon fas fa-images"></i>
                <p>
                    Media
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('galeri.index') }}"
                        class="nav-link {{ request()->segment(1) == 'galeri' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Galeri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('video.index') }}"
                        class="nav-link {{ request()->segment(1) == 'video' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Video</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('slideshow.index') }}"
                        class="nav-link {{ request()->segment(1) == 'slideshow' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>SLideshow</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('banner.index') }}"
                        class="nav-link {{ request()->segment(1) == 'banner' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('file-download.index') }}"
                        class="nav-link {{ request()->segment(1) == 'file-download' ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            File Download
                        </p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item">
            <a href="{{ route('user.index') }}"
                class="nav-link {{ request()->segment(1) == 'user' ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    User
                </p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{ route('link.index') }}"
                class="nav-link {{ request()->segment(1) == 'link' ? 'active' : '' }}">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    Link
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('setting.index') }}"
                class="nav-link {{ request()->segment(1) == 'setting' ? 'active' : '' }}">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Setting
                </p>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="nav-link"
                    onclick="event.preventDefault();
                this.closest('form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                        {{ __('Log Out') }}
                    </p>
                </a>
            </form>
        </li>
    </ul>
</nav>
