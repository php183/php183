<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form</title>
</head>
<body>
	
	{{session('status')}}
	<form action="/request/insert?a=1&b=2" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
		<input type="text" name="name" value="{{old('name')}}"><br> 
		<input type="text" name="sex" value="{{old('sex')}}"><br>
		<input type="text" name="age" value="{{old('age')}}"><br>
		<input type="text" name="height" value="{{old('height')}}"><br>
		<input type="file" name='img'>
		<button>提交</button>
	</form>
<form action="/login" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
		<input type="text" name="age" value="{{old('age')}}"><br>
		<button>提交</button>
	</form>
</body>
</html>

