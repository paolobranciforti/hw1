<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>
    <?php 
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
        $userid = mysqli_real_escape_string($conn, $userid);
        $query = "SELECT * FROM users WHERE id = $userid";
        $res_1 = mysqli_query($conn, $query);
        $userinfo = mysqli_fetch_assoc($res_1);   
    ?>

    <head>
        <link rel='stylesheet' href='style/musicgp.css'>
        <script src='script/musicgp.js' defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>motoGP - musicgp</title>
    </head>

    <body>
        <div id="overlay" class="hidden">
        </div>
        <header>
            <nav>
                <div class="navbar">
                    <img class="logo-navbar" src='https://resources.motogp.pulselive.com/photo-resources/2023/11/25/de0e3773-1cba-4d33-9049-b41c4f109adb/logo_75_motogp.png?width=1440&height=810'>
                    <a href="home.php" class="navbar-element">HOME</a>
                    <a href="meteo.php" class="navbar-element">METEO</a>
                    <a href="campionato.php" class="navbar-element">CAMPIONATO</a>
                    <a href="musicgp.php" class="navbar-element">MUSICGP</a>
                    <div id="separator"></div>
                    <a class="navbar-element" href='profile.php'>PROFILO</a>
                    <div id="separator"></div>
                    <a class="navbar-element" href='logout.php' class='button'>LOGOUT</a>
                </div>
                <div id="menu">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </nav>
        </header>
            
        <div class="space-top"></div>
        <div class="space-top"></div>
    
        <a class="subtitle">
            Con musicGP puoi trovare tutta la musica per accompagnare il tuo Gran Prix
        </a>
        
        <section id="search">
            <form autocomplete="off">
                <div class="search">
                    <label for='search'>Cerca</label>
                    <input type='text' name="search" class="searchBar">
                    <input type="submit" value="Cerca">
                </div>
            </form>
        </section>

        <section class="container">
            <div id="results">
                
            </div>
        </section>
    
        <div class="logo-motogp">
            <img src="https://static.dorna.com/sso-front/img/motogp_logo.9c4d443.svg">
        </div>

        <div class="partnership">
            <div class="sponsor">
                <a href="https://www.redbull.com/"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/10/06/2986b76c-f1de-4c2e-a0f4-a6c33479f404/red-bull.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://www.tissotwatches.com/"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/03/27/9bbaab6c-6dd6-4029-849e-0a900ea311b4/TISSOT_logo.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://www.michelinmotorsport.com/en/motorsport/"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/03/27/6499fb7c-58c7-4e12-b107-98156ed85931/MICHELIN_logo.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://www.bmw-m.com/en/fastlane/motogp.html"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/10/25/f0612155-0f76-452f-9db8-348c37fdd01b/BMW-M_logo.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://estrellagalicia00.es/moto/moto-moto-gp/"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/04/17/8a22cccc-b9e4-4b80-8a78-da85a042adf2/EstrellaGalicia_Logo.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://www.dhl.com/global-en/home/about-us/partnerships.html"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/03/27/ef2af200-beec-45b5-bfac-0e9b453ad4ed/DHL_logo.png?width=100">
                </a>
            </div>
            <div class="sponsor">
                <a href="https://www.monsterenergy.com/"> 
                    <img src="https://resources.motogp.pulselive.com/photo-resources/2023/10/06/27a57bab-b5ee-40e5-a543-de63b377cf72/sponsor-monster.png?width=100">
                </a>
            </div>
        </div>

        <footer>
            <div class="footer-container">
                <div class="footer-section">
                    <div class="footer-title">
                        Media & Commercial
                    </div>
                    <a class="footer-element" href="https://www.motogp.com/it/sponsors"> Sponsor</a>
                    <a class="footer-element" href="https://www.motogp.com/it/broadcasters"> TV Broadcast</a>
                    <a class="footer-element" href="https://www.motogp.com/it/apps"> MotoGP Apps</a>
                </div>
                <div class="footer-section">
                    <div class="footer-title">
                        Richiedi assistenza
                    </div>
                    <a class="footer-element" href="https://www.motogp.com/it/contact"> Contattaci</a>
                    <a class="footer-element" href="https://www.motogp.com/it/help-center"> FAQ</a>
                </div>
                <div class="footer-section">
                    <div class="footer-title">
                        Biglietti & Hospitaly
                    </div>
                    <a class="footer-element" href="https://tickets.motogp.com/it/?utm_source=motogp.com&utm_medium=web_footer&utm_campaign=TS_home&_ga=2.185481324.471275157.1710756291-591683851.1710267709&_gac=1.229772014.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*ogmg8a*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> Biglietti</a>
                    <a class="footer-element" href="https://motogppremier.motogp.com/hospitality?utm_source=motogp.com&utm_medium=partner_referral&utm_campaign=motogp_web_hospitality_footer&_ga=2.185481324.471275157.1710756291-591683851.1710267709&_gac=1.229772014.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*ogmg8a*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> Hospitaly</a>
                    <a class="footer-element" href="https://motogppremier.motogp.com/motogp-premier?utm_source=motogp.com&utm_medium=partner_referral&utm_campaign=motogp_web_experiences_footer&_ga=2.185481324.471275157.1710756291-591683851.1710267709&_gac=1.229772014.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*ogmg8a*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> Experiences</a>
                </div>
                <div class="footer-section">
                    <div class="footer-title">
                        Game Hub
                    </div>
                    <a class="footer-element" href="https://fantasy.motogp.com/?utm_source=motogp.com&utm_medium=referral&utm_content=website&utm_campaign=footer&_ga=2.189610350.471275157.1710756291-591683851.1710267709&_gac=1.222563177.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*woy8fj*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> MotoGP Fantasy </a>
                    <a class="footer-element" href="https://predictor.motogp.com/?utm_source=motogp.com&utm_medium=referral&utm_content=website&utm_campaign=footer&_ga=2.189610350.471275157.1710756291-591683851.1710267709&_gac=1.222563177.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*woy8fj*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> MotoGP Predictor </a>
                    <a class="footer-element" href="https://esport.motogp.com/?utm_source=motogp.com&utm_medium=referral&utm_content=website&utm_campaign=footer&_ga=2.119362636.471275157.1710756291-591683851.1710267709&_gac=1.124338808.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1*1odoxfl*_ga*NTkxNjgzODUxLjE3MTAyNjc3MDk.*_ga_0204YNR4C1*MTcxMDc1NjI5MC45LjEuMTcxMDc1OTk1My41OC4wLjA"> MotoGP eSport </a>
                    <a class="footer-element" href="https://motogpguru.com/"> MotoGP Guru </a>
                    <a class="footer-element" href="https://motogpvideogame.com/"> MotoGP 23 </a>
                </div>
                <div class="footer-section">
                    <div class="footer-title">
                        Chi siamo
                    </div>
                    <a class="footer-element" href="https://www.dorna.com/?_ga=2.182866275.471275157.1710756291-591683851.1710267709&_gac=1.18500555.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE&_gl=1%2A1q6gs1b%2A_ga%2ANTkxNjgzODUxLjE3MTAyNjc3MDk.%2A_ga_0204YNR4C1%2AMTcxMDc1NjI5MC45LjEuMTcxMDc2MDM4Ni40NC4wLjA"> Dorna Sports </a>
                    <a class="footer-element" href="https://www.motogp.com/it/cookie-policy"> Informativa sui cookie </a>
                    <a class="footer-element" href="https://www.motogp.com/it/legal-notice"> Avviso legale </a>
                    <a class="footer-element" href="https://sso.dorna.com/it/privacy-policy?_gl=1%2azcl4mw%2a_ga%2aNTkxNjgzODUxLjE3MTAyNjc3MDk.%2a_ga_0204YNR4C1%2aMTcxMDc1NjI5MC45LjEuMTcxMDc2MDQ4NS4yNi4wLjA.&_ga=2.182866275.471275157.1710756291-591683851.1710267709&_gac=1.18500555.1710496241.CjwKCAjw48-vBhBbEiwAzqrZVCJzQ-rhMMtS0y55WvOebQbLcXE8PoTR4EaIYJUIhxp3ysFw2aDwphoCMjcQAvD_BwE"> Informativa sulla privacy </a>
                    <a class="footer-element" href="https://www.motogp.com/it/purchase-policy"> Condizioni di acquisto </a>
                </div>
            </div>

            <div class="social-container">
                <div class="social-element">
                    <a href="https://facebook.com/MotoGP">
                        <img src="https://cdn.icon-icons.com/icons2/791/PNG/512/FB_icon-icons.com_65484.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://instagram.com/motogp">
                        <img src="https://cdn.icon-icons.com/icons2/887/PNG/512/Instagram_New_icon-icons.com_69008.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://www.twitter.com/MotoGP">
                        <img src="https://cdn.icon-icons.com/icons2/4029/PNG/512/twitter_x_new_logo_square_x_icon_256075.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://www.tiktok.com/@motogp">
                        <img src="https://cdn.icon-icons.com/icons2/2428/PNG/512/tik_tok_black_logo_icon_147071.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://www.youtube.com/user/MotoGP">
                        <img src="https://cdn.icon-icons.com/icons2/791/PNG/512/YOUTUBE_icon-icons.com_65487.png"
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://www.linkedin.com/showcase/motogp/">
                        <img src="https://cdn.icon-icons.com/icons2/602/PNG/512/LinkedIn_icon-icons.com_55877.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://www.twitch.tv/motogp">
                        <img src="https://cdn.icon-icons.com/icons2/2248/PNG/512/twitch_icon_137066.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://open.spotify.com/show/3t0SHu3AYrWOZZl72P9Gjs">
                        <img src="https://cdn.icon-icons.com/icons2/2428/PNG/512/spotify_black_logo_icon_147079.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://whatsapp.com/channel/0029Va4R14Z1iUxYGtYvLg2M">
                        <img src="https://cdn.icon-icons.com/icons2/622/PNG/512/whatsapp-logo_icon-icons.com_57054.png">
                    </a>
                </div>
                <div class="social-element">
                    <a href="https://t.me/motogp">
                        <img src="https://cdn.icon-icons.com/icons2/2248/PNG/512/telegram_icon_136124.png">
                    </a>
                </div>
            </div>

            <div class="app-container">
                <div class="title">
                    <a>
                        Scarica l'app ufficiale MotoGP
                    </a>
                </div>
                <div class="app-element">
                    <a href="https://apps.apple.com/app/motogp/id1157573265?platform=iphone">
                        <img src="https://resources.motogp.pulselive.com/photo-resources/2023/04/04/034ae330-1e43-4826-837e-9ee825aae98f/app-store.svg?width=118">
                    </a>
                </div>
                <div class="app-element">
                    <a href="https://play.google.com/store/apps/details?id=com.dorna.officialmotogp">
                        <img src="https://resources.motogp.pulselive.com/photo-resources/2023/04/04/5dda2176-adfd-43e3-99a4-d0f79afada4e/play-store.svg?width=118">
                    </a>
                </div>
            </div>

            <div class="copyright">
                © 2024 Paolo Branciforti SRL. Tutti i diritti riservati. Tutti i marchi sono di proprietà dei rispettivi proprietari.
            </div>
            
        </footer>
    </body>
</html>

<?php mysqli_close($conn); ?>