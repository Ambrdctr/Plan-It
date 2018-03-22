$('#logo_A').hover(function () {
  $('#logo').css('filter', 'brightness(100%)');
});

$('#logo_A').mouseleave(function () {
  $('#logo').css('filter', 'brightness(80%)');
});

$("#popover").popover({ trigger: "hover" });
