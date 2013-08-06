<<<<<<< HEAD
<div id='calendar'></div>
=======
<!--<link href='../fullcalendar/fullcalendar.css' rel='stylesheet' />-->
<!--<link href='../fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />-->
<!--<script src='../jquery/jquery-1.9.1.min.js'></script>-->
<!--<script src='../jquery/jquery-ui-1.10.2.custom.min.js'></script>-->
<!--<script src='../fullcalendar/fullcalendar.min.js'></script>-->
<?
echo $this->Html->script(
        array(
            'jquery-ui-1.10.2.custom.min.js',
            'fullcalendar.min.js'
        )
);

echo $this->Html->css(
        array(
            'fullcalendar.css'
        )
);

//echo $this->Html->css(
//        array(
//            'fullcalendar.print.css',
//            array('media' => 'print')
//            
//        )
//);

?>

<script>

    $(document).ready(function() {
	
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
		
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });
		
    });

</script>
<style>

    #calendar {
        width: 900px;
        margin: 10px auto;
    }

</style>
<div id='calendar'></div>
>>>>>>> e0f7b2e5bbe3134cb94434dc9aed698ed94197a3
