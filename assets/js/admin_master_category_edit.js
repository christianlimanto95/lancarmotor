$(function() {
    $(".btn-simpan-perubahan").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            $(".error").html("");
            var valid = true;
            var nama_kategori = $(".input-nama-kategori").val().trim();
            if (nama_kategori == "") {
                valid = false;
                $(".error-nama-kategori").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();
                ajaxCall(do_edit_category_url, {category_id: category_id, category_name: nama_kategori}, function(json) {
                    hideLoader();
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".menu-title").html("Master Kategori > Edit Kategori " + nama_kategori);
                        showNotification("Berhasil Tambah Satuan " + nama_kategori);
                    } else {
                        showNotification("Gagal Menambah Satuan " + nama_kategori);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});