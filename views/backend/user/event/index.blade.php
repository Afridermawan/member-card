@extends('backend.user.templates.default')

@section('content')

<div class="container">
  <div class="row">
  @foreach($data->data as $datas)
      <div class="card col s6 hoverable">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator" src="{{ $datas->image }}" style="width: 350px;height: 300px">
        </div>
        <div class="card-content" style="max-height: 150px; min-height: 150px;">
          <span class="card-title activator grey-text text-darken-4" >{{ $datas->name }}<i class="material-icons right">more_vert</i></span>
          <p><a class="btn" href="{{ $base_url }}/web/event/{{ $datas->id }}/buy">Daftar</a></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4">{{ $datas->name }}<i class="material-icons right">close</i></span>
          <p>{!! $datas->description !!}</p>
          <p>Biaya pendaftaran : {{ $datas->biaya_pendaftaran }}</p>
          <p>Acara dimulai : {{ $datas->start_date }}</p>
        </div>
      </div>
  @endforeach
  </div>
</div>
  @if (isset($data->meta->pagination))
      <?php
      $page = $data->meta->pagination;
      ?>
      <ul class="pagination center">
          @if (isset($page->links->previous))
          <li><a href="{{$link}}list?page=1">First</a></li>
          <li><a href="{{$link}}list?page={{$page->current_page-1}}"><<</a></li>
          @else
          <li class="disabled"><a class="disabled">First</a></li>
          <li class="disabled"><a class="disabled"><<</a></li>
          @endif

      <?php $x = $page->total_pages+1; ?>

      @for ($i =1; $i<$x; $i++ )
          @if ($page->current_page==$i)
          <li class="active"><a href="">{{$i}}</a></li>
          @else
          <li><a href="{{$link}}list?page={{$i}}">{{$i}}</a></li>
          @endif
      @endfor

          @if (isset($page->links->next))
          <li><a href="{{$link}}list?page={{$page->current_pages+1}}">>></a></li>
          <li><a href="{{$link}}list?page={{$page->total_pages}}">Last</a></li>
          @else
          <li class="disabled"><a>>></a></li>
          <li class="disabled"><a class="disabled">Last</a></li>
          @endif
      </ul>
  @endif
@endsection