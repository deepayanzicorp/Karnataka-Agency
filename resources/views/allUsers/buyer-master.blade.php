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
                                            <th>Short Name</th>
                                            <th>Billing Address Line 1 + Country + State + Pin</th>
                                            <th>GSTIN No</th>
                                            <th>GSTIN Treatment</th>
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
                                                                    <label for="sl_no">SL No</label>
                                                                    <input class="form-control form-control-sm" id="sl_no" name="sl_no" type="text" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="BuyerName">Buyer Name</label>
                                                                    <input class="form-control form-control-sm" id="buyer_name" name="buyer_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="ShortName">Short Name</label>
                                                                    <input class="form-control form-control-sm" id="short_name" name="short_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="State">State</label>
                                                                    <select class="form-control-dropdown select2" id="state" name="state">
                                                                        <option value="">Select State</option>
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
                                                                    <label for="Address1">Billing Address Line1</label>
                                                                    <textarea class="form-control form-control-sm" id="address1" name="address1" type="text" rows="2"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Address2">Billing Address Line2</label>
                                                                    <textarea class="form-control form-control-sm" id="address2" name="address2" type="text" rows="2"></textarea>
                                                                </div>
                                                            </div>                                                            

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="Country">Country</label>
                                                                    <input class="form-control form-control-sm" id="country" name="country" type="text" value="India" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="PinCode">Pin Code</label>
                                                                    <input class="form-control form-control-sm" id="pinCode" name="pinCode" runat="server"
                                                                     maxlength="6" oninput="this.value = this.value.replace(/[^0-9]/g, ''); ">
                                                                </div>
                                                            </div>                                                            

                                                            <div class=col-md-4>
                                                                <div class="form-group">
                                                                    <label for="">GSTIN Treatment</label>
                                                                    <div>
                                                                        <select class="form-control-dropdown js-example-basic-single" id="gstin_treatment" name="gstin_treatment" style="width: 100%">
                                                                            <option value="0">--Choose--</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ShortName">GSTIN No</label>
                                                                    <input class="form-control form-control-sm" id="gstin_no" name="gstin_no" type="text" disabled>
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
                                                                    <label for="ContactName">Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" id="contact_name" name="contact_name" type="text">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ContactEmail">Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="contact_email" name="contact_email" type="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="MobileNo">Contact Person Mobile No</label>
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
                        {{-- PENDING --}}
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

                        <!-- Bootstrap Modal for BuyerAddress add or edit-->
                        {{-- This shipping address will be in a separate popup and button will be in action --}}
                        {{-- <div class="col-12">                        
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Shipping Address</h3>
                            </div>

                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ShippingShortName">Shipping Address Short Name</label>
                                            <input class="form-control form-control-sm" type="text" id="ShippingShortName" name="ShippingShortName">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Zone">Zone</label>
                                            <input class="form-control form-control-sm" type="number" id="Zone" name="Zone">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ShortCode">Shipping Short Code</label>
                                            <input class="form-control form-control-sm" type="number" id="ShortCode" name="ShortCode">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PartyCode">Shipping Party Code</label>
                                            <input class="form-control form-control-sm" type="number" id="PartyCode" name="PartyCode">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Destination">Destination</label>
                                            <input class="form-control form-control-sm" type="text" id="Destination" name="Destination">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PlaceofSupply">Place of Supply</label>
                                            <input class="form-control form-control-sm" type="text" id="PlaceofSupply" name="PlaceofSupply">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DAddress1">Address Line 1</label>
                                            <textarea class="form-control form-control-sm" id="DAddress1" name="DAddress1" type="text" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DAddress2">Address Line 2</label>
                                            <textarea class="form-control form-control-sm" id="DAddress2" name="DAddress2" type="text" rows="2"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DState">State</label>
                                            <select class="form-control-dropdown select2" id="DState" name="DState">
                                                <option>Registered</option>
                                                <option>Unregistered</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DContactName">Contact Person Name</label>
                                            <input class="form-control form-control-sm" type="text" id="DContactName" name="DContactName">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DContactEmail">Contact Person email ID</label>
                                            <input class="form-control form-control-sm" id="DContactEmail" name="DContactEmail" type="email">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="DMobileNo">Contact Person Mobile No</label>
                                            <input class="form-control form-control-sm" type="number" id="DMobileNo" name="DMobileNo">
                                        </div>
                                    </div>

                                    <div class="col-12 float-right" style="text-align: end; ">
                                        <button type="submit" class="btn btn-primary">Add Shipping Address</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <div class="card-header">
                                                <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                            </div>

                                            <div class="card-body" style="background-color: #F8F8F8;font-size: 14px !important;">
                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">0001</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">1007</div>
                                                </div> 
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Kolkata</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">West Bengal</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Name</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Sayanti Nandi</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">sayanti@zicorp.in</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                    <div class="col-lg-6 text-md-end text-lg-end text-xl-end text-xxl-end" style="font-size: 14px; color: #808080;">9856325895</div>
                                                </div>
                                            </div>

                                            <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <div class="card-header">
                                                <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                            </div>

                                            <div class="card-body" style="background-color: #F8F8F8;font-size: 14px !important;">
                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                    <div class="col-lg-6 " style="font-size: 14px; color: #808080;">0001</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">1007</div>
                                                </div> 
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Kolkata</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row">
                                                    <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">West Bengal</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Name</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">Sayanti Nandi</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                    <div class="col-lg-6" style="font-size: 14px; color: #808080;">sayanti@zicorp.in</div>
                                                </div>
                                                <div class="MultipleShippingCardBodyBorder"></div>

                                                <div class="row d-justify-content-between">
                                                    <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                    <div class="col-lg-6 text-md-end text-lg-end text-xl-end text-xxl-end" style="font-size: 14px; color: #808080;">9856325895</div>
                                                </div>
                                            </div>

                                            <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div> --}}


                        <!-- Bootstrap Modal for BuyerAddress delete-->


                        <!-- Bootstrap Modal for adding Buyer entries -->
                        {{-- <div aria-hidden="true" aria-labelledby="addBuyerModalLabel" class="modal fade" id="addBuyerModal" tabindex=-1>
                        <div class="modal-dialog modal-lg">
                            <form id="BuyerForm">
                                <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                    <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                        <h5 class="modal-title" id="addBuyerModalLabel">Add Buyer</h5>
                                        <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Basic Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="BuyerName">Buyer Name</label>
                                                                    <input class="form-control form-control-sm" id="BuyerName" name="BuyerName" type="text" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="ShortName">Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="ShortName" name="ShortName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Address1">Billing Address Line1</label>
                                                                    <textarea class="form-control form-control-sm" id="Address1" name="Address1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="Address2">Billing Address Line2</label>
                                                                    <textarea class="form-control form-control-sm" id="Address2" name="Address2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="State">State</label>
                                                                    <select class="form-control-dropdown select2" id="State" name="State" required>
                                                                        <option>West Bengal</option>
                                                                        <option>Jharkhand</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="Country">Country</label>
                                                                    <select class="form-control-dropdown select2" id="Country" name="Country" required>
                                                                        <option>India</option>
                                                                        <option>USA</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="PinCode">Pin Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="PinCode" name="PinCode" required>
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
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ContactName">Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="ContactName" name="ContactName" required>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ContactEmail">Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="ContactEmail" name="ContactEmail" required type="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="MobileNo">Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" type="number" id="MobileNo" name="MobileNo" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-12">                        
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Shipping Address</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ShippingShortName">Shipping Address Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="ShippingShortName" name="ShippingShortName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="Zone">Zone</label>
                                                                    <input class="form-control form-control-sm" type="number" id="Zone" name="Zone" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ShortCode">Shipping Short Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="ShortCode" name="ShortCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="PartyCode">Shipping Party Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="PartyCode" name="PartyCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="Destination">Destination</label>
                                                                    <input class="form-control form-control-sm" type="text" id="Destination" name="Destination" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="PlaceofSupply">Place of Supply</label>
                                                                    <input class="form-control form-control-sm" type="text" id="PlaceofSupply" name="PlaceofSupply" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DAddress1">Address Line 1</label>
                                                                    <textarea class="form-control form-control-sm" id="DAddress1" name="DAddress1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DAddress2">Address Line 2</label>
                                                                    <textarea class="form-control form-control-sm" id="DAddress2" name="DAddress2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DState">State</label>
                                                                    <select class="form-control-dropdown select2" id="DState" name="DState" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DContactName">Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="DContactName" name="DContactName" required>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DContactEmail">Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="DContactEmail" name="DContactEmail" required type="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="DMobileNo">Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" type="number" id="DMobileNo" name="DMobileNo" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 float-right" style="text-align: end; ">
                                                                <button type="submit" class="btn btn-primary">Add Shipping Address</button>
                                                            </div>
                                                        </div>
            
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>
            
                                                                    <div class="card-body" style="background-color: #F8F8F8;font-size: 14px !important;">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">0001</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">1007</div>
                                                                        </div> 
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Kolkata</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">West Bengal</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Name</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Sayanti Nandi</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">sayanti@zicorp.in</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                                            <div class="col-lg-6 text-md-end text-lg-end text-xl-end text-xxl-end" style="font-size: 14px; color: #808080;">9856325895</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>
            
                                                                    <div class="card-body" style="background-color: #F8F8F8;font-size: 14px !important;">
                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                                            <div class="col-lg-6 " style="font-size: 14px; color: #808080;">0001</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">1007</div>
                                                                        </div> 
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Kolkata</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row">
                                                                            <div class="col-lg-6 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">West Bengal</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Name</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">Sayanti Nandi</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                                            <div class="col-lg-6" style="font-size: 14px; color: #808080;">sayanti@zicorp.in</div>
                                                                        </div>
                                                                        <div class="MultipleShippingCardBodyBorder"></div>

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-6" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                                            <div class="col-lg-6 text-md-end text-lg-end text-xl-end text-xxl-end" style="font-size: 14px; color: #808080;">9856325895</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                                                    </div>
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
                                        <button class="btn btn-primary" onclick=addBuyerEntry() type="button">Add Buyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}

                        <!-- Bootstrap Modal for editing Buyer entries -->
                        {{-- <div aria-hidden="true" aria-labelledby="editBuyerModalLabel" class="fade modal" id="editBuyerModal" tabindex=-1>
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="background-color: rgb(233, 232, 230);">
                                <div class="modal-header" style="background-color: #17a2b8;color: #fff;">
                                    <h5 class="modal-title" id="editBuyerModalLabel">Edit Buyer</h5>
                                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                </div>

                                <form>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header"><h3 class="card-title">Basic Details</h3></div>
                                                    
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="editBuyerName">Buyer Name</label>
                                                                    <input class="form-control form-control-sm" id="editBuyerName" name="editBuyerName" type="text" required>
                                                                </div>
                                                            </div>
                                
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="editShortName">Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editShortName" name="editShortName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="editAddress1">Billing Address Line 1</label>
                                                                    <textarea class="form-control form-control-sm" id="editAddress1" name="editAddress1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="editAddress2">Billing Address Line 2</label>
                                                                    <textarea class="form-control form-control-sm" id="editAddress2" name="editAddress2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editState">State</label>
                                                                    <select class="form-control-dropdown select2" id="editState" name="editState" required>
                                                                        <option>West Bengal</option>
                                                                        <option>Jharkhand</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editCountry">Country</label>
                                                                    <select class="form-control-dropdown select2" id="editCountry" name="editCountry" required>
                                                                        <option>India</option>
                                                                        <option>USA</option>
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
                                                        <h3 class="card-title">Contact Details</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editContactName">Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editContactName" name="editContactName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editContactEmail">Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="editContactEmail" name="editContactEmail" type="email" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editMobileNo">Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" type="number" id="editMobileNo" name="editMobileNo" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="card card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Shipping Address</h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row mb-4">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editShippingShortName">Shipping Address Short Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editShippingShortName" name="editShippingShortName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editZone">Zone</label>
                                                                    <input class="form-control form-control-sm" type="number" id="editZone" name="editZone" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editShortCode">Shipping Short Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="editShortCode" name="editShortCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editPartyCode">Shipping Party Code</label>
                                                                    <input class="form-control form-control-sm" type="number" id="editPartyCode" name="editPartyCode" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDestination">Destination</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editDestination" name="editDestination" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editPlaceofSupply">Place of Supply</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editPlaceofSupply" name="editPlaceofSupply" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDAddress1">Address Line 1</label>
                                                                    <textarea class="form-control form-control-sm" id="editDAddress1" name="editDAddress1" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDAddress2">Address Line 2</label>
                                                                    <textarea class="form-control form-control-sm" id="editDAddress2" name="editDAddress2" type="text" rows="2" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDState">State</label>
                                                                    <select class="form-control-dropdown select2" id="editDState" name="editDState" required>
                                                                        <option>Registered</option>
                                                                        <option>Unregistered</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDContactName">Contact Person Name</label>
                                                                    <input class="form-control form-control-sm" type="text" id="editDContactName" name="editDContactName" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDContactEmail">Contact Person email ID</label>
                                                                    <input class="form-control form-control-sm" id="editDContactEmail" name="editDContactEmail" required type="email">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="editDMobileNo">Contact Person Mobile No</label>
                                                                    <input class="form-control form-control-sm" type="number" id="editDMobileNo" name="editDMobileNo" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 float-right" style="text-align: end; ">
                                                                <button type="submit" class="btn btn-primary">Add Shipping Address</button>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>

                                                                    <div class="card-body" style="background-color: #F8F8F8;">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">0001</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">1007</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Kolkata</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">West Bengal</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person Name</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Sayanti Nandi</div>
                                                                        </div> <br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">sayanti@zicorp.in</div>
                                                                        </div> <br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">9856325895</div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6">
                                                                <div class="card card-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                                                    <div class="card-header">
                                                                        <h3 class="card-title">Shipping Address Short Name (Zone)</h3>
                                                                    </div>

                                                                    <div class="card-body" style="background-color: #F8F8F8;">
                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Short Code</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">0001</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Party Code</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">1007</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Destination</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Kolkata</div>
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Place of Supply</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat</div>
                                                                        </div><br />
                                                                        
                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 1</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Rajarhat, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">Address 2</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Newtown, Kolkata, Chakpachuria,West Bengal 700156, India</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row">
                                                                            <div class="col-lg-4 d-flex flex-row" style="font-size:14px;color:#000">State</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">West Bengal</div>
                                                                        </div><br />
                                                                        <div style="border-bottom: 1px solid #9d9e9f;">
                                                                        </div><br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person Name</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">Sayanti Nandi</div>
                                                                        </div> <br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person email ID</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">sayanti@zicorp.in</div>
                                                                        </div> <br />

                                                                        <div class="row d-justify-content-between">
                                                                            <div class="col-lg-4" style="font-size:14px;color:#000">Contact Person Mobile No</div>
                                                                            <div class="col-lg-8" style="font-size: 10px; color: #808080;">9856325895</div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="card-footer" style="text-align: center;background-color: #F0F0F0">
                                                                        <img alt="Delete" src="img/Delete.png" style="height: 20px; text-align: center;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=modal-footer>
                                        <button class="btn btn-secondary" data-bs-dismiss=modal type=button>Cancel</button>
                                        <button class="btn btn-primary" onclick=updateBuyerEntry() type=button>Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
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
   
                if (valBuyerName.length < 3 || valBuyerName.length > 30) {
                    $("#buyer_name").focus().select();
                    showMessage('Buyer Name should be between 3 and 30 characters');                    
                    return false;
                }
               
                if (valShortName.length < 3 || valShortName.length > 10) {
                    $("#short_name").focus().select();                    
                    showMessage('Short Name should be between 3 and 10 characters')                    
                    return false;
                }

                if (valState.length == "") {                   
                    showMessage('Select state')                    
                    return false;
                }
              
                if (valAddress1.length < 3 || valAddress1.length > 30) {
                    $("#address1").focus().select();                    
                    showMessage('Address 1 should be between 3 and 30 characters')                    
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
                    if (valGstinNo.length < 4) {
                        $("#gstin_no").focus().select();                    
                        showMessage('GSTIN No should be atleast 4 characrters')                    
                        return false;
                    }  
                }                              

                if (valContactName.length < 3 || valContactName.length > 30) {
                    $("#contact_name").focus().select();
                    showMessage('Contact Name should be between 3 and 30 characters');                    
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
                // event.preventDefault();
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
                                return '<div class="d-flex">' +
                                    '<button type="button" id="btnEdit" class="btn btn-outline-primary btn-sm editRecordBtn" data-id="' +
                                    row.id + '"><i class="fas fa-solid fa-pen"></i></button>' +
                                    '<button type="button" class="btn btn-outline-danger btn-sm deleteRecordBtn" data-id="' +
                                    row.id +
                                    '" style="margin-left: 10px;"><i class="fas fa-solid fa-trash"></i></button>' +
                                    '<button type="button" class="btn btn-outline-success btn-sm showShippingBtn" data-id="' +
                                    row.id +
                                    '" style="margin-left: 10px;"><i class="fas fa-solid fa-address-book"></i></button>' +
                                    '</div>';
                            }
                        },
                        {
                            "data": "buyer_name"
                        },
                        {
                            "data": "buyer_short_name"
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                // Concatenate address1, country, state, and pinCode
                                return row.buyer_address1 + ', ' + row.buyer_state + ', ' + row.buyer_pincode + ', ' + row.buyer_country;
                            }
                        },
                        {
                            "data": "buyer_gstin_no"
                        },
                        {
                            "data": "buyer_gstin"
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
                    var f_sl_no                 = $('#sl_no').val();

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
                    console.log(dt);
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
        });
    </script>
@endsection
