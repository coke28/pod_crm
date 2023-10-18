// Class definition
var addProjectValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("add_project_form"),
            {
                fields: {
                    project_name: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                    logo_file: {
                        validators: {
                            logo_file: {
                                extension: "jpeg,jpg,png,gif",
                                type: "image/jpeg,image/png,image",
                                maxSize: 5 * 1024 * 1024, // 5 MB
                                message: "The selected logo_file is not valid",
                            },
                        },
                    },
                    map_file: {
                        validators: {
                            logo_file: {
                                extension: "jpeg,jpg,png,gif",
                                type: "image/jpeg,image/png,image",
                                maxSize: 5 * 1024 * 1024, // 5 MB
                                message: "The selected logo_file is not valid",
                            },
                        },
                    },
                    status: {
                        validators: {
                            notEmpty: {
                                message: "This field is required.",
                            },
                        },
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row",
                        eleInvalidClass: "",
                        eleValidClass: "",
                    }),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    excluded: new FormValidation.plugins.Excluded({
                        excluded: function (field, element, elements) {
                            // field is the field name
                            // element is the field element
                            // elements is the list of field elements in case
                            // we have multiple elements with the same name
                            return $(element).is(":hidden");
                            // return true if you want to exclude the field
                        },
                    }),
                },
            }
        );

        // this function listens to the form validation
        fv.on("core.form.valid", function () {
            // Show loading indication

            document
                .getElementById("addProjectSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("addProjectSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#add_project_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var projectAddRoute = $("#addProjectSubmitBtn").data(
                "project-add-route"
            );
            $.ajax({
                url: projectAddRoute,
                type: "POST",
                data: formDatax,
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.success) {
                        toastr.options = {
                            closeButton: false,
                            debug: false,
                            newestOnTop: false,
                            progressBar: false,
                            positionClass: "toast-bottom-right",
                            preventDuplicates: false,
                            onclick: null,
                            showDuration: "300",
                            hideDuration: "1000",
                            timeOut: "5000",
                            extendedTimeOut: "1000",
                            showEasing: "swing",
                            hideEasing: "linear",
                            showMethod: "fadeIn",
                            hideMethod: "fadeOut",
                        };

                        toastr.success(data.message, "Success");
                        $("#add_project_form").trigger("reset");
                        $("#addProject").modal("toggle");
                        $("#project_dt").DataTable().ajax.reload();
                        $("#add_project_form .logoImagePreview").html("");
                        $("#add_project_form .mapImagePreview").html("");
                    } else {
                        Swal.fire({
                            text: data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary",
                            },
                        });
                        // window.location.reload();
                    }
                    $(".error-box").hide();
                    document
                        .getElementById("addProjectSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "addProjectSubmitBtn"
                    ).disabled = false;
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.errors;
                    for (var field in errors) {
                        // Display errors for each field (e.g., in a div with the corresponding field name)
                        $("#" + field + "_error").html(errors[field][0]);
                    }
                    document
                        .getElementById("addProjectSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "addProjectSubmitBtn"
                    ).disabled = false;
                    // Show the error box
                    $(".error-box").show();
                },
            });
        });
    };
    return {
        // public functions
        init: function () {
            console.log("here");
            // form is binded and initiliazed here
            initDatatable();
        },
    };
})();

jQuery(document).ready(function () {
    //DONT FOGET THIS!!!
    addProjectValidation.init();

    jQuery(document).off("change", '#add_project_form [name="logo_file"]');
    jQuery(document).on("change", '#add_project_form [name="logo_file"]', function (e) {
        console.log(this.files);
        var goodInput = true;

        if (!(this.files && this.files[0])) {
            goodInput = false;
        }

        if (goodInput) {
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/jpeg","image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                goodInput = false;
                console.log("yep invalid file type");
            }
        }

        if (goodInput) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#add_project_form .logoImagePreview").html(
                    `
                    <img class="img-fluid" src="` +
                        e.target.result +
                        `">
              `
                );
            };

            reader.readAsDataURL(this.files[0]);
        } else {
            Swal.fire({
                text: "Invalid image format",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            });
            $(this).val("");
        }
    });

    jQuery(document).off("change", '#add_project_form [name="map_file"]');
    jQuery(document).on("change", '#add_project_form [name="map_file"]', function (e) {
        console.log(this.files);
        var goodInput = true;

        if (!(this.files && this.files[0])) {
            goodInput = false;
        }

        if (goodInput) {
            var file = this.files[0];
            var fileType = file["type"];
            var validImageTypes = ["image/jpg", "image/jpeg","image/png"];
            if ($.inArray(fileType, validImageTypes) < 0) {
                goodInput = false;
                console.log("yep invalid file type");
            }
        }

        if (goodInput) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $("#add_project_form .mapImagePreview").html(
                    `
                    <img class="img-fluid" src="` +
                        e.target.result +
                        `">
              `
                );
            };

            reader.readAsDataURL(this.files[0]);
        } else {
            Swal.fire({
                text: "Invalid image format",
                icon: "info",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary",
                },
            });
            $(this).val("");
        }
    });

});
