<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Krajee Task</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>

        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>


    </head>
    <body>
        <input id="file-input" type="file" name="file" multiple>
        <div id="file-preview"></div>

        <script>
            $(document).ready(function () {
                $("#file-input").fileinput({
                    // Configuration for file input
                    uploadUrl: "/upload", // Replace with your Laravel route for handling uploads
                    uploadAsync: true,
                    showUpload: true,
                    showCaption: false,
                    showClose: false,
                    initialPreviewAsData: true,
                    initialPreview: [], // You can set initial preview data if needed
                    initialPreviewConfig: [], // Configuration for initial preview (e.g., caption, size, etc.)
                }).on("filebatchselected", function(event, files) {
                    // Triggered after files are selected
                    $("#file-preview").html(""); // Clear previous previews
        
                    // Generate new previews
                    $(files).each(function (index, file) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("#file-preview").append('<img src="' + e.target.result + '" class="file-preview-image">');
                        };
                        reader.readAsDataURL(file);
                    });
                }).on("fileuploaded", function (event, data, previewId, index) {
                    // Triggered after files are uploaded
                    console.log(data.response);
                    // You can handle the response from the server here (e.g., display a success message)
                });
            });
        </script>

    </body>
</html>
