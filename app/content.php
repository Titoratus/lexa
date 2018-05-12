<?php
	$page = "Добавление";
	include ("header.php");
	if(!isset($_COOKIE["curator"])) header("Location: index.php");
	else if(isset($_COOKIE["admin"])) echo "Вы админ!";
	else {
?>
<form id="new_student" name="forma" action="content.php" method="post">
		<div class="block">
			<h2 class="block__title">Студент</h2>

			<div class="field-wrap">
				<label class="block__label" for="name">Имя</label>
				<input class="block__field" id="name" name="name" type="text" autocomplete="off" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="lastname">Фамилия</label>
				<input class="block__field" id="lastname" name="lastname" type="text" autocomplete="off" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="father">Отчество</label>
				<input class="block__field" id="father" name="father" type="text" autocomplete="off" required>
			</div>

			<div class="field-wrap">
				<label class="block__label">Номер группы</label>
				<input class="block__field" type="text" value="<?php echo $_COOKIE["group"]; ?>" disabled>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="speciality">Специальность</label> 
				<select class="block__field" id="speciality" name="speciality" required>
					<option selected disabled></option>
					<option value="Преподавание в начальных классах">Преподавание в начальных классах</option>
					<option value="Дошкольное образование">Дошкольное образование</option>
					<option value="Изобразительное искусство и черчение">Изобразительное искусство и черчение</option>
					<option value="Физическая культура">Физическая культура</option>
					<option value="Прикладная информатика">Прикладная информатика</option>
					<option value="Социальная работа">Социальная работа</option>
				</select>
			</div>
			
			<div class="field-wrap">
				<label class="block__label" for="birthdate">Дата рождения</label>
				<input class="block__field" id="birthdate" name="birthdate" type="date" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="phone">Номер телефона</label>
				<input class="block__field" id="phone" name="phone" type="text" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="registration">Адрес прописки</label>
				<input class="block__field" id="registration" name="registration" type="text" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="residence">Адрес проживания</label>
				<input class="block__field" id="residence" name="residence" type="text" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="grouphealth">Группа здоровья</label> 
				<select class="block__field" id="grouphealth" name="grouphealth" required>
					<option selected disabled></option>
					<option value="I">I</option>
					<option value="II">II</option>
					<option value="III">III</option>
					<option value="IV">IV</option>
					<option value="V">V</option>
				</select>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="class">Образование (9/11)</label>
				<select class="block__field" id="class" name="class" required>
					<option selected disabled></option>
					<option value="9">9</option>
					<option value="11">11</option>
				</select>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="midmark">Средний балл аттестата</label>
				<input class="block__field" id="midmark" name="midmark" type="text" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="work">Подработка</label>
				<input class="block__field" id="work" name="work" type="text" required>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="hobby">Кружки, секции</label>
				<input class="block__field" id="hobby" name="hobby" type="text" required>
			</div>

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="dormitory" name="dormitory" type="checkbox" value="checked">
				<label class="block__label label_inline" for="dormitory"><span></span>Проживание в общежитии</label>
			</div>

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="disability" name="disability" type="checkbox" value="checked">
				<label class="block__label label_inline" for="disability"><span></span>Студент с ОВЗ</label>
			</div>		

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="kdn" name="kdn" type="checkbox" value="checked">
				<label class="block__label label_inline" for="kdn"><span></span>Состоящий на учете в КДН</label>
			</div>				

		</div>

	<!--Семья-->
	<div class="block">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label class="block__label" for="family">Семья</label>
			<select class="block__field" id="family" name="family" required>
				<option selected disabled></option>
				<option value="Полная">Полная</option>
				<option value="Неполная">Неполная</option>
				<option value="Сирота">Сирота</option>
			</select>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="security">Обеспечение</label>
			<select class="block__field" id="security" name="security" required>
				<option selected disabled></option>
				<option value="Гос.обеспечение">Гос.обеспечение</option>
				<option value="Опекун">Опекун</option>
			</select>
		</div>

		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label class="block__label" for="father_name">ФИО отца</label>
			<input class="block__field" id="father_name" name="father_name" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="f_workplace">Место работы</label>
			<input class="block__field" id="f_workplace" name="f_workplace" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="f_phone">Номер телефона</label>
			<input class="block__field" id="f_phone" name="f_phone" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="f_address">Адрес проживания</label>
			<input class="block__field" id="f_address" name="f_address" type="text" required>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="f_pensioner" name="f_pensioner" type="checkbox" value="checked">
			<label class="block__label" for="f_pensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" id="f_work" name="f_work" type="checkbox" value="checked">
			<label class="block__label" for="f_work"><span></span>Работа</label>
		</div>

		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label class="block__label" for="mother_name">ФИО матери</label>
			<input class="block__field" id="mother_name" name="mother_name" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="m_workplace">Место работы</label>
			<input class="block__field" id="m_workplace" name="m_workplace" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="m_phone">Номер телефона</label>
			<input class="block__field" id="m_phone" name="m_phone" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="m_address">Адрес проживания</label>
			<input class="block__field" id="m_address" name="m_address" type="text" required>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="m_pensioner" name="m_pensioner" type="checkbox" value="checked">
			<label class="block__label" for="m_pensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" id="m_work" name="m_work" type="checkbox" value="checked">
			<label class="block__label" for="m_work"><span></span>Работа</label>
		</div>


		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label class="block__label" for="guardian_name">ФИО опекуна</label>
			<input class="block__field" id="guardian_name" name="guardian_name" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="g_workplace">Место работы</label>
			<input class="block__field" id="g_workplace" name="g_workplace" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="g_phone">Номер телефона</label>
			<input class="block__field" id="g_phone" name="g_phone" type="text" required>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="g_address">Адрес проживания</label>
			<input class="block__field" id="g_address" name="g_address" type="text" required>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="g_pensioner" name="g_pensioner" type="checkbox" value="checked">
			<label class="block__label" for="g_pensioner"><span></span>Пенсионер</label>			
		</div>

		<div class="field-wrap">
			<input class="block__field" id="g_work" name="g_work" type="checkbox" value="checked">
			<label class="block__label" for="g_work"><span></span>Работа</label>	
		</div>				

		<div class="field-wrap">
			<input class="block__field" id="lowincome" name="lowincome" type="checkbox" value="checked">
			<label class="block__label" for="lowincome"><span></span>Малообеспеченные</label>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="children" name="children" type="checkbox" value="checked">
			<label class="block__label" for="children"><span></span>Многодетные</label>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="socialrisk" name="socialrisk" type="checkbox" value="checked">
			<label class="block__label" for="socialrisk"><span></span>Семья социального риска</label>
		</div>

		<input class="block__btn" name="submit" type="submit" value="Добавить запись">
	</div>
</form>
<?php
	}

	include("footer.php");
?>