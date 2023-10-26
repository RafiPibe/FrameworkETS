<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Precious Lab Substance Collections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($gems as $gems)
                <div class="p-6 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-col">
                    <a>Substance Name: {{ $gems->gemName }}</a>
                    <a>Rating: {{ $gems->rating }}</a>
                    <a>Size: {{ $gems->gemSize }}</a>
                    {{-- <a>Mines: {{ $gems->minesId }}</a> --}}
                    <img src="data:image/png;base64, {{ $gems->gemImage }}" alt="gem Image" class="max-w-xs">
                </div>

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("") }}
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
