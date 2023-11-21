<x-default-layout>

    @section('title')
    Cars
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('cars.add') }}
    @endsection

    <div class="card">
        <!--begin::Card body-->
        <div class="card-body cardBody py-4">
            <!--begin::Table-->
            <form id="regForm" action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1 class="text-center">Add New Car Post</h1>
                <!-- One "tab" for each step in the form: -->

                <!-- <div class="tab">
                    <h3 class="mb-5">Seller Data</h3>

                    <p><b> Name</b><input type="text" placeholder="Seller name..." oninput="this.className = ''" name="seller_name"></p>
                    <p><b> Contact Number</b><input type="number" placeholder="Last name..." oninput="this.className = ''" name="seller_phone"></p>
                    <p><b> Address</b><input type="text" placeholder="Seller name..." oninput="this.className = ''" name="seller_address"></p>
                    <p><b> Email</b><input type="email" placeholder="Seller email..." oninput="this.className = ''" name="seller_email"></p>
                </div> -->
                <div class="tab">
                    <h3 class="mb-5">Vehicle Basic Data</h3>
                    <p><b> Make</b>
                        <select name="model[]" id="make">
                            <option>Select Make</option>
                            @foreach($carModels as $carModel)
                            <option value="{{ $carModel->id }}">{{ $carModel->name }}</option>
                            @endforeach
                        </select>
                    </p>
                    <div class="displayNone" id="appendMain">
                        <p><b> Select Model</b>
                            <select name="model[]" id="appendRow">
                                <option>Select Model</option>
                            </select>
                        </p>
                    </div>
                    <div id="appendChildRow" class="displayNone">
                        <p><b>Select Model Again</b>
                            <select name="model3" id="appendChild">
                                <option value="">Select Model Again</option>
                            </select>
                        </p>
                    </div>
                    <p id="other_model_p"></p>
                    <p><b> Price</b><input type="number" placeholder="Vehicle Price..." oninput="this.className = ''" name="vehicle_price"></p>
                    <p><b>Body type</b>
                        <select name="body_type" id="">
                            <option value="Compact">Compact</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Coup">Coup</option>
                            <option value="SUV/ Off-road">SUV/ Off-road</option>
                            <option value="Station Wagon">Station Wagon</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Van">Van</option>
                            <option value="Others">Others</option>
                        </select>
                    </p>
                    <p><b>Vehicle Type</b>
                        <select name="type" id="">
                            <option value="Used">Used</option>
                            <option value="New">New</option>
                            <option value="Classic">Classic</option>
                            <option value="Antique">Antique</option>
                        </select>
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <label><b>Vehicle Images:</b></label></br>
                            <input name="images[]" id="fuUpload1" type="file" multiple="multiple" />
                            <div id="dvPreview" style="margin-bottom: 10px"></div>

                            <div class="col-lg-12">
                                <div class="row" id="img_append"></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="tab">
                    <h3 class="mb-5">Vehicle History</h3>
                    <p><b>Mileage</b><input placeholder="Mileage" type="text" oninput="this.className = ''" name="mileage"></p>
                    <p><b>First registration</b><input placeholder="First registration" type="date" oninput="this.className = ''" name="first_registration"></p>
                    <p><b>Full service history</b>
                        <select name="service_history" id="">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                    <p><b>Non-smoker vehicle</b>
                        <select name="non_smoker" id="">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Technical Data</h3>
                    <p><b>Power</b><input placeholder="Power..." type="text" oninput="this.className = ''" name="power"></p>
                    <p><b>Gearbox</b>
                        <select name="gearbox" id="">
                            <option value="Automatic">Automatic</option>
                            <option value="Semi Auto">Semi Auto</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </p>
                    <p><b>Engine size</b><input type="text" placeholder="Engine size..." oninput="this.className = ''" name="engine_size"></p>
                    <p><b>Gears</b><input type="number" placeholder="Gears..." oninput="this.className = ''" name="gears"></p>
                    <p><b>Cylinders</b><input type="number" placeholder="Cylinders..." oninput="this.className = ''" name="cylinders"></p>
                    <p><b>Empty weight</b><input type="text" placeholder="Empty weight..." oninput="this.className = ''" name="empty_weight"></p>
                    <p><b>Drivetrain</b><input type="text" placeholder="Drivetrain..." oninput="this.className = ''" name="drivetrain"></p>
                    <p><b>Seats</b>
                        <select name="seats" id="">
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </p>
                    <p><b>Doors</b>
                        <select name="doors" id="">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </p>
                    <p><b>Offer number</b><input type="text" placeholder="Offer number..." oninput="this.className = ''" name="offer_number"></p>
                    <p><b>Warranty</b>
                        <select name="warranty" id="">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </p>
                </div>
                <div class="tab">
                    <h3 class="mb-5">Energy Consumption</h3>
                    <p><b>Fuel type</b>
                        <select name="fuel_type" id="">
                            <option value="Diesel">Diesel</option>
                            <option value="Gasoline">Gasoline</option>
                            <option value="Electric">Electric</option>
                            <option value="Hybrid">Hybrid</option>
                        </select>
                    </p>
                    <p><b>Fuel consumption2</b><input type="text" placeholder="Fuel consumption2..." oninput="this.className = ''" name="fuel_consumption2"></p>
                    <p><b>CO₂-emissions2</b><input type="text" placeholder="CO₂-emissions2..." oninput="this.className = ''" name="COemissions"></p>
                    <p><b>Emission class</b><input type="text" placeholder="Emission class..." oninput="this.className = ''" name="emission_class"></p>
                </div>

                <div class="tab">
                    <h3 class="mb-5">Equipment</h3>
                    <p><b>Comfort & Convenience</b><textarea placeholder="Comfort and Convenience..." oninput="this.className = ''" name="comfort_convenience"></textarea></p>
                    <p><b>Entertainment & Media</b><textarea placeholder="Entertainment & Media..." oninput="this.className = ''" name="entertainment_media"></textarea></p>
                    <p><b>Safety & Security</b><textarea placeholder="Safety and Security..." oninput="this.className = ''" name="safety_security"></textarea></p>
                    <p><b>Extras</b><textarea placeholder="Extras..." oninput="this.className = ''" name="extras"></textarea></p>
                </div>

                <div class="tab">
                    <h3 class="mb-5">Colour and Upholstery</h3>
                    <p><b>Colour</b><input type="text" placeholder="Colour..." oninput="this.className = ''" name="colour"></p>
                    <p><b>Manufacturer colour</b><input type="text" placeholder="Manufacturer colour..." oninput="this.className = ''" name="manufacturer_colour"></p>
                    <p><b>Upholstery colour</b><input type="text" placeholder="Upholstery colour..." oninput="this.className = ''" name="upholstery_colour"></p>
                    <p><b>Upholstery</b><input type="text" placeholder="Upholstery..." oninput="this.className = ''" name="upholstery"></p>
                </div>

                <div class="tab">
                    <p><b>Vehicle Description</b><textarea placeholder="Vehicle Description..." oninput="this.className = ''" name="vehicle_description"></textarea></p>
                    
                </div>

                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <!-- <span class="step"></span> -->
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
        $("#appendRow").on("change", function() {
            var makeId = $(this).val();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/getModels/" + makeId,
                type: "GET",
                dataType: "json",

                success: function(response) {
                    if (response[0] && typeof response[0].id !== 'undefined') {
                        $("body").find("#appendChildRow").removeClass("displayNone");
                        $("body").find("#appendChildRow").addClass("displayYes");
                        $('#appendChild').html('');
                        response.forEach(item => {
                            var data = '<option value="' + item.id + '">' + item.name + '</option>';
                            $('#appendChild').append(data);
                        });
                    } else {
                        $("body").find("#appendChildRow").removeClass("displayYes");
                        $("body").find("#appendChildRow").addClass("displayNone");
                    }
                }
            });

        });


        $("#make").on("change", function() {
            var makeId = $(this).val();
            if(makeId == 250){
                var data = '<b>Write Other Model Name</b><input type="text" class="form-control" name="other_model" placeholder="Write Other Model Name">';
                $('#other_model_p').html('');
                $('#other_model_p').append(data);
                
                $("body").find("#appendMain").removeClass();
                $("body").find("#appendMain").addClass("displayNone");

                $("body").find("#appendChildRow").removeClass();
                $("body").find("#appendChildRow").addClass("displayNone");
            } else {
                $('#other_model_p').html('');
            
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                url: "/getModels/" + makeId,
                type: "GET",
                dataType: "json",

                success: function(response) {
                    $("body").find("#appendChildRow").removeClass();
                    $("body").find("#appendChildRow").addClass("displayNone");

                    $("body").find("#appendMain").removeClass("displayNone");
                    $("body").find("#appendMain").addClass("displayYes");
                    $('#appendRow').html('');
                    response.forEach(item => {
                        var data = '<option value="' + item.id + '">' + item.name + '</option>';
                        $('#appendRow').append(data);
                    });

                }
            });
        }

        });
    </script>
    <script>
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
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
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