<div class="theme-config">
    <div class="theme-config-box">
        <div class="spin-icon">
            <i class="fa fa-cogs fa-spin"></i>
        </div>
        <div class="skin-settings">
            <div class="title">配置<br/>
                <small style="text-transform: none;font-weight: 400">
                    为演示目的而设计的配置框。通过代码可获得的所有选项。
                </small></div>
            <div class="setings-item">
                    <span>
                        折叠菜单
                    </span>

                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                        <label class="onoffswitch-label" for="collapsemenu">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="setings-item">
                    <span>
                        固定侧边栏
                    </span>

                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="fixedsidebar" class="onoffswitch-checkbox" id="fixedsidebar">
                        <label class="onoffswitch-label" for="fixedsidebar">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="setings-item">
                    <span>
                        顶部导航栏
                    </span>

                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                        <label class="onoffswitch-label" for="fixednavbar">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="setings-item">
                    <span>
                        二级顶部导航栏
                    </span>
                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="fixednavbar2" class="onoffswitch-checkbox" id="fixednavbar2">
                        <label class="onoffswitch-label" for="fixednavbar2">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="setings-item">
                    <span>
                        盒装布局
                    </span>

                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                        <label class="onoffswitch-label" for="boxedlayout">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="setings-item">
                    <span>
                        固定页脚
                    </span>

                <div class="switch">
                    <div class="onoffswitch">
                        <input type="checkbox" name="fixedfooter" class="onoffswitch-checkbox" id="fixedfooter">
                        <label class="onoffswitch-label" for="fixedfooter">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="title">皮肤</div>
            <div class="setings-item default-skin">
                    <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认
                         </a>
                    </span>
            </div>
            <div class="setings-item blue-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝光
                        </a>
                    </span>
            </div>
            <div class="setings-item yellow-skin">
                    <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄紫
                        </a>
                    </span>
            </div>
            <div class="setings-item ultra-skin">
                    <span class="skin-name ">
                        <a href="#" class="md-skin">
                            Inspinia风格
                        </a>
                    </span>
            </div>
        </div>
    </div>
</div>
<script>
    // Config box

    // Enable/disable fixed top navbar
    $('#fixednavbar').click(function (){
        if ($('#fixednavbar').is(':checked')){
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $("body").removeClass('boxed-layout');
            $("body").addClass('fixed-nav');
            $('#boxedlayout').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'on');
            }
        } else{
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav');
            $("body").removeClass('fixed-nav-basic');
            $('#fixednavbar2').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }
        }
    });

    // Enable/disable fixed top navbar
    $('#fixednavbar2').click(function (){
        if ($('#fixednavbar2').is(':checked')){
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $("body").removeClass('boxed-layout');
            $("body").addClass('fixed-nav').addClass('fixed-nav-basic');
            $('#boxedlayout').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'on');
            }
        } else {
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav').removeClass('fixed-nav-basic');
            $('#fixednavbar').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }
            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }
        }
    });

    // Enable/disable fixed sidebar
    $('#fixedsidebar').click(function (){
        if ($('#fixedsidebar').is(':checked')){
            $("body").addClass('fixed-sidebar');
            $('.sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: 0.9
            });

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'on');
            }
        } else{
            $('.sidebar-collapse').slimscroll({destroy: true});
            $('.sidebar-collapse').attr('style', '');
            $("body").removeClass('fixed-sidebar');

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'off');
            }
        }
    });

    // Enable/disable collapse menu
    $('#collapsemenu').click(function (){
        if ($('#collapsemenu').is(':checked')){
            $("body").addClass('mini-navbar');
            SmoothlyMenu();

            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'on');
            }

        } else{
            $("body").removeClass('mini-navbar');
            SmoothlyMenu();

            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'off');
            }
        }
    });

    // Enable/disable boxed layout
    $('#boxedlayout').click(function (){
        if ($('#boxedlayout').is(':checked')){
            $("body").addClass('boxed-layout');
            $('#fixednavbar').prop('checked', false);
            $('#fixednavbar2').prop('checked', false);
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav');
            $("body").removeClass('fixed-nav-basic');
            $(".footer").removeClass('fixed');
            $('#fixedfooter').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'off');
            }


            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'on');
            }
        } else{
            $("body").removeClass('boxed-layout');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }
        }
    });

    // Enable/disable fixed footer
    $('#fixedfooter').click(function (){
        if ($('#fixedfooter').is(':checked')){
            $('#boxedlayout').prop('checked', false);
            $("body").removeClass('boxed-layout');
            $(".footer").addClass('fixed');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'on');
            }
        } else{
            $(".footer").removeClass('fixed');

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'off');
            }
        }
    });

    // SKIN Select
    $('.spin-icon').click(function (){
        $(".theme-config-box").toggleClass("show");
    });

    // Default skin
    $('.s-skin-0').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-2");
        $("body").removeClass("skin-3");
        $("body").removeClass("md-skin");
    });

    // Blue skin
    $('.s-skin-1').click(function (){
        $("body").removeClass("skin-2");
        $("body").removeClass("skin-3");
        $("body").removeClass("md-skin");
        $("body").addClass("skin-1");
    });

    // Yellow skin
    $('.s-skin-3').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-2");
        $("body").removeClass("md-skin");
        $("body").addClass("skin-3");
    });

    // Inspinia ultra skin
    $('.md-skin').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-3");
        $("body").removeClass("skin-2");
        $("body").addClass("md-skin");
    });

    if (localStorageSupport){
        var collapse = localStorage.getItem("collapse_menu");
        var fixedsidebar = localStorage.getItem("fixedsidebar");
        var fixednavbar = localStorage.getItem("fixednavbar");
        var fixednavbar2 = localStorage.getItem("fixednavbar2");
        var boxedlayout = localStorage.getItem("boxedlayout");
        var fixedfooter = localStorage.getItem("fixedfooter");

        if (collapse == 'on'){
            $('#collapsemenu').prop('checked','checked')
        }
        if (fixedsidebar == 'on'){
            $('#fixedsidebar').prop('checked','checked')
        }
        if (fixednavbar == 'on'){
            $('#fixednavbar').prop('checked','checked')
        }
        if (fixednavbar2 == 'on'){
            $('#fixednavbar2').prop('checked','checked')
        }
        if (boxedlayout == 'on'){
            $('#boxedlayout').prop('checked','checked')
        }
        if (fixedfooter == 'on') {
            $('#fixedfooter').prop('checked','checked')
        }
    }
</script>