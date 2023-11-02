<?php 
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      All Product
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
    <?php 
        $message = Session::get('message');
        if($message){
            echo $message;
            Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Name Product</th>
            <th>Name Category Product</th>
            <th>Name Brand Product</th>
            <th>Price Product</th>
            <th>Unit Calculation Product</th>
            <th>Discount Product(%)</th>
            <th>Description Product</th>
            <th>Image Product</th>
            <th>Status Product</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_product as $key => $product) 
          <tr>
            <td>
                <label class="i-checks m-b-none">
                    <input type="checkbox" name="post[]">
                    <i></i>
                </label>
            </td>
            <td>{{$product -> name_product}}</td>
            <td>
                {{$product -> name_category}}
            </td>
            <td>
                {{$product -> name_brand}}
            </td>
            <td>
                {{$product -> price}}
            </td>
            <td>
                {{$product -> unit_calculation}}
            </td>
            <td>
                {{$product -> discount}}
            </td>
            <td>
                {{$product -> discription}}
            </td>
            <td>
                <img src="uploads/products/{{$product -> images}}" width="100px" height="80px" alt="">
            </td>
            <td>
                <span class="text-ellipsis">
                <?php 
                  if($product->status_product == 0){
                  ?>
                    <a href="{{ route('unactive_product', ['product_id' => $product->id_product]) }}"><span class="fa fa-eye-slash" style="color: red;"></span></a>
                  <?php
                  }else
                  {
                  ?>
                    <a href="{{ route('active_product', ['product_id' => $product->id_product]) }}"><span class="fa fa-eye" style="color: green;"></span></a>
                  <?php
                  }
                ?>                
                </span>
            </td>
            <td>
                <a href="{{ route('edit_product',['product_id'=>$product->id_product]) }}" class="active" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a href="{{ route('delete_product',['product_id'=>$product->id_product]) }}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure delete this category ?')">
                    <i class="fa fa-times text-danger text"></i>
                </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
<script type="text/javascript">
  function confirm_delete() {
    return confirm('Are you sure delete ?');
  }
</script>
@stop()

