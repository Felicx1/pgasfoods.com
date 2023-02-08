# Unnited Gallery


To use this follow the steps below:

1. Copy this folder to the public directory of the project
2. Copy the code below to the header of your page
Code:
    @if(request()->is('gallery'))  
        @include('web::pages.gallery.includes.gallery-js-header')
    @endif
The above section points to include folder inside the gallery folder.
It the include file contains the js file paths and css
This has to be at the top of your page in the header section

3. Copy the below code to the footer section of your page
Code:
    @if(request()->is('gallery')) 
        @include('web::pages.gallery.includes.gallery-js-footer')
	@else 
	    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    @endif

        1. The if statement was used to ensure this is only injected when the target page such as gallery or media is called.
        2. if there is any jQuery libraries used put it in the else section of that statement that goes to the footer.
4. Paste the code below to the content of the page where you want it to display.

                <div id="gallery" style="display:none;">
					
					@foreach($groups as $group)

						<img alt="#"
							src="{{ url($group->Image->value) }}"
							data-image="{{ url($group->Image->value) }}"
							data-description="{{ $group->Title->value }}" />

					@endforeach

						<!-- <img alt="Html5 Video"
							src="images/thumbs/html5_video.png"
							data-type="html5video"
							data-image="http://video-js.zencoder.com/oceans-clip.png"
							data-videoogv="http://video-js.zencoder.com/oceans-clip.ogv"
							data-videowebm="http://video-js.zencoder.com/oceans-clip.webm"
							data-videomp4="http://video-js.zencoder.com/oceans-clip.mp4"
							data-description="This is html5 video demo played by mediaelement2 player"> -->
										
				</div>