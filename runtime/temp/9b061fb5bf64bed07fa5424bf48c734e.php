<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:98:"E:\PHPserver\wwwroot\default\aliyun_1805\public/../application/admin\view\deposit\depositlist.html";i:1593413227;s:85:"E:\PHPserver\wwwroot\default\aliyun_1805\public/../application/admin\view\layout.html";i:1592206685;s:90:"E:\PHPserver\wwwroot\default\aliyun_1805\public/../application/admin\view\public\head.html";i:1593321400;s:90:"E:\PHPserver\wwwroot\default\aliyun_1805\public/../application/admin\view\public\left.html";i:1593414879;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>【小码旺铺】 -- 物业后台</title>
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
    <a href="/admin.php/Index/Index" class="layui-title-class"><div class="layui-logo">小码旺铺物业版管理系统后台</div></a>
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
</style>


<div class='layui-p-b'>

    <div class="layui-side layui-bg-black">
        <div class="layui-box1">
            <a href="/admin.php/Index/Index">
                <img src="/WechatIMG16.png" height="80" width="80">
            </a>
        </div>
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">

                <!--<li class="layui-nav-item layui-nav-itemed">-->
                <!--<a class="" href="javascript:;">权限节点管理</a>-->
                <!--<dl class="layui-nav-child">-->
                <!--<dd><a href="<?php echo url('Power/poweradd'); ?>">节点添加</a></dd>-->
                <!--<dd><a href="<?php echo url('Power/powerList'); ?>">节点列表展示</a></dd>-->
                <!--</dl>-->
                <!--</li>-->

                <?php if(is_array($AllMenu) || $AllMenu instanceof \think\Collection || $AllMenu instanceof \think\Paginator): $k = 0; $__LIST__ = $AllMenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;
                $i=0;
                $i++;
                if( strtolower(request()->controller()) == strtolower(ltrim( $v['node_url'] ,'/' )) ){
                    echo '<li class="layui-nav-item layui-nav-itemed">';
                }else{
                    echo '<li class="layui-nav-item">';
                }
                ?>

                <a class="layui-aaa" href="javascript:;"><img src="__IMG__/tab_<?php echo $k; ?>.png"
                        alt=""><?php echo $v['node_name']; ?></a>
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

            // $('.layui-aaa').click(function (e) {
            //     console.log($(this).parent().hasClass('layui-nav-itemed'))

            //     if ($(this).parent().hasClass('layui-nav-itemed')) {
            //         // console.log(true)
            //         $(this).css('color', 'rgba(255,255,255,.7)')
            //         $(this).parent().removeClass('layui-nav-itemed')
            //     }
            //     else {
            //         // console.log(false)
            //         $('.layui-nav-item').removeClass('layui-nav-itemed')
            //         $(this).parent().addClass('layui-nav-itemed')
            //         console.log($(this).parent().hasClass('layui-nav-itemed'))
            //         $(this).css('color', '#00d6be')
            //     }
            // })
            // 
            $('.layui-nav-itemed').each(function(i,elem){      //一参:下标
                var len = $(elem).find('img').attr('src').substr(11,1);
                $(elem).find('img').attr('src','/image/tab_'+len+'_active.png');        //参:每个元素
            });
             $(".layui-nav").on("click","li",function () {
                var len = $(this).find('img').attr('src').substr(11,1);
                if($(this).hasClass('layui-nav-itemed')){
                    console.log(true);
                    $(this).find('img').attr('src','/image/tab_'+len+'_active.png')
                }else{
                    $(this).find('img').attr('src','/image/tab_'+len+'.png')
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
</style>
<div class="layui-form-item">
    <span class="layui-breadcrumb">
        <a href='#'>押金管理</a>
        <a><cite> 押金列表</cite></a>
    </span>
</div>


<div class="search-table layui-form">
    <div class="layui-inline">
        <select name="district_id"  id="search-district" lay-search="">
            <option value="">请选择小区</option>
            <?php if(is_array($districts) || $districts instanceof \think\Collection || $districts instanceof \think\Paginator): $i = 0; $__LIST__ = $districts;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$district): $mod = ($i % 2 );++$i;?>
            <option value="<?php echo $district['id']; ?>"><?php echo $district['name']; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <div class="layui-inline">
        <select name="complex"  id="search-key" >
            <option value="" >请选择区</option>
            <option value="甲">甲</option>
            <option value="乙">乙</option>
            <option value="丙">丙</option>
            <option value="丁">丁</option>
        </select>
    </div>
   <div class="layui-input-inline">
        <input type="text" name="home_code" required  placeholder="请输入楼/单元/户号" autocomplete="off" class="layui-input">
      </div>
      <div class="layui-input-inline">
        <input type="text" name="user_name" required  placeholder="请输入业主" autocomplete="off" class="layui-input">
      </div>

    <button class="layui-btn" lay-submit lay-filter="*">搜索</button>
</div>


<button class="layui-btn layui-btn-normal marginTs" id='submit' lay-submit lay-filter="*">立即添加</button>
<!-- <button id='send' class="layui-btn layui-btn-normal" lay-submit lay-filter="*">到期提醒</button> -->
<table class="layui-hide" id="test" lay-filter="testdd"></table>
<script type="text/html" id="barDemo">
	<a class="layui-btn layui-btn-xs" lay-event="pos">订单支付</a>
      <!-- <a class="layui-btn layui-btn-xs" lay-event="money">现金支付</a> -->
    <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="refund">退款</a>
</script>
<script>
    layui.use(['table','layer'], function(){
        var table = layui.table;
        var layer = layui.layer;
        var form = layui.form;
        table.render({
            elem: '#test'
            ,url:"<?php echo url('Deposit/depositInfo'); ?>"
            ,limit:10
            ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
            ,cols: [[
                {field:'id', width:100, title: '押金ID', sort: true}
                ,{width:100, title: '序号',type:'numbers'}
                ,{field:'order_no', width:100, title: '订单号'}
                ,{field:'user_name', width:100, title: '业主名'}
                ,{field:'home_name', width:300, title: '房屋信息'}
                ,{field:'msg', width:400, title: '订单标题'}
                ,{field:'cost_info', width:400, title: '费用明细'}
                ,{field:'pay_status', width:100, title: '押金状态'}
                ,{field:'fee', width:100, title: '押金金额'}
                ,{field:'refund_money', width:100, title: '退款金额'}
                ,{field:'pay_type', width:100, title: '缴费渠道'}
                ,{field:'title', width:400, title: '押金备注'}
                ,{field:'ctime', width:200, title: '创建时间'}
                ,{field:'right', width:400,toolbar: '#barDemo', title: '操作'}
            ]],
            done: function () {
                $("[data-field='id']").css('display','none');
            }
            ,page: true
        });
        $('#send').click(function(){
        	 layer.msg('发送成功',{icon:1});
        });
         $('#submit').click(function(){
            location.href="<?php echo url('Deposit/depositAdd'); ?>";
        })
        table.on('tool(testdd)', function(obj) { //注：tool是工具条事件名，test是table原始容器的属性 lay-filter="对应的值"
            var data = obj.data; //获得当前行数据
            var layEvent = obj.event; //获得 lay-event 对应的值（也可以是表头的 event 参数对应的值）

            if (layEvent === 'edit') { //查看
                location.href="<?php echo url('Deposit/depositUpdateInfo'); ?>?id="+data.id;
            } else if (layEvent === 'del') { //删除
                layer.confirm('真的删除行么', function (index) {
                    $.post(
                            "<?php echo url('Deposit/depositDel'); ?>",
                            {deposit_id: data.id},
                            function (msg) {
                                layer.msg(msg.font,{icon:msg.code});
                                if(msg.code==1){
                                    table.reload('test');
                                }
                            },
                    'json'
                    )
                });
            } else if (layEvent === 'pos') {
            	$.post(
            	        "<?php echo url('Deposit/phpqrcode'); ?>",
            	        {id: data.id},
            	        function (msg) {
            	        	if (msg.code == 1) {
            	        		layer.tab({
            	        		  area: ['200px', '200px'],
            	        		  tab: [{
            	        		    title: 'pos支付', 
            	        		    content: "<img src='data:image/png;base64,"+msg.font.img+"'  />"
            	        		  }]
            	        		});  
            	        	} else {
            	        		layer.msg(msg.font,{icon:msg.code});
            	        	}
            	        },
            	'json'
            	)
            } else if (layEvent === 'refund') {
                layer.confirm('确定退款吗？', function (index) {
                    $.post(
                        "<?php echo url('Deposit/depositRefund'); ?>",
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
            	
            } else if (layEvent == 'money') {
                    $.post(
                            "<?php echo url('Deposit/depositUps'); ?>",
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
                                        $.post("<?php echo url('Deposit/depositUps'); ?>",{name:$("#district-modal-value").val(),id: data.id,status:2},function(data){
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


                    
            }
        })


        form.on('submit(*)', function(data){
          table.render({
              elem: '#test'
              ,url:"<?php echo url('Deposit/depositNewList'); ?>"
              ,where:data.field
              ,limit:10
              ,cellMinWidth: 80 //全局定义常规单元格的最小宽度，layui 2.2.1 新增
              ,cols: [[
             {field:'id', width:100, title: '押金ID', sort: true}
                ,{width:100, title: '序号',type:'numbers'}
                ,{field:'order_no', width:100, title: '订单号'}
                ,{field:'user_name', width:100, title: '用户名'}
                ,{field:'home_id', width:100, title: '房ID'}
                ,{field:'home_name', width:300, title: '房屋名称'}
                ,{field:'msg', width:400, title: '订单标题'}
                ,{field:'title', width:400, title: '押金描述'}
                ,{field:'cost_info', width:400, title: '费用明细'}
                ,{field:'pay_status', width:100, title: '押金状态'}
                ,{field:'fee', width:100, title: '押金金额'}
                ,{field:'refund_money', width:100, title: '退款金额'}
                ,{field:'pay_type', width:100, title: '缴费渠道'}
                ,{field:'ctime', width:200, title: '创建时间'}
                ,{field:'right', width:400,toolbar: '#barDemo', title: '操作'}
            ]],
            done: function () {
                $("[data-field='id']").css('display','none');
            }
            ,page: true
          });
        });


    })
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