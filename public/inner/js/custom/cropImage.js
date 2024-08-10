$(document).ready(function() {
    var cropper;
    var reader;
    var file;
    // Event listener for file input change
    $("body").on("change", ".image", function(e) {
        var input = $(this);
        var targetModal = $(input.data("target"));
        var image = targetModal.find("img")[0];
        var fileFor = input.data("filefor");
        var tableColumn = input.data("column");
        if(tableColumn==''){
            alert('Document type is required!');
            e.preventDefault();
            return false;
        }
        const csrfTokenName  = document.querySelector('meta[name="csrf-token-name"]').getAttribute('content');
        const csrfTokenValue = document.querySelector('meta[name="csrf-token-value"]').getAttribute('content');
    
        var files = e.target.files;
        if (files && files.length > 0) {
            var file = files[0];
            var mimeType = file.type; // Get the MIME type of the file
    
            const done = (url) => {
                image.src = url;
                targetModal.modal('show');
            };
    
            if (URL && mimeType.startsWith('image/')) {
                // If the file is an image, show the cropper
                done(URL.createObjectURL(file));
    
                targetModal.one('shown.bs.modal', function() {
                    cropper = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 3,
                        preview: '.previewCropImg'
                    });
                }).one('hidden.bs.modal', function() {
                    cropper.destroy();
                    cropper = null;
                    image.src = ''; // Reset the modal image source
                    input.val(''); // Reset the file input
                });
    
                targetModal.find("#crop").off('click').on('click', function() {
                    var canvas = cropper.getCroppedCanvas({
                        width: 160,
                        height: 160,
                    });
                    canvas.toBlob(function(blob) {
                        var reader = new FileReader();
                        reader.readAsDataURL(blob);
                        reader.onloadend = function() {
                            var base64data = reader.result;
    
                            var data = {
                                image: base64data,
                                fileFor: fileFor,
                                tableColumn: tableColumn,
                                [csrfTokenName]: csrfTokenValue
                            };
    
                            uploadFile(data, targetModal); // Function to handle the upload
                        };
                    });
                });
            } else {
              if(tableColumn=='profile_pic') {
                alert('Please Select Image File Only!');
                return false;
              }
                // If the file is not an image, upload directly
                var reader = new FileReader();
                reader.onloadend = function() {
                    var base64data = reader.result;
    
                    var data = {
                        image: base64data,
                        fileFor: fileFor,
                        tableColumn: tableColumn,
                        [csrfTokenName]: csrfTokenValue
                    };
                    targetModal = '';
                    uploadFile(data, targetModal); // Function to handle the upload
                };
                reader.readAsDataURL(file); // Read the file as data URL
            }
        }
    });
    
    // Function to handle the file upload
    function uploadFile(data,targetModal) {
        //console.log(data);
        $.ajax({
            type: "POST",
            url: uploadDocument, // Your upload endpoint
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function(response) { 
                console.log(response);
                alert("File uploaded successfully!");
                var imageUrl = response.image;
                var returnFileFor = response.fileFor;
                var returnFileType = response.fileType;
                if(returnFileFor == 'patientProfilePic' || returnFileFor == 'doctorProfilePic'){
                    $('#profileImg').html('<img src="' + imageUrl + '" alt="Profile Pic">');
                } 
                if(returnFileFor == 'patientDocumentPic' || returnFileFor == 'doctorDocumentPic'){
                    $('#idProofImg').html('<img src="' + imageUrl + '" alt="Id Proof">');
                } 
                if(returnFileType=='IMAGE'){
                    targetModal.modal('hide');
                }
                if(response.success){
                    showCustomAlert('Success!', response.message, 'success');
                } else {
                    showCustomAlert('Error!', response.message, 'error');
                }
                if ($('#certificateModal').hasClass('show')) {
                    $('#certificateModal').modal('hide');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error uploading file");
            }
        });
    }
    
    $(".close").click(function(){
        $("#modalCropPic").modal('hide');
    });
    //Add Certificate Popup
    $('#certificateType').on('change', function() {
        var selectedOption = $(this).val();
        console.log(selectedOption);
        if (selectedOption) {
            $('#certificateInput').attr('data-column', selectedOption);
        } else {
            $('#certificateInput').removeAttr('data-column'); // Remove the attribute if no value is selected
        }
    });
});
