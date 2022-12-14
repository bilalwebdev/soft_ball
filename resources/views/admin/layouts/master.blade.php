<!DOCTYPE html>
<html lang="en" class="dark">
    @include('admin.layouts.header')
<body>

@include('admin.layouts.side-menu')
<div id="loader">
    <div  style="display: flex; justify-content: center; align-items:center; background-color:black; position:fixed; top: 0px; left:0px; z-index: 9999; width:100%; height:100%; opacity:.75;">
        <div class="lds-facebook">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
@yield('content')
@include('admin.layouts.footer')

</body>
</html>
