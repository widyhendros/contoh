<x-maz-sidebar :href="route('dashboard')" :logo="asset('images/logo/logo21.png')" :admin="Session::get('admin')">

    <!-- Add Sidebar Menu Items Here -->
    @if(Session::get('admin') =='1' || Session::get('admin') =='2' )
    <x-maz-sidebar-item name="Dashboard" :link="route('dashboard')" icon="bi bi-grid-fill"></x-maz-sidebar-item>
    <li class="sidebar-item has-sub">
        <a href="#" class="sidebar-link">
            <i class="bi bi-person-lines-fill"></i>
            <span>Siswa</span>
        </a>
        <ul class="submenu" style="display: none;">
            <li class="submenu-item">
                <a href="{{ route('siswa') }}">Data Induk Siswa</a>
            </li>
            <li class="submenu-item ">
                <a href="{{ route('siswabaru') }}">Data Siswa Baru</a>
            </li>
            <li class="submenu-item ">
                <a href="{{ route('siswamutasi') }}">Mutasi</a>
            </li>
            @if(Session::get('admin') =='1' )
            <li class="submenu-item ">
                <a href="{{ route('alokasikelas') }}">Alokasi Kelas</a>
            </li>
            @endif
        </ul>
    </li>
    @if(Session::get('admin') !='2' )
    <x-maz-sidebar-item name="User" :link="route('user')" icon="bi bi-person-plus-fill"></x-maz-sidebar-item>
    <x-maz-sidebar-item name="Tahun Pelajaran" :link="route('tahunajaran')" icon="bi bi-calendar-range"></x-maz-sidebar-item>
    @endif
    @endif


    
</x-maz-sidebar>