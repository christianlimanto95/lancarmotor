$(function() {
    get_data();

    $(document).on("click", ".btn-hapus", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            var tr = $(this).closest("tr");
            var nama = tr.find("td").eq(2).html();
            if (confirm("Hapus barang " + nama + "?")) {
                var id = tr.attr("data-id");
                showLoader();
                thisButton.addClass("disabled");
                ajaxCall(hapus_item_url, {item_id: id}, function(json) {
                    thisButton.removeClass("disabled");
                    var result = jQuery.parseJSON(json);
                    if (result.status == "success") {
                        get_data();
                        showNotification("Berhasil menghapus barang " + nama);
                    } else {
                        hideLoader();
                        showNotification("Gagal menghapus barang " + nama);
                    }
                });
            }
        }
    });

    $(".btn-tambah-barang").on("click", function() {
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
                
                ajaxCall(tambah_item_url, {category_id: category_id, brand_id: brand_id, item_name: item_name, item_image: item_image, item_price: item_price, item_satuan: item_satuan, item_qty: item_qty, item_description: item_description, item_dimensi_satuan: item_dimensi_satuan, item_panjang: item_panjang, item_lebar: item_lebar, item_tinggi: item_tinggi, item_berat: item_berat, item_berat_satuan: item_berat_satuan}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        var formRight = $(".section-insert .form-right");
                        deleteImage(formRight);
                        $(".form-input").val("");
                        $(".input-nama-barang").val("");
                        get_data();
                        showNotification("Berhasil Tambah Barang " + item_name);
                    } else {
                        hideLoader();
                        showNotification("Gagal Menambah Barang " + item_name);
                    }
                });
            } else {
                showNotification("Silakan periksa inputan");
            }
        }
    });
});

function get_data() {
    showLoader();
    ajaxCall(get_data_url, null, function(json) {
        hideLoader();
        var result = jQuery.parseJSON(json);
        var data = result.data;
        var iLength = data.length;
        var element = "";
        for (var i = 0; i < iLength; i++) {
            element += "<tr data-id='" + data[i].item_id + "'>";
            element += "<td>" + data[i].category_name + "</td>";
            element += "<td>" + data[i].brand_name + "</td>";
            element += "<td>" + data[i].item_name + "</td>";
            element += "<td>" + "<img src='" + image_url + data[i].item_id + "." + data[i].item_image_extension + "?d=" + strtotime(data[i].modified_date) + "' class='table-image' />" + "</td>";
            element += "<td>Rp " + addCommas(data[i].item_price) + "</td>";
            element += "<td>" + data[i].item_qty + " " + data[i].item_satuan + "</td>";
            element += "<td>" + data[i].item_panjang + data[i].item_dimensi_satuan + " x " + data[i].item_lebar + data[i].item_dimensi_satuan + " x " + data[i].item_tinggi + data[i].item_dimensi_satuan + "</td>";
            element += "<td>" + data[i].item_berat + " " + data[i].item_berat_satuan + "</td>";
            element += "<td><a href='" + edit_item_url + data[i].item_id + "' class='btn btn-update btn-edit'>Edit</a><div class='btn btn-negative btn-hapus'>Hapus</div></td>";
            element += "</tr>";
        }

        $(".table tbody").html(element);
    });
}