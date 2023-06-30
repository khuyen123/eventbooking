<!DOCTYPE html>
<html >

<head>
    @include('client.adc.head')
</head>

<body>
   @include('client.adc.menu')
    <!-- Header End -->
    
    <!-- Hero Section Begin -->
    
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    @yield('content')
    <!-- Home Room Section End -->

   
    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
   @include('client.adc.footer')
</body>

</html>