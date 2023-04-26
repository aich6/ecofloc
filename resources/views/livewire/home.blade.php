<div>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <div class="ecofPowerplus">
        <img src="{{asset('storage/logo/ecofPowerplus.png')}}" alt="">
    </div>
	<div class="bg-gray-100">
    	<div class="mt-4 sizer ratio ratio-16x9 width-100">
           <video width="320" height="240" controls loop muted playsinline autoplay>
                <source src="https://catalogs.coficab.com/ecofv2.mp4" type=video/mp4>
            </video>
          </div>
</div>
    <h5 class="titlehome">OUR INNOVATIVE CABLE MERGES THE UNIQUE BENEFITS OF A SIR INSULATED CONDUCTOR,
        <br class="tel"> AN EMC PROTECTIVE BRAID, AND A FLEXIBLE XLPO JACKET:
    </h5>
    <div class="pictureh">
        <img src="/storage/logo/picture.png" alt="">
    </div>


    <div class="row row-cols-1 row-cols-md-8 g-8 d-flex justify-content-center productslist">
        @forelse($products as $p)

        <div class="card container mb-4">
            <div class="inner-card ">
                <div class="image">
                    <img src="{{asset('storage/'.$p->image)}}" class=" img-fluid rounded">



                    <div class="name">
                        <h5>{{$p->PRODUCT}} <span class="heart"></span> </h5>
                    </div>
                    <div> <small>
                            <ul>
                                <li>{{$p->CONDUCTOR_TYPE}}</li>
                                <li>{{$p->SINGLE_MULTICORE}}</li>
                                <li>{{$p->TEMPERATURE_CLASS}}</li>
                                <li>{{$p->VOLTAGE_LEVEL}}</li>
                                <li>{{$p->CONDUCTOR_TYPE}}</li>
                            </ul>
                        </small>
                    </div>


                </div>
            </div>
            <div class="middle">
                <button id="data" class="text" data-bs-target="#exampleModal" wire:click="product({{$p->id}})">View Cable</button>
            </div>
            <button class="btn o cart px-auto" wire:click="$emit('addToRequest',{{$p}})">REQUEST DATASHEET</button> <button class="btn cart px-auto c " wire:click="$emit('addToCompare',{{$p}})">SUBMIT FOR COMPARISON</button>
            <div class="modal" style="background-color:#11ffee00;" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">


                       

                        <div class="modal-body">
                            <img src="{{asset('storage/'.$data_image)}}" alt="">
                            <button class="btn o cart px-auto" wire:click="$emit('addToRequest',{{$prod}})">REQUEST DATASHEET</button> <button class="btn cart px-auto c " wire:click="$emit('addToCompare',{{$prod}})">SUBMIT FOR COMPARISON</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="mt-4">
            <section class="section alert-section">






                <div class="alert alert-warning">
                    <div class="alert-container">
                        <div class="alert-icon">
                            <i class="fa fa-warning"></i>
                        </div>

                        <b class="alert-info">Warning alert:</b> No products Found,
                    </div>
                </div>

            </section>
        </div>

        @endforelse

    </div>

    @if($products->hasMorePages())

    <div class="flex items-center justify-center mt-4">
        <button class="px-4 py-2  text-lg font-semibold text-white  loadmore" wire:click="loadMore">
            View More Cables
        </button>
    </div>
    @endif()



</div>

</div>
