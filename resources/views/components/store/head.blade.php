
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="TickHub - Electronics Store Ecommerce Website Template">


  <!-- bootstrap css -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/bootstrap.min.css') }}">

  <!-- owl carousel -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/owl.carousel.min.css') }}">

  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/all.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('css/storeFront css/styles.css') }}">

  <title>{{ $settings->store_name ?? 'Everything Store' }} - Electronics Store </title>
</head>
