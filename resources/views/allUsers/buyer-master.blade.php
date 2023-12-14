@extends('allUsers.layout.default')

@section('content')
    <div class="content">
        <div class=container-fluid>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline mt-2">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row align-items-center">
                                    <div class="col-md-9">
                                        <h1 class="m-0">{{ $page_title }}</h1>
                                    </div>
                                    <div class="col-md-3 align-self-center">
                                        <button class="btn modalBtn float-right" id="addDetailsBtn" data-bs-target=#addDetailsModal data-bs-toggle=modal>
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Display added Buyer -->
                        <div class="card-body">
                            <div class="table-responsive table-responsive-sm">
                                <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                    <thead class="TableHeadTheme">
                                        <tr>
                                            <th style="width: 60px;">Actions</th>
                                            <th>Buyer Name</th>
                                            <th>Complete Address</th>
                                            <th>GSTIN No</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Buyer add or edit-->
                        <div aria-hidden="true" aria-labelledby="addAgentModalLabel" class="modal fade" id="addDetailsModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addAgentModalLabel">Manage Details</h5>
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
                                                                    <input class="form-control form-control-sm" id="sl_no_buyer" name="sl_no_buyer" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Buyer Name</label>
                                                                    <input class="form-control form-control-sm" id="buyer_name" name="buyer_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Short Name</label>
                                                                    <input class="form-control form-control-sm" id="short_name" name="short_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>State</label>
                                                                    <select class="form-control-dropdown js-example-basic-single form-control-sm" id="state" name="state" style="width: 100%; font-size: 14px;">
                                                                        <option value="0">Select State</option>
                                                                        <option value="Andhra Pradesh (AP)">Andhra Pradesh (AP)</option>
                                                                        <option value="Arunachal Pradesh (AR)">Arunachal Pradesh (AR)</option>
                                                                        <option value="Assam (AS)">Assam (AS)</option>
                                                                        <option value="Bihar (BR)">Bihar (BR)</option>
                                                                        <option value="Chhattisgarh (CG)">Chhattisgarh (CG)</option>
                                                                        <option value="Goa (GA)">Goa (GA)</option>
                                                                        <option value="Gujarat (GJ)">Gujarat (GJ)</option>
                                                                        <option value="Haryana (HR)">Haryana (HR)</option>
                                                                        <option value="Himachal Pradesh (HP)">Himachal Pradesh (HP)</option>
                                                                        <option value="Jammu and Kashmir (JK)">Jammu and Kashmir (JK)</option>
                                                                        <option value="Jharkhand (JH)">Jharkhand (JH)</option>
                                                                        <option value="Karnataka (KA)">Karnataka (KA)</option>
                                                                        <option value="Kerala (KL)">Kerala (KL)</option>
                                                                        <option value="Madhya Pradesh (MP)">Madhya Pradesh (MP)</option>
                                                                        <option value="Maharashtra (MH)">Maharashtra (MH)</option>
                                                                        <option value="Manipur (MN)">Manipur (MN)</option>
                                                                        <option value="Meghalaya (ML)">Meghalaya (ML)</option>
                                                                        <option value="Mizoram (MZ)">Mizoram (MZ)</option>
                                                                        <option value="Nagaland (NL)">Nagaland (NL)</option>
                                                                        <option value="Orissa (OR)">Orissa (OR)</option>
                                                                        <option value="Punjab (PB)">Punjab (PB)</option>
                                                                        <option value="Rajasthan (RJ)">Rajasthan (RJ)</option>
                                                                        <option value="Sikkim (SK)">Sikkim (SK)</option>
                                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                                        <option value="Uttarakhand (UK)">Uttarakhand (UK)</option>
                                                                        <option value="Uttar Pradesh (UP)">Uttar Pradesh (UP)</option>
                                                                        <option value="West Bengal (WB)">West Bengal (WB)</option>
                                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                                        <option value="Andaman and Nicobar Islands (AN)">Andaman and Nicobar Islands (AN)</option>
                                                                        <option value="Chandigarh (CH)">Chandigarh (CH)</option>
                                                                        <option value="Dadra and Nagar Haveli (DH)">Dadra and Nagar Haveli (DH)</option>
                                                                        <option value="Daman and Diu (DD)">Daman and Diu (DD)</option>
                                                                        <option value="Delhi (DL)">Delhi (DL)</option>
                                                                        <option value="Lakshadweep (LD)">Lakshadweep (LD)</option>
                                                                        <option value="Pondicherry (PY)">Pondicherry (PY)</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Billing Address Line1</label>
                                                                    <textarea class="form-control form-control-sm" id="address1" name="address1" type="text" rows="2"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Billing Address Line2 (Optional)</label>
                                                                    <textarea class="form-control form-control-sm" id="address2" name="address2" type="text" rows="2"></textarea>
                                                                </div>
                                                            </div>                                                            

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Country</label>
                                                                    <input class="form-control form-control-sm" id="country" name="country" type="text" value="India" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pin Code</label>
                                                                    <input class="form-control form-control-sm" id="pinCode" name="pinCode" runat="server"
                                                                     maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                                </div>
                                                            </div>                                                            

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label>GSTIN Treatment</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single form-control-sm" id="gstin_treatment" name="gstin_treatment" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>GSTIN No</label>
                                                                    <input class="form-control form-control-sm" id="gstin_no" name="gstin_no" type="text" maxlength="15" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header modal-header">
                                                        <h3 class="card-title">Contact Details</h3>
                                                    </div>

                                                    <div class="card-body modal-contentBG">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" id="contact_name" name="contact_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="contact_email" name="contact_email" type="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" id="mobileNo" name="mobileNo" runat="server"
                                                                     maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
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

                        <!-- Bootstrap Modal for Buyer delete-->
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


                        <!-- Bootstrap Modal for Buyer Shipping list-->
                        <div aria-hidden="true" aria-labelledby="listShippingModalLabel" class="modal fade" id="listShippingModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modalHeaderCustom">
                                        <h5 class="modal-title" id="">Shipping List</h5>
                                        <div class="d-flex align-items-center">
                                            <button class="btn modalBtn1 d-flex align-items-center my-2" id="addShippingBtn" data-bs-target=#addShippingModal data-bs-toggle=modal>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                            </button>
                                            <button data-bs-dismiss="modal" type="button" style="height: fit-content; margin-left: 10px;"><i class="fas fa-times"></i></button>                                            
                                        </div>
                                        
                                    </div>

                                    <div class="modal-body modal-contentBG" id="listShippingDetailsForm">
                                        <div class="row">
                                            {{-- <button class="btn modalBtn d-flex align-items-center my-2" id="addShippingBtn" data-bs-target=#addShippingModal data-bs-toggle=modal>
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                            </button> --}}
                                            <div class="col-md-12" hidden>
                                                <div class="form-group">
                                                    <label>Buyer ID</label>
                                                    <input class="form-control form-control-sm" id="buyer_id" name="buyer_id" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="table-responsive table-responsive-sm">
                                                <table class="table table-bordered table-striped table-sm table-hover" id="tblDataShipping" style="width: 100%">
                                                    <thead class="TableHeadTheme">
                                                        <tr>
                                                            <th style="width: 40px;">Actions</th>
                                                            <th>Shipping Details</th>
                                                            <th>Zonal Details</th>
                                                            <th>Shipping Address1</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Buyer Shipping add or edit-->
                        <div aria-hidden="true" aria-labelledby="addShippingModalLabel" class="modal fade" id="addShippingModal" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="">Manage Shipping Details</h5>
                                        <button data-bs-dismiss="modal" type="button" onclick="closeAddShippingModalPopup()"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body modal-contentBG" id="addShippingDetailsForm">
                                        <div class="row mb-4">
                                            <div class="col-md-12" hidden>
                                                <div class="form-group">
                                                    <label>SL No</label>
                                                    <input class="form-control form-control-sm" id="sl_no_buyer_ship" name="sl_no_buyer_ship" type="text" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12" hidden>
                                                <div class="form-group">
                                                    <label>Buyer ID</label>
                                                    <input class="form-control form-control-sm" id="buyer_id_shipp" name="buyer_id_shipp" type="text" disabled>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Shipping Address Short Name</label>
                                                    <input class="form-control form-control-sm" type="text" id="shipping_short_name" name="shipping_short_name">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Zone</label>
                                                    <input class="form-control form-control-sm" id="shipping_zone" name="shipping_zone"
                                                        maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Shipping Short Code</label>
                                                    <input class="form-control form-control-sm" id="shipping_short_code" name="shipping_short_code"
                                                        maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Shipping Party Code</label>
                                                    <input class="form-control form-control-sm" id="shipping_party_code" name="shipping_party_code"
                                                        maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Destination</label>
                                                    <input class="form-control form-control-sm" type="text" id="shipping_destination" name="shipping_destination">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Place of Supply</label>
                                                    <input class="form-control form-control-sm" type="text" id="shipping_place" name="shipping_place">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Address Line 1</label>
                                                    <textarea class="form-control form-control-sm" id="shipping_address1" name="shipping_address1" type="text" rows="2" maxlength="150"></textarea>
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Address Line 2</label>
                                                    <textarea class="form-control form-control-sm" id="shipping_address2" name="shipping_address2" type="text" rows="2" maxlength="100"></textarea>
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <select class="form-control-dropdown js-example-basic-single" id="shipping_state" name="shipping_state" style="width: 100%">
                                                        <option value="0">Select State</option>
                                                        <option value="Andhra Pradesh (AP)">Andhra Pradesh (AP)</option>
                                                        <option value="Arunachal Pradesh (AR)">Arunachal Pradesh (AR)</option>
                                                        <option value="Assam (AS)">Assam (AS)</option>
                                                        <option value="Bihar (BR)">Bihar (BR)</option>
                                                        <option value="Chhattisgarh (CG)">Chhattisgarh (CG)</option>
                                                        <option value="Goa (GA)">Goa (GA)</option>
                                                        <option value="Gujarat (GJ)">Gujarat (GJ)</option>
                                                        <option value="Haryana (HR)">Haryana (HR)</option>
                                                        <option value="Himachal Pradesh (HP)">Himachal Pradesh (HP)</option>
                                                        <option value="Jammu and Kashmir (JK)">Jammu and Kashmir (JK)</option>
                                                        <option value="Jharkhand (JH)">Jharkhand (JH)</option>
                                                        <option value="Karnataka (KA)">Karnataka (KA)</option>
                                                        <option value="Kerala (KL)">Kerala (KL)</option>
                                                        <option value="Madhya Pradesh (MP)">Madhya Pradesh (MP)</option>
                                                        <option value="Maharashtra (MH)">Maharashtra (MH)</option>
                                                        <option value="Manipur (MN)">Manipur (MN)</option>
                                                        <option value="Meghalaya (ML)">Meghalaya (ML)</option>
                                                        <option value="Mizoram (MZ)">Mizoram (MZ)</option>
                                                        <option value="Nagaland (NL)">Nagaland (NL)</option>
                                                        <option value="Orissa (OR)">Orissa (OR)</option>
                                                        <option value="Punjab (PB)">Punjab (PB)</option>
                                                        <option value="Rajasthan (RJ)">Rajasthan (RJ)</option>
                                                        <option value="Sikkim (SK)">Sikkim (SK)</option>
                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                        <option value="Uttarakhand (UK)">Uttarakhand (UK)</option>
                                                        <option value="Uttar Pradesh (UP)">Uttar Pradesh (UP)</option>
                                                        <option value="West Bengal (WB)">West Bengal (WB)</option>
                                                        <option value="Tamil Nadu (TN)">Tamil Nadu (TN)</option>
                                                        <option value="Tripura (TR)">Tripura (TR)</option>
                                                        <option value="Andaman and Nicobar Islands (AN)">Andaman and Nicobar Islands (AN)</option>
                                                        <option value="Chandigarh (CH)">Chandigarh (CH)</option>
                                                        <option value="Dadra and Nagar Haveli (DH)">Dadra and Nagar Haveli (DH)</option>
                                                        <option value="Daman and Diu (DD)">Daman and Diu (DD)</option>
                                                        <option value="Delhi (DL)">Delhi (DL)</option>
                                                        <option value="Lakshadweep (LD)">Lakshadweep (LD)</option>
                                                        <option value="Pondicherry (PY)">Pondicherry (PY)</option>
                                                    </select>
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Person Name</label>
                                                    <input class="form-control form-control-sm" type="text" id="shipping_contact_person_name" name="shipping_contact_person_name">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Person email ID</label>
                                                    <input class="form-control form-control-sm" id="shipping_contact_person_email" name="shipping_contact_person_email" type="email">
                                                </div>
                                            </div>
        
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Person Mobile No</label>
                                                    <input class="form-control form-control-sm" id="shipping_contact_person_mobile" name="shipping_contact_person_mobile"
                                                        maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-between">
                                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button" onclick="closeAddShippingModalPopup()">Cancel</button>
                                                <button class="btn modalBtn" id="btnShippingUpdate" type="submit">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Update
                                                </button>
                                                <button class="btn modalBtn" id="btnShippingAdd" type="submit">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bootstrap Modal for Buyer Shipping delete-->
                        <div class="modal fade" id="deleteRecordShippingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <p style="margin-left: 15px; margin-top: 5px;">Confirm to Delete Record ?</p>
                                    <input type="hidden" id="delete_record_shipping_id" name="delete_record_shipping_id">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" id="btnShippingDelete" class="btn btn-primary">Yes Delete</button>
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
        var buyerId;
        $(document).ready(function() {
            
            // Check validation
            function checkInputDataValidation(){
                // Regular expression for email validation
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                let valBuyerName    = $("#buyer_name").val();
                let valShortName    = $("#short_name").val();
                let valAddress1     = $("#address1").val();
                let valAddress2     = $("#address2").val();
                let valState        = $("#state").val();
                let valPinCode      = $("#pinCode").val();
                let valContactName  = $("#contact_name").val();
                let valContactEmail = $("#contact_email").val();
                let valMobileNo     = $("#mobileNo").val();
                let valGstinNo      = $("#gstin_no").val();
                let valGstinTreatment= $("#gstin_treatment").val();
   
                if (valBuyerName.length < 3 || valBuyerName.length > 250) {
                    $("#buyer_name").focus().select();
                    showMessage('Buyer Name should be between 3 and 250 characters');                    
                    return false;
                }
               
                if (valShortName.length < 3 || valShortName.length > 100) {
                    $("#short_name").focus().select();                    
                    showMessage('Short Name should be between 3 and 100 characters')                    
                    return false;
                }

                if (valState == 0 || valState == null) {                   
                    showMessage('Select state')                    
                    return false;
                }
              
                if (valAddress1.length < 3 || valAddress1.length > 100) {
                    $("#address1").focus().select();                    
                    showMessage('Address 1 should be between 3 to 100 characters')                    
                    return false;
                }               

                if (valPinCode.length < 6) {
                    $("#pinCode").focus().select();                    
                    showMessage('Pincode should be upto 6 digits')                    
                    return false;
                }

                if (valGstinTreatment == 0) {                   
                    showMessage('Select GstinTreatment')                    
                    return false;
                }

                if(valGstinTreatment === 'Yes'){
                    if (valGstinNo.length < 15) {
                        $("#gstin_no").focus().select();                    
                        showMessage('GSTIN No should be 15 AlphaNumeric characrters')                    
                        return false;
                    }  
                }                              

                if (valContactName.length < 3 || valContactName.length > 250) {
                    $("#contact_name").focus().select();
                    showMessage('Contact Name should be between 3 and 250 characters');                    
                    return false;
                }

                // Email validation
                if (!emailRegex.test(valContactEmail)) {
                    $("#contact_email").focus().select();                    
                    showMessage('Email should be valid email')                    
                    return false;
                }

                if (valMobileNo.length < 10) {
                    $("#mobileno").focus().select();                    
                    showMessage('Mobile number should be upto 10 digits')                    
                    return false;
                }     
                return true;          
            }

            // Select2 dropdown
            $('#state').select2({
                dropdownParent: $('#addDetailsModal')
            });

            $('#gstin_treatment').select2({
                dropdownParent: $('#addDetailsModal')
            });

            $('#gstin_treatment').on('change', function() {
                // Check if the selected value is 'yes'
                if ($(this).val() === 'No' || $(this).val() === '0') {
                    // Disable the input field
                    $('#gstin_no').prop('disabled', true);                    
                } else {
                    // Enable and focus the input field
                    $('#gstin_no').prop('disabled', false).focus();
                }
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
                    "paging": true,
                    "pageLength": 10,
                    "ajax": {
                        "url": "buyer-master/list",
                        "dataSrc": "list"
                    },
                    "columns": [{
                            "data": null,
                            "render": function(data, type, row) {
                                buyerId = row.id; // Store the buyer id in a variable
                               /* return '<div class="d-flex">' +
                                    '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                    buyerId + '">'+ row.id +'<i class="fas fa-solid fa-pen"></i>'+buyerId+'</button>' +

                                    '<button type="button" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                    buyerId +
                                    '" style="margin-left: 10px;">'+ row.id +'<i class="fas fa-solid fa-trash"></i>'+buyerId+'</button>' +

                                    '<button type="button" id="btnListShipping" class="btn btn-outline-success btn-sm showShippingBtn" data-id="' +
                                    buyerId +
                                    '" style="margin-left: 10px;">'+ row.id +'<i class="fas fa-solid fa-address-book"></i>'+buyerId+'</button>' +
                                    '</div>'; */

                                    return '<div class="d-flex">' +
                                    '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                    buyerId + '"><i class="fas fa-solid fa-pen"></i></button>' +

                                    '<button type="button" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                    buyerId +
                                    '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +

                                    '<button type="button" id="btnListShipping" class="btn btn-outline-success btn-sm showShippingBtn" data-id="' +
                                    buyerId +
                                    '" style="margin-left: 10px;"><i class="fas fa-solid fa-address-book"></i></button>' +
                                    '</div>';
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return row.buyer_name + '<br/>[' + row.buyer_short_name + ']' ;
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                // Concatenate address1, country, state, and pinCode
                                // return row.buyer_address1 + ', ' + row.buyer_state + ', ' + row.buyer_pincode + ', ' + row.buyer_country;
                                return '<b>Address :</b> '+ row.buyer_address1 + 
                                '<br/>  <b>State :</b> '+ row.buyer_state + ' <b>Pin :</b> ' + row.buyer_pincode +
                                '<br/>  <b>Country :</b> ' + row.buyer_country;
                            }
                        },
                        {
                            "data": "buyer_gstin_no"
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
                    var f_buyer_name            = $('#buyer_name').val();
                    var f_buyer_short_name      = $('#short_name').val();
                    var f_buyer_address1        = $('#address1').val();
                    var f_buyer_address2        = $('#address2').val();
                    var f_buyer_state           = $('#state').val();
                    var f_buyer_country         = $('#country').val();
                    var f_buyer_pinCode         = $('#pinCode').val();
                    var f_buyer_gstin_no        = $('#gstin_no').val();
                    var f_buyer_gstin           = $('#gstin_treatment').val();
                    var f_buyer_contact_name    = $('#contact_name').val();
                    var f_buyer_contact_email   = $('#contact_email').val();
                    var f_buyer_mobileNo        = $('#mobileNo').val();
                    var f_sl_no                 = $('#sl_no_buyer').val();

                    var dt = {
                            a_buyer_name                    : f_buyer_name,
                            a_buyer_short_name              : f_buyer_short_name,
                            a_buyer_address1                : f_buyer_address1,
                            a_buyer_address2                : f_buyer_address2,
                            a_buyer_state                   : f_buyer_state,
                            a_buyer_country                 : f_buyer_country,
                            a_buyer_pinCode                 : f_buyer_pinCode,
                            a_buyer_gstin_no                : f_buyer_gstin_no,
                            a_buyer_gstin                   : f_buyer_gstin,
                            a_buyer_contact_person_name     : f_buyer_contact_name,
                            a_buyer_contact_person_email    : f_buyer_contact_email,
                            a_buyer_contact_person_mobile   : f_buyer_mobileNo,
                            a_sl_no                         : f_sl_no,
                            _token                          : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'post',
                        data: dt,
                        url: "{{ url('buyer-master/insert') }}",

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
            $('#tblData').on('click', '.editRecordBtn', function() {
                // Retrieve the data-id attribute from the clicked button
                var recordId = $(this).data('id');

                // Perform actions with the recordId, for example, trigger an AJAX request to fetch the details for editing
                // console.log('Edit button clicked for record ID: ' + recordId);

                // Add your logic here to handle the edit event.For example, you can open a modal with the details of the selected record for editing
                $('#addDetailsModal').modal('show');
                $('#btnAdd').hide();
                $('#btnUpdate').show();

                $.ajax({
                    type: "GET",
                    url: "buyer-master/edit/" + recordId,
                    success: function(response) {
                        $('#buyer_name').val(response.record.buyer_name);
                        $('#short_name').val(response.record.buyer_short_name);
                        $('#state').val(response.record.buyer_state).trigger('change');
                        $('#address1').val(response.record.buyer_address1);
                        $('#address2').val(response.record.buyer_address2);
                        $('#country').val(response.record.buyer_country);
                        $('#pinCode').val(response.record.buyer_pincode);
                        $('#gstin_treatment').val(response.record.buyer_gstin).trigger('change');
                        $('#gstin_no').val(response.record.buyer_gstin_no);
                        $('#contact_name').val(response.record.buyer_contact_person_name);
                        $('#contact_email').val(response.record.buyer_contact_person_email);
                        $('#mobileNo').val(response.record.buyer_contact_person_mobile);
                        $('#sl_no_buyer').val(response.record.id);
                        // $('#buyer_id').val(response.record.buyer_id);
                        // console.log(response);
                    }
                });
            });

            $("#btnUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputDataValidation()) {
                    return true;
                } else {
                    var f_buyer_name            = $('#buyer_name').val();
                    var f_buyer_short_name      = $('#short_name').val();
                    var f_buyer_address1        = $('#address1').val();
                    var f_buyer_address2        = $('#address2').val();
                    var f_buyer_state           = $('#state').val();
                    var f_buyer_country         = $('#country').val();
                    var f_buyer_pinCode         = $('#pinCode').val();
                    var f_buyer_gstin_no        = $('#gstin_no').val();
                    var f_buyer_gstin           = $('#gstin_treatment').val();
                    var f_buyer_contact_name    = $('#contact_name').val();
                    var f_buyer_contact_email   = $('#contact_email').val();
                    var f_buyer_mobileNo        = $('#mobileNo').val();
                    var f_sl_no                 = $('#sl_no_buyer').val();

                    var dt = {
                            a_buyer_name                    : f_buyer_name,
                            a_buyer_short_name              : f_buyer_short_name,
                            a_buyer_address1                : f_buyer_address1,
                            a_buyer_address2                : f_buyer_address2,
                            a_buyer_state                   : f_buyer_state,
                            a_buyer_country                 : f_buyer_country,
                            a_buyer_pinCode                 : f_buyer_pinCode,
                            a_buyer_gstin_no                : f_buyer_gstin_no,
                            a_buyer_gstin                   : f_buyer_gstin,
                            a_buyer_contact_person_name     : f_buyer_contact_name,
                            a_buyer_contact_person_email    : f_buyer_contact_email,
                            a_buyer_contact_person_mobile   : f_buyer_mobileNo,
                            a_sl_no                         : f_sl_no,
                            _token                          : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'put',
                        data: dt,
                        url: "{{ url('buyer-master/update') }}",
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
            $('#tblData').on('click', '.deleteRecordBtn', function() {
                var recordId = $(this).data('id');
                // console.log('Delete button clicked for record ID: ' + recordId);
                $('#deleteRecordModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "buyer-master/delete/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_buyer').val(response.record.id);
                    }
                });
            });

            $("#btnDelete").click(function(event) {
                event.preventDefault();
                var f_buyer_status = $('#buyer_status').val();
                var f_sl_no = $('#sl_no_buyer').val();

                var dt = {
                    a_buyer_status: f_buyer_status,
                    a_sl_no: f_sl_no,
                    _token: "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'put',
                    data: dt,
                    url: "{{ url('buyer-master/delete') }}",
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


            // Buyer ADDRESS Part

            // Check validation
            function checkInputShippingDataValidation(){
                
                // Regular expression for email validation
                let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                let valShippingShortName            = $("#shipping_short_name").val();
                let valShippingZone                 = $("#shipping_zone").val();
                let valShippingShortCode            = $("#shipping_short_code").val();
                let valShippingPartyCode            = $("#shipping_party_code").val();
                let valShippingDestination          = $("#shipping_destination").val();
                let valShippingPlace                = $("#shipping_place").val();
                let valShippingAddress1             = $("#shipping_address1").val();
                let valShippingAddress2             = $("#shipping_address2").val();
                let valShippingState                = $("#shipping_state").val();
                let valShippingContactPersonName    = $("#shipping_contact_person_name").val();
                let valShippingContactPersonEmail   = $("#shipping_contact_person_email").val();
                let valShippingContactPersonMobile  = $("#shipping_contact_person_mobile").val();
   
                if (valShippingShortName.length < 3 || valShippingShortName.length > 250) {
                    $("#shipping_short_name").focus().select();
                    showMessage('Shipping Short Name should be between 3 and 250 characters');                    
                    return false;
                }
               
                if (valShippingZone.length < 3 || valShippingZone.length > 10) {
                    $("#shipping_zone").focus().select();                    
                    showMessage('Shipping Zone should be between 3 and 10 digits')                    
                    return false;
                }

                if (valShippingShortCode.length < 3 || valShippingShortCode.length > 30) {
                    $("#shipping_short_code").focus().select();                    
                    showMessage('Shipping Short Code should be between 3 and 30 digits')                    
                    return false;
                } 

                if (valShippingPartyCode.length < 3 || valShippingPartyCode.length > 30) {
                    $("#shipping_party_code").focus().select();                    
                    showMessage('Party Code should be between 3 and 30 digits')                    
                    return false;
                }
              
                if (valShippingDestination.length < 3 || valShippingDestination.length > 30) {
                    $("#shipping_destination").focus().select();                    
                    showMessage('Shipping Destination should be between 3 and 30 characters')                    
                    return false;
                }
                
                if (valShippingDestination.length < 3 || valShippingDestination.length > 30) {
                    $("#shipping_destination").focus().select();                    
                    showMessage('Shipping Destination should be between 3 and 30 characters')                    
                    return false;
                }

                if (valShippingPlace.length < 3 || valShippingPlace.length > 30) {
                    $("#shipping_place").focus().select();                    
                    showMessage('Shipping Place should be between 3 and 30 characters')                    
                    return false;
                }

                if (valShippingAddress1.length < 3 || valShippingAddress1.length >= 150) {
                    $("#shipping_address1").focus().select();                    
                    showMessage('Shipping Address1 should be between 3 to 150 characters')                    
                    return false;
                }

                if (valShippingAddress2.length >= 100) {
                    $("#shipping_address2").focus().select();                    
                    showMessage('Shipping Address2 maximum upto 100 characters')                    
                    return false;
                }

                if (valShippingState == 0) {
                    $("#shipping_state").focus().select();                    
                    showMessage('Select Shipping State')                    
                    return false;
                }                       

                if (valShippingContactPersonName.length < 3 || valShippingContactPersonName.length > 250) {
                    $("#shipping_contact_person_name").focus().select();
                    showMessage('Shipping Contact Person Name should be between 3 and 250 characters');                    
                    return false;
                }

                // Email validation
                if (!emailRegex.test(valShippingContactPersonEmail)) {
                    $("#shipping_contact_person_email").focus().select();                    
                    showMessage('Email should be valid email')                    
                    return false;
                }

                if (valShippingContactPersonMobile.length < 10) {
                    $("#shipping_contact_person_mobile").focus().select();                    
                    showMessage('Mobile number should be upto 10 digits')                    
                    return false;
                }     
                return true;          
            }

            // To load Buyer Address add & edit forms  
            $('#addShippingBtn').on('click', function() {
                $("#addShippingModal").modal('show');
                $('#btnShippingAdd').show();
                $('#btnShippingUpdate').hide();
                console.log('Buyer Id = ' +$('#buyer_id').val());
                // $('#buyer_id').val(buyerId);
                $('#buyer_id_shipp').val($('#buyer_id').val());
            });

            // Select2 dropdown
            $('#shipping_state').select2({
                dropdownParent: $('#addShippingModal')
            });
           
            // Initialize DataTable Buyer Address with pagination and AJAX
            function loadDataTableShipping() {
                // Destroy existing DataTable instance, if any
                if ($.fn.DataTable.isDataTable('#tblDataShipping')) {
                    $('#tblDataShipping').DataTable().destroy();
                }

                $('#tblDataShipping').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "ajax": {
                        "data":{buyerid_shipping: $('#buyer_id').val()},
                        "url": "buyer-master/listShipping",
                        "dataSrc": "shippinglist"
                    },
                    "columns": [{
                            "data": null,
                            "render": function(data, type, row) {
                            return '<div class="d-flex">' +
                                '<button type="button" class="btn btn-outline-primary btn-sm editShippingRecordBtn" data-id="' +
                                row.id + '"><i class="fas fa-solid fa-pen"></i></button>' +
                                
                                '<button type="button" class="btn btn-outline-danger btn-sm deleteShippingRecordBtn" data-id="' +
                                row.id +
                                '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                '</div>';
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return '<b>Name :</b> '        + row.shipping_short_name +                                
                                '<br/> <b>Destination :</b> '  + row.shipping_destination +
                                '<br/> <b>Place :</b> '        + row.shipping_place ;
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return '<b>Zone :</b> '        + row.shipping_zone + 
                                '<br/> <b>Short Code :</b> '   + row.shipping_short_code +
                                '<br/> <b>Party Code :</b> '   + row.shipping_party_code ;
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return row.shipping_address1 + '<br/>' + row.shipping_address2 ;
                            }
                        }
                        // {
                        //     "data": "shipping_address1"
                        // },
                        // {
                        //     "data": "shipping_address2"
                        // }
                        // Add more columns as needed
                    ],

                    // Language option for customizing text
                    // "language": {
                    //     "zeroRecords": "No data available in table"
                    // }
                });
            }
            
            // To load DataTable Buyer Address
            //loadDataTableShipping();

            // To load Buyer Address list
            $('#tblData').on('click', '.showShippingBtn', function() {
                $("#listShippingModal").modal('show');
                let bId = $(this).data('id');
                console.log('Buyer Id = ' +$(this).data('id'));

                $('#buyer_id').val(bId);
                loadDataTableShipping();
            });
            
            // Insert part Buyer Address
            $("#btnShippingAdd").click(function(event) {
                event.preventDefault();
                console.log('Buyer Id = ' +buyerId);
                
                if(!checkInputShippingDataValidation()){
                    return true;
                }else{
                    var f_shipping_short_name               = $('#shipping_short_name').val();
                    var f_shipping_zone                     = $('#shipping_zone').val();
                    var f_shipping_short_code               = $('#shipping_short_code').val();
                    var f_shipping_party_code               = $('#shipping_party_code').val();
                    var f_shipping_destination              = $('#shipping_destination').val();
                    var f_shipping_place                    = $('#shipping_place').val();
                    var f_shipping_address1                 = $('#shipping_address1').val();
                    var f_shipping_address2                 = $('#shipping_address2').val();
                    var f_shipping_state                    = $('#shipping_state').val();
                    var f_shipping_contact_person_name      = $('#shipping_contact_person_name').val();
                    var f_shipping_contact_person_email     = $('#shipping_contact_person_email').val();
                    var f_shipping_contact_person_mobile    = $('#shipping_contact_person_mobile').val();
                    var f_sl_no                             = $('#sl_no_buyer_ship').val();
                    var f_buyer_id_shipp                    = buyerId;

                    var dt = {
                        a_shipping_short_name               : f_shipping_short_name,
                        a_shipping_zone                     : f_shipping_zone,
                        a_shipping_short_code               : f_shipping_short_code,
                        a_shipping_party_code               : f_shipping_party_code,
                        a_shipping_destination              : f_shipping_destination,
                        a_shipping_place                    : f_shipping_place,
                        a_shipping_address1                 : f_shipping_address1,
                        a_shipping_address2                 : f_shipping_address2,
                        a_shipping_state                    : f_shipping_state,
                        a_shipping_contact_person_name      : f_shipping_contact_person_name,
                        a_shipping_contact_person_email     : f_shipping_contact_person_email,
                        a_shipping_contact_person_mobile    : f_shipping_contact_person_mobile,
                        a_sl_no                             : f_sl_no,
                        a_buyer_id_shipp                    : f_buyer_id_shipp,
                        _token                              : "{{ csrf_token() }}"
                    }
                    console.log(dt);
                    $.ajax({
                        type: 'post',
                        data: dt,
                        url: "{{ url('buyer-master/insertShipping') }}",

                        success: function(response) {
                            $('#addShippingModal').modal('hide');
                            $("#listShippingModal").modal('show');
                            // $('body').removeClass('modal-open');
                            // $('.modal-backdrop').remove();
                            loadDataTableShipping();
                            showSuccessMessage('Record is Inserted.')
                        },
                        error: function(response) {
                            console.log('Error:', response);
                        }
                    })
                    return false;                    
                }                
            });

            // Edit part Buyer Address
            $('#tblDataShipping').on('click', '.editShippingRecordBtn', function() {
                var recordId = $(this).data('id');
                // var recordId = $('#buyer_id').val();
                console.log('Edit button clicked for record ID: ' + recordId);

                $('#addShippingModal').modal('show');
                $('#btnShippingAdd').hide();
                $('#btnShippingUpdate').show();

                $.ajax({
                    type: "GET",
                    url: "buyer-master/editShipping/" + recordId,
                    success: function(response) {
                        $('#shipping_short_name').val(response.record.shipping_short_name);
                        $('#shipping_zone').val(response.record.shipping_zone);
                        $('#shipping_short_code').val(response.record.shipping_short_code);
                        $('#shipping_party_code').val(response.record.shipping_party_code);
                        $('#shipping_destination').val(response.record.shipping_destination);
                        $('#shipping_place').val(response.record.shipping_place);
                        $('#shipping_address1').val(response.record.shipping_address1);
                        $('#shipping_address2').val(response.record.shipping_address2);
                        $('#shipping_state').val(response.record.shipping_state).trigger('change');

                        $('#shipping_contact_person_name').val(response.record.shipping_contact_person_name);
                        $('#shipping_contact_person_email').val(response.record.shipping_contact_person_email);
                        $('#shipping_contact_person_mobile').val(response.record.shipping_contact_person_mobile);
                        $('#sl_no_buyer_ship').val(response.record.id);

                        $('#buyer_id_shipp').val($('#buyer_id').val());
                        // console.log(response);  
                    }
                });
            });

            $("#btnShippingUpdate").click(function(event) {
                event.preventDefault();

                if(!checkInputShippingDataValidation()) {
                    return true;
                } else {
                    var f_shipping_short_name               = $('#shipping_short_name').val();
                    var f_shipping_zone                     = $('#shipping_zone').val();
                    var f_shipping_short_code               = $('#shipping_short_code').val();
                    var f_shipping_party_code               = $('#shipping_party_code').val();
                    var f_shipping_destination              = $('#shipping_destination').val();
                    var f_shipping_place                    = $('#shipping_place').val();
                    var f_shipping_address1                 = $('#shipping_address1').val();
                    var f_shipping_address2                 = $('#shipping_address2').val();
                    var f_shipping_state                    = $('#shipping_state').val();
                    var f_shipping_contact_person_name      = $('#shipping_contact_person_name').val();
                    var f_shipping_contact_person_email     = $('#shipping_contact_person_email').val();
                    var f_shipping_contact_person_mobile    = $('#shipping_contact_person_mobile').val();
                    var f_sl_no_buyer_ship                  = $('#sl_no_buyer_ship').val();

                    var dt = {
                        a_shipping_short_name               : f_shipping_short_name,
                        a_shipping_zone                     : f_shipping_zone,
                        a_shipping_short_code               : f_shipping_short_code,
                        a_shipping_party_code               : f_shipping_party_code,
                        a_shipping_destination              : f_shipping_destination,
                        a_shipping_place                    : f_shipping_place,
                        a_shipping_address1                 : f_shipping_address1,
                        a_shipping_address2                 : f_shipping_address2,
                        a_shipping_state                    : f_shipping_state,
                        a_shipping_contact_person_name      : f_shipping_contact_person_name,
                        a_shipping_contact_person_email     : f_shipping_contact_person_email,
                        a_shipping_contact_person_mobile    : f_shipping_contact_person_mobile,
                        a_sl_no_buyer_ship                  : f_sl_no_buyer_ship,
                        _token                              : "{{ csrf_token() }}"
                    }
                    // console.log(dt);
                    $.ajax({
                        type: 'put',
                        data: dt,
                        url: "{{ url('buyer-master/updateShipping') }}",
                        success: function(response) {
                            $('#addShippingModal').modal('hide');
                            $("#listShippingModal").modal('show');
                            loadDataTableShipping();
                            showSuccessMessage('Record is Updated.')
                        },
                        error: function(response) {
                            console.log('Error:', response);
                        }
                    })
                    return false;
                }
            })

            // Delete part Buyer Address
            $('#tblDataShipping').on('click', '.deleteShippingRecordBtn', function() {
                var recordId = $(this).data('id');
                console.log('Delete button clicked for record ID: ' + recordId);
                $('#deleteRecordShippingModal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "buyer-master/deleteShipping/" + recordId,
                    success: function(response) {
                        // console.log(response);
                        $('#sl_no_buyer_ship').val(response.record.id);
                    }
                });
            });

            $("#btnShippingDelete").click(function(event) {
                event.preventDefault();
                var f_shipping_status   = $('#shipping_status').val();
                var f_sl_no             = $('#sl_no_buyer_ship').val();

                var dt = {
                    a_shipping_status   : f_shipping_status,
                    a_sl_no             : f_sl_no,
                    _token              : "{{ csrf_token() }}"
                }
                // console.log(dt);
                $.ajax({
                    type: 'put',
                    data: dt,
                    url: "{{ url('buyer-master/deleteShipping') }}",
                    success: function(response) {
                        $('#deleteRecordShippingModal').modal('hide');
                        loadDataTableShipping();
                        showSuccessMessage('Record is Deleted.')
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                })
            })

        });
    </script>

    <script>
        // Function to close the second popup and return to the first popup
        function closeAddShippingModalPopup() {
            $('#addShippingModal').modal('hide'); // Close the second popup
            $('#listShippingModal').modal('show'); // Show the first popup
        }
    </script>
@endsection
