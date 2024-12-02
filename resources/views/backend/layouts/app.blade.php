<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>INAYAT | Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="/fav.jpg">
    <link rel="icon" type="image/png" sizes="192x192" href="/fav.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="/fav.jpg">
    <!-- END Icons -->
    <link rel="stylesheet" href="/backend/assets/js/plugins/select2/css/select2.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap">
    <link rel="stylesheet" id="css-main" href="/backend/assets/css/codebase.min.css">
    <link rel="stylesheet" href="/backend/assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/toastr.min.css">
    <link rel="stylesheet" href="/backend/assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">

    <style type="text/css">
        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 100%;
            margin-top: 5px;
        }

        .tox-notifications-container {
            display: none !important;
        }

        .tox-statusbar__branding {
            display: none !important;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #c70202;
            border-color: #c70202;
            border-radius: 50px;
        }

        .page-link {
            border: none;
            background: none;
        }
        .modal-content{
            background: #fff!important;
        }
        .image-cross {
            background: #a50000;
            padding: 7px 13px;
            border: none;
            color: #fff;
            position: absolute;
            z-index: 1;
        }
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">   --}}
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
        @include('backend.layouts.sideoverlay')

        @if (Auth::user()->role_id == 3)
            @include('backend.layouts.employee-sidebar')
        @else
            @include('backend.layouts.sidebar')
        @endif        

        @include('backend.layouts.header')
        <!-- Main Container -->
        <main id="main-container">
            @yield('content')
        </main>
        <!-- END Main Container -->
        @include('backend.layouts.footer')
    </div>
    <!-- END Page Container -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

    <!-- jQuery (necessary for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper.js (necessary for Bootstrap 4) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS (necessary for Summernote) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.editor').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    <script src="/backend/assets/js/codebase.app.min.js"></script>
    <script src="/backend/assets/js/plugins/chart.js/chart.min.js"></script>
    <script src="/backend/assets/js/pages/be_pages_dashboard.min.js"></script>

    <script src="/backend/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="/backend/assets/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="/backend/assets/js/image.js"></script>
    <script src="/backend/assets/js/plugins/select2/js/select2.full.min.js"></script>
    
    <script>Codebase.helpersOnLoad(['jq-select2']);</script>

    <!-- Page JS Code -->
    <script src="/backend/assets/js/pages/be_tables_datatables.min.js"></script>

    <script src="/toastr.min.js"></script>
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.delete-confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>

    <script>
        $(document).on('submit', '.confirmDelete', function(e){
            e.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    const href = $(this).attr('action');
                    const module_id = $(this).attr('module_id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: href,
                        method: 'DELETE',
                        data: {module_id: module_id},
                        success: function(res){
                            $('.table').load(location.href+' .table');
                            toastr.success(res.message);
                        },
                        error: function(err){
                            toastr('Something went wrong!');
                            console.log(err);
                        },
                    });
                } 
            });
        });

        //  update status
        $(document).on('click', '.updateStatus', function(e){
            e.preventDefault();
            const href = $(this).attr('href');
            const module_id = $(this).attr('module_id');
            const status = $(this).attr('status');
            $.ajax({
                url: href,
                method: 'get',
                data: {id:module_id, status:status},
                success: function(res){
                    console.log(res);
                    $('.table').load(location.href+' .table');
                    if (res.status == 0) {
                        toastr.warning(res.message);
                    } else if(res.status == 1) {
                        toastr.success(res.message);
                    }                        
                },
                error: function(err){
                    toastr.error('Something went wrong!');
                    console.log(err);
                },
            });
        });
    </script>

    @yield('script')
</body>

</html>
