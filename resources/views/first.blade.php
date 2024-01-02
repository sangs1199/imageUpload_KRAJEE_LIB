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

<input id="file-input" type="file" name="file" multiple>
<div id="file-preview"></div>
<button id="upload-btn" class="btn btn-primary">Upload Files</button>

<script>
    $(document).ready(function () {
        $("#file-input").fileinput({
            // Configuration for file input
            uploadUrl: "/upload", // Replace with your Laravel route for handling uploads
            uploadAsync: true,
            showUpload: false, // Hide default upload button
            showCaption: false,
            showClose: false,
            initialPreviewAsData: true,
            initialPreview: [], // You can set initial preview data if needed
            initialPreviewConfig: [], // Configuration for initial preview (e.g., caption, size, etc.)
            browseOnZoneClick: true, // Enable clicking on preview zone to trigger file input

            layoutTemplates: {
                actions: `
                    <div class="file-actions">
                        <div class="file-footer-buttons">
                            {delete} {upload} {zoom} {other}
                        </div>
                        {drag}
                        <div class="clearfix"></div>
                    </div>
                `,
            },
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
        });

        // Custom upload button action
        $("#upload-btn").on("click", function() {
            $("#file-input").fileinput("upload");
        });
    });
</script>
