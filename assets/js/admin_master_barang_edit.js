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
            var item_name = $(".input-nama-barang").val().trim();
            if (item_name == "") {
                valid = false;
                $(".error-nama-barang").html("harus diisi");
            }

            var item_qty = parseInt($(".input-stok").val().trim());
            if (isNaN(item_qty)) {
                valid = false;
                $(".error-stok").html("harus diisi");
            }

            var item_panjang = parseInt($(".input-panjang").val().trim());
            if (isNaN(item_panjang)) {
                valid = false;
                $(".error-panjang").html("harus diisi");
            }

            var item_lebar = parseInt($(".input-lebar").val().trim());
            if (isNaN(item_lebar)) {
                valid = false;
                $(".error-lebar").html("harus diisi");
            }

            var item_tinggi = parseInt($(".input-tinggi").val().trim());
            if (isNaN(item_tinggi)) {
                valid = false;
                $(".error-tinggi").html("harus diisi");
            }

            var item_berat = parseInt($(".input-berat").val().trim());
            if (isNaN(item_berat)) {
                valid = false;
                $(".error-berat").html("harus diisi");
            }

            if (valid) {
                thisButton.addClass("disabled");
                showLoader();

                var category_id = $(".select-kategori .select-input").val();
                var brand_id = $(".select-brand .select-input").val();
                var item_price = removeThousandSeparator($(".input-harga").val());
                var item_satuan = $(".select-satuan-qty .select-input").val();
                var item_image = $(".image-input").val();
                var item_description = $(".input-deskripsi").val();
                var item_dimensi_satuan = $(".select-satuan-dimensi .select-input").val();
                var item_berat_satuan = $(".select-satuan-berat .select-input").val();

                ajaxCall(do_edit_item_url, {item_id: item_id, category_id: category_id, brand_id: brand_id, item_name: item_name, item_image: item_image, item_price: item_price, item_satuan: item_satuan, item_qty: item_qty, item_description: item_description, item_dimensi_satuan: item_dimensi_satuan, item_panjang: item_panjang, item_lebar: item_lebar, item_tinggi: item_tinggi, item_berat: item_berat, item_berat_satuan: item_berat_satuan}, function(json) {
                    hideLoader();
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".menu-title").html("Master Barang > Edit Barang " + item_name);
                        showNotification("Perubahan Disimpan");
                    } else {
                        showNotification("Gagal Edit Barang " + item_name);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});