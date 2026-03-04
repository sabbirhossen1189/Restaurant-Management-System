<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden flex">

  @include('admin.sidebar')

  <!-- Main Content Wrapper -->
  <div class="flex-1 flex flex-col min-h-screen ml-64 transition-all duration-300">
    @include('admin.header')

    <main class="flex-1 p-6 lg:p-8">
      <div class="max-w-7xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
          <div>
            <h2 class="text-2xl font-bold text-slate-800 heading-font">Menu Items</h2>
            <p class="text-sm text-slate-500 mt-1">Manage and update your restaurant's food offerings.</p>
          </div>
          <a href="{{ url('add_food') }}"
            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg shadow-sm shadow-red-500/30 transition flex items-center gap-2">
            <i class="fa fa-plus"></i> Add New
          </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr
                  class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                  <th class="px-6 py-4">Image</th>
                  <th class="px-6 py-4">Food Title</th>
                  <th class="px-6 py-4">Details</th>
                  <th class="px-6 py-4">Price</th>
                  <th class="px-6 py-4 text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 text-sm">
                @foreach($data as $item)
                <tr class="hover:bg-slate-50 transition group">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <img src="/food_img/{{ $item->image }}" alt="{{ $item->titile }}"
                      class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm group-hover:shadow transition">
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap font-medium text-slate-800">
                    {{ $item->titile }}
                  </td>
                  <td class="px-6 py-4 text-slate-600 max-w-xs truncate">
                    {{ $item->detail }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap font-semibold text-emerald-600">
                    ${{ $item->price }}
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                    <a href="{{ url('update_food', $item->id) }}"
                      class="inline-flex items-center justify-center w-8 h-8 rounded-md bg-amber-50 text-amber-600 hover:bg-amber-100 transition"
                      title="Edit">
                      <i class="fa fa-pen text-xs"></i>
                    </a>
                    <a href="{{ url('delete_food', $item->id) }}"
                      onclick="return confirm('Are you sure you want to permanently delete this item?')"
                      class="inline-flex items-center justify-center w-8 h-8 rounded-md bg-red-50 text-red-600 hover:bg-red-100 transition"
                      title="Delete">
                      <i class="fa fa-trash text-xs"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          @if(count($data) == 0)
          <div class="px-6 py-12 text-center">
            <div
              class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 text-slate-400 mb-4">
              <i class="fa fa-utensils text-2xl"></i>
            </div>
            <h3 class="text-base font-medium text-slate-900">No Food Items found</h3>
            <p class="mt-1 text-sm text-slate-500">Get started by creating a new menu item.</p>
          </div>
          @endif
        </div>
      </div>
    </main>
  </div>

  @include('admin.js')
</body>

</html>