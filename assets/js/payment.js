$(function() {
    $(document).on("change", ".input-upload", function() {
        var previewElement = $(".image-preview");
        var thisElement = this;
		if (this.files.length > 0) {
			var reader = new FileReader();
			reader.onload = function(e) {
                previewElement.attr("src", e.target.result);
                previewElement.closest(".image-preview-container").addClass("image-added");
                clearInputFile(thisElement);
			};
            reader.readAsDataURL(this.files[0]);
		}
    });

    $(".btn-delete-image-preview").on("click", function() {
        $(this).siblings(".image-preview").removeAttr("src");
        $(this).closest(".image-preview-container").removeClass("image-added");
    });
});