$(document).ready(function () {
    (function updateJumlahAntrean() {
        let id = $('#inputRiwayatAntreanId').val();
        let id_loket = $("#inputLoketId").val();

        if ((id == undefined) && (id == null) && !(id == "")) {
          id = -1;
        }

        $.ajax({
            url: "/hitung-antrean-di-belakang",
            data: {
              id: id,
              id_loket: id_loket
            },
            success: function (data) {
                $("#jumlahPenunggu").text(data);
                console.log(id);
            },
            complete: function () {
                // Schedule the next request when the current one's complete
                setTimeout(updateJumlahAntrean, 1000);
            },
        });
    })();
});