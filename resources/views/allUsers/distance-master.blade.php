@extends('allUsers.layout.default')

@section('content')
<div class=content>
    <div class=container-fluid>
        <div class=row>
            <div class="col-lg-12">
                <div class="card card-outline mt-2">
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h1 class="m-0">{{$page_title}}</h1>
                                </div>

                                <div class="col-md-4 align-self-center">
                                    <div class="input-group">
                                        <input class="form-control form-control-sm" id="searchInput" placeholder="Search..." type="text">
                                        <div class=input-group-append>
                                            <button class="btn btn-sm SearchButton" id="searchButton" type="button" style="color: black;"><i class="fas fa-search"></i>&nbsp;Search</button>
                                        </div>
                                
                                        <div class="float-right" data-bs-target=#addSellerModal data-bs-toggle=modal style="cursor: pointer;">
                                            <i class="fa fa-plus-square" aria-hidden="true" style="color: #FFD580; font-size: 27px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Display added Agency entries in a table -->
                    <div class="card-body">
                        <div class="table-responsive table-responsive-sm">
                            <table class="table table-bordered table-striped table-sm table-hover" id="example1">
                                <thead class="TableHeadTheme">
                                    <tr>
                                        <th style="width: 100px;">Actions</th>
                                        <th>Buyer Shipping Address</th>
                                        <th>Seller Dispatch Address Short Name</th>
                                        <th>Plant Code</th>
                                        <th>Distance in KM</th>                                            
                                    </tr>
                                </thead>
                                <tbody id="agentTableBody">
                                    <tr>
                                        <td style="text-align: center; width: 100px;">
                                            <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i></a>                                            
                                            <span>|</span>
                                            <a href=""><img src="{{asset('assets/img/Delete.png')}}" style="height: 1.25em; width:auto; " alt="Delete"></a>                                                
                                        </td>
                                        <td>Newtown, Kolkata, Chakpachuria, West Bengal 700156,India</td>
                                        <td>Firefox</td>
                                        <td>98563258</td>
                                        <td>19km</td> 
                                    </tr>

                                    <tr>
                                        <td style="text-align: center; width: 100px;">
                                            <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i></a>                                            
                                            <span>|</span>
                                            <a href=""><img src="{{asset('assets/img/Delete.png')}}" style="height: 1.25em; width:auto; " alt="Delete"></a>                                                 
                                        </td>
                                        <td>Rajarhat, Kolkata, Chakpachuria, West Bengal 700156,India</td>
                                        <td>Crome</td>
                                        <td>7854521</td>
                                        <td>85km</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Bootstrap Modal for adding Distance Charter entries -->
                    <div aria-hidden="true" aria-labelledby="addDistanceModalLabel" class="modal fade" id="addDistanceModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form id="DistanceForm">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id="addDistanceModalLabel">Add Distance Charter</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="BuyerShippingAddress">Buyer Shipping Address</label>
                                                    <textarea class="form-control form-control-sm" id="BuyerShippingAddress" name="BuyerShippingAddress" type="text" rows="2" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="SellerDispatchAddressShortName">Seller Dispatch Address Short Name</label>
                                                    <input class="form-control form-control-sm" id="SellerDispatchAddressShortName" name="SellerDispatchAddressShortName" type="number" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="PlantCode">Plant Code</label>
                                                    <input class="form-control form-control-sm" id="PlantCode" name="PlantCode" type="number" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="DistanceinKM">Distance in KM</label>
                                                    <input class="form-control form-control-sm" id="DistanceinKM" name="DistanceinKM" type="number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between ModalFooterBorder">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                        <button class="btn btn-primary" onclick="addDistanceEntry()" type="button">Add Distance Charter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Bootstrap Modal for editing Distance Charterentries -->
                    <div aria-hidden="true" aria-labelledby="editDistanceModalLabel" class="fade modal" id="editDistanceModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form>
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id="editDistanceModalLabel">Edit Distance Charter</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="editBuyerShippingAddress">Buyer Shipping Address</label>
                                                    <textarea class="form-control form-control-sm" id="editBuyerShippingAddress" name="editBuyerShippingAddress" type="text" rows="2" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="editSellerDispatchAddressShortName">Seller Dispatch Address Short Name</label>
                                                    <input class="form-control form-control-sm" id="editSellerDispatchAddressShortName" name="editSellerDispatchAddressShortName" type="text">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="editPlantCode">Plant Code</label>
                                                    <input class="form-control form-control-sm" id="editPlantCode" name="editPlantCode" type="number">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="editDistanceinKM">Distance in KM</label>
                                                    <input class="form-control form-control-sm" id="editDistanceinKM" name="editDistanceinKM" type="number">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                        <button class="btn btn-primary" onclick="updateDistanceEntry()" type="button">Save Changes</button>
                                    </div>
                                </div>
                            </form>
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
    $(document).ready(function(){});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const DistanceTableBody = document.getElementById("DistanceTableBody");
        const noEntryFound = document.getElementById("noEntryFound");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            // Loop through the rows in the Distance Chartertable
            let entryFound = false; // Flag to track if a matching entry is found

            for (let i = 0; i < DistanceTableBody.rows.length; i++) {
                const row = DistanceTableBody.rows[i];
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

    // Function to add a new Distance Charterentry
    function addDistanceEntry() {
        console.log("addDistanceEntry called");
        // Get form values
        const BuyerShippingAddress = document.getElementById("BuyerShippingAddress").value.trim();
        console.log("BuyerShippingAddress:", BuyerShippingAddress);
        const SellerDispatchAddressShortName = document.getElementById("SellerDispatchAddressShortName").value.trim();
        console.log("SellerDispatchAddressShortName:", SellerDispatchAddressShortName);
        const PlantCode = document.getElementById("PlantCode").value.trim();
        console.log("PlantCode:", PlantCode);
        const DistanceinKM = document.getElementById("DistanceinKM").value.trim();
        console.log("DistanceinKM:", DistanceinKM);

        // Check if any of the required fields are empty
        if (!BuyerShippingAddress || !SellerDispatchAddressShortName || !PlantCode || !DistanceinKM) {
            alert("Please fill in all the required fields.");
            return;
        }

        // Create a table row with the entered data
        const tableRow = document.createElement("tr");
        tableRow.innerHTML = `

                            <td>${BuyerShippingAddress}</td>
                            <td>${SellerDispatchAddressShortName}</td>
                            <td>${PlantCode}</td>
                            <td>${DistanceinKM}</td>
        `;

        // Append the row to the table
        document.getElementById("DistanceTableBody").appendChild(tableRow);

        // Close the modal
        $('#addDistanceModal').modal('hide');

        // Clear the form fields
        document.getElementById("DistanceForm").reset();
        // Save the Distance Charterentry to Local Storage
        saveDistanceEntryToLocalStorage(BuyerShippingAddress, SellerDispatchAddressShortName, PlantCode, DistanceinKM);
    }

    // Function to save Distance Charterentry to Local Storage
    function saveDistanceEntryToLocalStorage(BuyerShippingAddress, SellerDispatchAddressShortName, PlantCode, DistanceinKM) {
        // Get existing entries from Local Storage or initialize an empty array
        let DistanceEntries = JSON.parse(localStorage.getItem("DistanceEntries")) || [];

        // Add the new entry to the array
        DistanceEntries.push({
            BuyerShippingAddress,
            SellerDispatchAddressShortName,
            PlantCode,
            DistanceinKM
        });

        // Save the updated array back to Local Storage
        localStorage.setItem("DistanceEntries", JSON.stringify(DistanceEntries));
    }

    // Function to load Distance Charterentries from Local Storage
    function loadDistanceEntriesFromLocalStorage() {
        const DistanceEntries = JSON.parse(localStorage.getItem("DistanceEntries")) || [];

        // Loop through the entries and add them to the table
        DistanceEntries.forEach(entry => {
            const tableRow = document.createElement("tr");
            // Create a unique ID for each checkbox based on the Distance Chartername
            const checkboxId = `checkbox-${entry.BuyerShippingAddress.replace(/ /g, "_")}`;

            tableRow.innerHTML = `
                                    <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                    <td>${entry.BuyerShippingAddress}</td>
                                    <td>${entry.SellerDispatchAddressShortName}</td>
                                    <td>${entry.PlantCode}</td>
                                    <td>${entry.DistanceinKM}</td>
                                    <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editDistanceModal" onclick="editDistanceEntry(this.parentNode.parentNode)">Edit</button>
                                        <button class="btn btn-sm btn-danger" onclick="deleteDistanceEntry(this)">Delete</button>
                                    </td>
            `;
            document.getElementById("DistanceTableBody").appendChild(tableRow);
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

    // Load Distance Charterentries from Local Storage when the page loads
    loadDistanceEntriesFromLocalStorage();

    function editDistanceEntry(row) {

        // Extract the Distance CharterID from the row
        const BuyerShippingAddress = row.cells[0].textContent;

        // Find the corresponding Distance Charterentry in Local Storage or your data source
        const DistanceEntries = JSON.parse(localStorage.getItem("DistanceEntries")) || [];
        const DistanceRoEdit = DistanceEntries.find(entry => entry.BuyerShippingAddress === BuyerShippingAddress);

        // Check if a matching Distance Charterentry was found
        if (DistanceRoEdit) {
            // Pre-fill the edit modal form fields with the data
            document.getElementById("editBuyerShippingAddress").value = DistanceRoEdit.BuyerShippingAddress;
            document.getElementById("editSellerDispatchAddressShortName").value = DistanceRoEdit.SellerDispatchAddressShortName;
            document.getElementById("editPlantCode").value = DistanceRoEdit.PlantCode;
            document.getElementById("editDistanceinKM").value = DistanceRoEdit.DistanceinKM;
            // Show the edit modal
            $('#editDistanceModal').modal('show');
        } else {
            alert("Distance Charterentry not found for editing.");
        }
    }

    function updateDistanceEntry() {
        // Get form values from the edit modal
        const editBuyerShippingAddress = document.getElementById("editBuyerShippingAddress").value;
        const editSellerDispatchAddressShortName = document.getElementById("editSellerDispatchAddressShortName").value;
        const editPlantCode = document.getElementById("editPlantCode").value;
        // Find the row in the table with the matching Distance
        const table = document.getElementById("DistanceTableBody");
        for (let i = 0; i < table.rows.length; i++) {
            if (table.rows[i].cells[0].textContent === editBuyerShippingAddress) {
                // Update all cells in the row with the new data
                table.rows[i].cells[1].textContent = editSellerDispatchAddressShortName;
                table.rows[i].cells[2].textContent = editPlantCode;
                // Update Local Storage by finding and updating the corresponding entry
                const DistanceEntries = JSON.parse(localStorage.getItem("DistanceEntries")) || [];
                for (let j = 0; j < DistanceEntries.length; j++) {
                    if (DistanceEntries[j].BuyerShippingAddress === editBuyerShippingAddress) {
                        DistanceEntries[j].SellerDispatchAddressShortName = editSellerDispatchAddressShortName;
                        DistanceEntries[j].PlantCode = editPlantCode;
                        DistanceEntries[j].DistanceinKM = editDistanceinKM;
                        break; // Exit the loop once updated
                    }
                }

                localStorage.setItem("DistanceEntries", JSON.stringify(DistanceEntries));

                // Close the edit modal
                $('#editDistanceModal').modal('hide');

                // Clear the form fields in the edit modal
                document.getElementById("editBuyerShippingAddress").value = "";
                document.getElementById("editSellerDispatchAddressShortName").value = "";
                document.getElementById("editPlantCode").value = "";
                document.getElementById("editDistanceinKM").value = "";
                break;
            }
        }
    }

    function deleteDistanceEntry(buttonElement) {
        // Get the row containing the button
        const row = buttonElement.parentNode.parentNode;

        // Confirm the deletion with a confirmation dialog
        const confirmation = confirm("Are you sure you want to delete this Distance Charter entry?");
        if (confirmation) {
            // Remove the row from the table
            row.remove();

            // Update Local Storage by removing the deleted entry
            const BuyerShippingAddressToDelete = row.querySelector("td:first-child").textContent; // Get the Distance CharterID from the first cell
            const DistanceEntries = JSON.parse(localStorage.getItem("DistanceEntries")) || [];
            const updatedDistanceEntries = DistanceEntries.filter(entry => entry.BuyerShippingAddress !== BuyerShippingAddressToDelete);
            localStorage.setItem("DistanceEntries", JSON.stringify(updatedDistanceEntries));
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
@endsection
