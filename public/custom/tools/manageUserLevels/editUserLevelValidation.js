// Class definition
var editUserLevelValidation = (function () {
    // Private functions
    var initDatatable = function () {
        const fv = FormValidation.formValidation(
            document.getElementById("edit_user_level_form"),
            {
                fields: {
                    name: {
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
                .getElementById("editUserLevelSubmitBtn")
                .setAttribute("data-kt-indicator", "on");

            // Disable button to avoid multiple click
            document.getElementById("editUserLevelSubmitBtn").disabled = true;

            // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
            var formx = $("#edit_user_level_form")[0]; // You need to use standart javascript object here
            var formDatax = new FormData(formx);
            var selectedID = formDatax.get('id');
            $.ajax({
                url: "/userLevel/edit/"+selectedID,
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
                        $("#edit_user_level_form").trigger("reset");
                        $("#editUserLevel").modal("toggle");
                        $("#user_level_dt").DataTable().ajax.reload();
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
                        .getElementById("editUserLevelSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editUserLevelSubmitBtn"
                    ).disabled = false;
                    location.reload();
                    //  event.preventDefault();
                },
                error: function (response) {
                    // Handle BACK END validation errors and display them to the user
                    var errors = response.responseJSON.errors;
                    console.log(errors);
                    for (var field in errors) {
                        // Display errors for each field (e.g., in a div with the corresponding field name)
                        $("#" + field + "_error_edit").html(errors[field][0]);
                    }
                    document
                        .getElementById("editUserLevelSubmitBtn")
                        .setAttribute("data-kt-indicator", "off");
                    document.getElementById(
                        "editUserLevelSubmitBtn"
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
    editUserLevelValidation.init();

    jQuery(document).off('change', '#edit_user_level_form [type="checkbox"]');
    jQuery(document).on('change', '#edit_user_level_form [type="checkbox"]', function(e) {
      console.log($(this).is(':checkbox'));
      var thisname = $(this).attr('name');
      if($(this).is(":checked")){
        $('#edit_user_level_form .'+thisname).slideDown(250).prop('checked', true);
      }
      else {
        $('#edit_user_level_form .'+thisname).slideUp(250).prop('checked', false);
      }

    });
    // event.preventDefault();
    jQuery(document).off('click', '#edit_user_level_btn');
    jQuery(document).on('click', '#edit_user_level_btn', function(e) {
      var selectedID = $(this).data('id');
      var target = document.querySelector("#userLevelModalContent");
      var blockUI = new KTBlockUI(target, {
          message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
      });
      blockUI.block();
      $.ajax({
        url: "/userLevel/get/"+selectedID,
        type: "GET",
        contentType: false,
        cache: false,
        processData:false,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data){
          blockUI.release();
          blockUI.destroy();
          var obj = JSON.parse(data);
          if(obj){
            $('#edit_user_level_form [name="id"]').val(obj.id);
            $('#edit_user_level_form [name="name"]').val(obj.name);

            $('#edit_user_level_form [name="n1_crm"]').prop('checked', obj.n1_crm == 1).trigger('change');
              $('#edit_user_level_form [name="n2_dashboard"]').prop('checked', obj.n2_dashboard == 1).trigger('change');
            $('#edit_user_level_form [name="n1_tools"]').prop('checked', obj.n1_tools == 1).trigger('change');
              $('#edit_user_level_form [name="n2_users"]').prop('checked', obj.n2_users == 1);
              $('#edit_user_level_form [name="n2_user_roles"]').prop('checked', obj.n2_user_roles == 1);
              $('#edit_user_level_form [name="n2_projects"]').prop('checked', obj.n2_projects == 1);
              $('#edit_user_level_form [name="n2_images"]').prop('checked', obj.n2_images == 1);
              $('#edit_user_level_form [name="n2_categories"]').prop('checked', obj.n2_categories == 1);
              $('#edit_user_level_form [name="n2_crm_logs"]').prop('checked', obj.n2_crm_logs == 1);
          } 
        }
      });
    });
});
