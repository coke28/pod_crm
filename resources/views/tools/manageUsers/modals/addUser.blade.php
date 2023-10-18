<style type="text/css">
.error-box {
    border: 1px solid red; /* Add a red border around the error messages */
    background-color: #fdd; /* Set a background color for the error messages box */
    padding: 10px; /* Add some padding to create space around the error messages */
    margin-bottom: 10px; /* Optional: Add some space between the error box and the form fields */
}

.error-message {
    color: red; /* Set the text color to red */
    font-size: 14px; /* Optional: Adjust the font size */
}
</style>

<div class="modal fade" id="addUser" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addUser"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add User
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
                <form class="form" id="add_user_form">
                    {{-- <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Username <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="username" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Username">
                        </div>
                    </div> --}}
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">First Name <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="first_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter First Name">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Last Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="last_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Last Name">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">User Level</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="user_level_id" id="user_level_id">
                                @foreach ($userLevels as $userLevel )
                                <option value="{{ $userLevel->id }}">{{ $userLevel->name  }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Email Address<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="email" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Email">
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Password<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="password" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Password"></input>
                        </div>
                         *Leave blank to save as default password (password).

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    {{-- Server Validation Errors --}}
                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="first_name_error" class="error-message"></div>
                        <div id="last_name_error" class="error-message"></div>
                        <div id="user_level_id_error" class="error-message"></div>
                        <div id="email_error" class="error-message"></div>
                        <div id="password_error" class="error-message"></div>
                        <div id="status_error" class="error-message"></div>
                    </div>
                    {{-- <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Upload <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="file" name="file" placeholder="Leave blank"
                                class="form-control form-control-lg form-control-solid" accept=".png, .jpg" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Preview</label>
                        <div class="col-lg-10 fv-row userImagePreview">

                        </div>
                    </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addUserSubmitBtn" class="btn btn-primary font-weight-bold"
                    data-user-add-route="{{ route('user.add') }}">Add User</button>
            </div>
            </form>
        </div>
    </div>
</div>