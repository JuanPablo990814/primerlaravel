var picker = new Lightpick({ 
    field: document.getElementById('datepicker1'),
    onSelect:function(date){
      document.getElementById('fechaSeleccionada').innerHTML = date.format('Do MMMM YYYY');
    }
    
  });
  // picker.setDisableDates([moment().startOf('month'),['2021-05-19'],['2021-05-24']])
  // picker.setDateRange(new Date(),null);
  picker.setDate(new Date());