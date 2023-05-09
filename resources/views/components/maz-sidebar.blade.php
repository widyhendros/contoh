@props(['href','logo', 'title' => 'Menu', 'admin'])

@php
$classes = ($admin =='1' || $admin =='2' ) ? 'active' : '';
@endphp
<div id="sidebar" class="{{ $classes }}">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex">
                <div class="logo d-flex">
                    <a href="{{ $href }}"><img src="{{ $logo }}" alt="Logo" height="100px" width-="100px" srcset=""></a>
                    <h5 class="ms-4 my-auto mt-3">Buku Induk Siswa Digital</h5>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                {{-- <li class="sidebar-title">{{ $title }}</li> --}}
                {{ $slot ?? '' }}
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i class="bi bi-x"></i></button>
    </div>
</div>