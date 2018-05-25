$(function() {
    var src = $(".image-preview").attr("src");
    if (src != undefined) {
        toDataURL(src, function(dataUrl) {
            $(".image-input").val(dataUrl);
        });
    }

    $(".btn-simpan-perubahan").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            $(".error").html("");
            var valid = true;
            var nama_brand = $(".input-nama-brand").val().trim();
            if (nama_brand == "") {
                valid = false;
                $(".error-nama-brand").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();

                var brand_image = $(".image-input").val();
                ajaxCall(do_edit_brand_url, {brand_id: brand_id, brand_name: nama_brand, brand_image: brand_image}, function(json) {
                    hideLoader();
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".menu-title").html("Master Brand > Edit Brand " + nama_brand);
                        showNotification("Berhasil Tambah Satuan " + nama_brand);
                    } else {
                        showNotification("Gagal Menambah Satuan " + nama_brand);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});