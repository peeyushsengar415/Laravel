@extends('master')
@section('content')
<div class="container">
	 <div class="row">
    <div class="col-sm-6">
      <img  class="details-image" src="{{$product['gallery']}}">
    </div>
    <div class="col-sm-6">
        <a href="/">Go back</a>
        <h2>{{$product['name']}}</h2>
        <h3>Price: {{$product['price']}}</h3>
        <h4>Details: {{$product['description']}}</h4>
        <h5>Category: {{$product['category']}}</h5>
        <br><br>
        <form action="/add_to_cart" method="post">
          @csrf
          <input type="hidden" name="products_id" value={{$product['id']}}>
          <button class="btn btn-warning">Add to Cart</button>
        </form>
        <br><br>

        {{-- <button class="btn btn-warning">Add to Cart</button>
        <button class="btn btn-info">BuyNow</button> --}}
    </div>
     
   </div>
 </div>
@endsection