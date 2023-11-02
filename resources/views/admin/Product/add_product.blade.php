<?php 
use Illuminate\Support\Facades\Session;
?>
@extends('admin/dashboard')
@section('content_dashboard')
<section class="panel">
    <header class="panel-heading">
        Add Product
    </header>
    <div class="panel-body">
        <?php 
            $message = Session::get('message');
            if($message){
                echo $message;
                Session::put('message',null);
            }
        ?>
        <form class="container" role="form" action="{{route('create_product')}}" method ="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_product">Loại sản phẩm</label>
                <select class="form-control m-bot15" name="product_category">
                    <option>-- Chọn loại sản phẩm --</option>
                    @foreach($categories_product as $category)
                        <option value="{{ $category->id_product_category }}">{{ $category->name_category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="category_product">Thương hiệu</label>
                <select class="form-control m-bot15" name="product_brand">
                    <option>-- Chọn thương hiệu --</option>
                    @foreach($brand_product as $brand)
                        <option value="{{ $brand->id_brand }}">{{ $brand->name_brand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name_product">Tên sản phẩm</label>
                <input type="text" name="product_name" onkeydown="convert_slug()" onkeyup="convert_slug()" onkeypress="convert_slug()" class="form-control" id="name" placeholder="Tên sản phẩm">
            </div>

            <div class="form-group">
                <label for="price_product">Giá sản phẩm</label>
                <input type="text" name="price_product" class="form-control" id="price" placeholder="Giá sản phẩm" onkeyup="formatCurrency(this)">
            </div>
            <div class="form-group">
                <label for="discount" class="font-weight-bold">Đơn vị tính</label>
                <input type="text" name="unit_calculation_product" class="form-control" id="unit_calculation" placeholder="Đơn vị tính">
            </div>
            <div class="form-group">
                <label for="unit_calculation" class="font-weight-bold">Giảm giá</label>
                <input type="text" name="discount_product" class="form-control" id="discount" placeholder="Giảm giá">
            </div>
            <div class="form-group">
            <label for="description_product" class="font-weight-bold">Mô tả</label>
                <textarea type="text" name="description_product" style="resize: none;" rows ="5" class="form-control" id="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="status" class="font-weight-bold">Trạng thái</label>
                <select name="status_product" class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Hide</option>
                    <option value="1">Show</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image" class="font-weight-bold">Hình ảnh</label>
                <input type="file" id="image" name="image_product">
            </div>
            <div class="form-group">
               <label for="slug">Slug</label>
               <input type="text" name="slug_product" class="form-control" id="slug" placeholder="Slug" readonly>
            </div>
            <div class="text-center">
                <button type="submit" name="add_product" class="btn btn-info d-flex justify-content-center">Add Product</button>
            </div>
        </form>
    </div>
</section>
<script>
    function convert_slug() {
      
      var a = document.getElementById("name").value;
    
      var b = a.toLowerCase().replace(/ /g, '-')
          .replace(/[^\w-]+/g, '');
      document.getElementById("slug").value = b;
    }
    function formatCurrency(input) {
        // Lấy giá trị hiện tại trong trường văn bản
        let value = input.value;
        // Loại bỏ tất cả các dấu phẩy hiện có (nếu có)
        value = value.replace(/,/g, '');
        // Chuyển đổi giá trị thành chuỗi và đảo ngược chuỗi
        value = value.toString().split('').reverse().join('');
        // Tạo chuỗi mới với dấu phẩy sau mỗi 3 chữ số
        value = value.replace(/\d{3}(?!$)/g, '$&,');
        // Đảo ngược chuỗi lại để có định dạng chính xác
        value = value.split('').reverse().join('');
        // Gán lại giá trị đã định dạng vào trường văn bản
        input.value = value;
    }


</script>
@stop()