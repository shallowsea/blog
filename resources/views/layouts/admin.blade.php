@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{ asset('resources/views/admin/style/css/ch-ui.admin.css') }}">
	<link rel="stylesheet" href="{{ asset('resources/views/admin/style/font/css/font-awesome.min.css') }}">
	<script type="text/javascript" src="{{ asset('resources/views/admin/style/js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/views/admin/style/js/ch-ui.admin.js') }}"></script>
	<script type="text/javascript" src="{{ asset('resources/org/layer/layer.js') }}"></script>
</head>
@show
<body>
	@yield('content')
	<!--主体部分 结束-->

	<!--底部 开始-->
	@section('footer')
	<div class="bottom_box">
		CopyRight © 2016. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
	<!--底部 结束-->
</body>
</html>
@show