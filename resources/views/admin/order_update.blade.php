@extends('admin._blankpage_copy')


@section('page_header','Update Order')

@section('card_title')
    Order: {{$datalist->id}}
@endsection

@section('title','Order Update Page')

@section('contents')

    @include('home.flash-message')
<form action="{{route('admin_order_update',['id'=>$datalist->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Id</label>
        <input type="text" class="form-control" name="id" value="{{$datalist->id}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">User</label>
        <input type="text" class="form-control" name="name" value="{{$datalist->user->name}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{$datalist->name}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" name="address" value="{{$datalist->address}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="{{$datalist->phone}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="{{$datalist->email}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Total</label>
        <input type="text" class="form-control" name="total" value="{{$datalist->total}} ₺" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">IP</label>
        <input type="text" class="form-control" name="ip" value="{{$datalist->IP}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Created Date</label>
        <input type="text" class="form-control" name="created_at" value="{{$datalist->created_at}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Updated Date</label>
        <input type="text" class="form-control" name="updated_at" value="{{$datalist->updated_at}}" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status">
            <option selected="selected">{{$datalist->status}}</option>
            <option>Accepted</option>
            <option>Cancelled</option>
            <option>Shipping</option>
            <option>Completed</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Admin Note</label>
        <textarea class="form-control" name="notes" id="note" rows="3" col="5">{{$datalist->notes}}</textarea>
    </div>

    <div style="text-align: center"><button type="submit" class="btn btn-primary">Update Order</button></div>
</form>

<div style="margin-top: 5em; margin-bottom: 5em"></div>

<table class="table table-hover">  
<thead>
    <tr>
    <th scope="col">Product</th>
    <th scope="col"></th>
    <th scope="col">Price</th>
    <th scope="col">Quantity</th>
    <th scope="col">Total</th>
    <th scope="col">Status</th>
    <th scope="col">Note</th>
    </tr>
</thead>
<tbody>
    @php
    $total = 0;
    @endphp
    @foreach ($orderlist as $rs)
    <tr>
    <td style=" padding-top: 30px;">
        <img src="{{ Storage::url($rs->product->image) }}" class="img-fluid" alt="" width="85"> 
        </td>
        <td style="padding-top: 40px;"><a href="{{route('product_detail',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></td>
    <td style="padding-top: 40px;">{{$rs->price}}</td>
    <td style="padding-top: 40px;">{{$rs->quantity}}</td>
    <td style="padding-top: 40px;">{{$rs->product->price * $rs->quantity}}</td>

    <form method="post" action="{{route('admin_order_item_update',['id'=>$rs->id])}}" enctype="multipart/form-data">
        @csrf
    <td>
        <select name="status">
            <option selected="selected">{{$rs->status}}</option>
            <option>Accepted</option>
            <option>Cancelled</option>
            <option>Shipping</option>
            <option>Completed</option>
        </select>
    </td>
    <td><textarea rows="2" name="notes">{{$rs->notes}}</textarea></td>
    <td><input type="submit" value = "Update"></td>
    </form>

    </tr>
    @php
        $total += $rs->product->price * $rs->quantity;
    @endphp
    @endforeach
</tbody>
<tfoot>
    <tr>
    <th colspan="3"></th>
    <th>Total:</th>
    <td colspan="2"><strong>{{ $total }} ₺</strong></td>
    </tr>
</tfoot>
</table>

@endsection

