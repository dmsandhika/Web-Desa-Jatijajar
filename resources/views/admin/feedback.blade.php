<x-layout-admin>
  <x-slot:title>{{ $title }}</x-slot>

  <div class="relative overflow-x-auto">
      <table
          class="w-full text-sm text-left rtl:text-right text-gray-500  mt-6"
      >
          <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 "
          >
              <tr>
                  <th scope="col" class="px-6 py-3">No.</th>
                  <th scope="col" class="px-6 py-3">Nama Pengirim</th>
                  <th scope="col" class="px-6 py-3">Pesan</th>
              </tr>
          </thead>
          <tbody>
              @php
                  $no = 1;
              @endphp

              @foreach ($data as $k)
                  <tr
                      class="bg-white border-b "
                  >
                      <th
                          scope="row"
                          class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap "
                      >
                          {{ $no++ }}
                      </th>
                      <td class="px-6 py-4">
                          {{ $k["nama"] }}
                      </td>
                      <td class="px-6 py-4">
                          {{ $k["pesan"] }}
                      </td>
                      
                  </tr>
              @endforeach
          </tbody>
      </table>
  </div>

</x-layout-admin>
