<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"D:\phpstudy_pro\WWW\member\public/../application/admin\view\orderno\paymentlist.html";i:1596433423;s:71:"D:\phpstudy_pro\WWW\member\public/../application/admin\view\layout.html";i:1596511401;s:76:"D:\phpstudy_pro\WWW\member\public/../application/admin\view\public\head.html";i:1597028307;s:76:"D:\phpstudy_pro\WWW\member\public/../application/admin\view\public\left.html";i:1597028892;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>小码旺铺物业版管理系统后台</title>
    <link rel="stylesheet" href="__STATIC__/css/layui.css">
    <link rel="icon" href="__STATIC__/admin/images/WechatIMG16.png" type="image/x-icon">
    <script src="__STATIC__/jquery-3.2.1.min.js"></script>
    <script src="__STATIC__/layui.js"></script>
    
</head>
<style type="text/css">
    .layui-table img {
        max-width: 150px;
        min-height: 100%;
    }
    .layui-table-cell{
        height: auto!important;
        white-space: normal;
    }
    .layui-body{
        flex: 1;
    }
</style>

<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
    <!--头部布局-->
    <style type="text/css">
    .layui-title-class{
        display: block;
        position:absolute;left:50%;
        top:0;
        height: 100%;
        width: 300px;
        transform: translate(-50%, 0%);
        color: #fff;
        font-weight: bold;
    }
</style>
<div class="layui-header">
    <img src="/WechatIMG.png" style="margin-left:20px; margin-top: 5px;" height="50" width="155">
    <a href="/admin.php/Index/Index" class="layui-title-class"><div class="layui-logo">小码旺铺会员版管理系统后台</div></a>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <!-- <ul class="layui-nav layui-layout-left">
        <li class="layui-nav-item"><a href="">邮件管理</a></li>
        <li class="layui-nav-item"><a href="">消息管理</a></li>
        <li class="layui-nav-item"><a href="">授权管理</a></li>
    </ul> -->
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <!-- <img src="__STATIC__/images/d833c895d143ad4b6eba587980025aafa50f06f6.jpg" class="layui-nav-img"> -->
                欢迎<?php echo \think\Session::get('admin.admin_name'); ?>登录
            </a>
        </li>
        <li class="layui-nav-item"><a href="<?php echo url('Login/logout'); ?>">注销</a></li>
    </ul>
</div>

    <!--左边布局-->
    <style>
    .leftchecked {
        color: #00d6be !important;
        font-weight: bold !important;
    }

    .layui-box1 {
        text-align: center;
        padding: 35px 0;
    }

    .layui-p-b {
        display: flex;
    }

    .layui-nav-itemed>a {
        color: #00d6be !important;
    }
    .layui-aaa img{
        width: 15px;
        height: 15px;
        margin-right:8px;
        vertical-align: middle;
    }

    .tab_icon {}

    .layui-box1 img{
        border-radius: 50%;
    }
    .layui-side-scroll{
      height:90%
    }
</style>


<div class='layui-p-b'>
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree nav-ul" lay-filter="test">
                <?php if(is_array($AllMenu) || $AllMenu instanceof \think\Collection || $AllMenu instanceof \think\Paginator): $k = 0; $__LIST__ = $AllMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;
                $i=0;
                $i++;
                if( strtolower(request()->controller()) == strtolower(ltrim( $v['node_url'] ,'/' )) ){
                    echo '<li class="layui-nav-item layui-nav-itemed">';
                }else{
                    echo '<li class="layui-nav-item ">';
                }
                ?>
                <a class="layui-aaa" href="javascript:;"><span hidden="hidden" class="imgid"><?php echo $k; ?></span><img src="" alt=""><?php echo $v['node_name']; ?></a>
                <dl class="layui-nav-child">
                    <?php
                    if( isset($v['son']) ){ if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;
                        $action = explode( '/' , trim($vv['node_url'] , '/' )  );
                        $action_url = strtolower(array_pop( $action ));
                        if( strtolower(request()->action()) ==  $action_url ){
                            echo '<dd>
                            <a class="leftchecked" href="'.url($vv['node_url']).'">'.$vv['node_name'].'</a></dd>';
                        }else{
                            echo '<dd><a href="'.url($vv['node_url']).'">'.$vv['node_name'].'</a></dd>';
                        }
                    endforeach; endif; else: echo "" ;endif; } ?>
                </dl>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">

        $(function () {

            $('.imgid').each(function(i,elem){
                if($(elem).text().length<2){
                    $(elem).text('0'+$(elem).text());
                }
                $(elem).next().attr('src','__IMG__/tab_'+$(elem).text()+'.png')
            });
            $('.layui-nav-itemed').each(function(i,elem){      //一参:下标
                var len = $(elem).find('img').attr('src').substr(11,2);
                $(elem).find('img').attr('src','__IMG__/tab_'+len+'_active.png');        //参:每个元素
            });
             $(".layui-nav").on("click","li",function () {

                var len = $(this).find('img').attr('src').substr(11,2);
                if($(this).hasClass('layui-nav-itemed')){
                    // $(this).siblings().attr('class','layui-nav-item');
                    $('.nav-ul>li').each(function(i,elem){
                        console.log(111)
                        // console.log($(elem)
                        $(elem).attr('class','layui-nav-item');
                        var n = $(elem).find('img').attr('src').substr(11,2);
                        $(elem).find('img').attr('src','__IMG__/tab_'+n+'.png');

                      });
                    $(this).find('img').attr('src','__IMG__/tab_'+len+'_active.png')
                    $(this).attr('class','layui-nav-item layui-nav-itemed');
                }else{
                    $(this).find('img').attr('src','__IMG__/tab_'+len+'.png')
                }
             })
        });
    </script>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <style type="text/css">
    .marginTs{
        margin-top: 30px;
    }
    .tempsTest{
        margin-top:5px;
    }
    .red{
        color:red;
    }

    .green{
        color:green;
    }
    .black{
        color:black;
    }

    .images{
        margin: 0 auto;
        width: 150px;
        height: 150px;
    }
    .layui-img-div{
        text-align:center;
    }
    .layui-title-div{
        color: #FF5454;
        font-size: 20px;
        margin: 10px 0;
    }
    .layui-title2-div{
        font-size: 20px;
        margin-bottom: 30px;

    }
    .layui-title3-div{
        font-size: 18px;
        font-weight: bold; 
        margin-bottom: 20px;
    }
    .layui-title4-div{
        font-size: 10px;
    }
</style>

<div class="layui-form-item">
    <span class="layui-breadcrumb">
        <a href='#'>缴费管理</a>
        <a><cite> 物业收费</cite></a>
    </span>
</div>


<div class="search-table layui-form">
    <div class="layui-inline tempsTest">
        <select name="district_id"  id="search-district" lay-search="">
            <option value="">请选择小区</option>
            <?php if(is_array($districts) || $districts instanceof \think\Collection || $districts instanceof \think\Paginator): $i = 0; $__LIST__ = $districts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$district): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="layui-inline tempsTest">
        <select name="complex"  id="search-key" >
            <option value="" >请选择区</option>
            <?php if(is_array($area) || $area instanceof \think\Collection || $area instanceof \think\Paginator): $i = 0; $__LIST__ = $area;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $area; ?>"><?php echo $area; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>


    <div class="layui-input-inline tempsTest">
      <input type="text" name="home_code" required  placeholder="请输入楼/单元/户号" autocomplete="off" class="layui-input">
    </div>

    <div class="layui-input-inline tempsTest">
      <input type="text" name="user_name" required  placeholder="请输入业主姓名" autocomplete="off" class="layui-input">
    </div>

    <div class="layui-inline tempsTest">
        <select name="type"  id="type" >
            <option value="" >收费类别</option>
            <option value="2">物业</option>
            <option value="1">供暖</option>
        </select>
    </div>

     <div class="layui-inline tempsTest">
        <select name="pay_status"  id="pay_status" >
            <option value="" >缴费状态</option>
            <option value="1">已缴费</option>
            <option value="2">未缴费</option>
            <option value="3">已退款</option>
        </select>
    </div>


    <div class="layui-inline tempsTest">
        <select name="invoice_status"  id="invoice_status" >
            <option value="" >是否开发票</option>
            <option value="1">未开发票</option>
            <option value="2">手动发票</option>
            <option value="3" disabled="disabled">电子发票</option>
        </select>
    </div>

     <div class="layui-inline tempsTest">
        <select name="pay_type"  id="pay_type" >
            <option value="" >请选择支付方式</option>
            <option value="1">小程序支付</option>
            <option value="2">订单支付</option>
        </select>
    </div>


   <div class="layui-input-inline tempsTest">
        <input type="text" name="title" required  placeholder="请输入收款项目名称" autocomplete="off" class="layui-input">
      </div>
      
      <div class="layui-inline tempsTest">
        <select name="historyOrder"  id="pay_status" >
            <option value="" >是否为历史订单</option>
            <option value="1">否</option>
            <option value="2">是</option>
        </select>
    </div>
      

    <button class="layui-btn tempsTest" lay-submit id='sousuo' lay-filter="*">搜索</button>
</div>


<button class="layui-btn layui-btn-normal marginTs" id='submit' lay-submit lay-filter="*">添加缴费订单</button>

<button type="button" class="layui-btn marginTs" id="myload" style="background-color:#1E9FFF">
  <i class="layui-icon">&#xe67c;</i>导入未缴费订单
</button>


<table class="layui-hide" id="test" lay-filter="test"></table>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-xs" lay-event="pos">订单支付</a>
    <!-- <a class="layui-btn layui-btn-xs" lay-event="money">现金支付</a> -->
    <a class="layui-btn layui-btn-xs" lay-event="detail">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="refund">退款</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="paytoken">打印小票</a>
</script>
<script src="__STATIC__/public.js"></script>
<script>
    layui.use(['table','layer','element','upload','form'], function(){
        var table = layui.table;
        var layer = layui.layer;
        var upload = layui.upload;
        var form = layui.form;
        var tmer;
            var ids = 0;
            
            //自动点击.
            $(document).ready(function(){
                
                $("#sousuo").trigger("click");
                ids = 1;
                if(ids == 1){
                             var page = localStorage.getItem('page');
                            table.reload('test', {
                                page: {
                                    curr: page //重新从第 1 页开始
                                }
                            }); //只重载数据
                            localStorage.clear();
                }
           
            });
            

        // table.render({
        //     elem: '#test'
        //     ,url:'<?php echo url("Orderno/paymentList"); ?>'
        //     ,limit: 10
        //     ,where:{status:1}
        //     ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
        //     ,cols: [[
        //         {field:'id', width:100, title: 'id'}
        //         ,{field:'num', width:100, title: '序号'}
        //         ,{field:'order_no', width:200, title: '订单号'}
        //         ,{field:'user_name',width:100, title: '业主姓名'}
        //         ,{field:'district_name',width:100, title: '小区'}
        //         ,{field:'complex',width:100, title: '区'}
        //         ,{field:'home_code',width:150, title: '楼/单元/户号'}
        //         ,{field:'pay_type',width:200, title: '支付方式'}
        //         ,{field:'invoice_status',width:100, title: '开票状态'}
        //         ,{field:'type',width:100, title: '缴费类别'}
        //         ,{field:'charge',width:300, title: '收费标准'}
        //         ,{field:'pay_status',width:100, title: '缴费状态'}
        //         // ,{field:'pay_status',width:200, title: '缴费状态',templet: function(d){
        //         //     if (d.pay_status == '未支付') {
        //         //         return '<span style="color:#000">'+d.pay_status+'</span>';
        //         //     } else if (d.pay_status == '已缴费') {
        //         //         return '<span style="color:#22DD48">'+d.pay_status+'</span>';
        //         //     } else if (d.pay_status == '已退款') {
        //         //         return '<span style="color:#FF0000">'+d.pay_status+'</span>';
        //         //     }
        //         // }}
        //         ,{field:'finish_at',width:200, title: '缴费时间'}
        //         ,{field:'status',width:100, title: '缴费单状态'}
        //         ,{field:'title',width:200, title: '收款标题'}
        //         ,{field:'area',width:100, title: '房屋面积'}
        //         ,{field:'compensation',width:100, title: '赔偿项'}
        //         ,{field:'pay_money',width:100, title: '应缴费金额'}
        //         ,{field:'pay_fee',width:100, title: '实收金额'}
        //         ,{field:'voucher',width:100, title: '凭证号'}
        //         ,{field:'right', width:400,toolbar: '#barDemo', title:'操作'}
        //     ]],
        //     done: function () {
        //         $("[data-field='id']").css('display','none');
        //     },
        //     page: true
        // });
         $('#submit').click(function(){
            location.href="<?php echo url('Orders/paymentAdd'); ?>";
        })

        // table.reload('test', {
        // page: {
        //     curr: page //重新从第 1 页开始
        // }
        // }); //只重载数据



        //文件上传
        var uploadInst = upload.render({
            elem: '#myload' //绑定元素
            ,url: '<?php echo url("Orderno/historyUpload"); ?>' //上传接口
            ,exts: 'xls|xlsx|xlsm|xlt|xltx|xltm'
            ,done: function(res){
                //上传完毕回调
                //console.log(msg);
                layer.msg(res.font,{icon:res.code});
                if(res.code==1){
                  table.reload('test');
                }
            }
            ,error: function(){
                //请求异常回调
            }
        });




         $('#dexcel').click(function(){
            location.href="<?php echo url('Home/exceAdd'); ?>";
         });

        //删除和修改
        table.on('tool(test)', function(obj){ //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）
            var tr = obj.tr; //获得当前行 tr 的DOM对象

            $('body').on('click','.images',function(){
                $.post(
                        "<?php echo url('Orders/phpqrcode'); ?>",
                        {id:data.id},
                        function (msg) {
                            if (msg.code == 1) {

                                $('.images').attr('src','data:image/png;base64,'+msg.font.img);
                                $('.layui-title-div').text('支付中，请勿关闭窗口！');
                                $('#div-order').text(msg.font.order_no);
                                clearInterval(tmer);
                                setTimeout(function () {
                                    setTimeouts(msg.font.order_no);
                                }, 1000);
                                
                            } else {
                                layer.msg(msg.font,{icon:msg.code});
                            }
                        },
                'json'
                )
            })

            if(layEvent === 'detail'){ //查看
                var pages = $(".layui-laypage-skip").find("input").val() //当前页码值
                location.href="<?php echo url('Orders/paymentUpdateInfo'); ?>?id="+data.id+"&page="+pages;
            } else if(layEvent === 'del'){ //删除
                layer.confirm('真的删除行么', function(index){
                    $.post(
                            '<?php echo url("Orders/paymentDel"); ?>',
                            {id:data.id},
                            function(msg){
                                
                                layer.msg(msg.font,{icon:msg.code});
                                 if(msg.code==1){
                                 table.reload('test');
                                 }
                            
                                
                            },'json'
                    )
                });
            } else if (layEvent == 'refund') {
               layer.confirm('确定退款吗？', function (index) {
                    $.post(
                        "<?php echo url('Orders/orderRefund'); ?>",
                        {id: data.id},
                        function (msg) {
                            if (msg.code == 1) {
                                layer.msg(msg.font,{icon:msg.code});
                                table.reload('test');
                            } else {
                                layer.msg(msg.font,{icon:msg.code});
                            }
                       },
                    'json'
                    )    
                });
            } else if (layEvent == 'pos') {
                /*$.post(
                        "<?php echo url('Orders/phpqrcode'); ?>",
                        {id: data.id},
                        function (msg) {
                            if (msg.code == 1) {
                                layer.tab({
                                  area: ['500px', '500px'],
                                  tab: [{
                                    title: '订单支付', 
                                    content: "<div class='layui-img-div'><img class='images' src='data:image/png;base64,"+msg.font.img+"'  /><div class='layui-title-div'>支付中，请勿关闭窗口！</div><div class='layui-title2-div'>更换交易方式，重新扫描此二维码即可。</div><div class='layui-title3-div'>特殊情况，请按下边提示操作</div><div class='layui-title4-div'>情况1：当已打印交易凭证，系统未更新状态，请联系管理人员</div><div class='layui-title4-div'>情况2：当系统显示收款成功，单未打印凭证，请去对应的订单列表打印凭证</div></div>"
                                  }]
                                });

                                //60秒后停止查询，并进行提示
                                setTimeout(
                                        function()
                                        {
                                            clearInterval(tmer), layer.msg('二维码已过期，请刷新二维码',{icon:1});
                                        },
                                        5000
                                );
                                let tmer = setInterval(function(){
                                    console.log(msg);
                                }, 1000);


                            } else {
                                layer.msg(msg.font,{icon:msg.code});
                            }
                        },
                'json'
                )*/
                // layer.open({
                //   title:'个人信息'
                //   ,area: ['500px', '500px']
                //   ,content: 'test'
                //   ,btn: ['确认','取消']
                //   ,btn1: function(index, layero){
                //     //按钮【按钮二】的回调
                //    alert('按钮1'); 
                //     //return false 开启该代码可禁止点击该按钮关闭
                //   }
                //   ,btn2: function(index, layero){
                //     //按钮【按钮二】的回调
                //    alert('按钮二'); 
                //     //return false 开启该代码可禁止点击该按钮关闭
                //   }
                //   ,btn3: function(index, layero){
                //     //按钮【按钮二】的回调
                //    alert('按钮三'); 
                //     //return false 开启该代码可禁止点击该按钮关闭
                //   }
                // });

                // return false;
                imgpay(data.id);
            } else if (layEvent == 'money') {
                    $.post(
                            "<?php echo url('Orders/paymentUps'); ?>",
                            {id: data.id,status:1},
                            function (msg) {
                                if (msg.code == 3) {
                                     layer.msg(msg.font,{icon:msg.code});
                                     return false;
                                }

                                layer.open({
                                    type: 1
                                    ,title: '现金缴费' //不显示标题栏
                                    ,closeBtn: false
                                    ,area: '600px;'
                                    ,shade: 0.8
                                    ,id: 'modal-insert' //设定一个id，防止重复弹出
                                    ,btn: ['确定', '关闭']
                                    ,btnAlign: 'c'
                                    ,moveType: 1 //拖拽模式，0或者1
                                    ,content: '<form class="layui-form" style="margin-top: 10px" action="">\n' +
                                    '  <div class="layui-form-item">\n' +
                                    '    <label class="layui-form-label">缴费金额</label>\n' +
                                    '    <div class="layui-input-block">\n' +
                                    '      <input id="district-modal-value" type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入缴费金额" class="layui-input">\n' +
                                    '    </div>\n' +
                                    '  </div>'
                                    ,yes: function(){
                                        $.post("<?php echo url('Orders/paymentUps'); ?>",{name:$("#district-modal-value").val(),id: data.id,status:2},function(data){
                                            if (data.code==1)
                                            {
                                                layer.msg(data.font, {
                                                  icon: data.code,
                                                  time: 2000 //2秒关闭（如果不配置，默认是3秒）
                                                }, function(){
                                                    layer.closeAll();
                                                    
                                                    table.reload('test');
                                                });
                                            }
                                            

                                        },'json');
                                    }
                                    ,success: function(layero){

                                    }
                                });


                            },
                    'json'
                    )


                    
            } else if (layEvent == 'paytoken') {
                layer.confirm('确定打印小票吗？', function (index) {
                     $.post(
                         "<?php echo url('Orderno/payToken'); ?>",
                         {id: data.id},
                         function (msg) {
                            layer.msg(msg.font,{icon:msg.code});
                        },
                     'json'
                     )    
                 });
            }
        })


        function selectOrder()
        {
            /*$.post(
                "<?php echo url('Orderno/payToken'); ?>",
                {id: data.id},
                function (msg) {
                   layer.msg(msg.font,{icon:msg.code});
               },
            'json'
            ) */
            return '123';
        }

        form.on('submit(*)', function(data){
          table.render({
              elem: '#test'
              ,url:"<?php echo url('Orders/paymentNewList'); ?>"
              ,where:data.field
              ,limit:10
              ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
              ,cols: [[
              {field:'id', width:100, title: 'id'}
                ,{width:100, title: '序号',type:'numbers'}
                ,{field:'order_no', width:200, title: '订单号'}
                ,{field:'user_name',width:100, title: '业主姓名'}
                ,{field:'district_name',width:100, title: '小区'}
                ,{field:'complex',width:100, title: '区'}
                ,{field:'home_code',width:150, title: '楼/单元/户号'}
                ,{field:'pay_type',width:200, title: '支付方式'}
                ,{field:'invoice_status',width:100, title: '开票状态'}
                ,{field:'type',width:100, title: '缴费类别'}
                ,{field:'charge',width:300, title: '收费标准'}
                ,{field:'pay_status',width:100, title: '缴费状态'}
                // ,{field:'pay_status',width:200, title: '缴费状态',templet: function(d){
                //     if (d.pay_status == '未支付') {
                //         return '<span style="color:#000">'+d.pay_status+'</span>';
                //     } else if (d.pay_status == '已缴费') {
                //         return '<span style="color:#22DD48">'+d.pay_status+'</span>';
                //     } else if (d.pay_status == '已退款') {
                //         return '<span style="color:#FF0000">'+d.pay_status+'</span>';
                //     }
                // }}
                ,{field:'finish_at',width:200, title: '缴费时间'}
                ,{field:'status',width:100, title: '缴费单状态'}
                ,{field:'title',width:200, title: '收款标题'}
                ,{field:'area',width:100, title: '房屋面积'}
                ,{field:'compensation',width:100, title: '赔偿项'}
                ,{field:'pay_money',width:100, title: '应缴费金额'}
                ,{field:'pay_fee',width:100, title: '实收金额'}
                ,{field:'right', width:400,toolbar: '#barDemo', title:'操作'}
            ]],
            done: function () {
                $("[data-field='id']").css('display','none');
                $('.layui-table').on('click','tr',function(){
                    $(this).css('background','#ccc').siblings().css('background','#fff');
                });
            },page: true
          });
        });

        $('.layui-table').on('click','tr',function(){
            $(this).css('background','#ccc').siblings().css('background','#fff');
        });




        function imgpay(id){
            $.post(
                    "<?php echo url('Orders/phpqrcode'); ?>",
                    {id:id},
                    function (msg) {
                        if (msg.code == 1) {
                            layer.tab({
                              area: ['500px', '500px'],
                              tab: [{
                                title: '订单支付', 
                                content: "<div class='layui-img-div'><img class='images' src='data:image/png;base64,"+msg.font.img+"'  /><div class='layui-title-div'>支付中，请勿关闭窗口！</div><div class='layui-title2-div'>更换交易方式，重新扫描此二维码即可。</div><div class='layui-title3-div'>特殊情况，请按下边提示操作</div><div class='layui-title4-div'>情况1：当已打印交易凭证，系统未更新状态，请联系管理人员</div><div class='layui-title4-div'>情况2：当系统显示收款成功，单未打印凭证，请去对应的订单列表打印凭证</div><div hidden='hidden' id='div-order'>"+msg.font.order_no+"</div></div>"
                              }],
                              end:function(){ 
                                clearInterval(tmer);
                                return false;
                              }
                            });

                            
                            setTimeouts(msg.font.order_no);

                        } else {
                            layer.msg(msg.font,{icon:msg.code});
                            return false;
                        }
                    },
            'json'
            )
        }

        function setTimeouts(order_no){
            setTimeout(
                    function()
                    {
                        clearInterval(tmer), layer.msg('二维码已过期，请刷新二维码',{icon:1}),$('.images').attr('src','__IMG__/order.png'),$('.layui-title-div').text('二维码已过期，请刷新二维码！');
                    },
                    120000
            );
            tmer = setInterval(function(){
                $.post(
                    '<?php echo url("Orderno/orderSel"); ?>',
                    {order:order_no},
                    function(msg){
                        if (msg.code == 2) {
                            layer.msg(msg.font,{icon:msg.code});
                             clearInterval(tmer);
                             return false;
                        }
                        if (msg.code == 1) {
                            alert('支付成功！');
                            clearInterval(tmer);
                            layer.closeAll();
                            table.reload('test');
                            // location.href='<?php echo url("Orderno/paymentList"); ?>';
                            
                        }
                    },'json'
                )
            }, 1000);

        }
    });
</script>


        </div>
    </div>

    </div>
    <div class="layui-footer">
        <!-- 底部固定区域 -->
        Copyright©2020北京银河一然商务有限公司.All rights reserved.
      </div>
</div>
<script>
    //JavaScript代码区域
    layui.use('element', function(){
        var element = layui.element;

    });
</script>
</body>
</html>
<script src="__STATIC__/public.js"></script>