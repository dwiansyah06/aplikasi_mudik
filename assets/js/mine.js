$(document).ready(function(){

  $('.ClaimPerjalanan').click(function() {
    $('#idPerjalanan').val($(this).attr('data-perjalanan'));
    $('#exampleModalCenter').modal('show');
  });

  $('.btnVerifTiket').click(function() {
    $('#idTiket').val($(this).attr('data-id'));
    $('#jumOrang').val($(this).attr('data-jum'));
    $('#Prjlnan').val($(this).attr('data-perjalanan'));
    $('#modalVerifTiket').modal('show');
  });

})
