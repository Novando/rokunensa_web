  {{-- Datatables --}}
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  @livewireStyles
  {{-- Content Wrapper. Contains page content --}}
  <div class="content-wrapper">
    {{-- Content Header (Page header) --}}
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>{{-- /.container-fluid --}}
    </section>

    {{-- Main content --}}
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              {{-- /.card-header --}}
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <a href="{{route('admin.addproduct')}}">
                    <button type="button" class="btn btn-primary">Add Product</button>
                  </a>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>SKU</th>
                      <th>Stock</th>
                      <th>Sold</th>
                      <th>Base Price</th>
                      <th>Sale Price</th>
                      <th>Discount</th>
                      <th>Category</th>
                      <th>Featured</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                      <tr>
                        <td>
                          <div>
                            <img src="{{asset('img/products')}}/{{$product->image}}" width="50px">
                          </div>
                          {{$product->name}}</td>
                        <td>{{$product->SKU}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->sold}}</td>
                        <td>{{$product->base_price}}</td>
                        <td>{{$product->sale_price}}</td>
                        <td>{{round(100-($product->sale_price / $product->base_price * 100))}}%</td>
                        <td>
                          @foreach($categories as $category)
                            @if($category->id == $product->category_id)
                              {{$category->name}}
                            @endif
                          @endforeach
                        </td>
                        <td>
                          @if($product->featured === 1)
                            Yes
                            <form>
                              <input type="hidden" name="0">
                              <button type="submit" class="btn btn-danger">Turn off?</button>
                            </form>
                          @else
                            No
                            <form>
                              <input type="hidden" name="1">
                              <button type="submit" class="btn btn-success">Turn on?</button>
                            </form>
                          @endif
                        </td>
                        <td>
                          <button type="button" class="btn btn-primary">Restock</i></button>
                          <button type="button" class="btn btn-secondary"><i class="nav-icon fas fa-edit"></i></button>
                          <button type="button" class="btn btn-danger"><i class="nav-icon fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{-- /.card-body --}}
            </div>
            {{-- /.card --}}
          </div>
          {{-- /.col --}}
        </div>
        {{-- /.row --}}
      </div>
      {{-- /.container-fluid --}}
    </section>
    {{-- /.content --}}
  </div>

  {{-- DataTables  & Plugins --}}
  <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
  <script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
  <script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>