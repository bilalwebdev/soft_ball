
<div data-url="javascript:;" id="myButton" onclick="isDark()"
    class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
    <div class="mr-4 text-slate-600 dark:text-slate-200">Dark Mode</div>
    <div class="dark-mode-switcher__toggle border" id="mydiv"></div>
</div>

<script>
document.getElementsByTagName("html")[0].setAttribute("class", "dark");
    function isDark() {
        return;
        if (localStorage.getItem("theme") === "dark") {
            document.getElementsByTagName("html")[0].setAttribute("class", "light");
            localStorage.setItem("theme", "light");
        } else {
            document.getElementsByTagName("html")[0].setAttribute("class", "dark");
            localStorage.setItem("theme", "dark");
        }


    }

    if (localStorage.getItem("theme") === "dark") {

        document.getElementsByTagName("html")[0].setAttribute("class", "dark");

        let sw = document.getElementById('mydiv');


        sw.classList.add("dark-mode-switcher__toggle--active")



    } else {
        document.getElementsByTagName("html")[0].setAttribute("class", "dark");
        // document.getElementsByTagName("html")[0].setAttribute("class", "light");


    }
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
<script src="{{ asset('admin_assets/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!-- END: JS Assets-->
@livewireScripts
{{-- <script>
     var notyf = new Notyf({
  duration: 3000,
  position: {
    x: 'right',
    y: 'top',
  },
  dismissible:true
});

     Livewire.on('success', message=>{
        notyf.success(message);
     })
</script>
@if (session()->has('success'))
    <script>
       // console.log('ssdsd');
        notyf.success("{{ session()->get('success') }}");
    </script>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            console.log('sdsdsd');
            notyf.error("{{ $error }}");
        </script>
    @endforeach
@endif --}}
<script>
    $(window).load(function(){
   $('#loader').fadeOut("slow");
});
</script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        background: 'lightgreen',
        color: 'white',
        customClass: {
            popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true
    })

    Livewire.on('success', message=>{
            Toast.fire({
                icon: 'success',
                title: message
            })
    })

    Livewire.on('error', message=>{
            Toast.fire({
                icon: 'error',
                title: message
            })
    })


    @if (session()->has('success'))
                Toast.fire({
                    icon: 'success',
                    title: "{{ session('success') }}"
                })
    @endif

    @if (session()->has('error'))
                Toast.fire({
                    icon: 'error',
                    title: "{{ session('error') }}"
                })
    @endif
</script>
@stack('scripts')

