<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\www\twothink\public/../application/home/view/default/article\lists.html";i:1542250289;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .main{margin-bottom: 60px;}
        .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
    </style>
</head>
<body>
<div class="main">
    <!--导航部分-->
    <nav class="navbar navbar-default navbar-fixed-bottom">
        <div class="container-fluid text-center">
            <div class="col-xs-3">
                <p class="navbar-text"><a href="/" class="navbar-link">首页</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
            </div>
            <div class="col-xs-3">
                <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
            </div>
        </div>
    </nav>
    <!--导航结束-->

    <div class="container-fluid">
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList">
            <a href="notice-detail.html">
                <a href="<?php echo url('Article/detail?id='.$data['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="__ROOT__<?php echo get_cover_path($data['cover_id']); ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $data['title']; ?></p>
                    <p class="intro"><?php echo $data['description']; ?></p>
                    <p class="info">浏览:<?php echo $data['view']; ?> <span class="pull-right"><?php echo $data['create_time']; ?></span> </p>
                </div>
                </a>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <button class="btn btn-default btn-block get_more" onclick="getLists()">获取更多。。。</button>
        <p class="text-center">没有更多了。。。 </p>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/static/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "/static", //项目公共目录地址
            "DEEP"   : "", //PATHINFO分割符
            "MODEL"  : ["", "", "html"],
            "VAR"    : ["", "", ""]
        }
    })();
</script>

<script>
    var page = 1;
    $(document).ready(function(){
        getLists();
    });
    var getLists = function () {
        $(".get_more").remove();
        $.get("/home/article/ajaxlists.html?category=43&page="+page,function(data){
            $("#article_list").append(data);
        });
        page++;
    }
</script>
<!-- 用于加载js代码 -->
<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->

</div>
</body>
</html>