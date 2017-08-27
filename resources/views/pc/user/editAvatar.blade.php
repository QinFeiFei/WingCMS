@extends('pc.layouts.user')
@section('title', '基本资料')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('/pc/user') }}/useraccount.css">
    <script src="https://cdn.bootcss.com/jquery-jcrop/0.9.12/js/jquery.Jcrop.min.js"></script>
    <link href="https://cdn.bootcss.com/jquery-jcrop/0.9.12/css/jquery.Jcrop.css" rel="stylesheet">
    <script src="{{ asset('/js/jquery.ajaxfileupload.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/pc/user/avatarCutter.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    @include('pc.user._nav', ['navpos'=>'two'])
    <div class="main main_position clearfix">
        @include('pc.user._leftBar')
        <div class="account_right">
            <h2 class="pf">头像上传</h2>

            @if($user->avatar)<img style="width:100px;height:100px;" src="{{ asset('/storage/'.$user->avatar)  }}">@endif
            
            <p style="border-bottom:1px solid #999;margin-bottom:20px;padding-bottom:10px;padding-top:15px;">
                <input type="file" id="file1" name="file1" />
                <input type="button" value="上传" id="btnUpload" style="padding:3px 5px;cursor:pointer;"/>
            </p>

            <div style="display:none;overflow:hidden" id="div_avatar">
                <div style="width:500px;height:500px;overflow:hidden;float:left;" id="picture_original"><img alt="" src="" /></div>
                <div id="picture_200_1" style="float:left;margin-left:20px"></div>
                <div id="picture_200_2" style="float:left;margin-left:20px;margin-top:20px;border-radius: 200px;"></div>
                <input type="hidden" id="x1" name="x1" value="0" />
                <input type="hidden" id="y1" name="y1" value="0" />
                <input type="hidden" id="cw" name="cw" value="0" />
                <input type="hidden" id="ch" name="ch" value="0" />
                <input type="hidden" id="imgsrc" name="imgsrc" />
                <div style="clear:both;"></div>
                <input type="button" id="btnCrop" class="btn-blueA" value="裁剪上传" style="border:0px;cursor:pointer;margin-top:20px;">
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script type="text/javascript">
    $(function () {
        function getFileSize(fileName) {
            var byteSize = 0;
            //console.log($("#" + fileName).val());
            if($("#" + fileName)[0].files) {
                var byteSize  = $("#" + fileName)[0].files[0].size;
            }else {
                //var file = document.getElementById(fileName);
                //var img = new Image();
                //file.select();
                //alert(document.selection.createRange().text);
                //img.src = file.value;
                //img.style.display="none";

                //alert(img.readyState);return 0;
                //if(img.readyState=="complete"){//已经load完毕，直接打印文件大小
                //	alert(img.fileSize);//ie获取文件大小
                //}else {
                //	img.onreadystatechange=function(){
                //		if(img.readyState=='complete')//当图片load完毕
                //			alert(img.fileSize);//ie获取文件大小
                //	}
                //}
                //byteSize = img.fileSize;
                //byteSize = img.fileSize;
            }
            //alert(byteSize);
            byteSize = Math.ceil(byteSize / 1024) //KB
            return byteSize;//KB
        }
        $("#btnUpload").click(function () {
            var allowImgageType = ['jpg', 'jpeg', 'png', 'gif'];
            var file = $("#file1").val();
            //获取大小
            var byteSize = getFileSize('file1');
            //获取后缀
            if (file.length > 0) {
                if(byteSize > 2048) {
                    alert("上传的附件文件不能超过2M");
                    return;
                }
                var pos = file.lastIndexOf(".");
                //截取点之后的字符串
                var ext = file.substring(pos + 1).toLowerCase();
                //console.log(ext);
                if($.inArray(ext, allowImgageType) != -1) {
                    ajaxFileUpload();
                }else {
                    alert("请选择jpg,jpeg,png,gif类型的图片");
                }
            }
            else {
                alert("请选择jpg,jpeg,png,gif类型的图片");
            }
        });
        function ajaxFileUpload() {
            $.ajaxFileUpload({
                url: '{{ route('pc::uploadAvatar') }}', // 用于文件上传的服务器端请求地址
                secureuri: false, // 一般设置为false
                fileElementId: 'file1', // 文件上传空间的id属性  <input type="file" id="file" name="file" />
                dataType: 'json', // 返回值类型 一般设置为json
                success: function (data, status)  // 服务器成功响应处理函数
                {
                    // var json = eval('(' + data + ')');
                    $("#picture_original>img").attr({src: data.src, width: data.width, height: data.height});
                    $('#imgsrc').val(data.path);
                    //alert(data.msg);

                    //同时启动裁剪操作，触发裁剪框显示，让用户选择图片区域
                    var cutter = new jQuery.UtrialAvatarCutter({
                        //主图片所在容器ID
                        content : "picture_original",
                        //缩略图配置,ID:所在容器ID;width,height:缩略图大小
                        purviews : [{id:"picture_200_1",width:200,height:200},{id:"picture_200_2",width:200,height:200}],
                        //选择器默认大小
                        selector : {width:200,height:200},
                        showCoords : function(c) { //当裁剪框变动时，将左上角相对图片的X坐标与Y坐标 宽度以及高度
                            $("#x1").val(c.x);
                            $("#y1").val(c.y);
                            $("#cw").val(c.w);
                            $("#ch").val(c.h);
                        },
                        cropattrs : {boxWidth: 500, boxHeight: 500}
                    });
                    cutter.reload(data.src);
                    //var purviews = [{id:"picture_200",width:200,height:200},{id:"picture_50",width:50,height:50},{id:"picture_30",width:30,height:30}];
                    //$("#img1").Jcrop({
                    //    bgColor: 'black',
                    //    bgOpacity: .4,
                    //    setSelect: [100, 100, 150,150],  //设定4个角的初始位置
                    //    aspectRatio: 1 / 1,
                    //   onChange: showCoords,   //当裁剪框变动时执行的函数
                    //   onSelect: showCoords,   //当选择完成时执行的函数
                    //	boxWidth: 500,
                    //	boxHeight: 500
                    //});
                    $('#div_avatar').show();
                },
                error: function (data, status, e)//服务器响应失败处理函数
                {
                    alert(e);
                }
            })
            return false;
        }

        $('#btnCrop').click(function() {
            $.getJSON('{{ route('pc::saveAvatar') }}', {x: $('#x1').val(), y: $('#y1').val(), w: $('#cw').val(), h: $('#ch').val(), src: $('#imgsrc').val()}, function(data) {
                if(data.result == false){
                    alert(data.msg)
                }else{
                    window.location.reload()
                }
            });
            return false;
        });
    });

</script>
@endsection