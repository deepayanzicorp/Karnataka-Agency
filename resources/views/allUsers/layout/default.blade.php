<!DOCTYPE html>
<html lang=en>

@include('allUsers.element.headerscript')

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed" style="font-size: smaller; font-family: Helvetica;">
    <div class=wrapper>

        {{-- Top NavBar --}}
        @include('allUsers.element.header')

        {{-- Left Sidebar --}}
        @include('allUsers.element.sidebar', ['userDetail' => $userDetail])

        <div class=content-wrapper>
            {{-- Body --}}
            @yield('content')          
        </div>
        
        {{-- <aside class="control-sidebar control-sidebar-dark">
            <div class=p-3>
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside> --}}

        {{-- Footer --}}
        @include('allUsers.element.footer')
        
    </div>

    @include('allUsers.element.footerscript')
    
</body>

</html>