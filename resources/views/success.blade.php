<x-guest-layout>
    <x-slot:title>
        Upload Tugas
    </x-slot:title>

    <h3 class="mt-8 mb-4 text-xl font-extrabold text-red-800">Upload Tugas</h3>

    @if (session()->has('error'))
        <div class="w-full p-4 min-h-12">
            <h3 class="text-2xl text-red-400">
                Gagal
            </h3>
            <p>{{ session()->get('error') }}</p>
        </div>
    @endif
    

    <form class="form-horizontal m-t-20" method="POST" action="{{ route('welcome.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <x-input-label for='name'>{{ __('Nama') }}</x-input-label>
            <x-text-input placeholder="Nama Anda" id="name" type="text" name="name" :value="old('name')" autofocus autocomplete></x-text-input>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div> 
        <div>

        <div class="mb-6">
            <x-input-label for='kelas'>{{ __('Kelas') }}</x-input-label>
            <select id="kelas" name="kelas" class="bg-gray-50 border border-red-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 ">
                <option>Pilih Kelas</option>
                <option value="8_1">8 - 1</option>
                <option value="8_2">8 - 2</option>
                <option value="11_Agama">11 - Agama</option>
                <option value="11_MIPA">11 - MIPA</option>
            </select>
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
        </div>
        <div class="mb-6">
            <x-input-label for='file'>{{ __('File') }}</x-input-label>
            <input name="file" class="block w-full text-sm text-gray-900 border border-red-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none " id="file" type="file">
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div> 

        <div class="mb-6">
            <x-input-label for='password'>{{ __('Password') }}</x-input-label>
            <x-text-input placeholder="password" id="password" type="text" name="password" :value="old('password')" autofocus autocomplete></x-text-input>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> 



        <button type="submit" class="inline-flex items-center justify-center w-full gap-2 px-5 py-2 mt-4 font-medium text-center text-white bg-red-700 rounded-full hover:bg-red-800 ring-1 ring-offset-2 ring-red-600 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
            <span>Upload</span>
        </button>
            
    </form>
    

</x-guest-layout>