$(function() {
    //Fetch City list
    function fetchCities(stateId,cityId,selectFor) {
        $.ajax({
            url: getCityOptions,
            type: 'POST',
            data: {
                stateId: stateId,
                cityId: cityId
            },
            success: function(response) {
                if (selectFor === 'select-one') {
                    $('#cityList').html(response);
                    // Destroy the old nice-select instance
                    $('#cityList').niceSelect('destroy');
                    // Reinitialize nice-select
                    $('#cityList').niceSelect();
                } else if (selectFor === 'select-two') {
                    $('#cityList2').html(response);
                    // Destroy the old nice-select instance
                    $('#cityList2').niceSelect('destroy');
                    // Reinitialize nice-select
                    $('#cityList2').niceSelect();
                } else if (selectFor === 'select-three') {
                    $('#cityList3').html(response);
                    // Destroy the old nice-select instance
                    $('#cityList3').niceSelect('destroy');
                    // Reinitialize nice-select
                    $('#cityList3').niceSelect();
                } 
                
            },
            error: function(xhr, status, error) {
                $('#cityListError').html('<p>An error occurred: ' + error + '</p>');
            }
        });
    }
    //Fetch City List on Change of State
    //Start Profile Form
    //OnChange
    $('#stateSelect').on('change', function() {
        var stateId = $(this).val();
        var cityId  = $('#selectedCity').val();
        fetchCities(stateId,cityId,'select-one');
    });
    //OnPageLoad
    var initialStateId = $('#stateSelect').val();
    var cityId         = $('#selectedCity').val();
    if (initialStateId) {
        fetchCities(initialStateId,cityId,'select-one');
    }
    //End Profile Form
    //Start Location Form
    //OnChange
    $('#stateSelect2').on('change', function() {
        var stateId2 = $(this).val();
        var cityId2  = $('#selectedCity2').val();
        fetchCities(stateId2, cityId2,'select-two');
    });
    //OnPageLoad
    var initialStateId2 = $('#stateSelect2').val();
    var cityId2         = $('#selectedCity2').val();
    if (initialStateId2) {
        fetchCities(initialStateId2, cityId2,'select-two');
    }
    //OnChange
    $(document).on('change', '#stateSelect3', function() {
        var initialStateId3 = $('#stateSelect3').val();
        var cityId3         = $('#cityList3').val(); 
        if (initialStateId3) {
            fetchCities(initialStateId3, cityId3, 'select-three'); // Correctly specify the city list ID
        }
    });
    //End Location Form
    //Update Password
    $('#updatePasswordForm').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        $.ajax({
            type: 'POST',
            url: updatePassword, // Replace with your controller URL
            data: $(this).serialize(), // Serialize the form data
            dataType: 'json', // Expect a JSON response
            success: function(response) {
                if (response.status === 'success') {
                    var returnMsg = (response.message || 'Password updated successfully!');
                    alert(returnMsg);
                    $('#passSuccess').removeClass('d-none');
                    $('#passSuccess').addClass('d-block');
                    $('#passError').addClass('d-none');
                    $('#passSuccess').html(returnMsg);
                    $('#updatePasswordForm')[0].reset();
                } else {
                    // Display validation errors
                    let errorMessage = '';
                    $.each(response.errors, function(key, error) {
                        errorMessage += error + "\n"; // Append each error to the message
                    });
                    var returnMsg = (errorMessage || response.message);
                    $('#passError').removeClass('d-none');
                    $('#passError').addClass('d-block');
                    $('#passSuccess').addClass('d-none');
                    $('#passError').html(returnMsg);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert('An error occurred while updating the password.');
            }
        });
    });
    //Start Multiple Select box Tag and Input text tag 
    $('#language, #speciality').change(function(e) {
        var tag = $(this).find('option:selected').data('value');
        var tagValue = $(this).find('option:selected').val();
        var druid = $(this).data('druid');
        //alert(druid);
        if(tag == '') { return false; }
        var currentSelectOption = $(this).attr("id");
        var displayDiv = currentSelectOption == 'language' ? '#tags-language' : '#tags-speciality';                
        $(this).find('option').removeClass('selected');
        $(this).find('option:selected').addClass('selected selectedOption');
        //$(this).find('option:selected').addClass('selectedOption');

        addTagToDisplay(tag, tagValue, displayDiv, druid);
    });


    $('#qualification').on('keypress', function(e) {
        if (e.which === 13) {
            e.preventDefault();
            var tag = $(this).val().trim();
            var tagValue = $(this).val().trim();
            var druid = $(this).data('druid');
            if (tag !== '') {
                addTagToDisplay(tag, tagValue, '#qualification-tags', druid);
                $(this).val('');
            }
        }
    });
    function addTagToDisplay(tag, tagValue, displayDiv, druid) {
        if (!$(displayDiv).find('.tag-container[data-tag="' + tag + '"]').length) {
            var inputName = displayDiv === '#qualification-tags' ? 'qualification[]' : (displayDiv === '#tags-language' ? 'language[]' : 'speciality[]');
            $(displayDiv).append('<div class="tag-container" data-druid="' + druid + '" data-tag="' + tag + '"><span>' + tag + '</span><input type="hidden" name="' + inputName + '" value="'+ tagValue +'"><a href="javascript:void(0);" title="Removing tag" onclick="removeTag(\'' + tag + '\', \'' + tagValue + '\', \'' + displayDiv + '\', \'' + druid + '\')">x</a></div>');
            if (displayDiv === '#tags-language' || displayDiv === '#tags-speciality') {
                $('#' + (displayDiv === '#tags-language' ? 'language' : 'speciality')).val('');
            }
            var dataToSend = {};
            var ajaxUrl = '';
            //Tag Language
            if(displayDiv === '#tags-language'){
                dataToSend = {user_id:druid,language_id:tagValue};
                ajaxUrl    = addLanguage; 
            }
            //Tag Speciality
            if(displayDiv === '#tags-speciality'){
                dataToSend = {user_id:druid,specialization_id:tagValue};
                ajaxUrl    = addSpecialization; 
            }
            //Tag Qualification
            if(displayDiv === '#qualification-tags'){
                dataToSend = {user_id:druid,qualification:tagValue};
                ajaxUrl    = addQualification; 
            }
            $.ajax({
                url: ajaxUrl, // Replace with your server endpoint
                method: 'POST',
                data: dataToSend,
                success: function(response) {
                    // Handle success, e.g., display a message or update the UI
                    console.log('Tag added successfully:', response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle error
                    console.error('Error adding tag:', textStatus, errorThrown);
                }
            });
        }
    }
    window.removeTag = function(tag, tagValue, displayDiv, druid) {
        $(displayDiv).find('.tag-container').filter(function() {
            return $(this).data('tag') === tag;
        }).remove();
        $('select option[data-value="' + tag + '"]').removeClass('selected');
        $('select option[data-value="' + tag + '"]').removeClass('selectedOption');
        var dataToSend = {};
        var ajaxUrl = '';
        // Determine the type of tag and prepare the data to send
        if (displayDiv === '#tags-language') {
            dataToSend = { user_id: druid, language_id: tagValue };
            ajaxUrl    = removeLanguage; 
        } else if (displayDiv === '#tags-speciality') {
            dataToSend = { user_id: druid, specialization_id: tagValue };
            ajaxUrl    = removeSpecialization; 
        } else if (displayDiv === '#qualification-tags') {
            dataToSend = { user_id: druid, qualification: tagValue };
            ajaxUrl    = removeQualification; 
        }
        $.ajax({
            url: ajaxUrl, // Replace with your server endpoint
            method: 'POST',
            data: dataToSend,
            success: function(response) {
                // Handle success, e.g., display a message or update the UI
                console.log('Tag removed successfully:', response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error
                console.error('Error adding tag:', textStatus, errorThrown);
            }
        });
    }
    //End Multiple Select box Tag and Input text tag 

    //Show And Hide Service Rate 
    function toggleServiceDisplay(boxId, displayId, formId) {
        var displayElement = document.getElementById(displayId);
        var formElement = document.getElementById(formId);
        
        if (displayElement.classList.contains('d-none')) {
            displayElement.classList.remove('d-none');
            displayElement.classList.add('d-block');
            formElement.classList.remove('d-block');
            formElement.classList.add('d-none');
        } else {
            displayElement.classList.remove('d-block');
            displayElement.classList.add('d-none');
            formElement.classList.remove('d-none');
            formElement.classList.add('d-block');
        }
    }
    
    document.getElementById('onlineBox').addEventListener('click', function() {
        toggleServiceDisplay('onlineBox', 'onlineServiceDisplay', 'onlineServiceForm');
    });
    
    document.getElementById('houseBox').addEventListener('click', function() {
        toggleServiceDisplay('houseBox', 'houseServiceDisplay', 'houseServiceForm');
    });
    
    document.getElementById('clinicBox').addEventListener('click', function() {
        toggleServiceDisplay('clinicBox', 'clinicServiceDisplay', 'clinicServiceForm');
    });
    
    //Save or Update Service Rate
    $(document).ready(function() {
        // Function to handle form submission
        function submitForm(formId, url) {
            $(formId).on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                var formData = $(this).serializeArray();
                var statusChecked = $(this).find('input[name="status"]').is(':checked');
                formData.push({
                    name: 'status',
                    value: statusChecked ? '1' : '0' // If checked, send 1; if not, send 0
                });
                var serializedData = $.param(formData);
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: serializedData, // Serialize form data
                    success: function(response) {
                        console.log(response);
                        $('#resultResponse').html(response.message);
                        if (response.status === 'success') {
                            $('#resultResponse').removeClass(); 
                            $('#resultResponse').addClass('alert alert-success'); // Add success and highlight classes
                        } else {
                            $('#resultResponse').removeClass(); 
                            $('#resultResponse').addClass('alert alert-danger'); // Add error and highlight classes
                        }
                        $('#resultResponse').show();
                        setTimeout(function() {
                            $('#resultResponse').fadeOut('slow');
                        }, 2000);
                    },
                    error: function(xhr, status, error) {
                        // Handle error (e.g., show an error message)
                        alert('Error submitting service: ' + xhr.responseText);
                    }
                });
            });
        }
    
        // Call the function for each form
        submitForm('#onlineServiceRateForm', 'https://drsgitnew.com/doctor/update_online_service_rate');
        submitForm('#houseServiceRateForm', 'https://drsgitnew.com/doctor/update_house_call_service_rate');
        submitForm('#clinicServiceRateForm', 'https://drsgitnew.com/doctor/update_clinic_visit_service_rate');
    });
    $('#chooseCertificateFile').on('click', function() {
        $('#certificateInput').click();
    });
    //Automatically hide the alert after 2 seconds
    // Check if the alert message exists
    // if ($('.alertMsg').length) {
    //     setTimeout(function() {
    //         $('.alertMsg').fadeOut('slow'); // Fades out the alert
    //     }, 2000); // 2000 milliseconds = 2 seconds
    // } else {
    //     console.log('Alert message does not exist on the page.');
    // }


function showCustomAlert(title, text, icon) {
    Swal.fire({
        title: title,
        html: text,
        icon: icon,
        confirmButtonText: 'OK'
    });
}

if ($('#certificateModal').hasClass('show')) {
    $('#certificateModal').modal('hide');
}
function showErrorMessages(errors) {
    var message = '';
    for (var key in errors) {
        if (errors.hasOwnProperty(key)) {
            //message += errors[key] + '\n';
            message += '<p>' + errors[key] + '</p>';
        }
    }
    showCustomAlert('Error!', message, 'error');
}
$('#updateBankInfoForm').on('submit', function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: updateBankInfo,
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                showCustomAlert('Success!', 'Bank details updated successfully.', 'success');
            } else if (response.errors) {
                showErrorMessages(response.errors);
            } else {
                showCustomAlert('Error!', 'An unexpected error occurred.', 'error');
            }
        },
        error: function(xhr, status, error) {
            showCustomAlert('Error!', 'An error occurred while updating bank details.', 'error');
        }
    });
});
function setSelectValue(value,selectId) {
    $('#stateSelect2').val(value).trigger('change'); // Update the native select
    var selectedOption = $('#'+selectId+' option[value="' + value + '"]').text(); // Get the selected option text
    $('.nice-select .current').text(selectedOption); // Update the custom dropdown's displayed text
}
// $('#createUpdateLocation').off('submit').on('submit', function(event) {
//     event.preventDefault();
//     var formData = $(this).serialize();
//     $.ajax({
//         url: addLocation, // Replace with your actual endpoint URL
//         type: 'POST',
//         data: formData,
//         dataType: 'json',
//         success: function(response) {
//             if (response.success) {
//                 showCustomAlert('Success!', 'Location added successfully.', 'success');
//                 $('#createUpdateLocation')[0].reset();
//                 setSelectValue('','stateSelect2');
//                 $('#locationModal').modal('hide');
//             }  else if (response.errors) {
//                 showErrorMessages(response.errors);
//             } 
//         },
//         error: function(xhr, status, error) {
//             showCustomAlert('Error!', 'An error occurred while adding the location.', 'error');
//         }
//     });
// });
function handleFormSubmit(formId, url, successMessage, resetSelectId, modalId) {
    $(document).off('submit.myForm').on('submit.myForm', formId, function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    showCustomAlert('Success!', successMessage, 'success');
                    $(formId)[0].reset();
                    setSelectValue('', resetSelectId);
                    $(modalId).modal('hide');
                } else if (response.errors) {
                    showErrorMessages(response.errors);
                } 
            },
            error: function(xhr, status, error) {
                showCustomAlert('Error!', 'An error occurred while submitting the form.', 'error');
            }
        });
    });
}


// Call the function for each form
handleFormSubmit('#createLocation', addLocation, 'Location added successfully.', 'stateSelect2', '#locationModal');
//handleFormSubmit('#updateLocation', addLocation, 'Location updated successfully.', 'stateSelect3', '#locationUpdateModal');

//Edit Location 
$(document).on('click', '.loadContentButton', function() {
    var locid = $(this).data('locid');
    $.ajax({
        url: updateLocationForm, // Replace with your actual URL
        type: 'GET', // or 'POST' depending on your needs
        data: { locid: locid }, // Send the ID to the server
        dataType: 'html', // Expecting HTML content
        success: function(response) {
            // Update the inner HTML of the content area
            $('#locationUpdateForm').html(response);
            $('#locationUpdateModal').modal('show');
            setTimeout(function() {
                // Now call handleFormSubmit after the form is in the DOM
                handleFormSubmit('#updateLocation', addLocation, 'Location updated successfully.', 'stateSelect3', '#locationUpdateModal');
            }, 100);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX Error:', status, error);
            $('#contentArea').html('<p>Failed to load content.</p>');
        }
    });
});
    
});