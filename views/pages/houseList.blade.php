@extends('layouts.master')

@section('title')
 Ev Lazım - Liste
@endsection

@section('content')

<div class="container">
	@include('layouts/_flash')
	@if(! $newfriends->isEmpty()  || !$newhouses->isEmpty() || !$newrents->isEmpty() )

		@foreach($newfriends as $newfriend)
			<div class="panel">
				<table>
					<tr>
						<th>
							@foreach($newfriend->friend_pics as $image)
								<div id="icon-image">
											@if($image->main == 1)
												<img src="{{ url($image->file_path) }}">
											@endif
								</div>
							@endforeach
						</th>
						<th>
							<div id="info">
								<a href="{{ action('pageController@friendDetail', $newfriend->slug) }}">{{ $newfriend->baslik }} </a><br>
								{{ $newfriend->user->adSoyad }} , {{ $newfriend->created_at }}<br>
								{{ $newfriend->cesit }}
							</div>
						</th>
					</tr>
				</table>
			</div>
		@endforeach
			@foreach($newhouses as $newhouse)
				<div class="panel">
					<table>
						<tr>
							<th>
								@foreach($newhouse->home_pics as $image)
									<div id="icon-image">
											@if($image->main == 1)
												<img src="{{ url($image->file_path) }}">
											@endif
									</div>
								@endforeach
							</th>
							<th>
								<div id="info">
									<a href="{{ action('pageController@homeDetail', $newhouse->slug) }}">{{ $newhouse->baslik }} </a><br>
									{{ $newhouse->user->adSoyad }} , {{ $newhouse->created_at }}<br>
									{{ $newhouse->cesit }}
								</div>
							</th>
						</tr>
					</table>
				</div>
			@endforeach
			@foreach($newrents as $newrent)
				<div class="panel">
					<table>
						<tr>
							<th>
								@foreach($newrent->rent_pics as $image)
									<div id="icon-image">
											@if($image->main == 1)
												<img src="{{ url($image->file_path) }}">
											@endif
									</div>
								@endforeach
							</th>
							<th>
								<div id="info">
									<a href="{{ action('pageController@rentDetail', $newrent->slug) }}">{{ $newrent->baslik }} </a><br>
									{{ $newrent->user->adSoyad }} , {{ $newrent->created_at }}<br>
									{{ $newrent->cesit }}
								</div>
							</th>
						</tr>
					</table>
				</div>
			@endforeach
	@else
		<div class="alert alert warning"> Henüz makale eklenmedi!</div>
	@endif




</div>
@stop