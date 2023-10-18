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

<div class="modal fade" id="addProject" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addProject"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add Project
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
                <form class="form" id="add_project_form" enctype="multipart/form-data">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Project Name<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="project_name" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Project Name">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Project Description</label>
                        <div class="col-lg-10 fv-row">
                            <textarea name="project_description" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Project Description"></textarea>
                        </div>
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

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Logo Image Upload <span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="file" name="logo_file" placeholder="Leave blank"
                                class="form-control form-control-lg form-control-solid" accept=".png, .jpg" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Preview</label>
                        <div class="col-lg-10 fv-row logoImagePreview">
                        </div>
                    </div>

                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Map Image Upload<span
                                class="text-danger">*</span></label>
                        <div class="col-lg-10 fv-row">
                            <input type="file" name="map_file" placeholder="Leave blank"
                                class="form-control form-control-lg form-control-solid" accept=".png, .jpg" />
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Preview</label>
                        <div class="col-lg-10 fv-row mapImagePreview">
                        </div>
                    </div>
                  

                    {{-- Server Validation Errors --}}
                    <div class="error-box" style="display: none;">
                        <div id="" class="error-message">Server Validation Errors</div>
                        <div id="project_name_error" class="error-message"></div>
                        <div id="project_description_error" class="error-message"></div>
                        <div id="status_error" class="error-message"></div>
                        <div id="map_file_error" class="error-message"></div>
                        <div id="logo_file_error" class="error-message"></div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addProjectSubmitBtn" class="btn btn-primary font-weight-bold"
                    data-project-add-route="{{ route('project.add') }}">Add Project</button>
            </div>
            </form>
        </div>
    </div>
</div>