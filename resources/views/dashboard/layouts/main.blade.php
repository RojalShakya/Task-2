<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intern</title>
    @include('dashboard.layouts.style')
</head>
<body>
    <div class="supercontainer">
        @include('dashboard.layouts.header')

        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper">
            @include('dashboard.layouts.sidebar')
              <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
              </div>
            </div>
          </div>

        @include('dashboard.layouts.footer')
    </div>
    @include('dashboard.layouts.script')
</body>
</html>
