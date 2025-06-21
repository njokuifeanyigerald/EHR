//Additional fullcalendar package functionalities

//Load calendar in calendar.blade.php file
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: { center: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay' }, //shows year,month,week and days options
      selectable: true, //shows a color when user clicks on a date
      contentHeight: 400,
    });
    calendar.render();

     //On date get click event handler for schedular modal
     calendar.on('dateClick', function(info) {
       //Toggle the boostrap modal(schedular)
       var scheduleModal = new bootstrap.Modal(document.getElementById('schedule-modal'));
       scheduleModal.toggle();

        //Assign selected date value to date forms in schedular modal
        document.getElementById('start_roster').value = info.dateStr;
        document.getElementById('end_roster').value = info.dateStr;
        document.getElementById('start_appointment').value = info.dateStr;
        document.getElementById('end_appointment').value = info.dateStr;
     });
  });
