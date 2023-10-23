<style type="text/css">
    .error-box {
        border: 1px solid red;
        /* Add a red border around the error messages */
        background-color: #fdd;
        /* Set a background color for the error messages box */
        padding: 10px;
        /* Add some padding to create space around the error messages */
        margin-bottom: 10px;
        /* Optional: Add some space between the error box and the form fields */
    }

    .error-message {
        color: red;
        /* Set the text color to red */
        font-size: 14px;
        /* Optional: Adjust the font size */
    }
</style>

<div class="modal fade" id="addUserLevel" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="addUserLevel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add User Level
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i aria-hidden="true" class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="formAlertDiv">

                </div>
                <form class="form" id="add_user_level_form">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Level Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Level Name">
                        </div>
                    </div>
                    <div class="fv-row mb-6">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="n1_crm" value="1" checked />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">CRM Apps
                            </span>
                        </label>
                    </div>
                    <div class="fv-row mb-6 ms-10 n1_crm">
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_crm" type="checkbox" name="n2_dashboard" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Dashboard
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6 ms-10 n2_dashboard">

                        </div>
                    </div>

                    <div class="fv-row mb-6">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="n1_tools" value="1" checked />
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Tools
                            </span>
                        </label>
                    </div>

                    <div class="fv-row mb-6 ms-10 n1_tools">
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_users" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage Users
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_user_roles" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage User Levels
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_projects" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage Projects
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_images" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage Images
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_categories" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage Categories
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_forms" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage Forms
                                </span>
                            </label>
                        </div>
                        <div class="fv-row mb-6">
                            <label class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input n1_tools" type="checkbox" name="n2_crm_logs" value="1"
                                    checked />
                                <span class="form-check-label fw-bold text-gray-700 fs-6">Manage CRM Logs
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="name_error" class="error-message"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addUserLevelSubmitBtn" class="btn btn-primary font-weight-bold"
                    data-user-level-add-route="{{ route('userLevel.add') }}">Add User Level</button>
            </div>
            </form>
        </div>
    </div>
</div>