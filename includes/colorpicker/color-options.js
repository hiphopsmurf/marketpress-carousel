var farbtastic;



(function($){

	var pickColor = function(a) {

		farbtastic.setColor(a);

		$('#mpc-color').val(a);

		$('#mpc-color-example').css('background-color', a);

	};



	$(document).ready( function() {

		$('#default-color').wrapInner('<a href="#" />');



		farbtastic = $.farbtastic('#colorPickerDiv', pickColor);



		pickColor( $('#mpc-color').val() );



		$('.pickcolor').click( function(e) {

			$('#colorPickerDiv').show();

			e.preventDefault();

		});



		$('#link-color').keyup( function() {

			var a = $('#mpc-color').val(),

				b = a;



			a = a.replace(/[^a-fA-F0-9]/, '');

			if ( '#' + a !== b )

				$('#mpc-color').val(a);

			if ( a.length === 3 || a.length === 6 )

				pickColor( '#' + a );

		});



		$(document).mousedown( function() {

			$('#colorPickerDiv').hide();

		});



		$('#default-color a').click( function(e) {

			pickColor( '#' + this.innerHTML.replace(/[^a-fA-F0-9]/, '') );

			e.preventDefault();

		});

	});

})(jQuery);