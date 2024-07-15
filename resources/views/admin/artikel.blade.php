<x-layout-admin>
  <x-slot:title>{{ $title }}</x-slot>


  
 
<div class="relative overflow-x-auto">
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
              <th scope="col" class="px-6 py-3">
                  Judul
              </th>
              <th scope="col" class="px-6 py-3">
                  Tanggal Dibuat
              </th>
              <th scope="col" class="px-6 py-3">
                  Author
              </th>
              <th scope="col" class="px-6 py-3">
                  Kategori
              </th>
              <th scope="col" class="px-6 py-3">
                  Status
              </th>
              <th scope="col" class="px-6 py-3">
                  Action
              </th>
          </tr>
      </thead>
      <tbody>
        @foreach ( $blog as $b )
          
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
          <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $b['title'] }}
          </th>
          <td class="px-6 py-4">
            {{ $b['created_at'] }}
          </td>
          <td class="px-6 py-4">
            {{ $b['author'] }}
          </td>
          <td class="px-6 py-4">
            {{ $b->category->name }}
          </td>
          @php
          $status = $b['status'];
          $bgColor = '';
      
          if ($status === 'diterima') {
              $bgColor = 'bg-green-500 text-white px-2 py-1 rounded';
          } elseif ($status === 'ditolak') {
              $bgColor = 'bg-red-500 text-white px-2 py-1 rounded';
          } elseif ($status === 'diproses') {
              $bgColor = 'bg-blue-500 text-black px-2 py-1 rounded';
          }
      @endphp
      
      <td class="px-6 py-4">
          <span class="{{ $bgColor }}">
              {{ $status }}
          </span>
      </td>
      <td class="px-6 py-4">
        <a href="#" class="inline-flex items-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
            <i class="fas fa-pencil-alt mr-2"></i> Edit
        </a>
    </td>
    
    
        </tr>
        @endforeach
        
      </tbody>
  </table>
</div>

</x-layout-admin>