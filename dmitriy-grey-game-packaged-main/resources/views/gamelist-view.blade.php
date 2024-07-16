<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			@foreach($games as $game)
			  <div class="col-sm-3">
			  	<a href="testprag?game_id={{ $game->game_id }}">
				  	<img style="max-height: 120px; border-radius: 1.5rem; margin: 10px;" src="{{ $game->thumbnail_ext }}"></img>
				  	<b>{{ $game->fullName }}</b> <br>
				  	<small>{{ $game->provider }}</small>
			  	</a>
			  </div>

			@endforeach
		</div>
	</div>
</body>
</html>