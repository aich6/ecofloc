<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="bg-white overflow-hidden  sm:rounded-lg browsecable">


        <div class="container pb-5 mb-2 mt-4">
            @if ($products)
                <div class="comparison-table">
                    <table class="table table-bordered">
                        <thead class="bg-secondary">
                            <tr>
                                <td class="align-middle">
                                    <select class="form-control custom-select" id="compare-criteria"
                                        data-filter="trigger">
                                        <option value="all">Comparison criteria *</option>
                                        <option value="a">GENERIC CRITÉRIA</option>
                                        <option value="c">HV SPECIFIC CRITERIA</option>
                                    </select><small class="form-text text-muted">* Choose criteria to filter table
                                        below.</small>

                                </td>
                                @foreach ($products as $p => $v)
                                    <td>

                                        <div class="comparison-item"><span wire:click="removeItem({{ $p }})"
                                                class=""><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-x">
                                                    <line x1="18" y1="6" x2="6" y2="18">
                                                    </line>
                                                    <line x1="6" y1="6" x2="18" y2="18">
                                                    </line>
                                                </svg></span>
                                            <a class="comparison-item-thumb"
                                                wire:click="product({{ $v['id'] }})"><img
                                                    src="{{ asset('storage/' . $v['image']) }}"
                                                    alt="{{ $v['PRODUCT'] }}"></a><a class="comparison-item-title"
                                                wire:click="product({{ $v['id'] }})">{{ $v['PRODUCT'] }}</a>
                                            <button class="btn btn-pill btn-outline-primary btn-sm" type="button"
                                                data-toggle="toast" wire:click="addToRequest({{ $p }})"
                                                data-target="#cart-toast">Add to Request</button>
                                        </div>

                                    </td>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody id="a" data-filter="target">
                            <tr class="bg-secondary">
                                <th class="text-uppercase">GENERIC CRITÉRIA</th>
                                @foreach ($products as $p => $v)
                                    <td><span class="text-dark font-weight-semibold">{{ $v['PRODUCT'] }}</span></td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>CONDUCTOR TYPE</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_CONDUCTOR_TYPE']) }}"
                                                alt="">{{ $v['CONDUCTOR_TYPE'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>SINGLE/MULTICORE</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_SINGLE_MULTICORE']) }}"
                                                alt="">{{ $v['SINGLE_MULTICORE'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>SHIELDED / UNSHIELDED</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_SHIELDED_UNSHIELDED']) }}"
                                                alt="">{{ $v['SHIELDED_UNSHIELDED'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>SHIELDING TYPE</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_SHIELDING_TYPE']) }}"
                                                alt="">{{ $v['SHIELDING_TYPE'] }}</center>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>INSULATION TYPE</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_INSULATION_TYPE']) }}"
                                                alt="">{{ $v['INSULATION_TYPE'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>INSULATION THICKNESS</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_INSULATION_THICKNESS']) }}"
                                                alt="">
                                            @if ($v['INSULATION_THICKNESS'] == 'Thin')
                                                Reduced
                                            @else
                                                Regular
                                            @endif
                                        </center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>VOLTAGE LEVEL</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_VOLTAGE_LEVEL']) }}"
                                                alt="">{{ $v['VOLTAGE_LEVEL'] }}</center>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <th>TEMPERATURE CLASS</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_TEMPERATURE_CLASS']) }}"
                                                alt="">{{ $v['TEMPERATURE_CLASS'] }}</center>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                        <tbody id="c" data-filter="target">
                            <tr class="bg-secondary">
                                <th class="text-uppercase">HV SPECIFIC CRITERIA</th>
                                @foreach ($products as $p => $v)
                                    <td><span class="text-dark font-weight-semibold">{{ $v['PRODUCT'] }}</span></td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>ABRASION</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100" src="{{ asset('storage/' . $v['icon_ABRASION']) }}"
                                                alt="">{{ $v['ABRASION'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>CHEMICAL RESISTANCE</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_CHEMICAL_RESISTANCE']) }}"
                                                alt="">{{ $v['CHEMICAL_RESISTANCE'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                            <tr>
                                <th>FLEXIBILITY</th>
                                @foreach ($products as $p => $v)
                                    <td>
                                        <center><img width="100"
                                                src="{{ asset('storage/' . $v['icon_FLEXIBILITY']) }}"
                                                alt="">{{ $v['FLEXIBILITY'] }}</center>
                                    </td>
                                @endforeach

                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <div class="info m-4">
                    <section class="section alert-section">
                        <h2 class="title">Notifications & Alerts</h2>


                        <br><br>


                        <div class="alert alert-warning">
                            <div class="alert-container">
                                <div class="alert-icon">
                                    <h2><i class="fa fa-warning"></h2></i>
                                </div>

                                <h2><b class="alert-info">Warning alert:</b> No products available to compare, Please
                                    Select Products from</h2> <a class="btn btn-secondary" href="/ShowProducts">Browse
                                    Cables</a>
                            </div>
                        </div>

                    </section>
                </div>
            @endif

        </div>
    </div>



    <!-- Button trigger modal -->
