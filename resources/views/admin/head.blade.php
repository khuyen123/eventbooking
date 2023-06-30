<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{$title}}</title>

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}"  rel="stylesheet">
<!-- icheck bootstrap -->
<link href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}"  rel="stylesheet">
<!-- Theme style -->
<link href="{{asset('admin/dist/css/adminlte.min.css')}}"rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('head')
