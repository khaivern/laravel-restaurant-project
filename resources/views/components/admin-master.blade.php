<x-app-layout>
</x-app-layout>
<!DOCTYPE html>
<html lang="en">

<head>
    <x-admin.admin-css />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <x-admin.admin-side-navbar />
        <!-- partial -->
        <!-- page-body-wrapper ends -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    <x-admin.admin-js-scripts />
</body>

</html>
