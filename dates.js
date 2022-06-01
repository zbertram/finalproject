document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: 'title',
          right: 'prev,next today',
        },
        events: {
            // add &c=on&geonameid=[locationID] for candle-lighting times
            url: "https://www.hebcal.com/hebcal?cfg=fc&v=1&i=off&maj=on&min=on&nx=on&mf=on&ss=on&mod=on&lg=s&s=on",
            cache: true
        }
    });
  
    calendar.render();
  
    // optional: move calendar forward/backward by a month with arrow keys
    document.addEventListener('keydown', function(e) {
      if (e.keyCode == 37) {
        calendar.prev();
      } else if (e.keyCode == 39) {
        calendar.next();
      }
    });
  });