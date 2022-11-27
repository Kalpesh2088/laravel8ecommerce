<div>
    <div class="container" style="padding: 30px 0,">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Edit Slider
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.homeslider')}}" class="btn btn-seccess pull-right">All Slider</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                         <div class="alert alert-seccess" role="alert">{{Session::get('message')}}</div>   
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateSlide">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tatile</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Tatile" class="form-control inout-md" wire:model="title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Subtitle" class="form-control inout-md" wire:model="subtitle"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Price" class="form-control inout-md" wire:model="price"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Link" class="form-control inout-md" wire:model="link"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Image</label>
                                <div class="col-md-4">
                                    <input type="file" class="input-file" wire:model="newimage" />
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="120">
                                        @else
                                        <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120" alt="">     
                                       
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Link</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
