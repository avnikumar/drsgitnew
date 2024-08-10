<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Cropper Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <style>
        /* Add some custom styles */
        .img-container {
            max-width: 100%;
            margin: 0 auto;
        }
        img {
            max-width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Image Cropper Example</h1>
    <input type="file" id="inputImage" accept="image/*">
    <div class="img-container">
        <img id="image" src="" alt="Image to crop" />
    </div>
    <button id="cropButton">Crop Image</button>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script>
    let cropper;

    document.getElementById('inputImage').addEventListener('change', function (e) {
        const files = e.target.files;
        const done = (url) => {
            e.target.value = '';
            return url;
        };

        if (files && files.length > 0) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const image = document.getElementById('image');
                image.src = done(event.target.result);

                // Initialize Cropper.js
                if (cropper) {
                    cropper.destroy();
                }
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(files[0]);
        }
    });

    document.getElementById('cropButton').addEventListener('click', function () {
        const canvas = cropper.getCroppedCanvas();

        // Convert the canvas to a data URL (base64 encoded string)
        const croppedImage = canvas.toDataURL('image/png');

        // Send the cropped image to the server using AJAX
        fetch('<?= base_url('image/upload') ?>', {
            method: 'POST',
            body: JSON.stringify({ image: croppedImage }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            alert('Image uploaded successfully!');
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    });
</script>

</body>
</html>
