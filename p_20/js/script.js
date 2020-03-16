$(document).ready(function(){

    //hilangkan tombol cari
    $('#tombol-cari').hide();
    //event ketika keyword ditulis
    $('#keyword').on('keyup', function(){
        $(' .loader').show();

        //ajax menggunakan load
        // $('#container').load('ajax/mhs.php?keyword=' + $('#keyword').val());

        $.get('ajax/mhs.php?keyword=' + $('#keyword').val(), function(data){
            $('#container').html(data);
            $('.loader').hide();
        });
    });

});
