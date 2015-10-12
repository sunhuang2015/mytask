<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            <button class="btn btn-success">
                <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                <i class="ace-icon fa fa-pencil"></i>
            </button>

            <!-- #section:basics/sidebar.layout.shortcuts -->
            <button class="btn btn-warning">
                <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                <i class="ace-icon fa fa-cogs"></i>
            </button>

            <!-- /section:basics/sidebar.layout.shortcuts -->
        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
        </div>
    </div><!-- /.sidebar-shortcuts -->

    <ul class="nav nav-list">
        <li class="">
            <a href="/">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> 首页 </span>
            </a>

            <b class="arrow"></b>
        </li>

        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-desktop"></i>
                <span class="menu-text"> 项目 </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="open">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-caret-right"></i>
                                报表跟踪

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>
                    <ul class="submenu nav-hide" style="display: none;">
                        <li class="">
                            <a href="/tasks">
                                <i class="menu-icon fa fa-caret-right"></i>
                                任务
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="/employees">
                                <i class="menu-icon fa fa-caret-right"></i>
                                员工
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="/cdmas">
                                <i class="menu-icon fa fa-caret-right"></i>
                                CDMA
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="/upload/employee">
                                <i class="menu-icon fa fa-caret-right"></i>
                                上传部门和人员数据
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="mobilefees">
                                <i class="menu-icon fa fa-caret-right"></i>
                                报销
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>



            </ul>

        </li>
        <li>
            <a href="#" class="dropdown-toggle">
                <i class="menu-icon fa fa-cloud"></i>
                <span class="menu-text"> 设置 </span>

                <b class="arrow fa fa-angle-down"></b>
            </a>

            <b class="arrow"></b>

            <ul class="submenu">
                <li class="open">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-cloud-right"></i>
                        网络管理

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>
                    <ul class="submenu nav-hide" style="display: none;">
                        <li class="">
                            <a href="/devices">
                                <i class="menu-icon fa fa-caret-right"></i>
                                设备配置
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="">
                            <a href="/racks">
                                <i class="menu-icon fa fa-caret-right"></i>
                                机柜设置
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="/networkmodels">
                                <i class="menu-icon fa fa-caret-right"></i>
                                网络设备型号配置
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="/networkdevices">
                                <i class="menu-icon fa fa-caret-right"></i>
                               网络设备
                            </a>

                            <b class="arrow"></b>
                        </li>
                        <li class="">
                            <a href="mobilefees">
                                <i class="menu-icon fa fa-caret-right"></i>
                                报销
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>

                </li>



            </ul>

        </li>
    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
    </script>
</div>