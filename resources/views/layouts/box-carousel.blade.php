{{-- <div class="box">

    <img src="{{ asset(''.$path.'') }}" alt="" />
    <div class="info-box">
        <span>{{$title}}</span>
    <span><a style="color: #fff;" href="{{$link}}" >{{$content}}</a></span>
    </div>
</div> --}}

<div class="box">
<div id="{{'carousel'.$id}}" class="carousel slide carousel-box"  data-ride="carousel">

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
        </div>
        <div class="info-box">
            <span>{{$title}}</span>
        <span><a style="color: #fff; cursor: pointer;" data-toggle="modal" data-target="#exampleModalCenter{{$id}}">{{$content}}</a></span>
        </div>
</div>
