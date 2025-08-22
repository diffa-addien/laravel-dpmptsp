{{-- File: resources/views/components/dokumen-table.blade.php --}}

@props(['dokumens'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Judul Dokumen
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tanggal Publikasi
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Unduh</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($dokumens as $dokumen)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $loop->iteration + $dokumens->firstItem() - 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-normal text-sm font-medium text-gray-900">
                        {{ $dokumen->title }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($dokumen->created_at)->translatedFormat('d F Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ $dokumen->getFirstMediaUrl('dokumen') }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Unduh</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-sm text-gray-500">
                        Belum ada dokumen yang tersedia di kategori ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination Links --}}
<div class="mt-8">
    {{ $dokumens->links() }}
</div>