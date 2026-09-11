<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-input-label for="nim" value="NIM" />
                        <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full" :value="old('nim', $student->nim)" required />
                        <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="name" value="Nama Mahasiswa" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $student->name)" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="birth_place" value="Tempat Lahir" />
                            <x-text-input id="birth_place" name="birth_place" type="text" class="mt-1 block w-full" :value="old('birth_place', $student->birth_place)" required />
                            <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="birth_date" value="Tanggal Lahir" />
                            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', $student->birth_date)" required />
                            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="gender" value="Jenis Kelamin" />
                        <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="L" {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="study_program" value="Program Studi" />
                        <x-text-input id="study_program" name="study_program" type="text" class="mt-1 block w-full" :value="old('study_program', $student->study_program)" required />
                        <x-input-error :messages="$errors->get('study_program')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="address" value="Alamat" />
                        <textarea id="address" name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="3" required>{{ old('address', $student->address) }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="phone_number" value="Nomor HP" />
                            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $student->phone_number)" required />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="email" value="E-mail" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $student->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4 gap-2">
                        <a href="{{ route('students.index') }}" class="text-gray-600 hover:underline">Batal</a>
                        <x-primary-button>Update</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>