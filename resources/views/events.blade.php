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
    <button class="  tablinks bg-standard-violet base-radius text-white px-2 py-2"onclick="openCity(event, 'Research')" >{{__('public.Search')}}</button>
    <button class=" tablinks bg-standard-violet base-radius text-white px-2 py-2" onclick="openCity(event, 'CreateEvent')">{{__('public.Create_Event')}}</button>
    <a href="{{route('my-events')}}" type="button" class="tablinks bg-standard-violet base-radius text-white px-2 py-2">{{__('public.My_Events')}}</a>
  </div>
  <div id="Research" class="tabcontent">
      <button class="new_close_btn" onclick="removeElement1()">Close</button>
  <form action="#" method="POST" id="search_form" enctype="multipart/form-data">
      @csrf
    <div class="row">
      <div class="col-md-6">
	  <div class="form-group">
        <p class="name2">{{__('public.Choose_category')}}</p>
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
		<label class="name2">{{__('public.Start_Date')}}</label>
        <input class="form-control mb-2" type="date" id="birthday" name="start_date">
		</div>
		<div class="form-group">
		<label class="name2">{{__('public.Postal_Code')}}</label>
        <input class="form-control mb-2" type="text" name="postal_code" placeholder="{{__('public.Postal_Code')}}">
		</div>
		
      </div>
      <div class="col-md-6">
	  <div class="form-group"style=" text-align: justify;">
        <p class="name2">{{__('public.Choose_Event_Type')}}</p>
        @if(!empty($event_types))
        @foreach($event_types as $k=>$event_type)
        <label class="checkd" for="type{{ $k }}" style="margin-left: 4px;">
        <input type="checkbox" class="checkd" id="type{{ $k }}" name="event_types[]" value="{{ $event_type->title }}">
        {{ $event_type->title }} </label>
        @endforeach
        @endif 
		</div>
		<div class="form-group">
		<label class="name2">{{__('public.Town')}}</label>
        <input class="form-control mb-2" type="text" name="town" placeholder="{{__('public.Town')}}" value="">
		</div>
		<button type="submit" id="search_btn" class="border-while border mt-lg-4 bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">{{__('public.Search')}}</button>
		</div>
    </div>
	</form>
  </div>
  <div id="CreateEvent" class="tabcontent">
       <button class="new_close_btn" onclick="removeElement()">Close</button>
    <form action="#" method="POST" id="event_form" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Event_title')}}</label>
            <input class="form-control mb-2" type="text" name="title" value="{{old('title')}}">
            <span class="help-block" id="priceError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Event_type')}}</label>
            <select class="form-control mb-2" name="event_type">
              <option value="">{{__('public.Select')}}</option>
            @if(!empty($event_types))
    		@foreach($event_types as $k=>$event_type)
                  <option value="{{ $event_type->title }}" @if(old('event_type')==$event_type->title ) {{ 'public.selected' }} @endif>{{ $event_type->title }}</option>
    		@endforeach
    		@endif
            </select>
            <span class="help-block" id="event_typeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Category_event')}}</label>
            <select class="form-control mb-2" name="event_category">
              <option value="">{{__('public.Select')}}</option>
          @if(!empty($event_categories))
		@foreach($event_categories as $k=>$event_category)
              <option value="{{ $event_category->title }}" @if(old('event_type')==$event_category->title ) {{ 'public.selected' }} @endif>{{ $event_category->title }}</option>
		@endforeach
		@endif
            </select>
            <span class="help-block" id="event_categoryError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.event_address')}}</label>
            <input class="form-control mb-2" type="text" name="address" value="{{old('address')}}">
            <span class="help-block" id="addressError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Postal_Code')}}</label>
            <input class="form-control mb-2" type="text" name="postal_code" value="{{old('postal_code')}}">
            <span class="help-block" id="postal_codeError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Town')}}</label>
            <input class="form-control mb-2" type="text" name="town" value="{{old('town')}}">
            <span class="help-block" id="townError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Registration_Email')}}</label>
            <input class="form-control mb-2" type="text" name="email" value="{{old('email')}}">
            <span class="help-block" id="emailError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Start_Date')}}</label>
            <input class="form-control mb-2" type="date" name="start_date" value="{{old('start_date')}}">
            <span class="help-block" id="start_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.End_Date')}}</label>
            <input class="form-control mb-2" type="date" name="end_date" value="{{old('end_date')}}">
            <span class="help-block" id="end_dateError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Registration_deadline')}}</label>
            <input class="form-control mb-2" type="date" name="registration_deadline" value="{{old('registration_deadline')}}">
            <span class="help-block" id="registration_deadlineError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Registration_limit')}}</label>
            <input class="form-control mb-2" type="text" name="registration_limit" value="{{old('registration_limit')}}">
            <span class="help-block" id="registration_limitError"></span> </div>
          <div class="form-group">
            <label class="white py-2 mb-2">{{__('public.Organizer')}}</label>
            <input class="form-control mb-2" type="text" name="organizer" value="{{old('organizer')}}">
            <span class="help-block" id="organizerError"></span> </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <label class="white py-2 mb-2">{{__('public.Event_banner')}}</label>
                </div>
                <div class="col-12">
                    <label for="files" class="btn choose_file">{{__('public.Choose_File')}}</label>
                </div>    
                 <input id="files" style="display:none;" type="file" name="banner" value="{{old('banner')}}">
            
                <span class="help-block" id="bannerError"></span> 
            </div>
            </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">{{__('public.Couples')}}</label>
                <input class="form-control mb-2" type="text" name="couples" value="{{old('couples')}}" placeholder="{{__('public.Price')}}">
                <span class="help-block" id="couplesError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">{{__('public.The_Women')}}</label>
                <input class="form-control mb-2" type="text" name="women" value="{{old('women')}}" placeholder="{{__('public.Price')}}">
                <span class="help-block" id="womenError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">{{__('public.Men')}}</label>
                <input class="form-control mb-2" type="text" name="men" value="{{old('men')}}" placeholder="{{__('public.Price')}}">
                <span class="help-block" id="menError"></span> </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label class="white py-2 mb-2">{{__('public.Transgender')}}</label>
                <input class="form-control mb-2" type="text" name="transgender" value="{{old('transgender')}}" placeholder="{{__('public.Price')}}">
                <span class="help-block" id="transgenderError"></span> </div>
            </div>
          </div>
          <div class="form-group">
            <label>{{__('public.Description_event')}}</label>
            <textarea class="form-control mb-3" rows="7" name="description">{{old('description')}}</textarea>
            <span class="help-block" id="descriptionError"></span> </div>
          <button type="submit" id="event_btn" class="border-white border bg-standard-white w-100 text-center text-dark  base-radius px-2 py-2 mr-2">{{__('public.Publish')}}</button>
        </div>
      </div>
    </form>
  </div>
    
   
  <div class="row">
    <div class="col-12 mt-4">
      <div class="row h-100 " id="show_events">
        <div class="coment mt-3 rounded">
          <h1 class="text-center text-secondary my-5">{{__('public.Loading')}}</h1>
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
function removeElement1() {
  document.getElementById("Research").style.display = "none";
}
</script> 
 <script>	
function removeElement() {
  document.getElementById("CreateEvent").style.display = "none";
}	
</script> 	
<script>
$(document).ready(function(){
  $(".new_tab1").click(function(){
  $("#Research").slideToggle();
  });
});
</script>

<script>
$(document).ready(function(){
  $(".new_tab2").click(function(){
  $("#CreateEvent").slideToggle();
  });
});
</script>
<script>
$(function() {
        $("#event_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#event_btn").text("{{__('public.Adding')}}");
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
                $("#event_btn").text("{{__('public.Published')}}");
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
				
				
				
				
                $("#event_btn").text("{{__('public.Not_Published')}}");
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
        $("#search_btn").text("{{__('public.Searching')}}");
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
