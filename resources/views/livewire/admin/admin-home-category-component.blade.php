<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Maneg Home Categoey
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                         <div class="alert alert-seccess" role="alert">{{Session::get('message')}}</div>   
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updatHomeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Category</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="select_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">No of Product</label>
                                <div class="col-md-4">
                                    <input type="text" class="from-control input-md" wire:model="numberofproducts" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(documnt).ready(function ()
    {
        $('.sel_categories').select2();
        $('.sel_categories').on('change',function(e){
            var data = $('.sel_categories').select2("val");
            @this.set('select_categories',data);
        });
    });
</script>
@endpush