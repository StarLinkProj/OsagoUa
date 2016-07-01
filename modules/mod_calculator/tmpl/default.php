<div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#calcTab" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">Заполните минимум информации для получения ценового предложения</a></li>
		<li role="presentation" class="resultsTab"><a class="disabledA" href="#resultsTab" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Отметьте интересующее предложение</a></li>
		<li role="presentation" class="contactForm"><a class="disabledA" href="#contactForm" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Заполните форму для обратной связи с Вами представителей выбранной страховой компании</a></li>
		<li role="presentation" class="contactsInfo"><a class="disabledA" href="#contactsInfo" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="true">Вы можете самостоятельно связаться с представителями страховой компании по указанным контактам</a></li>
	</ul>
	<div class="clear"></div>

	<!-- Tab panes -->
	<div class="tab-content">
		<div id="calcTab" class="tab-pane active">
			<?php require "calcForm.php"; ?>
		</div>

		<div id="resultsTab" class="tab-pane">
			<?php require "companyChoose.php"; ?>
		</div>

		<div id="contactForm" class="tab-pane">
			<?php require "contactForm.php"; ?>
		</div>

		<div id="contactsInfo" class="tab-pane">
			<?php require "contacts.php"; ?>
		</div>
	</div>
</div>

<input type="hidden" value="" id="emailWhomSend">
<input type="hidden" value="" id="insCompanyClass">
<input type="hidden" value="" id="insCompanyName">
<input type="hidden" value="" id="insCompanyPrice">
<input type="hidden" value="" id="calcJsonData">