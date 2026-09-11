<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('students.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="p-3 border">NIM</th>
                                <th class="p-3 border">Nama</th>
                                <th class="p-3 border">Prodi</th>
                                <th class="p-3 border">L/P</th>
                                <th class="p-3 border">No HP</th>
                                <th class="p-3 border">E-mail</th>
                                <th class="p-3 border text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3 border">{{ $student->nim }}</td>
                                    <td class="p-3 border">{{ $student->name }}</td>
                                    <td class="p-3 border">{{ $student->study_program }}</td>
                                    <td class="p-3 border">{{ $student->gender }}</td>
                                    <td class="p-3 border">{{ $student->phone_number }}</td>
                                    <td class="p-3 border">{{ $student->email }}</td>
                                    <td class="p-3 border text-center space-x-2">
                                        <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $students->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>