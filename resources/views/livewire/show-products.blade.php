<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <link rel="stylesheet" href="{{ asset('css/browsecable.css') }}">
    <div class="bg-white overflow-hidden  sm:rounded-lg browsecable " id="main">
        <div class="d-flex justify-content-center ">
            <div class="container mt-5 bg-light">
                <div class="row  ">
                    <div class="col-md-6 ml-3 mt-4">
                        <p class="sc">SELECT CRITERIA</p>
                    </div>
                    <div class="col-md-5  mt-4">
                        <div class="input-box">
                            <input type="text" class="form-control" wire:model='search' name="search" id="search"
                                placeholder="Type a  keyword">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            TEMPERATURE CLASS
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T2 (100°C)" wire:model="TEMP_CLASS" id="T2" />
                                        <label class="form-check-label" for="T2">T2 (-40ºC UP TO 105ºC)</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T2+ (110°C)" wire:model="TEMP_CLASS" id="T2+" />
                                        <label class="form-check-label" for="T2+">T2+(-40ºC UP TO 110ºC)</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T3 (125°C)" wire:model="TEMP_CLASS" id="T3" />
                                        <label class="form-check-label" for="T3">T3 (-40ºC UP TO 125ºC)</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T4 (150°C)" wire:model="TEMP_CLASS" id="T4 " />
                                        <label class="form-check-label" for="T4 ">T4 (-40ºC UP TO 150ºC)</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T5+ (180°C)" wire:model="TEMP_CLASS" id="T5+" />
                                        <label class="form-check-label" for="T5+">T5+(-40ºC UP TO 180ºC)</label>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox"
                                            value="T6 (200°C)" wire:model="TEMP_CLASS" id="T6" />
                                        <label class="form-check-label" for="T6"> T6 (-40ºC UP TO 200ºC)</label>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            CONDUCTOR TYPE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Copper Conductor"
                                            wire:model="CONDUCTOR_TYPE" id="Copper" />
                                        <label class="form-check-label" for="Copper">Copper Conductor</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Aluminum Conductor"
                                            wire:model="CONDUCTOR_TYPE" id="Aliminum" />
                                        <label class="form-check-label" for="Aliminum">Aluminum Conductor</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            SINGLE / MULTICORE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Single"
                                            wire:model="SINGLE_MULTICORE" id="Single" />
                                        <label class="form-check-label" for="Single">SINGLE</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Multicore"
                                            wire:model="SINGLE_MULTICORE" id="Multicore" />
                                        <label class="form-check-label" for="Multicore">MULTICORE</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            VOLTAGE LEVEL
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="600 V AC / 1000 V DC"
                                            wire:model="VOLTAGE_LEVEL" id="600v" />
                                        <label class="form-check-label" for="600v">600 V AC / 1000 V DC</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1000 V AC / 1500 V DC"
                                            wire:model="VOLTAGE_LEVEL" id="1000V" />
                                        <label class="form-check-label" for="1000V">1000V AC / 1500V DC</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            INSULATION TYPE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"value="SIR"
                                            wire:model="INSULATION_TYPE" id="SiR" />
                                        <label class="form-check-label" for="SiR">SIR</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PVC"
                                            wire:model="INSULATION_TYPE" id="PVC" />
                                        <label class="form-check-label" for="PVC">PVC</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="XLPO"
                                            wire:model="INSULATION_TYPE" id="XLPO" />
                                        <label class="form-check-label" for="XLPO"> XLPO</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PP Halogen Free"
                                            wire:model="INSULATION_TYPE" id="PPHalogen" />
                                        <label class="form-check-label" for="PPHalogen">PP HALOGEN FREE</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="PP"
                                            wire:model="INSULATION_TYPE" id="PP" />
                                        <label class="form-check-label" for="PP">PP</label>
                                    </div>
                                </div>
                            </li>
                            <!--<li><hr class="dropdown-divider" /></li>
                            <li>
                                <div class="dropdown-item" >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="TPE-S/TPU" wire:model="INSULATION_TYPE" id="TPE-S/TPU" />
                                        <label class="form-check-label" for="TPE-S/TPU">TPE-S/TPU</label>
                                    </div>
                                </div>
                            </li>-->
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            INSULATION THICKNESS
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Thick"
                                            wire:model="INSULATION_THICKNESS" id="Thick" />
                                        <label class="form-check-label" for="Thick">Regular</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Thin"
                                            wire:model="INSULATION_THICKNESS" id="Thin" />
                                        <label class="form-check-label" for="Thin">Reduced</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            UNSHIELDED / SHIELDED
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Unshielded wire"
                                            wire:model="SHIELDED_UNSHIELDED" id="UNSHIELDED" />
                                        <label class="form-check-label" for="UNSHIELDED">UNSHIELDED</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Shielded wire"
                                            wire:model="SHIELDED_UNSHIELDED" id="SHIELDED_UNSHIELDED" />
                                        <label class="form-check-label" for="SHIELDED_UNSHIELDED">SHIELDED</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            SHIELDING TYPE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="With foil"
                                            wire:model="SHIELDING_TYPE" id="With" />
                                        <label class="form-check-label" for="With"> With foil</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Without foil"
                                            wire:model="SHIELDING_TYPE" id="Without foil" />
                                        <label class="form-check-label" for="Without foil">Without foil</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item" href="#">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="n/a"
                                            wire:model="SHIELDING_TYPE" id="n" />
                                        <label class="form-check-label" for="n">n/a</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mb-4">
                    <!--  <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        CHEMICAL RESISTANCE
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item" >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Improved" wire:model="CHEMICAL_RESISTANCE" id="Improved" />
                                        <label class="form-check-label" for="Improved">Improved</label>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider" /></li>
                            <li>
                                <div class="dropdown-item" >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Standard" wire:model="CHEMICAL_RESISTANCE" id="Standard"  />
                                        <label class="form-check-label" for="Standard">Standard</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>-->
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            ABRASION
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Improved"
                                            wire:model="ABRASION" id="Improveda" />
                                        <label class="form-check-label" for="Improveda">Improved</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Standard"
                                            wire:model="ABRASION" id="Standarda" />
                                        <label class="form-check-label" for="Standarda">Standard</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4">
                        <button class="btn text-dark shadow-none border border-secondary bg-white dropdown-toggle"
                            type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                            FLEXIBILITY
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Low"
                                            wire:model="FLEXIBILITY" id="Low" />
                                        <label class="form-check-label" for="Low">Low</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Standard"
                                            wire:model="FLEXIBILITY" id="Standardd" />
                                        <label class="form-check-label" for="Standardd">Standard</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="High"
                                            wire:model="FLEXIBILITY" id="High" />
                                        <label class="form-check-label" for="High">High</label>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <div class="dropdown-item">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Very High"
                                            wire:model="FLEXIBILITY" id="Very" />
                                        <label class="form-check-label" for="Very">Very High</label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col dropdown mt-4 ">
                        <button id="reset" wire:click="resets">RESET FILTERS</button>
                    </div>
                    <div class="col dropdown mt-4 ">

                    </div>
                </div>
                <div class="row mb-4 bg-white">
                    @forelse ($SINGLE_MULTICORE as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetSINGLE_MULTICORE({{ $k }})" class="reset">
                                SINGLE/MULTICORE: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($CONDUCTOR_TYPE as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetCONDUCTOR_TYPE({{ $k }})" class="reset">
                                CONDUCTOR TYPE: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($TEMP_CLASS as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetTEMP_CLASS({{ $k }})" class="reset">
                                TEMPERATUE CLASS: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($SHIELDED_UNSHIELDED as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetSHIELDED_UNSHIELDED({{ $k }})" class="reset">
                                SHIELDED/UNSHIELDED: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($INSULATION_THICKNESS as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetINSULATION_THICKNESS({{ $k }})" class="reset">
                                INSULATION THICKNESS: @if ($v == 'Thick')
                                    Regular
                                @else
                                    Reduced
                                @endif X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($INSULATION_TYPE as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetINSULATION_TYPE({{ $k }})" class="reset">
                                INSULATION TYPE: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($VOLTAGE_LEVEL as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetVOLTAGE_LEVEL({{ $k }})" class="reset">
                                VOLTAGE LEVEL: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($FLEXIBILITY as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetFLEXIBILITY({{ $k }})" class="reset">
                                FLEXIBILITY: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($SHIELDING_TYPE as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetSHIELDING_TYPE({{ $k }})" class="reset">
                                SHIELDING TYPE: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                    @forelse ($ABRASION as $k => $v)
                        <div class="col-sm-4 mt-4 dropdown">
                            <button wire:click="resetABRASION({{ $k }})" class="reset">
                                ABRASION: {{ $v }} X
                            </button>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-8 g-8 d-flex justify-content-center productslist ">
            @forelse($products as $p)
                <div class="card container">
                    <div class="inner-card ">
                        <div class="image">
                            <img src="{{ asset('storage/' . $p->image) }}" class=" img-fluid rounded">



                            <div class="name">
                                <h5>{{ $p->PRODUCT }} </h5>
                            </div>
                            <div> <small>
                                    <ul>
                                        <li>{{ $p->CONDUCTOR_TYPE }}</li>
                                        <li>{{ $p->SINGLE_MULTICORE }}</li>
                                        <li>{{ $p->TEMPERATURE_CLASS }}</li>
                                        <li>{{ $p->VOLTAGE_LEVEL }}</li>
                                        <li>{{ $p->CONDUCTOR_TYPE }}</li>
                                    </ul>
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="middle">
                        <button id="data" class="text" data-bs-target="#exampleModal"
                            wire:click="product({{ $p->id }})">View Cable</button>
                    </div>
                    <button class="btn o cart px-auto" wire:click="$emit('addToRequest',{{ $p }})">REQUEST
                        DATASHEET</button> <button class="btn cart px-auto c "
                        wire:click="$emit('addToCompare',{{ $p }})">SUBMIT FOR COMPARISON</button>
                    <div class="modal" style="background-color:#11ffee00;" id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">


                                

                                <div class="modal-body">
                                    <img src="{{ asset('storage/' . $data_image) }}" alt="">
                                    <button class="btn o cart px-auto"
                                        wire:click="$emit('addToRequest',{{ $prod }})">REQUEST
                                        DATASHEET</button> <button class="btn cart px-auto c "
                                        wire:click="$emit('addToCompare',{{ $prod }})">SUBMIT FOR
                                        COMPARISON</button>
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
        @if ($products->hasMorePages())
            <div class="flex items-center justify-center mt-4">
                <button class="px-4 py-2  text-lg font-semibold text-white  loadmore" wire:click="loadMore">
                    View More Cables
                </button>
            </div>
        @endif()
    </div>
    <script>
        $(document).ready(function() {
            $('#reset').click(function() {
                $(":checkbox").prop('checked', false);
            })
        });
    </script>
</div>
