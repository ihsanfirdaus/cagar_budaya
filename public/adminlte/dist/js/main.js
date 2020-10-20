// LOAD DATA API
$(document).ready(function() {

    load_data('selectProvinsi');

    function load_data(id)
    {
        var api_provinsi = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi';

        var html = '';

        $.getJSON(api_provinsi, function(res) {
            
            html += '<option value="" disabled selected>- Pilih -</option>';

            $.each(res.provinsi, function(key, value){
                
                if(id != '') {
                    
                    html += '<option value="'+value.id+'">'+value.nama+'</option>';
                }

            });

            $("#"+id).html(html);

        });
    }

    $("#selectKabupaten_Kota").html('<option>- Silahkan Pilih Provinsi -</option>');

    $(document).on("change",'#selectProvinsi', function() {

        var id_provinsi = $(this).val();
    
        var api_detail_provinsi = 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/'+id_provinsi+'';

        var api_kota_kabupaten = 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+id_provinsi+'';

        var html = '';

        if(id_provinsi != '')
        {
            // GET DATA PROVINSI
            $.getJSON(api_detail_provinsi, function(res) {
                $("input[name='provinsi']").val(res.nama);
            });

            // GET LIST KOTA/KABUPATEN
            $.getJSON(api_kota_kabupaten, function(res) {
                
                html += '<option value="" disabled selected>- Pilih -</option>';

                $.each(res.kota_kabupaten, function(key, value) {

                    html += '<option value="'+value.nama+'">'+value.nama+'</option>';

                });

                $("#selectKabupaten_Kota").html(html);
                
            });

        }

    });

});
// IMAGE PREVIEW 
function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}