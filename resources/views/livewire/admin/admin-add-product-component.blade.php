{{-- Content Wrapper. Contains page content --}}
<div class="content-wrapper">
{{-- Content Header (Page header) --}}
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div>{{-- /.container-fluid --}}
    </section>

    {{-- Main content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            {{-- left column --}}
                <div class="col-md">
                {{-- general form elements --}}
                    <div class="card card-primary">
                    {{-- form start --}}
                        @if(Session::has('message'))
                            <div class="card-header">
                                <h3 class="card-title">{{Session::get('message')}}</h3>
                            </div>
                        @endif
                        <form enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="card-body">
                                <label for="name">Product Name</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Product Name..." wire:model="name" wire:keyup="generateLink">
                                </div>

                                <label for="base">Base Price</label>
                                <div class="input-group col-sm-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="base" placeholder="9.99" wire:model="base_price">
                                </div>

                                <label for="sale">Sale Price</label>
                                <div class="input-group col-sm-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" id="sale" placeholder="9.99" wire:model="sale_price">
                                </div>

                                <label for="discount">Discount</label>
                                <div class="input-group col-sm-3">
                                    <input type="number" class="form-control" id="discount" wire:model="discount" disabled="true">
                                    <div class="input-group-append">
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>

                                <label for="description">Description</label>
                                <div class="col-mb">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" id="description" maxlength="1000" placeholder="Enter Product Description..." wire:model="desc"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" wire:model="category_id" wire:click="generateLink" wire:keyup="generateLink">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label for="sku">SKU</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sku" wire:model="SKU" disabled="true">
                                </div>

                                <label for="slug">Slug</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="slug" wire:model="link" disabled="true">
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="featured" value="1" wire:model="featured">
                                    <label class="form-check-label" for="featured">Featured</label>
                                </div>

                                <label>Image</label>
                                <div class="custom-file">
                                    @if($image)
                                        <img src="{{$image->temporaryUrl()}}">
                                    @endif
                                    <input type="file" class="custom-file-input" id="customFile" accept="image/*" wire:model="image">
                                    @error('image')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            {{-- /.card --}}
                            {{-- /.card-body --}}

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    {{-- /.card --}}
                </div>
                {{--/.col (left) --}}
            </div>
            {{-- /.row --}}
        </div>{{-- /.container-fluid --}}
    </section>
    {{-- /.content --}}
</div>
{{-- /.content-wrapper --}}

{{-- bs-custom-file-input --}}
<script src="{{asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
{{-- dropzonejs --}}
<script src="{{asset('admin/plugins/dropzone/min/dropzone.min.js')}}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>