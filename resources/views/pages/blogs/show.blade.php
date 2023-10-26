<x-default-layout>

    @section('title')
    Cars
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('cars') }}
    @endsection

    <div class="card mb-5">
        <div class="card-body py-4">
            <div class="row">
                <div class="col-md-12">
                    <div id="demo" class="carousel slide" data-ride="carousel" style="height: 500px !important;">

                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            @if(!empty($car->images[0]))
                            @foreach($car->images as $key => $image)
                            <li data-target="#demo" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                            @endif
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            @if(!empty($car->images[0]))
                            @foreach($car->images as $key => $image)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('images/'.$image->images) }}" alt="Los Angeles" width="100%" height="500">
                            </div>
                            @endforeach
                            @endif
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-md-1"></div>
                <div class="col-md-5 mt-15">
                    <h2>{{ $car->vehicle_name ?? ''}}</h2>
                    <h2>Vehicle Price: {{ $car->vehicle_price ?? ''}}</h2>
                </div> -->
            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body py-4">
            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Basic Data</h4>
                </div>
                <div class="col-md-3">Vehicle Name</div>
                <div class="col-md-6"><b>{{ $car->vehicle_name ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Vehicle Price</div>
                <div class="col-md-6"><b>{{ $car->vehicle_price ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Body type</div>
                <div class="col-md-6"><b>{{ $car->body_type ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Type</div>
                <div class="col-md-6"><b>{{ $car->type ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Drivetrain</div>
                <div class="col-md-6"><b>{{ $car->drivetrain ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Seats</div>
                <div class="col-md-6"><b>{{ $car->seats ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Doors</div>
                <div class="col-md-6"><b>{{ $car->doors ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Offer number</div>
                <div class="col-md-6"><b>{{ $car->offer_number ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Warranty</div>
                <div class="col-md-6"><b>{{ $car->warranty ?? ''}}</b></div>
            </div>
            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Vehicle History</h4>
                </div>
                <div class="col-md-3">Mileage</div>
                <div class="col-md-6"><b>{{ $car->mileage ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">First registration</div>
                <div class="col-md-6"><b>{{ $car->first_registration ?? ''}}</b></div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Technical Data</h4>
                </div>
                <div class="col-md-3">Power</div>
                <div class="col-md-6"><b>{{ $car->power ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Gearbox</div>
                <div class="col-md-6"><b>{{ $car->gearbox ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Engine size</div>
                <div class="col-md-6"><b>{{ $car->engine_size ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Gears</div>
                <div class="col-md-6"><b>{{ $car->gears ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Cylinders</div>
                <div class="col-md-6"><b>{{ $car->cylinders ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Empty weight</div>
                <div class="col-md-6"><b>{{ $car->empty_weight ?? ''}}</b></div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Energy Consumption</h4>
                </div>
                <div class="col-md-3">Fuel type</div>
                <div class="col-md-6"><b>{{ $car->fuel_type ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Fuel consumption^2</div>
                <div class="col-md-6"><b>{{ $car->fuel_consumption_2 ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">CO₂-emissions^2</div>
                <div class="col-md-6"><b>{{ $car->COemissions ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Emission class</div>
                <div class="col-md-6"><b>{{ $car->emission_class ?? ''}}</b></div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Equipment</h4>
                </div>
                <div class="col-md-3">Comfort & Convenience</div>
                <div class="col-md-6">{{ $car->comfort_convenience ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Entertainment & Media</div>
                <div class="col-md-6">{{ $car->entertainment_media ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Safety & Security</div>
                <div class="col-md-6">{{ $car->safety_security ?? ''}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Extras</div>
                <div class="col-md-6">{{ $car->extras ?? ''}}</div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Colour and Upholstery</h4>
                </div>
                <div class="col-md-3">Colour</div>
                <div class="col-md-6"><b>{{ $car->colour ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Manufacturer colour</div>
                <div class="col-md-6"><b>{{ $car->manufacturer_colour ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Upholstery colour</div>
                <div class="col-md-6"><b>{{ $car->upholstery_colour ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3">Upholstery</div>
                <div class="col-md-6"><b>{{ $car->upholstery ?? ''}}</b></div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Vehicle Description</h4>
                </div>
                <div class="col-md-9">{{ $car->description ?? ''}}</div>
            </div>

            <div class="border_line mb-8 mt-8"></div>

            <div class="row mb-3">
                <div class="col-md-3">
                    <h4>Seller Info</h4>
                </div>
                <div class="col-md-3"> Name</div>
                <div class="col-md-6"><b>{{ $car->seller_name ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3"> Phone</div>
                <div class="col-md-6"><b>{{ $car->seller_phone ?? ''}}</b></div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3"></div>
                <div class="col-md-3"> Address</div>
                <div class="col-md-6"><b>{{ $car->seller_address ?? ''}}</b></div>
            </div>





        </div>
    </div>
    @push('scripts')

    @endpush


</x-default-layout>