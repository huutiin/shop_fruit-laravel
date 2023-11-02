<?php 
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<section class="panel">
    <header class="panel-heading">
        Add Brand Product
    </header>
    <div class="panel-body">
        <div class="position-center">
            <?php 
                $message = Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message',null);
                }
            ?>
            <form role="form" action="{{route('save_brand_product')}}" method ="post">
                @csrf
                <div class="form-group">
                    <label for="brand_name">Brand Name</label>
                    <input type="text" name="brand_name" onkeydown="convert_slug()" onkeyup="convert_slug()" onkeypress="convert_slug()" class="form-control" id="name" placeholder="Category Name">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" name="address" style="resize: none;" rows ="8" class="form-control" id="exampleInputPassword1" placeholder="Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
                </div>
                <div class="form-group">
                <label for="brand_product_status">Hide/Show</label>
                <select name="brand_product_status" class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Hide</option>
                    <option value="1">Show</option>
                </select>
                </div>
                <button type="submit" name="add_brand_product" class="btn btn-info">Add Brand</button>
            </form>
        </div>
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