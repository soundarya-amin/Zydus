<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Diasens Connect - Admin Portal">

    <title>@yield('title', 'Zydus - diasens')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Ubuntu:wght@300;400;500;700&display=swap"
          rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet"
          href="{{ asset('css/admin.css') }}">

    <!-- DataTables Bootstrap 5 -->
    <link rel="stylesheet"
          href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.min.css">

    @stack('styles')
</head>

<body>

    @include('partials.admin.header')

    @include('partials.admin.sidebar')

    <main class="admin-main-panel">

        @yield('content')

        @include('partials.admin.footer')

    </main>


    <!-- Javascript Files -->
    <!-- Bootstrap 5 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables Core -->
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>

    <!-- DataTables Bootstrap 5 -->
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.min.js"></script>


    <!-- Admin Layout Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const adminSidebar = document.getElementById('adminSidebar');

            if (sidebarToggle && adminSidebar) {
                sidebarToggle.addEventListener('click', () => {
                    adminSidebar.classList.toggle('show');
                });
            }


            // Fullscreen Toggle
            const fullscreenBtn = document.getElementById('fullscreenToggle');

            if (fullscreenBtn) {
                fullscreenBtn.addEventListener('click', (e) => {

                    e.preventDefault();

                    if (!document.fullscreenElement) {
                        document.documentElement.requestFullscreen();
                    } else {
                        if (document.exitFullscreen) {
                            document.exitFullscreen();
                        }
                    }

                });
            }


            // Prevent Browser Back-Forward Cache
            window.addEventListener('pageshow', function(event) {

                if (
                    event.persisted ||
                    (
                        window.performance &&
                        window.performance.navigation &&
                        window.performance.navigation.type === 2
                    )
                ) {
                    window.location.reload();
                }

            });

        });
    </script>

    @stack('scripts')

</body>
</html>
