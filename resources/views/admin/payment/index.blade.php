@extends('admin.layouts.adminapp')
@section('content')
<div class="panel-body">
      <div class="col-md-12">
           <form method="POST" action="{{url('admin/payment')}}" accept-charset="UTF-8" data-parsley-validate="" id="payment-form" novalidate="">
                  {{csrf_field()}}

                  <div class="form-group" id="product-group">
                    <label for="plane">$ Amount</label>
                    <input type="text" name="plan" class="form-control" required="">
                </div>

                <div class="form-group" id="cc-group">
                    <label for="">Credit card number:</label>
                    <input class="form-control" required="required" data-stripe="number" data-parsley-type="number" maxlength="16" data-parsley-trigger="change focusout" data-parsley-class-handler="#cc-group" type="text">
                </div>
                <div class="form-group" id="ccv-group">
                    <label for="">CVC (3 or 4 digit number):</label>
                    <input class="form-control" required="required" data-stripe="cvc" data-parsley-type="number" data-parsley-trigger="change focusout" maxlength="4" data-parsley-class-handler="#ccv-group" type="text">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group" id="exp-m-group">
                        <label for="">Ex. Month</label>
                        <select class="form-control" required="required" data-stripe="exp-month">
                            <option value="1">01</option>
                            <option value="2">02</option>
                            <option value="3">03</option>
                            <option value="4">04</option>
                            <option value="5">05</option>
                            <option value="6">06</option>
                            <option value="7">07</option>
                            <option value="8">08</option>
                            <option value="9">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group" id="exp-y-group">
                        <label for="">Ex. Year</label>
                        <select class="form-control" required="required" data-stripe="exp-year">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                        </select>
                    </div>
                  </div>
                </div>
                  <div class="form-group">
                      <input class="btn btn-lg btn-block btn-primary btn-order" id="submitBtn" style="margin-bottom: 10px;" type="submit" value="Place order!">
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                    </div>
                  </div>
              </form>
            </div>
        </div>
@endsection
