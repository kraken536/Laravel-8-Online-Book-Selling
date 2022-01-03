<ul>    
    @foreach ($children as $subcategory)
        @if(count($subcategory->children))
            <li class="dropdown"><a href="#"><span>{{ $subcategory->title }}</span><i class="bi bi-chevron-right"></i></a>
                @include('home.categorytree',['children'=>$subcategory->children])
            </li>
        @else
            <li><a href="{{route('category_products',['id'=>$subcategory->id])}}">{{ $subcategory->title }}</a></li>
        @endif  
    @endforeach
</ul>