<?php 
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<section class="panel">
    <header class="panel-heading">
        Update Category Product
    </header>
    <div class="panel-body">
        <?php 
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
        ?>
        <div class="position-center">
            @foreach ($edit_category_product as $key => $edit_category)
            <form role="form" action="{{route('update_category_product', ['category_productid' => $edit_category->id_product_category])}}" method ="post">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" name="category_name" onkeydown="convert_slug()" onkeyup="convert_slug()" onkeypress="convert_slug()" class="form-control" id="name" placeholder="Category Name" value="{{$edit_category -> name_category}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea type="text" name="description" style="resize: none;" rows ="8" class="form-control" id="exampleInputPassword1" placeholder="Description">{{$edit_category -> description_category}}</textarea>
                </div>
                <button type="submit" name="add_category_product" class="btn btn-info">Update Category</button>
            </form>
            @endforeach
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