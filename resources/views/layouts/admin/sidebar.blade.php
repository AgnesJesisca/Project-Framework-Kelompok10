<aside class="h-full bg-white/95 backdrop-blur
             border border-gray-100 shadow-lg
             rounded-3xl flex flex-col p-5 overflow-y-auto">


    <!-- Logo -->
    <div class="flex items-center mb-10 gap-3 px-2">
        <img src="{{ asset('assets-admin/img/logo-ct-dark.png') }}" class="h-8" alt="Logo">
        <span class="font-semibold text-[#5e72e4] text-lg">Bina Desa</span>
    </div>

    <!-- Menu -->
    <nav class="flex-1">
        <ul class="space-y-1">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-xl 
                          {{ request()->is('dashboard') ? 'bg-[#5e72e4] text-white shadow-md font-semibold' : 'hover:bg-gray-100 text-gray-700' }}">
                    <i class="ni ni-shop text-lg"></i>
                    Dashboard
                </a>
            </li>

            {{-- DATA PENDUDUK --}}
            <li x-data="{ 
                    open: {{ 
                        request()->is('keluarga_kk*') || 
                        request()->is('warga*') || 
                        request()->is('kelahiran*') || 
                        request()->is('kematian*') || 
                        request()->is('pindah*') || 
                        request()->is('media*')
                        ? 'true' : 'false' 
                    }} 
                }">

                {{-- Data Warga --}}
                    <li>
                        <a href="{{ route('warga.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('warga*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-single-02 text-sm"></i>
                            <span>Data Warga</span>
                        </a>
                    </li>


                    {{-- Data Keluarga --}}
                    <li>
                        <a href="{{ route('keluarga_kk.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('keluarga_kk*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow' 
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-single-copy-04 text-sm"></i>
                            <span>Data Keluarga</span>
                        </a>
                    </li>

                    {{-- Anggota Keluarga --}}
                    <li>
                        <a href="{{ route('anggota_keluarga.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                                {{ request()->is('anggota_keluarga*') 
                                    ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                    : 'hover:bg-gray-100 text-gray-700' }}">

                            <i class="ni ni-bullet-list-67 text-sm"></i>
                            <span>Anggota Keluarga</span>
                        </a>
                    </li>


                    
                  {{-- Kelahiran --}}
                    <li>
                        <a href="{{ route('peristiwa_kelahiran.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                                {{ request()->is('peristiwa_kelahiran*') 
                                    ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                    : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-badge text-sm"></i>
                            <span>Data Kelahiran</span>
                        </a>
                    </li>

                    {{-- Kematian --}}
                    <li>
                        <a href="{{ route('peristiwa_kematian.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                                {{ request()->is('peristiwa_kematian*') 
                                    ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                    : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-fat-remove text-sm"></i>
                            <span>Data Kematian</span>
                        </a>
                    </li>

                    {{-- Pindah --}}
                    <li>
                        <a href="{{ route('peristiwa_pindah.index') }}"
                        class="flex items-center gap-2 px-3 py-2 rounded-lg
                                {{ request()->is('peristiwa_pindah*') 
                                    ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                    : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-send text-sm"></i>
                            <span>Data Pindah</span>
                        </a>
                    </li>


                    {{-- Media --}}
                    <li>
                        <a href="{{ route('media.index') }}"
                           class="flex items-center gap-2 px-3 py-2 rounded-lg
                                  {{ request()->is('media*') 
                                     ? 'bg-[#5e72e4] text-white font-semibold shadow'
                                     : 'hover:bg-gray-100 text-gray-700' }}">
                            <i class="ni ni-folder-17 text-sm"></i>
                            <span>Media</span>
                        </a>
                    </li>
            </li>

            {{-- USER (khusus Admin) --}}
            <li>
                <a href="{{ route('user.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl
                        {{ request()->is('user*') 
                            ? 'bg-[#5e72e4] text-white shadow-md font-semibold' 
                            : 'hover:bg-gray-100 text-gray-700' }}">
                    <i class="ni ni-circle-08 text-lg"></i>
                    <span>User</span>
                </a>
            </li>

        </ul>
    </nav>

</aside>
