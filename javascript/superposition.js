

$(function () {

  function actualiser_plage(horaires, horaire) {
    var debut1 = horaire.slice(0, 5);
    var fin1 = horaire.slice(-5);
    var debut2 = "";
    var fin2 = "";
    var tres = horaires;
    var str = ""
    var overlap = false;
    console.log(horaires);
    $.each(horaires, function(id, horaire_test) {
      debut2 = horaire_test.slice(0, 5);
      fin2 = horaire_test.slice(-5);
      console.log(debut1 + " - " + fin1);
      console.log(debut2 + " - " + fin2);
      if (debut1 <= fin2 && fin1 >= debut2) {
        overlap = true;
        if (debut1 <= debut2) {
          str += debut1 + " - ";
        } else {
          str += debut2 + " - ";
        }
        if (fin1 >= fin2) {
          str += fin1;
        } else {
          str += fin2;
        }
        console.log(str);
        horaires.splice(id, 1);
        return false;
      }
    });
    if (overlap && horaires.length > 0) {
      actualiser_plage(horaires, str);
    } else {
      horaires.push(horaire);
      return horaires;
    }
  }

  $('#superposition_dropdown-menu').mouseleave(function () {
    $('#superposition_dropdown-menu').removeClass("show");
  });

  $(window).click(function () {
    $('#optimale_dropdown-menu').removeClass("show");
  });

  var horaires = [];
  $('#ajouter_horaire').click(function () {
    if ($.inArray($('#temps').html(), horaires) == -1) {
      //horaires.push($('#temps').html());
      horaires = actualiser_plage(horaires, $('#temps').html());
    }
    var str = "";
    $.each(horaires, function (id, horaire) {
      str += "<button type='button' class='btn btn-primary' value='" + id + "'>" + horaire + "</button>&nbsp;&nbsp;";
      if ((id+1) % 3 == 0) {
        str += "<br /><br />";
      }
    });
    $('#optimale_dropdown-menu').dropdown('update')
    $('#horaires').html(str);
  });
});

function superposition() {

    $('#drop_nom_agenda').html($('#id_type option:selected').text());

    $.post (
      "./JSON/recup_events_intervalle.php",
      {
        start : $('#startTime').val(),
        end : $('#endTime').val(),
        agenda : $('#id_addOn').val()
      },
      traite_resultat,
      'json'
    );

    function traite_resultat(datas) {
      if (datas.length > 0) {
        var arr_vous = [];
        $.each(datas, function(id, subdata) {
          $.each(subdata, function(id_arr, array) {
            $.each(array.pop(), function(id_item, item) {
            });
          });
        });

        if ($('#superposition_dropdown').find('.dropdown-menu').is(":hidden")){
          $('#superposition_dropdown-menu').dropdown('toggle');
        }

            /*if (size > 0) {
              $('#superposition_nb').html(event_nb);
              $('#superposition_detail').html(detail);
              if ($('#superposition_dropdown').find('.dropdown-menu').is(":hidden")){
                $('#superposition_dropdown-menu').dropdown('toggle');
              }
            } else {
                console.log('aucune superposition');
            }*/
        //$(id).html(string);
      }
    }
}

function optimale_dropdown() {
  $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 86400,
      step: 600,
      values: [ 28800, 39600 ],
      slide: function( event, ui ) {
        start = moment().startOf('day').seconds(ui.values[0]).format("HH:mm");
        end = moment().startOf('day').seconds(ui.values[1]).format("HH:mm");
        $( "#temps" ).html(start + " - " + end);
      }
    });
    $( "#temps" ).html("08:00 - 11:00");
  if ($('#optimale_dropdown').find('.dropdown-menu').is(":hidden")){
    $('#optimale_dropdown-menu').dropdown('toggle');
  }
}
