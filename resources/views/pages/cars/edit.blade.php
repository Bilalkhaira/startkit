<x-default-layout>

    @section('title')
    Cars
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('cars') }}
    @endsection

    <div class="card">

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <form id="regForm" action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="text-center">Update Car Post</h1>
                <!-- One "tab" for each step in the form: -->

                <div class="tab">
                    <h3 class="mb-5">Seller Data</h3>

                    <p><b> Name</b><input type="text" placeholder="Seller name..." oninput="this.className = ''" value="{{ $car->seller_name ?? ''}}" name="seller_name" value="{{ $car->seller_name ?? ''}}"></p>
                    <p><b> Contact Number</b><input type="number" placeholder="Last name..." oninput="this.className = ''" value="{{ $car->seller_phone ?? ''}}" name="seller_phone" value="{{ $car->seller_name ?? ''}}"></p>
                    <p><b> Address</b><input type="text" placeholder="Seller name..." oninput="this.className = ''" value="{{ $car->seller_address ?? ''}}" name="seller_address" value="{{ $car->seller_name ?? ''}}"></p>
                    <p><b> Email</b><input type="email" placeholder="Seller email..." value="{{ $car->seller_email}}" oninput="this.className = ''" name="seller_email"></p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Vehicle Basic Data</h3>
                    <p><b> Name</b><input type="text" placeholder="Vehicle Name..." oninput="this.className = ''" name="vehicle_name" value="{{ $car->vehicle_name ?? ''}}"></p>
                    <p><b> Price</b><input type="number" placeholder="Vehicle Price..." oninput="this.className = ''" name="vehicle_price" value="{{ $car->vehicle_price ?? ''}}"></p>
                    <p><b>Body type</b><input type="text" placeholder="Body type..." oninput="this.className = ''" name="body_type" value="{{ $car->body_type ?? ''}}"></p>
                    <p><b>Type</b><input type="text" placeholder="Type..." oninput="this.className = ''" name="type" value="{{ $car->type ?? ''}}"></p>
                    <p><b>Drivetrain</b><input type="text" placeholder="Drivetrain..." oninput="this.className = ''" name="drivetrain" value="{{ $car->drivetrain ?? ''}}"></p>
                    <p><b>Seats</b><input type="number" placeholder="Seats..." oninput="this.className = ''" name="seats" value="{{ $car->seats ?? ''}}"></p>
                    <p><b>Doors</b><input type="number" placeholder="Doors..." oninput="this.className = ''" name="doors" value="{{ $car->doors ?? ''}}"></p>
                    <p><b>Offer number</b><input type="text" placeholder="Offer number..." oninput="this.className = ''" name="offer_number" value="{{ $car->offer_number ?? ''}}"></p>
                    <p><b>Warranty</b><input type="text" placeholder="Warranty..." oninput="this.className = ''" name="warranty" value="{{ $car->warranty ?? ''}}"></p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Vehicle History</h3>
                    <p><b>Mileage</b><input placeholder="Mileage" type="text" oninput="this.className = ''" name="mileage" value="{{ $car->mileage ?? ''}}"></p>
                    <p><b>First registration</b><input placeholder="First registration" type="date" oninput="this.className = ''" name="first_registration" value="{{ $car->first_registration ?? ''}}"></p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Technical Data</h3>
                    <p><b>Power</b><input type="text" placeholder="Power..." oninput="this.className = ''" name="power" value="{{ $car->power ?? ''}}"></p>
                    <p><b>Gearbox</b><input placeholder="Gearbox..." oninput="this.className = ''" name="gearbox" value="{{ $car->gearbox ?? ''}}"></p>
                    <p><b>Engine size</b><input type="text" placeholder="Engine size..." oninput="this.className = ''" name="engine_size" value="{{ $car->engine_size ?? ''}}"></p>
                    <p><b>Gears</b><input type="number" placeholder="Gears..." oninput="this.className = ''" name="gears" value="{{ $car->gears ?? ''}}"></p>
                    <p><b>Cylinders</b><input type="number" placeholder="Cylinders..." oninput="this.className = ''" name="cylinders" value="{{ $car->cylinders ?? ''}}"></p>
                    <p><b>Empty weight</b><input type="text" placeholder="Empty weight..." oninput="this.className = ''" name="empty_weight" value="{{ $car->empty_weight ?? ''}}"></p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Energy Consumption</h3>
                    <p><b>Fuel type</b><input type="text" placeholder="Fuel type..." oninput="this.className = ''" name="fuel_type" value="{{ $car->fuel_type ?? ''}}"></p>
                    <p><b>Fuel consumption2</b><input type="text" placeholder="Fuel consumption2..." oninput="this.className = ''" name="fuel_consumption2" value="{{ $car->fuel_consumption_2 ?? ''}}"></p>
                    <p><b>CO₂-emissions2</b><input type="text" placeholder="CO₂-emissions2..." oninput="this.className = ''" name="COemissions" value="{{ $car->COemissions ?? ''}}"></p>
                    <p><b>Emission class</b><input type="text" placeholder="Emission class..." oninput="this.className = ''" name="emission_class" value="{{ $car->emission_class ?? ''}}"></p>
                </div>

                <div class="tab">
                    <h3 class="mb-5">Equipment</h3>
                    <p><b>Comfort & Convenience</b><textarea placeholder="Comfort and Convenience..." oninput="this.className = ''" name="comfort_convenience">{{ $car->comfort_convenience ?? ''}}</textarea></p>
                    <p><b>Entertainment & Media</b><textarea placeholder="Entertainment & Media..." oninput="this.className = ''" name="entertainment_media">{{ $car->entertainment_media ?? ''}}</textarea></p>
                    <p><b>Safety & Security</b><textarea placeholder="Safety and Security..." oninput="this.className = ''" name="safety_security">{{ $car->safety_security ?? ''}}</textarea></p>
                    <p><b>Extras</b><textarea placeholder="Extras..." oninput="this.className = ''" name="extras">{{ $car->extras ?? ''}}</textarea></p>
                </div>

                <div class="tab">
                    <h3 class="mb-5">Colour and Upholstery</h3>
                    <p><b>Colour</b><input type="text" placeholder="Colour..." oninput="this.className = ''" name="colour" value="{{ $car->colour ?? ''}}"></p>
                    <p><b>Manufacturer colour</b><input type="text" placeholder="Manufacturer colour..." oninput="this.className = ''" name="manufacturer_colour" value="{{ $car->manufacturer_colour ?? ''}}"></p>
                    <p><b>Upholstery colour</b><input type="text" placeholder="Upholstery colour..." oninput="this.className = ''" name="upholstery_colour" value="{{ $car->upholstery_colour ?? ''}}"></p>
                    <p><b>Upholstery</b><input type="text" placeholder="Upholstery..." oninput="this.className = ''" name="upholstery" value="{{ $car->upholstery ?? ''}}"></p>
                </div>

                <div class="tab">
                    <p><b>Vehicle Description</b><textarea placeholder="Vehicle Description..." oninput="this.className = ''" name="vehicle_description">{{ $car->description ?? ''}}</textarea></p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>Vehicle Images:</label></br>
                            <input name="images[]" id="fuUpload1" type="file" multiple="multiple" />
                            <div id="dvPreview" style="margin-bottom: 10px"></div>
                        </div>
                    </div>
                    <div class="row">
                        @if(!empty($car->images[0]))
                        @foreach($car->images as $image)
                        <div class="col-lg-2 img_main">
                            <img src="{{ asset('images/'.$image->images) }}" width="100%" class="mt-8">
                            <i class="fa fa-trash" id="img_dlt_btn"></i>
                            <input id="imgId" type="hidden" value="{{ $image->id ??  ''}}">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>


                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        <input type="hidden" name="updateId" value="{{ $car->id ?? ''}}">
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @push('scripts')
    <script>
        $(document).on("click", "#img_dlt_btn", function(e) {
            e.preventDefault();
            var carId = $(this).closest('div').find("#imgId").val();
            $(this).closest("div").css('display', 'none');
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "{{ route('cars.imgDelete') }}" + "/" + carId,
                type: "GET",
                dataType: "json",

                success: function(data) {
                   
                }
            });
        });






        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            // for (i = 0; i < y.length; i++) {
            //     // If a field is empty...
            //     if (y[i].value == "") {
            //         // add an "invalid" class to the field:
            //         y[i].className += " invalid";
            //         // and set the current valid status to false
            //         valid = false;
            //     }
            // }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }


        $(function() {
            $('[id*=fuUpload1]').change(function() {
                if (typeof(FileReader) != "undefined") {
                    var dvPreview = $("[id*=dvPreview]");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    $($(this)[0].files).each(function() {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var img = $("<img />");
                                img.attr("style", "max-height:250px;width: 150px");
                                img.attr("src", e.target.result);
                                var div = $("<div style='float:left;margin:10px' />");
                                // $(div).html("<span style='float:right;background-color: red;padding:0px 5px;border-radius:5px;margin-top:-18px;hover:cursor:pointer' class='closeDiv'>X<span>");
                                div.append(img);

                                dvPreview.append(div);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });

            $('body').on('click', '.closeDiv', function() {
                $(this).closest('div').remove();
            });
        });
    </script>
    @endpush


</x-default-layout>