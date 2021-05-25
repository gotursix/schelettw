<?php

use Core\FH;
use Core\Generators;

?>
<!doctype html>
<html lang="en">
<head>
    <title><?= $this->getSiteTitle(); ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= PROOT ?>css/custom.css">
    <link rel="stylesheet" href="<?= PROOT ?>css/nav-bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PROOT ?>fonts/Roboto.css">
    <!-- JS -->
    <?= $this->content('head'); ?>
    <script src="<?= PROOT ?>js/config.js" defer></script>
    <style type="text/css">td img {
            display: block;
        }</style>
    <script type="text/javascript">
        function MM_findObj(n, d) {
            let p, i, x;
            if (!d) d = document;
            if ((p = n.indexOf("?")) > 0 && parent.frames.length) {
                d = parent.frames[n.substring(p + 1)].document;
                n = n.substring(0, p);
            }
            if (!(x = d[n]) && d.all) x = d.all[n];
            for (i = 0; !x && i < d.forms.length; i++) x = d.forms[i][n];
            for (i = 0; !x && d.layers && i < d.layers.length; i++) x = MM_findObj(n, d.layers[i].document);
            if (!x && d.getElementById) x = d.getElementById(n);
            return x;
        }

        function MM_swapImage() {
            let i, j = 0, x, a = MM_swapImage.arguments;
            document.MM_sr = [];
            for (i = 0; i < (a.length - 2); i += 3)
                if ((x = MM_findObj(a[i])) != null) {
                    document.MM_sr[j++] = x;
                    if (!x.oSrc) x.oSrc = url + imgMapping + x.src;
                    x.src = url + imgMapping + a[i + 2];
                }
        }

        function MM_preloadImages() {
            const d = document;
            if (d.images) {
                if (!d.MM_p) d.MM_p = [];
                let i, j = d.MM_p.length, a = MM_preloadImages.arguments;
                for (i = 0; i < a.length; i++)
                    if (a[i].indexOf("#") !== 0) {
                        d.MM_p[j] = new Image;
                        d.MM_p[j++].src = url + imgMapping + a[i];
                    }
            }
        }
    </script>
<body
    onload="MM_preloadImages('good_r2_c2_f4.png','good_r4_c2_f4.png','good_r4_c4_f6.png','good_r5_c2_f4.png','good_r5_c3_f6.png','good_r5_c4_f8.png','good_r6_c4_f6.png','good_r9_c3_f4.png','good_r2_c2.png','good_r4_c2.png','good_r4_c4.png','good_r5_c2.png','good_r5_c3.png','good_r5_c4.png','good_r6_c4.png','good_r9_c3.png','good_r3_c6_f4.png','good_r4_c6_f4.png','good_r4_c7_f4.png','good_r5_c6_f6.png','good_r5_c7_f6.png','good_r5_c8_f4.png','good_r6_c6_f6.png','good_r7_c8_f4.png','good_r7_c9_f6.png','good_r7_c10_f4.png','good_r3_c6.png','good_r4_c6.png','good_r4_c7.png','good_r5_c6.png','good_r5_c7.png','good_r5_c8.png','good_r6_c6.png','good_r7_c8.png','good_r7_c9.png','good_r7_c10.png','good_r4_c4_f4.png','good_r4_c5_f4.png','good_r4_c6_f6.png','good_r5_c4_f6.png','good_r5_c5_f6.png','good_r5_c6_f8.png','good_r4_c5.png','good_r5_c5.png','good_r5_c3_f4.png','good_r5_c4_f4.png','good_r5_c5_f4.png','good_r5_c6_f4.png','good_r5_c7_f4.png','good_r6_c4_f4.png','good_r6_c5_f4.png','good_r6_c6_f4.png','good_r8_c6_f4.png','good_r6_c5.png','good_r8_c6.png','good_r7_c9_f4.png','good_r8_c9_f4.png','good_r8_c9.png');">

<div class="nav-wrapper">
    <div class="grad-bar"></div>
    <nav class="navbar">
        <div class="navbar-toggle" id="js-navbar-toggle">
            <i class="fa fa-bars fix-menu"></i>
        </div>
        <a href="<?= PROOT ?>">
            <img src="<?= PROOT ?>img/logo.png" class="logo" alt="Company Logo">
        </a>
        <?= Generators::generateMenu() ?>
    </nav>
</div>


<div class="container content center text-center"">
<?= $this->content('body'); ?>
<div>
    <table border="0" cellpadding="0" cellspacing="0" width="1366">
        <tr>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="139" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="454" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="25" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="29" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="80" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="28" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="77" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="128" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="182" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="94" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="130" height="1" border="0" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="1" border="0" alt=""/></td>
        </tr>

        <tr>
            <td colspan="11"><img name="good_r1_c1" src="<?= PROOT ?>img/map/good_r1_c1.png" width="1366" height="28"
                                  border="0"
                                  id="good_r1_c1" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="28" border="0" alt=""/></td>
        </tr>
        <tr>
            <td rowspan="10"><img name="good_r2_c1" src="<?= PROOT ?>img/map/good_r2_c1.png" width="139" height="692"
                                  border="0"
                                  id="good_r2_c1" alt=""/></td>
            <td rowspan="2" colspan="3"><img name="good_r2_c2" src="<?= PROOT ?>img/map/good_r2_c2.png" width="508"
                                             height="108"
                                             border="0" id="good_r2_c2" usemap="#m_good_r2_c2" alt=""/></td>
            <td colspan="7"><img name="good_r2_c5" src="<?= PROOT ?>img/map/good_r2_c5.png" width="719" height="62"
                                 border="0"
                                 id="good_r2_c5" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="62" border="0" alt=""/></td>
        </tr>
        <tr>
            <td><img name="good_r3_c5" src="<?= PROOT ?>img/map/good_r3_c5.png" width="80" height="46" border="0"
                     id="good_r3_c5"
                     alt=""/></td>
            <td colspan="5"><img name="good_r3_c6" src="<?= PROOT ?>img/map/good_r3_c6.png" width="509" height="46"
                                 border="0"
                                 id="good_r3_c6" usemap="#m_good_r3_c6" alt=""/></td>
            <td rowspan="9"><img name="good_r3_c11" src="<?= PROOT ?>img/map/good_r3_c11.png" width="130" height="630"
                                 border="0"
                                 id="good_r3_c11" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="46" border="0" alt=""/></td>
        </tr>
        <tr>
            <td colspan="2"><img name="good_r4_c2" src="<?= PROOT ?>img/map/good_r4_c2.png" width="479" height="191"
                                 border="0"
                                 id="good_r4_c2" usemap="#m_good_r4_c2" alt=""/></td>
            <td><img name="good_r4_c4" src="<?= PROOT ?>img/map/good_r4_c4.png" width="29" height="191" border="0"
                     id="good_r4_c4"
                     usemap="#m_good_r4_c4" alt=""/></td>
            <td><img name="good_r4_c5" src="<?= PROOT ?>img/map/good_r4_c5.png" width="80" height="191" border="0"
                     id="good_r4_c5"
                     usemap="#m_good_r4_c5" alt=""/></td>
            <td><img name="good_r4_c6" src="<?= PROOT ?>img/map/good_r4_c6.png" width="28" height="191" border="0"
                     id="good_r4_c6"
                     usemap="#m_good_r4_c6" alt=""/></td>
            <td colspan="4"><img name="good_r4_c7" src="<?= PROOT ?>img/map/good_r4_c7.png" width="481" height="191"
                                 border="0"
                                 id="good_r4_c7" usemap="#m_good_r4_c7" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="191" border="0" alt=""/></td>
        </tr>
        <tr>
            <td rowspan="6"><img name="good_r5_c2" src="<?= PROOT ?>img/map/good_r5_c2.png" width="454" height="368"
                                 border="0"
                                 id="good_r5_c2" usemap="#m_good_r5_c2" alt=""/></td>
            <td rowspan="4"><img name="good_r5_c3" src="<?= PROOT ?>img/map/good_r5_c3.png" width="25" height="280"
                                 border="0"
                                 id="good_r5_c3" usemap="#m_good_r5_c3" alt=""/></td>
            <td><img name="good_r5_c4" src="<?= PROOT ?>img/map/good_r5_c4.png" width="29" height="6" border="0"
                     id="good_r5_c4"
                     usemap="#m_good_r5_c4" alt=""/></td>
            <td><img name="good_r5_c5" src="<?= PROOT ?>img/map/good_r5_c5.png" width="80" height="6" border="0"
                     id="good_r5_c5"
                     usemap="#m_good_r5_c5" alt=""/></td>
            <td><img name="good_r5_c6" src="<?= PROOT ?>img/map/good_r5_c6.png" width="28" height="6" border="0"
                     id="good_r5_c6"
                     usemap="#m_good_r5_c6" alt=""/></td>
            <td rowspan="3"><img name="good_r5_c7" src="<?= PROOT ?>img/map/good_r5_c7.png" width="77" height="177"
                                 border="0"
                                 id="good_r5_c7" usemap="#m_good_r5_c7" alt=""/></td>
            <td rowspan="2" colspan="3"><img name="good_r5_c8" src="<?= PROOT ?>img/map/good_r5_c8.png" width="404"
                                             height="127"
                                             border="0" id="good_r5_c8" usemap="#m_good_r5_c8" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="6" border="0" alt=""/></td>
        </tr>
        <tr>
            <td rowspan="3"><img name="good_r6_c4" src="<?= PROOT ?>img/map/good_r6_c4.png" width="29" height="274"
                                 border="0"
                                 id="good_r6_c4" usemap="#m_good_r6_c4" alt=""/></td>
            <td rowspan="3"><img name="good_r6_c5" src="<?= PROOT ?>img/map/good_r6_c5.png" width="80" height="274"
                                 border="0"
                                 id="good_r6_c5" usemap="#m_good_r6_c5" alt=""/></td>
            <td rowspan="2"><img name="good_r6_c6" src="<?= PROOT ?>img/map/good_r6_c6.png" width="28" height="171"
                                 border="0"
                                 id="good_r6_c6" usemap="#m_good_r6_c6" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="121" border="0" alt=""/></td>
        </tr>
        <tr>
            <td><img name="good_r7_c8" src="<?= PROOT ?>img/map/good_r7_c8.png" width="128" height="50" border="0"
                     id="good_r7_c8"
                     usemap="#m_good_r7_c8" alt=""/></td>
            <td><img name="good_r7_c9" src="<?= PROOT ?>img/map/good_r7_c9.png" width="182" height="50" border="0"
                     id="good_r7_c9"
                     usemap="#m_good_r7_c9" alt=""/></td>
            <td><img name="good_r7_c10" src="<?= PROOT ?>img/map/good_r7_c10.png" width="94" height="50" border="0"
                     id="good_r7_c10"
                     usemap="#m_good_r7_c10" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="50" border="0" alt=""/></td>
        </tr>
        <tr>
            <td colspan="2"><img name="good_r8_c6" src="<?= PROOT ?>img/map/good_r8_c6.png" width="105" height="103"
                                 border="0"
                                 id="good_r8_c6" usemap="#m_good_r8_c6" alt=""/></td>
            <td rowspan="4"><img name="good_r8_c8" src="<?= PROOT ?>img/map/good_r8_c8.png" width="128" height="216"
                                 border="0"
                                 id="good_r8_c8" alt=""/></td>
            <td rowspan="2"><img name="good_r8_c9" src="<?= PROOT ?>img/map/good_r8_c9.png" width="182" height="143"
                                 border="0"
                                 id="good_r8_c9" usemap="#m_good_r8_c9" alt=""/></td>
            <td rowspan="4"><img name="good_r8_c10" src="<?= PROOT ?>img/map/good_r8_c10.png" width="94" height="216"
                                 border="0"
                                 id="good_r8_c10" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="103" border="0" alt=""/></td>
        </tr>
        <tr>
            <td rowspan="2" colspan="2"><img name="good_r9_c3" src="<?= PROOT ?>img/map/good_r9_c3.png" width="54"
                                             height="88"
                                             border="0" id="good_r9_c3" usemap="#m_good_r9_c3" alt=""/></td>
            <td rowspan="3" colspan="3"><img name="good_r9_c5" src="<?= PROOT ?>img/map/good_r9_c5.png" width="185"
                                             height="113"
                                             border="0" id="good_r9_c5" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="40" border="0" alt=""/></td>
        </tr>
        <tr>
            <td rowspan="2"><img name="good_r10_c9" src="<?= PROOT ?>img/map/good_r10_c9.png" width="182" height="73"
                                 border="0"
                                 id="good_r10_c9" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="48" border="0" alt=""/></td>
        </tr>
        <tr>
            <td colspan="3"><img name="good_r11_c2" src="<?= PROOT ?>img/map/good_r11_c2.png" width="508" height="25"
                                 border="0"
                                 id="good_r11_c2" alt=""/></td>
            <td><img src="<?= PROOT ?>img/map/spacer.gif" width="1" height="25" border="0" alt=""/></td>
        </tr>
    </table>


    <map name="m_good_r2_c2" id="m_good_r2_c2">
        <area shape="poly"
              coords="502,36,508,115,470,197,377,253,321,298,337,333,384,368,414,404,425,471,414,549,352,610,347,656,286,667,237,587,175,433,165,364,139,310,90,231,34,226,1,204,0,162,1,114,89,82,168,44,222,3,375,0,492,6"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r3_c6" id="m_good_r3_c6">
        <area shape="poly"
              coords="35,54,30,69,23,88,16,92,7,102,2,107,0,113,4,121,8,129,11,140,17,155,20,164,22,176,23,194,20,204,16,211,17,220,12,226,8,230,25,236,34,234,34,243,33,251,37,263,45,274,47,284,50,294,52,305,61,320,71,322,87,316,106,304,112,285,122,280,132,293,139,308,143,320,151,338,159,349,177,349,173,327,177,311,186,302,198,304,206,335,205,349,217,377,230,393,255,407,288,414,309,404,314,389,312,374,310,353,313,331,311,283,313,260,343,254,376,230,421,200,461,161,480,128,509,100,496,54,429,27,315,7,202,0,93,18,58,26"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r4_c2" id="m_good_r4_c2">
        <area shape="poly"
              coords="502,-72,508,7,470,89,377,145,321,190,337,225,384,260,414,296,425,363,414,441,352,502,347,548,286,559,237,479,175,325,165,256,139,202,90,123,34,118,1,96,0,54,1,6,89,-26,168,-64,222,-105,375,-108,492,-102"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r4_c4" id="m_good_r4_c4">
        <area shape="poly"
              coords="123,9,137,20,133,32,128,41,122,50,110,55,105,69,110,73,114,85,121,99,123,112,127,120,131,134,130,146,122,149,117,157,122,171,116,177,103,179,98,186,95,191,85,193,82,185,78,178,71,177,60,177,55,177,53,182,46,185,35,190,24,197,17,195,12,193,11,188,13,178,10,173,9,162,9,154,8,144,7,119,0,100,8,77,42,43,75,11,103,0"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
        <area shape="poly"
              coords="23,-72,29,7,-9,89,-102,145,-158,190,-142,225,-95,260,-65,296,-54,363,-65,441,-127,502,-132,548,-193,559,-242,479,-304,325,-314,256,-340,202,-389,123,-445,118,-478,96,-479,54,-478,6,-390,-26,-311,-64,-257,-105,-104,-108,13,-102"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r4_c5" id="m_good_r4_c5">
        <area shape="poly"
              coords="94,9,108,20,104,32,99,41,93,50,81,55,76,69,81,73,85,85,92,99,94,112,98,120,102,134,101,146,93,149,88,157,93,171,87,177,74,179,69,186,66,191,56,193,53,185,49,178,42,177,31,177,26,177,24,182,17,185,6,190,-5,197,-12,195,-17,193,-18,188,-16,178,-19,173,-20,162,-20,154,-21,144,-22,119,-29,100,-21,77,13,43,46,11,74,0"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
    </map>
    <map name="m_good_r4_c6" id="m_good_r4_c6">
        <area shape="poly"
              coords="35,8,30,23,23,42,16,46,7,56,2,61,0,67,4,75,8,83,11,94,17,109,20,118,22,130,23,148,20,158,16,165,17,174,12,180,8,184,25,190,34,188,34,197,33,205,37,217,45,228,47,238,50,248,52,259,61,274,71,276,87,270,106,258,112,239,122,234,132,247,139,262,143,274,151,292,159,303,177,303,173,281,177,265,186,256,198,258,206,289,205,303,217,331,230,347,255,361,288,368,309,358,314,343,312,328,310,307,313,285,311,237,313,214,343,208,376,184,421,154,461,115,480,82,509,54,496,8,429,-19,315,-39,202,-46,93,-28,58,-20"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
        <area shape="poly"
              coords="14,9,28,20,24,32,19,41,13,50,1,55,-4,69,1,73,5,85,12,99,14,112,18,120,22,134,21,146,13,149,8,157,13,171,7,177,-6,179,-11,186,-14,191,-24,193,-27,185,-31,178,-38,177,-49,177,-54,177,-56,182,-63,185,-74,190,-85,197,-92,195,-97,193,-98,188,-96,178,-99,173,-100,162,-100,154,-101,144,-102,119,-109,100,-101,77,-67,43,-34,11,-6,0"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
    </map>
    <map name="m_good_r4_c7" id="m_good_r4_c7">
        <area shape="poly"
              coords="7,8,2,23,-5,42,-12,46,-21,56,-26,61,-28,67,-24,75,-20,83,-17,94,-11,109,-8,118,-6,130,-5,148,-8,158,-12,165,-11,174,-16,180,-20,184,-3,190,6,188,6,197,5,205,9,217,17,228,19,238,22,248,24,259,33,274,43,276,59,270,78,258,84,239,94,234,104,247,111,262,115,274,123,292,131,303,149,303,145,281,149,265,158,256,170,258,178,289,177,303,189,331,202,347,227,361,260,368,281,358,286,343,284,328,282,307,285,285,283,237,285,214,315,208,348,184,393,154,433,115,452,82,481,54,468,8,401,-19,287,-39,174,-46,65,-28,30,-20"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r5_c2" id="m_good_r5_c2">
        <area shape="poly"
              coords="502,-263,508,-184,470,-102,377,-46,321,-1,337,34,384,69,414,105,425,172,414,250,352,311,347,357,286,368,237,288,175,134,165,65,139,11,90,-68,34,-73,1,-95,0,-137,1,-185,89,-217,168,-255,222,-296,375,-299,492,-293"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r5_c3" id="m_good_r5_c3">
        <area shape="poly"
              coords="171,272,131,280,103,271,86,241,75,199,74,168,76,144,48,130,22,121,5,102,3,66,0,42,10,36,31,11,32,2,42,7,49,7,57,6,68,0,78,0,90,0,98,0,107,0,108,3,116,10,122,1,131,4,140,6,147,9,154,10,164,11,167,20,170,32,173,41,179,51,183,63,186,75,191,83,198,87,209,87,220,89,227,101,239,131,228,178,217,211,204,237"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="48,-263,54,-184,16,-102,-77,-46,-133,-1,-117,34,-70,69,-40,105,-29,172,-40,250,-102,311,-107,357,-168,368,-217,288,-279,134,-289,65,-315,11,-364,-68,-420,-73,-453,-95,-454,-137,-453,-185,-365,-217,-286,-255,-232,-296,-79,-299,38,-293"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r5_c4" id="m_good_r5_c4">
        <area shape="poly"
              coords="146,272,106,280,78,271,61,241,50,199,49,168,51,144,23,130,-3,121,-20,102,-22,66,-25,42,-15,36,6,11,7,2,17,7,24,7,32,6,43,0,53,0,65,0,73,0,82,0,83,3,91,10,97,1,106,4,115,6,122,9,129,10,139,11,142,20,145,32,148,41,154,51,158,63,161,75,166,83,173,87,184,87,195,89,202,101,214,131,203,178,192,211,179,237"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="123,-182,137,-171,133,-159,128,-150,122,-141,110,-136,105,-122,110,-118,114,-106,121,-92,123,-79,127,-71,131,-57,130,-45,122,-42,117,-34,122,-20,116,-14,103,-12,98,-5,95,0,85,2,82,-6,78,-13,71,-14,60,-14,55,-14,53,-9,46,-6,35,-1,24,6,17,4,12,2,11,-3,13,-13,10,-18,9,-29,9,-37,8,-47,7,-72,0,-91,8,-114,42,-148,75,-180,103,-191"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
        <area shape="poly"
              coords="23,-263,29,-184,-9,-102,-102,-46,-158,-1,-142,34,-95,69,-65,105,-54,172,-65,250,-127,311,-132,357,-193,368,-242,288,-304,134,-314,65,-340,11,-389,-68,-445,-73,-478,-95,-479,-137,-478,-185,-390,-217,-311,-255,-257,-296,-104,-299,13,-293"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r5_c5" id="m_good_r5_c5">
        <area shape="poly"
              coords="117,272,77,280,49,271,32,241,21,199,20,168,22,144,-6,130,-32,121,-49,102,-51,66,-54,42,-44,36,-23,11,-22,2,-12,7,-5,7,3,6,14,0,24,0,36,0,44,0,53,0,54,3,62,10,68,1,77,4,86,6,93,9,100,10,110,11,113,20,116,32,119,41,125,51,129,63,132,75,137,83,144,87,155,87,166,89,173,101,185,131,174,178,163,211,150,237"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="94,-182,108,-171,104,-159,99,-150,93,-141,81,-136,76,-122,81,-118,85,-106,92,-92,94,-79,98,-71,102,-57,101,-45,93,-42,88,-34,93,-20,87,-14,74,-12,69,-5,66,0,56,2,53,-6,49,-13,42,-14,31,-14,26,-14,24,-9,17,-6,6,-1,-5,6,-12,4,-17,2,-18,-3,-16,-13,-19,-18,-20,-29,-20,-37,-21,-47,-22,-72,-29,-91,-21,-114,13,-148,46,-180,74,-191"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
    </map>
    <map name="m_good_r5_c6" id="m_good_r5_c6">
        <area shape="poly"
              coords="37,272,-3,280,-31,271,-48,241,-59,199,-60,168,-58,144,-86,130,-112,121,-129,102,-131,66,-134,42,-124,36,-103,11,-102,2,-92,7,-85,7,-77,6,-66,0,-56,0,-44,0,-36,0,-27,0,-26,3,-18,10,-12,1,-3,4,6,6,13,9,20,10,30,11,33,20,36,32,39,41,45,51,49,63,52,75,57,83,64,87,75,87,86,89,93,101,105,131,94,178,83,211,70,237"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="35,-183,30,-168,23,-149,16,-145,7,-135,2,-130,0,-124,4,-116,8,-108,11,-97,17,-82,20,-73,22,-61,23,-43,20,-33,16,-26,17,-17,12,-11,8,-7,25,-1,34,-3,34,6,33,14,37,26,45,37,47,47,50,57,52,68,61,83,71,85,87,79,106,67,112,48,122,43,132,56,139,71,143,83,151,101,159,112,177,112,173,90,177,74,186,65,198,67,206,98,205,112,217,140,230,156,255,170,288,177,309,167,314,152,312,137,310,116,313,94,311,46,313,23,343,17,376,-7,421,-37,461,-76,480,-109,509,-137,496,-183,429,-210,315,-230,202,-237,93,-219,58,-211"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
        <area shape="poly"
              coords="14,-182,28,-171,24,-159,19,-150,13,-141,1,-136,-4,-122,1,-118,5,-106,12,-92,14,-79,18,-71,22,-57,21,-45,13,-42,8,-34,13,-20,7,-14,-6,-12,-11,-5,-14,0,-24,2,-27,-6,-31,-13,-38,-14,-49,-14,-54,-14,-56,-9,-63,-6,-74,-1,-85,6,-92,4,-97,2,-98,-3,-96,-13,-99,-18,-100,-29,-100,-37,-101,-47,-102,-72,-109,-91,-101,-114,-67,-148,-34,-180,-6,-191"
              href="<?= PROOT ?>game/story/europe" alt=""
              onmouseout="MM_swapImage('good_r4_c4','','good_r4_c4.png','good_r4_c5','','good_r4_c5.png','good_r4_c6','','good_r4_c6.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png',1);"
              onmouseover="MM_swapImage('good_r4_c4','','good_r4_c4_f4.png','good_r4_c5','','good_r4_c5_f4.png','good_r4_c6','','good_r4_c6_f6.png','good_r5_c4','','good_r5_c4_f6.png','good_r5_c5','','good_r5_c5_f6.png','good_r5_c6','','good_r5_c6_f8.png',1);"/>
    </map>
    <map name="m_good_r5_c7" id="m_good_r5_c7">
        <area shape="poly"
              coords="9,272,-31,280,-59,271,-76,241,-87,199,-88,168,-86,144,-114,130,-140,121,-157,102,-159,66,-162,42,-152,36,-131,11,-130,2,-120,7,-113,7,-105,6,-94,0,-84,0,-72,0,-64,0,-55,0,-54,3,-46,10,-40,1,-31,4,-22,6,-15,9,-8,10,2,11,5,20,8,32,11,41,17,51,21,63,24,75,29,83,36,87,47,87,58,89,65,101,77,131,66,178,55,211,42,237"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="7,-183,2,-168,-5,-149,-12,-145,-21,-135,-26,-130,-28,-124,-24,-116,-20,-108,-17,-97,-11,-82,-8,-73,-6,-61,-5,-43,-8,-33,-12,-26,-11,-17,-16,-11,-20,-7,-3,-1,6,-3,6,6,5,14,9,26,17,37,19,47,22,57,24,68,33,83,43,85,59,79,78,67,84,48,94,43,104,56,111,71,115,83,123,101,131,112,149,112,145,90,149,74,158,65,170,67,178,98,177,112,189,140,202,156,227,170,260,177,281,167,286,152,284,137,282,116,285,94,283,46,285,23,315,17,348,-7,393,-37,433,-76,452,-109,481,-137,468,-183,401,-210,287,-230,174,-237,65,-219,30,-211"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r5_c8" id="m_good_r5_c8">
        <area shape="poly"
              coords="-70,-183,-75,-168,-82,-149,-89,-145,-98,-135,-103,-130,-105,-124,-101,-116,-97,-108,-94,-97,-88,-82,-85,-73,-83,-61,-82,-43,-85,-33,-89,-26,-88,-17,-93,-11,-97,-7,-80,-1,-71,-3,-71,6,-72,14,-68,26,-60,37,-58,47,-55,57,-53,68,-44,83,-34,85,-18,79,1,67,7,48,17,43,27,56,34,71,38,83,46,101,54,112,72,112,68,90,72,74,81,65,93,67,101,98,100,112,112,140,125,156,150,170,183,177,204,167,209,152,207,137,205,116,208,94,206,46,208,23,238,17,271,-7,316,-37,356,-76,375,-109,404,-137,391,-183,324,-210,210,-230,97,-237,-12,-219,-47,-211"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r6_c4" id="m_good_r6_c4">
        <area shape="poly"
              coords="146,266,106,274,78,265,61,235,50,193,49,162,51,138,23,124,-3,115,-20,96,-22,60,-25,36,-15,30,6,5,7,-4,17,1,24,1,32,0,43,-6,53,-6,65,-6,73,-6,82,-6,83,-3,91,4,97,-5,106,-2,115,0,122,3,129,4,139,5,142,14,145,26,148,35,154,45,158,57,161,69,166,77,173,81,184,81,195,83,202,95,214,125,203,172,192,205,179,231"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="23,-269,29,-190,-9,-108,-102,-52,-158,-7,-142,28,-95,63,-65,99,-54,166,-65,244,-127,305,-132,351,-193,362,-242,282,-304,128,-314,59,-340,5,-389,-74,-445,-79,-478,-101,-479,-143,-478,-191,-390,-223,-311,-261,-257,-302,-104,-305,13,-299"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
    <map name="m_good_r6_c5" id="m_good_r6_c5">
        <area shape="poly"
              coords="117,266,77,274,49,265,32,235,21,193,20,162,22,138,-6,124,-32,115,-49,96,-51,60,-54,36,-44,30,-23,5,-22,-4,-12,1,-5,1,3,0,14,-6,24,-6,36,-6,44,-6,53,-6,54,-3,62,4,68,-5,77,-2,86,0,93,3,100,4,110,5,113,14,116,26,119,35,125,45,129,57,132,69,137,77,144,81,155,81,166,83,173,95,185,125,174,172,163,205,150,231"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
    </map>
    <map name="m_good_r6_c6" id="m_good_r6_c6">
        <area shape="poly"
              coords="37,266,-3,274,-31,265,-48,235,-59,193,-60,162,-58,138,-86,124,-112,115,-129,96,-131,60,-134,36,-124,30,-103,5,-102,-4,-92,1,-85,1,-77,0,-66,-6,-56,-6,-44,-6,-36,-6,-27,-6,-26,-3,-18,4,-12,-5,-3,-2,6,0,13,3,20,4,30,5,33,14,36,26,39,35,45,45,49,57,52,69,57,77,64,81,75,81,86,83,93,95,105,125,94,172,83,205,70,231"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
        <area shape="poly"
              coords="35,-189,30,-174,23,-155,16,-151,7,-141,2,-136,0,-130,4,-122,8,-114,11,-103,17,-88,20,-79,22,-67,23,-49,20,-39,16,-32,17,-23,12,-17,8,-13,25,-7,34,-9,34,0,33,8,37,20,45,31,47,41,50,51,52,62,61,77,71,79,87,73,106,61,112,42,122,37,132,50,139,65,143,77,151,95,159,106,177,106,173,84,177,68,186,59,198,61,206,92,205,106,217,134,230,150,255,164,288,171,309,161,314,146,312,131,310,110,313,88,311,40,313,17,343,11,376,-13,421,-43,461,-82,480,-115,509,-143,496,-189,429,-216,315,-236,202,-243,93,-225,58,-217"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r7_c8" id="m_good_r7_c8">
        <area shape="poly"
              coords="-70,-310,-75,-295,-82,-276,-89,-272,-98,-262,-103,-257,-105,-251,-101,-243,-97,-235,-94,-224,-88,-209,-85,-200,-83,-188,-82,-170,-85,-160,-89,-153,-88,-144,-93,-138,-97,-134,-80,-128,-71,-130,-71,-121,-72,-113,-68,-101,-60,-90,-58,-80,-55,-70,-53,-59,-44,-44,-34,-42,-18,-48,1,-60,7,-79,17,-84,27,-71,34,-56,38,-44,46,-26,54,-15,72,-15,68,-37,72,-53,81,-62,93,-60,101,-29,100,-15,112,13,125,29,150,43,183,50,204,40,209,25,207,10,205,-11,208,-33,206,-81,208,-104,238,-110,271,-134,316,-164,356,-203,375,-236,404,-264,391,-310,324,-337,210,-357,97,-364,-12,-346,-47,-338"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r7_c9" id="m_good_r7_c9">
        <area shape="poly"
              coords="155,193,139,192,107,184,53,167,37,147,24,115,21,78,0,61,3,47,35,54,64,56,75,47,88,34,84,15,82,0,118,5,149,7,171,22,182,117,176,140"
              href="<?= PROOT ?>game/story/australia" alt=""
              onmouseout="MM_swapImage('good_r7_c9','','good_r7_c9.png','good_r8_c9','','good_r8_c9.png',1);"
              onmouseover="MM_swapImage('good_r7_c9','','good_r7_c9_f4.png','good_r8_c9','','good_r8_c9_f4.png',1);"/>
        <area shape="poly"
              coords="-198,-310,-203,-295,-210,-276,-217,-272,-226,-262,-231,-257,-233,-251,-229,-243,-225,-235,-222,-224,-216,-209,-213,-200,-211,-188,-210,-170,-213,-160,-217,-153,-216,-144,-221,-138,-225,-134,-208,-128,-199,-130,-199,-121,-200,-113,-196,-101,-188,-90,-186,-80,-183,-70,-181,-59,-172,-44,-162,-42,-146,-48,-127,-60,-121,-79,-111,-84,-101,-71,-94,-56,-90,-44,-82,-26,-74,-15,-56,-15,-60,-37,-56,-53,-47,-62,-35,-60,-27,-29,-28,-15,-16,13,-3,29,22,43,55,50,76,40,81,25,79,10,77,-11,80,-33,78,-81,80,-104,110,-110,143,-134,188,-164,228,-203,247,-236,276,-264,263,-310,196,-337,82,-357,-31,-364,-140,-346,-175,-338"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r7_c10" id="m_good_r7_c10">
        <area shape="poly"
              coords="-380,-310,-385,-295,-392,-276,-399,-272,-408,-262,-413,-257,-415,-251,-411,-243,-407,-235,-404,-224,-398,-209,-395,-200,-393,-188,-392,-170,-395,-160,-399,-153,-398,-144,-403,-138,-407,-134,-390,-128,-381,-130,-381,-121,-382,-113,-378,-101,-370,-90,-368,-80,-365,-70,-363,-59,-354,-44,-344,-42,-328,-48,-309,-60,-303,-79,-293,-84,-283,-71,-276,-56,-272,-44,-264,-26,-256,-15,-238,-15,-242,-37,-238,-53,-229,-62,-217,-60,-209,-29,-210,-15,-198,13,-185,29,-160,43,-127,50,-106,40,-101,25,-103,10,-105,-11,-102,-33,-104,-81,-102,-104,-72,-110,-39,-134,6,-164,46,-203,65,-236,94,-264,81,-310,14,-337,-100,-357,-213,-364,-322,-346,-357,-338"
              href="<?= PROOT ?>game/story/asia" alt=""
              onmouseout="MM_swapImage('good_r3_c6','','good_r3_c6.png','good_r4_c6','','good_r4_c6.png','good_r4_c7','','good_r4_c7.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r5_c8','','good_r5_c8.png','good_r6_c6','','good_r6_c6.png','good_r7_c8','','good_r7_c8.png','good_r7_c9','','good_r7_c9.png','good_r7_c10','','good_r7_c10.png',1);"
              onmouseover="MM_swapImage('good_r3_c6','','good_r3_c6_f4.png','good_r4_c6','','good_r4_c6_f4.png','good_r4_c7','','good_r4_c7_f4.png','good_r5_c6','','good_r5_c6_f6.png','good_r5_c7','','good_r5_c7_f6.png','good_r5_c8','','good_r5_c8_f4.png','good_r6_c6','','good_r6_c6_f6.png','good_r7_c8','','good_r7_c8_f4.png','good_r7_c9','','good_r7_c9_f6.png','good_r7_c10','','good_r7_c10_f4.png',1);"/>
    </map>
    <map name="m_good_r8_c6" id="m_good_r8_c6">
        <area shape="poly"
              coords="37,95,-3,103,-31,94,-48,64,-59,22,-60,-9,-58,-33,-86,-47,-112,-56,-129,-75,-131,-111,-134,-135,-124,-141,-103,-166,-102,-175,-92,-170,-85,-170,-77,-171,-66,-177,-56,-177,-44,-177,-36,-177,-27,-177,-26,-174,-18,-167,-12,-176,-3,-173,6,-171,13,-168,20,-167,30,-166,33,-157,36,-145,39,-136,45,-126,49,-114,52,-102,57,-94,64,-90,75,-90,86,-88,93,-76,105,-46,94,1,83,34,70,60"
              href="<?= PROOT ?>game/story/africa" alt=""
              onmouseout="MM_swapImage('good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r5_c5','','good_r5_c5.png','good_r5_c6','','good_r5_c6.png','good_r5_c7','','good_r5_c7.png','good_r6_c4','','good_r6_c4.png','good_r6_c5','','good_r6_c5.png','good_r6_c6','','good_r6_c6.png','good_r8_c6','','good_r8_c6.png',1);"
              onmouseover="MM_swapImage('good_r5_c3','','good_r5_c3_f4.png','good_r5_c4','','good_r5_c4_f4.png','good_r5_c5','','good_r5_c5_f4.png','good_r5_c6','','good_r5_c6_f4.png','good_r5_c7','','good_r5_c7_f4.png','good_r6_c4','','good_r6_c4_f4.png','good_r6_c5','','good_r6_c5_f4.png','good_r6_c6','','good_r6_c6_f4.png','good_r8_c6','','good_r8_c6_f4.png',1);"/>
    </map>
    <map name="m_good_r8_c9" id="m_good_r8_c9">
        <area shape="poly"
              coords="155,143,139,142,107,134,53,117,37,97,24,65,21,28,0,11,3,-3,35,4,64,6,75,-3,88,-16,84,-35,82,-50,118,-45,149,-43,171,-28,182,67,176,90"
              href="<?= PROOT ?>game/story/australia" alt=""
              onmouseout="MM_swapImage('good_r7_c9','','good_r7_c9.png','good_r8_c9','','good_r8_c9.png',1);"
              onmouseover="MM_swapImage('good_r7_c9','','good_r7_c9_f4.png','good_r8_c9','','good_r8_c9_f4.png',1);"/>
    </map>
    <map name="m_good_r9_c3" id="m_good_r9_c3">
        <area shape="poly"
              coords="48,-543,54,-464,16,-382,-77,-326,-133,-281,-117,-246,-70,-211,-40,-175,-29,-108,-40,-30,-102,31,-107,77,-168,88,-217,8,-279,-146,-289,-215,-315,-269,-364,-348,-420,-353,-453,-375,-454,-417,-453,-465,-365,-497,-286,-535,-232,-576,-79,-579,38,-573"
              href="<?= PROOT ?>game/story/america" alt=""
              onmouseout="MM_swapImage('good_r2_c2','','good_r2_c2.png','good_r4_c2','','good_r4_c2.png','good_r4_c4','','good_r4_c4.png','good_r5_c2','','good_r5_c2.png','good_r5_c3','','good_r5_c3.png','good_r5_c4','','good_r5_c4.png','good_r6_c4','','good_r6_c4.png','good_r9_c3','','good_r9_c3.png',1);"
              onmouseover="MM_swapImage('good_r2_c2','','good_r2_c2_f4.png','good_r4_c2','','good_r4_c2_f4.png','good_r4_c4','','good_r4_c4_f6.png','good_r5_c2','','good_r5_c2_f4.png','good_r5_c3','','good_r5_c3_f6.png','good_r5_c4','','good_r5_c4_f8.png','good_r6_c4','','good_r6_c4_f6.png','good_r9_c3','','good_r9_c3_f4.png',1);"/>
    </map>
</div>
</div>


<footer class="footer text-center">
    <ul id="githubList">
        <li class="margins-githubList"><a id="documentationLink1" href="https://github.com/gotursix">Grigorean
                Valentin</a></li>
        <li class="margins-githubList"><a id="documentationLink2" href="https://github.com/ser13ban">Șerban Mihai</a>
        </li>
        <li class="margins-githubList"><a id="documentationLink3" href="https://github.com/teodorovicigavril">Teodorovici
                Gavril</a></li>
    </ul>
    <a class="padding-footer" id="documentationLink" href="<?= PROOT ?>home/documentation">Documentation</a>
    <small class="padding-footer">&copy; Copyright
        <script>document.write(new Date().getFullYear())</script>
        , Vanilla Team </small>
</footer>

<script>
    let mainNav = document.getElementById("js-menu");
    let navBarToggle = document.getElementById("js-navbar-toggle");
    navBarToggle.addEventListener("click", function () {
        mainNav.classList.toggle("active");
    });
</script>
</body>
</html>