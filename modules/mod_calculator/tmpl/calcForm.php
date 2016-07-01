<div id="calc">
    <table class="calculator-tb">
        <tr>
            <td class="descr">Тип транспортного средства:</td>
            <td class="form-el">
                <select id="carType">
                    <option value="t1">Легковой автомобиль</option>
                    <option value="t2">Прицеп</option>
                    <option value="t3">Автобус</option>
                    <option value="t4">Грузовой автомобиль</option>
                    <option value="t5">Мотоцикл</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="descr">Город регистрации транспортного средства:</td>
            <td class="form-el">
                <select id="city">
                    <option value="z1">Киев</option>
                    <option value="z2">Борисполь</option>
                    <option value="z2">Боярка</option>
                    <option value="z2">Бровары</option>
                    <option value="z2">Васильков</option>
                    <option value="z2">Вышгород</option>
                    <option value="z2">Вишневое</option>
                    <option value="z2">Ирпень</option>
                    <option value="z2">Буча</option>
                    <option value="z2">Коцюбинское</option>
                    <option value="z2">Гребинки</option>
                    <option value="z3">Харьков</option>
                    <option value="z3">Одесса</option>
                    <option value="z4">Днепропетровск</option>
                    <option value="z4">Запорожье</option>
                    <option value="z4">Кривой Рог</option>
                    <option value="z4">Львов</option>
                    <option value="z4">Донецк</option>
                    <option value="z4">Винники</option>
                    <option value="z4">Горняк</option>
                    <option value="z4">Моспино</option>
                    <option value="z4">Новый Роздол</option>
                    <option value="z4">Селидово</option>
                    <option value="z4">Украинск</option>
                    <option value="z4">с. Подгорное, Днепропетровская область</option>
                    <option value="z5">Алчевск</option>
                    <option value="z5">Бердянск</option>
                    <option value="z5">Белая Церковь</option>
                    <option value="z5">Винница</option>
                    <option value="z5">Днепродзержинск</option>
                    <option value="z5">Горловка</option>
                    <option value="z5">Евпатория</option>
                    <option value="z5">Житомир</option>
                    <option value="z5">Ивано-Франковск</option>
                    <option value="z5">Каменец-Подольский</option>
                    <option value="z5">Керчь</option>
                    <option value="z5">Кировоград</option>
                    <option value="z5">Краматорск</option>
                    <option value="z5">Кременчуг</option>
                    <option value="z5">Лисичанск</option>
                    <option value="z5">Луганск</option>
                    <option value="z5">Луцк</option>
                    <option value="z5">Макеевка</option>
                    <option value="z5">Мариуполь</option>
                    <option value="z5">Мелитополь</option>
                    <option value="z5">Николаев</option>
                    <option value="z5">Никополь</option>
                    <option value="z5">Павлоград</option>
                    <option value="z5">Полтава</option>
                    <option value="z5">Ровно</option>
                    <option value="z5">Севастополь</option>
                    <option value="z5">Северодонецк</option>
                    <option value="z5">Симферополь</option>
                    <option value="z5">Славянск</option>
                    <option value="z5">Сумы</option>
                    <option value="z5">Тернополь</option>
                    <option value="z5">Ужгород</option>
                    <option value="z5">Херсон</option>
                    <option value="z5">Хмельницкий</option>
                    <option value="z5">Черкассы</option>
                    <option value="z5">Черновцы</option>
                    <option value="z5">Чернигов</option>
                    <option value="z6">Софиевская Борщаговка</option>
                    <option value="z6.5">Другие населенные пункты Украины</option>
                    <option value="z7">Другие страны</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="descr">Выберите категорию:</td>
            <td class="form-el">
                <select id="category">
                    <option value="b1">B1 — до 1600 куб. см включительно</option>
                    <option value="b2">B2 — 1601 - 2000 куб. см</option>
                    <option value="b3">B3 — 2001 - 3000 куб. см</option>
                    <option value="b4">B4 — больше 3000 куб. См</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="descr">Стаж вождения:</td>
            <td class="form-el">
                <select id="experience">
                    <option value="3less">до 3-х лет</option>
                    <option value="3more">больше 3-х лет</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="descr">Используется ли в такси:</td>
            <td class="form-el">
                <div class="radiogroup">
                    <span class="radio-button-span"><input type="radio" name="isTaxi" value="1"> Да</span>
                    <span class="radio-button-span"><input type="radio" name="isTaxi" value="0"> Нет</span>
                </div>
                <div class="calc-danger"><img src="./images/calculator/danger-tip.png" /></div>
            </td>
        </tr>
        <tr>
            <td class="descr">Год выпуска транспортного средства:</td>
            <td class="form-el">
                <select id="year">
                    <option></option>
                    <?php for($i = (int)date('Y'); $i >= 1990; $i--) : ?>
                        <option value="<?=$i;?>"><?=$i;?></option>
                    <?php endfor; ?>
                </select>
                <div class="calc-danger"><img src="./images/calculator/danger-tip.png" /></div>
            </td>
        </tr>
        <tr>
            <td class="descr">Беспрерывный стаж вождения без ДТП:</td>
            <td class="form-el">
                <select id="troubleFreeExperience">
                    <option></option>
                    <?php for($i = 1; $i <= 30; $i++) : ?>
                        <option value="<?=$i;?>"><?=$i;?></option>
                    <?php endfor; ?>
                </select>
                <div class="calc-danger"><img src="./images/calculator/danger-tip.png" /></div>
            </td>
        </tr>
        <tr>
            <td class="descr">Укажите период страхования (кол-во месяцев):</td>
            <td class="form-el">
                <select id="periodOfInsurance">
                    <option></option>
                    <option value="0.5">0.5</option>
                    <?php for($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?=$i;?>"><?=$i;?></option>
                    <?php endfor; ?>
                </select>
                <div class="calc-danger"><img src="./images/calculator/danger-tip.png" /></div>
            </td>
        </tr>
    </table>

    <button class="calculatePrice">РАССЧИТАТЬ ЦЕНУ</button>
</div>