// Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();

  $('.button-collapse').sideNav({
      menuWidth: 200, // Default is 240
      //edge: 'right', // Choose the horizontal origin
     // closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
$(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
$(document).ready(function(){
    $('.materialboxed').materialbox();
  });
 $(document).ready(function(){
      $('.carousel').carousel();
    }); 
$('.carousel').carousel('next');
$('.carousel').carousel('next', [3]); // Move next n times.
// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', [4]); // Move prev n times.


 $(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
/*my written scripts*/
function confirmi(){
    confirm('You acctualy want to change this you were looking awsome alredy');
}


$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });

$('#textarea1').val('');
  $('#textarea1').trigger('autoresize');

$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });

//for search bar 
$(document).ready(function(){
    $('input[type=search]').keyup(function(){
        var search_term= $(this).val();
       $.post('ajax/search.php' , {search_term:search_term } , function(data){
            $('.collection').html(data);
            $('.collection li').click(function(){
               var result_value = $(this).text();
                $('input[type=search]').attr('value' ,result_value);
                $('input[type=search]').html('');
            });
       }); 
    });
});

$(document).ready(function() {
    $('select').material_select();
});