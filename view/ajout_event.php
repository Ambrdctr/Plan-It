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
	<div class="container">
		<div class='col-md-3'>
				<div class="form-group">
						<label for="startTime">Debut</label>
						<div class='input-group date' id='datetimepicker1'>
								<input type='text' class="form-control" name="debutTime" id="startTime" required/>
								<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
				</div>
		</div>
		<div class='col-md-3'>
				<div class="form-group">
						<label for="endTime">Fin</label>
						<div class='input-group date' id='datetimepicker2'>
								<input type='text' class="form-control" name="finTime" id="endTime" required/>
								<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
								</span>
						</div>
				</div>
		</div>
</div>
<script type="text/javascript">
		$(function () {
				$('#datetimepicker1').datetimepicker({
						format: 'YYYY-MM-DD HH:mm'
				});
				$('#datetimepicker2').datetimepicker({
						format: 'YYYY-MM-DD HH:mm',
						useCurrent: false //Important! See issue #1075
				});
				$("#datetimepicker1").on("dp.change", function (e) {
						$('#datetimepicker2').data("DateTimePicker").minDate(e.date);
				});
				$("#datetimepicker2").on("dp.change", function (e) {
						$('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
				});

		});
</script>


	<!-- Lieu -->
	<br />
	<label for="id_lieu">Lieu </label>
	<input type="text" class="form-control" name="lieu" id="id_lieu" onblur="verifText(this)"/>


	<!-- Options -->
	<br />

	<div class="form-check">
    <input type="checkbox" class="form-check-input" name="prio" id="id_prio">
    <label class="form-check-label" for="id_prio">Prioritaire</label>
  </div>

	<div class="form-check">
    <input type="checkbox" class="form-check-input" name="public" id="id_public">
    <label class="form-check-label" for="id_public">Public</label>
  </div>
