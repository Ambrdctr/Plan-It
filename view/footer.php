		<footer>
			<h1 id="footid">FOOTER</h1>
		</footer>

		<p class="copyrights">© Copyrights - La RATP</p>




	<!-- Ajout de la bibliothèque jQuery -->
	<script type="text/javascript" src="./javascript/jquery-3.3.1.min.js"></script>

	<!-- JQuery UI (slider) -->
	<script type="text/javascript" src="./javascript/jquery-ui.min.js"></script>

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

	<script type="text/javascript" src="./javascript/agenda.js"></script>

	<script type="text/javascript" src="./javascript/superposition.js"></script>

<<<<<<< HEAD
	<script type="text/javascript" src="./javascript/script.js"></script>

	<script type="text/javascript">

		function changeGrp_selected_add(id) {
				$("#id_groupe_add").val(id);
			}

		function changeGrp_selected_add_event(id) {
				$("#id_groupe_add_event").val(id);
			}

		function changeGrp_selected_del(id) {
				$("#id_groupe_del").val(id);
				$.get(
					    './JSON/recup_group_users.php?id=' + id, // Le fichier cible côté serveur.
					    {},
					    function(data) {
					    	$('#id_selec_suppr').html("");
					    	for (var i = 0; i < data.length; i++) {
					    		$('#id_selec_suppr')
					    			.append('<option value="' + data[i].utilisateur + '">' + data[i].utilisateur + '</option>');
					    	}
					    }, // Nous renseignons uniquement le nom de la fonction de retour.
					    'json' // Format des données reçues.
					);

			}

=======
	<script type="text/javascript" src="./javascript/gestion_styles.js"></script>

	<script type="text/javascript" src="./javascript/script.js"></script>
>>>>>>> develop

	<script type="text/javascript">

<<<<<<< HEAD
=======
		function changeGrp_selected_add(id) {
				$("#id_groupe_add").val(id);
			}

		function changeGrp_selected_add_event(id) {
				$("#id_groupe_add_event").val(id);
			}

		function changeGrp_selected_del(id) {
				$("#id_groupe_del").val(id);
				$.get(
					    './JSON/recup_group_users.php?id=' + id, // Le fichier cible côté serveur.
					    {},
					    function(data) {
					    	$('#id_selec_suppr').html("");
					    	for (var i = 0; i < data.length; i++) {
					    		$('#id_selec_suppr')
					    			.append('<option value="' + data[i].utilisateur + '">' + data[i].utilisateur + '</option>');
					    	}
					    }, // Nous renseignons uniquement le nom de la fonction de retour.
					    'json' // Format des données reçues.
					);
>>>>>>> develop

			}

			$(function () {

<<<<<<< HEAD

			$(function () {

			function check(array){ 
			// var checked_arr = []; //tableau qui contiendra des entiers
			$('input[name=agenda_select]').each(function () { //lors de la sélection d'un agenda
				if ($(this).prop("checked")) { //si il y a sélection
					array.push($(this).val()); //on ajoute au tableau l'id de l'agenda selectionné
				}
			});

			};

=======
>>>>>>> develop
					function recup_events(checked_arr) {
					$.post(
					    './JSON/recup_events.php', // Le fichier cible côté serveur.
					    {
					        checked : checked_arr,
					    },
					    fonction_retour, // Nous renseignons uniquement le nom de la fonction de retour.
					    'json' // Format des données reçues.
					);

					function fonction_retour(datas){
						$('#calendar').fullCalendar('removeEvents');
<<<<<<< HEAD
			      		$('#calendar').fullCalendar('addEventSource', datas);
			      		$('#calendar').fullCalendar('rerenderEvents' );
					}
				}

			$(function () {
					$('#datetimepicker1').datetimepicker({
							format: 'YYYY-MM-DD HH:mm',
							inline: true,
              sideBySide: true,
							ignoreReadonly: true
					});
					$('#datetimepicker2').datetimepicker({
							format: 'YYYY-MM-DD HH:mm',
							inline: true,
              sideBySide: true,
							ignoreReadonly: true,
							useCurrent: false //Important! See issue #1075
					});
					$("#datetimepicker1").on("dp.change", function (e) {
							$('#datetimepicker2').data("DateTimePicker").minDate(e.date);
					});
					$("#datetimepicker2").on("dp.change", function (e) {
							$('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
					});

			});



			$(document).ready(function() {



=======
			      $('#calendar').fullCalendar('addEventSource', datas);
			      $('#calendar').fullCalendar('rerenderEvents' );
					}
				}

			$(document).ready(function() {

>>>>>>> develop
				var checked_arr = [];

				$('#select_all').click(function() {
					$('input[name=agenda_select]').each(function () {
						if (!$(this).prop("checked")) {
							$(this).prop("checked", true);
						}
					});
<<<<<<< HEAD
	
					var checked_arr = [];

					check(checked_arr);
=======
					var checked_arr = [];
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							checked_arr.push($(this).val());
						}
					});
>>>>>>> develop
					recup_events(checked_arr);
				});

				$('#deselect_all').click(function() {
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							$(this).prop("checked", false);
						}
					});
					var checked_arr = [];
<<<<<<< HEAD

					check(checked_arr);
					recup_events(checked_arr);
				});

        		$('input[name=agenda_select]').click(function() {
        			var checked_arr = [];

					check(checked_arr);
					recup_events(checked_arr);
				});

			  			$('#calendar').fullCalendar({ //Initialisation du calendrier

					     themeSystem: 'bootstrap4', //Theme fullcalendar
=======
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							checked_arr.push($(this).val());
						}
					});
					recup_events(checked_arr);
				});

        		$('input[name=agenda_select]').click(function() {
        			var checked_arr = [];
					$('input[name=agenda_select]').each(function () {
						if ($(this).prop("checked")) {
							checked_arr.push($(this).val());
						}
					});
					recup_events(checked_arr);
				});

							// page is now ready, initialize the calendar...
			  			$('#calendar').fullCalendar({
					    // put your options and callbacks here
					     themeSystem: 'bootstrap4',
>>>>>>> develop
					    		header: {
					        	left: "prev,next today", //Boutons à gauche du calendrier
					        	center: 'title', //titre du calendrier = Mois actuel
					        	right: 'month,agendaWeek,agendaDay,listWeek' //Boutons permettant de changer la vue

					      	},
<<<<<<< HEAD


					      	editable: true, 
					      	// cache: true,
					      	// contentHeight: "auto",
					      	businessHours: true, // display business hours
=======
						    dayClick: function(date, jsEvent, view) {
								var clickDate = date.format('YYYY-MM-DD hh:mm:ss');
								$('#start').val(clickDate);//dans la zone de formulaire 'debut' on choisis la date sur la quelle on cliqué
								$('#end').val(clickDate);//dans la zone de formulaire 'debut' on choisis la date sur la quelle on cliqué
								$('#exampleModal').modal('show');
								},

					      	editable: true,
>>>>>>> develop
					      	eventLimit: true, // allow "more" link when too many events
					      	displayEventEnd: true,
					      	displayEventTime: true,
<<<<<<< HEAD
					        events: { 					//evenements ajoutés dans le calendrier
							    url: './JSON/recup_events.php',		//URL du fichier où sont enregistrés les informations des évènements
							    type: 'POST', //Type de la requete
							    data: { 
							      checked: checked_arr //Récupère le tableau contenant les id des differents agenda
							    },
							    error: function() { 
							      alert("Problème lors de l'ajout d'évènement");
							    },

							},

							 windowResize: function(view) {
							  },
=======
					        events: {
							    url: './JSON/recup_events.php',
							    type: 'POST',
							    data: {
							      checked: checked_arr
							    },
							    error: function() {
							      alert('there was an error while fetching events!');
							    },
							    color: 'yellow',   // a non-ajax option
							    textColor: 'black' // a non-ajax option
							},
>>>>>>> develop

					      	navLinks: true, // can click day/week names to navigate views
					        selectable: true, //permet de sélectionner des cellules du calendrier
					        selectHelper: true,
<<<<<<< HEAD
					        formatDate: 'yyyy-MM-dd HH:mm', //format par défaut de la date
					        weekNumbers: true, //permet de cliquer sur un jour de la semaine pour voir en détail la liste d'event

							select: function(start, end) { //fonction permettant de selectionner une ou plusieurs cellules du calendrier en recuperant la date de debut et la date de fin de la période selectionnée
							
								$('#addOnModal').modal('show'); //appel du modal
								$('#datetimepicker1').data("DateTimePicker").date(start); //on entre la date 'start' en valeur prédéfinie dans le modal
								$('#datetimepicker2').data("DateTimePicker").date(end); //on entre la date 'end' en valeur prédéfinie dans le modal
					
=======
					        formatDate: 'yyyy-MM-dd HH:mm',
					        weekNumbers: true,
					        // firstHour: 8,

							select: function(start, end) {
								var eventData;
								$('#exampleModal').modal('show');
								$('#datetimepicker1').data("DateTimePicker").date(start);
								$('#datetimepicker2').data("DateTimePicker").date(end);
								eventData = {
									title : 'Nom',
									start : start,
									end : end,
								};
								$('#calendar').fullCalendar('renderEvent', eventData, true);


							$('#calendar').fullCalendar('unselect');
>>>>>>> develop
							},




<<<<<<< HEAD
							eventRender: function(eventObj, $el) { //fonction permettant de voir le détail d'un event lorsqu'on passe le curseur dessus
						        $el.popover({
						          title: eventObj.title, //Nom de l'event
						          content: eventObj.description ? eventObj.description : '', //Description de l'event, chaine vide si nulle
						          trigger: 'hover', //déclencher lors du passage sur un event
						          placement: 'right', //le popover apparait à droite de l'event
						          container: 'body' 
=======
							eventRender: function(eventObj, $el) {
						        $el.popover({
						          title: eventObj.title,
						          content: eventObj.description ? eventObj.description : '',
						          trigger: 'hover',
						          placement: 'right',
						          container: 'body'
>>>>>>> develop
						        });
						    },

						    // eventDrop: function (event, delta, revertFunc) {
          //      					 if (!confirm(event.title + " est déplacé le : " + event.start.format() + " Acceptez vous ce changement? ")) {
          //          						 revertFunc();
          //      					 } else {

          //       					}
          //  					 }

							})

				  			$("#display_calendar").click(function() {

							if ($("#calendar").css("display") == "none") {
								$("#calendar").css("display", "block");
							} else if ($("#calendar").css("display") == "block") {
								$("#calendar").css("display", "none");
							}

					});
				});
		});

	</script>

   </body>
</html>
