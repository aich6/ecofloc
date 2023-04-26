
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
<style>

    .browsecable{
 margin-top:50px;
 margin-bottom:50px
}
</style>
<div class="bg-white overflow-hidden  sm:rounded-lg browsecable">

                    @if($products)
@foreach($products as $p => $v )

<div class="card bg-light mb-5  mt-5" style="max-width:850px;max-height: 175px; margin-left:5%;">
  <div class="row no-gutters">
    <div class="col-md-4" style="width: 160px;">
      <img  id="myImg" src="{{asset('storage/'.$v['image'])}}" class="card-img  prodimg" alt="..." >
      <button wire:click="product({{$v['id']}})" class="VIEW" >VIEW CABLE</button>
      <div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01" style="width:300%;max-width:500px">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

    </div>
    <div class="col-md-10" style="margin-left:-30px;">
      <div class="card-body">
        <h5 class="card-title">Cable <span>#{{$v['PRODUCT']}}</span></h5>

        <ul class="info" >
                <li>-{{$v['CONDUCTOR_TYPE']}}</li>

                <li>-{{$v['SINGLE_MULTICORE']}}</li>

                <li>-{{$v['TEMPERATURE_CLASS']}}</li>
                <li>-{{$v['VOLTAGE_LEVEL']}}</li>
                <li>-{{$v['CONDUCTOR_TYPE']}}</li>

                </ul>
                <div class="de">
                <button class="del" wire:click="removeItem({{$p}})" >Cancel Request</button>
                </div>

      </div>

    </div>

  </div>

</div>

                    @endforeach
                    <button class="req" wire:click="addRequest()" >Add Request</button><button class="req" style="background-color:red;" wire:click="cancelAllRequest()" >delete all items</button>
@else
<div class="info m-4">
    <section class="section alert-section">
  <h2 class="title">Notifications & Alerts</h2>


     <br><br>


  <div class="alert alert-warning">
    <div class="alert-container">
      <div class="alert-icon">
        <h2><i class="fa fa-warning"></i></h2>
      </div class="">

          <h2><b class="alert-info">Warning alert:</b> No products available for request, Pease Select Products from </h2>  <a class="btn btn-secondary" href="/ShowProducts">Browse Cables</a>

    </div>
  </div>

</section>
    </div>
    @endif



</div>



<!-- Button trigger modal -->
