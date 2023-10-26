<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="form-container">
                    <form action="{{ route('form.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <x-input-label for="name" :value="__('Gems Form')" />

                            {{-- Gem Name --}}
                            <div class="mt-4">
                                <x-input-label for="gemName" :value="__('Name')" />
                                <x-text-input id="gemName" class="block mt-1 w-full" type="text" name="gemName" :value="old('gemName')" required autofocus autocomplete="gemName" />
                                <x-input-error :messages="$errors->get('gemName')" class="mt-2" />
                            </div>

                            {{-- Carat --}}
                            <div class="mt-4">
                                <x-input-label for="rating" :value="__('Rating')" />
                                <x-select-input id="rating" class="block mt-1 w-full" name="rating" :value="old('rating')" required autofocus autocomplete="rating">
                                    <option selected value="">-</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                    <option value="3">5</option>
                                </x-select-input>
                                <x-input-error :messages="$errors->get('rating')" class="mt-2" />
                            </div>

                            {{-- Gem Size --}}
                            <div class="mt-4">
                                <x-input-label for="gemSize" :value="__('Size')" />
                                <x-text-input id="gemSize" class="block mt-1 w-full" type="text" name="gemSize" :value="old('gemSize')" required autofocus autocomplete="gemSize" />
                                <x-input-error :messages="$errors->get('GemSize')" class="mt-2" />
                            </div>

                            {{-- Mines --}}
                            {{-- <div class="mt-4">
                                <x-input-label for="minesId" :value="__('minesId')" />
                                <x-select-input id="minesId" class="block mt-1 w-full" name="minesId" :value="old('minesId')" required autofocus autocomplete="minesId">
                                    <option selected value="">-</option>
                                    @foreach ($mines as $mines)
                                        <option value="{{$mines->id}}">{{$mines->name}}</option>
                                    @endforeach
                                </x-select-input>
                                <x-input-error :messages="$errors->get('minesId')" class="mt-2" />
                            </div> --}}

                            {{-- Image --}}
                            <div class="mt-4 flex flex-col">
                                <label for="gemImage" class="form-label form-dark bg-dark color-dark text-white">Upload Image</label>
                                <input class="btn-dark form-control form-dark bg-dark color-dark text-white" type="file" id="image" name="gemImage">
                                @error('gemImage')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
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
