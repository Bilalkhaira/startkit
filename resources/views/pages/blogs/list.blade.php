<x-default-layout>

    @section('title')
    Blogs
    @endsection

    @section('breadcrumbs')
    {{ Breadcrumbs::render('blogs') }}
    @endsection

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search Blog" id="mySearchInput" />
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a type="button" class="btn btn-primary bgColor" onclick="AddProduct()">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Add Blog
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:user.add-user-modal></livewire:user.add-user-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <div id="ProductModal" class="modal fade show " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-modal="true" aria-hidden="true" style="color: black;">
    <div class="modal-dialog modal-lg" id="ProductModalDialog">
        <div class="modal-content" id="ProductModalContent">

            <form name="productForm" enctype="multipart/form-data" id="prodForm">
              @csrf
               <span class='arrow'>
              <label class='error'></label>
              </span>
                  <div class="modal-header">
                      <h4 class="modal-title" id="ProductModalLabel"></h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                      <div class="" id="ProductModalData">

                        <input type="hidden" id="prod_id" name="prod_id">



                        <div class="row">
                         
                          <div class="col-lg-6">
                            <label> Name:</label>
                            <input type="text" id="prod_name" name="prod_name" class="form-control" placeholder="Enter Product Name"></div>
                          
                        </div>
                        <br>
                        <div class="row">

                          <div class="col-lg-6">
                            <label> Price: </label>
                            <input type="number" id="prod_actual_price" name="prod_actual_price" class="form-control" placeholder="Enter Actual Price"></div>
                              <div class="col-lg-6">
                            <label> Price:</label>
                            <input type="number" id="prod_sale_price" name="prod_sale_price" class="form-control" placeholder="Enter Sale Price" ></div>
                        </div>
                        <br>

                        
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                                <label> Images:</label></br>
                                <input name="product_image[]" id="fuUpload1" type="file" multiple="multiple" />
                                <div id="dvPreview" style="margin-bottom: 10px"></div>
                                
                            
                          </div>
                           <div class="col-lg-12">
                                <div class="row" id="img_append"></div>
                          </div>
                          <div class="col-lg-12">
                            <label> Description:</label>
                            <textarea class="form-control" name="prod_descrip" id="prod_descrip" rows="5" placeholder="Enter Product Description"></textarea></div>
                            <input name="old_images" id="old_images" type="hidden">
                        </div>


                      </div>


                      </div>
                  <div class="modal-footer" id="ProductModalFooter">
                      <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-info ">Save</button>

                  </div>
            </form>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    @push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        document.getElementById('mySearchInput').addEventListener('keyup', function() {
            window.LaravelDataTables['users-table'].search(this.value).draw();
        });
        document.addEventListener('livewire:load', function() {
            Livewire.on('success', function() {
                $('#kt_modal_add_user').modal('hide');
                window.LaravelDataTables['users-table'].ajax.reload();
            });
        });




        function AddProduct() {
            alert('oo');
            $('#ProductModal').modal('show');
            // document.getElementById('prod_name').value = "";
            // document.getElementById('prod_actual_price').value = "";
            // document.getElementById('prod_sale_price').value = "";
            // document.getElementById('prod_stock').value = "";
            // document.getElementById('prod_descrip').value = "";
            // document.getElementById('prod_id').value = "";
            // document.getElementById("fuUpload1").value = "";
            // $("#dvPreview").html('');
            // $("#img_append").html('');
            // $('#old_images').val('');
            
            // $('#ProductModalLabel').html('Add New Product');

            // document.getElementById('ProductModal').style.backgroundColor = "rgba(0,0,0,0.8)";
            // document.getElementById('ProductModalDialog').style.paddingTop = "0px";
            // document.getElementById('ProductModalData').style.padding = "20px 20px 0px 20px";


            // cate_id = "0"

            // $.ajax({
            //     type: "GET",
            //     cache: false,
            //     url: "{{ config('app.url')}}/admin/get-category-name-list/" + cate_id,
            //     success: function(data) {

            //         $('#prod_cate').html(data);
            //     },
            //     error: function(jqXHR, textStatus, errorThrown) {
            //         alert('Exception:' + errorThrown);
            //     }
            // });

        }
    </script>
    @endpush

</x-default-layout>