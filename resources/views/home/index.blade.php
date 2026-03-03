<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('home.css')
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

    @include('home.header')

    <main>
        @include('home.about')
        @include('home.gallary')
        @include('home.booktable')
        @include('home.blog')
        @include('home.contact')
    </main>

    @include('home.footer')

    <!--  Back to top button  -->
    <a href="#home"
        class="fixed bottom-6 right-6 bg-red-600 text-white p-3 rounded-full shadow-lg hover:bg-red-700 transition duration-300 z-50">
        <i class="fas fa-arrow-up"></i>
    </a>

    @include('home.js')
</body>

</html>