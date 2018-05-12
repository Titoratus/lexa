$(document).on('submit', '#loginForm', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       		//trim удаляет лишние пробелы, которые есть в response
	       		if($.trim(data) === "error") {  $(".login__error").show(); $(".login__error").html("Неверный логин или пароль"); }
	       		else { window.location.href = 'index.php'; }
	       } 
	});	
	e.preventDefault();
});

//Новая группа после удаления в админке
$(document).on('submit', '#new_group', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
		       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close'></span></div></div>");
		       	$(".msg-popup").fadeIn();	       	
		       	if($.trim(data) == "success"){
			       	location.reload();
		       	}
		       	else $(".msg").append($.trim(data));
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

//Поиск по студентам
$(document).on("keyup", ".search_stud", function(){
	if(this.value.length >= 2 || this.value == ""){
		var filter = $(".filter:checked").attr("data-filter");
		if(filter == undefined){
			filter = 0;
		}
		$.ajax({
		  type: 'post',
		  url: "search.php",
		  data: "value="+this.value+"&filter="+filter,
		  success: function(data){
		      $(".table tr:not(:first)").remove();
		      $(".table tbody").append(data).fadeIn(); 
		 }
		});
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
		       	if($.trim(data) == "success"){
			       	form.find("input[type='text'], input[type='password']").val('');
			       	form.find("input[type='checkbox']").prop("checked", false);
			       	form.find("select").prop("selectedIndex", 0);
			       	$(".msg").append("Пользователь успешно добавлен!");
		       	}
		       	else $(".msg").append($.trim(data));
	       } 
	});	
	e.preventDefault();
});

//Изменение пароля пользователя
$(document).on('submit', '#change_pass', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
		       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close'></span></div></div>");
		       	$(".msg-popup").fadeIn();
		       	if($.trim(data) == "success"){
			       	form.find("input[type='text'], input[type='password']").val('');
			       	form.find("input[type='checkbox']").prop("checked", false);
			       	form.find("select").prop("selectedIndex", 0);
			       	$(".msg").append("Пароль успешно изменён!");
		       	}
		       	else $(".msg").append($.trim(data));
	       } 
	});	
	e.preventDefault();
});

//Удаление пароля пользователя
$(document).on('submit', '#del_group', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
		       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close msg__close_refresh'></span></div></div>");
		       	$(".msg-popup").fadeIn();
		       	if($.trim(data) == "success"){
			       	form.find("input[type='text'], input[type='password']").val('');
			       	form.find("input[type='checkbox']").prop("checked", false);
			       	form.find("select").prop("selectedIndex", 0);
			       	$(".msg").append("Группа успешно удалена!");
		       	}
		       	else $(".msg").append($.trim(data));
	       } 
	});	
	e.preventDefault();
});

$(document).on("click", ".load_student", function() {
	document.location.href = "download.php";
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
	       	form.find("input[type='text']:not(:disabled)").val('');
	       	form.find("input[type='checkbox']:not(:disabled)").prop("checked", false);
	       	form.find("select:not(:disabled)").prop("selectedIndex", 0);
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

$(document).on("change", "select[name='priv']", function(){
	if(this.value == "admin") {
		$(".for_curator").hide();
		$(".for_curator .block__field").prop("disabled", true);
	}
	else {
		$(".for_curator").show();
		$(".for_curator .block__field").prop("disabled", false);
	}
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
$(document).on('click', '.sort_btn, .filter_title', function(e) {

	//Если что-то есть в поиске
	if($.trim($(".search_stud").val()).length >= 2) var search = $.trim($(".search_stud").val());
	else var search = 0;

	//Сброс фильтра
	if($(this).attr("for") == $(".filter:checked").attr("id")) {
		e.preventDefault();
		$(".filter:checked").prop("checked", false);
		$.ajax({
		       data: "full=1&search="+search,
		       type: "post",
		       url: "search.php",
		       success: function(data) {
		       		$(".table tr:not(:first)").remove();
		       		$(".table tbody").append(data);
		       }
		});
		return;
	}

	var sort = $(this).attr("data-sort");	
	$.ajax({
	       data: "sel_id="+sort+"&search="+search,
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       		$(".table tr:not(:first)").remove();
	       		$(".table tbody").append(data);
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

$(document).on("change", "#edt_groupid", function(){
	$("#edt_newgroup").val($(this).val());
});

//Изменение названия группы
$(document).on('submit', '#edt_group', function(e) {
	var form = $(this);
	$.ajax({
	       data: form.serialize(),
	       type: "post",
	       url: "functions.php",
	       success: function(data) {
	       	$("body").append("<div class='msg-popup'><div class='msg'><span class='msg__close msg__close_refresh'></span></div></div>");
	       	$(".msg-popup").fadeIn();
	       	$(".msg").append(data);
	       }
	});	
	e.preventDefault();
});