$(document).ready(function(){

  $('#addKeberangkatan').on('submit', function(event){
    event.preventDefault();
    $.ajax({
       url: BaseUrl+'admin/addKeberangkatan',
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       beforeSend:function(){
          $('#preloader').fadeIn();
        },
       success:function(result){
         $('#preloader').fadeOut();
         Swal.fire({
           icon: 'success',
           title: 'Your work has been saved',
           showConfirmButton: true,
           allowOutsideClick: false
         }).then((result) => {
           if (result.value) {
             location.reload();
           }
         })
       }
    })
  });

  $('#ChooseTrip').on('submit', function(event){
    event.preventDefault();
    $.ajax({
       url: BaseUrl+'penumpang/claim_perjalanan',
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       beforeSend:function(){
          $('#preloader').fadeIn();
        },
       success:function(result){
         var data = JSON.parse(result);
         $('#exampleModalCenter').modal('hide');
         $('#preloader').fadeOut();

         if (data.hasil == 'success') {
           Swal.fire({
             icon: 'success',
             text: 'Selamat kamu berhasil memilih perjalanan ini silahkan menunggu konfirmasi admin untuk tiket kamu.',
             showConfirmButton: true,
             allowOutsideClick: false
           }).then((result) => {
             if (result.value) {
               location.reload();
             }
           })
         } else {
           Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: data.error.failed
            }).then((result) => {
              if (result.value) {
                location.reload();
              }
            })
         }
       }
    })
  });

  $('#VerifTiket').on('submit', function(event){
    event.preventDefault();
    $.ajax({
       url: BaseUrl+'admin/verif_tiket',
       method:"POST",
       data:new FormData(this),
       contentType:false,
       cache:false,
       processData:false,
       beforeSend:function(){
          $('#preloader').fadeIn();
        },
       success:function(result){
         $('#modalVerifTiket').modal('hide');
         $('#preloader').fadeOut();
         Swal.fire({
           icon: 'success',
           text: 'Tiket ini berhasil diverifikasi.',
           showConfirmButton: true,
           allowOutsideClick: false
         }).then((result) => {
           if (result.value) {
             location.reload();
           }
         })
       }
    })
  });

})
