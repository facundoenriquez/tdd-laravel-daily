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

                        @if(auth()->user()->is_admin)
                            <form action="{{route('products.create')}}" method="get"
                                  class="inline-block">
                                <x-primary-button class="bg-blue-600 text-white">Add new product</x-primary-button>
                            </form>
                        @endif

                        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 mt-2">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Price
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-900">
                            @forelse($products as $product)
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                        {{$product->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                        ${{$product->price}}
                                    </td>
                                    @if(auth()->user()->is_admin)

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                            <form action="{{route('products.edit', $product)}}" method="get"
                                                  class="inline-block">
                                                <x-primary-button class="bg-blue-600 text-white">Edit</x-primary-button>
                                            </form>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                            <form action="{{route('products.destroy', $product)}}" method="post"
                                                  class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button onclick="return confirm('Are you sure?')"
                                                                  class="bg-red-600 text-white">Delete
                                                </x-primary-button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td colspan="2"
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-200">
                                        {{__('No products found')}}
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
