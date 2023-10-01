// ajax.js

$(document).ready(function () {
    $(".delete-customer").click(function () {
        if (confirm("Apakah Anda yakin ingin menghapus pelanggan ini?")) {
            var customerid = $(this).data("customerid");

            // Simpan referensi 'this' ke dalam variabel 'self' untuk mengaksesnya dalam fungsi sukses.
            var self = this;

            $.ajax({
                type: "DELETE",
                url: "/delete-customer/" + customerid,
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (data) {
                    // Lakukan sesuatu setelah penghapusan berhasil, misalnya menghapus baris dari tabel
                    if (data.success) {
                        $(self).closest("tr").remove(); // Menghapus baris dari tabel
                    }
                },
                error: function (data) {
                    // Handle kesalahan jika penghapusan gagal
                    console.log("Gagal menghapus pelanggan");
                }
            });
        }
    });
});
