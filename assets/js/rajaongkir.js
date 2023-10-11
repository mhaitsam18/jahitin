
$(document).ready(function() {
    $.ajax({
        type: "POST",
        url: "<?= base_url('rajaongkir/provinsi') ?>", 
        success: function(hasil_provinsi){
            console.log(hasil_provinsi);
        }
    });
});