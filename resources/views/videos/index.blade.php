@extends('app')

@section('content')


<div class="container" style="position:relative; background-color:#fff;">

<h3> List of videos</h3>

<!--<div class="container videos-results">-->

	@if ( !$videos->count() )
	        You have no videos
	@else
		<ul class = "list-group">




		@foreach ($videos as $video)

					<li class="list-group-item">
					<!--<a href="{{route('videos.show', $video->slug) }}">	-->
					<span class="badge">{{$video['class']}}</span>
					<div class="row">
						<div class="col-xs-4 video-wrapper">

							<a href="{{ URL::route('videos.show', $video['slug']) }}">
							<video width="320" height="240" preload="metadata"  >
									<source src="{{video_base_path}}/{{$video['vid_url']}}" type="video/mp4">
									Your browser does not support the video tag.
							</video>
						</a>

						</div>
						<div class="cols-xs-8" style="position:relative; overflow:auto;">
							<a href="{{ URL::route('videos.show', $video['slug']) }}"><h4 >{{ucwords($video['title'])}}</h4></a>
							<strong><p>
								<!-- Unit: {{$video['unit']}} <br/> -->
								Topic: {{$video['topic']}} <br/>
								Instructor: {{ $video['instructor'] }} <br/>
								@if ( !$video['updated_at'] )
									Created Date: {{ $video['created_at'] }}
								@else
									Updated Last: {{ $video['updated_at'] }}

								@endif
							</p></strong>
								<div class="hidden">{{$userRole = AuthHelper::authenticate()}}</div>
								@if($userRole == 'admin' || $userRole == 'faculty')
								<div class="well well-sm"><p class="text-primary"><strong>{{video_absolute_path}}/{{$video['vid_url']}}<strong></p></div>
								<style type='text/css'>
								form{display:inline;}
								textarea{font-size:10px;vertical-align:middle}
								button{vertical-align:middle}
								</style>
								<textarea class="js-copytextarea" id="clipboard{{$video['id']}}" rows="1" cols="10">&lt;iframe name=&quot;wistia_embed&quot; width=&quot;645&quot; height=&quot;365&quot; src=&quot;{{video_player}}/{{$video['vid_url']}}&quot; allowtransparency=&quot;true&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; allowfullscreen=&quot;yes&quot;&gt;&lt;/iframe&gt;</textarea><button class="js-textareacopybtn" onclick="copy('clipboard{{$video['id']}}')">Blackboard embed tag</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<textarea class="js-copytextarea" id="clipboardWeb{{$video['id']}}" rows="1" cols="10">&lt;video width=&quot;640&quot; height=&quot;360&quot; allowtransparency=&quot;true&quot; frameborder=&quot;0&quot; scrolling=&quot;no&quot; controls&gt;
									&lt;source src=&quot;{{video_absolute_path}}/{{$video['vid_url']}}"&quot; type=&quot;video/mp4&quot;&gt;
									Your browser does not support the video tag.
									&lt;/video&gt;</textarea><button class="js-textareacopybtn" onclick="copy('clipboardWeb{{$video['id']}}')">Web embed tag</button>
								@endif
						</div>
					</div>

					<!-- </a> -->
				</li>

		@endforeach


		</ul>
		<center>{!! $videos->render() !!}</center>
	@endif
</div>
<!-- </div> -->
<script type="text/javascript">
function copy(id) {
	var text = document.getElementById(id);
	text.select();
	try{
			document.execCommand('copy');
		}catch(err){
			console.log("error in copying");
		}
}
</script>
@endsection
