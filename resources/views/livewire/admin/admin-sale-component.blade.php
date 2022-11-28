<div>
   <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panle-default">
                <div  class="panle-haading">
                    Sale Settinge
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                         <div class="alert alert-seccess" role="alert">{{Session::get('message')}}</div>   
                        @endif 
                    <form class="form-horizontal" wire:submit.prevent="updateSal">
                        <div class="form-group">
                            <label class="col-md-4 control-labal">Stutas</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-labal">Sale Date</label>
                            <div class="col-md-4">
                               <input type="datetime-local" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date" /> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Updat</button>
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
    $ (function ()
    {
        $('#sale-date').datetimepicker({
            format :'Y-MM-DD h:m:s',
        })
        .on('dp.change',function(ec){
            var data = $('#sale_date').val();
            @this.set('sale_date',data);
        });

    });
</script>
@endpush