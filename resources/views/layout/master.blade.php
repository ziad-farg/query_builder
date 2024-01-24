<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set, viewport, and compatibility -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title for the document -->
    <title>Document</title>

    <!-- Including the header partial -->
    @include('partial.header')
</head>

<body>
    <!-- Content section, which will be replaced by content from child views -->
    @yield('content')

    <!-- Including the footer partial -->
    @include('partial.footer')
</body>

</html>
