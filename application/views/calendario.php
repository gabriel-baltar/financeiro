<!DOCTYPE html>

<html>

<head>

    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

</head>

<body>

  

<div class="container">

    <h1>Calendário RS Soluções Corporativas</h1>

    <div class="row" style="width:50%">

       <div class="col-md-12">

           <div id="calendar"></div>

       </div>

    </div>

</div>

   

<script type="text/javascript">

   

   var eventos = <?php echo json_encode($data) ?>;

    

    var date = new Date()

    var d    = date.getDate(),

        m    = date.getMonth(),

        y    = date.getFullYear()

           

    $('#calendar').fullCalendar({

      header    : {

        left  : 'prev,next today',

        center: 'title',

        right : 'month,agendaWeek,agendaDay'

      },

      buttonText: {

        today: 'today',

        month: 'month',

        week : 'week',

        day  : 'day'

      },

      eventos    : eventos

    })

</script>

   

</body>

</html>