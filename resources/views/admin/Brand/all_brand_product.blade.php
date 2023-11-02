<?php
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      All Brand Product
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
            <th>Name Brand</th>
            <th>Show/Hide</th>
            <th>Address</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($all_brand_product as $key => $brand_pro) 
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$brand_pro -> name_brand}}</td>
            <td><span class="text-ellipsis">
            <?php 
              if($brand_pro->status == 0){
                ?>
                <a href="{{ route('unactive_brand',['brand_id'=> $brand_pro->id_brand]) }}"><span class="fa fa-eye-slash" style="color: red;"></span></a>
                <?php
              }else
              {
                ?>
                <a href="{{ route('active_brand',['brand_id'=> $brand_pro->id_brand]) }}"><span class="fa fa-eye" style="color: green;"></span></a>
                <?php
              }
            ?>
            </span></td>
            <td><span class="text-ellipsis">{{$brand_pro->address}}</span></td>
            <td>
              <a href="{{ route('edit_brand_product',['brand_id' => $brand_pro->id_brand]) }}" class="active" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a href="{{ route('delete_brand_product',['brand_id' => $brand_pro->id_brand]) }}" class="active" ui-toggle-class="" onclick="return confirm('Are you sure delete this brand ?')">
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