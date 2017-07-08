<!-- 头部开始部分代码 -->
<?php echo $this->fetch('common/header-start.php'); ?>
<!-- Gritter -->
<link href="//static.tudouyu.cn/jsTree/3.3.4/themes/default/style.min.css" rel="stylesheet">
<!-- 头部结束部分代码 -->
<?php echo $this->fetch('common/header-end.php'); ?>
<body>
<div id="wrapper">
    <!-- 主体内容导航栏 -->
    <?php echo $this->fetch('common/main-left-navbar.php'); ?>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!-- 主体顶部导航 -->
        <?php echo $this->fetch('common/main-top-navbar.php'); ?>
        <!-- 主体内容 -->
        <div class="wrapper wrapper-content  animated fadeInRight">
            <div class="row">
                <div class="col-md-4">
                    <div id="nestable-menu">
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline btn-primary btn-sm add"><i class="fa fa-plus"></i>新增</button>
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-outline btn-primary btn-sm edit"><i class="fa fa-pencil"></i>编辑</button>
                        <button type="button" class="btn btn-outline btn-danger btn-sm del"><i class="fa fa-trash-o"></i>删除</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>用户组列表</h5>
                        </div>
                        <div class="ibox-content">
                            <p class="m-b-lg">
                                你可以通过拖拽来调整权限所属层级及顺序。
                            </p>
                            <div id="jstree">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">添加用户组</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="form" action="/Admin/SysAuthRule/save">
                            <input type="hidden" name="ruleId" id="ruleId" value="0">
                            <div class="form-group">
                                <label>权限名称</label>
                                <input type="text" placeholder="输入权限规则" class="form-control" name="ruleName" id="ruleName" required>
                            </div>
                            <div class="form-group">
                                <label>父级权限</label>
                                <select class="form-control m-b __web-inspector-hide-shortcut__" name="parentId">
                                </select>
                            </div>
                            <div class="form-group">
                                <label>权限唯一标识</label>
                                <input type="text" placeholder="例如：/Admin/Index/index" class="form-control" name="url" required>
                            </div>
                            <div class="form-group">
                                <label>权限表达式</label>
                                <input type="text" placeholder="例如：{score}>5  and {score}<100" class="form-control" name="condition">
                                <span class="help-block m-b-none">如定义{score}>5  and {score}<100  表示用户的分数在5-100之间时这条规则才会通过</span>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="javascript:$('#form').submit();">保存</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- 主体页脚 -->
        <?php echo $this->fetch('common/main-footer.php'); ?>
    </div>
    <!-- 聊天窗口 -->
    <?php echo $this->fetch('common/small-chat-box.php'); ?>
    <!-- 右侧边栏 -->
    <?php echo $this->fetch('common/right-sidebar.php'); ?>
</div>
<!-- 文档页脚代码开始 -->
<?php echo $this->fetch('common/footer-start.php'); ?>
<!-- jsTree -->
<script src="//static.tudouyu.cn/jsTree/3.3.4/jstree.min.js"></script>

<script>
    //载入树结构select的option的html
    function loadOption() {
        $.ajax({
            type: "get",
            url: "/Admin/SysAuthRule/getTreeOption",
            data: {
            },
            success: function (data) {
                $("#form select[name='parentId']").html(data);
            }
        });
    }
    $(document).ready(function(){
        //加载树结构
        $('#jstree').jstree({
            'core' : {
                'check_callback' : true,
                "themes" : {
                    "variant" : "large"
                },
                'data' : {
                    'url' : '/Admin/SysAuthRule/getJsTreeData',
                    'data' : function (node) {
                        //return {'id' : node.id};
                    }
                }
            },
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder'
                },
            },
            "checkbox" : {
                "keep_selected_style" : false
            },
            "plugins" : [ 'types', 'dnd', "wholerow"]
        });
        //移动事件
        $('#jstree').on('move_node.jstree', function(e,data){
            console.info(data);
            $.post("/Admin/SysAuthRule/saveSort",
                {
                    id : data.node.id,
                    parent : data.parent,
                    position:data.position
                },
                function(data,status){
                    showToastr(data);
                }, 'json');

        })
        //表单验证
        $("#form").validate({
            rules: {
                groupName:{
                    required: true,
                },
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:'post',
                    dataType:'json',
                    success:function(data) {
                        showToastr(data);
                        if (data.status == 'success'){
                            $('#myModal').modal('hide');
                            //重新加载树结构
                            var tree = $.jstree.reference("#jstree");
                            tree.refresh();
                        }
                    }
                });
            }
        });
        //弹窗
        $(".add").on('click', function () {
            //加载父级菜单选择项
            loadOption();
            $("#form")[0].reset();
            $("#form input[name='ruleId']").val(0);
            $(".modal-title").html('添加权限');
        });
        $(".edit").on('click', function () {
            var ref = $('#jstree').jstree(true),
                sel = ref.get_selected();
            if(!sel.length) {
                toastr.error('请选中您想要编辑的权限', '错误');
                toastr.options = {
                    "positionClass": "toast-top-center",
                };
                return false;
            }
            if (sel.length > 1){
                toastr.error('只能选中一条规则进行编辑', '错误');
                toastr.options = {
                    "positionClass": "toast-top-center",
                };
                return false;
            }

            //加载父级菜单选择项
            loadOption();
            $(".modal-title").html('编辑权限');
            $.ajax({
                type: "get",
                url: "/Admin/SysAuthRule/get",
                data: {
                    'id' : sel[0],
                },
                datatype: "json",
                success: function (data) {
                    if (data.data == null){
                        toastr.error('数据不存在', '错误');
                        toastr.options = {
                            "positionClass": "toast-top-center",
                        };
                        return false;
                    }
                    $("#form input[name='ruleId']").val(data.data.ruleId);
                    $("#form input[name='ruleName']").val(data.data.ruleName);
                    $("#form input[name='url']").val(data.data.url);
                    $("#form input[name='condition']").val(data.data.condition);
                    $("#form select[name='parentId']").val(data.data.parentId);
                }
            });
        });
        $(".del").on('click', function () {
            var ref = $('#jstree').jstree(true),
                sel = ref.get_selected();
            if(!sel.length) {
                toastr.error('请选中您想要删除的权限', '错误');
                return false;
            }
            $.confirm({
                title: '你确定删除么？',
                content: '删除后将无法恢复',
                buttons: {
                    '确定': function () {
                        $.ajax({
                            type: "post",
                            url: "/Admin/SysAuthRule/del",
                            data: {
                                'ids' : sel,
                            },
                            datatype: "json",
                            success: function (data) {
                                showToastr(data);
                                if (data.status == 'success'){
                                    $('#myModal').modal('hide');
                                    //重新加载树结构
                                    var tree = $.jstree.reference("#jstree");
                                    tree.refresh();
                                }
                            }
                        });
                    },
                    '取消': function () {
                    },
                }
            });
        });
    });
</script>
<!-- 文档页脚代码结束 -->
<?php echo $this->fetch('common/footer-end.php'); ?>