jQuery(document).ready(function($) {
	$('[data-toggle="tooltip"]').tooltip();
	
	$('#new_contract_model').on('hidden.bs.modal', function (e) {
		$('#new_contract_form').trigger("reset");
	})
	
	$( document ).on( 'click', '#add_contract_button', function (e) {
		e.preventDefault();
		$('#new_contract_form').submit();	 
	})
	.on( 'submit', '#new_contract_form', function (e) {
		e.preventDefault();
		var form = $( this );
		var data = $( this ).serialize();
		$.post( '/ajax/site/new-contract.php', data, function( response ) {
			console.log( response );
			$( '.not_found' ).remove();
			$( '#contracts_list tbody' ).append( '<tr><td>' + $( '#new_contract_form #contractNumber' ).val() + '</td><td>' + $( '#new_contract_form #contractLocation' ).val() + '</td><td class="text-center"><a href="/reports/client/'+response.contractID+'/">0</a></td><td class="text-right"><a data-toggle="tooltip" data-placement="top" title="View Client" href="/clients/view/'+response.contractID+'/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a data-toggle="tooltip" data-placement="top" title="Contracts" href="/clients/contracts/'+response.contractID+'/" class="btn btn-success btn-xs"><i class="fa fa-cog fa-fw"></i></a> <a data-toggle="tooltip" data-placement="top" title="Delete Client" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a></td></tr>' );
			$('#new_contract_model').modal('hide');
		}, 'json' );
	});
});
