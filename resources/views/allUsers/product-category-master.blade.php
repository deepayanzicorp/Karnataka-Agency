@extends('allUsers.layout.default')

@section('content')
<!-- Body Start -->
    <div class=content>
        <div class=container-fluid>
            <div class=row>
                <div class="col-lg-12">
                    <div class="card card-outline mt-2">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-md-9">
                                        <h1 class="m-0">{{ $page_title }}</h1>
                                    </div>
                                    <div class="col-md-3 align-self-center">
                                        <button class="btn modalBtn float-right" id="addDetailsBtn" data-bs-target=#addDetailsModal data-bs-toggle=modal>
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display Product-Category list -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 60px;">Actions</th>
                                            <th>Category Name</th>
                                            <th>Category Status</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Product-Category add or edit-->
                        <div aria-hidden="true" aria-labelledby="addLabel" class="modal fade" id="addDetailsModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addLabel">Manage Details</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body p-0 modal-contentBG" id="addDetailsForm">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body modal-contentBG">
                                                        <div class="row">
                                                            <div class="col-md-12" hidden>
                                                                <div class="form-group">
                                                                    <label>SL No</label>
                                                                    <input class="form-control form-control-sm" id="sl_no_product_category" name="sl_no_product_category" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Category Name</label>
                                                                    <input class="form-control form-control-sm" id="product_category_name" name="product_category_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Category Status</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="product_category_status" name="product_category_status" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="Active">Active</option>
                                                                            <option value="Inactive">Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between ModalFooterBorder">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" id="addDetailsCancelBtn">Cancel</button>
                                            <button class="btn modalBtn" id="btnUpdate" type="submit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update
                                            </button>
                                            <button class="btn modalBtn" id="btnAdd" type="submit">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Product-Category delete-->
                        <div class="modal fade" id="deleteRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">InActivate the Record</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <p style="margin-left: 15px; margin-top: 5px;">Confirm to InActive Record ?</p>
                                    <input type="hidden" id="delete_record_id" name="delete_record_id">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" id="btnDelete" class="btn btn-primary">Yes InActive</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var categoryId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation(){
                let valProductCategoryName      = $("#product_category_name").val();
                let valProductCategoryStatus    = $("#product_category_status").val();

                if (valProductCategoryName.length < 3 || valProductCategoryName.length > 50) {
                    $("#product_category_name").focus().select();
                    showMessage('Product Category Name should be between 3 and 50 characters');                    
                    return false;
                } 

                if (valProductCategoryStatus == 0) {                   
                    showMessage('Select Product category status')                    
                    return false;
                }
                   
                return true;          
            }

            // To load add & edit forms
            $('#addDetailsBtn').on('click', function() {
                $("#addDetailsModal").modal('show');
                $('#btnAdd').show();
                $('#btnUpdate').hide();
            });

            // To load DataTable
            loadDataTable();

            // Initialize DataTable with pagination and AJAX
            function loadDataTable() {
                // Destroy existing DataTable instance, if any
                if ($.fn.DataTable.isDataTable('#tblData')) {
                    $('#tblData').DataTable().destroy();
                }

                $('#tblData').DataTable({
                    "paging"    : true,
                    "pageLength": 10,
                    "ajax"      : {
                        "url": "product-category/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                categoryId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            categoryId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            categoryId +
                                            '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                        '</div>';
                            }
                        },
                        {
                            "data"  : "product_category_name"
                        },
                        {
                            "data"  : "product_category_status"
                        }
                        // Add more columns as needed
                    ],

                    // Language option for customizing text
                    "language": {
                        "zeroRecords": "No data available in table"
                    }
                });
            }            

            //Message function
            function showMessage(message) {
                toastr.options = { "closeButton": true, "progressBar": true }
                toastr.error(message);
            }

            function showSuccessMessage(message) {
                toastr.options = { "closeButton": true, "progressBar": true }
                toastr.success(message);
            }

            // Insert part
            $("#btnAdd").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()){
                    return true;
                }else{
                    var f_product_category_name         = $('#product_category_name').val(); 
                    var f_product_category_status       = $('#product_category_status').val(); 
                    var f_sl_no                         = $('#sl_no_product_category').val();

                    var dt = {
                            a_product_category_name     : f_product_category_name,
                            a_product_category_status   : f_product_category_status,    
                            a_sl_no                     : f_sl_no,
                            _token                      : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'post',
                        data: dt,
                        url: "{{ url('product-category/insert') }}",

                        success: function(response) {
                            $('#addDetailsModal').modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            loadDataTable();
                            showSuccessMessage('Record is Inserted.')
                        },
                        error: function(response) {
                            console.log('Error:', response);
                        }
                    })
                    return false;                    
                }
            });

            // Edit part
            $('#tblData').on('click', '#btnEdit', function() {
                // Retrieve the data-id attribute from the clicked button
                var recordId = $(this).data('id');
                // console.log('Edit button clicked for record ID: ' + recordId);

                // Add your logic here to handle the edit event.For example, you can open a modal with the details of the selected record for editing
                $('#addDetailsModal').modal('show');
                $('#btnAdd').hide();
                $('#btnUpdate').show();

                $.ajax({
                    type: "GET",
                    url: "product-category/edit/" + recordId,
                    success: function(response) {
                        $('#product_category_name').val(response.record.product_category_name);
                        $('#product_category_status').val(response.record.product_category_status);
                        $('#sl_no_product_category').val(response.record.id);
                        console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_product_category_name     = $('#product_category_name').val();
                    var f_product_category_status   = $('#product_category_status').val();
                    var f_sl_no                     = $('#sl_no_product_category').val(); 

                    var dt = {
                            a_product_category_name     : f_product_category_name,
                            a_product_category_status   : f_product_category_status,
                            a_sl_no                     : f_sl_no,
                            _token                      : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'PUT',
                        data: dt,
                        url: "{{ url('product-category/update') }}",
                        success: function(response) {
                            $('#addDetailsModal').modal('hide');
                            loadDataTable();
                            showSuccessMessage('Record is Updated.')
                        },
                        error: function(response) {
                            console.log('Error:', response);
                        }
                    })
                    return false;
                }
            })

            // Delete part
            $('#tblData').on('click', '#btnDeleteData', function() {
                var recordId = $(this).data('id');
                // console.log('Delete button clicked for record ID: ' + recordId);
                $('#deleteRecordModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "product-category/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_product_category').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_product_category_status   = $('#product_category_status').val();
                var f_sl_no                     = $('#sl_no_product_category').val();

                /*if (f_product_category_status == 0 || f_product_category_status === 'Inactive') {
                    $('#deleteRecordModal').modal('hide');
                    $('#btnDeleteData').hide();
                    showSuccessMessage('Record is already inactive. Cannot inactivate again.')
                    return;
                }*/

                var dt = {
                    a_product_category_status   : f_product_category_status,
                    a_sl_no                     : f_sl_no,
                    _token                      : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'put',
                    data: dt,
                    url: "{{ url('product-category/delete') }}",
                    success: function(response) {
                        $('#deleteRecordModal').modal('hide');
                        loadDataTable();
                        showSuccessMessage('Record is InActivated.')
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                })
            })

        });
    </script>
@endsection
