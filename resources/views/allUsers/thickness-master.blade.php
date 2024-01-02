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
                                            <th>Type CR|HR</th>
                                            <th>Range</th>
                                            <th>Type sheet|plate</th>
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
                                                                    <input class="form-control form-control-sm" id="sl_no_thickness" name="sl_no_thickness" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Range</label>
                                                                    <input class="form-control form-control-sm" id="thickness_range" name="thickness_range" type="text" runat="server"
                                                                    pattern="\d+(\.\d{1,2})?" title="Enter a valid number with up to two decimal places"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">

                                                                    <div>
                                                                        <p><strong>Note:</strong></p>
                                                                        <p class="m-0">CR = 0.8-2.0 sheet</p>
                                                                        <p class="m-0">HR = 2.50-4.00 sheet 5.00-20 plate</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label>Type</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="thickness_type_cat" name="thickness_type_cat" style="width: 100%">
                                                                            <option value="0">CR|HR Choose--</option>
                                                                            <option value="HR">HR</option>
                                                                            <option value="CR">CR</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label>Thickness Type</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="thickness_type" name="thickness_type" style="width: 100%">
                                                                            <option value="0">Sheet|Plate Choose--</option>
                                                                            <option value="Sheet">Sheet</option>
                                                                            <option value="Plate">Plate</option>
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
        var thicknessId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation() {
                let valThicknessRange   = $("#thickness_range").val();
                let valThicknessTypeCat = $("#thickness_type_cat").val();
                let valThicknessType    = $("#thickness_type").val();

                if (valThicknessTypeCat == 'CR') {
                    if (valThicknessRange < 0.8 || valThicknessRange > 2) {
                        $("#thickness_range").focus().select();
                        showMessage('Range should be between 0.8 to 2');
                        return false;
                    }
                } else if (valThicknessTypeCat == 'HR') {
                    if (valThicknessRange < 2.5 || (valThicknessRange > 4 && valThicknessRange < 5) || valThicknessRange > 20) {
                        $("#thickness_range").focus().select();
                        showMessage('Range should be between 2.5 to 4 & Range should be between 5 to 20');
                        return false;
                    }
                } else {
                    showMessage('Select valid Thickness type category');
                    return false;
                }

                if (valThicknessType == 0 || valThicknessType == null) {
                    showMessage('Select Thickness type');
                    return false;
                }

                return true;
            }

            // Select2 dropdown
            $('#thickness_type_cat').select2({
                dropdownParent: $('#addDetailsModal')
            });

            $('#thickness_type').select2({
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
                        "url": "thickness/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                thicknessId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            thicknessId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            thicknessId +
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
                            "data"  : "thickness_range"
                        },
                        {
                            "data"  : "thickness_type_cat"
                        },
                        {
                            "data"  : "thickness_type"
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
                    var f_thickness_range           = $('#thickness_range').val();
                    var f_thickness_type_cat        = $('#thickness_type_cat').val();
                    var f_thickness_type            = $('#thickness_type').val();
                    var f_sl_no                     = $('#sl_no_thickness').val();

                    var dt = {
                            a_thickness_range       : f_thickness_range,
                            a_thickness_type_cat    : f_thickness_type_cat,
                            a_thickness_type        : f_thickness_type,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'POST',
                        data: dt,
                        url: "{{ url('thickness/insert') }}",

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
                    url: "thickness/edit/" + recordId,
                    success: function(response) {
                        $('#thickness_range').val(response.record.thickness_range);
                        $('#thickness_type_cat').val(response.record.thickness_type_cat).trigger('change');
                        $('#thickness_type').val(response.record.thickness_type).trigger('change');
                        $('#sl_no_thickness').val(response.record.id);
                        console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_thickness_range           = $('#thickness_range').val();
                    var f_thickness_type_cat        = $('#thickness_type_cat').val();
                    var f_thickness_type            = $('#thickness_type').val();
                    var f_sl_no                     = $('#sl_no_thickness').val();

                    var dt = {
                            a_thickness_range       : f_thickness_range,
                            a_thickness_type_cat    : f_thickness_type_cat,
                            a_thickness_type        : f_thickness_type,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'PUT',
                        data: dt,
                        url: "{{ url('thickness/update') }}",
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
                    url: "thickness/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_thickness').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_thickness_status  = $('#thickness_status').val();
                var f_sl_no             = $('#sl_no_thickness').val();

                var dt = {
                    a_thickness_status  : f_thickness_status,
                    a_sl_no             : f_sl_no,
                    _token              : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'PUT',
                    data: dt,
                    url: "{{ url('thickness/delete') }}",
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
