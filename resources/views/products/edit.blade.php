<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <div class="min-w-full align-middle">
                            <form action="{{route('products.update', $product)}}" method="POST">
                                @csrf
                                @method('put')
                                {{-- Name --}}
                                <div>
                                    <x-input-label for="name" :value="__('Name')"/>
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$product->name"/>
                                    @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                {{-- Price --}}
                                <div>
                                    <x-input-label for="price" :value="__('Price')"/>
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$product->price"/>
                                    @error('price')
                                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                    @enderror
                                </div>

                                <div>
                                    <x-primary-button class="block mt-1"
                                                      type="submit">{{ __('Save') }}</x-primary-button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
