<?php
    require "../../../libraries/vendor/phpmailer/phpmailer/PHPMailerAutoload.php";

    $mail = new PHPMailer;

    $mail->CharSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@osagoua.com.ua';
    $mail->Password = 'jeAirWOs';
    $mail->SMTPSecure = '';
    $mail->Port = 25;

    $data = $_POST;
    $calcData = json_decode($data['calcData']);

    $mail->setFrom($data['clientEmail'], 'Osagoua / ' . $data['clientName']);
    $mail->addAddress($data['toEmail'], $data['toName']);
    $mail->addReplyTo($data['clientEmail'], $data['clientName']);

    $mail->isHTML(true);

    $mail->Subject = 'OSAGOUA.com';
    $message = '<h2 style="font-weight: bold;">OSAGOUA.com</h2>'
        . '<p style="font-weight: bold;">Контактная информация:</p>'
            . '<p>- Имя: ' . $data['clientName'] . '</p>'
            . '<p>- Телефон: ' . $data['clientPhone'] . '</p>'
            . '<p>- Мейл: ' . $data['clientEmail'] . '</p>'
        . '<p><span  style="font-weight: bold;">Город регистрации транспортного средства:</span> ' . $calcData->city . '</p>'
        . '<p><span  style="font-weight: bold;">Тип транспортного средства:</span> ' . $calcData->carType . '</p>'
        . '<p><span  style="font-weight: bold;">Категория:</span> ' . $calcData->category . '</p>'
        . '<p><span  style="font-weight: bold;">Стаж вождения:</span> ' . $calcData->experience . '</p>'
        . '<p><span  style="font-weight: bold;">Используется ли транспортное средство в качестве такси:</span>' . $calcData->isTaxi . '</p>'
        . '<p><span  style="font-weight: bold;">Год выпуска транспортного средства:</span> ' . $calcData->year . '</p>'
        . '<p><span  style="font-weight: bold;">Беспрерывный стаж вождения без ДТП:</span> ' . $calcData->troubleFreeExperience . '</p>'
        . '<p><span  style="font-weight: bold;">Период страхования (кол-во месяцев):</span> ' . $calcData->periodOfInsurance . '</p>'
        . '<p style="font-weight: bold;">Цена (расчитанная сайтом): <span style="color: #12b500;">' . $data['price'] . ' грн</span></p><br>';
    $mail->Body    = $message;
    $mail->AltBody = $message;

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo "ok";
    }