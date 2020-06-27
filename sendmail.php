<?php
		// Создаем заголовок header который одинаков для всех писем и поэтому не формируется внутри цикла
		$from = "Надоокна - сервис покупки пластиковых окон";
		$from = "=?utf-8?b?". base64_encode($from) ."?=";	
		$header = "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: ".$from."<info@nadookna.com>\r\n";
		$header .= "MIME-Version: 1.0\r\n"; 
		$header .= "Date: ".date('D, d M Y h:i:s O'); 
					
		//тема письма
		$subject = "На сайте Надоокна новый Тендер №423"; //тема сообщения
		$subject = "=?utf-8?b?". base64_encode($subject) ."?=";

		//поучатели письма (оконные компании)
		$to = 'anar.n.agaev@gmail.com,anar.n.agaev@yandex.ru,aagaev@inbox.ru';
		
		// текст сообщения (HTML письмо)
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <title>Надоокна - Новый тендер на покупку пластиковых окон.</title>
    <style type="text/css">
        html {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
        }
    </style>
</head>
<body style="padding:0px; margin:0px;">
    <div id="mailsub" class="notification" align="center"
        style="word-break:normal;-webkit-text-size-adjust:none; -ms-text-size-adjust: none;line-height: normal;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height: normal; padding:0px; margin:0px;">
            <tr>
                <td align="center">
                    <!--[if (gte mso 9)|(IE)]>
                        <table width="600" border="0" cellspacing="0" cellpadding="0" style="padding:0px; margin:0px;">
                            <tr>
                                <td>
                    <![endif]-->
                    <div>
                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0px; margin:0px; max-width: 600px; min-width: 600px; background-color: #f9f9f9;" bgcolor="#f9f9f9">
                            <tr>
                                <td style="width: 40px; max-width: 40px; min-width: 40px;">&nbsp;</td>
                                <td align="left" style="border-bottom-width: 1px; border-bottom-color: #f0f0f0; border-bottom-style: solid;">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0px; margin:0px; max-width: 520px; min-width: 520px; background-color: #f9f9f9;" bgcolor="#f9f9f9">
                                        <tr>
                                            <td style="color: #4285f4; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 26px; font-weight: 700; text-transform: uppercase;">
                                                <div style="height: 50px; line-height: 50px; font-size:8px;">&nbsp;</div>
                                                HADOOKHA
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 40px; font-weight: 700; line-height: 44px; ">
                                                <div style="height: 25px; line-height: 25px; font-size:8px;">&nbsp;</div>
                                                Новый тендер на покупку пластиковых окон
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style=" color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 400; line-height: 23px;">
                                                <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                Здравствуйте, меня зовут Роман, я менеджер по развитию сервиса Надоокна. Сервис покупки пластиковых окон помогает находить клиентов для оконных компаний. Сейчас на нашем сайте открыт тендер на покупку пластиковых окон со следующими позициями.
                                                <div style="height: 27px; line-height: 27px; font-size:8px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 40px; max-width: 40px; min-width: 40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 40px; max-width: 40px; min-width: 40px;">&nbsp;</td>
                                <td align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0px; margin:0px; max-width: 520px; min-width: 520px; background-color: #f9f9f9;" bgcolor="#f9f9f9">
                                        <tr>
                                            <td>
                                                
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                    
                                                    <!-- Параметры окон в тендере -- НАЧАЛО -->
													
                                                    <tr>
                                                        <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 20px; font-weight: 700; line-height: 24px;" width="300px" colspan="2">
                                                            <div style="height: 28px; line-height: 28px; font-size:8px;">&nbsp;</div>
                                                            Окно с вертикальным импостом и одной поворотной створкой слева
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 15px; font-weight: 400; line-height: 20px;" width="300px">
                                                            <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                            Ширина конструкции: 1200<br/>
															Высота окна: 1300<br/>
															Количество камер ПВХ профиля: 3<br/>
															Количество камер стеклопакета: 1<br/>
															Отлив: не нужен<br/>
															Откосы: не нужны<br/>
															Подоконник: не нужен<br/>
															Монтаж: не нужен<br/>
															Москитная сетка: не нужна<br/>
															Защита от детей: не нужен<br/>
															Количество таких окон: 3
                                                        </td>
                                                        <td style="vertical-align: middle; text-align: center;" width="220px">
                                                            <img src="http://nadookna.com/img/addtndr/win/21.png" width="auto" height="auto" style="display: inline-block; max-width: 100%; max-height: 100%;" alt="Глухое окно с одним вертикальным импостом" border="0" />
                                                        </td>
                                                    </tr>

                                                    <!-- Параметры окон в тендере -- КОНЕЦ -->
                                                </table>
												
												<table border="0" cellspacing="0" cellpadding="0" style="padding:0px; margin:0px; border-bottom-width: 1px; border-bottom-color: #f0f0f0; border-bottom-style: solid;">
													<tr>
                                                        <td style="vertical-align: middle; text-align: center;">
                                                            <div style="height: 35px; line-height: 35px; font-size:8px;">&nbsp;</div>
															<a href="http://nadookna.com/showtender.php?idt=423" target="_blank" style="display: inline-block; text-decoration: none; line-height: 56px; text-align: center; width: 340px; height: 56px; box-shadow: 0 5px 16px rgba(35, 94, 193, 0.31); border-radius: 28px; background-color: #4285f4; color: #ffffff; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 19px; font-weight: 400;"> 
                                                                Показать контакты заказчика
                                                            </a>
                                                            <div style="height: 27px; line-height: 27px; font-size:8px;">&nbsp;</div>
                                                        </td>
                                                    </tr>
												
													<tr>
                                                        <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 400; line-height: 20px;">
                                                            <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                            Для того чтобы и далее получать автоматические уведомления о новых тендерах в вашем городе вам необходимо пройти
                                                            <a href="http://nadookna.com/addorg.php" target="_blank" style="color: #4285f4; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 400; line-height: 20px; text-decoration: none;">Регистрацию</a>
                                                            на нашем ресурсе
                                                            <div style="height: 10px; line-height: 10px; font-size:8px;">&nbsp;</div>
                                                        </td>
                                                    </tr>
													
													<tr>
                                                        <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 400; line-height: 20px;">
                                                            Чтобы посмотреть все предложения для оконных компаний посетите 
                                                            <a href="http://nadookna.com/okonnym-kompaniyam.php" target="_blank" style="color: #4285f4; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 400; line-height: 20px; text-decoration: none;">Промо страницу</a>
                                                            <div style="height: 27px; line-height: 27px; font-size:8px;">&nbsp;</div>
                                                        </td>
                                                    </tr>
												
												</table>

                                                <table border="0" style="padding:0px; margin:0px;" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td style="padding:0px; margin:0px; color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 21px; font-weight: 700;">
                                                            <div style="height: 27px; line-height: 27px; font-size:8px;">&nbsp;</div>
                                                            Как работает сервис НАДООКНА
                                                            <div style="height: 40px; line-height: 40px; font-size:8px;">&nbsp;</div>
                                                        </td>
                                                    </tr>
                                                </table>
            
                                                <table border="0" style="padding:0px; margin:0px; border-bottom-width: 1px; border-bottom-color: #f0f0f0; border-bottom-style: solid;" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="260px" style="padding:0px; margin:0px; vertical-align: top;">
                                                            <table border="0" style="padding:0px; margin:0px;" width="240" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="144px">
                                                                        <img src="http://nadookna.com/img/smhow1.png" width="240" height="144" alt="Шаг 1 - Создание тендера" border="0" style="display: block;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="45px" style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 600;">
                                                                        <div style="height: 10px; line-height: 10px; font-size:8px;">&nbsp;</div>
                                                                        Создание тендера
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="vertical-align: top; color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 16px; font-weight: 400; line-height: 22px;">
                                                                        Заказчик размещает тендер с подробным описанием необходимых пластиковых окон.
                                                                        <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="260px" style="padding:0px; margin:0px; vertical-align: top;">
                                                            <table border="0" style="float: right; padding:0px; margin:0px;" width="240" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="144px">
                                                                        <img src="http://nadookna.com/img/smhow2.png" width="240" height="144" alt="Шаг 2 - Контакты клиентов" border="0" style="display: block;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="45px" style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 600;">
                                                                        <div style="height: 10px; line-height: 10px; font-size:8px;">&nbsp;</div>
                                                                        Контакты клиентов
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="vertical-align: top; color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 16px; font-weight: 400; line-height: 22px;">
                                                                        Вы получаете контакты клиентов, желающих сделать заказ на приобретение окон.
                                                                        <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div style="height: 35px; line-height: 35px; font-size:8px;">&nbsp;</div></td>
                                                        <td><div style="height: 35px; line-height: 35px; font-size:8px;">&nbsp;</div></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="260px" style="padding:0px; margin:0px; vertical-align: top;">
                                                            <table border="0" style="padding:0px; margin:0px;" width="240" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="144px">
                                                                        <img src="http://nadookna.com/img/smhow3.png" width="240" height="144" alt="Шаг 1 - Создание тендера" border="0" style="display: block;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="45px" style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 600;">
                                                                        <div style="height: 10px; line-height: 10px; font-size:8px;">&nbsp;</div>
                                                                        Ваше предложение
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="vertical-align: top; color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 16px; font-weight: 400; line-height: 22px;">
                                                                        Звонок заказчику с предложением цены и преимуществ заказа окон в Вашей компании.
                                                                        <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                        <td width="260px" style="padding:0px; margin:0px; vertical-align: top;">
                                                            <table border="0" style="float: right; padding:0px; margin:0px;" width="240" cellspacing="0" cellpadding="0">
                                                                <tr>
                                                                    <td height="144px">
                                                                        <img src="http://nadookna.com/img/smhow4.png" width="240" height="144" alt="Шаг 2 - Контакты клиентов" border="0" style="display: block;" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="45px" style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 17px; font-weight: 600;">
                                                                        <div style="height: 10px; line-height: 10px; font-size:8px;">&nbsp;</div>
                                                                        Заключение договора​
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="vertical-align: top; color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 16px; font-weight: 400; line-height: 22px;">
                                                                        Выбор именно Вашего предложения заказчиком и заключение договора.
                                                                        <div style="height: 15px; line-height: 15px; font-size:8px;">&nbsp;</div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><div style="height: 20px; line-height: 20px; font-size:8px;">&nbsp;</div></td>
                                                        <td><div style="height: 20px; line-height: 20px; font-size:8px;">&nbsp;</div></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 40px; max-width: 40px; min-width: 40px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 40px; max-width: 40px; min-width: 40px;">&nbsp;</td>
                                <td align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" width="100%" style="max-width: 520px; min-width: 520px; background-color: #f9f9f9;" bgcolor="#f9f9f9">
                                        <tr>
                                            <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 15px; font-weight: 400; line-height: 21px;">
                                                <div style="height: 20px; line-height: 20px; font-size:8px;">&nbsp;</div>
                                                Copyright © 2019 НАДООКНА, Все права защищены.<br>
                                                Если возникнут вопросы, пишите на этот адрес: 
                                                <a href="mailto:roman@nadookna.com" style="color: #4285f4; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 15px; font-weight: 400; line-height: 20px; text-decoration: none;">roman@nadookna.com</a>
                                            </td>
                                        <tr>
                                            <td style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 13px; font-weight: 400; line-height: 21px;">
                                                <div style="height: 20px; line-height: 20px; font-size:8px;">&nbsp;</div>
                                                Если Вы больше не хотите получать e-mail рассылку, перейдите по этой
                                                <a href="#" target="_blank" style="color: #333333; font-family: \'Arial\', \'Tahoma\', sans-serif; font-size: 13px; font-weight: 400; line-height: 21px; text-decoration: underline;">ссылке</a>.
                                                <div style="height: 46px; line-height: 46px; font-size:8px;">&nbsp;</div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="width: 30px; max-width: 30px; min-width: 40px;">&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <!--[if (gte mso 9)|(IE)]>
                                </td>
                            </tr>
                        </table>
                    <![endif]-->
                </td>
            </tr>
        </table>
    </div>
</body>
</html>';
						
					 
					//echo mail($to, $subject, $message, $header);
 ?>