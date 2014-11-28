#Landing Page Development template
Это шаблон (аналог html5boilerplate) для разработки лендингов для агенства "Кликобилие".
В ходе многих месяцев работы по разработке лендингов был наконец-то собран единый начальный шаблон для среднестатистического лендинга нашего агенства основанный на лучшие практики (best practices) и новейших технологиях фронтенд-разработки.
Под среднестатистическим лендингом я имею ввиду одностраничник, который имеет следующий функционал:
 - валидация полей ввода форм;
 - маска для поля телефона;
 - отправка заявок на электронную почту посредством smtp;
 - сохранение заявок в админке для заявок;
 - слайдер контента;
 - попап формы обратной связи;
 - таймер обратного отсчета;
 - лайтбокс галлерея изображений;
 - уведомление об устаревшем браузере;
 - ленивая подгрузка изображений;
 - произвольная гридовая система;
 - анимация запускаемая при скроллинге страницы.
##Необходимые знания технологий:
 - HTML5 - знание новых семантических тегов;
 - CSS3 - анимация и новые возможности;
 - SCSS - CSS подобный синтаксис препроцессора SASS;
 - Compass - библиотека/фреймворк для SCSS;
 - Susy - гридовый/сеточный фреймворк для Compass;
 - Animate.css - библиотека CSS3 анимаций;
 - Gulp - потоковый сборщик проектов;
 - npm - пакетный менеджер для node.js;
 - Browserify - определяет зависимости между JS-скриптами;
 - phpMailer - библиотека отправки писем;
 - Git - ну это само собой.

##Структура шаблона:
    |---.gitignore
    |---analytics_code.txt
    |---config.rb
    |---gulpfile.js
    |---package.json
    |---README.md
    |---build/
    |   |---.htaccess
    |   |---404.html
    |   |---favicon.ico
    |   |---humans.txt
    |   |---index.html
    |   |---robots.txt
    |   |---thanks.html
    |   |---admin/
    |   |---css/
    |   |---font/
    |   |---img/
    |   `---js/
    |---design/
    `---src/
        |---img/
        |---js/
        |   |---index.js
        |   |---initialize/
        |   `---plugins/
        `---scss/
            |---index.scss
            |---initialize/
            |---parts/
            |---plugins/
            `---settings/

##Рабочая среда
У вас на компьютере должны быть установлены:
 - node.js - http://nodejs.org/
 - npm - http://nodejs.org/
 - ruby - https://www.ruby-lang.org/en/installation/
 - gulp - в терминале: `npm install -g gulp` или `sudo npm install -g gulp`, если проблемы то заходим на сайт http://gulpjs.com/
 - sass - в терминале: `gem install sass` или `sudo gem install sass`, если проблемы то заходим на сайт http://sass-lang.com/install
 - compass - в терминале: `gem install compass --pre` или `sudo gem install compass --pre`, если проблемы то заходим на сайт http://compass-style.org/install/
 - susy - в терминале: `gem install susy` или `sudo gem install susy`, если проблемы то заходим на сайт http://susydocs.oddbird.net/en/latest/install/
 - browserify - в терминале: `npm -g install browserify` или `sudo npm -g install browserify`, если проблемы то заходим на сайт http://browserify.org/#install

##Быстрый старт
1. В терминале переходим в нужную директорию и пишем `git clone https://github.com/KanatSahanov/LPDevplate-v1.0.git`;
2. После завершения переименовываем склонированную папку LPDevplate-v1.0 на имя проекта;
3. Переходим внутрь проекта и набираем `npm install`;
4. После завершения набираем `compass init`;
5. После завершения набираем `compass install susy`;
6. *Все проект готов к использованию!*
