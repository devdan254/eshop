@php
$banner = App\Models\Banner::orderBy('banner_title','ASC')->limit(3)->get();
@endphp


<section class="banners mb-25">
    <div class="container">
        <div class="row">

            @foreach($banner as $item)
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <img src="{{ asset( $item->banner_image ) }}" alt="" />
                    <div class="banner-text">
                        @php
    // Get the banner title
    $bannerTitle = $item->banner_title;

    // Convert the title to an array of words
    $words = explode(' ', $bannerTitle);

    // Determine how many words should be on the first line
    $wordsOnFirstLine = 3;

    // Split the words into two parts
    $firstLine = implode(' ', array_slice($words, 0, $wordsOnFirstLine));
    $secondLine = implode(' ', array_slice($words, $wordsOnFirstLine));

    // Combine the lines with <br>
    $formattedTitle = $firstLine . '<br>' . $secondLine;
@endphp
                        <h4>
                            {!! $formattedTitle !!}
                        </h4>
                        <a href="{{ $item->banner_url }}" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>
    </div>
</section>