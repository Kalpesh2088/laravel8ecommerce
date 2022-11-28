<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hidden {
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-md-6">
                            All Product
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addproduct')}}" class="btn-btn-seccess pull-right">Add New</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                         <div class="alert alert-seccess" role="alert">{{Session::get('message')}}</div>   
                        @endif
                        <table class="tabel tabel-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>delete</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $Product)
                                <tr>
                                    <td>{{$Product->id}}</td>
                                    <td><img src="{{asset('assets/images/products')}}/{{$Product->image}}" width="60" alt=""></td>
                                    <td>{{$Product->name}}</td>
                                    <td>{{$Product->stock_status}}</td>
                                    <td>{{$Product->regular_price}}</td>
                                    <td>{{$Product->sale_price}}</td>
                                    <td>{{$Product->category->name}}</td>
                                    <td>{{$Product->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.editproduct',['product_slug'=>$Product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                        <a href="#" style="margin-left: 10px;" wire:click.prevent="deleteProduct({{$Product->id}})"><i class="fa fa-times fa-2x text-danger"></i></a>
                                    </td>
                                 </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
