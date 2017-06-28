<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<h1>POST</h1>
			<form action="/test" method="post">
				{{ csrf_field() }}
				<input type="text" name="name">
				<button>提交</button>
			</form>
	<h1>PUT</h1>
			<form action="/test" method="post">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<input type="text" name="name">
				<button>提交</button>
			</form>	
	<h1>delete</h1>
			<form action="/test" method="post">
				{{ method_field('delete') }}
				{{ csrf_field() }}
				<input type="text" name="name">
				<button>提交</button>
			</form>		

		<h1>resource</h1>
			<form action="/stu/1" method="post">
				{{ method_field('PUT') }}
				{{ csrf_field() }}
				<input type="text" name="name">
				<button>提交</button>
			</form>	
		<h1>resource</h1>
			<form action="/stu/1" method="post">
				{{ method_field('DELETE') }}
				{{ csrf_field() }}
				<input type="text" name="name">
				<button>提交</button>
			</form>	
				
</body>
</html>