<section class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">{{ isset($product) ? "Thêm mới" : "Cập nhật" }} sản phẩm</h3>
    </div>
    <div class="panel-body">
        <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            <!-- form-group // -->
            {{csrf_field()}}
            {{method_field("put")}}
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Tên Sản phẩm</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="name"  placeholder="Tên sản phẩm"
                           value="{{ old('name',isset($product->name) ? $product->name : '') }}">
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_type') ? 'has-error' : '' }}">
                <label for="id_type" class="col-sm-3 control-label">Loại Sản phẩm</label>
                <div class="col-sm-9">
                    <select class="form-control" name="id_type"  placeholder="Loại sản phẩm">
                        @foreach ($product_types as $product_type)
                            <option value="{{$product_type->id}}"
                            @if(isset($product) && $product->id_type == $product_type->id)
                                selected 
                            @endif
                            @if (old('id_type') == $product_type->id)
                                selected 
                            @endif
                            >
                                {{ $product_type->name }}
                            </option>
                        @endforeach
                        
                    </select>
                </div>
            </div>
            <!-- form-group // -->
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Mô tả sản phẩm</label>
                <div class="col-sm-9">
                            <textarea name="description" class="form-control"
                                      placeholder="Mô tả sản phẩm" cols="30" rows="10">{{ old('description',isset($product->description) ? $product->description : '') }}</textarea>
                </div>
            </div>
            <div class="form-group {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Giá sản phẩm</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="unit_price"  placeholder="Giá sản phẩm" value="{{ old('unit_price',isset($product->unit_price) ? $product->unit_price : '') }}">
                </div>
                
            </div>
            <div class="form-group {{ $errors->has('promotion_price') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Giảm giá</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="promotion_price"  placeholder="Giảm giá" value="{{ old('promotion_price',isset($product->promotion_price) ? $product->promotion_price : '') }}">
                </div>
            </div>
            <div class="form-group {{ $errors->has('warranty') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 control-label">Bảo Hành</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="warranty"  placeholder="Bảo hành" value="{{ old('warranty',isset($product->warranty) ? $product->warranty : '') }}">
                </div>
            </div>
            
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Hình ảnh</label>
                <div class="col-sm-9">
                    <input type="file" name="image" accept="image/*">
                </div>
                @if (isset($product->image))
                    <div class="col-sm-9" style="margin-top: 20px;">
                        <img src="/source/image/product/{{ $product->image }}" alt="" style="width: 100px;height: auto">
                    </div>
                @endif
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    {!! csrf_field() !!}
                    <button type="submit" class="btn btn-primary">{{ isset($product) ? "Cập nhật" : "Thêm mới" }}</button>
                    <a href="{{ route('admin.get.product.list') }}" class="btn btn-danger">Trở về</a>
                </div>
            </div>
            <!-- form-group // -->
        </form>
    </div>
    <!-- panel-body // -->
</section>