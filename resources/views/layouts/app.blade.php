<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}" />
        <!-- endinject -->
        <!-- plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}" />
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}" />
        <!-- End Layout styles -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:partials/_navbar.html -->
            <!-- navbar -->
            @auth

            @include('layouts.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_sidebar.html -->
                @include('layouts.sidebar')

                <!-- partial -->
                <div class="main-panel">
                    
                    <div class="content-wrapper">
                        @yield('content') 
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    @include('layouts.footer')

                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            @else
            
            <div class="container-fluid page-body-wrapper">
                <!-- <div class="main-panel"> -->
                    <div class="content-wrapper">
                        @yield('login') 
                    </div> 
                <!-- </div> -->
            </div>
            @endauth
            <!-- page-body-wrapper ends -->
        </div>
        @include('sweetalert::alert')

        <script>
            function candidateDelete(val) {
                var postId = val;
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete '
                }).then((result) => {
                    if (result.value) {
                        window.location.href = "{{ url('/project/delete/') }}" + "/" + postId;
                    }
                })
            }

        </script>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
        <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ asset('assets/js/demo_1/dashboard.js') }}"></script>
        <!-- End custom js for this page--> 

        <script src="{{ asset('assets/js/shared/jquery.cookie.js') }}" type="text/javascript"></script>
    </body>
</html>
