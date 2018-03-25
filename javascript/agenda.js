$(function () {

/******************************************************************************* Gestion du DateTimePicker ********************************************************/
    $('[data-toggle="popover"]').popover({ trigger: "hover" });
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        inline: true,
        sideBySide: true,
        minDate: moment(),
        ignoreReadonly: true
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        inline: true,
        sideBySide: true,
        ignoreReadonly: true,
        date: moment().add('hours', 1),
        minDate: moment().add('minutes', 1),
        useCurrent: false //Important! See issue #1075
    });

    $("#datetimepicker1").on("dp.change", function (e) {
      if ($('#datetimepicker2').data("DateTimePicker").date() < $('#datetimepicker1').data("DateTimePicker").date()) {
        $('#datetimepicker2').data("DateTimePicker").date($('#datetimepicker1').data("DateTimePicker").date().add('hours', 1));
      }
      $('#datetimepicker2').data("DateTimePicker").minDate(e.date.add('minutes', 1));
    });


/******************************************************************************* Recuperation des evenements d'un ou plusieurs agenda(s) ***************************/

function recup_events(liste_agenda, id) {
  //Entree : une liste d'id d'agenda et l'id de la liste ou l'on affiche les evenements
  //Sortie : affichage des evenements recupere

  $.post( // Requete ajax (methode post)
      './JSON/recup_events.php', // Le fichier cible côté serveur
      {
          checked : liste_agenda, // Passage des id dans la variable $_POST['checked']
      },
      fonction_retour, // nom de la fonction de retour.
      'json' // Format des données recues
  );


  function fonction_retour(datas){
    var string = "";
    if (datas.length > 0) {
      $.each(datas, function(index, item) {
        if (item.description.length > 0) {
          string += "<li class='list-group-item' data-toggle='popover' data-placement='bottom' data-content='test'>" + item.description + "</li>";
        } else {
          string += "<li class='list-group-item' data-toggle='popover' data-placement='bottom' data-content='test'>" + item.nom + "</li>";
        }
      });
      //$(id).html(string);
    } else {
      $(id).html("aucun évènement");
    }
  }
}


/******************************************************************************* Recherche suppression dans agenda selectionne *************************************/

$("#search_field").focus(function () {
  recup_events([$("#id_deleteOn").val()], "#search_list");
  $(document).ajaxStop(function functionName() {
    $("#search_list").css("display", "block");
  });
})

$("#search_field").focusout(function () {
  $("#search_list").css("display", "none");
})

});


/******************************************************************************* Filtre la recherche ***************************************************************/

function searchFunction() {
    // Declare variables
    var input, filter, ul, li, a, i;
    input = $('#search_field');
    filter = input.val().toUpperCase();
    ul = $("#search_list");
    li = ul.$('li');

    // Parcours des elements de la liste, on cache ceux qui ne correspondent pas au filtre
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}


/******************************************************************************* Fonctions *************************************************************************/

/* Passage de la valeur de l'agenda selectionné Ajout evenement               */
function addOn_selected(id) {
  $("#id_addOn").val(id);
}

/* Passage de la valeur de l'agenda selectionné  Suppression evenement        */
function deleteOn_selected(id) {
  $("#id_deleteOn").val(id);
}

/* Passage de la valeur de l'agenda selectionné  Suppression agenda           */
function delete_selected(id) {
  $("#id_delete").val(id);
}
