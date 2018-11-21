$(document).ready(function() {
    var table = $('#example').DataTable( {
        stateSave: true,
        responsive: true
    } );
 
    new jQuery.fn.dataTable.FixedHeader( table );
} );



window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 2000);

$(document).ready(function(){
var current = 1;

widget      = $(".step");
btnnext     = $(".next");
btnback     = $(".back"); 
btnsubmit   = $(".submit");

// Init buttons and UI
widget.not(':eq(0)').hide();
hideButtons(current);
setProgress(current);

// Next button click action
btnnext.click(function(){
if(current < widget.length){
// Check validation
if($(".form").valid()){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})


// Back button click action
btnback.click(function(){
if(current > 1){
current = current - 2;
if(current < widget.length){
widget.show();
widget.not(':eq('+(current++)+')').hide();
setProgress(current);
}
}
hideButtons(current);
})

$('.form').validate({ 
// initialize plugin
ignore:":not(:visible)",   
rules: {
region: "required",
country     : "required",
date     : "required",
foodsecuritylivelihood     : "required",
confidence : "required",
wash     : "required",
hnutrition     : "required",
health     : "required",
protection    : "required",
mprevention   : "required",
narrative : "required",
nfooditems     : "required",
people     : "required",
foodsecurity     : "required",
food_assistance     : "required",
nutrition     : "required",
educationpro : "required",
education : "required",

},


});

});

// Change progress bar action
setProgress = function(currstep){
var percent = parseFloat(100 / widget.length) * currstep;
percent = percent.toFixed();
$(".progress-bar").css("width",percent+"%").html(percent+"%");  
}

// Hide buttons according to the current step
hideButtons = function(current){
var limit = parseInt(widget.length); 

$(".action").hide();

if(current < limit) btnnext.show();
if(current > 1) btnback.show();
if (current == limit) { 
// Show entered values
$(".display label.lbl").each(function(){
$(this).html($("#"+$(this).data("id")).val()); 
});
btnnext.hide(); 
btnsubmit.show();
}
}


function sweetalertdelete(){

swal({
title: "Are you sure?",
text: "Once deleted, you will not be able to recover this imaginary file!",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  swal("Poof! Your imaginary file has been deleted!", {
    icon: "success",
  });
} else {
  swal("Your imaginary file is safe!");
}
});

}


$(document).ready(function(){
$(document).on("click",".delete_beneficiary",function(e){
e.preventDefault();
var benid = $(this).attr('data-ben-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Delete!",
className: "btn-danger",
callback: function() {
$.ajax({
 type: 'POST',
 url: 'deletebeneficiary.php',
 data: 'deleteben='+benid
})
.done(function(response){
 bootbox.alert(response);
 parent.fadeOut('slow');
})
.fail(function(){
 bootbox.alert('Error....');
 })
}
}
}
});
});
});





$(document).ready(function(){
$(document).on("click",".delete_funding",function(e){
e.preventDefault();
var fundid = $(this).attr('data-fund-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Delete!",
className: "btn-danger",
callback: function() {
$.ajax ({
 type: 'POST',
 url: 'deletefunding.php',
 data: 'deletefund='+fundid
})
.done(function(response){
 bootbox.alert(response);
 parent.fadeOut('slow');
})
.fail(function(){
 bootbox.alert('Error....');
 })
}
}
}
});
});
});


$(document).ready(function(){
$(document).on("click",".delete_people",function(e){
e.preventDefault();
var peopleid = $(this).attr('data-people-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Delete!",
className: "btn-danger",
callback: function() {
$.ajax({
 type: 'POST',
 url: 'deletepeople.php',
 data: 'deletepeople='+peopleid
})
.done(function(response){
 bootbox.alert(response);
 parent.fadeOut('slow');
})
.fail(function(){
 bootbox.alert('Error....');
 })
}
}
}
});
});
});




$(document).ready(function(){
$(document).on("click",".delete_fragility",function(e){
e.preventDefault();
var fragilityid = $(this).attr('data-fragility-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Delete!",
className: "btn-danger",
callback: function() {
$.ajax({
 type: 'POST',
 url: 'deletefragility.php',
 data: 'deletefragilityindex='+fragilityid
})
.done(function(response){
 bootbox.alert(response);
 parent.fadeOut('slow');
})
.fail(function(){
 bootbox.alert('Error....');
 })
}
}
}
});
});
});



$(document).ready(function(){
$(document).on("click",".delete_earlywarning",function(e){
e.preventDefault();
var earlywarningid = $(this).attr('data-earlywarning-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
label: "Delete!",
className: "btn-danger",
callback: function() {
$.ajax({
 type: 'POST',
 url: 'delete_early_warning.php',
 data: 'delete_earlywarning='+earlywarningid
})
.done(function(response){
 bootbox.alert(response);
 parent.fadeOut('slow');
})
.fail(function(){
 bootbox.alert('Error....');
 })
}
}
}
});
});
});



$(document).ready(function(){
$(document).on("click",".delete_situation",function(e){
e.preventDefault();
var deletesituationid = $(this).attr('data-situation-id');
var parent = $(this).parent("td").parent("tr");
bootbox.dialog({
message: "Are you sure you want to Delete ?",
title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
buttons: {
success: {
label: "Cancel",
className: "btn-warning",
callback: function() {
$('.bootbox').modal('hide');
}
},
danger: {
 label: "Delete!",
 className: "btn-danger",
 callback: function() {
  $.ajax({
   type: 'POST',
   url: 'delete_situation_report.php',
   data: 'deletesituationreport='+deletesituationid
  })
  .done(function(response){
   bootbox.alert(response);
   parent.fadeOut('slow');
  })
  .fail(function(){
   bootbox.alert('Error....');
   })
 }
}
}
});
});
});





$('#add-date').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});


$('#last-update').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});

$('#add-ben-date').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});


$('#update-earlywarning-date').datepicker({
    format: 'mm/yyyy',
    startView: "months", 
    minViewMode: "months"
});


function category_earlywarning(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","indicator.php?category_indicator="+document.getElementById("selectewc").value,false);
    xmlhttp.send(null);
    document.getElementById("ewindicator").innerHTML=xmlhttp.responseText;
}


function getUserCountries(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","get_user_countries.php?userCountries="+document.getElementById("region").value,false);
  xmlhttp.send(null);
  document.getElementById("country").innerHTML=xmlhttp.responseText;
}


function indicator_possibleanswer(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","possible_answer.php?panswer="+document.getElementById("ewindicator").value,false);
    xmlhttp.send(null);
    document.getElementById("pa").innerHTML=xmlhttp.responseText;
}






(function() {
  $( 'ul.nav li' ).on( 'click', function() {
        $( this ).parent().find( 'li.active' ).removeClass( 'active' );
        $( this ).addClass( 'active' );
  });
});



$("#add_situation").ready(function(){
$("#add_situation").validate();
});

// $("#add_fragility").ready(function(){
// $("#add_fragility").validate();
// });



$("#add_country").ready(function(){
$("#add_country").validate();
});


$("#add_country_category").ready(function(){
$("#add_country_category").validate();
});







(function () {
$('[data-toggle="tooltip"]').tooltip();   
})

$(document).ready(function(){
  $('[rel="tooltip"]').tooltip({trigger: "hover"});
});








var form = document.querySelector('form');
if(form){
form.addEventListener('submit', function() {
var buttons = this.querySelectorAll('input[type="submit"]');
buttons.forEach(function(button) {
  button.setAttribute('disabled', 'disabled');
});
}, false);
}




$(function ()
{
    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "none",
        enableFinishButton: false,
        enablePagination: false,
        enableAllSteps: true,
        titleTemplate: "#title#",
        cssClass: "tabcontrol",
        onStepChanged: function (event, currentIndex, priorIndex) {
          console.log('priorIndex: ', priorIndex);
          console.log('currentIndex: ', currentIndex);
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {
          console.log('onStepChanging priorIndex: ', priorIndex);
          console.log('onStepChanging currentIndex: ', currentIndex);
          // form.validate().settings.ignore = ":disabled,:hidden";
          // return form.valid();
        },
        onNext: function (prev, navigation, index) {
          if (index == 1) {
  
          }
          console.log('Next index: ', index);
        }
        
    });
});

// Country activation
$(document).ready(function(){
  $(document).on('click', '#ChangeCountryStatus', function(e){

    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#country-status-dc').html(''); // leave it blank before ajax call
    
    $.ajax({
      url: 'change_country_status.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      //console.log(data);  
      $('#country-status-dc').html('');    
      $('#country-status-dc').html(data); // load response 
    })
    .fail(function(){
      $('#country-status-dc').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
    });
    

  });

});



// Category activation
$(document).ready(function(){
  $(document).on('click', '#ChangeSectorStatus', function(e){

    e.preventDefault();
    
    var id = $(this).data('id');   // it will get id of clicked row
    
    $('#sector-dynamic-content').html(''); // leave it blank before ajax call
    $('#sector-modal-loader').show();      // load ajax loader
    
    $.ajax({
      url: 'change_sector_status.php',
      type: 'POST',
      data: 'id='+id,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#sector-dynamic-content').html('');    
      $('#sector-dynamic-content').html(data); // load response 
      $('#sector-modal-loader').hide();     // hide ajax loader 
    })
    .fail(function(){
      $('#sector-dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#sector-modal-loader').hide();
    });
    

  });

});



// Category activation
$(document).ready(function(){
  $(document).on('click', '#GetCountry', function(e){
    e.preventDefault();
    
    var id = $(this).data('id');   // it will get id of clicked row
    
    $('#country-details-dc').html(''); // leave it blank before ajax call
    $('#add_country_category').show();      // load ajax loader
    
    $.ajax({
      url: 'get_country_details.php',
      type: 'POST',
      data: 'id='+id,
      dataType: 'html'
    })
    .done(function(data){
      //console.log(data);  
      $('#country-details-dc').html('');    
      $('#country-details-dc').html(data); // load response 
      $('#add_country_category').hide();     // hide ajax loader 
    })
    .fail(function(){
      $('#country-details-dc ').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#add_country_category').hide();
    });
    

  });

});


// View country categories
$(document).ready(function(){
  $(document).on('click', '#ViewCountryCategory', function(e){
    e.preventDefault();
    
    var id = $(this).data('id');   // it will get id of clicked row
    console.log('country id = ', id);
    $('#country-categories-dc').html(''); // leave it blank before ajax call
    $('#view-country-category-modal').show();      // load ajax loader
    
    $.ajax({
      url: 'view_country_categories.php',
      type: 'POST',
      data: 'id='+id,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#country-categories-dc').html('');    
      $('#country-categories-dc').html(data); // load response 
      $('#view-country-category-modal').hide();     // hide ajax loader 
    })
    .fail(function(){
      $('#country-categories-dc').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
      $('#view-country-category-modal').hide();
    });
    

  });

});

function getCategoriesForSituationReport() {
  var ajaxRequest;  // The variable that makes Ajax possible!
  try {
    // Opera 8.0+, Firefox, Safari
    ajaxRequest = new XMLHttpRequest();
  } catch (e){
   
  // Internet Explorer Browsers
   try{
     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
   }catch (e) {
    
    try {
      ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {
    
     // Something went wrong
     alert("Your browser broke!");
     return false;
    }
   }
  }
  
  // Create a function that will receive data
  // sent from the server and will update div section in the same page.
  ajaxRequest.onreadystatechange = function(){
  
   if(ajaxRequest.readyState == 4){
    var ajaxDisplay = document.getElementById('category-tabs-dc');
    ajaxDisplay.innerHTML = ajaxRequest.responseText;
   }
  }
  
  // Now get the value from user and pass it to server script.
  var country = document.getElementById('country').value;
  var queryString = "?country=" + country ;
  //console.log('queryString: ', queryString);
  
  ajaxRequest.open("GET", "get_categories_for_sit_rep.php" + queryString, true);
  ajaxRequest.send(null); 
  
}




var primary_contacts = [];

$(document).ready(function () {
  //primary_contacts = $('#PrimaryContactInfoTable');
});

function AddPrimaryContactInfo() {
  
  var primary_contact = {
      Identifier: $('#PrimaryContactInfoTable tbody')[0].rows.length + 1,
      FirstName: $('#ContactFirstName').val(),
      LastName: $('#ContactLastName').val(),
      EmailAddress: $('#ContactEmailAddress').val(),
      Skype: $('#ContactSkype').val(),
      Office: $('#ContactOffice').val(),
      Role: $('#ContactRole').val()
  }

  primary_contacts.push(primary_contact);
  AddPrimaryContactInfoToTable(primary_contact);
  console.log('primary_contact:', primary_contact);
  console.log('primary_contacts:', primary_contacts);

  //reset inputs
  $('#ContactFirstName').val('');
  $('#ContactLastName').val('');
  $('#ContactEmailAddress').val('');
  $('#ContactSkype').val('');
  $('#ContactOffice').val('');
  $('#ContactRole').val('');
}

function AddPrimaryContactInfoToTable(model) {
  $('#PrimaryContactInfoTable').find('tbody')
  .append($("<tr id='" + model.Identifier + "'>")
  .append($('<td>')
      .text(model.FirstName))
  .append($('<td>')
      .text(model.LastName))
  .append($('<td>')
      .text(model.EmailAddress))
  .append($('<td>')
      .text(model.Skype))
  .append($('<td>')
      .text(model.Office))
  .append($('<td>')
      .text(model.Role))
  .append($('<td>')
      .append("<a href='javascript:;' onclick='RemovePrimaryContactInfo(this)'><i class='fa fa-lg fa-close text-danger'></i></a>")))
}

function RemovePrimaryContactInfo(data) {
  var index = data.rowIndex;

  var row = $(data)[0].parentNode.parentNode;
  console.log('selected row:', row);
  console.log('selected row index:', index);
  if (index > -1) {
    primary_contacts.splice(index, 1);
    $('#PrimaryContactInfoTable tr#' + row.id).remove();
  }
}

window.onload = function() {
  var form = document.getElementById('situationForm');
  form.addEventListener('submit', function(){
      var primaryContactsField = document.getElementById('primary_contacts');
      //var markers = [1,2,3];
      primaryContactsField.value = JSON.stringify(primary_contacts);
  });
}






