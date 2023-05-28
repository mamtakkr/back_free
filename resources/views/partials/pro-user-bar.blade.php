<div class="btun">   
    	        <a type="button" href="{{ route('secret-add',$member_details->user_id) }}" class="bg-standard-{{ (request()->segment(1) == 'secret-add') ? 'violet text-white' : 'white text-dark' }} base-radius px-3 py-2 mr-1">
    	            {{__('public.Secret_Book')}} 
    	        </a>
    	    </div>
    	    <div class="btun3">
    	        @if(!empty($block_exists))
                <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1">{{__('public.Blacklisted')}}</a>
				@else
    	        <a href="javascript:void(0)" type="button" class="bg-standard-white text-dark base-radius px-3 py-2 mr-1" onclick="addBlacklist({{$member_details->user_id}})" 
    	        id="blacklist_btn{{$member_details->user_id}}">{{__('public.Blacklist')}}</a>
    	        @endif
    	        
                
            </div>