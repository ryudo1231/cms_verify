@extends('layouts.app')

@section('content')
@include('vendor.ueditor.assets')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">发布文章</div>

                <div class="panel-body">
                    <form action="/articles" method="post">
                        {!!csrf_field()!!}
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" name="title" class="form-control" placeholder="标题" id="title">
                        </div>
                        <script id="container" name="body" type="text/plain"></script>

                        <button class="btn btn-success pull-right" type="submit">发布文章</button>
                    </form>
                    <!-- 编辑器容器 -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container',{
    toolbars: [
            ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'insertimage', 'fullscreen']
        ],
            elementPathEnabled: false,
            enableContextMenu: false,
            autoClearEmptyNode:true,
            wordCount:false,
            imagePopup:false,
            autotypeset:{ indent: true,imageBlockLine: 'center' }
    });
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', Laravel.csrfToken); // 设置 CSRF token.
    });
</script>
@endsection
