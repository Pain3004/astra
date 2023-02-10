

"use strict";

$(function (e) {

	var data = {};

	// Editable Responsive Table
	$('#editable-responsive-table').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
		}
	});

	// Editable File-Export Data Table
	var table = $('#editable-file-datatable').DataTable({
		buttons: ['copy', 'excel', 'pdf', 'colvis'],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
		}
	});
	// table.buttons().container()
	// 	.appendTo('#editable-file-datatable_wrapper .col-md-6:eq(0)');

	// Delete Data Table
	var table = $('#delete-datatable').DataTable({
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
		}
	});
	$('#delete-datatable tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
	$('#button').on("click", function () {
		table.row('.selected').remove().draw(false);
	});

	// Select2 
	$('.select2').select2({
		minimumResultsForSearch: Infinity
	});

});

function changeRate(val) {
	if (val == 'mile') {
		$('#dMile').toggle();
		$('#dPercentage').hide();
		$('#dHourly').hide();
	}
	if (val == 'percentage') {
		$('#dPercentage').toggle();
		$('#dMile').hide();
		$('#dHourly').hide();
	}
	if (val == 'hour') {
		$('#dHourly').toggle();
		$('#dMile').hide();
		$('#dPercentage').hide();
	}
}

function changeRateEdit(val) {
    if (val == 'mile') {
        $('#dMileEdit').toggle();
        $('#dPercentageEdit').hide();
        $('#dHourlyEdit').hide();
    }
    if (val == 'percentage') {
        $('#dPercentageEdit').toggle();
        $('#dMileEdit').hide();
        $('#dHourlyEdit').hide();
    }
    if (val == 'hour') {
        $('#dHourlyEdit').toggle();
        $('#dMileEdit').hide();
        $('#dPercentageEdit').hide();
    }
}

function showdata(value) {
	if (value == "email") {
	  $("#emaildata").show();
	  $("#phonedata").hide();
	} else if (value == "text") {
	  $("#emaildata").hide();
	  $("#phonedata").show();
	}
}

$(document).on('click', '#driverpaybutton1', function () {
	$('#driverPayInfoModal').modal('show'); 
});

$(document).on('click', '#driverpaybutton1', function () {
	$('#driverPayInfoEditModal').modal('show'); 
});