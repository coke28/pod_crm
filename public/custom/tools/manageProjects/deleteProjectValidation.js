$(document).ready(function (){

    jQuery(document).off('click', '#delete_project');
    jQuery(document).on('click', '#delete_project', function(e) {
      e.preventDefault();
      var id = $(this).data('id');
        //makes sent data name in dt to lowercase
      //console.log($(this).data());
      Swal.fire({
          html: `Are you sure you want to delete ID: `+$(this).data('id')+` `+$(this).data('projectname')+`?`,
          icon: "info",
          buttonsStyling: false,
          showCancelButton: true,
          confirmButtonText: "Delete",
          cancelButtonText: 'Cancel',
          customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: 'btn btn-danger'
          }
      }).then(function (result) {

          if(result.isConfirmed){
            var target = document.querySelector("#project_dt");
            var blockUI = new KTBlockUI(target, {
                message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>',
            });
            blockUI.block();
            $.ajax({
              url: "/project/delete/"+id,
              type: "POST",
              contentType: false,
              cache: false,
              processData:false,
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success: function (data){
                data = JSON.parse(data);
                toastr.options = {
                 "closeButton": false,
                 "debug": false,
                 "newestOnTop": false,
                 "progressBar": false,
                 "positionClass": "toast-bottom-right",
                 "preventDuplicates": false,
                 "onclick": null,
                 "showDuration": "300",
                 "hideDuration": "1000",
                 "timeOut": "5000",
                 "extendedTimeOut": "1000",
                 "showEasing": "swing",
                 "hideEasing": "linear",
                 "showMethod": "fadeIn",
                 "hideMethod": "fadeOut"
               };

               toastr.success(data.message, "Success");
               blockUI.release();
               blockUI.destroy();
               $('#project_dt').DataTable().ajax.reload();
              },  
              error: function (response) {
                // Handle BACK END validation errors and display them to the user
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  };
                  console.log(response);
                  toastr.error(response.responseJSON.error, "Error");
                  blockUI.release();
                  blockUI.destroy();
            },
            });
          }
      });

    });

  });
