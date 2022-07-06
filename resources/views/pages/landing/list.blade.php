
<div class="clear"></div>

<div class="row col-mb-50 mb-0">

    <!-- Classic -->
    @foreach ( $collection as $item)
    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
        <div class="portfolio-item p-2">
            <div class="portfolio-image shadow-lg rounded">
                <a href="#">
                    <img src="{{ asset('storage/'.$item->image) }}" alt="Project">
                </a>
            </div>
            <div class="portfolio-desc center pt-4 pb-0">
                <h3><a href="#">{{ $item->nama_project }}</a></h3>
            </div>
        </div>
    </div>
    @endforeach
</div>

