<?php 
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<section class="panel">
    <header class="panel-heading">
        Edit Brand Product
    </header>
    <div class="panel-body">
        <?php 
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
        ?>
        @foreach($edit_brand_product as $key => $all_brand)
        <div class="position-center">
            <form role="form" action="{{ route('update_brand_product',['brand_id' => $all_brand -> id_brand]) }}" method ="post">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" onkeydown="convert_slug()" onkeyup="convert_slug()" onkeypress="convert_slug()" class="form-control" id="name" value="{{$all_brand -> name_brand}}" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" name="address_brand" style="resize: none;" rows ="8" class="form-control" id="exampleInputPassword1" placeholder="Address">{{$all_brand ->address}}</textarea>
                </div>
                
                <button type="submit" name="add_brand_product" class="btn btn-info">Edit Brand</button>
            </form>
        </div>
        @endforeach
    </div>
</section>
<script>
    function convert_slug() {
      
      var a = document.getElementById("name").value;
    
      var b = a.toLowerCase().replace(/ /g, '-')
          .replace(/[^\w-]+/g, '');
    
      document.getElementById("slug").value = b;
  }
</script>
@stop()