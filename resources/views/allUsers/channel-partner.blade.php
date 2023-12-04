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
                                    <div class="col-md-8">
                                        <h1 class="m-0">{{$page_title}}</h1>
                                    </div>

                                    <div class="col-md-4 align-self-center">
                                        <div class="input-group">
                                            <input class="form-control form-control-sm" id="searchInput" placeholder="Search..." type="text">
                                            <div class=input-group-append>
                                                <button class="btn btn-sm SearchButton" id="searchButton" type="button" style="color: black;"><i class="fas fa-search"></i>&nbsp;Search</button>
                                            </div>
                                    
                                            <div class="float-right" data-bs-target=#addAgentModal data-bs-toggle=modal style="cursor: pointer;">
                                                <i class="fa fa-plus-square" aria-hidden="true" style="color: #FFD580; font-size: 27px;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Display added Agency entries in a table -->
                            <div class="card-body">
                                <div class="table-responsive table-responsive-sm">
                                    <table class="table table-bordered table-striped table-sm table-hover" id="example1">
                                        <thead class="TableHeadTheme">
                                            <tr>
                                                <th style="width: 100px;">Actions</th>
                                                <th>Agency Name</th>
                                                <th>GST Type</th>
                                                <th>PAN No</th>
                                                <th>GSTIN No</th>
                                                <th>KGSL Code</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody id="agentTableBody">
                                            <tr>
                                                <td style="text-align: center; width: 100px;">
                                                    <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i></a>                                            
                                                    <span>|</span>
                                                    <a href=""><img src="{{asset('assets/img/Delete.png')}}" style="height: 1.25em; width:auto; " alt="Delete"></a>                                                 
                                                </td>                                                
                                                <td>Gecko</td>
                                                <td>Firefox 2.0</td>
                                                <td>ABCDE1234I6UU</td>
                                                <td>11008</td>
                                                <td>8</td>
                                            </tr>

                                            <tr>
                                                <td style="text-align: center; width: 100px;">
                                                    <a href=""><i class="fa fa-pencil-square-o" aria-hidden="true" style="color: black"></i></a>                                            
                                                    <span>|</span>
                                                    <a href=""><img src="{{asset('assets/img/Delete.png')}}" style="height: 1.25em; width:auto; " alt="Delete"></a>                                                 
                                                </td>                                                
                                                <td>Deep</td>
                                                <td>Google 2.0</td>
                                                <td>DE1234I6UU</td>
                                                <td>33008</td>
                                                <td>205</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for adding Agency entries -->
                        <div aria-hidden="true" aria-labelledby="addAgentModalLabel" class="modal fade" id="addAgentModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addAgentModalLabel">Add Agency</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="AgentForm">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="AgentName">Agency Name</label>
                                                        <input class="form-control form-control-sm" id="AgentName" name="AgentName" type="text" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="GSTType">GST Type</label>
                                                        <select class="form-control-dropdown select2" id="GSTType"
                                                            name="GSTType" required>
                                                            <option>Registered</option>
                                                            <option>Unregistered</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="PANNo">PAN No</label>
                                                        <input class="form-control form-control-sm" id="PANNo"
                                                            name="PANNo" type="text" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class=col-md-6>
                                                    <div class="form-group">
                                                        <label for="GSTINNo">GSTIN No</label>
                                                        <input class="form-control form-control-sm" id="GSTINNo" name="GSTINNo" type="text">
                                                    </div>
                                                </div>

                                                <div class=col-md-6>
                                                    <div class="form-group">
                                                        <label for="KGSLCode">KGSL Code</label>
                                                        <input class="form-control form-control-sm" id="KGSLCode" name="KGSLCode" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                                

                                            <div class="row">    
                                                <div class="col">
                                                    <div class="form-group">
                                                        <input type="checkbox" id="Active" name="Active">
                                                        <label for="Active">Active</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer justify-content-between ModalFooterBorder">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                                <button class="btn modalBtnAdd" onclick="addAgencyEntry()" type="button">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for editing Agency entries -->
                        <div aria-hidden="true" aria-labelledby="editAgencyModalLabel" class="fade modal" id="editAgencyModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id="editAgencyModalLabel">Edit Agency</h5>
                                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <form>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editAgentName">Agency Name</label>
                                                            <input class="form-control form-control-sm" id="editAgentName" name="editAgentName" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editGSTType">GST Type</label>
                                                            <select class="form-control-dropdown select2" id="editGSTType" name="editGSTType" required>
                                                                <option>Registered</option>
                                                                <option>Unregistered</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="editPANNo">PAN No</label>
                                                            <input class="form-control form-control-sm" id="editPANNo" name="editPANNo" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="editGSTINNo">GSTINNo</label>
                                                            <input class="form-control form-control-sm"
                                                                id="editGSTINNo" name="editGSTINNo" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="editKGSLCode">KGSLCode</label>
                                                            <input class="form-control form-control-sm"
                                                                id="editKGSLCode" name="editKGSLCode" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="editActive">Active</label>
                                                            <input class="form-control form-control-sm"
                                                                id="editActive" name="editActive" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                            <button class="btn btn-primary" onclick="updateAgencyEntry()" type="button">Save Changes</button>
                                        </div>
                                    </form>
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
        $(document).ready(function(){
            document.addEventListener("DOMContentLoaded", function () {
                const searchInput = document.getElementById("searchInput");
                const agentTableBody = document.getElementById("agentTableBody");
                const noEntryFound = document.getElementById("noEntryFound");

                searchInput.addEventListener("input", function () {
                    const searchTerm = searchInput.value.trim().toLowerCase();

                    // Loop through the rows in the Agency table
                    let entryFound = false; // Flag to track if a matching entry is found

                    for (let i = 0; i < agentTableBody.rows.length; i++) {
                        const row = agentTableBody.rows[i];
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
        });
    </script>

    <script>
        // Function to add a new Book entry
        function addAgencyEntry() {
            console.log("addAgencyEntry called");
            // Get form values
            const AgentName = document.getElementById("AgentName").value.trim();
            console.log("AgentName:", AgentName);
            const GSTType = document.getElementById("GSTType").value.trim();
            console.log("GSTType:", GSTType);
            const PANNo = document.getElementById("PANNo").value.trim();
            console.log("PANNo:", PANNo);
            const GSTINNo = document.getElementById("GSTINNo").value.trim();
            console.log("GSTINNo:", GSTINNo);
            const KGSLCode = document.getElementById("KGSLCode").value.trim();
            console.log("KGSLCode:", KGSLCode);
            const Active = document.getElementById("Active").value.trim();
            console.log("Active:", Active);

            // Check if any of the required fields are empty
            if (!AgentName || !GSTType || !PANNo || !GSTINNo || !KGSLCode || !Active) {
                alert("Please fill in all the required fields.");
                return;
            }

            // Create a table row with the entered data
            const tableRow = document.createElement("tr");
            tableRow.innerHTML = `
                                <td>${AgentName}</td>
                                <td>${GSTType}</td>
                                <td>${PANNo}</td>
                                <td>${GSTINNo}</td>
                                <td>${KGSLCode}</td>
                                <td>${Active}</td>
            `;

            // Append the row to the table
            document.getElementById("agentTableBody").appendChild(tableRow);

            // Close the modal
            $('#addAgentModal').modal('hide');

            // Clear the form fields
            document.getElementById("AgentForm").reset();
            
            // Save the Book entry to Local Storage
            saveBookEntryToLocalStorage(AgentName, GSTType, PANNo, GSTINNo, KGSLCode, Active);
        }

        // Function to save Rack entry to Local Storage
        function saveBookEntryToLocalStorage(AgentName, GSTType, PANNo, GSTINNo, KGSLCode, Active) {
            // Get existing entries from Local Storage or initialize an empty array
            let AgencyEntries = JSON.parse(localStorage.getItem("AgencyEntries")) || [];

            // Add the new entry to the array
            AgencyEntries.push({
                AgentName,
                GSTType,
                PANNo,
                GSTINNo,
                KGSLCode,
                Active
            });

            // Save the updated array back to Local Storage
            localStorage.setItem("AgencyEntries", JSON.stringify(AgencyEntries));
        }

        // Function to load Book entries from Local Storage
        function loadAgencyEntriesFromLocalStorage() {
            const AgencyEntries = JSON.parse(localStorage.getItem("AgencyEntries")) || [];

            // Loop through the entries and add them to the table
            AgencyEntries.forEach(entry => {
                const tableRow = document.createElement("tr");
                // Create a unique ID for each checkbox based on the book name
                const checkboxId = `checkbox-${entry.AgentName.replace(/ /g, "_")}`;

                tableRow.innerHTML = `
                                        <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                        <td>${entry.AgentName}</td>
                                        <td>${entry.GSTType}</td>
                                        <td>${entry.PANNo}</td>
                                        <td>${entry.GSTINNo}</td>
                                        <td>${entry.KGSLCode}</td>
                                        <td>${entry.Active}</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editAgencyModal" onclick="editAgencyEntry(this.parentNode.parentNode)">Edit</button>
                                            <button class="btn btn-sm btn-danger" onclick="deleteBookEntry(this)">Delete</button>
                                        </td>
                `;
                document.getElementById("agentTableBody").appendChild(tableRow);
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
        loadAgencyEntriesFromLocalStorage();

        function editAgencyEntry(row) {

            // Extract the rack ID from the row
            const AgentName = row.cells[0].textContent;

            // Find the corresponding rack entry in Local Storage or your data source
            const AgencyEntries = JSON.parse(localStorage.getItem("AgencyEntries")) || [];
            const AgencyRoEdit = AgencyEntries.find(entry => entry.AgentName === AgentName);

            // Check if a matching rack entry was found
            if (AgencyRoEdit) {
                // Pre-fill the edit modal form fields with the data
                document.getElementById("editAgentName").value = AgencyRoEdit.AgentName;
                document.getElementById("editGSTType").value = AgencyRoEdit.GSTType;
                document.getElementById("editPANNo").value = AgencyRoEdit.PANNo;
                document.getElementById("editGSTINNo").value = AgencyRoEdit.GSTINNo;
                document.getElementById("editKGSLCode").value = AgencyRoEdit.KGSLCode;
                document.getElementById("editActive").value = AgencyRoEdit.Active;
                // Show the edit modal
                $('#editAgencyModal').modal('show');
            } else {
                alert("Agency entry not found for editing.");
            }
        }

        function updateAgencyEntry() {
            // Get form values from the edit modal
            const editAgentName = document.getElementById("editAgentName").value;
            const editGSTType = document.getElementById("editGSTType").value;
            const editPANNo = document.getElementById("editPANNo").value;
            const editGSTINNo = document.getElementById("editGSTINNo").value;
            const editKGSLCode = document.getElementById("editKGSLCode").value;
            const editActive = document.getElementById("editActive").value;
            // Find the row in the table with the matching agency
            const table = document.getElementById("agentTableBody");
            for (let i = 0; i < table.rows.length; i++) {
                if (table.rows[i].cells[0].textContent === editAgentName) {
                    // Update all cells in the row with the new data
                    table.rows[i].cells[1].textContent = editGSTType;
                    table.rows[i].cells[2].textContent = editPANNo;
                    table.rows[i].cells[3].textContent = editGSTINNo;
                    table.rows[i].cells[4].textContent = editKGSLCode;
                    table.rows[i].cells[5].textContent = editActive;

                    // Update Local Storage by finding and updating the corresponding entry
                    const AgencyEntries = JSON.parse(localStorage.getItem("AgencyEntries")) || [];
                    for (let j = 0; j < AgencyEntries.length; j++) {
                        if (AgencyEntries[j].AgentName === editAgentName) {
                            AgencyEntries[j].GSTType = editGSTType;
                            AgencyEntries[j].PANNo = editPANNo;
                            AgencyEntries[j].GSTINNo = editGSTINNo;
                            AgencyEntries[j].KGSLCode = editKGSLCode;
                            AgencyEntries[j].Active = editActive
                            break; // Exit the loop once updated
                        }
                    }

                    localStorage.setItem("AgencyEntries", JSON.stringify(AgencyEntries));

                    // Close the edit modal
                    $('#editAgencyModal').modal('hide');

                    // Clear the form fields in the edit modal
                    document.getElementById("editAgentName").value = "";
                    document.getElementById("editGSTType").value = "";
                    document.getElementById("editPANNo").value = "";
                    document.getElementById("editGSTINNo").value = "";
                    document.getElementById("editKGSLCode").value = "";
                    document.getElementById("editActive").value = "";
                    break;
                }
            }
        }

        function deleteBookEntry(buttonElement) {
            // Get the row containing the button
            const row = buttonElement.parentNode.parentNode;

            // Confirm the deletion with a confirmation dialog
            const confirmation = confirm("Are you sure you want to delete this book entry?");
            if (confirmation) {
                // Remove the row from the table
                row.remove();

                // Update Local Storage by removing the deleted entry
                const AgentNameToDelete = row.querySelector("td:first-child").textContent; // Get the agency ID from the first cell
                const AgencyEntries = JSON.parse(localStorage.getItem("AgencyEntries")) || [];
                const updatedAgencyEntries = AgencyEntries.filter(entry => entry.AgentName !== AgentNameToDelete);
                localStorage.setItem("AgencyEntries", JSON.stringify(updatedAgencyEntries));
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