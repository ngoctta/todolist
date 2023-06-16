<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./lib/style.css">
    <script src='./lib/calendar/dist/index.global.js'></script>
    <title>Document</title>
    <script>
        const obj = JSON.parse(<?php echo "'" . $data . "'"; ?> );
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                editable: true,
                headerToolbar: {
                    center: 'dayGridMonth,timeGridWeek,timeGridDay' // buttons for switching between views
                },
                views: {
                    timeGridWeek: {
                        type: 'timeGrid',
                        duration: { days: 7 },
                        buttonText: 'week'
                    },
                    timeGridDay: {
                        type: 'timeGrid',
                        duration: { days: 1 },
                        buttonText: 'day'
                    }
                },
                events: obj
            });
            calendar.render();
        });

    </script>
</head>
<body>
<section class="wrapper">
    <div class="box">
        <h4 class="title">CALENDAR</h4>
        <div id='calendar'></div>
        <br>
        <a href="index.php" class="button save-button">Back to list</a>
    </div>
</section>
</body>
</html>