<?php
require('../database/connect.php');
include('../controllers/AddStudent.php');
include('../controllers/StudentLoginController.php');

if (!isset($_SESSION['student'])) {
    // not logged in
    $_SESSION["error"] = 'You must login first !';
    header('Location: login.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Titlebar Icon -->
    <link rel="icon" href="../img/icon.png" type="image/x-icon" />
    <!-- Css Files -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- JavaScript Files -->
    <script src="../js/script.js"></script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/753fbd11bf.js" crossorigin="anonymous"></script>

    <title>Course Request | UTS</title>
</head>

<body>
    <!-- Header Start -->
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
                <a href="/" class="brand"><i class="fab fa-accusoft"></i> University Tuition Service</a>
            </div>
            <div class="site-header__middle">
                <nav class="nav">
                    <div class="nav__toggle" aria-expanded="false" onclick="myFunction(this)">
                        <div class="bar1"></div>
                        <div class="bar2"></div>
                        <div class="bar3"></div>
                    </div>
                    <ul class="nav__wrapper">
                        <li class="nav__item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="nav__item"><a href="tuitions.php">Tuitions</a></li>
                        <li class="nav__item"><a href="profile.php">Profile</a></li>
                        <li class="nav__item"><a href="../contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="site-header__end">
                <a href="../controllers/StudentSignout.php">Sign out</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Header End -->
    <h2 class="text-center pt-3">Course Request</h2>
    <p class="text-center">Request courses for tuition</p>
    <br>
    <?php if (isset($_SESSION['status'])) {
        echo '
    <h6 class="alert-message-success">' . $_SESSION['status'] . '</h6>';
        unset($_SESSION['status']);
    }
    ?>
    <div class="tuitions-container">

        <div class="form-section"><br>
            <h4 class="text-center">Select A Course</h4>
            <form action="../controllers/RequestCourse.php" method="post">
                <select name="course_name">
                    <option value="" disabled selected>Select Course</option>
                    <option value="ACT201">ACT201</option>
                    <option value="ACT202">ACT202</option>
                    <option value="ACT310">ACT310</option>
                    <option value="ACT320">ACT320</option>
                    <option value="ACT360">ACT360</option>
                    <option value="ACT370">ACT370</option>
                    <option value="ACT380">ACT380</option>
                    <option value="ACT410">ACT410</option>
                    <option value="ACT430">ACT430</option>
                    <option value="ACT460">ACT460</option>
                    <option value="ANT101">ANT101</option>
                    <option value="ARC111">ARC111</option>
                    <option value="ARC112">ARC112</option>
                    <option value="ARC121">ARC121</option>
                    <option value="ARC122">ARC122</option>
                    <option value="ARC123">ARC123</option>
                    <option value="ARC131">ARC131</option>
                    <option value="ARC133">ARC133</option>
                    <option value="ARC200">ARC200</option>
                    <option value="ARC213">ARC213</option>
                    <option value="ARC214">ARC214</option>
                    <option value="ARC215">ARC215</option>
                    <option value="ARC241">ARC241</option>
                    <option value="ARC242">ARC242</option>
                    <option value="ARC251">ARC251</option>
                    <option value="ARC261">ARC261</option>
                    <option value="ARC262">ARC262</option>
                    <option value="ARC263">ARC263</option>
                    <option value="ARC264">ARC264</option>
                    <option value="ARC271">ARC271</option>
                    <option value="ARC272">ARC272</option>
                    <option value="ARC273">ARC273</option>
                    <option value="ARC281">ARC281</option>
                    <option value="ARC282">ARC282</option>
                    <option value="ARC283">ARC283</option>
                    <option value="ARC310">ARC310</option>
                    <option value="ARC316">ARC316</option>
                    <option value="ARC317">ARC317</option>
                    <option value="ARC318">ARC318</option>
                    <option value="ARC324">ARC324</option>
                    <option value="ARC334">ARC334</option>
                    <option value="ARC336">ARC336</option>
                    <option value="ARC343">ARC343</option>
                    <option value="ARC344">ARC344</option>
                    <option value="ARC384">ARC384</option>
                    <option value="ARC410">ARC410</option>
                    <option value="ARC418">ARC418</option>
                    <option value="ARC419">ARC419</option>
                    <option value="ARC437">ARC437</option>
                    <option value="ARC445">ARC445</option>
                    <option value="ARC453">ARC453</option>
                    <option value="ARC456">ARC456</option>
                    <option value="ARC474">ARC474</option>
                    <option value="ARC492">ARC492</option>
                    <option value="ARC500">ARC500</option>
                    <option value="ARC510">ARC510</option>
                    <option value="ARC519">ARC519</option>
                    <option value="ARC535">ARC535</option>
                    <option value="ARC576">ARC576</option>
                    <option value="ARC595">ARC595</option>
                    <option value="ARC596">ARC596</option>
                    <option value="ARC598">ARC598</option>
                    <option value="BBT202">BBT202</option>
                    <option value="BBT203">BBT203</option>
                    <option value="BBT221">BBT221</option>
                    <option value="BBT230">BBT230</option>
                    <option value="BBT312">BBT312</option>
                    <option value="BBT312L">BBT312L</option>
                    <option value="BBT314">BBT314</option>
                    <option value="BBT314L">BBT314L</option>
                    <option value="BBT315">BBT315</option>
                    <option value="BBT316">BBT316</option>
                    <option value="BBT316L">BBT316L</option>
                    <option value="BBT317">BBT317</option>
                    <option value="BBT318">BBT318</option>
                    <option value="BBT335">BBT335</option>
                    <option value="BBT405">BBT405</option>
                    <option value="BBT406">BBT406</option>
                    <option value="BBT408">BBT408</option>
                    <option value="BBT410">BBT410</option>
                    <option value="BBT413">BBT413</option>
                    <option value="BBT413L">BBT413L</option>
                    <option value="BBT416">BBT416</option>
                    <option value="BBT419">BBT419</option>
                    <option value="BBT422">BBT422</option>
                    <option value="BBT423">BBT423</option>
                    <option value="BBT424">BBT424</option>
                    <option value="BBT425">BBT425</option>
                    <option value="BBT499">BBT499</option>
                    <option value="BBT601">BBT601</option>
                    <option value="BBT608">BBT608</option>
                    <option value="BBT609">BBT609</option>
                    <option value="BBT615">BBT615</option>
                    <option value="BBT616">BBT616</option>
                    <option value="BBT622">BBT622</option>
                    <option value="BBT623">BBT623</option>
                    <option value="BBT638">BBT638</option>
                    <option value="BBT639">BBT639</option>
                    <option value="BBT645">BBT645</option>
                    <option value="BBT671">BBT671</option>
                    <option value="BBT685">BBT685</option>
                    <option value="BBT701">BBT701</option>
                    <option value="BBT702">BBT702</option>
                    <option value="BBT741">BBT741</option>
                    <option value="BBT745">BBT745</option>
                    <option value="BBT751">BBT751</option>
                    <option value="BEN205">BEN205</option>
                    <option value="BIO103">BIO103</option>
                    <option value="BIO103L">BIO103L</option>
                    <option value="BIO201">BIO201</option>
                    <option value="BIO201L">BIO201L</option>
                    <option value="BIO202">BIO202</option>
                    <option value="BIO202L">BIO202L</option>
                    <option value="BSC201">BSC201</option>
                    <option value="BUS112">BUS112</option>
                    <option value="BUS135">BUS135</option>
                    <option value="BUS172">BUS172</option>
                    <option value="BUS173">BUS173</option>
                    <option value="BUS251">BUS251</option>
                    <option value="BUS498">BUS498</option>
                    <option value="BUS500">BUS500</option>
                    <option value="BUS501">BUS501</option>
                    <option value="BUS505">BUS505</option>
                    <option value="BUS511">BUS511</option>
                    <option value="BUS516">BUS516</option>
                    <option value="BUS518">BUS518</option>
                    <option value="BUS520">BUS520</option>
                    <option value="BUS525">BUS525</option>
                    <option value="BUS530">BUS530</option>
                    <option value="BUS535">BUS535</option>
                    <option value="BUS601">BUS601</option>
                    <option value="BUS620">BUS620</option>
                    <option value="BUS635">BUS635</option>
                    <option value="BUS650">BUS650</option>
                    <option value="BUS685">BUS685</option>
                    <option value="BUS690">BUS690</option>
                    <option value="BUS698">BUS698</option>
                    <option value="BUS699">BUS699</option>
                    <option value="BUS700">BUS700</option>
                    <option value="CEE100">CEE100</option>
                    <option value="CEE110">CEE110</option>
                    <option value="CEE209">CEE209</option>
                    <option value="CEE210">CEE210</option>
                    <option value="CEE211">CEE211</option>
                    <option value="CEE212">CEE212</option>
                    <option value="CEE213">CEE213</option>
                    <option value="CEE214">CEE214</option>
                    <option value="CEE215">CEE215</option>
                    <option value="CEE240">CEE240</option>
                    <option value="CEE250">CEE250</option>
                    <option value="CEE260">CEE260</option>
                    <option value="CEE310">CEE310</option>
                    <option value="CEE330">CEE330</option>
                    <option value="CEE331">CEE331</option>
                    <option value="CEE335">CEE335</option>
                    <option value="CEE340">CEE340</option>
                    <option value="CEE350">CEE350</option>
                    <option value="CEE360">CEE360</option>
                    <option value="CEE370">CEE370</option>
                    <option value="CEE373">CEE373</option>
                    <option value="CEE410">CEE410</option>
                    <option value="CEE415">CEE415</option>
                    <option value="CEE430">CEE430</option>
                    <option value="CEE431">CEE431</option>
                    <option value="CEE433">CEE433</option>
                    <option value="CEE460">CEE460</option>
                    <option value="CEE467">CEE467</option>
                    <option value="CEE470">CEE470</option>
                    <option value="CEE473">CEE473</option>
                    <option value="CEE475">CEE475</option>
                    <option value="CEE492">CEE492</option>
                    <option value="CEE498">CEE498</option>
                    <option value="CEE499A">CEE499A</option>
                    <option value="CEE499B">CEE499B</option>
                    <option value="CEE499C">CEE499C</option>
                    <option value="CEG413">CEG413</option>
                    <option value="CHE101">CHE101</option>
                    <option value="CHE101L">CHE101L</option>
                    <option value="CHE120">CHE120</option>
                    <option value="CHE201">CHE201</option>
                    <option value="CHE202">CHE202</option>
                    <option value="CHE202L">CHE202L</option>
                    <option value="CHE203">CHE203</option>
                    <option value="CHE203L">CHE203L</option>
                    <option value="CHN101">CHN101</option>
                    <option value="CHN104">CHN104</option>
                    <option value="CHN201">CHN201</option>
                    <option value="CSE115">CSE115</option>
                    <option value="CSE115L">CSE115L</option>
                    <option value="CSE173">CSE173</option>
                    <option value="CSE215">CSE215</option>
                    <option value="CSE215L">CSE215L</option>
                    <option value="CSE225">CSE225</option>
                    <option value="CSE225L">CSE225L</option>
                    <option value="CSE231">CSE231</option>
                    <option value="CSE231L">CSE231L</option>
                    <option value="CSE257">CSE257</option>
                    <option value="CSE257L">CSE257L</option>
                    <option value="CSE273">CSE273</option>
                    <option value="CSE299">CSE299</option>
                    <option value="CSE311">CSE311</option>
                    <option value="CSE311L">CSE311L</option>
                    <option value="CSE323">CSE323</option>
                    <option value="CSE325">CSE325</option>
                    <option value="CSE326">CSE326</option>
                    <option value="CSE327">CSE327</option>
                    <option value="CSE331">CSE331</option>
                    <option value="CSE331L">CSE331L</option>
                    <option value="CSE332">CSE332</option>
                    <option value="CSE332L">CSE332L</option>
                    <option value="CSE338">CSE338</option>
                    <option value="CSE373">CSE373</option>
                    <option value="CSE411">CSE411</option>
                    <option value="CSE413">CSE413</option>
                    <option value="CSE413L">CSE413L</option>
                    <option value="CSE417">CSE417</option>
                    <option value="CSE417L">CSE417L</option>
                    <option value="CSE418">CSE418</option>
                    <option value="CSE419">CSE419</option>
                    <option value="CSE425">CSE425</option>
                    <option value="CSE426">CSE426</option>
                    <option value="CSE427">CSE427</option>
                    <option value="CSE434">CSE434</option>
                    <option value="CSE435">CSE435</option>
                    <option value="CSE435L">CSE435L</option>
                    <option value="CSE438">CSE438</option>
                    <option value="CSE438L">CSE438L</option>
                    <option value="CSE440">CSE440</option>
                    <option value="CSE445">CSE445</option>
                    <option value="CSE446">CSE446</option>
                    <option value="CSE448">CSE448</option>
                    <option value="CSE465">CSE465</option>
                    <option value="CSE467">CSE467</option>
                    <option value="CSE468">CSE468</option>
                    <option value="CSE473">CSE473</option>
                    <option value="CSE482">CSE482</option>
                    <option value="CSE482L">CSE482L</option>
                    <option value="CSE485">CSE485</option>
                    <option value="cse485L">cse485L</option>
                    <option value="CSE495">CSE495</option>
                    <option value="CSE497">CSE497</option>
                    <option value="CSE498R">CSE498R</option>
                    <option value="CSE499A">CSE499A</option>
                    <option value="CSE499B">CSE499B</option>
                    <option value="CSE512">CSE512</option>
                    <option value="CSE516">CSE516</option>
                    <option value="CSE532">CSE532</option>
                    <option value="CSE534">CSE534</option>
                    <option value="CSE545">CSE545</option>
                    <option value="CSE552">CSE552</option>
                    <option value="CSE583">CSE583</option>
                    <option value="CSE590">CSE590</option>
                    <option value="CSE597">CSE597</option>
                    <option value="DEV502">DEV502</option>
                    <option value="DEV563">DEV563</option>
                    <option value="DEV566">DEV566</option>
                    <option value="DEV577">DEV577</option>
                    <option value="DEV595">DEV595</option>
                    <option value="DEV596">DEV596</option>
                    <option value="ECO101">ECO101</option>
                    <option value="ECO103">ECO103</option>
                    <option value="ECO104">ECO104</option>
                    <option value="ECO134">ECO134</option>
                    <option value="ECO172">ECO172</option>
                    <option value="ECO173">ECO173</option>
                    <option value="ECO201">ECO201</option>
                    <option value="ECO203">ECO203</option>
                    <option value="ECO204">ECO204</option>
                    <option value="ECO244">ECO244</option>
                    <option value="ECO301">ECO301</option>
                    <option value="ECO303">ECO303</option>
                    <option value="ECO304">ECO304</option>
                    <option value="ECO328">ECO328</option>
                    <option value="ECO329">ECO329</option>
                    <option value="ECO341">ECO341</option>
                    <option value="ECO349">ECO349</option>
                    <option value="ECO354">ECO354</option>
                    <option value="ECO372">ECO372</option>
                    <option value="ECO430">ECO430</option>
                    <option value="ECO441">ECO441</option>
                    <option value="ECO465">ECO465</option>
                    <option value="ECO475">ECO475</option>
                    <option value="ECO490">ECO490</option>
                    <option value="ECO492">ECO492</option>
                    <option value="ECO495">ECO495</option>
                    <option value="ECO496">ECO496</option>
                    <option value="ECO499">ECO499</option>
                    <option value="ECO502">ECO502</option>
                    <option value="ECO504">ECO504</option>
                    <option value="ECO514">ECO514</option>
                    <option value="ECO621">ECO621</option>
                    <option value="ECO652">ECO652</option>
                    <option value="ECO682">ECO682</option>
                    <option value="ECO695">ECO695</option>
                    <option value="ECO699">ECO699</option>
                    <option value="EEE111">EEE111</option>
                    <option value="EEE111L">EEE111L</option>
                    <option value="EEE141">EEE141</option>
                    <option value="EEE141L">EEE141L</option>
                    <option value="EEE154">EEE154</option>
                    <option value="EEE211">EEE211</option>
                    <option value="EEE211L">EEE211L</option>
                    <option value="EEE221">EEE221</option>
                    <option value="EEE221L">EEE221L</option>
                    <option value="EEE232">EEE232</option>
                    <option value="EEE232L">EEE232L</option>
                    <option value="EEE241">EEE241</option>
                    <option value="EEE241L">EEE241L</option>
                    <option value="EEE254">EEE254</option>
                    <option value="EEE280">EEE280</option>
                    <option value="EEE299">EEE299</option>
                    <option value="EEE311">EEE311</option>
                    <option value="EEE311L">EEE311L</option>
                    <option value="EEE312">EEE312</option>
                    <option value="EEE312L">EEE312L</option>
                    <option value="EEE313">EEE313</option>
                    <option value="EEE321">EEE321</option>
                    <option value="EEE321L">EEE321L</option>
                    <option value="EEE331">EEE331</option>
                    <option value="EEE332">EEE332</option>
                    <option value="EEE332L">EEE332L</option>
                    <option value="EEE333">EEE333</option>
                    <option value="EEE336">EEE336</option>
                    <option value="EEE342">EEE342</option>
                    <option value="EEE342L">EEE342L</option>
                    <option value="EEE361">EEE361</option>
                    <option value="EEE362">EEE362</option>
                    <option value="EEE362L">EEE362L</option>
                    <option value="EEE363">EEE363</option>
                    <option value="EEE363L">EEE363L</option>
                    <option value="EEE400">EEE400</option>
                    <option value="EEE410">EEE410</option>
                    <option value="EEE411">EEE411</option>
                    <option value="EEE411L">EEE411L</option>
                    <option value="EEE413">EEE413</option>
                    <option value="EEE413L">EEE413L</option>
                    <option value="EEE422">EEE422</option>
                    <option value="EEE423">EEE423</option>
                    <option value="EEE424">EEE424</option>
                    <option value="EEE424L">EEE424L</option>
                    <option value="EEE426">EEE426</option>
                    <option value="EEE426L">EEE426L</option>
                    <option value="EEE452">EEE452</option>
                    <option value="EEE453">EEE453</option>
                    <option value="EEE462">EEE462</option>
                    <option value="EEE464">EEE464</option>
                    <option value="EEE465">EEE465</option>
                    <option value="EEE471">EEE471</option>
                    <option value="EEE471L">EEE471L</option>
                    <option value="EEE481">EEE481</option>
                    <option value="EEE482">EEE482</option>
                    <option value="EEE498R">EEE498R</option>
                    <option value="EEE499A">EEE499A</option>
                    <option value="EEE499B">EEE499B</option>
                    <option value="EEE534">EEE534</option>
                    <option value="EEE542">EEE542</option>
                    <option value="EEE546">EEE546</option>
                    <option value="EEE556">EEE556</option>
                    <option value="EEE560">EEE560</option>
                    <option value="EEE597">EEE597</option>
                    <option value="EEE600">EEE600</option>
                    <option value="EMB501">EMB501</option>
                    <option value="EMB502">EMB502</option>
                    <option value="EMB510">EMB510</option>
                    <option value="EMB520">EMB520</option>
                    <option value="EMB601">EMB601</option>
                    <option value="EMB602">EMB602</option>
                    <option value="EMB620">EMB620</option>
                    <option value="EMB650">EMB650</option>
                    <option value="EMB660">EMB660</option>
                    <option value="EMB670">EMB670</option>
                    <option value="EMB690">EMB690</option>
                    <option value="EMPH601">EMPH601</option>
                    <option value="EMPH602">EMPH602</option>
                    <option value="EMPH605">EMPH605</option>
                    <option value="EMPH611">EMPH611</option>
                    <option value="EMPH631">EMPH631</option>
                    <option value="EMPH642">EMPH642</option>
                    <option value="EMPH644">EMPH644</option>
                    <option value="EMPH653">EMPH653</option>
                    <option value="EMPH663">EMPH663</option>
                    <option value="EMPH671">EMPH671</option>
                    <option value="EMPH672">EMPH672</option>
                    <option value="EMPH678">EMPH678</option>
                    <option value="EMPH681">EMPH681</option>
                    <option value="EMPH704">EMPH704</option>
                    <option value="EMPH706">EMPH706</option>
                    <option value="EMPH711">EMPH711</option>
                    <option value="EMPH712">EMPH712</option>
                    <option value="EMPH734">EMPH734</option>
                    <option value="EMPH742">EMPH742</option>
                    <option value="EMPH771">EMPH771</option>
                    <option value="EMPH781">EMPH781</option>
                    <option value="EMPH782">EMPH782</option>
                    <option value="EMPH805">EMPH805</option>
                    <option value="EMPH806">EMPH806</option>
                    <option value="EMPH842">EMPH842</option>
                    <option value="ENG102">ENG102</option>
                    <option value="ENG103">ENG103</option>
                    <option value="ENG105">ENG105</option>
                    <option value="ENG111">ENG111</option>
                    <option value="ENG115">ENG115</option>
                    <option value="ENG119">ENG119</option>
                    <option value="ENG210">ENG210</option>
                    <option value="ENG216">ENG216</option>
                    <option value="ENG219">ENG219</option>
                    <option value="ENG220">ENG220</option>
                    <option value="ENG230">ENG230</option>
                    <option value="ENG260">ENG260</option>
                    <option value="ENG307">ENG307</option>
                    <option value="ENG311">ENG311</option>
                    <option value="ENG331">ENG331</option>
                    <option value="ENG334">ENG334</option>
                    <option value="ENG335">ENG335</option>
                    <option value="ENG336">ENG336</option>
                    <option value="ENG341">ENG341</option>
                    <option value="ENG381">ENG381</option>
                    <option value="ENG401">ENG401</option>
                    <option value="ENG410">ENG410</option>
                    <option value="ENG429">ENG429</option>
                    <option value="ENG431">ENG431</option>
                    <option value="ENG446">ENG446</option>
                    <option value="ENG457">ENG457</option>
                    <option value="ENG461">ENG461</option>
                    <option value="ENG466">ENG466</option>
                    <option value="ENG501">ENG501</option>
                    <option value="ENG517">ENG517</option>
                    <option value="ENG520">ENG520</option>
                    <option value="ENG521">ENG521</option>
                    <option value="ENG525">ENG525</option>
                    <option value="ENG551">ENG551</option>
                    <option value="ENG554">ENG554</option>
                    <option value="ENG574">ENG574</option>
                    <option value="ENG602">ENG602</option>
                    <option value="ENG603">ENG603</option>
                    <option value="ENG606">ENG606</option>
                    <option value="ENG611">ENG611</option>
                    <option value="ENG616">ENG616</option>
                    <option value="ENG618">ENG618</option>
                    <option value="ENG631">ENG631</option>
                    <option value="ENG637">ENG637</option>
                    <option value="ENV102">ENV102</option>
                    <option value="ENV107">ENV107</option>
                    <option value="ENV172">ENV172</option>
                    <option value="ENV203">ENV203</option>
                    <option value="ENV205">ENV205</option>
                    <option value="ENV207">ENV207</option>
                    <option value="ENV208">ENV208</option>
                    <option value="ENV209">ENV209</option>
                    <option value="ENV260">ENV260</option>
                    <option value="ENV373">ENV373</option>
                    <option value="ENV401">ENV401</option>
                    <option value="ENV409">ENV409</option>
                    <option value="ENV410">ENV410</option>
                    <option value="ENV414">ENV414</option>
                    <option value="ENV416">ENV416</option>
                    <option value="ENV425">ENV425</option>
                    <option value="ENV430">ENV430</option>
                    <option value="ENV436">ENV436</option>
                    <option value="ENV455">ENV455</option>
                    <option value="ENV498">ENV498</option>
                    <option value="ENV499">ENV499</option>
                    <option value="ENV501">ENV501</option>
                    <option value="ENV502">ENV502</option>
                    <option value="ENV602">ENV602</option>
                    <option value="ENV609">ENV609</option>
                    <option value="ENV624">ENV624</option>
                    <option value="ENV635">ENV635</option>
                    <option value="ENV652">ENV652</option>
                    <option value="ENV690">ENV690</option>
                    <option value="ENV697">ENV697</option>
                    <option value="ETE111">ETE111</option>
                    <option value="ETE111L">ETE111L</option>
                    <option value="ETE141">ETE141</option>
                    <option value="ETE141L">ETE141L</option>
                    <option value="ETE211">ETE211</option>
                    <option value="ETE211L">ETE211L</option>
                    <option value="ETE221">ETE221</option>
                    <option value="ETE221L">ETE221L</option>
                    <option value="ETE241">ETE241</option>
                    <option value="ETE241L">ETE241L</option>
                    <option value="ETE299">ETE299</option>
                    <option value="ETE311">ETE311</option>
                    <option value="ETE311L">ETE311L</option>
                    <option value="ETE312">ETE312</option>
                    <option value="ETE312L">ETE312L</option>
                    <option value="ETE321">ETE321</option>
                    <option value="ETE321L">ETE321L</option>
                    <option value="ETE331">ETE331</option>
                    <option value="ETE332">ETE332</option>
                    <option value="ETE332L">ETE332L</option>
                    <option value="ETE333">ETE333</option>
                    <option value="ETE334">ETE334</option>
                    <option value="ETE334L">ETE334L</option>
                    <option value="ETE335">ETE335</option>
                    <option value="ETE335L">ETE335L</option>
                    <option value="ETE361">ETE361</option>
                    <option value="ETE400">ETE400</option>
                    <option value="ETE411">ETE411</option>
                    <option value="ETE412">ETE412</option>
                    <option value="ETE412L">ETE412L</option>
                    <option value="ETE418">ETE418</option>
                    <option value="ETE419">ETE419</option>
                    <option value="ETE419L">ETE419L</option>
                    <option value="ETE422">ETE422</option>
                    <option value="ETE423">ETE423</option>
                    <option value="ETE424">ETE424</option>
                    <option value="ETE424L">ETE424L</option>
                    <option value="ETE426">ETE426</option>
                    <option value="ETE426L">ETE426L</option>
                    <option value="ETE443">ETE443</option>
                    <option value="ETE471">ETE471</option>
                    <option value="ETE471L">ETE471L</option>
                    <option value="ETE481">ETE481</option>
                    <option value="ETE482">ETE482</option>
                    <option value="ETE498R">ETE498R</option>
                    <option value="ETE499A">ETE499A</option>
                    <option value="ETE499B">ETE499B</option>
                    <option value="ETE503">ETE503</option>
                    <option value="ETE505">ETE505</option>
                    <option value="ETE597">ETE597</option>
                    <option value="ETH201">ETH201</option>
                    <option value="FIN254">FIN254</option>
                    <option value="FIN410">FIN410</option>
                    <option value="FIN433">FIN433</option>
                    <option value="FIN435">FIN435</option>
                    <option value="FIN440">FIN440</option>
                    <option value="FIN444">FIN444</option>
                    <option value="FIN455">FIN455</option>
                    <option value="FIN464">FIN464</option>
                    <option value="FIN470">FIN470</option>
                    <option value="FIN480">FIN480</option>
                    <option value="FIN635">FIN635</option>
                    <option value="FIN637">FIN637</option>
                    <option value="FIN639">FIN639</option>
                    <option value="FIN642">FIN642</option>
                    <option value="FIN643">FIN643</option>
                    <option value="FIN644">FIN644</option>
                    <option value="FIN645">FIN645</option>
                    <option value="GEO205">GEO205</option>
                    <option value="HIS101">HIS101</option>
                    <option value="HIS102">HIS102</option>
                    <option value="HIS103">HIS103</option>
                    <option value="HIS203">HIS203</option>
                    <option value="HIS205">HIS205</option>
                    <option value="HRM340">HRM340</option>
                    <option value="HRM360">HRM360</option>
                    <option value="HRM370">HRM370</option>
                    <option value="HRM380">HRM380</option>
                    <option value="HRM450">HRM450</option>
                    <option value="HRM460">HRM460</option>
                    <option value="HRM470">HRM470</option>
                    <option value="HRM602">HRM602</option>
                    <option value="HRM604">HRM604</option>
                    <option value="HRM605">HRM605</option>
                    <option value="HRM610">HRM610</option>
                    <option value="HRM631">HRM631</option>
                    <option value="HRM645">HRM645</option>
                    <option value="HRM660">HRM660</option>
                    <option value="INB350">INB350</option>
                    <option value="INB355">INB355</option>
                    <option value="INB372">INB372</option>
                    <option value="INB400">INB400</option>
                    <option value="INB410">INB410</option>
                    <option value="INB415">INB415</option>
                    <option value="INB450">INB450</option>
                    <option value="INB480">INB480</option>
                    <option value="INB490">INB490</option>
                    <option value="INB495">INB495</option>
                    <option value="LAW101">LAW101</option>
                    <option value="LAW103">LAW103</option>
                    <option value="LAW107">LAW107</option>
                    <option value="LAW200">LAW200</option>
                    <option value="LAW201">LAW201</option>
                    <option value="LAW205">LAW205</option>
                    <option value="LAW208">LAW208</option>
                    <option value="LAW209">LAW209</option>
                    <option value="LAW211">LAW211</option>
                    <option value="LAW213">LAW213</option>
                    <option value="LAW225">LAW225</option>
                    <option value="LAW301">LAW301</option>
                    <option value="LAW303">LAW303</option>
                    <option value="LAW305">LAW305</option>
                    <option value="LAW306">LAW306</option>
                    <option value="LAW310">LAW310</option>
                    <option value="LAW313">LAW313</option>
                    <option value="LAW314">LAW314</option>
                    <option value="LAW402">LAW402</option>
                    <option value="LAW403">LAW403</option>
                    <option value="LAW404">LAW404</option>
                    <option value="LAW405">LAW405</option>
                    <option value="LAW412">LAW412</option>
                    <option value="LAW413">LAW413</option>
                    <option value="LAW414">LAW414</option>
                    <option value="LAW415">LAW415</option>
                    <option value="LAW416">LAW416</option>
                    <option value="LAW417">LAW417</option>
                    <option value="LAW418">LAW418</option>
                    <option value="LAW419">LAW419</option>
                    <option value="LAW420">LAW420</option>
                    <option value="LAW421">LAW421</option>
                    <option value="LAW422">LAW422</option>
                    <option value="LAW423">LAW423</option>
                    <option value="LAW424">LAW424</option>
                    <option value="LAW426">LAW426</option>
                    <option value="LAW427">LAW427</option>
                    <option value="LBA104">LBA104</option>
                    <option value="LLM504">LLM504</option>
                    <option value="LLM508">LLM508</option>
                    <option value="LLM509">LLM509</option>
                    <option value="LLM512">LLM512</option>
                    <option value="LLM513">LLM513</option>
                    <option value="LLM517">LLM517</option>
                    <option value="MAT116">MAT116</option>
                    <option value="MAT120">MAT120</option>
                    <option value="MAT125">MAT125</option>
                    <option value="MAT130">MAT130</option>
                    <option value="MAT140">MAT140</option>
                    <option value="MAT240">MAT240</option>
                    <option value="MAT250">MAT250</option>
                    <option value="MAT260">MAT260</option>
                    <option value="MAT350">MAT350</option>
                    <option value="MAT361">MAT361</option>
                    <option value="MAT370">MAT370</option>
                    <option value="MGT212">MGT212</option>
                    <option value="MGT314">MGT314</option>
                    <option value="MGT321">MGT321</option>
                    <option value="MGT330">MGT330</option>
                    <option value="MGT351">MGT351</option>
                    <option value="MGT368">MGT368</option>
                    <option value="MGT410">MGT410</option>
                    <option value="MGT460">MGT460</option>
                    <option value="MGT489">MGT489</option>
                    <option value="MGT490">MGT490</option>
                    <option value="MGT607">MGT607</option>
                    <option value="MGT610">MGT610</option>
                    <option value="MGT670">MGT670</option>
                    <option value="MGT680">MGT680</option>
                    <option value="MGT682">MGT682</option>
                    <option value="MIC101">MIC101</option>
                    <option value="MIC101L">MIC101L</option>
                    <option value="MIC110">MIC110</option>
                    <option value="MIC110L">MIC110L</option>
                    <option value="MIC201">MIC201</option>
                    <option value="MIC202">MIC202</option>
                    <option value="MIC203">MIC203</option>
                    <option value="MIC206">MIC206</option>
                    <option value="MIC207">MIC207</option>
                    <option value="MIC307">MIC307</option>
                    <option value="MIC309">MIC309</option>
                    <option value="MIC311">MIC311</option>
                    <option value="MIC314">MIC314</option>
                    <option value="MIC315">MIC315</option>
                    <option value="MIC315L">MIC315L</option>
                    <option value="MIC316">MIC316</option>
                    <option value="MIC316L">MIC316L</option>
                    <option value="MIC317">MIC317</option>
                    <option value="MIC317L">MIC317L</option>
                    <option value="MIC318">MIC318</option>
                    <option value="MIC401">MIC401</option>
                    <option value="MIC404">MIC404</option>
                    <option value="MIC407">MIC407</option>
                    <option value="MIC412">MIC412</option>
                    <option value="MIC413">MIC413</option>
                    <option value="MIC413L">MIC413L</option>
                    <option value="MIC414">MIC414</option>
                    <option value="MIC414L">MIC414L</option>
                    <option value="MIC415">MIC415</option>
                    <option value="MIC415L">MIC415L</option>
                    <option value="MIC416">MIC416</option>
                    <option value="MIC417">MIC417</option>
                    <option value="MIC498">MIC498</option>
                    <option value="MIC499">MIC499</option>
                    <option value="MIS107">MIS107</option>
                    <option value="MIS207">MIS207</option>
                    <option value="MIS210">MIS210</option>
                    <option value="MIS212">MIS212</option>
                    <option value="MIS310">MIS310</option>
                    <option value="MIS320">MIS320</option>
                    <option value="MIS450">MIS450</option>
                    <option value="MIS460">MIS460</option>
                    <option value="MIS470">MIS470</option>
                    <option value="MIS665">MIS665</option>
                    <option value="MIS668">MIS668</option>
                    <option value="MKT202">MKT202</option>
                    <option value="MKT330">MKT330</option>
                    <option value="MKT337">MKT337</option>
                    <option value="MKT344">MKT344</option>
                    <option value="MKT355">MKT355</option>
                    <option value="MKT382">MKT382</option>
                    <option value="MKT412">MKT412</option>
                    <option value="MKT445">MKT445</option>
                    <option value="MKT450">MKT450</option>
                    <option value="MKT460">MKT460</option>
                    <option value="MKT465">MKT465</option>
                    <option value="MKT470">MKT470</option>
                    <option value="MKT475">MKT475</option>
                    <option value="MKT621">MKT621</option>
                    <option value="MKT623">MKT623</option>
                    <option value="MKT624">MKT624</option>
                    <option value="MKT625">MKT625</option>
                    <option value="MKT626">MKT626</option>
                    <option value="MKT627">MKT627</option>
                    <option value="MKT628">MKT628</option>
                    <option value="MKT631">MKT631</option>
                    <option value="MKT633">MKT633</option>
                    <option value="MKT634">MKT634</option>
                    <option value="PAD201">PAD201</option>
                    <option value="PBH101">PBH101</option>
                    <option value="PBH101L">PBH101L</option>
                    <option value="PBH602">PBH602</option>
                    <option value="PBH605">PBH605</option>
                    <option value="PBH609">PBH609</option>
                    <option value="PBH611">PBH611</option>
                    <option value="PBH631">PBH631</option>
                    <option value="PBH642">PBH642</option>
                    <option value="PBH643">PBH643</option>
                    <option value="PBH644">PBH644</option>
                    <option value="PBH653">PBH653</option>
                    <option value="PBH663">PBH663</option>
                    <option value="PBH671">PBH671</option>
                    <option value="PBH672">PBH672</option>
                    <option value="PBH678">PBH678</option>
                    <option value="PBH681">PBH681</option>
                    <option value="PBH701">PBH701</option>
                    <option value="PBH704">PBH704</option>
                    <option value="PBH705">PBH705</option>
                    <option value="PBH706">PBH706</option>
                    <option value="PBH711">PBH711</option>
                    <option value="PBH712">PBH712</option>
                    <option value="PBH713">PBH713</option>
                    <option value="PBH714">PBH714</option>
                    <option value="PBH716">PBH716</option>
                    <option value="PBH734">PBH734</option>
                    <option value="PBH742">PBH742</option>
                    <option value="PBH761">PBH761</option>
                    <option value="PBH771">PBH771</option>
                    <option value="PBH781">PBH781</option>
                    <option value="PBH782">PBH782</option>
                    <option value="PBH805">PBH805</option>
                    <option value="PBH806">PBH806</option>
                    <option value="PBH842">PBH842</option>
                    <option value="PHI101">PHI101</option>
                    <option value="PHI104">PHI104</option>
                    <option value="PHI401">PHI401</option>
                    <option value="PHR5001">PHR5001</option>
                    <option value="PHR5002">PHR5002</option>
                    <option value="PHR5003">PHR5003</option>
                    <option value="PHR5011">PHR5011</option>
                    <option value="PHR5012">PHR5012</option>
                    <option value="PHR5013">PHR5013</option>
                    <option value="PHR5015">PHR5015</option>
                    <option value="PHR5021">PHR5021</option>
                    <option value="PHR5022">PHR5022</option>
                    <option value="PHR5023">PHR5023</option>
                    <option value="PHR5101">PHR5101</option>
                    <option value="PHR5106">PHR5106</option>
                    <option value="PHR5107">PHR5107</option>
                    <option value="PHR5108">PHR5108</option>
                    <option value="PHR5110">PHR5110</option>
                    <option value="PHR5111">PHR5111</option>
                    <option value="PHR5112">PHR5112</option>
                    <option value="PHR5113">PHR5113</option>
                    <option value="PHR5201">PHR5201</option>
                    <option value="PHR5208">PHR5208</option>
                    <option value="PHR5209">PHR5209</option>
                    <option value="PHY107">PHY107</option>
                    <option value="PHY107L">PHY107L</option>
                    <option value="PHY108">PHY108</option>
                    <option value="PHY108L">PHY108L</option>
                    <option value="POL101">POL101</option>
                    <option value="POL104">POL104</option>
                    <option value="POL202">POL202</option>
                    <option value="PPG525">PPG525</option>
                    <option value="PPG530">PPG530</option>
                    <option value="PPG565">PPG565</option>
                    <option value="PSY101">PSY101</option>
                    <option value="PSY101L">PSY101L</option>
                    <option value="SCM310">SCM310</option>
                    <option value="SCM320">SCM320</option>
                    <option value="SCM450">SCM450</option>
                    <option value="SOC101">SOC101</option>
                    <option value="SOC201">SOC201</option>
                    <option value="TNM201">TNM201</option>
                    <option value="WMS201">WMS201</option>
                </select>
                <input type="hidden" name="student_name" value="<?php echo $_SESSION['student']['name'] ?>">
                <input type="hidden" name="student_email" value=<?php echo $_SESSION['student']['email'] ?>>
                <input type="hidden" name="student_phone" value=<?php echo $_SESSION['student']['phone'] ?>>
                <input type="hidden" name="student_id" value=<?php echo $_SESSION['student']['nsu_id'] ?>>

                <div style="text-align:center;">
                    <input type="submit" value="Submit" name="Add_btn" class="Add_btn">
                </div>
            </form>
        </div>
        <hr><br>
        <h3 class="text-center">Courses Requested by You</h3><br>
        <hr><br>
        <?php

        $sql = "SELECT * FROM course_requests WHERE student_id = {$_SESSION['student']['nsu_id']}";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

            while ($row = $result->fetch_assoc()) {
                echo '<div class="row">';

                echo '<a href="">';
                echo  '<div class="box mb-2">';
                echo '<h3 class="text-center pt-3 text-blue"><i class="fas fa-book"></i></h3>';
                echo '<p class="text-center text-red">' . $row['course_name'] . '</p>';
                echo '<p class="text-center text-blue small">' . $row['time'] . '</p><br>';
                echo '<form action="../controllers/DeleteRequest.php" method="post">';
                echo '<div style="text-align:center;">';
                echo '<input type="hidden" name="id" value= ' . $row['id'] . '>';
                echo '<input type="hidden" name="course_name" value= ' . $row['course_name'] . '>';
                echo '<input type="submit" value="Remove" name="DeleteCourse_btn" class="Delete_btn">';
                echo '</div>';

                echo '</form>';

                echo '</div>';
                echo '</a>';
                echo '</div>';
            }
        } else {

            echo '<h6 class="alert-message-danger text-center">No Courses Available</h6>';
        }
        ?>

    </div>



    <!-- Welcome Page Start -->

    <!-- Welcome Page End -->
    <div class="footer">
        <div class="row">
            <div class="column">
                <h4><i class="fab fa-accusoft"></i> University Tuition Service</h4>
                <p class="small">All right reserved ©</p>

            </div>
            <div class="column">
                <h4>Links</h4>
                <div class="small">
                    <ul>
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/header.js"></script>
</body>

</html>