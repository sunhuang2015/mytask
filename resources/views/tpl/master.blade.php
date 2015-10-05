<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>{!! \Config::get('site.site_name') !!}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="/assets/css/font-awesome.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="/assets/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/assets/css/ace-part2.css" class="ace-main-stylesheet" />
    <![endif]-->

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/assets/css/ace-ie.css" />
    <![endif]-->

    <link rel="stylesheet" href="/assets/datatable/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/datatable/css/jquery.dataTables.min.css"/>
    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/assets/js/ace-extra.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
    @include('tpl.navbar')
<!-- /section:basics/navbar.layout -->

<div class="main-container" id="main-container">
    <!-- #section:basics/sidebar -->
    @include('tpl.sidebar')

    <!-- /section:basics/sidebar -->
    <div class="main-content">

            <!-- breadcrumbs goes here -->
            @include('tpl.breadcrunmbs')
        <div class="page-content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                        @include('tpl.content')
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
    @include('tpl.footer')
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/assets/js/jquery.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>
<script src="/assets/js/bootstrap.js"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="/assets/js/ace/elements.scroller.js"></script>
<script src="/assets/js/ace/elements.colorpicker.js"></script>
<script src="/assets/js/ace/elements.fileinput.js"></script>
<script src="/assets/js/ace/elements.typeahead.js"></script>
<script src="/assets/js/ace/elements.wysiwyg.js"></script>
<script src="/assets/js/ace/elements.spinner.js"></script>
<script src="/assets/js/ace/elements.treeview.js"></script>
<script src="/assets/js/ace/elements.wizard.js"></script>
<script src="/assets/js/ace/elements.aside.js"></script>
<script src="/assets/js/ace/ace.js"></script>
<script src="/assets/js/ace/ace.ajax-content.js"></script>
<script src="/assets/js/ace/ace.touch-drag.js"></script>
<script src="/assets/js/ace/ace.sidebar.js"></script>
<script src="/assets/js/ace/ace.sidebar-scroll-1.js"></script>
<script src="/assets/js/ace/ace.submenu-hover.js"></script>
<script src="/assets/js/ace/ace.widget-box.js"></script>
<script src="/assets/js/ace/ace.settings.js"></script>
<script src="/assets/js/ace/ace.settings-rtl.js"></script>
<script src="/assets/js/ace/ace.settings-skin.js"></script>
<script src="/assets/js/ace/ace.widget-on-reload.js"></script>
<script src="/assets/js/ace/ace.searchbox-autocomplete.js"></script>

<!-- inline scripts related to this page -->

@yield('javascript')
</body>
</html>
