@php
    $parentCategories = \App\Http\Controllers\HomeController::categoryList()
@endphp

<li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
    <ul>
        @foreach ($parentCategories as $rs)
            <li class="dropdown"><a href="#"><span>{{$rs->title}}</span><i class="bi bi-chevron-right"></i></a>
                @if (count($rs->children))
                    @include('home.categorytree', ['children'=>$rs->children]);
                @endif
            </li>
        @endforeach
    </ul>
</li>




