<?php
	$page = "Добавление";
	include ("header.php");
	if(!isset($_SESSION['login'])){
		header("Location: index.php");
	} elseif ($_SESSION['priv'] == "admin") {
		echo "Вы админ!";
	} else {
?>
<form id="new_student" name="forma" action="content.php" method="post">
		<div class="block">
			<h2 class="block__title">Студент</h2>

			<div class="field-wrap">
				<label class="block__label" for="FirstName">Имя</label>
				<input class="block__field" id="FirstName" name="FirstName" type="text" autocomplete="off">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="LastName">Фамилия</label>
				<input class="block__field" id="LastName" name="LastName" type="text" autocomplete="off">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Otchestvo">Отчество</label>
				<input class="block__field" id="Otchestvo" name="Otchestvo" type="text" autocomplete="off">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="NumberGroup">Номер группы</label>
				<input class="block__field" id="NumberGroup" name="NumberGroup" type="text" autocomplete="off">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Specialnost">Специальность</label> 
				<select class="block__field" id="Specialnost" name="Specialnost" required>
					<option></option>
					<option value="ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ">ПРЕПОДАВАНИЕ В НАЧАЛЬНЫХ КЛАССАХ</option>
					<option value="ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ">ДОШКОЛЬНОЕ ОБРАЗОВАНИЕ</option>
					<option value="ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ">ИЗОБРАЗИТЕЛЬНОЕ ИСКУССТВО И ЧЕРЧЕНИЕ</option>
					<option value="ФИЗИЧЕСКАЯ КУЛЬТУРА">ФИЗИЧЕСКАЯ КУЛЬТУРА</option>
					<option value="ПРИКЛАДНАЯ ИНФОРМАТИКА">ПРИКЛАДНАЯ ИНФОРМАТИКА</option>
					<option value="СОЦИАЛЬНАЯ РАБОТА">СОЦИАЛЬНАЯ РАБОТА</option>
				</select>
			</div>
			
			<div class="field-wrap">
				<label class="block__label" for="BirthDate">Дата рождения</label>
				<input class="block__field" id="BirthDate" name="BirthDate" type="date">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Phone">Номер телефона</label>
				<input class="block__field" id="Phone" name="Phone" type="text">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Propiska">Адрес прописки</label>
				<input class="block__field" id="Propiska" name="Propiska" type="text">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Progivaet">Адрес проживания</label>
				<input class="block__field" id="Progivaet" name="Progivaet" type="text">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="GroupHealth">Группа здоровья</label> 
				<select class="block__field" id="GroupHealth" name="GroupHealth" required>
					<option></option>
					<option value="I">I</option>
					<option value="II">II</option>
					<option value="I">III</option>
					<option value="II">IV</option>
					<option value="I">V</option>
				</select>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Class">Образование (9/11)</label>
				<select class="block__field" id="Class" name="Class" required>
					<option></option>
					<option value="9">9</option>
					<option value="11">11</option>
				</select>
			</div>

			<div class="field-wrap">
				<label class="block__label" for="SrBallAt">Средний балл аттестата</label>
				<input class="block__field" id="SrBallAt" name="SrBallAt" type="text">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Rabota">Подработка</label>
				<input class="block__field" id="Rabota" name="Rabota" type="text">
			</div>

			<div class="field-wrap">
				<label class="block__label" for="Hobbi">Кружки, секции</label>
				<input class="block__field" id="Hobbi" name="Hobbi" type="text">
			</div>

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="Obshaga" name="Obshaga" type="checkbox" value="checked">
				<label class="block__label label_inline" for="Obshaga"><span></span>Проживание в общежитии</label>
			</div>

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="Invalidnost" name="Invalidnost" type="checkbox" value="checked">
				<label class="block__label label_inline" for="Invalidnost"><span></span>Студент с ОВЗ</label>
			</div>		

			<div class="field-wrap">				
				<input class="block__field field_inline field_chk" id="KDN" name="KDN" type="checkbox" value="checked">
				<label class="block__label label_inline" for="KDN"><span></span>Состоящий на учете в КДН</label>
			</div>				

		</div>

	<!--Семья-->
	<div class="block">	
		<h2 class="block__title">Семья</h2>
		<div class="field-wrap">
			<label class="block__label" for="">Семья</label>
			<select class="block__field" name="Family" required>
				<option></option>
				<option value="Полная">Полная</option>
				<option value="Неполная">Неполная</option>
				<option value="Сирота">Сирота</option>
			</select>
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Обеспечение</label>
			<select class="block__field" name="Obespechenie">
				<option></option>
				<option value="Гос.обеспечение">Гос.обеспечение</option>
				<option value="Опекун">Опекун</option>
			</select>
		</div>

		<h3 class="block__subtitle">Отец</h3>
		<div class="field-wrap">
			<label class="block__label" for="">ФИО отца</label>
			<input class="block__field" name="FIOFather" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Место работы</label>
			<input class="block__field" name="FMestoR" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Номер телефона</label>
			<input class="block__field" name="FPhoner" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="">Адрес проживания</label>
			<input class="block__field" name="FAdres" type="text">
		</div>

		<div class="field-wrap">
			<input class="block__field" id="FPensioner" name="FPensioner" type="checkbox" value="checked">
			<label class="block__label" for="FPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" id="FRabota" name="FRabota" type="checkbox" value="checked">
			<label class="block__label" for="FRabota"><span></span>Работа</label>
		</div>

		<h3 class="block__subtitle">Мать</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOMother">ФИО матери</label>
			<input class="block__field" id="FIOMother" name="FIOMother" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MMestoR">Место работы</label>
			<input class="block__field" id="MMestoR" name="MMestoR" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MPhoner">Номер телефона</label>
			<input class="block__field" id="MPhoner" name="MPhoner" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="MAdres">Адрес проживания</label>
			<input class="block__field" id="MAdres" name="MAdres" type="text">
		</div>

		<div class="field-wrap">
			<input class="block__field" id="MPensioner" name="MPensioner" type="checkbox" value="checked">
			<label class="block__label" for="MPensioner"><span></span>Пенсионер</label>
		</div>
		<div class="field-wrap">
			<input class="block__field" id="MRabota" name="MRabota" type="checkbox" value="checked">
			<label class="block__label" for="MRabota"><span></span>Работа</label>
		</div>


		<h3 class="block__subtitle">Опекун</h3>
		<div class="field-wrap">
			<label class="block__label" for="FIOOpekun">ФИО опекуна</label>
			<input class="block__field" id="FIOOpekun" name="FIOOpekun" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OMestoR">Место работы</label>
			<input class="block__field" id="OMestoR" name="OMestoR" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OPhoner">Номер телефона</label>
			<input class="block__field" id="OPhoner" name="OPhoner" type="text">
		</div>
		<div class="field-wrap">
			<label class="block__label" for="OAdres">Адрес проживания</label>
			<input class="block__field" id="OAdres" name="OAdres" type="text">
		</div>

		<div class="field-wrap">
			<input class="block__field" id="OPensioner" name="OPensioner" type="checkbox" value="checked">
			<label class="block__label" for="OPensioner"><span></span>Пенсионер</label>			
		</div>

		<div class="field-wrap">
			<input class="block__field" id="ORabota" name="ORabota" type="checkbox" value="checked">
			<label class="block__label" for="ORabota"><span></span>Работа</label>	
		</div>				

		<div class="field-wrap">
			<input class="block__field" id="Maloobespech" name="Maloobespech" type="checkbox" value="checked">
			<label class="block__label" for="Maloobespech"><span></span>Малообеспеченные</label>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="Mnogodet" name="Mnogodet" type="checkbox" value="checked">
			<label class="block__label" for="Mnogodet"><span></span>Многодетные</label>
		</div>

		<div class="field-wrap">
			<input class="block__field" id="Socialrisk" name="Socialrisk" type="checkbox" value="checked">
			<label class="block__label" for="Socialrisk"><span></span>Семья социального риска</label>
		</div>

		<input class="block__btn" name="submit" type="submit" value="Добавить запись">
	</div>
</form>
<?php
	}

	include("footer.php");
?>