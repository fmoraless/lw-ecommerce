<div>
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{$category->name}}</h1>
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="fas fa-border-all p-3 cursor-pointer {{ $view == 'grid' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'grid')"></i>
                <i class="fas fa-th-list p-3 cursor-pointer {{ $view == 'list' ? 'text-orange-500' : '' }}" wire:click="$set('view', 'list')"></i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorías</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoria', '{{ $subcategory->name}}')"
                        >{{$subcategory->name}}</a>
                    </li>
                @endforeach
            </ul>

            <h2 class="font-semibold text-center mt-4 mb-2">Marcas</h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $marca == $brand->name ? 'text-orange-500 font-semibold' : '' }}"
                           wire:click="$set('marca', '{{ $brand->name}}')"
                        >{{$brand->name}}</a>
                    </li>
                @endforeach
            </ul>
            <x-jet-button class="mt-4" wire:click="limpiar">
                eliminar filtros
            </x-jet-button>
        </aside>
        <div class="md:col-span-2 lg:col-span-4">
            @if($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product )
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    @if($product->images->isNotEmpty())
                                        <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="h-48 w-full object-cover object-center" src="{{ asset('images/default-image.png') }}" alt="Default Image">
                                    @endif
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{ route('products.show', $product) }}">
                                            {{ Str::limit($product->name, 20)}}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-trueGray-700">${{$product->price}}</p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <ul>
                    @foreach($products as $product)
                        <li class="bg-white rounded-lg shadow mb-4">
                            <article class="flex">
                                <figure>
                                    @if($product->images->isNotEmpty())
                                        <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="h-48 w-56 object-cover object-center" src="{{ asset('images/default-image.png') }}" alt="Default Image">
                                    @endif
                                </figure>
                                <div class="flex-1 py-4 px-6 flex flex-col">
                                    <div class="flex justify-between">
                                        <div >
                                            <h1 class="text-lg font-semibold text-gray-700">{{$product->name}}</h1>
                                            <p class="font-bold text-gray-700">USD {{$product->price}}</p>
                                        </div>
                                        <div class="flex items-center">
                                            <ul class="flex text-sm">
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                        </ul>
                                            <span class="text-gray-700 text-sm">(2)</span>
                                        </div>
                                    </div>
                                    <div class="mt-auto mb-6">
                                        <x-danger-enlace href="{{ route('products.show', $product) }}">
                                            Más información
                                        </x-danger-enlace>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>
