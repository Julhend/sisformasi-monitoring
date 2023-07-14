<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENU</li>
            <!-- Optionally, you can add icons to the links -->
            {{-- @if (auth()->user()->role == 'staff' || auth()->user()->role == 'admin') --}}
            
            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
            @if (auth()->user()->role == 'admin')
            <li class="active"><a href="{{ route('users.index') }}"><i class="fa fa-link"></i> <span>Data Karyawan</span></a></li>
            @endif
            <li class="active"><a href="{{ route('digitalcaliper.index') }}"><i class="fa fa-link"></i> <span>Dial Calipers</span></a></li>
            <li class="active"><a href="{{ route('threadgauge.index') }}"><i class="fa fa-link"></i> <span>Thread Gauge</span></a></li>
            <li class="active"><a href="{{ route('outsidedial.index') }}"><i class="fa fa-link"></i> <span>Outside Digital Micrometer</span></a></li>
            <li class="active"><a href="{{ route('masterlist.index') }}"><i class="fa fa-link"></i> <span>Masterlist</span></a></li>
        
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
