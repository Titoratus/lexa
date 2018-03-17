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


//Новый пользователь
$(document).on('submit', '#new_user', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
		       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close'></span></div></div>");
		       	$(".msg-popup").fadeIn();
		       	$(".msg").append($.trim(data));
		       	form.find("input[type='text'], input[type='password']").val('');
		       	form.find("input[type='checkbox']").prop("checked", false);
		       	form.find("select").prop("selectedIndex", 0);		       		   
	       } 
	});	
	e.preventDefault();
});

$(document).on('click', '.load_student', function() {
	document.location.href = "doc1.php";
});


//Новый студент
$(document).on('submit', '#new_student', function(e) {
	var form = $(this);
	$.ajax({
	       data: "new_stud=1&"+form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close'></span></div></div>");
	       	$(".msg-popup").fadeIn();
	       	$(".msg").append(data);
	       	form.find("input[type='text']").val('');
	       	form.find("input[type='checkbox']").prop("checked", false);
	       	form.find("select").prop("selectedIndex", 0);
	       }
	});	
	e.preventDefault();
});

//Закрыть окно
$(document).on('click', '.msg__close', function() {
	$(".msg-popup").fadeOut();
	if($(this).hasClass("msg__close_refresh")) {
		location.reload();
	}
	else {
		setTimeout("$('.msg-popup').remove()", 500);
	}
});


//Удаление студента
$(document).on('click', '.del_stud', function() {
	if(confirm("Вы уверены, что хотите удалить студента?")){
		var del = $(this);
		$(".msg-popup").fadeOut();
		$.ajax({
		       data: "del_stud="+$(this).attr("data-del_stud"),
		       type: "post",
		       url: "functions.php",
		       success: function(data) {
		       		window.location.href = "student.php";
		       } 
		});
	}
	else return false;
});


//Редактирование студента
$(document).on('click', '.edit_stud', function() {
	$(".msg-popup").fadeOut();
	$(this).addClass("edit_active");
	$.ajax({
	       data: "edit_stud="+$(this).attr("data-edit_stud"),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       	$("body").append("<div class='msg-popup'></div>");
	       	$(".msg-popup").html(data);
	       	$(".msg-popup").fadeIn();
	       	$(".block").append("<span class='msg__close msg__close_white'></span>")
	       } 
	});
});

//Сохранить изменения
$(document).on('submit', '#form_save', function(e) {
	var form = $(this);
	$.ajax({
	       data: "edit_stud_save=1&stud_save="+$(".edit_active").attr("data-edit_stud")+"&"+form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       	window.location.href = "student.php";
	       }
	});	
	e.preventDefault();
});

//Просмотр студента
$(document).on('click', '.view_stud', function() {
	$.ajax({
	       data: "view_stud="+$(this).attr("data-view_stud"),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       	$("body").append("<div class='msg-popup'></div>");
	       	$(".msg-popup").html(data);
	       	$(".msg-popup").fadeIn();
	       	$(".block").append("<span class='msg__close msg__close_white'></span>")
	       } 
	});
});


//Закрытие окна popup по клику на него
$(document).on("click", ".msg-popup", function(e){
	if(e.target == this) {
		$(".msg-popup").fadeOut();
		setTimeout("$('.msg-popup').remove()", 500);
	}
});

$(document).keyup(function(e) {
	if(e.keyCode == 27)
		if($(".msg-popup").length){
			$(".msg-popup").fadeOut();
			setTimeout("$('.msg-popup').remove()", 500);
		}
});

//Соритровка студентов по ОВЗ и общаге
$(document).on('click', '.radio', function() {
	var sort = $(this).attr("data-sort");
	$.ajax({
	       data: "sel_id="+sort,
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       		$(".table").html(data);
	       } 
	});	
});


//Подтверждение пароля
$(document).on("keyup keydown focus", "#confpass", function(){
	if($("#pass").val() == "") return false;
	if($(this).val() == $("#pass").val()) $(this).css("border-color", "#42bd5d");
	else $(this).css("border-color", "#e04646");
});

$(document).on("blur", "#confpass", function(){
	$(this).css("border-color", "#22283b");
});

$(document).on("keyup keydown", "#pass", function(){
	$("#confpass").val("");
});