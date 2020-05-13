$(document).ready(function() {
	// event ketika keyword ditulis
	$('keyword').on('keyup', function() {
		$('container').load('ajax/buku.php?keyword=' + $('#keyword').val())
	})
});
