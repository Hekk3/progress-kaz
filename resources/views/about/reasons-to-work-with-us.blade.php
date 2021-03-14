@extends('layouts.app')
@section('content')

    <div class="reasons">
        <h1 class="reasons-title-info">{{ $page->getPage()->title }}</h1>
        <div class="reasons-inner">
            @foreach($model as $v)
                @if($loop->first)
                    @php $class = 'reason-left' @endphp
                @elseif($loop->last)
                    @php $class = 'reason-right' @endphp
                @else
                    @php $class = 'reason-medium' @endphp
                @endif
                <div class="reason-item {{ $class }}" style="width:16.6%">
                    <div class="reason-item-bg-container">
                        <div style="background-image: url({{ Voyager::image($v->background) }});" class="reason-item-bg"></div>
                    </div>
                    <div class="reasons-content">
                        <div class="reasons-icon">
                            <img src="{{ Voyager::image($v->image) }}" alt="">
                        </div>
                        <div class="reasons-text">
                            <h1>{{ $v->name }} </h1>
                            {!! $v->full_description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mobile-reasons">
            @foreach($model as $v)
                @if($loop->first)
                    @php $class = 'reason-left' @endphp
                @elseif($loop->last)
                    @php $class = 'reason-right' @endphp
                @else
                    @php $class = 'reason-medium' @endphp
                @endif
                <div class="reason-item {{ $class }}" style="background: url({{ Voyager::image($v->background) }}) center center/cover no-repeat; reason-item {{ $class }} img: height: 100%">
                <div class="bg-mobile"></div>
                    <div class="reasons-content">
                        <div class="reasons-icon">
                            <img src="{{ Voyager::image($v->image) }}" alt="">
                        </div>
                        <div class="reasons-text">
                            <h1>{{ $v->name }} </h1>
                            {!! $v->full_description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

