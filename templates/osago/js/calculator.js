jQuery(document).ready(function() {
	jQuery("#clientPhone").mask("(999) 999-99-99");

	jQuery(".disabledA").click(function() {
		if (jQuery(this).hasClass("disabledA")) {
			return false;
		}
	});

    jQuery('#carType').on('change', function() {
		var carType = jQuery(this).val();
		var options = '';
		
		if (carType == 't1') {
			options = '<option value="b1">B1 — до 1600 куб. см включительно</option>' 
				+ '<option value="b2">B2 — 1601 - 2000 куб. см</option>'
				+ '<option value="b3">B3 — 2001 - 3000 куб. см</option>'
				+ '<option value="b4">B4 — больше 3000 куб. См</option>';
		} else if (carType == 't2') {
			options = '<option value="f">F — к легковому автомобилю</option>' 
				+ '<option value="e">E — грузовой или полуприцеп</option>';
		} else if (carType == 't3') {
			options = '<option value="d1">D1 — до 20 чел. включительно</option>' 
				+ '<option value="d2">D2 — больше 20 чел.</option>';
		} else if (carType == 't4') {
			options = '<option value="c1">C1 — до 2 т включительно</option>' 
				+ '<option value="c2">C2 — больше 2 т</option>';
		} else if (carType == 't5') {
			options = '<option value="a1">A1 — до 300 куб. см включительно</option>' 
				+ '<option value="a2">A2 — больше 300 куб. см</option>';
		}
		
		jQuery('#category').empty().append(options);
	});

	jQuery(".calculatePrice").click(function() {
		var isValid = validateForm();

		if (isValid) {
			jQuery(".nav-tabs li").first().removeClass('active');
			jQuery("#calcTab").removeClass('active');
			jQuery("#resultsTab").addClass('active');
			jQuery(".resultsTab a").removeClass('disabledA').parent().addClass('active');

			var calcJsonData = {
				'carType': jQuery('#carType option:selected').text(),
				'city': jQuery('#city option:selected').text(),
				'category': jQuery('#category option:selected').text(),
				'experience': jQuery('#experience option:selected').text(),
				'isTaxi': jQuery('input[name=isTaxi]:checked').parent().text(),
				'year': jQuery('#year option:selected').text(),
				'troubleFreeExperience': jQuery('#troubleFreeExperience option:selected').text(),
				'periodOfInsurance': jQuery('#periodOfInsurance option:selected').text()
			};

			// Variables from calc form
			var carType = jQuery('#carType').val();
			var cityZone = jQuery('#city').val();
			var carCategory = jQuery('#category').val();
			var driveExperience = jQuery('#experience').val();
			var isTaxi = jQuery('input[name=isTaxi]:checked').val();
			var carYear = jQuery('#year').val();
			var troubleFreeExperience = jQuery('#troubleFreeExperience').val();
			var periodOfInsurance = jQuery('#periodOfInsurance').val();

			// calculations for Ins company "Illichivska"
			var illichPrice = calculateIllichivska(carType, cityZone, carCategory, driveExperience, isTaxi, carYear, troubleFreeExperience, periodOfInsurance);
			var evroAliancePrice = calculateEvroAlians(carType, cityZone, carCategory, driveExperience, isTaxi, carYear, troubleFreeExperience, periodOfInsurance);

			jQuery(".illichEnsCompanyPrice").text(illichPrice);
			jQuery(".evroEnsAlPrice").text(evroAliancePrice);

			// set calc json data to DOM
			jQuery("#calcJsonData").val(JSON.stringify(calcJsonData));
		}
	});

	jQuery(".chooseInsCompany").click(function() {
		var email = jQuery(this).data('email');
		var companyClass = jQuery(this).data('class');
		var companyName = jQuery(this).data('companyname');
		var companyPrice = jQuery(this).parent().parent().find('.price').children().text();

		jQuery(".nav-tabs li").removeClass('active');
		jQuery("#resultsTab").removeClass('active');
		jQuery("#contactForm").addClass('active');
		jQuery(".nav-tabs li a").removeClass('disabledA');
		jQuery(".nav-tabs li.contactForm").addClass('active');

		// Add need data to hidden input
		jQuery("#emailWhomSend").val(email);
		jQuery("#insCompanyClass").val(companyClass);
		jQuery("#insCompanyName").val(companyName);
		jQuery("#insCompanyPrice").val(companyPrice);

		// Show need company cantacts
		jQuery(".contactInfoDiv div").hide();
		jQuery("." + companyClass).show();
	});


	/******** Calculate price for Illichivska company *********/
	function calculateIllichivska(carType, cityZone, carCategory, driveExperience, isTaxi, carYear, troubleFreeExperience, periodOfInsurance) {
		var price = 0; var k1 = 1; var k3 = 1; var k4 = 1.5; var k5 = 1;
		// period of insurance
		var poiArray = getPeriodOfInsurance();
		var cityZonesKoefArr = getCityZonesCoefficients();
		cityZonesKoefArr['z6'] = 1.5;

		if (carType == 't1') {
			if (isTaxi == 1) {
				k3 = 1.4;
			}

			if (carCategory == 'b1') {
				k1 = 1;
			} else if (carCategory == 'b2') {
				k1 = 1.14;
			} else if (carCategory == 'b3') {
				k1 = 1.18;
			} else if (carCategory == 'b4') {
				k1 = 1.82;
			}
		}

		if (carType == 't5') {
			if (carCategory == 'a1') {
				k1 = 0.34;
			} else if (carCategory == 'a2') {
				k1 = 0.68;
			}
		}

		if (carType == 't4') {
			if (carCategory == 'c1') {
				k1 = 2;
			} else if (carCategory == 'c2') {
				k1 = 2.18;
			}
		}

		if (carType == 't3') {
			if (carCategory == 'd1') {
				k1 = 2.55;
				if (isTaxi == 1) {
					k3 = 1.4;
				}
			} else if (carCategory == 'd2') {
				k1 = 3;
			}
		}

		if (carType == 't2') {
			if (carCategory == 'f') {
				k1 = 0.34;
			} else if (carCategory == 'e') {
				k1 = 0.5;
			}
		}

		price = 180 * k1 * cityZonesKoefArr[cityZone] * k3 * k4 * k5 * poiArray[periodOfInsurance];

		return (Math.round(price*100)/100).toFixed(2);
	}

	/******** Calculate price for Evropean insurance company *********/
	function calculateEvroAlians(carType, cityZone, carCategory, driveExperience, isTaxi, carYear, troubleFreeExperience, periodOfInsurance) {
		var price = 0; var k1 = 1; var k3 = 1; var k4 = 1.5; var k5 = 1;
		// period of insurance
		var poiArray = getPeriodOfInsurance();
		var cityZonesKoefArr = getCityZonesCoefficients();

		if (driveExperience == '3less') {
			k4 = 1.57;
		}

		if (carType == 't1') {
			if (isTaxi == 1) {
				k3 = 1.4;
			}

			if (driveExperience == '3less') {
				k4 = 1.62;
			}
			if(cityZone == 'z6' && isTaxi == 0) {
				k4 = 1.76;
			}

			if (carCategory == 'b1') {
				k1 = 1;
			} else if (carCategory == 'b2') {
				k1 = 1.14;
			} else if (carCategory == 'b3') {
				k1 = 1.18;
			} else if (carCategory == 'b4') {
				k1 = 1.82;
			}
		}

		if (carType == 't5') {
			if (driveExperience == '3less') {
				k4 = 1.7;
			}

			if (carCategory == 'a1') {
				k1 = 0.34;
			} else if (carCategory == 'a2') {
				k1 = 0.68;
			}
		}

		if (carType == 't4') {
			if (carCategory == 'c1') {
				k1 = 2;
			} else if (carCategory == 'c2') {
				k1 = 2.18;
			}
		}

		if (carType == 't3') {
			if (carCategory == 'd1') {
				k1 = 2.55;
				if (isTaxi == 1) {
					k3 = 1.4;
				}
			} else if (carCategory == 'd2') {
				k1 = 3;
			}
		}

		if (carType == 't2') {
			if (carCategory == 'f') {
				k1 = 0.34;
			} else if (carCategory == 'e') {
				k1 = 0.5;
			}
		}

		price = 180 * k1 * cityZonesKoefArr[cityZone] * k3 * k4 * k5 * poiArray[periodOfInsurance];

		return (Math.round(price*100)/100).toFixed(2);
	}


	// Period of insurance
	function getPeriodOfInsurance() {
		return {
			'0.5': 0.15,
			'1': 0.2,
			'2': 0.3,
			'3': 0.4,
			'4': 0.5,
			'5': 0.6,
			'6': 0.7,
			'7': 0.75,
			'8': 0.8,
			'9': 0.85,
			'10': 0.9,
			'11': 0.95,
			'12': 1
		};
	}

	// Cities zones coefficient
	function getCityZonesCoefficients() {
		return {
			'z1': 4.8,
			'z2': 2.5,
			'z3': 3.4,
			'z4': 2.8,
			'z5': 2.2,
			'z6': 1.6,
			'z6.5': 1.5,
			'z7': 3
		};
	}


	/******* Validate form with vehicle data *******/
	function validateForm() {
		var regCity = jQuery("#regCity").val();
		var isTaxi = jQuery("input[name='isTaxi']:checked").val();
		var year = jQuery("#year").val();
		var troubleFreeExperience = jQuery("#troubleFreeExperience").val();
		var periodOfInsurance = jQuery("#periodOfInsurance").val();

		if (regCity == '' || isTaxi === undefined || year == '' || troubleFreeExperience == '' || periodOfInsurance == '') {

			if (regCity == '') {
				jQuery("#regCity").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#regCity").next('.calc-danger').hide();
			}

			if (isTaxi === undefined) {
				jQuery("input[name='isTaxi']").parent().parent().next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("input[name='isTaxi']").parent().parent().next('.calc-danger').hide();
			}

			if (year == '') {
				jQuery("#year").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#year").next('.calc-danger').hide();
			}

			if (troubleFreeExperience == '') {
				jQuery("#troubleFreeExperience").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#troubleFreeExperience").next('.calc-danger').hide();
			}

			if (periodOfInsurance == '') {
				jQuery("#periodOfInsurance").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#periodOfInsurance").next('.calc-danger').hide();
			}

			return false;
		} else {
			jQuery('.calc-danger').hide();
			return true;
		}
	}



	/******* Contact form ******/
	jQuery("#sendClientInfoForm").submit(function(e) {
		var name = jQuery("#clientName").val();
		var phone = jQuery("#clientPhone").val();
		var email = jQuery("#clientEmail").val();

		// validation
		if (name == '' || phone == '' || !phone.match(/[+)\-(\s\d]{10,20}/) || email == '' || !email.match(/^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/)) {
			if (name == '') {
				jQuery("#clientName").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#clientName").next('.calc-danger').hide();
			}

			if (phone == '' || !phone.match(/[+)\-(\s\d]{10,20}/)) {
				jQuery("#clientPhone").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#clientPhone").next('.calc-danger').hide();
			}

			if (email == '' || !email.match(/^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/)) {
				jQuery("#clientEmail").next('.calc-danger').css('display', 'inline-block');
			} else {
				jQuery("#clientEmail").next('.calc-danger').hide();
			}

			return false;
		} else {
			jQuery('.calc-danger').hide();

			var data = {
				'toEmail': (jQuery("#emailWhomSend").val()).replace(/\\@/, '@'),
				'toName': jQuery("#insCompanyName").val(),
				'clientName': name,
				'clientPhone': phone,
				'clientEmail': email,
				'price': jQuery("#insCompanyPrice").val(),
				'calcData': jQuery("#calcJsonData").val()
			};
			jQuery.ajax({
				type: 'POST',
				url: '/modules/mod_calculator/tmpl/sendMail.php',
				data: data,
				success: function (feedback) {
					if (feedback == 'ok') {
						jQuery(".clientContactForm").empty().append('<div class="success-sent-data">Данные успешно отправлены! <br />Представитель свяжется с Вами в ближайшее время</div>');
					}
					e.preventDefault();
				}
			});
		}

		e.preventDefault();
	});
});