const flashData = $('.flash-data').data('flashdata');
  if(flashData == TRUE){
    Swal({
      title: 'Data User ',
      text: 'Berhasil ' + flashData,
      type: 'success'
    });
  }