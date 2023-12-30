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

                        <!-- Display Plant list -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 60px;">Actions</th>
                                            <th>Created At</th>
                                            <th>Plant Name</th>
                                            <th>Plant Code</th>
                                            <th>State</th>
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
                                                                    <input class="form-control form-control-sm" id="sl_no_plant" name="sl_no_plant" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Plant Name</label>
                                                                    <input class="form-control form-control-sm" id="plant_name" name="plant_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Plant Code</label>
                                                                    <input class="form-control form-control-sm" id="plant_code" name="plant_code" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>State</label>
                                                                    <select class="form-control-dropdown js-example-basic-single form-control-sm" id="state" name="state" style="width: 100%; font-size: 14px;">
                                                                        <option value="0">Select State</option>
                                                                        <option value="Andhra Pradesh (AP)">Andhra Pradesh (AP)</option>
                                                                        <option value="Arunachal Pradesh (AR)">Arunachal Pradesh (AR)</option>
                                                                        <option value="Assam (AS)">Assam (AS)</option>
                                                                        <option value="Bihar (BR)">Bihar (BR)</option>
                                                                        <option value="Chhattisgarh (CG)">Chhattisgarh (CG)</option>
                                                                        <option value="Goa (GA)">Goa (GA)</option>
                                                                        <option value="Gujarat (GJ)">Gujarat (GJ)</option>
                                                                        <option value="Haryana (HR)">Haryana (HR)</option>
                                                                        <option value="Himachal Pradesh (HP)">Himachal Pradesh (HP)</option>
                                                                        <option value="Jammu and Kashmir (JK)">Jammu and Kashmir (JK)</option>
                                                                        <option value="Jharkhand (JH)">Jharkhand (JH)</option>
                                                                        <option value="Karnataka (KA)">Karnataka (KA)</option>
                                                                        <option value="Kerala (KL)">Kerala (KL)</option>
                                                                        <option value="Madhya Pradesh (MP)">Madhya Pradesh (MP)</option>
                                                                        <option value="Maharashtra (MH)">Maharashtra (MH)</option>
                                                                        <option value="Manipur (MN)">Manipur (MN)</option>
                                                                        <option value="Meghalaya (ML)">Meghalaya (ML)</option>
                                                                        <option value="Mizoram (MZ)">Mizoram (MZ)</option>
                                                                        <option value="Nagaland (NL)">Nagaland (NL)</option>
                                                                        <option value="Orissa (OR)">Orissa (OR)</option>
                                                                        <option value="Punjab (PB)">Punjab (PB)</option>
                                                                        <option value="Rajasthan (RJ)">Rajasthan (RJ)</option>
                                                                        <option value="Sikkim (SK)">Sikkim (SK)</option>
                                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                                        <option value="Uttarakhand (UK)">Uttarakhand (UK)</option>
                                                                        <option value="Uttar Pradesh (UP)">Uttar Pradesh (UP)</option>
                                                                        <option value="West Bengal (WB)">West Bengal (WB)</option>
                                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                                        <option value="Andaman and Nicobar Islands (AN)">Andaman and Nicobar Islands (AN)</option>
                                                                        <option value="Chandigarh (CH)">Chandigarh (CH)</option>
                                                                        <option value="Dadra and Nagar Haveli (DH)">Dadra and Nagar Haveli (DH)</option>
                                                                        <option value="Daman and Diu (DD)">Daman and Diu (DD)</option>
                                                                        <option value="Delhi (DL)">Delhi (DL)</option>
                                                                        <option value="Lakshadweep (LD)">Lakshadweep (LD)</option>
                                                                        <option value="Pondicherry (PY)">Pondicherry (PY)</option>
                                                                    </select>
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
        var plantId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation(){
                let valPlantName  = $("#plant_name").val();
                let valPlantCode  = $("#plant_code").val();
                let valState      = $("#state").val();

                if (valPlantName.length < 3 || valPlantName.length > 150) {
                    $("#plant_name").focus().select();
                    showMessage('Plant Name should be between 3 and 150 characters');                    
                    return false;
                } 
                
                if (valPlantCode.length < 3 || valPlantCode.length > 50) {
                    $("#plant_code").focus().select();
                    showMessage('Plant Code should be between 3 and 50 characters');                    
                    return false;
                } 

                if (valState == 0 || valState == null) {                   
                    showMessage('Select state')                    
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
                        "url": "plant/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                plantId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            plantId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            plantId +
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
                            "data"  : "plant_name"
                        },
                        {
                            "data"  : "plant_code"
                        },
                        {
                            "data"  : "plant_state"
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
                    var f_plant_name    = $('#plant_name').val();
                    var f_plant_code    = $('#plant_code').val();
                    var f_plant_state   = $('#state').val();
                    var f_sl_no         = $('#sl_no_plant').val();

                    var dt = {
                            a_plant_name    : f_plant_name,
                            a_plant_code    : f_plant_code,
                            a_plant_state   : f_plant_state,
                            a_sl_no         : f_sl_no,
                            _token          : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'post',
                        data: dt,
                        url: "{{ url('plant/insert') }}",

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
                    url: "plant/edit/" + recordId,
                    success: function(response) {
                        $('#plant_name').val(response.record.plant_name);
                        $('#plant_code').val(response.record.plant_code);
                        $('#state').val(response.record.plant_state);
                        $('#sl_no_plant').val(response.record.id);
                        // console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_plant_name        = $('#plant_name').val();
                    var f_plant_code        = $('#plant_code').val();
                    var f_plant_state       = $('#state').val();
                    var f_sl_no             = $('#sl_no_plant').val();

                    var dt = {
                            a_plant_name    : f_plant_name,
                            a_plant_code    : f_plant_code,
                            a_plant_state   : f_plant_state,
                            a_sl_no         : f_sl_no,
                            _token          : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'put',
                        data: dt,
                        url: "{{ url('plant/update') }}",
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
                    url: "plant/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_plant').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_plant_status  = $('#plant_status').val();
                var f_sl_no         = $('#sl_no_plant').val();

                var dt = {
                    a_plant_status  : f_plant_status,
                    a_sl_no         : f_sl_no,
                    _token          : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'put',
                    data: dt,
                    url: "{{ url('plant/delete') }}",
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
