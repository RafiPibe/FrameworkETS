<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lab Information Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="form-container">
                    <form action="{{ route('mines.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-label for="name" :value="__('Mines Form')" />

                            {{-- Gem Name --}}
                            <div class="mt-4">
                                <x-input-label for="mineName" :value="__('Mine Name')" />
                                <x-text-input id="mineName" class="block mt-1 w-full" type="text" name="mineName" :value="old('mineName')" required autofocus autocomplete="mineName" />
                                <x-input-error :messages="$errors->get('mineName')" class="mt-2" />
                            </div>

                            {{-- Mine Location --}}
                            <div class="mt-4">
                                <x-input-label for="mineLocation" :value="__('Mine Location')" />
                                <x-text-input id="mineLocation" class="block mt-1 w-full" type="text" name="mineLocation" :value="old('mineLocation')" required autofocus autocomplete="mineLocation" />
                                <x-input-error :messages="$errors->get('mineLocation')" class="mt-2" />
                            </div>

                            {{-- Mine Owner --}}
                            <div class="mt-4">
                                <x-input-label for="mineOwner" :value="__('Mine Owner')" />
                                <x-text-input id="mineOwner" class="block mt-1 w-full" type="text" name="mineOwner" :value="old('mineOwner')" required autofocus autocomplete="mineOwner" />
                                <x-input-error :messages="$errors->get('mineOwner')" class="mt-2" />
                            </div>

                            <div class="flex justify-center mb-4">
                                <x-primary-button class="mx-auto">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
