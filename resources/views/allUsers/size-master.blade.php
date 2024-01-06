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
                                        <a href="{{ url()->previous() }}" class="btn modalBtn" id="pageBackBtn">
                                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Back
                                        </a>

                                        <button class="btn modalBtn float-right" id="addDetailsBtn" data-bs-target=#addDetailsModal data-bs-toggle=modal>
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display Plant list -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 60px;">Actions</th>
                                            <th>Created At</th>
                                            <th>Length</th>
                                            <th>Width</th>
                                            <th>Thickness</th>
                                            <th>Size Type</th>
                                            <th>Size</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Plant add or edit-->
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
                                                                    <input class="form-control form-control-sm" id="sl_no_size" name="sl_no_size" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Length</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="size_length" name="size_length" style="width: 100%">
                                                                            <option value="0">--Choose Length--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Width</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="size_width" name="size_width" style="width: 100%">
                                                                            <option value="0">--Choose Width--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Thickness</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="size_thickness" name="size_thickness" style="width: 100%">
                                                                            <option value="0">--Choose Thickness--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Size Info</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="size_cat_type" name="size_cat_type" style="width: 100%">
                                                                            <option value="0">--Choose Category--</option>
                                                                            <option value="HR">HR</option>
                                                                            <option value="CR">CR</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Size</label>
                                                                    <input class="form-control form-control-sm" id="size_calculate" name="size_calculate" type="text">
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

                        <!-- Bootstrap Modal for Plant delete-->
                        <div class="modal fade" id="deleteRecordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <p style="margin-left: 15px; margin-top: 5px;">Confirm to Delete Record ?</p>
                                    <input type="hidden" id="delete_record_id" name="delete_record_id">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" id="btnDelete" class="btn btn-primary">Yes Delete</button>
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
        var sizeId;
        $(document).ready(function() {   
            var urlCurrent = window.location.href;  
            
            // Check validation
            function checkInputDataValidation() {
                let valSizeLength       = $("#size_length").val();
                let valSizeWidth        = $("#size_width").val();
                let valSizeThickness    = $("#size_thickness").val();
                let valSizeCatType      = $("#size_cat_type").val();
                let valSizeCalculate    = $("#size_calculate").val();

                if (valSizeLength == 0 || valSizeLength == null) {                   
                    showMessage('Select Length type')                    
                    return false;
                }

                if (valSizeWidth == 0 || valSizeWidth == null) {                   
                    showMessage('Select Width type')                    
                    return false;
                }

                if (valSizeThickness == 0 || valSizeThickness == null) {                   
                    showMessage('Select Thickness type')                    
                    return false;
                }

                if (valSizeCatType == 0 || valSizeCatType == null) {                   
                    showMessage('Select Category type')                    
                    return false;
                }
                
                return true;
            }

            // Select2 dropdown
            $('#length_type').select2({
                dropdownParent: $('#addDetailsModal')
            });

            $('#length_material').select2({
                dropdownParent: $('#addDetailsModal')
            });

            // To load add & edit forms
            $('#addDetailsBtn').on('click', function() {
                $("#addDetailsModal").modal('show');
                $('#btnAdd').show();
                $('#btnUpdate').hide();

                // load other pages model data
                // load length
                $.ajax({
                    url: urlCurrent + '/listLength',
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        // Populate the select dropdown with options
                        $.each(data.listLength, function(index, length) {
                            $('#size_length').append('<option value="' + length.length_measurement + 
                                                    '" name=" '+length.length_measurement + ' ( ' + length.length_type + ' - ' + length.length_material +  ' )">' 
                                                    + length.length_measurement + ' ( ' + length.length_type + ' - ' + length.length_material +  ' ) </option>');                            
                        });
                    }
                });

                // load width
                $.ajax({
                    url: urlCurrent + '/listWidth',
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        // Populate the select dropdown with options
                        $.each(data.listWidth, function(index, width) {
                            $('#size_width').append('<option value="' + width.width + 
                                                    '"name="' + width.width + 'mm (' + width.width_cat + ')">' 
                                                    + width.width + 'mm (' + width.width_cat + ')' + '</option>');                            
                        });
                    }
                });

                // load thickness
                $.ajax({
                    url: urlCurrent + '/listThickness',
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        // Populate the select dropdown with options
                        $.each(data.listThickness, function(index, thickness) {
                            $('#size_thickness').append('<option value="' + thickness.thickness_range + 
                                                    '"name="' + thickness.thickness_range + 'mm (' + thickness.thickness_type + ' - ' + thickness.thickness_type_cat + ')">' 
                                                    + thickness.thickness_range + 'mm (' + thickness.thickness_type + ' - ' +  thickness.thickness_type_cat + ')' + '</option>');                            
                        });
                    }
                });

                // Use jQuery to calculate size to handle change events on select elements
                $('#size_length, #size_width, #size_thickness').on('change', function () {
                    // Get selected values from all three select elements
                    var option1Value = $('#size_length').val();
                    var option2Value = $('#size_width').val();
                    var option3Value = $('#size_thickness').val();

                    // Make an Ajax request to your Laravel backend
                    $.ajax({
                        type: 'GET',
                        url: urlCurrent + '/calculate', // Replace with your Laravel route
                        data: {
                            option1: option1Value,
                            option2: option2Value,
                            option3: option3Value,
                        },
                        success: function (response) {
                            // Update the output text field with the calculated value
                            $('#size_calculate').val(response.result);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
                });
                
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
                        "url": "size/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                sizeId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            sizeId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            sizeId +
                                            '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                        '</div>';
                            }
                        },
                        {
                            "data"  : "created_at",
                            "render": function(data) {
                                return moment(data).format('Do-MMM-yyyy');
                            }
                        },
                        {
                            "data"  : "size_length"
                        },
                        {
                            "data"  : "size_width"
                        },                        
                        {
                            "data"  : "size_thickness"
                        },
                        {
                            "data"  : "size_cat_type"
                        },
                        {
                            "data"  : "size_calculate"
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

                console.log('Text value = '+ $('#size_length').val());
                console.log('Text name = '+ $('#size_length option:selected').attr('name'));

                console.log('Width Name = ' + $('#size_width option:selected').attr('name'));
                console.log('Thickness Name = ' + $('#size_thickness option:selected').attr('name'));


                if(!checkInputDataValidation()){
                    return true;
                }else{
                    // var f_size_length           = $('#size_length').val(); 
                    // var f_size_width            = $('#size_width').val();
                    // var f_size_thickness        = $('#size_thickness').val();

                    var f_size_length           = $('#size_length option:selected').attr('name'); 
                    var f_size_width            = $('#size_width option:selected').attr('name');
                    var f_size_thickness        = $('#size_thickness option:selected').attr('name');
                    var f_size_cat_type         = $('#size_cat_type').val();
                    var f_size_calculate        = $('#size_calculate').val();
                    var f_sl_no                 = $('#sl_no_size').val();

                    var dt = {
                            a_size_length       : f_size_length,
                            a_size_width        : f_size_width,
                            a_size_thickness    : f_size_thickness,
                            a_size_cat_type     : f_size_cat_type,
                            a_size_calculate    : f_size_calculate,
                            a_sl_no             : f_sl_no,
                            _token              : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'POST',
                        data: dt,
                        url: "{{ url('size/insert') }}",

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
                    url: "size/edit/" + recordId,
                    success: function(response) {
                        $('#length_type').val(response.record.length_type).trigger('change');
                        $('#length_material').val(response.record.length_material).trigger('change');
                        $('#length_measurement').val(response.record.length_measurement);
                        $('#sl_no_size').val(response.record.id);
                        console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_length_type               = $('#length_type').val();
                    var f_length_material           = $('#length_material').val();
                    var f_length_measurement        = $('#length_measurement').val();
                    var f_sl_no                     = $('#sl_no_size').val();

                    var dt = {
                            a_length_type           : f_length_type,
                            a_length_material       : f_length_material,
                            a_length_measurement    : f_length_measurement,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'PUT',
                        data: dt,
                        url: "{{ url('size/update') }}",
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
                    url: "size/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_size').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_length_status = $('#length_status').val();
                var f_sl_no         = $('#sl_no_size').val();

                var dt = {
                    a_length_status : f_length_status,
                    a_sl_no         : f_sl_no,
                    _token          : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'PUT',
                    data: dt,
                    url: "{{ url('size/delete') }}",
                    success: function(response) {
                        $('#deleteRecordModal').modal('hide');
                        loadDataTable();
                        showSuccessMessage('Record is Deleted.')
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                })
            })

        });
    </script>
@endsection
