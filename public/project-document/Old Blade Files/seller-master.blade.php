@extends('allUsers.layout.default')

@section('content')
<!-- Body Start -->
    <div class=content>
        <div class=container-fluid>
            <div class=row>
                <!-- Content Start -->
                <div class=col-lg-12>
                    <div class="card card-outline card-primary">
                        <div class=card-header>
                            <h3 class=m-0>Seller List</h3>
                            <div class=float-right>
                                <button class="btn btn-success" data-bs-target=#addSellerModal data-bs-toggle=modal type=button>Add Seller</button>
                            </div>
                        </div>

                        <div class="mt-3 row">
                            <div class=col-md-9></div>
                            <div class=col-md-3>
                                <div class=input-group>
                                    <input class="form-control form-control-sm" id=searchInput placeholder=Search... type="text">
                                    <div class=input-group-append>
                                        <button class="btn btn-primary btn-sm" id=searchButton style=margin-right:2rem type=button><i class="fas fa-search"></i>&nbsp;Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                                const searchInput = document.getElementById("searchInput");
                                const SellerTableBody = document.getElementById("SellerTableBody");
                                const noEntryFound = document.getElementById("noEntryFound");

                                searchInput.addEventListener("input", function () {
                                    const searchTerm = searchInput.value.trim().toLowerCase();

                                    // Loop through the rows in the rack table
                                    let entryFound = false; // Flag to track if a matching entry is found

                                    for (let i = 0; i < SellerTableBody.rows.length; i++) {
                                        const row = SellerTableBody.rows[i];
                                        let rowMatch = false;

                                        // Loop through all cells in the row
                                        for (let j = 0; j < row.cells.length; j++) {
                                            const cell = row.cells[j];
                                            const cellText = cell.textContent.toLowerCase();

                                            // Check if the cell contains the search term
                                            if (cellText.includes(searchTerm)) {
                                                rowMatch = true;
                                                entryFound = true; // Set the flag to true if a match is found
                                                break; // Break the inner loop if a match is found in this row
                                            }
                                        }

                                        // Show or hide the row based on the match
                                        if (rowMatch) {
                                            row.style.display = ""; // Show the row
                                        } else {
                                            row.style.display = "none"; // Hide the row
                                        }
                                    }

                                    // Show or hide the "No such entry found" message
                                    if (entryFound) {
                                        noEntryFound.style.display = "none"; // Hide the message
                                    } else {
                                        noEntryFound.style.display = "block"; // Show the message
                                    }
                                });
                            });
                        </script>

                        <div class=card-body>
                            <!-- Display added Seller entries in a table -->
                            <div class=card-body>
                                <div class="table-responsive table-responsive-sm">
                                    <table class="table  table-bordered table-striped table-sm table-hover" id=example1>
                                        <thead class="TableHeadTheme">
                                            <tr>
                                                <th>Seller Name</th>
                                                <th>Short Name</th>
                                                <th>Billing Address Line 1 + Country + State + Pin</th>
                                                <th>Contact Person Name</th>
                                                <th>GST Type</th>
                                                <th>GST No</th>
                                                <th>Plant Code</th>
                                                <th>Dispatch Address Short Name</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="SellerTableBody">
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Gr</td>
                                                <td>Newtown, Kolkata, Chakpachuria, West Bengal 700156, India
                                                </td>
                                                <td>Ujjal</td>
                                                <td>Registered</td>
                                                <td>ABCDE1234I6UU</td>
                                                <td>11008</td>
                                                <td>Esplanade</td>
                                                <td style="text-align: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sunko</td>
                                                <td>Sk</td>
                                                <td>Newtown, Kolkata, Chakpachuria, West Bengal 700156, India
                                                </td>
                                                <td>Rashi</td>
                                                <td>Registered</td>
                                                <td>IKLDE1234I6UU</td>
                                                <td>10008</td>
                                                <td>RD</td>
                                                <td style="text-align: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gecko</td>
                                                <td>Gr</td>
                                                <td>Newtown, Kolkata, Chakpachuria, West Bengal 700156, India
                                                </td>
                                                <td>Ujjal</td>
                                                <td>Registered</td>
                                                <td>ABCDE1234I6UU</td>
                                                <td>11008</td>
                                                <td>Esplanade</td>
                                                <td style="text-align: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sunko</td>
                                                <td>Sk</td>
                                                <td>Newtown, Kolkata, Chakpachuria, West Bengal 700156, India
                                                </td>
                                                <td>Rashi</td>
                                                <td>Registered</td>
                                                <td>IKLDE1234I6UU</td>
                                                <td>10008</td>
                                                <td>RD</td>
                                                <td style="text-align: center;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5em"
                                                        viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                        <path
                                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr> <!-- List of Seller Master will be added here dynamically as table rows -->
                                        </tbody>

                                        <tfoot style="text-align: end;">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-end flex-wrap">
                                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                </ul>
                                            </nav>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for adding Seller entries -->
                        <div aria-hidden=true aria-labelledby=addSellerModalLabel class="modal fade" id="addSellerModal" tabindex=-1>
                            <div class="modal-dialog modal-lg">
                                <form id="SellerForm">
                                    <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                        <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                            <h5 class="modal-title" id="addSellerModalLabel">Add Seller</h5>
                                            <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                        </div>

                                        <div class="modal-body">
                                            <!--Basic Details-->
                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Basic Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class=row>
                                                            <div class="col-md-6">
                                                                <div class=form-group>
                                                                    <label for=SellerName>Seller Name</label>
                                                                    <input class="form-control form-control-sm" id=SellerName name=SellerName type="text" required>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class=form-group>
                                                                    <label for=ShortName>Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id=ShortName name=ShortName required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Contact Details-->
                                            <div class="col-12">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Contact Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class=row>
                                                            <div class="col-md-6">
                                                                <div class=form-group>
                                                                    <label for=ContactName>Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="ContactName" name="ContactName" required>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class=form-group>
                                                                    <label for=ContactEmail>Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="ContactEmail" name="ContactEmail" required type="email">
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class=form-group>
                                                                    <label for=MobileNo>Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" type="number" id="MobileNo" name="MobileNo" required>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class=form-group>
                                                                    <label for=PlantCode>Plant Code</label>
                                                                    <select
                                                                        class="form-control-dropdown select2" id="PlantCode" name="PlantCode" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Billing Details-->
                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Billing Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class=row>
                                                            <div class="col-md-6">
                                                                <div class=form-group>
                                                                    <label for=Address1>Billing Address Line 1</label>
                                                                    <textarea class="form-control form-control-sm" id="Address1" name="Address1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-6>
                                                                <div class=form-group>
                                                                    <label for=Address2>Billing Address Line 2</label>
                                                                    <textarea class="form-control form-control-sm" id="Address2" name="Address2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class=form-group>
                                                                    <label for=Country>Country</label>
                                                                    <select
                                                                        class="form-control-dropdown select2" id="Country" name="Country" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class=form-group>
                                                                    <label for=State>State</label>
                                                                    <select class="form-control-dropdown select2" id="State" name="State" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class=form-group>
                                                                    <label for=PinCode>Pin Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="PinCode" name="PinCode" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Shipping Details-->
                                            <div class="col-12">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Shipping Address</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class=form-group>
                                                                    <label for=DispatchShortName>Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="DispatchShortName" name="DispatchShortName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class=form-group>
                                                                    <label for=DAddress1> Address Line 1</label>
                                                                    <textarea class="form-control form-control-sm" id="DAddress1" name="DAddress1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-4>
                                                                <div class=form-group>
                                                                    <label for=DAddress2> Address Line 2</label>
                                                                    <textarea class="form-control form-control-sm" id="DAddress2" name="DAddress2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-3>
                                                                <div class=form-group>
                                                                    <label for=DCountry>Country</label>
                                                                    <select class="form-control-dropdown select2" id="DCountry" name="DCountry" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-3>
                                                                <div class=form-group>
                                                                    <label for=DState>State</label>
                                                                    <select class="form-control-dropdown select2" id="DState" name="DState" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-3>
                                                                <div class=form-group>
                                                                    <label for=DPlantName>Plant Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="DPlantName" name="DPlantName" required>
                                                                </div>
                                                            </div>

                                                            <div class=col-md-3>
                                                                <div class=form-group>
                                                                    <label for=DPlantCode>Plant Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="DPlantCode" name="DPlantCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 float-right" style="text-align: end; ">
                                                                <button type="submit" class="btn btn-primary">Add Shipping Details</button>
                                                            </div>
                                                        </div>

                                                        <!--Shipping details will be added as a card-->
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card card-success">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria, West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6  d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6  d-flex flex-row" style="font-size:14px;color:#000">Plant Name</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">TATA</div>
                                                                        </div> 
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Plant Code</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">11008</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="{{ URL::asset('./assets/img/delete.png') }}" style="height: 20px; text-align: center;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="card card-success">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>

                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6  d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6  d-flex flex-row" style="font-size:14px;color:#000">Plant Name</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">TATA</div>
                                                                        </div> 
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div
                                                                            class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Plant Code</div>
                                                                            <div class="col-lg-6" style="font-size: 10px; color: #808080;">11008</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="{{ URL::asset('./assets/img/delete.png') }}" style="height: 20px; text-align: center;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between ModalFooterBorder">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                            <button class="btn btn-primary" onclick=addSellerEntry() type="button">Add Seller</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Bootstrap JS (Popper.js and Bootstrap) -->
                {{-- <script src=https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js></script>
                <script src=https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js></script> --}}
                <script>
                    // Function to add a new Seller entry
                    function addSellerEntry() {
                        console.log("addSellerEntry called");
                        // Get form values
                        const SellerName = document.getElementById("SellerName").value.trim();
                        console.log("SellerName:", SellerName);
                        const ShortName = document.getElementById("ShortName").value.trim();
                        console.log("ShortName:", ShortName);
                        const ContactName = document.getElementById("ContactName").value.trim();
                        console.log("ContactName:", ContactName);
                        const ContactEmail = document.getElementById("ContactEmail").value.trim();
                        console.log("ContactEmail:", ContactEmail);
                        const MobileNo = document.getElementById("MobileNo").value.trim();
                        console.log("MobileNo:", MobileNo);
                        const Address1 = document.getElementById("Address1").value.trim();
                        console.log("Address1:", Address1);
                        const Address2 = document.getElementById("Address2").value.trim();
                        console.log("Address2:", Address2);
                        const Country = document.getElementById("Country").value.trim();
                        console.log("Country:", Country);
                        const State = document.getElementById("State").value.trim();
                        console.log("State:", State);
                        const PinCode = document.getElementById("PinCode").value.trim();
                        console.log("PinCode:", PinCode);
                        const DispatchShortName = document.getElementById("DispatchShortName").value.trim();
                        console.log("DispatchShortName:", DispatchShortName);
                        const DAddress1 = document.getElementById("DAddress1").value.trim();
                        console.log("DAddress1:", DAddress1);
                        const DAddress2 = document.getElementById("DAddress2").value.trim();
                        console.log("DAddress2:", DAddress2);
                        const DCountry = document.getElementById("DCountry").value.trim();
                        console.log("DCountry:", DCountry);
                        const DState = document.getElementById("DState").value.trim();
                        console.log("DState:", DState);
                        const DPlantName = document.getElementById("DPlantName").value.trim();
                        console.log("DPlantName:", DPlantName);
                        const DPlantCode = document.getElementById("DPlantCode").value.trim();
                        console.log("DPlantCode:", DPlantCode);

                        // Check if any of the required fields are empty
                        if (!SellerName || !ShortName || !ContactName || !ContactEmail || !MobileNo || !Address1
                        || !Address2 || !Country || !State || !PinCode || !DispatchShortName
                        || !DAddress1 || !DAddress2 || !DCountry || !DState || !DPlantName || !DPlantCode) {
                            alert("Please fill in all the required fields.");
                            return;
                        }
                        // Create a table row with the entered data
                        const tableRow = document.createElement("tr");
                        tableRow.innerHTML = `
                                                <td>${SellerName}</td>
                                                <td>${ShortName}</td>
                                                <td>${ContactName}</td>
                                                <td>${ContactEmail}</td>
                                                <td>${MobileNo}</td>
                                                <td>${Address1}</td>
                                                <td>${Address2}</td>
                                                <td>${Country}</td>
                                                <td>${State}</td>
                                                <td>${PinCode}</td>
                                                <td>${DispatchShortName}</td>
                                                <td>${DAddress1}</td>
                                                <td>${DAddress2}</td>
                                                <td>${DCountry}</td>
                                                <td>${DState}</td>
                                                <td>${DPlantName}</td>
                                                <td>${DPlantCode}</td>
                        `;
                        
                        // Append the row to the table
                        document.getElementById("SellerTableBody").appendChild(tableRow);

                        // Close the modal
                        $('#addSellerModal').modal('hide');

                        // Clear the form fields
                        document.getElementById("SellerForm").reset();
                        // Save the Seller entry to Local Storage
                        saveSellerEntryToLocalStorage(SellerName, ShortName, ContactName, ContactEmail, MobileNo, Address1, Address2
                        ,Country, ShortName, State, PinCode, GSTINNo, DispatchShortName, DAddress1,DAddress2, 
                        DState, DPlantName, DPlantCode);
                    }

                    // Function to save Seller entry to Local Storage
                    function saveSellerEntryToLocalStorage(SellerName, ShortName, ContactName, ContactEmail, MobileNo, Address1, Address2
                        ,Country, ShortName, State, PinCode, GSTINNo, DispatchShortName, DAddress1,DAddress2, 
                        DState, DPlantName, DPlantCode) {
                        // Get existing entries from Local Storage or initialize an empty array
                        let SellerEntries = JSON.parse(localStorage.getItem("SellerEntries")) || [];

                        // Add the new entry to the array
                        SellerEntries.push({
                                            SellerName
                                            , ShortName
                                            , ContactName
                                            , ContactEmail
                                            , MobileNo
                                            , Address1
                                            , Address2
                                            , Country
                                            , State
                                            , PinCode
                                            , DispatchShortName
                                            , DAddress1
                                            , DAddress2
                                            , DCountry
                                            , DState
                                            , DPlantName
                                            , DPlantCode
                        });

                        // Save the updated array back to Local Storage
                        localStorage.setItem("SellerEntries", JSON.stringify(SellerEntries));
                    }

                    // Function to load Seller entries from Local Storage
                    function loadSellerEntriesFromLocalStorage() {
                        const SellerEntries = JSON.parse(localStorage.getItem("SellerEntries")) || [];

                        // Loop through the entries and add them to the table
                        SellerEntries.forEach(entry => {
                            const tableRow = document.createElement("tr");
                            // Create a unique ID for each checkbox based on the Seller name
                            const checkboxId = `checkbox-${entry.SellerName.replace(/ /g, "_")}`;

                            tableRow.innerHTML = `
                                    <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                    <td>${SellerName}</td>
                                    <td>${ShortName}</td>
                                    <td>${ContactName}</td>
                                    <td>${ContactEmail}</td>
                                    <td>${MobileNo}</td>
                                    <td>${Address1}</td>
                                    <td>${Address2}</td>
                                    <td>${Country}</td>
                                    <td>${State}</td>
                                    <td>${PinCode}</td>
                                    <td>${DispatchShortName}</td>
                                    <td>${DAddress1}</td>
                                    <td>${DAddress2}</td>
                                    <td>${DCountry}</td>
                                    <td>${DState}</td>
                                    <td>${DPlantName}</td>
                                    <td>${DPlantCode}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSellerModal" onclick="editSellerEntry(this.parentNode.parentNode)">Edit</button>

                                    <button class="btn btn-sm btn-danger" onclick="deleteSellerEntry(this)">Delete</button>
                                </td>
                            `;
                            document.getElementById("SellerTableBody").appendChild(tableRow);
                        });
                    }

                    // Function to handle checkbox change
                    function handleCheckboxChange(checkbox) {
                        if (checkbox.checked) {
                            // Get the unique ID of the checked checkbox
                            const checkboxId = checkbox.id;
                            console.log(`Selected checkbox with ID: ${checkboxId}`);
                        }
                    }

                    // Load Rack entries from Local Storage when the page loads
                    loadSellerEntriesFromLocalStorage();
                    function editSellerEntry(row) {
                        // Extract the rack ID from the row
                        const SellerName = row.cells[0].textContent;

                        // Find the corresponding rack entry in Local Storage or your data source
                        const SellerEntries = JSON.parse(localStorage.getItem("SellerEntries")) || [];
                        const SellerRoEdit = SellerEntries.find(entry => entry.SellerName === SellerName);

                        // Check if a matching rack entry was found
                        if (SellerRoEdit) {
                            // Pre-fill the edit modal form fields with the data
                            document.getElementById("editSellerName").value = SellerRoEdit.SellerName;
                            document.getElementById("editShortName").value = SellerRoEdit.ShortName;
                            document.getElementById("editContactEmail").value = SellerRoEdit.ContactEmail;
                            document.getElementById("editMobileNo").value = SellerRoEdit.MobileNo;
                            document.getElementById("editAddress1").value = SellerRoEdit.Address1;
                            document.getElementById("editAddress2").value = SellerRoEdit.Address2;
                            document.getElementById("editCountry").value = SellerRoEdit.Country;
                            document.getElementById("editState").value = SellerRoEdit.State;
                            document.getElementById("editPinCode").value = SellerRoEdit.PinCode;
                            document.getElementById("editDispatchShortName").value = SellerRoEdit.DispatchShortName;
                            document.getElementById("editDAddress1").value = SellerRoEdit.DAddress1;
                            document.getElementById("editDAddress2").value = SellerRoEdit.DAddress2;
                            document.getElementById("editDCountry").value = SellerRoEdit.DCountry;
                            document.getElementById("editDState").value = SellerRoEdit.DState;
                            document.getElementById("editDPlantName").value = SellerRoEdit.DPlantName;
                            document.getElementById("editDPlantCode").value = SellerRoEdit.DPlantCode;
                            // Show the edit modal
                            $('#editSellerModal').modal('show');
                        } else {
                            alert("Seller entry not found for editing.");
                        }
                    }

                    function updateSellerEntry() {
                        // Get form values from the edit modal
                        const editSellerName = document.getElementById("editSellerName").value;
                        const editShortName = document.getElementById("editShortName").value;
                        const editContactName = document.getElementById("editContactName").value;
                        const editContactEmail = document.getElementById("editContactEmail").value;
                        const editMobileNo = document.getElementById("editMobileNo").value;
                        const editAddress1 = document.getElementById("editAddress1").value;
                        const editAddress2 = document.getElementById("editAddress2").value;
                        const editCountry = document.getElementById("editCountry").value;
                        const editState = document.getElementById("editState").value;
                        const editPinCode = document.getElementById("editPinCode").value;
                        const editDispatchShortName = document.getElementById("editDispatchShortName").value;
                        const editDAddress1 = document.getElementById("editDAddress1").value;
                        const editDAddress2 = document.getElementById("editDAddress2").value;
                        const editDCountry = document.getElementById("editDCountry").value;
                        const editDState = document.getElementById("editDState").value;
                        const editDPlantName = document.getElementById("editDPlantName").value;
                        const editDPlantCode = document.getElementById("editDPlantCode").value;
                        // Find the row in the table with the matching Seller
                        const table = document.getElementById("SellerTableBody");
                        for (let i = 0; i < table.rows.length; i++) {
                            if (table.rows[i].cells[0].textContent === editSellerName) {
                                // Update all cells in the row with the new data
                                table.rows[i].cells[1].textContent = editSellerName;
                                table.rows[i].cells[2].textContent = editShortName;
                                table.rows[i].cells[2].textContent = editContactName;
                                table.rows[i].cells[3].textContent = editContactEmail;
                                table.rows[i].cells[4].textContent = editMobileNo;
                                table.rows[i].cells[1].textContent = editAddress1;
                                table.rows[i].cells[2].textContent = editAddress2;
                                table.rows[i].cells[2].textContent = editCountry;
                                table.rows[i].cells[3].textContent = editState;
                                table.rows[i].cells[4].textContent = editPinCode;
                                table.rows[i].cells[1].textContent = editDispatchShortName;
                                table.rows[i].cells[2].textContent = editDAddress1;
                                table.rows[i].cells[2].textContent = editDAddress2;
                                table.rows[i].cells[3].textContent = editDCountry;
                                table.rows[i].cells[4].textContent = editDState;
                                table.rows[i].cells[3].textContent = editDPlantName;
                                table.rows[i].cells[4].textContent = editDPlantCode;
                                // Update Local Storage by finding and updating the corresponding entry
                                const SellerEntries = JSON.parse(localStorage.getItem("SellerEntries")) || [];
                                for (let j = 0; j < SellerEntries.length; j++) {
                                    if (SellerEntries[j].SellerName === editSellerName) {
                                        SellerEntries[j].ShortName = editShortName;
                                        SellerEntries[j].Address1 = editContactName;
                                        SellerEntries[j].Address1 = editContactEmail;
                                        SellerEntries[j].GSTINNo = editMobileNo;
                                        SellerEntries[j].Country = editAddress1;
                                        SellerEntries[j].ShortName = editAddress2;
                                        SellerEntries[j].Address1 = editCountry;
                                        SellerEntries[j].Address1 = editState;
                                        SellerEntries[j].GSTINNo = editPinCode;
                                        SellerEntries[j].Country = editDispatchShortName;
                                        SellerEntries[j].Address1 = editDAddress1;
                                        SellerEntries[j].Address1 = editDAddress2;
                                        SellerEntries[j].GSTINNo = editDCountry;
                                        SellerEntries[j].Country = editDState;
                                        SellerEntries[j].GSTINNo = editDPlantName;
                                        SellerEntries[j].Country = editDPlantCode;
                                        break; // Exit the loop once updated
                                    }
                                }

                                localStorage.setItem("SellerEntries", JSON.stringify(SellerEntries));

                                // Close the edit modal
                                $('#editSellerModal').modal('hide');

                                // Clear the form fields in the edit modal
                                document.getElementById("editSellerName").value = "";
                                document.getElementById("editShortName").value = "";
                                document.getElementById("editContactEmail").value = "";
                                document.getElementById("editMobileNo").value = "";
                                document.getElementById("editAddress1").value = "";
                                document.getElementById("editAddress2").value = "";
                                document.getElementById("editCountry").value = "";
                                document.getElementById("editState").value = "";
                                document.getElementById("editPinCode").value = "";
                                document.getElementById("editDispatchShortName").value = "";
                                document.getElementById("editDAddress1").value = "";
                                document.getElementById("editDAddress2").value = "";
                                document.getElementById("editDCountry").value = "";
                                document.getElementById("editDState").value = "";
                                document.getElementById("editDPlantName").value = "";
                                document.getElementById("editDPlantCode").value = "";
                                break;
                            }
                        }
                    }

                    function deleteSellerEntry(buttonElement) {
                        // Get the row containing the button
                        const row = buttonElement.parentNode.parentNode;

                        // Confirm the deletion with a confirmation dialog
                        const confirmation = confirm("Are you sure you want to delete this Seller entry?");
                        if (confirmation) {
                            // Remove the row from the table
                            row.remove();

                            // Update Local Storage by removing the deleted entry
                            const SellerNameToDelete = row.querySelector("td:first-child").textContent; // Get the Seller ID from the first cell
                            const SellerEntries = JSON.parse(localStorage.getItem("SellerEntries")) || [];
                            const updatedSellerEntries = SellerEntries.filter(entry => entry.SellerName !== SellerNameToDelete);
                            localStorage.setItem("SellerEntries", JSON.stringify(updatedSellerEntries));
                        }
                    }

                    $(function () {
                        $("#example1").DataTable({
                            "responsive": true, "lengthChange": false, "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                        $('#example2').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });


                </script>

                <!-- Bootstrap Modal for editing Seller entries -->
                <div aria-hidden=true aria-labelledby=editSellerModalLabel class="fade modal" id=editSellerModal tabindex=-1>
                    <div class="modal-dialog modal-lg">
                        <form id="BuyerForm" action="" enctype="multipart/form-data">
                            <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                    <h5 class="modal-title" id="editSellerModalLabel">Edit Seller</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                </div>

                                <div class=modal-body>
                                    <div class="col-12">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Basic Details</h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editSellerName">Seller Name</label>
                                                            <input class="form-control form-control-sm" id="editSellerName" name="editSellerName" type="text" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editShortName">Short Name</label>
                                                            <input class="form-control form-control-sm" type="text" id="editShortName" name="editShortName" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Contact Details</h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editContactName">Contact Person Name</label>
                                                            <input class="form-control form-control-sm" type="text" id="editContactName" name="editContactName" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editContactEmail">Contact Person email ID</label>
                                                            <input class="form-control form-control-sm" id="editContactEmail" name="editContactEmail" required type="email">
                                                        </div>
                                                    </div>

                                                    <div class=col-md-6>
                                                        <div class=form-group>
                                                            <label for=editMobileNo>Contact Person Mobile
                                                                No</label>
                                                            <input class="form-control form-control-sm"
                                                                type="number" id="editMobileNo" name="editMobileNo" required>
                                                        </div>
                                                    </div>
                                                    <div class=col-md-6>
                                                        <div class=form-group>
                                                            <label for=editPlantCode>Plant Code</label>
                                                            <select class="form-control-dropdown select2" id="editPlantCode" name="editPlantCode" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card card-success">
                                            <div class="card-header">
                                                <h3 class="card-title">Billing Details</h3>
                                            </div>

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editAddress1"> Address Line 1</label>
                                                            <textarea class="form-control form-control-sm" id="editAddress1" name="editAddress1" type="text" rows="2" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editAddress2"> Address Line 2</label>
                                                            <textarea class="form-control form-control-sm" id="editAddress2" name="editAddress2" type="text" rows="2" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editCountry">Country</label>
                                                            <select class="form-control-dropdown select2" id="editCountry" name="editCountry" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editState">State</label>
                                                            <select class="form-control-dropdown select2" id="editState" name="editState" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editPinCode">Pin Code</label>
                                                            <input class="form-control form-control-sm" type="number" id="editPinCode" name="editPinCode" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Shipping Address</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row mb-4">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editDispatchShortName">Short Name</label>
                                                            <input class="form-control form-control-sm" type="text" id="editDispatchShortName" name="editDispatchShortName" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editDAddress1"> Address Line 1</label>
                                                            <textarea class="form-control form-control-sm" id="editDAddress1" name="editDAddress1" type="text" rows="2" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editDAddress2"> Address Line 2</label>
                                                            <textarea class="form-control form-control-sm" id="editDAddress2" name="editDAddress2" type="text" rows="2" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="editDCountry">Country</label>
                                                            <select class="form-control-dropdown select2" id="editDCountry" name="editDCountry" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="editDState">State</label>
                                                            <select class="form-control-dropdown select2"
                                                                id="editDState" name="editDState" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="editDPlantName">Plant Name</label>
                                                            <input class="form-control form-control-sm" type="text" id="editDPlantName" name="editDPlantName" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="editDPlantCode">Plant Code</label>
                                                            <input class="form-control form-control-sm" type="number" id="editDPlantCode" name="editDPlantCode" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 float-right" style="text-align: end; ">
                                                        <button type="submit" class="btn btn-primary">Add Shipping Address</button>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="card card-success">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                </div><br />

                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                </div><br />

                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Plant Name</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">TATA</div>
                                                                </div><br />

                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row d-justify-content-between">
                                                                    <div class="col-lg-4" style="font-size:14px;color:#000">Plant Code</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">11008</div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer" style="text-align: center;">
                                                                <img alt="Del" src="{{ URL::asset('./assets/img/delete.png') }}" style="height: 20px; text-align: center;">
                                                                {{-- <img alt="Del" src="{{ URL::to('/') }}/assets/img/delete.png" style="height: 20px; text-align: center;"> --}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="card card-success">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                </div><br />
                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                </div><br />
                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row">
                                                                    <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Plant Name</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">TATA</div>
                                                                </div><br />
                                                                <div style="border-bottom: 1px solid #9d9e9f;"></div><br />

                                                                <div class="row d-justify-content-between">
                                                                    <div class="col-lg-4" style="font-size:14px;color:#000">Plant Code</div>
                                                                    <div class="col-lg-8" style="font-size: 10px; color: #808080;">11008</div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer" style="text-align: center;">
                                                                <img alt="" src="{{ URL::asset('assets/img/delete.png') }}" style="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                <button class="btn btn-primary" onclick=updateSellerEntry() type="button">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection