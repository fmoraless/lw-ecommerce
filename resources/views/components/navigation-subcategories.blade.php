@props(['category'])

<div class="grid grid-cols-4 py-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-trueGray-500 mb-3">Subcategorias</p>
        <ul>
            @foreach ($category->subcategories as $subcategory )
                <li>
                    <a class="text-trueGray-500 font-semibold inline-block py-1 px-4 hover:text-orange-500" href="">
                        {{$subcategory->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        <img class="h-64 w-full object-cover object-center" src="{{Storage::url($category->image)}}" alt="">
    </div>
</div>
