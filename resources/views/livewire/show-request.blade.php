<div> 
<div>
@if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('message') }}
            </div>
        @endif
    </div>
    @foreach($req as $r)
    {{ $r->id}}
    <button class="btn btn-danger" wire:click="delReq({{$r->id}})">del req</button>
    @endforeach
    {{ $req->links() }}
    <div>
  
       
</div>

</div>
