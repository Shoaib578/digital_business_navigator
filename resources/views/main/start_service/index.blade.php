@extends('main.layout.index')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<!--====================================
=            Hero Section            =
=====================================-->
<section class="section gradient-banner" >
	
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
				@if(request('page_number')+1 > $questions_count)

				<h3 style="color:white;">Please Reload the page so that make sure you have got the correct score</h3>
				<center>
					<h1 style="color:white;font-weight:bold;">Your Score is {{ $points}}/100</h1>
				</center>
				
				@else
				@foreach ($questions as $question)
					
					
					
					
					<div id="question_container"style="border: 1px solid white;border-radius:50px;background-color:white;padding:50px;">
						<h1>{{ $question->question }}</h1>		
						<br>
						<br>
						@foreach($answers as $answer)
							<div style="display: flex;flex-direction: row;">
								<input type="checkbox" value="{{ $answer->points }}" name="answer" id="answer">
								<label for="answer" style="margin-left:10px;">{{$answer->answer}}</label>
							</div>
						@endforeach
						
							
				
						
					</div>
					


					<a id="next" href="{{ route('start_service',[$service->id,request('page_number')+1]) }}"  class="btn btn-main-md" style="float:right;margin-top:50px;">Next</a>
					
				@endforeach
				@endif


			</div>
			
		</div>
	</div>
</section>
<!--====  End of Hero Section  ====-->
<script>
	
	
	$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
 

               
function next(){
	$("#next").on(
        'click',()=>{

			
			$.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/api/get_points') }}",
                  method: 'post',
                  data: {
					user_id:   <?php echo $user_id ?>,
					points: $box[0].attributes[1].nodeValue,
					service_id:  <?php echo $service->id ?>
                  },
                  success: function(result){
                     console.log(result);
                  }});

			
				 
		
		});

}

 



   
  
  if ($box.is(":checked")) {
	next();

    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});



</script>


@endsection