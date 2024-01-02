<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
</head>
<body>
    <button id="load-images">Load Images</button>
    <div id="image-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#load-images').on('click', function () {
                $.ajax({
                    url: '/get-images',
                    type: 'GET',
                    success: function (response) {
                        displayImages(response.images);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading images:', error);
                    }
                });
            });

            function displayImages(images) {
                var container = $('#image-container');
                container.empty();

                images.forEach(function (imageUrl) {
                    container.append('<img src="' + imageUrl + '" style="max-width: 200px; margin: 10px;">');
                });
            }
        });
    </script>
</body>
</html>