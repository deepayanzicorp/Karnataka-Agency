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

                    <!-- Display added entries in a table -->
                    <div class="card-body">
                        <div class="table-responsive table-responsive-sm">
                            <table class="table table-bordered table-striped table-sm table-hover" id="tblData">
                                <thead class="TableHeadTheme">
                                    <tr>
                                        <th style="width: 40px;">Actions</th>
                                        <th>Buyer Name</th>
                                        <th>Short Name</th>
                                        <th>Billing Address Line 1 + Country + State + Pin</th>
                                        <th>Contact Person Name</th>
                                        <th>Shipping Address Short Name</th>                                             
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Bootstrap Modal for add or edit-->
                    <div aria-hidden="true" aria-labelledby="addAgentModalLabel" class="modal fade" id="addDetailsModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="background-color: #e9e8e6;">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addAgentModalLabel">Manage Details</h5>
                                    <button data-bs-dismiss="modal" type="button"><i class="fas fa-times"></i></button>
                                </div>

                                <div class="modal-body" id="addDetailsForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header modal-header">
                                                    <h3 class="card-title">Basic Details</h3>
                                                </div>

                                                <div class="card-body" style="background-color: #e9e8e6;">
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
                                                                <input class="form-control form-control-sm" id="BuyerName" name="BuyerName" type="text">
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="ShortName">Short Name</label>
                                                                <input class="form-control form-control-sm" type="text" id="ShortName" name="ShortName">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Address1">Billing Address Line1</label>
                                                                <textarea class="form-control form-control-sm" id="Address1" name="Address1" type="text" rows="2"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="Address2">Billing Address Line2</label>
                                                                <textarea class="form-control form-control-sm" id="Address2" name="Address2" type="text" rows="2"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="State">State</label>
                                                                <select class="form-control-dropdown select2" id="State" name="State">
                                                                    <option>West Bengal</option>
                                                                    <option>Jharkhand</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="Country">Country</label>
                                                                <select class="form-control-dropdown select2" id="Country" name="Country">
                                                                    <option>India</option>
                                                                    <option>USA</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="PinCode">Pin Code</label>
                                                                <input class="form-control form-control-sm" type="number" id="PinCode" name="PinCode">
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

                                                <div class="card-body" style="background-color: #e9e8e6;">
                                                    <div class="row mb-4">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ContactName">Contact Person Name</label>
                                                                <input class="form-control form-control-sm" type="text" id="ContactName" name="ContactName">
                                                            </div>
                                                        </div>
        
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="ContactEmail">Contact Person email ID</label>
                                                                <input class="form-control form-control-sm" id="ContactEmail" name="ContactEmail" type="email">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="MobileNo">Contact Person Mobile No</label>
                                                                <input class="form-control form-control-sm" type="number" id="MobileNo" name="MobileNo">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sac_code">SAC Code</label>
                                                <input class="form-control form-control-sm" id="sac_code"
                                                    name="sac_code" type="text">
                                                    <span id="errSacCode" style="color: red;">Please provide sac code</span>
                                            </div>
                                        </div>
                                        <div class=col-md-4>
                                            <div class="form-group">
                                                <label for="ka_gstin_no">KA GSTIN No</label>
                                                <input class="form-control form-control-sm" id="ka_gstin_no"
                                                    name="ka_gstin_no" type="text"
                                                    value="{{ isset($item) ? $item->ka_gstin_no : '' }}">
                                                    <span id="errKaGstinNo" style="color: red;">Please provide KaGstinNo</span>
                                            </div>
                                        </div>

                                        <div class=col-md-4>
                                            <div class="form-group">
                                                <label for="gstin_treatment">GSTIN Treatment</label>
                                                <div>
                                                    <select class="form-control-dropdown js-example-basic-single"
                                                        id="gstin_treatment" name="gstin_treatment" style="width: 100%">
                                                        <option value="">--Choose--</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>
                                                <span id="errGstinTreatment" style="color: red;">Please provide GstinTreatment</span>
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
                                                    <span id="errKgsslCode" style="color: red;">Please provide KgsslCode</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer justify-content-between ModalFooterBorder">
                                        <button class="btn btn-secondary" data-bs-dismiss="modal" type="button"
                                            id="addCompanyDetailsCancelBtn">Cancel</button>
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

                    <!-- Bootstrap Modal for adding Buyer entries -->
                    <div aria-hidden="true" aria-labelledby="addBuyerModalLabel" class="modal fade" id="addBuyerModal" tabindex=-1>
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
                    </div>

                    <!-- Bootstrap Modal for editing Buyer entries -->
                    <div aria-hidden="true" aria-labelledby="editBuyerModalLabel" class="fade modal" id="editBuyerModal" tabindex=-1>
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
        const BuyerTableBody = document.getElementById("BuyerTableBody");
        const noEntryFound = document.getElementById("noEntryFound");

        searchInput.addEventListener("input", function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            // Loop through the rows in the Buyer table
            let entryFound = false; // Flag to track if a matching entry is found

            for (let i = 0; i < BuyerTableBody.rows.length; i++) {
                const row = BuyerTableBody.rows[i];
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


    // Function to add a new Buyer entry
    function addBuyerEntry() {
        console.log("addBuyerEntry called");
        // Get form values
        const BuyerName = document.getElementById("BuyerName").value.trim();
        console.log("BuyerName:", BuyerName);
        const ShortName = document.getElementById("ShortName").value.trim();
        console.log("ShortName:", ShortName);
        const Address1 = document.getElementById("Address1").value.trim();
        console.log("Address1:", Address1);
        const Address2 = document.getElementById("Address2").value.trim();
        console.log("Address2:", Address2);
        const State = document.getElementById("State").value.trim();
        console.log("State:", State);
        const Country = document.getElementById("Country").value.trim();
        console.log("Country:", Country);
        const PinCode = document.getElementById("PinCode").value.trim();
        console.log("PinCode:", PinCode);
        const ContactName = document.getElementById("ContactName").value.trim();
        console.log("ContactName:", ContactName);
        const ContactEmail = document.getElementById("ContactEmail").value.trim();
        console.log("ContactEmail:", ContactEmail);
        const MobileNo = document.getElementById("MobileNo").value.trim();
        console.log("MobileNo:", MobileNo);
        const ShippingShortName = document.getElementById("ShippingShortName").value.trim();
        console.log("ShippingShortName:", ShippingShortName);
        const Zone = document.getElementById("Zone").value.trim();
        console.log("Zone:", Zone);
        const ShortCode = document.getElementById("ShortCode").value.trim();
        console.log("ShortCode:", ShortCode);
        const PartyCode = document.getElementById("PartyCode").value.trim();
        console.log("PartyCode:", PartyCode);
        const Destination = document.getElementById("Destination").value.trim();
        console.log("Destination:", Destination);
        const PlaceofSupply = document.getElementById("PlaceofSupply").value.trim();
        console.log("PlaceofSupply:", PlaceofSupply);
        const DAddress1 = document.getElementById("DAddress1").value.trim();
        console.log("DAddress1:", DAddress1);
        const DAddress2 = document.getElementById("DAddress2").value.trim();
        console.log("DAddress2:", DAddress2);
        const DState = document.getElementById("DState").value.trim();
        console.log("DState:", DState);
        const DContactName = document.getElementById("DContactName").value.trim();
        console.log("DContactName:", DSContactName);
        const DContactEmail = document.getElementById("DContactEmail").value.trim();
        console.log("DContactEmail:", DContactEmail);
        const DMobileNo = document.getElementById("DMobileNo").value.trim();
        console.log("DMobileNo:", DMobileNo);

        // Check if any of the required fields are empty
        if (!BuyerName || !ShortName || !Address1 || !Address2 || !State || !Country
            || !PinCode || !ContactName || !ContactEmail || !MobileNo || !ShippingShortName
            || !Zone || !ShortCode || !PartyCode || !Destination || !PlaceofSupply
            || !DAddress1 || !DAddress2 || !DState || !DContactName || !DContactEmail || !DMobileNo) {
            alert("Please fill in all the required fields.");
            return;
        }

        // Create a table row with the entered data
        const tableRow = document.createElement("tr");
        tableRow.innerHTML = `
                                <td>${BuyerName}</td>
                                <td>${ShortName}</td>
                                <td>${Address1}</td>
                                <td>${Address2}</td>
                                <td>${State}</td>
                                <td>${Country}</td>
                                <td>${PinCode}</td>
                                <td>${ContactName}</td>
                                <td>${ContactEmail}</td>
                                <td>${MobileNo}</td>
                                <td>${ShippingShortName}</td>
                                <td>${Zone}</td>
                                <td>${ShortCode}</td>
                                <td>${PartyCode}</td>
                                <td>${Destination}</td>
                                <td>${PlaceofSupply}</td>
                                <td>${DAddress1}</td>
                                <td>${DAddress2}</td>
                                <td>${DState}</td>
                                <td>${DContactName}</td>
                                <td>${DContactEmail}</td>
                                <td>${DMobileNo}</td>
        `;

        // Append the row to the table
        document.getElementById("BuyerTableBody").appendChild(tableRow);

        // Close the modal
        $('#addBuyerModal').modal('hide');

        // Clear the form fields
        document.getElementById("BuyerForm").reset();

        // Save the Buyer entry to Local Storage
        saveBuyerEntryToLocalStorage(BuyerName, ShortName, Address1, Address2, State,
            Country, PinCode, ContactName, ContactEmail, MobileNo, ShippingShortName, Zone,
            ShortCode, PartyCode, Destination, PlaceofSupply, DAddress1, DAddress2, DState,
            DContactName, DContactEmail, DMobileNo);
    }

    // Function to save Buyer entry to Local Storage
    function saveBuyerEntryToLocalStorage(BuyerName, ShortName, Address1, Address2, State,
        Country, PinCode, ContactName, ContactEmail, MobileNo, ShippingShortName, Zone,
        ShortCode, PartyCode, Destination, PlaceofSupply, DAddress1, DAddress2, DState,
        DContactName, DContactEmail, DMobileNo) {
        // Get existing entries from Local Storage or initialize an empty array
        let BuyerEntries = JSON.parse(localStorage.getItem("BuyerEntries")) || [];

        // Add the new entry to the array
        BuyerEntries.push({
            BuyerName,
            ShortName,
            Address1,
            Address2,
            State,
            Country,
            PinCode,
            ContactName,
            ContactEmail,
            MobileNo,
            ShippingShortName,
            Zone,
            ShortCode,
            PartyCode,
            Destination,
            PlaceofSupply,
            DAddress1,
            DAddress2,
            DState,
            DContactName,
            DContactEmail,
            DMobileNo
        });

        // Save the updated array back to Local Storage
        localStorage.setItem("BuyerEntries", JSON.stringify(BuyerEntries));
    }

    // Function to load Buyer entries from Local Storage
    function loadBuyerEntriesFromLocalStorage() {
        const BuyerEntries = JSON.parse(localStorage.getItem("BuyerEntries")) || [];

        // Loop through the entries and add them to the table
        BuyerEntries.forEach(entry => {
            const tableRow = document.createElement("tr");

            // Create a unique ID for each checkbox based on the Buyer name
            const checkboxId = `checkbox-${entry.BuyerName.replace(/ /g, "_")}`;

            tableRow.innerHTML = `
                                    <td><input type="checkbox" id="${checkboxId}" onchange="handleCheckboxChange(this)"></td>
                                    <td>${BuyerName}</td>
                                    <td>${ShortName}</td>
                                    <td>${Address1}</td>
                                    <td>${Address2}</td>
                                    <td>${State}</td>
                                    <td>${Country}</td>
                                    <td>${PinCode}</td>
                                    <td>${ContactName}</td>
                                    <td>${ContactEmail}</td>
                                    <td>${MobileNo}</td>
                                    <td>${ShippingShortName}</td>
                                    <td>${Zone}</td>
                                    <td>${ShortCode}</td>
                                    <td>${PartyCode}</td>
                                    <td>${Destination}</td>
                                    <td>${PlaceofSupply}</td>
                                    <td>${DAddress1}</td>
                                    <td>${DAddress2}</td>
                                    <td>${DState}</td>
                                    <td>${DContactName}</td>
                                    <td>${DContactEmail}</td>
                                    <td>${DMobileNo}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBuyerModal" onclick="editBuyerEntry(this.parentNode.parentNode)">Edit</button>

                                        <button class="btn btn-sm btn-danger" onclick="deleteBuyerEntry(this)">Delete</button>
                                    </td>
            `;

            document.getElementById("BuyerTableBody").appendChild(tableRow);
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

    // Load Buyer entries from Local Storage when the page loads
    loadBuyerEntriesFromLocalStorage();

    // Function to handle checkbox change
    function handleCheckboxChange(checkbox) {
        if (checkbox.checked) {
            // Get the unique ID of the checked checkbox
            const checkboxId = checkbox.id;
            console.log(`Selected checkbox with ID: ${checkboxId}`);
        }
    }

    // Load Buyer entries from Local Storage when the page loads
    loadBuyerEntriesFromLocalStorage();

    function editBuyerEntry(row) {

        // Extract the Buyer ID from the row
        const BuyerName = row.cells[0].textContent;

        // Find the corresponding Buyer entry in Local Storage or your data source
        const BuyerEntries = JSON.parse(localStorage.getItem("BuyerEntries")) || [];
        const BuyerRoEdit = BuyerEntries.find(entry => entry.BuyerName === BuyerName);

        // Check if a matching Buyer entry was found
        if (BuyerRoEdit) {
            // Pre-fill the edit modal form fields with the data
            document.getElementById("editBuyerName").value = BuyerRoEdit.BuyerName;
            document.getElementById("editShortName").value = BuyerRoEdit.ShortName;
            document.getElementById("editAddress1").value = BuyerRoEdit.Address1;
            document.getElementById("editAddress2").value = BuyerRoEdit.Address2;
            document.getElementById("editState").value = BuyerRoEdit.State;
            document.getElementById("editCountry").value = BuyerRoEdit.Country;
            document.getElementById("editPinCode").value = BuyerRoEdit.PinCode;
            document.getElementById("editContactName").value = BuyerRoEdit.ContactName;
            document.getElementById("editContactEmail").value = BuyerRoEdit.ContactEmail;
            document.getElementById("editMobileNo").value = BuyerRoEdit.MobileNo;
            document.getElementById("editShippingShortName").value = BuyerRoEdit.ShippingShortName;
            document.getElementById("editZone").value = BuyerRoEdit.Zone;
            document.getElementById("editShortCode").value = BuyerRoEdit.ShortCode;
            document.getElementById("editPartyCode").value = BuyerRoEdit.PartyCode;
            document.getElementById("editDestination").value = BuyerRoEdit.Destination;
            document.getElementById("editPlaceofSupply").value = BuyerRoEdit.PlaceofSupply;
            document.getElementById("editDAddress1").value = BuyerRoEdit.DAddress1;
            document.getElementById("editDAddress2").value = BuyerRoEdit.DAddress2;
            document.getElementById("editDState").value = BuyerRoEdit.DState;
            document.getElementById("editDContactName").value = BuyerRoEdit.DContactName;
            document.getElementById("editDContactEmail").value = BuyerRoEdit.DContactEmail;
            document.getElementById("editDMobileNo").value = BuyerRoEdit.DMobileNo;
            // Show the edit modal
            $('#editBuyerModal').modal('show');
        } else {
            alert("Buyer entry not found for editing.");
        }
    }

    function updateBuyerEntry() {
        // Get form values from the edit modal
        const editBuyerName = document.getElementById("editBuyerName").value;
        const editShortName = document.getElementById("editShortName").value;
        const editAddress1 = document.getElementById("editAddress1").value;
        const editAddress2 = document.getElementById("editAddress2").value;
        const editState = document.getElementById("editState").value;
        const editCountry = document.getElementById("editCountry").value;
        const editPinCode = document.getElementById("editPinCode").value;
        const editContactName = document.getElementById("editContactName").value;
        const editContactEmail = document.getElementById("editContactEmail").value;
        const editMobileNo = document.getElementById("editMobileNo").value;
        const editShippingShortName = document.getElementById("editShippingShortName").value;
        const editZone = document.getElementById("editZone").value;
        const editShortCode = document.getElementById("editShortCode").value;
        const editPartyCode = document.getElementById("editPartyCode").value;
        const editDestination = document.getElementById("editDestination").value;
        const editPlaceofSupply = document.getElementById("editPlaceofSupply").value;
        const editDAddress1 = document.getElementById("editDAddress1").value;
        const editDAddress2 = document.getElementById("editDAddress2").value;
        const editDCountry = document.getElementById("editDCountry").value;
        const editDState = document.getElementById("editDState").value;
        const editDContactName = document.getElementById("editDContactName").value;
        const editDContactEmail = document.getElementById("editDContactEmail").value;
        const editDMobileNo = document.getElementById("editDMobileNo").value;
        // Find the row in the table with the matching Buyer
        const table = document.getElementById("BuyerTableBody");
        for (let i = 0; i < table.rows.length; i++) {
            if (table.rows[i].cells[0].textContent === editBuyerName) {
                // Update all cells in the row with the new data
                table.rows[i].cells[1].textContent = editBuyerName;
                table.rows[i].cells[2].textContent = editShortName;
                table.rows[i].cells[3].textContent = editAddress1;
                table.rows[i].cells[4].textContent = editAddress2;
                table.rows[i].cells[1].textContent = editState;
                table.rows[i].cells[2].textContent = editCountry;
                table.rows[i].cells[2].textContent = editPinCode;
                table.rows[i].cells[3].textContent = editContactName;
                table.rows[i].cells[4].textContent = editContactEmail;
                table.rows[i].cells[1].textContent = editMobileNo;
                table.rows[i].cells[2].textContent = editShippingShortName;
                table.rows[i].cells[2].textContent = editZone;
                table.rows[i].cells[3].textContent = editShortCode;
                table.rows[i].cells[4].textContent = editPartyCode;
                table.rows[i].cells[3].textContent = editDestination;
                table.rows[i].cells[4].textContent = editPlaceofSupply;
                table.rows[i].cells[5].textContent = editDAddress1;
                table.rows[i].cells[3].textContent = editDAddress2;
                table.rows[i].cells[4].textContent = editDState;
                table.rows[i].cells[3].textContent = editDContactName;
                table.rows[i].cells[4].textContent = editDContactEmail;
                table.rows[i].cells[5].textContent = editDMobileNo;
                // Update Local Storage by finding and updating the corresponding entry
                const BuyerEntries = JSON.parse(localStorage.getItem("BuyerEntries")) || [];
                for (let j = 0; j < BuyerEntries.length; j++) {
                    if (BuyerEntries[j].BuyerName === editBuyerName) {
                        BuyerEntries[j].ShortName = editShortName;
                        BuyerEntries[j].Address1 = editAddress1;
                        BuyerEntries[j].Address2 = editAddress2;
                        BuyerEntries[j].State = editState;
                        BuyerEntries[j].State = editState;
                        BuyerEntries[j].PinCode = editPinCode;
                        BuyerEntries[j].ContactName = editContactName;
                        BuyerEntries[j].ContactEmail = editContactEmail;
                        BuyerEntries[j].MobileNo = editMobileNo;
                        BuyerEntries[j].ShippingShortName = editShippingShortName;
                        BuyerEntries[j].Zone = editZone;
                        BuyerEntries[j].ShortCode = editShortCode;
                        BuyerEntries[j].Country = editPartyCode;
                        BuyerEntries[j].PartyCode = editDestination;
                        BuyerEntries[j].PlaceofSupply = editPlaceofSupply;
                        BuyerEntries[j].DAddress1 = editDAddress1;
                        BuyerEntries[j].DAddress2 = editDAddress2;
                        BuyerEntries[j].DState = editDState;
                        BuyerEntries[j].DContactName = editDContactName;
                        BuyerEntries[j].DContactEmail = editDContactEmail;
                        BuyerEntries[j].DMobileNo = editDMobileNo
                        break; // Exit the loop once updated
                    }
                }

                localStorage.setItem("BuyerEntries", JSON.stringify(BuyerEntries));

                // Close the edit modal
                $('#editBuyerModal').modal('hide');

                // Clear the form fields in the edit modal
                document.getElementById("editBuyerName").value = "";
                document.getElementById("editShortName").value = "";
                document.getElementById("editAddress1").value = "";
                document.getElementById("editAddress2").value = "";
                document.getElementById("editState").value = "";
                document.getElementById("editCountry").value = "";
                document.getElementById("editPinCode").value = "";
                document.getElementById("editContactName").value = "";
                document.getElementById("editContactEmail").value = "";
                document.getElementById("editMobileNo").value = "";
                document.getElementById("editShippingShortName").value = "";
                document.getElementById("editZone").value = "";
                document.getElementById("editShortCode").value = "";
                document.getElementById("editPartyCode").value = "";
                document.getElementById("editDestination").value = "";
                document.getElementById("editPlaceofSupply").value = "";
                document.getElementById("editDAddress1").value = "";
                document.getElementById("editDAddress2").value = "";
                document.getElementById("editDState").value = "";
                document.getElementById("editDContactName").value = "";
                document.getElementById("editDContactEmail").value = "";
                document.getElementById("editDMobileNo").value = "";
                break;
            }
        }
    }

    function deleteBuyerEntry(buttonElement) {
        // Get the row containing the button
        const row = buttonElement.parentNode.parentNode;

        // Confirm the deletion with a confirmation dialog
        const confirmation = confirm("Are you sure you want to delete this Buyer entry?");
        if (confirmation) {
            // Remove the row from the table
            row.remove();

            // Update Local Storage by removing the deleted entry
            const BuyerNameToDelete = row.querySelector("td:first-child").textContent; // Get the Buyer ID from the first cell
            const BuyerEntries = JSON.parse(localStorage.getItem("BuyerEntries")) || [];
            const updatedBuyerEntries = BuyerEntries.filter(entry => entry.BuyerName !== BuyerNameToDelete);
            localStorage.setItem("BuyerEntries", JSON.stringify(updatedBuyerEntries));
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
