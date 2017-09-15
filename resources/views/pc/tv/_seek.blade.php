<style>
    #seek {width:460px;height:160px;padding:20px;display:none;}
    #seek h3 {margin-bottom:5px;}
    #seek p label {cursor: pointer;}
    #seekbtn {width:460px;height:40px;line-height: 40px;display:block;text-align: center;background:#199cfa;cursor:pointer;color:#fff;}
</style>

<div id="seek">
    <h3>影视标题：</h3>
    <p><input type="text" placeholder="例如：战狼2" style="width:100%;height:30px;" id="tv_name" /></p>
    <p style="margin-top:10px;margin-bottom:60px;color:red;">注意：您需要先绑定邮箱，管理员更新资源后，您的邮箱会收到资源更新的提示。</p>
    <div id="seekbtn">确认提交</div>
</div>

<script>
    $(function(){
      $('.tvseek').click(function () {
        layer.open({
          type: 1,
          title: "我要求资源",
          area:['520px', '290px'],
          closeBtn: 0,
          shadeClose: true,
          content: $('#seek')
        });
      })

      $('#seekbtn').click(function () {
        var tv_name = $('#tv_name').val()
        if(tv_name == ''){
          $('#tv_name').focus()
          return false
        }

        $.post('{{ route('pc::tvSeek') }}', {tv_name: tv_name, _token: '{{ csrf_token() }}'}, function (data) {
          layer.msg(data.msg)

          window.setTimeout(function () {
            layer.closeAll()
          }, 2000)
        })
      })
    })
</script>