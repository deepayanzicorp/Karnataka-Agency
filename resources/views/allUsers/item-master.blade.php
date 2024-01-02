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
                                    <div class="col-md-7">
                                        <h1 class="m-0">{{ $page_title }}</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="d-flex align-items-center justify-content-end">
                                            <div class="col-md-8">
                                                <!-- Default dropstart button -->
                                                <div class="btn-group dropstart">
                                                    <button type="button" class="btn modalBtn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Item Measurement</button>
                                                    <ul class="dropdown-menu ">
                                                        <!-- Dropdown menu links -->
                                                        <li><a class="dropdown-item" href="{{ route('allUsers.thicknessMaster') }}">Thickness</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('allUsers.widthMaster') }}">Width</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('allUsers.gradeMaster') }}">Grade</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('allUsers.lengthMaster') }}">Length</a></li>
                                                        <li><a class="dropdown-item" href="">Size</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <button class="btn modalBtn float-right" id="addDetailsBtn" data-bs-target=#addDetailsModal data-bs-toggle=modal>
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                                </button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WILL WORK LATER -->
                        <!-- Display Plant list --> 
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                    <thead class="TableHeadTheme">
                                        {{-- <tr>
                                            <th style="width: 60px;">Actions</th>
                                            <th>Item Name</th>
                                            <th>Category</th>
                                            <th>Thickness</th>
                                            <th>Width</th>
                                            <th>Length</th>
                                            <th>Size</th>
                                            <th>HSN Code</th>
                                            <th>Material Type</th>
                                            <th>Grade</th>
                                            <th>Tender Serial No.(TSN)</th>
                                            <th>Quality Code</th>
                                        </tr> --}}
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
                                                                    <input class="form-control form-control-sm" id="sl_no_grade" name="sl_no_grade" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Grade</label>
                                                                    <input class="form-control form-control-sm" id="grade_name" name="grade_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Material Type</label>
                                                                    <input class="form-control form-control-sm" id="grade_material_type" name="grade_material_type" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Quality Code</label>
                                                                    <input class="form-control form-control-sm" id="grade_quality_code" name="grade_quality_code" type="text">
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

{{-- @section('scripts')
    <script>
        var itemId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation(){
                let valGradeName            = $("#grade_name").val();
                let valGradeMaterialType    = $("#grade_material_type").val();
                let valGradeQualityCode     = $("#grade_quality_code").val();

                if (valGradeName.length < 3 || valGradeName.length > 150) {
                    $("#grade_name").focus().select();
                    showMessage('Grade Name should be between 3 and 150 characters');                    
                    return false;
                } 
                
                if (valGradeMaterialType.length < 3 || valGradeMaterialType.length > 50) {
                    $("#grade_material_type").focus().select();
                    showMessage('Material Type should be between 3 and 50 characters');                    
                    return false;
                } 

                if (valGradeQualityCode.length < 3 || valGradeQualityCode.length > 50) {
                    $("#grade_quality_code").focus().select();
                    showMessage('Quality Code should be between 3 and 50 characters');                    
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
                        "url": "item/list",
                        "dataSrc": "list"
                    },
                    "columns"   : [{
                            "data"  : null,
                            "render": function(data, type, row) {
                                itemId = row.id; // Store the Seller id in a variable
                                return '<div class="d-flex">' +
                                            '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                            itemId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                            '<button type="button" id="btnDeleteData" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                            itemId +
                                            '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                        '</div>';
                            }
                        },
                        // {
                        //     "data"  : "created_at",
                        //     "render": function(data) {
                        //         return moment(data).format('Do-MMM-yyyy');
                        //     }
                        // },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
                        },
                        {
                            "data"  : ""
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
                    var f_grade_name                = $('#grade_name').val();
                    var f_grade_material_type       = $('#grade_material_type').val();
                    var f_grade_quality_code        = $('#grade_quality_code').val();
                    var f_sl_no                     = $('#sl_no_grade').val();

                    var dt = {
                            a_grade_name            : f_grade_name,
                            a_grade_material_type   : f_grade_material_type,
                            a_grade_quality_code    : f_grade_quality_code,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'POST',
                        data: dt,
                        url: "{{ url('item/insert') }}",

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
                    url: "item/edit/" + recordId,
                    success: function(response) {
                        $('#grade_name').val(response.record.grade_name);
                        $('#grade_material_type').val(response.record.grade_material_type);
                        $('#grade_quality_code').val(response.record.grade_quality_code);
                        $('#sl_no_grade').val(response.record.id);
                        console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_grade_name                = $('#grade_name').val();
                    var f_grade_material_type       = $('#grade_material_type').val();
                    var f_grade_quality_code        = $('#grade_quality_code').val();
                    var f_sl_no                     = $('#sl_no_grade').val();

                    var dt = {
                            a_grade_name            : f_grade_name,
                            a_grade_material_type   : f_grade_material_type,
                            a_grade_quality_code    : f_grade_quality_code,
                            a_sl_no                 : f_sl_no,
                            _token                  : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'PUT',
                        data: dt,
                        url: "{{ url('item/update') }}",
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
                    url: "item/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_grade').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_grade_status  = $('#grade_status').val();
                var f_sl_no         = $('#sl_no_grade').val();

                var dt = {
                    a_grade_status  : f_grade_status,
                    a_sl_no         : f_sl_no,
                    _token          : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'PUT',
                    data: dt,
                    url: "{{ url('item/delete') }}",
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
@endsection --}}
