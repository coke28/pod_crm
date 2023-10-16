/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/assets/extended/js/custom/authentication/password-reset/new-password.js":
/*!*******************************************************************************************!*\
  !*** ./resources/assets/extended/js/custom/authentication/password-reset/new-password.js ***!
  \*******************************************************************************************/
/***/ (() => {

eval("\n\n// Class Definition\nvar KTPasswordResetNewPassword = function () {\n  // Elements\n  var form;\n  var submitButton;\n  var validator;\n  var passwordMeter;\n  var handleForm = function handleForm(e) {\n    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/\n    validator = FormValidation.formValidation(form, {\n      fields: {\n        'password': {\n          validators: {\n            notEmpty: {\n              message: 'The password is required'\n            },\n            callback: {\n              message: 'Please enter valid password',\n              callback: function callback(input) {\n                if (input.value.length > 0) {\n                  return validatePassword();\n                }\n              }\n            }\n          }\n        },\n        'confirm-password': {\n          validators: {\n            notEmpty: {\n              message: 'The password confirmation is required'\n            },\n            identical: {\n              compare: function compare() {\n                return form.querySelector('[name=\"password\"]').value;\n              },\n              message: 'The password and its confirm are not the same'\n            }\n          }\n        },\n        'toc': {\n          validators: {\n            notEmpty: {\n              message: 'You must accept the terms and conditions'\n            }\n          }\n        }\n      },\n      plugins: {\n        trigger: new FormValidation.plugins.Trigger({\n          event: {\n            password: false\n          }\n        }),\n        bootstrap: new FormValidation.plugins.Bootstrap5({\n          rowSelector: '.fv-row',\n          eleInvalidClass: '',\n          eleValidClass: ''\n        })\n      }\n    });\n    submitButton.addEventListener('click', function (e) {\n      e.preventDefault();\n      validator.revalidateField('password');\n      validator.validate().then(function (status) {\n        if (status == 'Valid') {\n          // Show loading indication\n          submitButton.setAttribute('data-kt-indicator', 'on');\n\n          // Disable button to avoid multiple click\n          submitButton.disabled = true;\n\n          // Simulate ajax request\n          axios.post(submitButton.closest('form').getAttribute('action'), new FormData(form)).then(function (response) {\n            // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n            Swal.fire({\n              text: \"You have successfully reset your password!\",\n              icon: \"success\",\n              buttonsStyling: false,\n              confirmButtonText: \"Ok, got it!\",\n              customClass: {\n                confirmButton: \"btn btn-primary\"\n              }\n            }).then(function (result) {\n              if (result.isConfirmed) {\n                window.location.href = '/login';\n                form.querySelector('[name=\"email\"]').value = \"\";\n                form.querySelector('[name=\"password\"]').value = \"\";\n                form.querySelector('[name=\"confirm-password\"]').value = \"\";\n                passwordMeter.reset(); // reset password meter\n              }\n            });\n          })[\"catch\"](function (error) {\n            var dataMessage = error.response.data.message;\n            var dataErrors = error.response.data.errors;\n            for (var errorsKey in dataErrors) {\n              if (!dataErrors.hasOwnProperty(errorsKey)) continue;\n              dataMessage += \"\\r\\n\" + dataErrors[errorsKey];\n            }\n            if (error.response) {\n              Swal.fire({\n                text: dataMessage,\n                icon: \"error\",\n                buttonsStyling: false,\n                confirmButtonText: \"Ok, got it!\",\n                customClass: {\n                  confirmButton: \"btn btn-primary\"\n                }\n              });\n            }\n          }).then(function () {\n            // always executed\n            // Hide loading indication\n            submitButton.removeAttribute('data-kt-indicator');\n\n            // Enable button\n            submitButton.disabled = false;\n          });\n        } else {\n          // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/\n          Swal.fire({\n            text: \"Sorry, looks like there are some errors detected, please try again.\",\n            icon: \"error\",\n            buttonsStyling: false,\n            confirmButtonText: \"Ok, got it!\",\n            customClass: {\n              confirmButton: \"btn btn-primary\"\n            }\n          });\n        }\n      });\n    });\n    form.querySelector('input[name=\"password\"]').addEventListener('input', function () {\n      if (this.value.length > 0) {\n        validator.updateFieldStatus('password', 'NotValidated');\n      }\n    });\n  };\n  var validatePassword = function validatePassword() {\n    return passwordMeter.getScore() > 50;\n  };\n\n  // Public Functions\n  return {\n    // public functions\n    init: function init() {\n      form = document.querySelector('#kt_new_password_form');\n      submitButton = document.querySelector('#kt_new_password_submit');\n      passwordMeter = KTPasswordMeter.getInstance(form.querySelector('[data-kt-password-meter=\"true\"]'));\n      handleForm();\n    }\n  };\n}();\n\n// On document ready\nKTUtil.onDOMContentLoaded(function () {\n  KTPasswordResetNewPassword.init();\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvYXNzZXRzL2V4dGVuZGVkL2pzL2N1c3RvbS9hdXRoZW50aWNhdGlvbi9wYXNzd29yZC1yZXNldC9uZXctcGFzc3dvcmQuanMiLCJtYXBwaW5ncyI6IkFBQWE7O0FBRWI7QUFDQSxJQUFJQSwwQkFBMEIsR0FBRyxZQUFZO0VBQ3pDO0VBQ0EsSUFBSUMsSUFBSTtFQUNSLElBQUlDLFlBQVk7RUFDaEIsSUFBSUMsU0FBUztFQUNiLElBQUlDLGFBQWE7RUFFakIsSUFBSUMsVUFBVSxHQUFHLFNBQWJBLFVBQVVBLENBQWFDLENBQUMsRUFBRTtJQUMxQjtJQUNBSCxTQUFTLEdBQUdJLGNBQWMsQ0FBQ0MsY0FBYyxDQUNyQ1AsSUFBSSxFQUNKO01BQ0lRLE1BQU0sRUFBRTtRQUNKLFVBQVUsRUFBRTtVQUNSQyxVQUFVLEVBQUU7WUFDUkMsUUFBUSxFQUFFO2NBQ05DLE9BQU8sRUFBRTtZQUNiLENBQUM7WUFDREMsUUFBUSxFQUFFO2NBQ05ELE9BQU8sRUFBRSw2QkFBNkI7Y0FDdENDLFFBQVEsRUFBRSxTQUFBQSxTQUFVQyxLQUFLLEVBQUU7Z0JBQ3ZCLElBQUlBLEtBQUssQ0FBQ0MsS0FBSyxDQUFDQyxNQUFNLEdBQUcsQ0FBQyxFQUFFO2tCQUN4QixPQUFPQyxnQkFBZ0IsQ0FBQyxDQUFDO2dCQUM3QjtjQUNKO1lBQ0o7VUFDSjtRQUNKLENBQUM7UUFDRCxrQkFBa0IsRUFBRTtVQUNoQlAsVUFBVSxFQUFFO1lBQ1JDLFFBQVEsRUFBRTtjQUNOQyxPQUFPLEVBQUU7WUFDYixDQUFDO1lBQ0RNLFNBQVMsRUFBRTtjQUNQQyxPQUFPLEVBQUUsU0FBQUEsUUFBQSxFQUFZO2dCQUNqQixPQUFPbEIsSUFBSSxDQUFDbUIsYUFBYSxDQUFDLG1CQUFtQixDQUFDLENBQUNMLEtBQUs7Y0FDeEQsQ0FBQztjQUNESCxPQUFPLEVBQUU7WUFDYjtVQUNKO1FBQ0osQ0FBQztRQUNELEtBQUssRUFBRTtVQUNIRixVQUFVLEVBQUU7WUFDUkMsUUFBUSxFQUFFO2NBQ05D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Q2xELGFBQWEsQ0FBQyx5QkFBeUIsQ0FBQztNQUNoRWhCLGFBQWEsR0FBR21FLGVBQWUsQ0FBQ0MsV0FBVyxDQUFDdkUsSUFBSSxDQUFDbUIsYUFBYSxDQUFDLGlDQUFpQyxDQUFDLENBQUM7TUFFbEdmLFVBQVUsQ0FBQyxDQUFDO0lBQ2hCO0VBQ0osQ0FBQztBQUNMLENBQUMsQ0FBQyxDQUFDOztBQUVIO0FBQ0FvRSxNQUFNLENBQUNDLGtCQUFrQixDQUFDLFlBQVk7RUFDbEMxRSwwQkFBMEIsQ0FBQ3FFLElBQUksQ0FBQyxDQUFDO0FBQ3JDLENBQUMsQ0FBQyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvZXh0ZW5kZWQvanMvY3VzdG9tL2F1dGhlbnRpY2F0aW9uL3Bhc3N3b3JkLXJlc2V0L25ldy1wYXNzd29yZC5qcz9kM2EzIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG5cclxuLy8gQ2xhc3MgRGVmaW5pdGlvblxyXG52YXIgS1RQYXNzd29yZFJlc2V0TmV3UGFzc3dvcmQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAvLyBFbGVtZW50c1xyXG4gICAgdmFyIGZvcm07XHJcbiAgICB2YXIgc3VibWl0QnV0dG9uO1xyXG4gICAgdmFyIHZhbGlkYXRvcjtcclxuICAgIHZhciBwYXNzd29yZE1ldGVyO1xyXG5cclxuICAgIHZhciBoYW5kbGVGb3JtID0gZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAvLyBJbml0IGZvcm0gdmFsaWRhdGlvbiBydWxlcy4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgRm9ybVZhbGlkYXRpb24gcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjpodHRwczovL2Zvcm12YWxpZGF0aW9uLmlvL1xyXG4gICAgICAgIHZhbGlkYXRvciA9IEZvcm1WYWxpZGF0aW9uLmZvcm1WYWxpZGF0aW9uKFxyXG4gICAgICAgICAgICBmb3JtLFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBmaWVsZHM6IHtcclxuICAgICAgICAgICAgICAgICAgICAncGFzc3dvcmQnOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhbGlkYXRvcnM6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG5vdEVtcHR5OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogJ1RoZSBwYXNzd29yZCBpcyByZXF1aXJlZCdcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBjYWxsYmFjazoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2U6ICdQbGVhc2UgZW50ZXIgdmFsaWQgcGFzc3dvcmQnLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNhbGxiYWNrOiBmdW5jdGlvbiAoaW5wdXQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKGlucHV0LnZhbHVlLmxlbmd0aCA+IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiB2YWxpZGF0ZVBhc3N3b3JkKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgICAgICdjb25maXJtLXBhc3N3b3JkJzoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB2YWxpZGF0b3JzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBub3RFbXB0eToge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG1lc3NhZ2U6ICdUaGUgcGFzc3dvcmQgY29uZmlybWF0aW9uIGlzIHJlcXVpcmVkJ1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlkZW50aWNhbDoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbXBhcmU6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGZvcm0ucXVlcnlTZWxlY3RvcignW25hbWU9XCJwYXNzd29yZFwiXScpLnZhbHVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgbWVzc2FnZTogJ1RoZSBwYXNzd29yZCBhbmQgaXRzIGNvbmZpcm0gYXJlIG5vdCB0aGUgc2FtZSdcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICAgICAgJ3RvYyc6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdmFsaWRhdG9yczoge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbm90RW1wdHk6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBtZXNzYWdlOiAnWW91IG11c3QgYWNjZXB0IHRoZSB0ZXJtcyBhbmQgY29uZGl0aW9ucydcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBwbHVnaW5zOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgdHJpZ2dlcjogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuVHJpZ2dlcih7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGV2ZW50OiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYXNzd29yZDogZmFsc2VcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pLFxyXG4gICAgICAgICAgICAgICAgICAgIGJvb3RzdHJhcDogbmV3IEZvcm1WYWxpZGF0aW9uLnBsdWdpbnMuQm9vdHN0cmFwNSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJvd1NlbGVjdG9yOiAnLmZ2LXJvdycsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGVsZUludmFsaWRDbGFzczogJycsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGVsZVZhbGlkQ2xhc3M6ICcnXHJcbiAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfVxyXG4gICAgICAgICk7XHJcblxyXG4gICAgICAgIHN1Ym1pdEJ1dHRvbi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcclxuXHJcbiAgICAgICAgICAgIHZhbGlkYXRvci5yZXZhbGlkYXRlRmllbGQoJ3Bhc3N3b3JkJyk7XHJcblxyXG4gICAgICAgICAgICB2YWxpZGF0b3IudmFsaWRhdGUoKS50aGVuKGZ1bmN0aW9uIChzdGF0dXMpIHtcclxuICAgICAgICAgICAgICAgIGlmIChzdGF0dXMgPT0gJ1ZhbGlkJykge1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIFNob3cgbG9hZGluZyBpbmRpY2F0aW9uXHJcbiAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLnNldEF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InLCAnb24nKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgLy8gRGlzYWJsZSBidXR0b24gdG8gYXZvaWQgbXVsdGlwbGUgY2xpY2tcclxuICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uZGlzYWJsZWQgPSB0cnVlO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAvLyBTaW11bGF0ZSBhamF4IHJlcXVlc3RcclxuICAgICAgICAgICAgICAgICAgICBheGlvcy5wb3N0KHN1Ym1pdEJ1dHRvbi5jbG9zZXN0KCdmb3JtJykuZ2V0QXR0cmlidXRlKCdhY3Rpb24nKSwgbmV3IEZvcm1EYXRhKGZvcm0pKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAudGhlbihmdW5jdGlvbiAocmVzcG9uc2UpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIC8vIFNob3cgbWVzc2FnZSBwb3B1cC4gRm9yIG1vcmUgaW5mbyBjaGVjayB0aGUgcGx1Z2luJ3Mgb2ZmaWNpYWwgZG9jdW1lbnRhdGlvbjogaHR0cHM6Ly9zd2VldGFsZXJ0Mi5naXRodWIuaW8vXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiWW91IGhhdmUgc3VjY2Vzc2Z1bGx5IHJlc2V0IHlvdXIgcGFzc3dvcmQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJzdWNjZXNzXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uc1N0eWxpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvbjogXCJidG4gYnRuLXByaW1hcnlcIlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pLnRoZW4oZnVuY3Rpb24gKHJlc3VsdCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChyZXN1bHQuaXNDb25maXJtZWQpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LmxvY2F0aW9uLmhyZWYgPSAnL2xvZ2luJztcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9ybS5xdWVyeVNlbGVjdG9yKCdbbmFtZT1cImVtYWlsXCJdJykudmFsdWUgPSBcIlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBmb3JtLnF1ZXJ5U2VsZWN0b3IoJ1tuYW1lPVwicGFzc3dvcmRcIl0nKS52YWx1ZSA9IFwiXCI7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvcm0ucXVlcnlTZWxlY3RvcignW25hbWU9XCJjb25maXJtLXBhc3N3b3JkXCJdJykudmFsdWUgPSBcIlwiO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBwYXNzd29yZE1ldGVyLnJlc2V0KCk7ICAvLyByZXNldCBwYXNzd29yZCBtZXRlclxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAuY2F0Y2goZnVuY3Rpb24gKGVycm9yKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgZGF0YU1lc3NhZ2UgPSBlcnJvci5yZXNwb25zZS5kYXRhLm1lc3NhZ2U7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgZGF0YUVycm9ycyA9IGVycm9yLnJlc3BvbnNlLmRhdGEuZXJyb3JzO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZvciAoY29uc3QgZXJyb3JzS2V5IGluIGRhdGFFcnJvcnMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoIWRhdGFFcnJvcnMuaGFzT3duUHJvcGVydHkoZXJyb3JzS2V5KSkgY29udGludWU7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgZGF0YU1lc3NhZ2UgKz0gXCJcXHJcXG5cIiArIGRhdGFFcnJvcnNbZXJyb3JzS2V5XTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoZXJyb3IucmVzcG9uc2UpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBTd2FsLmZpcmUoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB0ZXh0OiBkYXRhTWVzc2FnZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJlcnJvclwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBidXR0b25zU3R5bGluZzogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiBcIk9rLCBnb3QgaXQhXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1c3RvbUNsYXNzOiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBjb25maXJtQnV0dG9uOiBcImJ0biBidG4tcHJpbWFyeVwiXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgICAgICAgICAgLnRoZW4oZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgLy8gYWx3YXlzIGV4ZWN1dGVkXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBIaWRlIGxvYWRpbmcgaW5kaWNhdGlvblxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc3VibWl0QnV0dG9uLnJlbW92ZUF0dHJpYnV0ZSgnZGF0YS1rdC1pbmRpY2F0b3InKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAvLyBFbmFibGUgYnV0dG9uXHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJtaXRCdXR0b24uZGlzYWJsZWQgPSBmYWxzZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAgICAgICAgIC8vIFNob3cgZXJyb3IgcG9wdXAuIEZvciBtb3JlIGluZm8gY2hlY2sgdGhlIHBsdWdpbidzIG9mZmljaWFsIGRvY3VtZW50YXRpb246IGh0dHBzOi8vc3dlZXRhbGVydDIuZ2l0aHViLmlvL1xyXG4gICAgICAgICAgICAgICAgICAgIFN3YWwuZmlyZSh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IFwiU29ycnksIGxvb2tzIGxpa2UgdGhlcmUgYXJlIHNvbWUgZXJyb3JzIGRldGVjdGVkLCBwbGVhc2UgdHJ5IGFnYWluLlwiLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBcImVycm9yXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbnNTdHlsaW5nOiBmYWxzZSxcclxuICAgICAgICAgICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IFwiT2ssIGdvdCBpdCFcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgY3VzdG9tQ2xhc3M6IHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b246IFwiYnRuIGJ0bi1wcmltYXJ5XCJcclxuICAgICAgICAgICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuXHJcbiAgICAgICAgZm9ybS5xdWVyeVNlbGVjdG9yKCdpbnB1dFtuYW1lPVwicGFzc3dvcmRcIl0nKS5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaWYgKHRoaXMudmFsdWUubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICAgICAgdmFsaWRhdG9yLnVwZGF0ZUZpZWxkU3RhdHVzKCdwYXNzd29yZCcsICdOb3RWYWxpZGF0ZWQnKTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH0pO1xyXG4gICAgfVxyXG5cclxuICAgIHZhciB2YWxpZGF0ZVBhc3N3b3JkID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHJldHVybiAocGFzc3dvcmRNZXRlci5nZXRTY29yZSgpID4gNTApO1xyXG4gICAgfVxyXG5cclxuICAgIC8vIFB1YmxpYyBGdW5jdGlvbnNcclxuICAgIHJldHVybiB7XHJcbiAgICAgICAgLy8gcHVibGljIGZ1bmN0aW9uc1xyXG4gICAgICAgIGluaXQ6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgZm9ybSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJyNrdF9uZXdfcGFzc3dvcmRfZm9ybScpO1xyXG4gICAgICAgICAgICBzdWJtaXRCdXR0b24gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcja3RfbmV3X3Bhc3N3b3JkX3N1Ym1pdCcpO1xyXG4gICAgICAgICAgICBwYXNzd29yZE1ldGVyID0gS1RQYXNzd29yZE1ldGVyLmdldEluc3RhbmNlKGZvcm0ucXVlcnlTZWxlY3RvcignW2RhdGEta3QtcGFzc3dvcmQtbWV0ZXI9XCJ0cnVlXCJdJykpO1xyXG5cclxuICAgICAgICAgICAgaGFuZGxlRm9ybSgpO1xyXG4gICAgICAgIH1cclxuICAgIH07XHJcbn0oKTtcclxuXHJcbi8vIE9uIGRvY3VtZW50IHJlYWR5XHJcbktUVXRpbC5vbkRPTUNvbnRlbnRMb2FkZWQoZnVuY3Rpb24gKCkge1xyXG4gICAgS1RQYXNzd29yZFJlc2V0TmV3UGFzc3dvcmQuaW5pdCgpO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIktUUGFzc3dvcmRSZXNldE5ld1Bhc3N3b3JkIiwiZm9ybSIsInN1Ym1pdEJ1dHRvbiIsInZhbGlkYXRvciIsInBhc3N3b3JkTWV0ZXIiLCJoYW5kbGVGb3JtIiwiZSIsIkZvcm1WYWxpZGF0aW9uIiwiZm9ybVZhbGlkYXRpb24iLCJmaWVsZHMiLCJ2YWxpZGF0b3JzIiwibm90RW1wdHkiLCJtZXNzYWdlIiwiY2FsbGJhY2siLCJpbnB1dCIsInZhbHVlIiwibGVuZ3RoIiwidmFsaWRhdGVQYXNzd29yZCIsImlkZW50aWNhbCIsImNvbXBhcmUiLCJxdWVyeVNlbGVjdG9yIiwicGx1Z2lucyIsInRyaWdnZXIiLCJUcmlnZ2VyIiwiZXZlbnQiLCJwYXNzd29yZCIsImJvb3RzdHJhcCIsIkJvb3RzdHJhcDUiLCJyb3dTZWxlY3RvciIsImVsZUludmFsaWRDbGFzcyIsImVsZVZhbGlkQ2xhc3MiLCJhZGRFdmVudExpc3RlbmVyIiwicHJldmVudERlZmF1bHQiLCJyZXZhbGlkYXRlRmllbGQiLCJ2YWxpZGF0ZSIsInRoZW4iLCJzdGF0dXMiLCJzZXRBdHRyaWJ1dGUiLCJkaXNhYmxlZCIsImF4aW9zIiwicG9zdCIsImNsb3Nlc3QiLCJnZXRBdHRyaWJ1dGUiLCJGb3JtRGF0YSIsInJlc3BvbnNlIiwiU3dhbCIsImZpcmUiLCJ0ZXh0IiwiaWNvbiIsImJ1dHRvbnNTdHlsaW5nIiwiY29uZmlybUJ1dHRvblRleHQiLCJjdXN0b21DbGFzcyIsImNvbmZpcm1CdXR0b24iLCJyZXN1bHQiLCJpc0NvbmZpcm1lZCIsIndpbmRvdyIsImxvY2F0aW9uIiwiaHJlZiIsInJlc2V0IiwiZXJyb3IiLCJkYXRhTWVzc2FnZSIsImRhdGEiLCJkYXRhRXJyb3JzIiwiZXJyb3JzIiwiZXJyb3JzS2V5IiwiaGFzT3duUHJvcGVydHkiLCJyZW1vdmVBdHRyaWJ1dGUiLCJ1cGRhdGVGaWVsZFN0YXR1cyIsImdldFNjb3JlIiwiaW5pdCIsImRvY3VtZW50IiwiS1RQYXNzd29yZE1ldGVyIiwiZ2V0SW5zdGFuY2UiLCJLVFV0aWwiLCJvbkRPTUNvbnRlbnRMb2FkZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/assets/extended/js/custom/authentication/password-reset/new-password.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/assets/extended/js/custom/authentication/password-reset/new-password.js"]();
/******/ 	
/******/ })()
;