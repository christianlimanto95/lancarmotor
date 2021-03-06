$(function() {
    get_data();

    $(document).on("click", ".btn-hapus", function() {
        if (!$(this).hasClass("disabled")) {
            var thisButton = $(this);
            var tr = $(this).closest("tr");
            var nama = tr.find("td").eq(0).html();
            if (confirm("Hapus kategori " + nama + "?")) {
                var id = tr.attr("data-id");
                showLoader();
                thisButton.addClass("disabled");
                ajaxCall(hapus_kategori_url, {category_id: id}, function(json) {
                    thisButton.removeClass("disabled");
                    var result = jQuery.parseJSON(json);
                    if (result.status == "success") {
                        get_data();
                        showNotification("Berhasil menghapus kategori " + nama);
                    } else {
                        hideLoader();
                        showNotification("Gagal menghapus kategori " + nama);
                    }
                });
            }
        }
    });

    $(".btn-tambah-kategori").on("click", function() {
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
                ajaxCall(tambah_kategori_url, {category_name: nama_kategori}, function(json) {
                    var result = jQuery.parseJSON(json);
                    thisButton.removeClass("disabled");
                    
                    if (result.status == "success") {
                        $(".input-nama-kategori").val("");
                        get_data();
                        showNotification("Berhasil Tambah Kategori " + nama_kategori);
                    } else {
                        hideLoader();
                        showNotification("Gagal Menambah Kategori " + nama_kategori);
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
            element += "<tr data-id='" + data[i].category_id + "'>";
            element += "<td>" + data[i].category_name + "</td>";
            element += "<td><a href='" + edit_kategori_url + data[i].category_id + "' class='btn btn-update btn-edit'>Edit</a><div class='btn btn-negative btn-hapus'>Hapus</div></td>";
            element += "</tr>";
        }

        $(".table tbody").html(element);
    });
}