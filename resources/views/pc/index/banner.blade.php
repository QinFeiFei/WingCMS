<link rel="stylesheet" href="{{ asset('/pc/banner') }}/shutter.css">
@if($banner->count() > 0)
<div class="shutter">
    <div class="shutter-img">
        @foreach($banner as $item)
        <a target="_blank" href="{{ $item->banner_url }}" data-shutter-title="{{ $item->banner_title }}"><img src="{{ $item->banner_src }}" alt="{{ $item->banner_title }}"></a>
        @endforeach
    </div>
    <ul class="shutter-btn">
        <li class="prev"></li>
        <li class="next"></li>
    </ul>
    <div class="shutter-desc"><p></p></div>
</div>

<script src="{{ asset('/pc/banner') }}/velocity.js"></script>
<script src="{{ asset('/pc/banner') }}/shutter.js"></script>
<script>
  $(function () {
    $('.shutter').shutter({
      shutterW: 1180, // 容器宽度
      shutterH: 358, // 容器高度
      isAutoPlay: true, // 是否自动播放
      playInterval: 6500, // 自动播放时间
      curDisplay: 3, // 当前显示页
      fullPage: false // 是否全屏展示
    });
  });
</script>
@endif