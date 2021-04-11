<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<p id="message"></p>

<div class="block">
	<table id="users"></table>
	<input type="text" id="text">
	<div>
		<div class="dropdown">
			<button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Настройки </button>
			<ul class="dropdown-menu">
				<li><a href="#"><button>Удалить</button></a></li>
				<li><a href="#"><button>Редактировать</button></a></li>
				<li><a href="#"><button>Деактивировать</button></a></li>
			</ul>
		</div>
	</div>
</div>





<script>

	$.getJSON('data.json')
.then(function(result){
		
		console.log("res", result);
		$("#users").prepend(`<thead><tr><td>ID</td><td>NAME</td><td>ROLE</td><td>ACTIVE</td></tr></thead>`);
		result.forEach(e => {
			
			$("#users").prepend(`<tr><td>${e.ID}</td><td>${e.NAME}</td><td>${e.ROLE}</td><td>${e.ACTIVE}</td></tr>`);
			
		});
		

	})
	.catch(e => {
		alert("Извините, но мы не смогли справиться с задачей!")
	})

	document.querySelector('#text').oninput = function () {
    let val = this.value.trim();
    let elasticItems = document.querySelectorAll('.block td');
    if (val != '') {
        elasticItems.forEach(function (elem) {
            if (elem.innerText.search(val) == -1) {
                elem.innerHTML = elem.innerText;
            }
            else {
                let str = elem.innerText;
                elem.innerHTML = insertMark(str, elem.innerText.search(val), val.length);
            }
        });
    }
    else {
        elasticItems.forEach(function (elem) {
            elem.innerHTML = elem.innerText;
        });
    }
}
function insertMark(string, pos, len) {
    return string.slice(0, pos) + '<mark>' + string.slice(pos, pos + len) + '</mark>' + string.slice(pos + len);
}

</script>	
</body>
</html>