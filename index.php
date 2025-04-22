<?php
    session_start();
    if (isset($_SESSION["user_role"])) {
        $rola = "user"; 
    } else {
        $rola = "notlogged";
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rap hobby page</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="code.js"></script>
</head>

    <h1>Rap page</h1>

    <nav>
        <a href="#zagraniczny-rap">Zagraniczny rap</a>
        <a href="#historia-rapu-lata-80">Historia rapu</a>
        <div class="dropdown">
            <button style="white-space: pre;" class="dropbtn">▼</button>
            <div class="dropdown-content">
                <a href="#historia-rapu-lata-80">Lata 80</a>
                <a href="#historia-rapu-lata-90">Lata 90</a>
            </div>
        </div>
        <a href="#polski-rap">Polski rap</a>
        <a href="#galeria-zdjec">Galeria zdjęć</a>
        <a href="#informacje_webapi">Informacje o artystach</a>
        <a href="hih-aboutme.html">O mnie</a>
        <a href="hih-contactpage.html">Ankieta</a>
        <?php
            include "loginandlogout.php";
        ?>
    </nav>

    <section id="zagraniczny-rap">
        <h2>Zagraniczny rap</h2>
        <div class="container">
            <div class="image">
                <img src="foto/kanye.bmp" alt="">
                <img src="foto/travis.bmp" alt="">
                <img src="foto/savage.bmp" alt="">
                <img src="foto/50.bmp" alt="">
            </div>
            <div class="text">
                Zagraniczny rap, szczególnie ten amerykański, stanowi zjawisko, które nieustannie ewoluuje, łącząc różne style i kultury. Jego wpływ rozciąga się na wszystkie aspekty życia, 
                od mody po sztukę, kształtując współczesne trendy. Artyści tacy jak Kanye West, Travis Scott czy 21 Savage ilustrują tę różnorodność, wnosząc swoje unikalne perspektywy. 
                Kanye łączy hip-hop z nowatorskimi pomysłami, Travis zaskakuje atmosferycznymi brzmieniami, a 21 Savage skupia się na autentyczności i surowych realiach życia. 
                W amerykańskim rapie często wykorzystuje się różnorodne instrumenty i techniki produkcji, od klasycznych sampli z soul i funk, przez syntezatory i automaty perkusyjne, 
                aż po nowoczesne efekty dźwiękowe. Ta różnorodność sprawia, że każdy utwór jest unikalny, co przyciąga słuchaczy i inspiruje nowych artystów do eksploracji różnych brzmień.
                <br>
                <br>
                <a class = "linkidomuzy" href="https://www.youtube.com/watch?v=YkwQbuAGLj4&ab_channel=KanyeWestVEVO" target="_blank">Poczuj brzmienie zagranicznego rapu</a>
            </div>
        </div>
    </section>

    <section id="historia-rapu-lata-80">
        <h2>Historia rapu - lata 80</h2>
        <div class="container">
            <div class="image">
                <img src="foto/gmflash.bmp" alt="">
                <img src="foto/rundmc.bmp" alt="">
                <img src="foto/llcoolj.bmp" alt="">
                <img src="foto/eazye.bmp" alt="">
            </div>
            <div class="text">
                Rok 1980 to czas, w którym rap zaczął zyskiwać na popularności i stawał się integralną częścią kultury hip-hopowej. Właśnie wtedy powstały pierwsze klasyki, które zdefiniowały 
                ten gatunek. Artyści tacy jak Grandmaster Flash, Run-D.M.C. czy Afrika Bambaataa wprowadzili innowacyjne techniki, łącząc rytmy funkowe z mówionymi tekstami. Grandmaster Flash 
                wprowadził technikę „scratchowania”, która zmieniła sposób, w jaki DJ-e korzystali z płyt winylowych. Run-D.M.C. przekształcili rap w mainstream, łącząc go z rockiem w utworze 
                „Walk This Way”, co przyczyniło się do szerszej akceptacji tego gatunku. Lata 80. to również czas, gdy rap stał się głosem społecznych problemów, często komentując rzeczywistość 
                miejskiego życia i nierówności społecznych, co przyciągało coraz większą rzeszę fanów.
                <br>
                <br>
                <a class = "linkidomuzy" href="https://www.youtube.com/watch?v=PobrSpMwKk4&ab_channel=SugarhillRecords" target="_blank">Poczuj brzmienie lat 80</a>
            </div>
        </div>
    </section>

    <section id="historia-rapu-lata-90">
        <h2>Historia rapu - lata 90</h2>
        <div class="container">
            <div class="image">
                <img src="foto/tupac.bmp" alt="">
                <img src="foto/biggie.bmp" alt="">
                <img src="foto/nas.bmp" alt="">
                <img src="foto/wutang.bmp" alt="">
            </div>
            <div class="text">
                Lata 90. to złoty wiek rapu, kiedy gatunek osiągnął szczyt popularności i stał się globalnym fenomenem. W tym okresie wyłoniły się ikony, takie jak Tupac Shakur, 
                The Notorious B.I.G. i Nas, które zdefiniowały brzmienie tej dekady. Tupac, znany z emocjonalnych tekstów i charyzmatycznego wystąpienia, stał się głosem pokolenia, 
                poruszając tematy walki, miłości i sprawiedliwości społecznej. Z kolei Biggie, z jego płynnością i opanowaniem, wprowadził narrację do rapu, tworząc opowieści o 
                życiu w Nowym Jorku. Nas z kolei zadebiutował albumem „Illmatic”, który uznawany jest za jeden z najlepszych rapowych krążków wszech czasów, łącząc refleksję 
                osobistą z szerszym kontekstem społecznym. Równocześnie, Wu-Tang Clan wprowadził do rapu unikalny styl i estetykę, łącząc wpływy kung-fu z surowymi, hipnotycznymi 
                bitami, co zrewolucjonizowało scenę hip-hopową. Ta dekada nie tylko umocniła rap jako sztukę, ale także ustaliła jego miejsce w mainstreamowej kulturze.
                <br>
                <br>
                <a class = "linkidomuzy" href="https://www.youtube.com/watch?v=3hOZaTGnHU4&ab_channel=NasVEVO" target="_blank">Poczuj brzmienie lat 90</a>
                <div id="extra-info"></div>
                <button class = "artistbutton" onclick="ciekawostkaklik()" id="ciekawostka" style="display:none;">Pokaż ciekawostkę</button>
                <noscript>
                    <p>JavaScript jest wyłączony w Twojej przeglądarce. Włącz go, aby korzystać z pełnej funkcjonalności strony.</p>
                </noscript>
                <script>
                    document.getElementById("ciekawostka").style.display = "block";
                </script>
            </div>
        </div>
    </section>

    <section id="polski-rap">
        <h2>Polski rap</h2>
        <div class="container">
            <div class="image">
                <img src="foto/pakto.bmp" alt="">
                <img src="foto/pezet.bmp" alt="">
                <img src="foto/bialas.bmp" alt="">
                <img src="foto/sentino.bmp" alt="">
            </div>
            <div class="text">
                Polski rap ma bogatą historię, która zaczyna się od pionierów, takich jak Paktofonika i Pezet, którzy w latach 90. i na początku 2000. 
                wprowadzili do sceny głębokie teksty i autentyczność. Ich wpływ wciąż jest odczuwalny, a kolejni artyści, jak Białas, przyczynili się 
                do rozwoju tego gatunku, łącząc rap z nowoczesnymi brzmieniami i miejskim stylem życia. Wraz z pojawieniem się nowych twórców, takich 
                jak Sentino, polski rap zyskał jeszcze większą różnorodność, eksplorując różne tematy i stylistyki, od emocjonalnych narracji po bardziej 
                komercyjne podejścia. Te wszystkie wątki pokazują, jak dynamiczna i ewoluująca jest scena hip-hopowa w Polsce, tworząc przestrzeń dla 
                zarówno uznanych artystów, jak i debiutantów. Dziś uważam że Polski "rap" bardziej przypomina disco polo.
                <br>
                <br>
                <a class = "linkidomuzy" href="https://www.youtube.com/watch?v=lq7dJ25Japs&ab_channel=StepRecords" target="_blank">Poczuj brzmienie polskiego rapu</a>
            </div>
        </div>
    </section>

    <section id="galeria-zdjec">
        <h2>Galeria zdjęć</h2>
        <div class="container-photo">
                <img src="foto/travis.bmp" alt="">
                <img src="foto/50.bmp" alt="">
                <img src="foto/savage.bmp" alt="">
                <img src="foto/kanye.bmp" alt="">
                <img src="foto/rundmc.bmp" alt="">
                <img src="foto/gmflash.bmp" alt="">
                <img src="foto/llcoolj.bmp" alt="">
                <img src="foto/eazye.bmp" alt="">
                <img src="foto/tupac.bmp" alt="">
                <img src="foto/biggie.bmp" alt="">
                <img src="foto/nas.bmp" alt="">
                <img src="foto/wutang.bmp" alt="">
                <img src="foto/pakto.bmp" alt="">
                <img src="foto/pezet.bmp" alt="">
                <img src="foto/bialas.bmp" alt="">
                <img src="foto/sentino.bmp" alt="">
                <?php
                    include "nowe_zdjecie.php";
                ?>
                <div class="textphp">
                    <p>Prześlij plik, aby dodać go do galerii.</p>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" class="artistbutton" name="zdjecie" required>
                    <input type="text" class="artistbutton" name="tresc_znaku" placeholder="Treść znaku wodnego" required>
                    <input type="text" class="artistbutton" name="tytul" placeholder="Tytuł">
                    <input type="text" class="artistbutton" name="autor" value="<?= htmlspecialchars($author, ENT_QUOTES, 'UTF-8') ?>">
                    <?php if (!empty($_SESSION['username'])): ?>
                        <br>
                        <input type="radio" id="public" name="publicprivate" value="public" required>
                        <label for="public">Publiczne</label>
                        <input type="radio" id="private" name="publicprivate" value="private" required>
                        <label for="private">Prywatne</label>
                    <?php endif; ?>
                    <input type="submit" class="artistbutton" value="Wyślij" style="margin-top: 10px;">
                </form>
                <a href="galeriaadmin.php" class="artistbutton" style="margin-top:5px">Przesłane zdjęcia</a>
        </div>
    </section>

    <section id="informacje_webapi" style="display:none;">
        <h2>Informacje o artystach</h2>
        <div class="container">
            <div class="text">
                W tym miejscu możesz wpisać imię dowolnego artysty, aby zobaczyć informacje o nim: 
                <br>
                <input type="text" id="artistName">
                <button class="artistbutton" onclick="infoapi()">Pobierz informacje</button>
                <div id="artistInfo"></div>
            </div>
        </div>
    </section>
    
    <noscript>
        <p>JavaScript jest wyłączony w Twojej przeglądarce. Włącz go, aby korzystać z pełnej funkcjonalności strony.</p>
    </noscript>

    <script>
        document.getElementById("informacje_webapi").style.display = "block";
    </script>

    <svg width=50% height="100">
        <rect x="50" y="20" rx="20" ry="20" width="500" height="70"
        style="fill:rgb(73, 73, 73);stroke:black;stroke-width:5;opacity:0.5" />
        <text fill="#ffffff" font-size="45" font-family="font-family: 'Anton', sans-serif;" x="65" y="70"> Wejdź w ankiete :] ▼</text>
    </svg>

    <footer>
        <a href="hih-aboutme.html">O mnie</a>
        <a href="hih-contactpage.html">Ankieta</a>
    </footer>
</body>
</html>