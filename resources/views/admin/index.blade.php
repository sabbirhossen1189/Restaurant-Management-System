<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden flex">

  @include('admin.sidebar')

  <!-- Main Content Wrapper (offset by sidebar width) -->
  <div class="flex-1 flex flex-col min-h-screen ml-64 transition-all duration-300">
    @include('admin.header')

    <main class="flex-1 p-6 lg:p-8">
      @include('admin.body')
    </main>
  </div>

  @include('admin.js')
</body>

</html>