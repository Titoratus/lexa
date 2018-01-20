$(document).on('submit', '#loginForm', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "function.php",
	       success: function(data) {
	       		//trim удаляет лишние пробелы, которые есть в response
	       		if($.trim(data) === "error") {  $(".login__error").show(); $(".login__error").html("Неверный логин или пароль"); }
	       		else { window.location.href = 'index.php'; }
	       } 
	});	
	e.preventDefault();
});

$(document).on('keypress', '.login__input', function(e) {
	$(".login__error").hide();
});

$(document).on("click", ".exit", function(){
	if(!confirm("Вы уверены, что хотите выйти?")){
		return false;
	}
});

$(document).ready(function(){
    $(document).on('focus', '.block__field', function(){
        $(this).attr('autocomplete', 'off');
    });
});

$(document).on('submit', '#new_user', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "function.php",
	       success: function(data) {
	       		$(".popup").show();
	       		//trim удаляет лишние пробелы, которые есть в response
	       		if($.trim(data) === "error") { $(".popup").html("Ошибка"); }
	       		else if($.trim(data) === "no_error"){ $(".popup").html("Пользователь успешно добавлен!"); }
	       } 
	});	
	e.preventDefault();
});

$(document).on('click', '.load_student', function() {
	document.location.href = "doc1.php";
});