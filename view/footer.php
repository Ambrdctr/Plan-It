		<footer>
			<h1>FOOTER</h1>
		</footer>

		<p class="copyrights">© Copyrights - La RATP</p>




	<!-- Ajout de la bibliothèque jQuery -->
	<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>
	<!-- Popper -->
	<script type="text/javascript" src="./javascript/popper.min.js"></script>
	<!-- bootstrap -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- Popper -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>

	<script type="text/javascript" src="./javascript/moment.min.js"></script>

	<script src='./javascript/fullcalendar.min.js'></script>

	<script src='./lang/fr.js'></script>

  <script type="text/javascript" src="./javascript/bootstrap-datetimepicker.min.js"></script>

	<script type="text/javascript" src="./javascript/script.js"></script>

	<script type="text/javascript" src="./javascript/agenda.js"></script>

	<script type="text/javascript" src="./javascript/gestion_styles.js"></script>

	<script type="text/javascript">

		


			$(document).ready(function () {



				function recup_events() {
					var checked_arr = [];
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							checked_arr.push($(this).val());
						}
					});

					$.post(
					    './JSON/recup_events.php', // Le fichier cible côté serveur.
					    {
					        checked : checked_arr,
					    },
					    fonction_retour, // Nous renseignons uniquement le nom de la fonction de retour.
					    'json' // Format des données reçues.
					);


					function fonction_retour(oData){
						var nodes = oData;
						var string = "";
						if (nodes.length > 0) {
							for (var i=0; i<nodes.length; i++) {
								node = nodes[i];
								if (node.description.length > 0) {
									string += "<li><span class='bg-primary d-inline-block text-truncate' style='max-width: 150px;'" + node.description + "</span></li>";
								} else {
									string += "<li><span class='bg-primary d-inline-block text-truncate' style='max-width: 150px;'" + node.nom + "</span></li>";
								}
							}
							document.getElementById("events").innerHTML = string;

						} else {
							document.getElementById("events").innerHTML = "aucun évènement";
						}
					}
				}


				$('#select_all').click(function() {
					$('input[name=agenda_select]').each(function () {
						if (!$(this).prop("checked")) {
							$(this).prop("checked", true);
						}
					});
					recup_events();
				});

				$('#deselect_all').click(function() {
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							$(this).prop("checked", false);
						}
					});
					recup_events();
				});

        $('input[name=agenda_select]').click(function() {
					recup_events();
				});


		});


/* Fullcalendar */

		$(document).ready(function() {
			//var ladate = new Date();


  // page is now ready, initialize the calendar...

			  			$('#calendar').fullCalendar({
					    // put your options and callbacks here
					    		header: {
					        	left: "prev,next today",
					        	center: 'title',
					        	right: 'month,agendaWeek,agendaDay,listWeek'

					      	},
					      	// defaultDate: ladate.getFullYear()+"-"+(ladate.getMonth()+1)+"-"+ladate.getDate(),
					      	editable: true,
					      	eventLimit: true, // allow "more" link when too many events
					      	displayEventTime: true,

					        events: './JSON/JSON_fullcalendar_display.php?IdAgenda=12',
					      	navLinks: true, // can click day/week names to navigate views
					        selectable: true,
					        selectHelper: true,
					        timeFormat: 'H(:mm)',
					        weekNumbers: true,

							select: function(start, end) {

							var title = prompt("Nom de l'évènement:");
							var eventData;
							if (title) {
								eventData = {
								title: title,
								start: start,
								end: end
							}
							$('#calendar').fullCalendar('renderEvent', eventData, true);
							}
							$('#calendar').fullCalendar('unselect');
							},

							eventRender: function(eventObj, $el) {
						        $el.popover({
						          title: eventObj.title,
						          content: eventObj.description,
						          trigger: 'hover',
						          placement: 'right',
						          container: 'body'
						        });
						    },

							})

				  			$("#display_calendar").click(function() {

							if ($("#calendar").css("display") == "none") {
								$("#calendar").css("display", "block");
							} else if ($("#calendar").css("display") == "block") {
								$("#calendar").css("display", "none");
							}

					});

				});

	</script>

   </body>
</html>
