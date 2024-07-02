<x-layout_instansi.app>
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('public/img/instansi-ilustration.svg') }}" alt="icon-user" class="w-full h-[15rem] mb-3">
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header flex items-center justify-between">
                    <h2 class="card-title">AKUN ANDA</h2>
                </div>
                <div class="card-body">
                    <ul>
                        <li class="flex items-center py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Nama</span>
                            <span class="flex items-center justify-center px-3">:</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ $list->nama_instansi }}</span>
                        </li>
                        <li class="flex items-center py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Jabatan Anda</span>
                            <span class="flex items-center justify-center px-3">:</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ $list->jabatan }}</span>
                        </li>
                        <li class="flex items-center py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Tlp</span>
                            <span class="flex items-center justify-center px-3">:</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ $list->tlp }}</span>
                        </li>
                        <li class="flex items-center py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Email</span>
                            <span class="flex items-center justify-center px-3">:</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ $list->email }}</span>
                        </li>
                        <li class="flex flex-col items-start py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Alamat</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ $list->alamat_lengkap }}</span>
                        </li>
                        <li class="flex flex-col items-start py-1">
                            <span class="text-sm font-semibold text-gray-700 inline-block w-[6rem]">Password</span>
                            <span class="text-sm font-medium text-gray-500 inline-block">{{ Str::limit($list->password, 40) }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout_instansi.app>
