@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
          <table class="table table-striped table-dark">
             
              <tbody>
                <tr>
                  <th scope="row">Amount</th>
                  <td>{{$total}} Rs.</td>
                  
                </tr>
                <tr>
                  <th scope="row">Tax</th>
                  <td>18%(9% CGST + 9% SCGST)</td>
                 
                </tr>
                <tr>
                  <th scope="row">Delivery</th>
                  <td>170 Rs.</td>
                  
                </tr>
                <tr style="color: lightseagreen;" >
                  <th scope="row">Total Amount</th>
                  <td>{{$total+ (($total*18)/100)+ 170}} Rs.</td>
                  
                </tr>
                
              </tbody>

        </table>
                <form action="orderplace" method="post">
                    @csrf
          <div class="form-group">
           
            <textarea name="address" placeholder="enter your address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label >Payment Method</label><br><br>
            <input type="radio" name="payment"  value="cash"> <span>online payment</span><br><br>
            <input type="radio" name="payment"value="cash"> <span>EMI Payment</span><br><br>
            <input type="radio" name="payment" value="cash"> <span>Cash on Delivery</span><br><br>
          </div>
          
          <button type="submit" class="btn btn-primary">Place order</button>
        </form>
     </div>
</div>
@endsection 
© 2021 GitHub, Inc.
