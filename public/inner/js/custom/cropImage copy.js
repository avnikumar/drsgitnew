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

        const csrfTokenName  = document.querySelector('meta[name="csrf-token-name"]').getAttribute('content');
        const csrfTokenValue = document.querySelector('meta[name="csrf-token-value"]').getAttribute('content');

        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            targetModal.modal('show');
        };
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }

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
                var url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    var data = {
                        image: base64data,
                        fileFor: fileFor,
                        tableColumn:tableColumn,
                        [csrfTokenName]: csrfTokenValue
                    };

                    $.ajax({
                        type: "POST",
                        url: uploadDocument,
                        contentType: 'application/json',  // Ensure JSON content-type
                        data: JSON.stringify(data), // Properly stringify the data
                        success: function(data) { 
                            console.log(data);
                            targetModal.modal('hide');
                            alert("File uploaded successfully!");
                            //alert(data.image + 'dimg');
                            var imageUrl = data.image;
                            var returnFileFor = data.fileFor;
                            //alert(returnFileFor + 'resfor');
                            if(returnFileFor == 'patientProfilePic' || returnFileFor == 'doctorProfilePic'){
                                $('#profileImg').html('<img src="' + imageUrl + '" alt="Profile Pic">');
                            } 
                            if(returnFileFor == 'patientDocumentPic' || returnFileFor == 'doctorDocumentPic'){
                                $('#idProofImg').html('<img src="' + imageUrl + '" alt="Id Proof">');
                            } 
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert("Error uploading image");
                        }
                    });
                };
            });
        });
    });

    $(".close").click(function(){
        $("#modalCropPic").modal('hide');
    });
    
});
