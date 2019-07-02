<!DOCTYPE html>
<html lang="en">

<head>
	<title>Calendar Display</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Calendario</h1>
				<div id="calendar">
				</div>
				<!--Modal Adicionar Evento -->
				<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
										aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Add Calendar Event</h4>
							</div>
							<div class="modal-body">
								<?php echo form_open(site_url("calendar/add_event"), array("class" => "form-horizontal")) ?>
								<div class="form-group">
									<label for="p-in" class="col-md-4 label-heading">Event Name</label>
									<div class="col-md-8 ui-front">
										<input type="text" class="form-control" name="name" value="">
									</div>
								</div>
								<div class="form-group">
									<label for="p-in" class="col-md-4 label-heading">Description</label>
									<div class="col-md-8 ui-front">
										<input type="text" class="form-control" name="description">
									</div>
								</div>
								<div class="form-group">
									<label for="p-in" class="col-md-4 label-heading">Start Date</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="start_date">
									</div>
								</div>
								<div class="form-group">
									<label for="p-in" class="col-md-4 label-heading">End Date</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="end_date">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" value="Add Event">
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
				<!--Fim do Modal-->
			</div>
		</div>
	</div>

	<link rel="stylesheet" href="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.css" />
	<script src="<?php echo base_url() ?>scripts/fullcalendar/lib/moment.min.js"></script>
	<script src="<?php echo base_url() ?>scripts/fullcalendar/fullcalendar.min.js"></script>
	<script src="<?php echo base_url() ?>scripts/fullcalendar/gcal.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var date_last_clicked = null;

		$(document).ready(function () {
			$('#calendar').fullCalendar({
				eventSources: [{
					events: function (start, end, timezone, callback) {
						$.ajax({
							url: '<?php echo base_url() ?>calendar/get_events',
							dataType: 'json',
							data: {
								start: start.unix(),
								end: end.unix()
							},
							success: function (msg) {
								var events = msg.events;
								callback(events);
							}
						});
					}
				}, ],
				dayClick: function (date, jsEvent, view) {
					date_last_clicked = $(this);
					$(this).css('background-color', '#bed7f3');
					$('#addModal').modal();
				},
			});
		});
	</script>



</body>

</html>