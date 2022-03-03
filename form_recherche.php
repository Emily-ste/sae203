<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://parsleyjs.org/dist/parsley.min.js"></script>
	<link rel="stylesheet" href="https://parsleyjs.org/src/parsley.css">

	<title></title>
</head>
<body>
	<hr>
	votre recherche:
	<hr>
	<form method="GET" action="reponse_recherche.php" data-parsley-validate>
		prix min : <input type="text" name="prix" data-parsley-type="number"> <br>
		prix max : <input type="text" name="prix" data-parsley-type="number"> <br>
	<input type="submit" name="valider">
	</form>
</body>
</html>