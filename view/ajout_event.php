<p class="required" id="js_error"></p>
<form method="POST" action="." id="event" onsubmit="return verifAddEventForm(this)">

	<!-- Type de l'evenement -->

	<div class="form-group row">
		<label for="id_type" class="col-sm-4 col-form-label">Nom de l'evenement<sup class='required'>*</sup></label>
		<div class="col-sm-8">
			<select name="type" form="event" id="id_type" class="form-control" required autofocus>
				<option value="" selected disabled hidden></option>
				<?php
					$values = ['Reunion', 'Repas', 'Anniversaire', 'Cours', 'Examen'];
					foreach ($values as $value) {
						echo "<option value=".$value.">".$value."</option>";
					}
				?>
			</select>
		</div>
	</div>


	<!-- Description -->
	<br />
	<label for="id_desc">Description de l'evenement </label>
	<textarea class="form-control" name="desc" id="id_desc" placeholder="Description" onblur="verifText(this)"></textarea>


	<!-- Champs de dates -->
	<br />
	<p>Debut</p>
	<label for="id_Ddebut">Date<sup class='required'>*</sup> </label>
	<input type="date" name="Ddebut" id="id_Ddebut" required="true" />
	<label for="id_Hdebut">Heure </label>
	<input type="time" name="Hdebut" id="id_Hdebut" />

	<p>Fin</p>
	<label for="id_Dfin">Date<sup class='required'>*</sup> </label>
	<input type="date" name="Dfin" id="id_Dfin" required="true" />
	<label for="id_Hfin">Heure </label>
	<input type="time" name="Hfin" id="id_Hfin" />


	<!--<div class="container">
		<div class='col-md-2'>
				<div class="form-group">
						<div class='input-group date' id='datetimepicker6'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
				</div>
		</div>
		<div class='col-md-2'>
				<div class="form-group">
						<div class='input-group date' id='datetimepicker7'>
								<input type='text' class="form-control" />
								<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
				</div>
		</div>
</div>
<script type="text/javascript">
		$(function () {
				$('#datetimepicker6').datetimepicker();
				$('#datetimepicker7').datetimepicker({
						useCurrent: false //Important! See issue #1075
				});
				$("#datetimepicker6").on("dp.change", function (e) {
						$('#datetimepicker7').data("DateTimePicker").minDate(e.date);
				});
				$("#datetimepicker7").on("dp.change", function (e) {
						$('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
				});
		});
</script>-->


	<!-- Lieu -->
	<br />
	<label for="id_lieu">Lieu </label>
	<input type="text" name="lieu" id="id_lieu" onblur="verifText(this)"/>


	<!-- Options -->
	<br />
	<label for="id_prio">Prioritaire </label>
	<input type="checkbox" name="prio" id="id_prio" value="0" />

	<label for="id_public">Public </label>
	<input type="checkbox" name="public" id="id_public" />
