<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="https://phppot.com/demo/php-calendar-event-management-using-fullcalendar-javascript-library/fullcalendar/fullcalendar.min.css" />
<link rel="stylesheet" href="../css/planner.css" type="text/css"/>
<script src="https://phppot.com/demo/php-calendar-event-management-using-fullcalendar-javascript-library/fullcalendar/lib/jquery.min.js"></script>
<script src="https://phppot.com/demo/php-calendar-event-management-using-fullcalendar-javascript-library/fullcalendar/lib/moment.min.js"></script>
<script src="https://phppot.com/demo/php-calendar-event-management-using-fullcalendar-javascript-library/fullcalendar/fullcalendar.min.js"></script>

</head>
<body>
    <h2>Planner</h2>

    <div class="button-group">
        <a href="../index.php" class="button btn_big">Home</a>
    </div>

    <div class="response"></div>
    <div id='calendar'></div>

    <script>
    $(document).ready(function () {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "crud/fetch.php",
            displayEventTime: false,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');

                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    $.ajax({
                        url: 'crud/insert.php',
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (data) {
                            displayMessage("Added Successfully");
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                    true
                            );
                }
                calendar.fullCalendar('unselect');
            },
            
            editable: true,
            eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: 'crud/edit.php',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                                displayMessage("Updated Successfully");
                            }
                        });
                    },
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: "crud/delete.php",
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            }

        });
    });

    function displayMessage(message) {
            $(".response").html("<div class='success'>"+message+"</div>");
        setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
</script>
</body>


</html>