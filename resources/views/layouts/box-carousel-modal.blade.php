

<div id="{{'carousel-modal'.$id}}" class="carousel slide carousel-box"  data-ride="carousel">

        <div id="carousel_id" class="carousel-inner">
            @php
                $count= 0;
            @endphp
                @foreach ($imagenes as $img)
                    @if ($count ==0)
                        <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ $img->path_img }}">
                        </div>
                        @php
                            $count++;
                        @endphp
                    @else
                        <div class="carousel-item">
                                <img class="d-block w-100" src="{{ $img->path_img }}">
                        </div>
                    @endif
                @endforeach
        </div>
        <a class="carousel-control-prev" href="#{{'carousel-modal'.$id}}" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#{{'carousel-modal'.$id}}" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
</div>

