        $("#dateInput1").datepicker({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
//      buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
        buttonImageOnly: false,
        changeMonth: true,
        changeYear: true
    });

        $("#dateInput2").datepicker({
        dateFormat: 'dd-mm-yy',
        showOn: 'button',
//      buttonImage: 'http://jqueryui.com/demos/datepicker/images/calendar.gif',
        buttonImageOnly: false,
        changeMonth: true,
        changeYear: true
    });
// $("#commentForm").validate();
$(".select").validate({
  rules: {
    dateInput1: "required",
    dateInput2: "required"
  },
  messages: {
    dateInput1:"กรุณากรอกวันที่ (yyyy-mm-dd)",
    dateInput2: "กรุณากรอกวันที่ (yyyy-mm-dd)"
      }
});

$('.dropdown-toggle').dropdown();

