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
                                            <th>Category(COIL|CUT)</th>
                                            <th>Length(mm)</th>
                                            <th>Type CR|HR</th>
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
                                                                    <input class="form-control form-control-sm" id="sl_no_length" name="sl_no_length" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label>Length Type</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="length_type" name="length_type" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="COIL">COIL</option>
                                                                            <option value="CUT">CUT Length</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label>Material Type</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="length_material" name="length_material" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="HR">HR</option>
                                                                            <option value="CR">CR</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Measurment</label>
                                                                    <input class="form-control form-control-sm" id="length_measurement" name="length_measurement" type="text" runat="server"
                                                                    pattern="\d+(\.\d{1,2})?" title="Enter a valid number with up to two decimal places"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">

                                                                    <div>
                                                                        <p><strong>Note:</strong></p>
                                                                        <p class="m-0">CR = 2.5 - 3.2 mm</p>
                                                                        <p class="m-0">HR = 2.5 - 12 mm</p>
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
        var lengthId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation() {
                let valLengthType           = $("#length_type").val();
                let valLengthMaterial       = $("#length_material").val();
                let valLengthMeasurement    = $("#length_measurement").val();

                if (valLengthType == 0 || valLengthType == null) {                   
                    showMessage('Select length type')                    
                    return false;
                }

                if (valLengthMaterial == 'CR') {
                    if (valLengthMeasurement < 2.5 || valLengthMeasurement > 3.2) {
                        $("#length_measurement").focus().select();
                        showMessage('Length should be between 2.5 to 3.2');
                        return false;
                    }
                } else if (valLengthMaterial == 'HR') {
                    if (valLengthMeasurement < 2.5 || valLengthMeasurement > 12) {
                        $("#width").focus().select();
                        showMessage('Length should be between 2.5 to 12');
                        return false;
                    }
                } else {
                    showMessage('Select Material Type');
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
                        "url": "length/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                lengthId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            lengthId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            lengthId +
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
                            "data"  : "length_type"
                        },
                        {
                            "data"  : "length_measurement"
                        },
                        {
                            "data"  : "length_material"
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
                    var f_length_type               = $('#length_type').val();
                    var f_length_material           = $('#length_material').val();
                    var f_length_measurement        = $('#length_measurement').val();
                    var f_sl_no                     = $('#sl_no_length').val();

                    var dt = {
                            a_length_type           : f_length_type,
                            a_length_material       : f_length_material,
                            a_length_measurement    : f_length_measurement,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'POST',
                        data: dt,
                        url: "{{ url('length/insert') }}",

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
                    url: "length/edit/" + recordId,
                    success: function(response) {
                        $('#length_type').val(response.record.length_type).trigger('change');
                        $('#length_material').val(response.record.length_material).trigger('change');
                        $('#length_measurement').val(response.record.length_measurement);
                        $('#sl_no_length').val(response.record.id);
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
                    var f_sl_no                     = $('#sl_no_length').val();

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
                        url: "{{ url('length/update') }}",
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
                    url: "length/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_length').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_length_status = $('#length_status').val();
                var f_sl_no         = $('#sl_no_length').val();

                var dt = {
                    a_length_status : f_length_status,
                    a_sl_no         : f_sl_no,
                    _token          : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'PUT',
                    data: dt,
                    url: "{{ url('length/delete') }}",
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
