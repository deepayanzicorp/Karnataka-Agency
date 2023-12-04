@extends('allUsers.layout.default')

@section('content')
    <div class="content">
        <div class=container-fluid>
            <div class="row">
                <!-- Content Start -->
                <div class="col-lg-12">
                    <div class="card card-outline mt-2">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <h1 class="m-0">{{ $page_title }}</h1>
                                    </div>
                                    <div class="col-md-2 align-self-center">
                                        <div class="float-right" id="addCompanyDetailsBtn"
                                            data-bs-target=#addCompanyDetailsModal data-bs-toggle=modal
                                            style="cursor: pointer;">
                                            <i class="fa fa-plus-square" aria-hidden="true"
                                                style="color: #FFD580; font-size:36px;"></i>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-4 align-self-center">
                                        <div class="input-group">
                                            <input class="form-control form-control-sm" id="search_input" name="query"
                                                placeholder="Search..." type="text">
                                            <div class=input-group-append>
                                                <button class="btn btn-sm searchBtn" id="search_btn" type="button"
                                                    style="color: black;"><i class="fas fa-search"></i>&nbsp;Search</button>
                                            </div>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>

                        <!-- Display added entries in a table -->
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session('error') }}
                                </div>
                            @endif

                            {{-- <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="#companyDetailsTbl">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 75px;">Actions</th>
                                            <th>Created At</th>
                                            <th>Company Name</th>
                                            <th>SAC Code</th>
                                            <th>KGSSL Code</th>
                                            <th>KA GSTIN No.</th>
                                            <th>GSTIN Treatment</th>
                                        </tr>
                                    </thead>
                                    <tbody id="agentTableBody"></tbody>
                                </table>
                            </div> --}}
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="agentTable">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 40px;">Actions</th>
                                            <th>Created At</th>
                                            <th>Company Name</th>
                                            <th>SAC Code</th>
                                            <th>KGSSL Code</th>
                                            <th>KA GSTIN No.</th>
                                            <th>GSTIN Treatment</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for add or edit-->
                        <div aria-hidden="true" aria-labelledby="addAgentModalLabel" class="modal fade"
                            id="addCompanyDetailsModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addAgentModalLabel">Manage Details</h5>
                                        <button data-bs-dismiss="modal" type="button" id="addCompanyDetailsCloseBtn"><i
                                                class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="sl_no">SL No</label>
                                                    <input class="form-control form-control-sm" id="sl_no"
                                                        name="sl_no" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <label for="company">Company Name</label>
                                                    <input class="form-control form-control-sm" id="company_name"
                                                        name="company" type="text">
                                                    <span id="nameError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="sac_code">SAC Code</label>
                                                    <input class="form-control form-control-sm" id="sac_code"
                                                        name="sac_code" type="text">
                                                    <span id="sacError" class="error"></span>
                                                </div>
                                            </div>
                                            <div class=col-md-4>
                                                <div class="form-group">
                                                    <label for="ka_gstin_no">KA GSTIN No</label>
                                                    <input class="form-control form-control-sm" id="ka_gstin_no"
                                                        name="ka_gstin_no" type="text"
                                                        value="{{ isset($item) ? $item->ka_gstin_no : '' }}">
                                                    <span id="kaGstinError" class="error"></span>
                                                </div>
                                            </div>

                                            <div class=col-md-4>
                                                <div class="form-group">
                                                    <label for="gstin_treatment">GSTIN Treatment</label>
                                                    <div>
                                                        <select class="form-control-dropdown js-example-basic-single"
                                                            id="gstin_treatment" name="gstin_treatment"
                                                            style="width: 100%">
                                                            <option value="">--Choose--</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                    <span id="gstinError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kgssl_code">KGSSL Code</label>
                                                    <input class="form-control form-control-sm" id="kgssl_code"
                                                        name="kgssl_code" type="text"
                                                        value="{{ isset($item) ? $item->kgssl_code : '' }}">
                                                    <span id="kgsslError" class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between ModalFooterBorder">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                                                id="addCompanyDetailsCancelBtn">Cancel</button>
                                            <button class="btn modalBtn" id="btnEdit" type="submit">
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

                        <!-- Bootstrap Modal for delete  -->
                        <div class="modal fade" id="deleteRecordModal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                        <button data-bs-dismiss="modal" type="button"><i
                                                class="fas fa-times"></i></button>
                                    </div>

                                    <p style="margin-left: 15px; margin-top: 5px;">Confirm to Delete Record ?</p>
                                    <input type="hidden" id="delete_record_id" name="delete_record_id">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="btnDelete" class="btn btn-primary">Yes Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content End -->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Initialize DataTable with pagination and AJAX
            $('#agentTable').DataTable({
                "paging": true,
                "pageLength": 10,
                "ajax": {
                    "url": "company-details/getall",
                    "dataSrc": "list"
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, row) {
                            return '<div class="d-flex">' +
                                '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                row.id + '"><i class="fas fa-solid fa-pen"></i></button>' +
                                '<button type="button" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                row.id + '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                '</div>';
                        }
                    },
                    {
                        "data": "created_at",
                        "render": function(data) {
                            return moment(data).format('Do-MMM-yyyy');
                        }
                    },
                    {
                        "data": "company_name"
                    },
                    {
                        "data": "company_saccode"
                    },
                    {
                        "data": "company_kgssl"
                    },
                    {
                        "data": "company_kagstin"
                    },
                    {
                        "data": "company_gstin"
                    }
                    // Add more columns as needed
                ]
            });
        
        // Handle "Edit" button click event
        $('#agentTableBody').on('click', '.editRecordBtn', function () {
                var data = dataTable.row($(this).closest('tr')).data();
                console.log('Edit button clicked for ID: ' + data.id);
                // Perform your edit action here using the data.id
            });

        dataTableLoad();

        // For Close button
        var closebtns = document.getElementsByClassName("close");
        var i;

        for (i = 0; i < closebtns.length; i++) {
            closebtns[i].addEventListener("click", function() {
                this.parentElement.style.display = 'none';
            });
        }

        // To load add & edit forms 
        $("#addCompanyDetailsBtn").click(function(event) {
            event.preventDefault();
            $("#addCompanyDetailsModal").modal('show');
            $('#btnAdd').show();
            $('#btnEdit').hide();
        });

        // For select2 dropdown
        $('.js-example-basic-single').select2({
            dropdownParent: $('#addCompanyDetailsModal')
        });
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // Client side validation
        // Add Close btn
        // $("#addCompanyDetailsCloseBtn").click(function(event) {
        //     event.preventDefault();
        //     location.reload();
        // });

        // $("#addCompanyDetailsCancelBtn").click(function(event) {
        //     event.preventDefault();
        //     location.reload();
        // });

        /*
        // Add validation        
        $('#addCompanyDetailsForm').validate({
            rules: {
                company_name: {
                    required: true
                },
                sac_code: {
                    required: true
                },
                ka_gstin_no: {
                    required: true
                },
                gstin_treatment: {
                    required: true
                },
                kgssl_code: {
                    required: true
                }
            },
            messages: {
                company_name: {
                    required: "Please, provide a company name"
                },
                sac_code: {
                    required: "Please, provide sac code"
                },
                ka_gstin_no: {
                    required: "Please, provide ka gstin no"
                },
                gstin_treatment: {
                    required: "Please, provide gstin"
                },
                kgssl_code: {
                    required: "Please, provide kgssl code"
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter($(element));
            },
            submitHandler: function(form) {
                form.submit();
            }
        })*/

        //Load data for table
        function dataTableLoad() {
            $('#agentTableBody').empty();
            $.ajax({
                type: "GET",
                url: "company-details/getall",
                success: function(response) {
                    var tr = '';
                    for (var i = 0; i < response.list.length; i++) {
                        $('#agentTableBody').append(
                            '<tr>' +
                            '<td style="text-align:center;">' +
                            '    <div class="d-flex justify-content-between">' +
                            '        <button type="button" id="editCompanyDetailsBtn" value="' +
                            response.list[i].id +
                            '" class="btn btn-outline-primary btn-sm editRecordBtn" style="font-size: 12px;"><i class="fas fa-solid fa-pen"></i></button>' +
                            '        <button type="button" value="' + response.list[i].id +
                            '" class="btn btn-outline-danger btn-sm deleteRecordBtn" style="font-size: 12px;"><i class="fas fa-solid fa-trash"></i></button>' +
                            '    </div>' +
                            '</td>' +
                            '<td>' + moment(response.list[i].created_at).format('Do-MMM-yyyy') +
                            '</td>' +
                            '<td>' + response.list[i].company_name + '</td>' +
                            '<td>' + response.list[i].company_saccode + '</td>' +
                            '<td>' + response.list[i].company_kgssl + '</td>' +
                            '<td>' + response.list[i].company_kagstin + '</td>' +
                            '<td>' + response.list[i].company_gstin + '</td>' +
                            // Add more cells for other columns as needed
                            '</tr>'
                        );
                    }
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        }

        // Search part 
        $("#search_btn").click(function(event) {
            event.preventDefault();
            var query = $('#search_input').val();
            var urlPage = window.location.href;
            // console.log($('#search_input').val());
            // console.log(query);
            // console.log(urlPage);



            $.ajax({
                url: urlPage + '/search',
                type: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    console.log(response);
                    console.log('Length = ' + response.list.length);

                    // Display an info toast with no title
                    toastr.options = {
                        "closeButton": true,
                        "progressBar": true
                    }
                    toastr.success(response.list.length + ' Record(s) fetched.')

                    // Clear the table body only once before appending rows
                    $('#agentTableBody').empty();

                    var tr = '';
                    for (var i = 0; i < response.list.length; i++) {
                        $('#agentTableBody').append(
                            '<tr>' +
                            '<td style="text-align:center;">' +
                            '    <div class="d-flex justify-content-between">' +
                            '        <button type="button" id="editCompanyDetailsBtn" value="' +
                            response.list[i].id +
                            '" class="btn btn-outline-primary btn-sm editRecordBtn" style="font-size: 12px;"><i class="fas fa-solid fa-pen"></i></button>' +
                            '        <button type="button" value="' + response.list[i]
                            .id +
                            '" class="btn btn-outline-danger btn-sm deleteRecordBtn" style="font-size: 12px;"><i class="fas fa-solid fa-trash"></i></button>' +
                            '    </div>' +
                            '</td>' +
                            '<td>' + moment(response.list[i].created_at).format(
                                'Do-MMM-yyyy') +
                            '</td>' +
                            '<td>' + response.list[i].company_name + '</td>' +
                            '<td>' + response.list[i].company_saccode + '</td>' +
                            '<td>' + response.list[i].company_kgssl + '</td>' +
                            '<td>' + response.list[i].company_kagstin + '</td>' +
                            '<td>' + response.list[i].company_gstin + '</td>' +
                            // Add more cells for other columns as needed
                            '</tr>'
                        );
                    }


                },
                error: function(response) {
                    console.log('Error:', response);
                }
            });
        })

        // Delete part
        $(document).on('click', '.deleteRecordBtn', function() {
            var record_id = $(this).val();
            // alert(record_id);
            $('#deleteRecordModal').modal('show');
            $('#delete_record_id').val(record_id);
            // console.log(record_id);

            $.ajax({
                type: "GET",
                url: "company-details/delete/" + record_id,
                success: function(response) {
                    // console.log(response);
                    // console.log(response.record.company_status);

                    $('#company_status').val(response.record.company_status);
                    $('#sl_no').val(response.record.id);
                }
            });
        });

        $("#btnDelete").click(function(event) {
            event.preventDefault();
            var f_company_status = $('#company_status').val();
            var f_sl_no = $('#sl_no').val();

            var dt = {
                a_company_status: f_company_status,
                a_sl_no: f_sl_no,
                _token: "{{ csrf_token() }}"
            }
            // console.log(dt);
            $.ajax({
                type: 'put',
                data: dt,
                url: "{{ url('company-details/delete') }}",
                success: function(response) {
                    $('#deleteRecordModal').modal('hide');
                    //dataTableList();
                    alert(response.message);
                    dataTableLoad();
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            })
        })

        // Edit part
        $(document).on('click', '.editRecordBtn', function(event) {
            event.preventDefault();
            var record_id = $(this).val();
            // alert(record_id);
            $('#addCompanyDetailsModal').modal('show');
            $('#btnAdd').hide();
            $('#btnEdit').show();

            $.ajax({
                type: "GET",
                url: "company-details/edit/" + record_id,
                success: function(response) {
                    $('#company_name').val(response.record.company_name);
                    $('#sac_code').val(response.record.company_saccode);
                    $('#ka_gstin_no').val(response.record.company_kagstin);
                    // $('#gstin_treatment').val('No').trigger('change');
                    $('#gstin_treatment').val(response.record.company_gstin).trigger(
                        'change');
                    $('#kgssl_code').val(response.record.company_kgssl);
                    $('#sl_no').val(response.record.id);
                    console.log((response.record.company_gstin));
                }
            });
        });

        //Update record
        $("#btnEdit").click(function(event) {
            console.log("Clicked");
            event.preventDefault();
            var f_company_name = $('#company_name').val();
            var f_company_saccode = $('#sac_code').val();
            var f_company_kagstin = $('#ka_gstin_no').val();
            var f_company_gstin = $('#gstin_treatment').val();
            var f_company_kgssl = $('#kgssl_code').val();
            var f_sl_no = $('#sl_no').val();

            // Clear previous error messages
            $('.error').text('');

            // Perform validation
            if (f_company_name.trim() === '') {
                $('#nameError').text('Please provide company name');
                return;
            } else if (f_company_saccode.trim() === '') {
                $('#sacError').text('Please provide sac code');
                return;
            } else if (f_company_kagstin.trim() === '') {
                $('#kaGstinError').text('Please provide company kagstin');
                return;
            } else if (f_company_gstin.trim() === '') {
                $('#gstinError').text('Please provide company gstin');
                return;
            } else if (f_company_kgssl.trim() === '') {
                $('#kgsslError').text('Please provide company kgssl');
                return;
            } else {
                var dt = {
                    a_company_name: f_company_name,
                    a_company_saccode: f_company_saccode,
                    a_company_kagstin: f_company_kagstin,
                    a_company_gstin: f_company_gstin,
                    a_company_kgssl: f_company_kgssl,
                    a_sl_no: f_sl_no,
                    _token: "{{ csrf_token() }}"
                }
                console.log(dt);
                $.ajax({
                    type: 'put',
                    data: dt,
                    url: "{{ url('company-details/update') }}",
                    success: function(response) {
                        $('#addCompanyDetailsModal').modal('hide');
                        //dataTableList();
                        alert(response.message);
                        dataTableLoad();
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                })
            }
        })

        //Insert record
        /*$("#btnAdd").click(function(event) {
            event.preventDefault();
            var f_company_name = $('#company_name').val();
            var f_company_saccode = $('#sac_code').val();
            var f_company_kagstin = $('#ka_gstin_no').val();
            var f_company_gstin = $('#gstin_treatment').val();
            var f_company_kgssl = $('#kgssl_code').val();
            var f_sl_no = $('#sl_no').val();

            var dt = {
                a_company_name: f_company_name,
                a_company_saccode: f_company_saccode,
                a_company_kagstin: f_company_kagstin,
                a_company_gstin: f_company_gstin,
                a_company_kgssl: f_company_kgssl,
                a_sl_no: f_sl_no,
                _token: "{{ csrf_token() }}"
            }
            console.log(dt);
            $.ajax({
                type: 'post',
                data: dt,
                url: "{{ url('company-details/insert') }}",

                success: function(response) {
                    $('#addCompanyDetailsModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    dataTableLoad();
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            })
        })
        */

        $("#btnAdd").click(function(event) {
        event.preventDefault();
        var f_company_name = $('#company_name').val();
        var f_company_saccode = $('#sac_code').val();
        var f_company_kagstin = $('#ka_gstin_no').val();
        var f_company_gstin = $('#gstin_treatment').val();
        var f_company_kgssl = $('#kgssl_code').val();
        var f_sl_no = $('#sl_no').val();

        // Clear previous error messages
        $('.error').text('');

        // Perform validation
        if (f_company_name.trim() === '') {
            $('#nameError').text('Please provide company name');
            return;
        } else if (f_company_saccode.trim() === '') {
            $('#sacError').text('Please provide sac code');
            return;
        } else if (f_company_kagstin.trim() === '') {
            $('#kaGstinError').text('Please provide company kagstin');
            return;
        } else if (f_company_gstin.trim() === '') {
            $('#gstinError').text('Please provide company gstin');
            return;
        } else if (f_company_kgssl.trim() === '') {
            $('#kgsslError').text('Please provide company kgssl');
            return;
        } else {
            var dt = {
                a_company_name: f_company_name,
                a_company_saccode: f_company_saccode,
                a_company_kagstin: f_company_kagstin,
                a_company_gstin: f_company_gstin,
                a_company_kgssl: f_company_kgssl,
                a_sl_no: f_sl_no,
                _token: "{{ csrf_token() }}"
            }
            console.log(dt);
            $.ajax({
                type: 'post',
                data: dt,
                url: "{{ url('company-details/insert') }}",

                success: function(response) {
                    $('#addCompanyDetailsModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    dataTableLoad();
                },
                error: function(response) {
                    console.log('Error:', response);
                }
            })
        }
        })
        });
    </script>
@endsection
