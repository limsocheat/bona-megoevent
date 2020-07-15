function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#mego-uploader-preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#mego-uploader").change(function () {
    readURL(this);
});

$("#mego-image-chooser").click(function () {
    $("#mego-image-uploader").click();
});

$("#mego-image-uploader").change(function () {

    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#mego-image-previewer').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);
    }
});

$(document).ready(function () {
    $('#summernote').summernote({
        height: 200
    });
});

$(document).ready(function () {
    $('#example').DataTable();
});
