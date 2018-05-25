$(function() {
    $(".btn-simpan-perubahan").on("click", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            $(".error").html("");
            var valid = true;
            var nama_satuan = $(".input-nama-satuan").val().trim();
            var tipe_satuan = $(".input-tipe-satuan").val();
            if (nama_satuan == "") {
                valid = false;
                $(".error-nama-satuan").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();
                ajaxCall(do_edit_satuan_url, {satuan_id: satuan_id, satuan_nama: nama_satuan, satuan_type: tipe_satuan}, function(json) {
                    hideLoader();
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".menu-title").html("Master Satuan > Edit Satuan " + nama_satuan);
                        showNotification("Perubahan Disimpan");
                    } else {
                        showNotification("Gagal Edit Satuan " + nama_satuan);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});