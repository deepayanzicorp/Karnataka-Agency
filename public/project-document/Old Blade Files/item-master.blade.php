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
                    <li class="active breadcrumb-item">Item Master</li>
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
                        <h3 class="m-0">Item List</h3>
                            <div class="float-right">
                                <button class="btn btn-success" data-bs-target="#addItemModal" data-bs-toggle="modal" type="button">Add Item</button>
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
                            const ItemTableBody = document.getElementById("ItemTableBody");
                            const noEntryFound = document.getElementById("noEntryFound");

                            searchInput.addEventListener("input", function () {
                                const searchTerm = searchInput.value.trim().toLowerCase();

                                // Loop through the rows in the Item table
                                let entryFound = false; // Flag to track if a matching entry is found

                                for (let i = 0; i < ItemTableBody.rows.length; i++) {
                                    const row = ItemTableBody.rows[i];
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
                        <!-- Display added Item entries in a table -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="example1">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Item Category</th>
                                            <th>Size </th>
                                            <th>Product Type</th>
                                            <th>Grade </th>
                                            <th>Tender Serial Number</th>
                                            <th>Quality Code</th>
                                            <th>HSN Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="ItemTableBody">
                                        <tr>
                                            <td>11 A Cu (5*1250*6300)<!--Thickness*Width*Length--></td>
                                            <td>Copper</td>
                                            <td>5*1250*6300</td>
                                            <td>HR</td>
                                            <td>A</td>
                                            <td>11008</td>
                                            <td>6666</td>
                                            <td>936</td>
                                            <td style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>46 B Cu (5*1250*6300)<!--Thickness*Width*Length--></td>
                                            <td>Without  Copper</td>
                                            <td>5*1250*6300</td>
                                            <td>HR</td>
                                            <td>A</td>
                                            <td>11008</td>
                                            <td>6666</td>
                                            <td>936</td>
                                            <td style="text-align: center;">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                            </td>
                                        </tr>
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

                    <!-- Bootstrap Modal for adding Item entries -->
                    <div aria-hidden="true" aria-labelledby="addItemModalLabel" class="modal fade" id="addItemModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form id="ItemForm">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id=addItemModalLabel>Add Item</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Item Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="ItemName">Item Name</label>
                                                                    <input class="form-control form-control-sm" id="ItemName" name="ItemName" type="text" required>
                                                                </div>
                                                            </div>                                                       

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="ItemCategory">Item Category</label>
                                                                    <select class="form-control-dropdown select2" id="ItemCategory" name="ItemCategory" required>
                                                                        <option>Copper</option>
                                                                        <option>Without Copper</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="Thickness">Thickness</label>
                                                                    <input class="form-control form-control-sm" id="Thickness" name="Thickness" type="number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="Width">Width</label>
                                                                    <input class="form-control form-control-sm" id="Width" name="Width" type="number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="Length">Length</label>
                                                                    <input class="form-control form-control-sm" id="Length" name="Length" type="number" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="Size">Size </label>
                                                                    <input class="form-control form-control-sm" type="number" id="Size" name="Size" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ProductType">Product Type</label>
                                                                    <select class="form-control-dropdown select2" id="ProductType" name="ProductType" required>
                                                                        <option>CR</option>
                                                                        <option>Without Copper</option>
                                                                    </select>
                                                                </div>
                                                            </div>                                                       
                                                        
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="Grade">Grade</label>
                                                                    <input class="form-control form-control-sm" type="text" id="Grade" name="Grade" required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="SerialNumber">Tender Serial Number</label>
                                                                    <input class="form-control form-control-sm" id="SerialNumber" name="SerialNumber" required type="email">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="QualityCode">Quality Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="QualityCode" name="QualityCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="HSNCode">HSN Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="HSNCode" name="HSNCode" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between ModalFooterBorder">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Cancel</button>
                                                        <button class="btn btn-primary" onclick="addItemEntry()" type="button">Add Item</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Include Bootstrap JS (Popper.js and Bootstrap) -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <script>
            // Function to add a new Item entry
            function addItemEntry() {
                console.log("addItemEntry called");
                // Get form values
                const ItemName = document.getElementById("ItemName").value.trim();
                console.log("ItemName:", ItemName);
                const ItemCategory = document.getElementById("ItemCategory").value.trim();
                console.log("ItemCategory:", ItemCategory);
                const Thickness = document.getElementById("Thickness").value.trim();
                console.log("Thickness:", Thickness);
                const Width = document.getElementById("Width").value.trim();
                console.log("Width:", Width);
                const Length = document.getElementById("Length").value.trim();
                console.log("Length:", Length);
                const Size  = document.getElementById("Size ").value.trim();
                console.log("Size :", Size );
                const ProductType = document.getElementById("ProductType").value.trim();
                console.log("ProductType:", ProductType);
                const Grade = document.getElementById("Grade").value.trim();
                console.log("Grade:", Grade);
                const SerialNumber = document.getElementById("SerialNumber").value.trim();
                console.log("SerialNumber:", SerialNumber);
                const QualityCode = document.getElementById("QualityCode").value.trim();
                console.log("QualityCode:", QualityCode);
                const HSNCode = document.getElementById("HSNCode").value.trim();
                console.log("HSNCode:", HSNCode);

                // Check if any of the required fields are empty
                if (!ItemName || !ItemCategory || !Thickness || !Width || !Length || !Size 
                    || !ProductType || !Grade || !SerialNumber || !QualityCode || !HSNCode) {
                    alert("Please fill in all the required fields.");
                    return;
                }
                // Create a table row with the entered data
                const tableRow = document.createElement("tr");
                tableRow.innerHTML = `
                            
                                        <td>${ItemName}</td>
                                        <td>${ItemCategory}</td>
                                        <td>${Thickness}</td>
                                        <td>${Width}</td>
                                        <td>${Length}</td>
                                        <td>${Size }</td>
                                        <td>${ProductType}</td>
                                        <td>${Grade}</td>
                                        <td>${SerialNumber}</td>
                                        <td>${QualityCode}</td>
                                        <td>${HSNCode}</td>
                                    `;
                // Append the row to the table
                document.getElementById("ItemTableBody").appendChild(tableRow);

                // Close the modal
                $('#addItemModal').modal('hide');

                // Clear the form fields
                document.getElementById("ItemForm").reset();
                // Save the Item entry to Local Storage
                saveItemEntryToLocalStorage(ItemName, ItemCategory, Thickness, Width, Length,
                    Size , ProductType, Grade, SerialNumber, QualityCode, HSNCode);
            }

            // Function to save Item entry to Local Storage
            function saveItemEntryToLocalStorage(ItemName, ItemCategory, Thickness, Width, Length,
                Size , ProductType, Grade, SerialNumber, QualityCode, HSNCode, Zone) {
                // Get existing entries from Local Storage or initialize an empty array
                let ItemEntries = JSON.parse(localStorage.getItem("ItemEntries")) || [];

                // Add the new entry to the array
                ItemEntries.push({
                    ItemName,
                    ItemCategory,
                    Thickness,
                    Width,
                    Length,
                    Size ,
                    ProductType,
                    Grade,
                    SerialNumber,
                    QualityCode,
                    HSNCode
                });

                // Save the updated array back to Local Storage
                localStorage.setItem("ItemEntries", JSON.stringify(ItemEntries));
            }

            // Function to load Item entries from Local Storage
            function loadItemEntriesFromLocalStorage() {
                const ItemEntries = JSON.parse(localStorage.getItem("ItemEntries")) || [];

                // Loop through the entries and add them to the table
                ItemEntries.forEach(entry => {
                    const tableRow = document.createElement("tr");
                    // Create a unique ID for each checkbox based on the Item name
                    const checkboxId = `checkbox-${entry.ItemName.replace(/ /g, "_")}`;

                    tableRow.innerHTML = `
                                <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                <td>${ItemName}</td>
                                <td>${ItemCategory}</td>
                                <td>${Thickness}</td>
                                <td>${Width}</td>
                                <td>${Length}</td>
                                <td>${Size }</td>
                                <td>${ProductType}</td>
                                <td>${Grade}</td>
                                <td>${SerialNumber}</td>
                                <td>${QualityCode}</td>
                                <td>${HSNCode}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editItemModal" onclick="editItemEntry(this.parentNode.parentNode)">Edit</button>

                                    <button class="btn btn-sm btn-danger" onclick="deleteItemEntry(this)">Delete</button>
                                </td>
                    `;
                    document.getElementById("ItemTableBody").appendChild(tableRow);
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

            // Load Item entries from Local Storage when the page loads
            loadItemEntriesFromLocalStorage();

            function editItemEntry(row) {
                // Extract the Item ID from the row
                const ItemName = row.cells[0].textContent;

                // Find the corresponding Item entry in Local Storage or your data source
                const ItemEntries = JSON.parse(localStorage.getItem("ItemEntries")) || [];
                const ItemRoEdit = ItemEntries.find(entry => entry.ItemName === ItemName);

                // Check if a matching Item entry was found
                if (ItemRoEdit) {
                    // Pre-fill the edit modal form fields with the data
                    document.getElementById("editItemName").value = ItemRoEdit.ItemName;
                    document.getElementById("editItemCategory").value = ItemRoEdit.ItemCategory;
                    document.getElementById("editThickness").value = ItemRoEdit.Thickness;
                    document.getElementById("editWidth").value = ItemRoEdit.Width;
                    document.getElementById("editLength").value = ItemRoEdit.Length;
                    document.getElementById("editSize ").value = ItemRoEdit.Size ;
                    document.getElementById("editProductType").value = ItemRoEdit.ProductType;
                    document.getElementById("editGrade").value = ItemRoEdit.Grade;
                    document.getElementById("editSerialNumber").value = ItemRoEdit.SerialNumber;
                    document.getElementById("editQualityCode").value = ItemRoEdit.QualityCode;
                    document.getElementById("editHSNCode").value = ItemRoEdit.HSNCode;
                    // Show the edit modal
                    $('#editItemModal').modal('show');
                } else {
                    alert("Item entry not found for editing.");
                }
            }

            function updateItemEntry() {
                // Get form values from the edit modal
                const editItemName = document.getElementById("editItemName").value;
                const editItemCategory = document.getElementById("editItemCategory").value;
                const editThickness = document.getElementById("editThickness").value;
                const editWidth = document.getElementById("editWidth").value;
                const editLength = document.getElementById("editLength").value;
                const editSize  = document.getElementById("editSize ").value;
                const editProductType = document.getElementById("editProductType").value;
                const editGrade = document.getElementById("editGrade").value;
                const editSerialNumber = document.getElementById("editSerialNumber").value;
                const editQualityCode = document.getElementById("editQualityCode").value;
                const editHSNCode = document.getElementById("editHSNCode").value;
                // Find the row in the table with the matching Item
                const table = document.getElementById("ItemTableBody");
                for (let i = 0; i < table.rows.length; i++) {
                    if (table.rows[i].cells[0].textContent === editItemName) {
                        // Update all cells in the row with the new data
                        table.rows[i].cells[1].textContent = editItemName;
                        table.rows[i].cells[2].textContent = editItemCategory;
                        table.rows[i].cells[3].textContent = editThickness;
                        table.rows[i].cells[4].textContent = editWidth;
                        table.rows[i].cells[1].textContent = editLength;
                        table.rows[i].cells[2].textContent = editSize ;
                        table.rows[i].cells[2].textContent = editProductType;
                        table.rows[i].cells[3].textContent = editGrade;
                        table.rows[i].cells[4].textContent = editSerialNumber;
                        table.rows[i].cells[1].textContent = editQualityCode;
                        table.rows[i].cells[2].textContent = editHSNCode;
                        // Update Local Storage by finding and updating the corresponding entry
                        const ItemEntries = JSON.parse(localStorage.getItem("ItemEntries")) || [];
                        for (let j = 0; j < ItemEntries.length; j++) {
                            if (ItemEntries[j].ItemName === editItemName) {
                                ItemEntries[j].ItemCategory = editItemCategory;
                                ItemEntries[j].Thickness = editThickness;
                                ItemEntries[j].Width = editWidth;
                                ItemEntries[j].Length = editLength;
                                ItemEntries[j].Size = editSize;
                                ItemEntries[j].ProductType = editProductType;
                                ItemEntries[j].Grade = editGrade;
                                ItemEntries[j].SerialNumber = editSerialNumber;
                                ItemEntries[j].QualityCode = editQualityCode;
                                ItemEntries[j].HSNCode = editHSNCode;
                                break; // Exit the loop once updated
                            }
                        }

                        localStorage.setItem("ItemEntries", JSON.stringify(ItemEntries));

                        // Close the edit modal
                        $('#editItemModal').modal('hide');

                        // Clear the form fields in the edit modal
                        document.getElementById("editItemName").value = "";
                        document.getElementById("editItemCategory").value = "";
                        document.getElementById("editThickness").value = "";
                        document.getElementById("editWidth").value = "";
                        document.getElementById("editLength").value = "";
                        document.getElementById("editSize ").value = "";
                        document.getElementById("editProductType").value = "";
                        document.getElementById("editGrade").value = "";
                        document.getElementById("editSerialNumber").value = "";
                        document.getElementById("editQualityCode").value = "";
                        document.getElementById("editHSNCode").value = "";
                        break;
                    }
                }
            }

            function deleteItemEntry(buttonElement) {
                // Get the row containing the button
                const row = buttonElement.parentNode.parentNode;

                // Confirm the deletion with a confirmation dialog
                const confirmation = confirm("Are you sure you want to delete this Item entry?");
                if (confirmation) {
                    // Remove the row from the table
                    row.remove();

                    // Update Local Storage by removing the deleted entry
                    const ItemNameToDelete = row.querySelector("td:first-child").textContent; // Get the Item ID from the first cell
                    const ItemEntries = JSON.parse(localStorage.getItem("ItemEntries")) || [];
                    const updatedItemEntries = ItemEntries.filter(entry => entry.ItemName !== ItemNameToDelete);
                    localStorage.setItem("ItemEntries", JSON.stringify(updatedItemEntries));
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

        <!-- Bootstrap Modal for editing Item entries -->
        <div aria-hidden="true" aria-labelledby="editItemModalLabel" class="fade modal" id="editItemModal" tabindex=-1>
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                        <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                    </div>

                    <form>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Item Details</h3>
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editItemName">Item Name</label>
                                                        <input class="form-control form-control-sm" id="editItemName" name="editItemName" type="text" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editItemCategory">Item Category</label>
                                                        <select class="form-control-dropdown select2" id="editItemCategory" name="editItemCategory" required>
                                                            <option>Copper</option>
                                                            <option>Without Copper</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="editThickness">Thickness
                                                        </label>
                                                        <input class="form-control form-control-sm" id="editThickness" name="editThickness" type="number" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="editWidth">Width</label>
                                                        <input class="form-control form-control-sm" id="editWidth" name="editWidth" type="number" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="editLength">Length</label>
                                                        <input class="form-control form-control-sm" id="editLength" name="editLength" type="number" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="editSize" >Size </label>
                                                        <input class="form-control form-control-sm" type="number" id="editSize" name="editSize" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="editProductType">Product Type</label>
                                                        <select class="form-control-dropdown select2" id="editProductType" name="editProductType" required>
                                                            <option>CR</option>
                                                            <option>Without Copper</option>
                                                        </select>
                                                    </div>
                                                </div>                                           
                                            
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="editGrade">Grade</label>
                                                        <input class="form-control form-control-sm" type="text" id="editGrade" name="editGrade" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="editSerialNumber">Tender Serial Number</label>
                                                        <input class="form-control form-control-sm" id="editSerialNumber" name="editSerialNumber" required type="email">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editQualityCode">Quality Code</label>
                                                        <input class="form-control form-control-sm" type="number" id="editQualityCode" name="editQualityCode" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="editHSNCode">HSN Code</label>
                                                        <input class="form-control form-control-sm" type="number" id="editHSNCode" name="editHSNCode" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between ModalFooterBorder">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                            <button class="btn btn-primary" onclick="addItemEntry()" type="button">Add Item</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal" type=button>Cancel</button>
                            <button class="btn btn-primary" onclick="updateItemEntry()" type="button">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection