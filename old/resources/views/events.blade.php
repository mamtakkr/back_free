@extends('layouts.front')
<style>
.help-block
{
font-size:80%;
color:#222;
}
body
{
background-color: #000!important;
}
</style>
@section('content')
<div class="container">
  <div class="tab">
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'Research')">Search</button>
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'CreateEvent')">Create an Event</button>
    <button class="tablinks bg-standard-violet base-radius text-white px-2 py-2" onClick="openCity(event, 'MyEvents')">My Events</button>
  </div>
  <div id="Research" class="tabcontent">
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-6">
	  <div class="form-group">
        <p class="name2">Choose a category</p>
        @if(!empty($event_categories))
        @foreach($event_categories as $k=>$event_category)
        <label class="checkd" for="category{{ $k }}">
        <input type="checkbox" class="checkd" id="category{{ $k }}" name="event_categories[]" value="{{ $event_category->title }}">
        {{ $event_category->title }} </label>
        <br>
        @endforeach
        @endif 
		</div>
		<div class="form-group">
		<label class="name2">Start Date</label>
        <input class="form-control mb-2" type="date" id="birthday" name="start_date">
		</div>
		<div class="form-group">
		<label class="name2">Postal Code</label>
        <input class="form-control mb-2" type="text" name="postal_code" placeholder="Postal Code">
		</div>
		
      </div>
      <div class="col-md-6">
	  <div class="form-group"style=" text-align: justify;">
        <p class="name2">Choose an Event Type</p>
        @if(!empty($event_types))
        @foreach($event_types as $k=>$event_type)
        <label class="checkd" for="type{{ $k }}" style="margin-left: 4px;">
        <input type="checkbox" class="checkd" id="type{{ $k }}" name="event_types[]" value="{{ $event_type->title }}">
        {{ $event_type->title }} </label>
        @endforeach
        @endif 
		</div>
		<div class="form-group">
		<label class="name2">Town</label>
        <input class="form-control mb-2" type="text" name="town" placeholder="Town" value="">
		</div>
		<button type="submit" id="search_btn" class="border-while border mt-lg-4 bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">Search</button>
		</div>
    </div>
	</form>
  </div>
  <div id="CreateEvent" class="tabcontent">
    <form action="#" method="POST" id="event_form" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Event title</label>
            <input class="form-control mb-2" type="text" name="title" value="{{old('title')}}">
            <span class="help-block" id="priceError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Event type</label>
            <select class="form-control mb-2" name="event_type">
              <option value="">--Select--</option>
            @if(!empty($event_types))
    		@foreach($event_types as $k=>$event_type)
                  <option value="{{ $event_type->title }}" @if(old('event_type')==$event_type->title ) {{ 'selected' }} @endif>{{ $event_type->title }}</option>
    		@endforeach
    		@endif
            </select>
            <span class="help-block" id="event_typeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Category of the event</label>
            <select class="form-control mb-2" name="event_category">
              <option value="">--Select--</option>
          @if(!empty($event_categories))
		@foreach($event_categories as $k=>$event_category)
              <option value="{{ $event_category->title }}" @if(old('event_type')==$event_category->title ) {{ 'selected' }} @endif>{{ $event_category->title }}</option>
		@endforeach
		@endif
            </select>
            <span class="help-block" id="event_categoryError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">The address of the event</label>
            <input class="form-control mb-2" type="text" name="address" value="{{old('address')}}">
            <span class="help-block" id="addressError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Postal code</label>
            <input class="form-control mb-2" type="text" name="postal_code" value="{{old('postal_code')}}">
            <span class="help-block" id="postal_codeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Town</label>
            <input class="form-control mb-2" type="text" name="town" value="{{old('town')}}">
            <span class="help-block" id="townError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Registration Email/URL</label>
            <input class="form-control mb-2" type="text" name="email" value="{{old('email')}}">
            <span class="help-block" id="emailError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Start date</label>
            <input class="form-control mb-2" type="date" name="start_date" value="{{old('start_date')}}">
            <span class="help-block" id="start_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">End date</label>
            <input class="form-control mb-2" type="date" name="end_date" value="{{old('end_date')}}">
            <span class="help-block" id="end_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Registration deadline</label>
            <input class="form-control mb-2" type="date" name="registration_deadline" value="{{old('registration_deadline')}}">
            <span class="help-block" id="registration_deadlineError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Registration limit</label>
            <input class="form-control mb-2" type="text" name="registration_limit" value="{{old('registration_limit')}}">
            <span class="help-block" id="registration_limitError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">Organizer</label>
            <input class="form-control mb-2" type="text" name="organizer" value="{{old('organizer')}}">
            <span class="help-block" id="organizerError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">Event banner</label>
            <input type="file" id="myFile" name="banner" value="{{old('banner')}}">
            <span class="help-block" id="bannerError"></span> </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Couples</label>
                <input class="form-control mb-2" type="text" name="couples" value="{{old('couples')}}" placeholder="{{__('Price')}}">
                <span class="help-block" id="couplesError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">The Women</label>
                <input class="form-control mb-2" type="text" name="women" value="{{old('women')}}" placeholder="{{__('Price')}}">
                <span class="help-block" id="womenError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Men</label>
                <input class="form-control mb-2" type="text" name="men" value="{{old('men')}}" placeholder="{{__('Price')}}">
                <span class="help-block" id="menError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">Transgender</label>
                <input class="form-control mb-2" type="text" name="transgender" value="{{old('transgender')}}" placeholder="{{__('Price')}}">
                <span class="help-block" id="transgenderError"></span> </div>
            </div>
          </div>
          <div class="form-group">
            <label>Description of the event</label>
            <textarea class="form-control mb-3" rows="7" name="description">{{old('description')}}</textarea>
            <span class="help-block" id="descriptionError"></span> </div>
          <button type="submit" id="event_btn" class="border-white border bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">Publish</button>
        </div>
      </div>
    </form>
  </div>
  <div class="row">
    <div class="col-12 mt-4">
      <div class="row h-100 " id="show_events">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function openCity(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}
	</script>
<script>
$(function() {
        $("#event_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#event_btn").text('Adding...');
        $.ajax({
          url: '{{ route('event-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
            if (response.status == 200) {
                fetchAllEvents();
                $("#event_btn").text('Published');
				$('#CreateEvent').css('display','none');
                $("#event_form")[0].reset();
            }
            if (response.status == 401) {
				
				jQuery.each(response.errors, function(key, value){
							//alert(key);
                  			//jQuery('.alert-danger').show();
                  			//jQuery('.alert-danger').append('<li>'+value+'</li>');
							jQuery('#'+key+'Error').text(value);
                  		});
				
				
				
				
                $("#event_btn").text('Not Published');
                // $("#event_form")[0].reset(); 
            }
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	  
	  $("#search_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#search_btn").text('Searching...');
        $.ajax({
          url: '{{ route('event-search') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
		  	//alert(JSON.stringify(response));
			$("#show_events").html(response);
			$("#search_btn").text('Search');
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
        
      });
	  
	  
	  // fetch all posts ajax request
      fetchAllEvents();

      function fetchAllEvents() {
        $.ajax({
          url: '{{ route('fetchAllEvents') }}',
          method: 'get',
          success: function(response) {
            $("#show_events").html(JSON.parse(response));
          },
		  error: function(err)
		  {
		  //alert(JSON.stringify(err));
		  }
        });
      }
	  
	  
	 }); 
</script>
