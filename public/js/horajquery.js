//cambiar txtDate por datepicker1
//cambiar txtTime por selectTime
var arrayHora="";
var horaActual="";
var fechaPicker="";

function calendar(){
  if( $('#datepicker1').length )
  {
    hours( moment().format('YYYY-MM-D') )
    let currentTime = $('#selectTime option:selected').val()
    $('#selectTime').on('change', function(){
      currentTime = $('#selectTime').val(); 
      LightpickCalendar( currentTime );
    })
    LightpickCalendar( currentTime );
  }
}

function LightpickCalendar( currentTime ){
  var realTime=moment().hour();
  let picker = new Lightpick({
    field: document.getElementById('datepicker1'),
    singleDate: true,
    format:'YYYY-MM-DD', 
    hoveringTooltip:false,
    // minDate: currentTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day'),
    // minDate: currentTime > 20 ? moment().startOf('day').add(1, 'day') : moment().startOf('day'),
    minDate: realTime > 17? moment().startOf('day').add(1, 'day'):moment().startOf('day'),
    onClose:function(){
      let element = document.getElementById('datepicker1');
    },
      onSelect:function(){
        fechaPicker=picker.toString('YYYY-MM-DD');//para ver en consola
        hours( picker.toString('YYYY-MM-DD') )
      }
  });

  var primeraFecha = picker.toString('YYYY-MM-DD');
  // console.log(primeraFecha);
  if(primeraFecha==""){
    // picker.setDate(new Date());
    picker.setDate(new Date( realTime > 17 ? moment().startOf('day').add(1, 'day') : moment().startOf('day') ));
  }
  // picker.setDate(new Date( currentTime > 20 ? moment().startOf('day').add(1, 'day') : moment().startOf('day') ));
  //picker.setDate(new Date());
}



function hours( date ){
    // let currentHour = date == moment().format('YYYY-MM-D') ? moment().add(4, 'hours').hour() : moment().hour();
    let currentHour = date == moment().format('YYYY-MM-DD') ? moment().add(4, 'hours').hour() : 6;
    horaActual=currentHour;//para ver en consola
    const array = [
        [7, '07:00 A.M.'], 
        [8, '08:00 A.M.'], 
        [9, '09:00 A.M.'], 
        [10, '10:00 A.M.'], 
        [11, '11:00 A.M.'], 
        [12, '12:00 M.'], 
        [13, '01:00 P.M.'], 
        [14, '02:00 P.M.'], 
        [15, '03:00 P.M.'], 
        [16, '04:00 P.M.'], 
        [17, '05:00 P.M.'], 
        [18, '06:00 P.M.'], 
        [19, '07:00 P.M.'], 
        [20, '08:00 P.M.']
    ];
    
    let txtTime = document.getElementById('selectTime');
    txtTime.innerHTML = '';
    array.forEach( function( e ){
      if( e[0] >= currentHour)
      {
        let option = document.createElement("option");
        option.value = e[0];
        option.text = e[1];
        txtTime.add(option);
        arrayHora+=e[0]+"-";//para ver en consola
        
      }
    });

    var lenTime = document.getElementById("selectTime").length;
    if(lenTime == 0){
      let option = document.createElement("option");
      option.value = "";
      option.text = "Escoger otro dia";
      txtTime.add(option);
    }

}

calendar()
