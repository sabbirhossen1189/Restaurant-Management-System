<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/public">
  @include('admin.css')
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden flex">

  @include('admin.sidebar')

  <!-- Main Content Wrapper -->
  <div class="flex-1 flex flex-col min-h-screen ml-64 transition-all duration-300">
    @include('admin.header')

    <main class="flex-1 p-6 lg:p-8">
      <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
          <h2 class="text-2xl font-bold text-slate-800 heading-font">Update Menu Item</h2>
          <a href="{{ url('view_food') }}"
            class="text-sm font-medium text-slate-500 hover:text-slate-800 transition">&larr; Back to Menu</a>
        </div>

        @if(session('message'))
        <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm">
          <div class="flex">
            <div class="flex-shrink-0">
              <i class="fa fa-check-circle text-emerald-500"></i>
            </div>
            <div class="ml-3">
              <p class="text-sm text-emerald-700">{{ session('message') }}</p>
            </div>
          </div>
        </div>
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-8">
          <form action="{{ url('edit_food', $data->id) }}" method="post" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div>
              <label for="titile" class="block text-sm font-medium text-slate-700 mb-2">Food Title</label>
              <input type="text" name="titile" id="titile" value="{{ $data->titile }}"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition shadow-sm"
                required>
            </div>

            <div>
              <label for="detail" class="block text-sm font-medium text-slate-700 mb-2">Food Description</label>
              <textarea name="detail" id="detail" rows="4"
                class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition shadow-sm resize-y"
                required>{{ $data->detail }}</textarea>
            </div>

            <div>
              <label for="price" class="block text-sm font-medium text-slate-700 mb-2">Price ($)</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                  <span class="text-slate-500 sm:text-sm">$</span>
                </div>
                <input type="number" step="0.01" name="price" id="price" value="{{ $data->price }}"
                  class="w-full pl-8 pr-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition shadow-sm"
                  required>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-slate-700 mb-2">Current Image</label>
              <div class="mb-4">
                <img src="/food_img/{{ $data->image }}" alt="{{ $data->titile }}"
                  class="w-24 h-24 object-cover rounded-lg border border-slate-200 shadow-sm">
              </div>

              <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Upload New Image
                (Optional)</label>
              <div
                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:bg-slate-50 transition cursor-pointer"
                onclick="document.getElementById('image').click()">
                <div class="space-y-1 text-center">
                  <i class="fa fa-image text-3xl text-slate-400 mb-3"></i>
                  <div class="flex text-sm text-slate-600 justify-center">
                    <label for="image"
                      class="relative cursor-pointer bg-white rounded-md font-medium text-red-600 hover:text-red-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-red-500">
                      <span>Select a new image</span>
                      <input id="image" name="image" type="file" class="sr-only">
                    </label>
                  </div>
                  <p class="text-xs text-slate-500">Leave blank to keep current</p>
                </div>
              </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end">
              <button type="submit"
                class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-lg shadow-sm shadow-amber-500/30 transition transform hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fa fa-save"></i> Save Changes
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>

  @include('admin.js')
</body>

</html>