@include('app/header')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('olumlu'))
                    <div class="alert alert-success">
                        {{ Session::get('olumlu') }}
                    </div>
                @endif

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 grid-margin">

                <!-- partial (Content): İçeriğim -->
                @yield('content')


            </div>
        </div>
    </div>

    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023. <a
                    href="#" target="_blank">EMRE DURAK - 2019507056</a> All rights reserved.</span>
        </div>
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Template kaynağı: <a
                    href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>
        </div>
    </footer>
    <!-- partial -->
</div>

@include('app/footer')
