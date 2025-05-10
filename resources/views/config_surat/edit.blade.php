<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="flex w-full mt-10">
        <form
            action="{{ route("surat.config.update", $data->id) }}"
            class="w-full p-6 bg-white rounded shadow-md"
            id="suratForm"
            method="POST"
        >
            @csrf
            @method("PUT")
            <div>
                <label
                    for="nama"
                    class="block text-sm font-medium text-gray-700"
                >
                    Nama Surat
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    required
                    value="{{ $data->name }}"
                    class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                />
            </div>

            <div id="configurations" class="mt-4 space-y-4">
                <label class="block text-sm font-medium text-gray-700">
                    Konfigurasi Surat
                </label>
                <!-- konfigurasi pertama -->
                @foreach ($config as $key => $type)
                    <div class="flex items-center mb-3 space-x-2 config-item">
                        <input
                            type="text"
                            name="name_value[]"
                            value="{{ $key }}"
                            placeholder="Data yang Harus Diisi"
                            class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required
                        />
                        <select
                            name="type[]"
                            class="px-2 py-2 text-sm border border-gray-300 rounded-md"
                        >
                            <option
                                value="text"
                                {{ $type == "text" ? "selected" : "" }}
                            >
                                Teks
                            </option>
                            <option
                                value="textarea"
                                {{ $type == "textarea" ? "selected" : "" }}
                            >
                                Teks Panjang
                            </option>
                            <option
                                value="number"
                                {{ $type == "number" ? "selected" : "" }}
                            >
                                Angka
                            </option>
                            <option
                                value="file"
                                {{ $type == "file" ? "selected" : "" }}
                            >
                                File
                            </option>
                        </select>
                        <button
                            type="button"
                            onclick="removeConfig(this)"
                            class="text-lg text-red-500 hover:text-red-700"
                        >
                            &times;
                        </button>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between">
                <!-- Tombol tambah konfigurasi -->
                <button
                    type="button"
                    onclick="addConfig()"
                    class="px-4 py-2 mt-4 text-sm text-white bg-indigo-600 rounded hover:bg-indigo-700"
                >
                    + Tambah Data
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 mt-4 text-sm text-white bg-green-600 rounded hover:bg-green-700"
                >
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
    <script>
        function addConfig() {
            const container = document.getElementById('configurations');
            const div = document.createElement('div');
            div.classList.add(
                'config-item',
                'flex',
                'items-center',
                'space-x-2',
            );

            div.innerHTML = `
              <input
                  type="text"
                  name="name_value[]"
                  placeholder="Data yang Harus Diisi"
                  class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                  required
              />
              <select
                  name="type[]"
                  class="px-2 py-2 text-sm border border-gray-300 rounded-md"
              >
                  <option value="text">Teks</option>
                  <option value="textarea">Teks Panjang</option>
                  <option value="number">Angka</option>
                  <option value="file">File</option>
              </select>
              <button type="button" onclick="removeConfig(this)" class="text-lg text-red-500 hover:text-red-700">
                  &times;
              </button>
          `;
            container.appendChild(div);
        }

        function removeConfig(button) {
            const configItem = button.closest('.config-item');
            configItem.remove();
        }
    </script>
</x-layout-admin>
