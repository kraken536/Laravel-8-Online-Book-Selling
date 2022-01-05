<div>
    {{-- Do your work, then step back. --}}
    <input wire:model="search" name="search" type="text" class="form-control mr-sm-2" list="mylist" placeholder="Search product..." aria-label="Search">
    {{-- <input wire:model="search" name="search" type="text" class="input search-input" list="mylist" placeholder="Search product..."/> --}}
    @if(!empty($query))
        <datalist id="mylist">
            @foreach ($datalist as $rs)
                <option value="{{$rs->title}}">{{$rs->category->title}}</option>
            @endforeach
        </datalist>
    @endif
</div>
