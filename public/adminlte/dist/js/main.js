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
        var preview = document.getElementById("foto-preview");
        preview.src = src;
        preview.style.display = "block";
    }
}

// UPLOAD MULTIPLE
var max_upload = 4;
var upload = 1;
  $("#addUpload").on('click', function (e) {
    e.preventDefault();
    if (upload < max_upload) {
      upload++;
      
      $(".input_foto").append(
       ` <div class="col-lg-3">
            <div class="form-input">
                <label for="foto">Upload Foto</label>
                <input type="file" class="foto" name="foto[]" accept="image/*" onchange="showPreview(event);">
                <div class="preview">
                    <img class="foto-preview">
                </div>
            </div>
        </div>`
      );

    }
  });

  $(".input_foto").on("click", ".remove_upload", function () {
    $(this)
      .parents("#parentUpload")
      .remove();
    upload--;
  });