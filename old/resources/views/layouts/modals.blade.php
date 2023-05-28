<div class="modal" id="youModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
				<a type="button" data-dismiss="modal" class="close">Fermer</a>
				<div class="col-8">
					<h2>{{get_cms('equal_men_title')}}</h2>
					{!! get_cms('equal_men_description') !!}
				</div>	
			</div>
		</div>
	</div>
</div>

<div class="modal" id="grModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
    			<div class="col-8">
    
    						<div class="twelve columns">
    						<h1 class="article-title entry-title">{{get_cms('terms_title')}}</h1>
    					</div><!--end twelve-->
    				
    				
    				<div class="twelve columns">
    					<div class="article-content">
    						<div dir="ltr">
    			            {!! get_cms('terms_description') !!}
    			            </div>
    					</div><!--end article-content-->
    				</div><!--end twelve-->
    			</div>
		    </div>
	    </div>
    </div>
</div>	

<div class="modal" id="desModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content" >
		<div class="modal-body  p-5 position-relative">
		<a type="button" data-dismiss="modal" class="close">Fermer</a>
			<div class="col-8">
						
			<p><strong>{{get_cms('privacy_title')}}</strong></p>

            {!! get_cms('privacy_description') !!}
		</div>
	</div>
	</div>
</div>
</div>

<div class="modal" id="fdrModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body  p-5 position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
		    	@if($error=Session::get('error'))
				<div class="alert bg-red alert-dismissible" role="alert" id="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					{{ $error }}
				</div>

				@endif
				@if($message=Session::get('success'))
				<div class="alert bg-green alert-dismissible" role="alert" id="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					{{ $message }}
				</div>

				@endif<br>
				<div class="col-8">
					<form action="{{route('contact-store')}}" method="post">
						@csrf
						<label>Email</label>
						<input class="form-control mb-3" type="text" name="email"  value="">
						<label>Title</label>
						<input class="form-control mb-3" type="text" name="title"  value="">
						<label>Message</label>
						<textarea class="form-control mb-3 " rows="6" type="message" name="message" value=""></textarea>
						<button type="submit" class="bg-standard-violet text-white px-2 py-2 mt-2 mb-2">Envoyer</button>
					</form>
				</div>	
			</div>
		</div>
	</div>
</div>


<div class="modal" id="ghyModal">
	<div class="modal-dialog modal-xl modal-dialog modal-dialog-top" role="document">
		<div class="modal-content">
			<div class="modal-body position-relative">
			<a type="button" data-dismiss="modal" class="close">Fermer</a>
				<div class="col-12">
					<video width="100%" height="100%" autoplay muted>
					  <source src="https://www.freely-libertinage.com/wp-content/uploads/2022/01/animation-freely-2-1.mp4" type="video/mp4">
					</video>
				</div>	
			</div>
		</div>
	</div>
</div>