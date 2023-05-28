
  <script src="{{URL::to('/')}}/public/assets/js/sweetalert.min.js"></script>    
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
	<script src="{{URL::to('/')}}/public/frontend/costum.js"></script>
    <script>
    $(document).ready(function(){
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
    })
    });
    </script>
 
<script>
$(function() {
        $("#add_post_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_post_btn").text("{{ __('public.Adding') }}");
        $.ajax({
          url: '{{ route('post-store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              fetchAllPosts();
                $("#add_post_btn").text("{{ __('public.Published') }}");
                $("#add_post_form")[0].reset();
                location.reload();
            }
            if (response.status == 401) {
                $("#des_errors").text(response.errors.description);
                $("#img_errors").text(response.errors.image_url);
                $("#add_post_btn").text("{{ __('public.Not_Published') }}");
                $("#add_post_form")[0].reset(); 
            }
          },
		  error: function(err)
		  {
		  alert(JSON.stringify(err));
		  }
        });
        
      });
      
     // fetch all posts ajax request
      fetchAllPosts();

      function fetchAllPosts() {
        $.ajax({
          url: '{{ route('fetchAllPosts') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_posts").html(JSON.parse(response));
          },
		  error: function(err)
		  {
		  alert(JSON.stringify(err));
		  }
        });
      }
      
});

</script>
</body>


</html>