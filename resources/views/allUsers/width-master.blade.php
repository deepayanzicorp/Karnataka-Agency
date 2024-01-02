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
                                            <th>Width</th>
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
                                                                    <input class="form-control form-control-sm" id="sl_no_width" name="sl_no_width" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Width</label>
                                                                    <input class="form-control form-control-sm" id="width" name="width" type="text" runat="server"
                                                                    pattern="\d+(\.\d{1,2})?" title="Enter a valid number with up to two decimal places"
                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');">

                                                                    <div>
                                                                        <p><strong>Note:</strong></p>
                                                                        <p class="m-0">CR = 900 - 1250</p>
                                                                        <p class="m-0">HR = 1250 - 2000</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class="form-group">
                                                                    <label>Type</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="width_cat" name="width_cat" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="HR">HR</option>
                                                                            <option value="CR">CR</option>
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
        var widthId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation() {
                let valWidth    = $("#width").val();
                let valWidthCat = $("#width_cat").val();

                if (valWidthCat == 'CR') {
                    if (valWidth < 900 || valWidth > 1250) {
                        $("#width").focus().select();
                        showMessage('Width should be between 900 to 1250');
                        return false;
                    }
                } else if (valWidthCat == 'HR') {
                    if (valWidth < 1250 || valWidth > 2000) {
                        $("#width").focus().select();
                        showMessage('Width should be between 1250 to 2000');
                        return false;
                    }
                } else {
                    showMessage('Select valid Thickness type category');
                    return false;
                }

                return true;
            }

            // Select2 dropdown
            $('#width_cat').select2({
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
                        "url": "width/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                widthId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            widthId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            widthId +
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
                            "data"  : "width"
                        },
                        {
                            "data"  : "width_cat"
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
                    var f_width         = $('#width').val();
                    var f_width_cat     = $('#width_cat').val();
                    var f_sl_no         = $('#sl_no_width').val();

                    var dt = {
                            a_width     : f_width,
                            a_width_cat : f_width_cat,
                            a_sl_no     : f_sl_no,
                            _token      : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'POST',
                        data: dt,
                        url: "{{ url('width/insert') }}",

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
                    url: "width/edit/" + recordId,
                    success: function(response) {
                        $('#width').val(response.record.width);
                        $('#width_cat').val(response.record.width_cat).trigger('change');
                        $('#sl_no_width').val(response.record.id);
                        console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_width         = $('#width').val();
                    var f_width_cat     = $('#width_cat').val();
                    var f_sl_no         = $('#sl_no_width').val();

                    var dt = {
                            a_width     : f_width,
                            a_width_cat : f_width_cat,
                            a_sl_no     : f_sl_no,
                            _token      : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'PUT',
                        data: dt,
                        url: "{{ url('width/update') }}",
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
                    url: "width/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_width').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_width_status  = $('#width_status').val();
                var f_sl_no         = $('#sl_no_width').val();

                var dt = {
                    a_width_status  : f_width_status,
                    a_sl_no         : f_sl_no,
                    _token          : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'PUT',
                    data: dt,
                    url: "{{ url('width/delete') }}",
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
