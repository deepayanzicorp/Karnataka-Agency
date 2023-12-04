@extends('allUsers.layout.default')

@section('content')
{{-- <div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1 class="m-0">{{$page_title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="active breadcrumb-item">Grade Master</li>
                </ol>
            </div>
        </div>
    </div>
</div> --}}

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Content Start -->
            <div class="col-lg-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="m-0">Grade List</h3>
                            <div class="float-right">
                                <button class="btn btn-success" data-bs-target="#addGradeModal" data-bs-toggle="modal" type="button">Add Grade</button>
                            </div>
                    </div>

                    <div class="mt-3 row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <input class="form-control form-control-sm" id="searchInput" placeholder="Search..." type="text">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" id="searchButton" style="margin-right:2rem" type="button"><i class="fas fa-search"></i>&nbsp;Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const searchInput = document.getElementById("searchInput");
                            const GradeTableBody = document.getElementById("GradeTableBody");
                            const noEntryFound = document.getElementById("noEntryFound");

                            searchInput.addEventListener("input", function () {
                                const searchTerm = searchInput.value.trim().toLowerCase();

                                // Loop through the rows in the Grade table
                                let entryFound = false; // Flag to track if a matching entry is found

                                for (let i = 0; i < GradeTableBody.rows.length; i++) {
                                    const row = GradeTableBody.rows[i];
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

                    <div class="card-body">
                        <!-- Display added Grade entries in a table -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="example1">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th>Grade Name</th>
                                            <th>Material Type</th>
                                            <th>Quality Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="GradeTableBody">
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>ABCDE1234I6UU</td>
                                            <td style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Geckopu</td>
                                            <td>Firefox 3.0</td>
                                            <td>ABCDJ0234I6UU</td>
                                            <td style="text-align: center;"
                                                onclick="editGradeEntry(this.parentNode.parentNode)">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tfoot>
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

                    <!-- Bootstrap Modal for adding Grade entries -->
                    <div aria-hidden="true" aria-labelledby="addGradeModalLabel" class="modal fade" id="addGradeModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form id="GradeForm">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id="addGradeModalLabel">Add Grade</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="GradeName">Grade Name</label>
                                                    <input class="form-control form-control-sm" id="GradeName" name="GradeName" type="text" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="MaterialType">Material Type</label>
                                                    <input class="form-control form-control-sm" id="MaterialType" name="MaterialType" type="number" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="QualityCode">Quality Code</label>
                                                    <input class="form-control form-control-sm" id="QualityCode" name="QualityCode" type="number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between ModalFooterBorder">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                        <button class="btn btn-primary" onclick="addGradeEntry()" type="button">Add Grade</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Include Bootstrap JS (Popper.js and Bootstrap) -->
            <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
            <script>
                // Function to add a new Grade entry
                function addGradeEntry() {
                    console.log("addGradeEntry called");
                    // Get form values
                    const GradeName = document.getElementById("GradeName").value.trim();
                    console.log("GradeName:", GradeName);
                    const MaterialType = document.getElementById("MaterialType").value.trim();
                    console.log("MaterialType:", MaterialType);
                    const QualityCode = document.getElementById("QualityCode").value.trim();
                    console.log("QualityCode:", QualityCode);
                    // Check if any of the required fields are empty
                    if (!GradeName || !MaterialType || !QualityCode) {
                        alert("Please fill in all the required fields.");
                        return;
                    }
                    // Create a table row with the entered data
                    const tableRow = document.createElement("tr");
                    tableRow.innerHTML = `
                                        <td>${GradeName}</td>
                                        <td>${MaterialType}</td>
                                        <td>${QualityCode}</td>
                    `;

                    // Append the row to the table
                    document.getElementById("GradeTableBody").appendChild(tableRow);

                    // Close the modal
                    $('#addGradeModal').modal('hide');

                    // Clear the form fields
                    document.getElementById("GradeForm").reset();
                    // Save the Grade entry to Local Storage
                    saveGradeEntryToLocalStorage(GradeName, MaterialType, QualityCode);
                }

                // Function to save Grade entry to Local Storage
                function saveGradeEntryToLocalStorage(GradeName, MaterialType, QualityCode) {
                    // Get existing entries from Local Storage or initialize an empty array
                    let GradeEntries = JSON.parse(localStorage.getItem("GradeEntries")) || [];

                    // Add the new entry to the array
                    GradeEntries.push({
                        GradeName,
                        MaterialType,
                        QualityCode
                    });

                    // Save the updated array back to Local Storage
                    localStorage.setItem("GradeEntries", JSON.stringify(GradeEntries));
                }

                // Function to load Grade entries from Local Storage
                function loadGradeEntriesFromLocalStorage() {
                    const GradeEntries = JSON.parse(localStorage.getItem("GradeEntries")) || [];

                    // Loop through the entries and add them to the table
                    GradeEntries.forEach(entry => {
                        const tableRow = document.createElement("tr");
                        // Create a unique ID for each checkbox based on the Grade name
                        const checkboxId = `checkbox-${entry.GradeName.replace(/ /g, "_")}`;

                        tableRow.innerHTML = `
                                                <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                                <td>${entry.GradeName}</td>
                                                <td>${entry.MaterialType}</td>
                                                <td>${entry.QualityCode}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editGradeModal" onclick="editGradeEntry(this.parentNode.parentNode)">Edit</button>
                                                    <button class="btn btn-sm btn-danger" onclick="deleteGradeEntry(this)">Delete</button>
                                                </td>
                        `;
                        document.getElementById("GradeTableBody").appendChild(tableRow);
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

                // Load Grade entries from Local Storage when the page loads
                loadGradeEntriesFromLocalStorage();

                function editGradeEntry(row) {

                    // Extract the Grade ID from the row
                    const GradeName = row.cells[0].textContent;

                    // Find the corresponding Grade entry in Local Storage or your data source
                    const GradeEntries = JSON.parse(localStorage.getItem("GradeEntries")) || [];
                    const GradeRoEdit = GradeEntries.find(entry => entry.GradeName === GradeName);

                    // Check if a matching Grade entry was found
                    if (GradeRoEdit) {
                        // Pre-fill the edit modal form fields with the data
                        document.getElementById("editGradeName").value = GradeRoEdit.GradeName;
                        document.getElementById("editMaterialType").value = GradeRoEdit.MaterialType;
                        document.getElementById("editQualityCode").value = GradeRoEdit.QualityCode;
                        // Show the edit modal
                        $('#editGradeModal').modal('show');
                    } else {
                        alert("Grade entry not found for editing.");
                    }
                }

                function updateGradeEntry() {
                    // Get form values from the edit modal
                    const editGradeName = document.getElementById("editGradeName").value;
                    const editMaterialType = document.getElementById("editMaterialType").value;
                    const editQualityCode = document.getElementById("editQualityCode").value;
                    // Find the row in the table with the matching Grade
                    const table = document.getElementById("GradeTableBody");
                    for (let i = 0; i < table.rows.length; i++) {
                        if (table.rows[i].cells[0].textContent === editGradeName) {
                            // Update all cells in the row with the new data
                            table.rows[i].cells[1].textContent = editMaterialType;
                            table.rows[i].cells[2].textContent = editQualityCode;
                            // Update Local Storage by finding and updating the corresponding entry
                            const GradeEntries = JSON.parse(localStorage.getItem("GradeEntries")) || [];
                            for (let j = 0; j < GradeEntries.length; j++) {
                                if (GradeEntries[j].GradeName === editGradeName) {
                                    GradeEntries[j].MaterialType = editMaterialType;
                                    GradeEntries[j].QualityCode = editQualityCode;
                                    break; // Exit the loop once updated
                                }
                            }

                            localStorage.setItem("GradeEntries", JSON.stringify(GradeEntries));

                            // Close the edit modal
                            $('#editGradeModal').modal('hide');

                            // Clear the form fields in the edit modal
                            document.getElementById("editGradeName").value = "";
                            document.getElementById("editMaterialType").value = "";
                            document.getElementById("editQualityCode").value = "";
                            break;
                        }
                    }
                }

                function deleteGradeEntry(buttonElement) {
                    // Get the row containing the button
                    const row = buttonElement.parentNode.parentNode;

                    // Confirm the deletion with a confirmation dialog
                    const confirmation = confirm("Are you sure you want to delete this Grade entry?");
                    if (confirmation) {
                        // Remove the row from the table
                        row.remove();

                        // Update Local Storage by removing the deleted entry
                        const GradeNameToDelete = row.querySelector("td:first-child").textContent; // Get the Grade ID from the first cell
                        const GradeEntries = JSON.parse(localStorage.getItem("GradeEntries")) || [];
                        const updatedGradeEntries = GradeEntries.filter(entry => entry.GradeName !== GradeNameToDelete);
                        localStorage.setItem("GradeEntries", JSON.stringify(updatedGradeEntries));
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

            <!-- Bootstrap Modal for editing Grade entries -->
            <div aria-hidden="true" aria-labelledby="editGradeModalLabel" class="fade modal" id="editGradeModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form>
                        <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                            <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                <h5 class="modal-title" id="editGradeModalLabel">Edit Grade</h5>
                                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                            </div>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editGradeName">Grade Name</label>
                                            <input class="form-control form-control-sm" id="editGradeName" name="editGradeName" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editMaterialType">Material Type</label>
                                            <input class="form-control form-control-sm" id="editMaterialType" name="editMaterialType" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="editQualityCode">Quality Code</label>
                                            <input class="form-control form-control-sm" id="editQualityCode" name="editQualityCode" type="number">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                <button class="btn btn-primary" onclick="updateGradeEntry()" type="button">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection