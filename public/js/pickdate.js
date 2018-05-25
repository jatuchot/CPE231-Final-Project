$('#start_form').pickdate({
  cancel           : 'Clear',
  closeOnCancel    : false,
  closeOnSelect    : true,
  container        : 'body',
  containerHidden  : 'body',
  firstDay         : 1,
  format           : 'You selecte!d: dddd, d mm, yy',
  formatSubmit     : 'dd/mmmm/yyyy',
  hiddenPrefix     : 'prefix_',
  hiddenSuffix     : '_suffix',
  labelMonthNext   : 'Go to the next month',
  labelMonthPrev   : 'Go to the previous month',
  labelMonthSelect : 'Choose a month from the dropdown menu',
  labelYearSelect  : 'Choose a year from the dropdown menu',
  ok               : 'Close',
  onClose          : function () {
    console.log('Datepicker closes')
  },
  onOpen           : function () {
    console.log('Datepicker opens')
  },
  selectMonths     : true,
  selectYears      : 10,
  today            : 'Today'
});

$('#end_at').pickdate({
  cancel           : 'Clear',
  closeOnCancel    : false,
  closeOnSelect    : true,
  container        : 'body',
  containerHidden  : 'body',
  firstDay         : 1,
  format           : 'You selecte!d: dddd, d mm, yy',
  formatSubmit     : 'dd/mmmm/yyyy',
  hiddenPrefix     : 'prefix_',
  hiddenSuffix     : '_suffix',
  labelMonthNext   : 'Go to the next month',
  labelMonthPrev   : 'Go to the previous month',
  labelMonthSelect : 'Choose a month from the dropdown menu',
  labelYearSelect  : 'Choose a year from the dropdown menu',
  ok               : 'Close',
  onClose          : function () {
    console.log('Datepicker closes')
  },
  onOpen           : function () {
    console.log('Datepicker opens')
  },
  selectMonths     : true,
  selectYears      : 10,
  today            : 'Today'
});
