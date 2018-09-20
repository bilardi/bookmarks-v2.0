<?php

 $revised=date('d-m-Y');
 $stat="<!-- Inizio Codice Shinystat --><script type='text/javascript' language='JavaScript' src='https://codice.shinystat.com/cgi-bin/getcod.cgi?USER=bilardi'></script><noscript><a href='http://www.shinystat.com' target='_top'><img src='https://www.shinystat.com/cgi-bin/shinystat.cgi?USER=bilardi' alt='Free web counters' border='0'/></a></noscript><!-- Fine Codice Shinystat -->";
 $baby="<a href='https://alessandra.bilardi.net/html/michael.html' target='baby'><img src='https://alessandra.bilardi.net/image/michael/20070509090911.JPG' width='80' border='0' alt='MyBABY'/></a>";
 $home=$baby;
 $date="<script type='text/javascript' src='js/date.js'></script>";
 $banner="<a href='http://www.linkedin.com/in/bilardi' ><img src='https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/linkedin.gif' width='120' height='30' border='0' alt='View my profile on LinkedIn'/></a>&nbsp;<a href='http://www.gimp.org'><img src='https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/gimp.org.gif' border='0' alt='gimp.org' /></a>&nbsp;<a href='http://www.getfirefox.it'><img src='https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/firefox2.png' border='0' alt='Firefox 2' /></a>";
 $w3c="<a href='http://validator.w3.org/check?uri=referer'><img src='https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/xhtml.gif' alt='Valid XHTML 1.0 Transitional' border='0'/></a><br/><a href='http://jigsaw.w3.org/css-validator/check/referer'><img src='https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/css.gif' alt='Valid CSS!' border='0' /></a><br/>".$stat;  
 $banner=$w3c;
 $submenu="";
 $cssf="
a:link {
	text-decoration:none; 
	font-variant:normal;
	color:#00cc00
}
a:visited {
        text-decoration:none;
	color:#00cc00
}
a:hover {
        text-decoration:none;
	color:#ffff00
}
body {
	background-image:url('https://s3-eu-west-1.amazonaws.com/cdn.bilardi.net/bookmarks-v1.0/index/sfondo.jpg');
	background-repeat:repeat;
	background-position:center left;
	background-attachment:fixed;
	text-align:left;
	font-weight:bold;
	font-size:large;
	font-family: Geneva;
	color:white
}
table.top {
	border-collapse:separate;
	border-spacing:0
}
td.top {
	text-align:right
}
td.img {
	text-align:left;
	width:100px;
}
td.banner {
	text-align:center;
	width:100px;
}
p.date {
	margin:0 0 0 15px;
}
div.top {
	background-color:navy; 
	position:absolute;
	left:15px;
	top:15px;
	width:880px;
	height:600px
}
div.menu {
	width:205px;
	height:350px;
	font-variant:small-caps
}
span.w {
	font-size:medium
}
span.y {
	font-size:medium;
	color:#ffff00
}
.spanstyle {
	 position:absolute; VISIBILITY: hidden
}";

 $nb=array(); $id=array('i','a','b','c','d');
 $file="html/bookmarks.html"; $io=fopen($file,'r'); $m=-1; $n=1; $i=0;
 $data=fread($io,filesize($file)); $l=explode("\n",$data); #$l=split(/\n/,$data); 
 for ($p=0;$p<count($l);$p++) {
    if (stristr($l[$p],'<DL>')) {#if ($l=~/<DL>/) { 
	$m++; $i++; $n=$m; array_push($nb,$m);}#new menu
    if (preg_match("/<DT><H3\s/",$l[$p])) {#if ($l=~/<DT><H3\s/) {
	$label=preg_replace("/<DT><H3\s[^><]+>([^<]+)<\/H3>/","$1",$l[$p]);
	$label=preg_replace("/\'/","",$label); $e=$m+1; 
	if (preg_match("/Bookmarks\sToolbar\sFolder/",$label)) {$label="Home"; $menuid=$e; $menu[$n].="<a onmouseover=\"showit($e)\">$label</a><br/>";
	} else {$menu[$n].="<a onmouseover=\"showit($e,$i)\">$label</a><br/>";}
    }#label of new menu
    if (preg_match("/<DT><A\s/",$l[$p])) {#if ($l=~/<DT><A\s/) {
	$link=preg_replace("/<DT><A\sHREF=\"([^\s]+)\"\s[^><]+>[^<]+<\/A>/","$1",$l[$p]);
	$label=preg_replace("/<DT><A\sHREF=\"[^\s]+\"\s[^><]+>([^<]+)<\/A>/","$1",$l[$p]);
	$label=preg_replace("/\'/","",$label);
	if (preg_match("/MyInfo/",$label)) {
		$menu[$m].="<a onmouseover=\"showit(0,2)\">$label</a><br/>";
	} else {$menu[$m].="<a href=\\\"$link\\\">$label</a><br/>";}
    }#label of link
    if (preg_match("/<\/DL>/",$l[$p])) {#if ($l=~/<\/DL>/) {
	array_pop($nb); $n=$nb[count($nb)-1]; $i--;}#end menu
 }#end for ($p=0;$p<count($l);$p++)
 fclose($io);
 $menuz=$menu[0];
 $menu[0]="<a href=\"http://www.linkedin.com/in/bilardi\" target=\"curriculum\" >Alessandra Bilardi</a><br/><span class=\"y\">from 2008: PhD in bioinformatics</span><br/><span class=\"w\">2004-2007: doctorate in biotechnology</span><br/><span class=\"y\">2002-2003: Biologist in mol. biology</span><br/><span class=\"w\">from 1999: Trainer swim [FIN]</span><br/><span class=\"y\">1997-2002: laurea in biological sciences</span><br/><span class=\"w\">known principals so, languages and softwares</span><br/><hr/><span class=\"y\">First Updated: 12-02-2001</span><br/><span class=\"w\">Last Updated: ".$revised."</span>";
 //$menu[$menuid]="";
 $babylon="<form name=\"onlineForm\" onsubmit=\"javascript:return online_info();\" action=\"\"><a href=\"http://online.babylon.com/combo/index.html\" target=\"new\">Babylon</a><br/><input type=\"text\" size=\"20\" name=\"word\" value=\"\"/><br/><select name=\"lang\" class=\"onlineinput\">        	<option value=\"\">All languages</option>        <option value=\"0\">English</option>        <option value=\"1\">French</option>        <option value=\"2\">Italian</option>        <option value=\"3\">Spanish</option>        <option value=\"4\">Dutch</option>        <option value=\"5\">Portuguese</option>       <option value=\"6\">German</option>        <option value=\"7\">Russian</option>        <option value=\"8\">Japanese</option>        <option value=\"9\">Chinese (T)</option>        <option value=\"10\">Chinese (S)</option>        <option value=\"11\">Greek</option>        <option value=\"12\">Korean</option>        <option value=\"13\">Turkish</option>        <option value=\"14\">Hebrew</option>        <option value=\"15\">Arabic</option>        </select><input type=\"hidden\" name=\"layout\" value=\"combo.html\"/><input type=\"hidden\" name=\"n\" value=\"10\"/><input type=\"hidden\" name=\"list\" value=\"\"/><br/><input type=\"submit\" value=\"Go\"/></form>";
$ncbi="<form method=\"post\" action=\"http://www.ncbi.nlm.nih.gov/coreutils/dispatch.cgi\"><a href=\"http://www.ncbi.nlm.nih.gov/\" target=\"new\"/>NCBI<a/><br/><input type=\"text\" name=\"term\" size=\"20\"/><br/><select name=\"db\">        <option value=\"0\">PubMed</option>	<option value=\"500\">All Databases</option>	<option value=\"17\">NCBI Web Site</option>	<option value=\"00\">-------------</option>	<option value=\"1\">Protein</option>        <option value=\"2\">Nucleotide</option>	<option value=\"3\">Structure</option>	<option value=\"4\">Genome</option>	<option value=\"8\">Books</option>	<option value=\"23\">CancerChromosomes</option>	<option value=\"14\">Conserved Domains</option>	<option value=\"10\">3D Domains</option>	<option value=\"21\">Gene</option>	<option value=\"30\">Genome Project</option>	<option value=\"28\">GENSAT</option>	<option value=\"19\">GEO Profiles</option>	<option value=\"20\">GEO Datasets</option>	<option value=\"22\">HomoloGene</option>	<option value=\"15\">Journals</option>	<option value=\"18\">MeSH</option>	<option value=\"24\">NLM Catalog</option>	<option value=\"33\">OMIA</option>	<option value=\"6\">OMIM</option>	<option value=\"16\">PMC</option>	<option value=\"5\">PopSet</option>	<option value=\"29\">Probe</option>        <option value=\"25\">PubChem BioAssay</option>	<option value=\"26\">PubChem Compound</option>	<option value=\"27\">PubChem Substance</option>	<option value=\"13\">SNP</option>        <option value=\"7\">Taxonomy</option>	<option value=\"11\">UniGene</option>        	<option value=\"12\">UniSTS</option>  	</select><input type=\"hidden\" name=\"SITE\" value=\"NcbiHome\"/><input type=\"submit\" name=\"submit\" value=\"Go\"/></form>";
$google="<form name=\"gs\" method=\"get\" action=\"http://www.google.com/search\"><a href=\"http://www.google.com\" target=\"new\">Google</a><br/><input size=\"20\" name=\"q\" value=\"\"/><br/><input name=btnI type=submit value=\"I am Feeling Lucky\"><br/><input name=btnG type=submit value=\"Google Search\"><input type=\"hidden\" name=\"ie\" value=\"UTF-8\"/><input type=\"hidden\" name=\"oe\" value=\"UTF-8\"/><input name=\"hl\" type=\"hidden\" value=\"it\"/></form>";

 for ($i=0;$i<=$m;$i++) {
    $submenu.="submenu[$i]='$menu[$i]'\n";
 }#end for ($i=0;$i<=$m;$i++)
 $m++; $submenu.="submenu[$m]='$babylon'\n";
 $m++; $submenu.="submenu[$m]='$ncbi'\n";
 $m++; $submenu.="submenu[$m]='$google'\n";
		
 $bookmarks="
<table>
	<tr>
		<td>
			<div class='menu'>
				".$menuz."
			</div>
		</td>
		<td>
			<table>
				<tr>
					<td><div id='a' class='menu'></div></td>
					<td><div id='b' class='menu'></div></td>
					<td><div id='c' class='menu'></div></td>
					<td><div id='d' class='menu'></div></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
";

 $jsf="
var submenu=new Array()

".$submenu."

//Set delay before submenu disappears after mouse moves out of it (in milliseconds)
var delay_hide=500
var menuobj
var id=new Array('i','a','b','c','d')

function showit(which,where){
//if (which==".$menuid.") for (w=1;w<=4;w++) show(".$menuid.",w)	
 if (which==".$menuid.") {
  w=".$m." 
  show(".$menuid.",1)
  show(w--,2)	
  show(w--,3)
  show(w--,4)
 }
else show(which,where)
}

function show(which,where){
clear_delayhide()
where=id[where]
thecontent=(which==-1)? '' : submenu[which]
menuobj=document.getElementById? document.getElementById(where) : document.all? document.all.where : document.layers? document.dep1.document.dep2 : ''
if (document.getElementById||document.all)
menuobj.innerHTML=thecontent
else if (document.layers){
menuobj.document.write(thecontent)
menuobj.document.close()
}
}

function resetit(e){
if (document.all&&!menuobj.contains(e.toElement))
delayhide=setTimeout('showit(-1)',delay_hide)
else if (document.getElementById&&e.currentTarget!= e.relatedTarget&& !contains_ns6(e.currentTarget, e.relatedTarget))
delayhide=setTimeout('showit(-1)',delay_hide)
}

function clear_delayhide(){
if (window.delayhide)
clearTimeout(delayhide)
}

function contains_ns6(a, b) {
while (b.parentNode)
if ((b = b.parentNode) == a)
return true;
return false;
}

window.onload = function() {showit(".$menuid.",0)}
";

 $file="css/bookmarks.css_"; $io=fopen($file,'w'); fwrite($io,$cssf); fclose($io); 
 $file="js/menu.js_"; $io=fopen($file,'w'); fwrite($io,$jsf); fclose($io); 

 $html="<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<!--<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>-->
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
<head>
	<title>My BookMarks</title>
 	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<meta name='author' lang='it' content='Alessandra Bilardi' />
	<meta name='description' content='My BookMarks' />	
	<meta name='keywords' content='journal, assotiation, centre, group, istitute, database, engine, link, research, search, stem cell, unipd, zebrafish, mouse, rat, bacteria, phage, bioinformatic, analysis, sequence, secondary structure, tool, cribi, padova, university, padua, bilardi, tutorial, program, c, delphi, html, latex, linux, Mysql, perl, php, python, R, calendar, custom, custom calendar, photo, recurence' />
	<meta name='revised' content='Alessandra Bilardi,".$revised."' />
	<meta name='robots' content='all' />
	<link rel='stylesheet' type='text/css' href='css/bookmarks.css' />
	<script type='text/javascript' src='js/babylon.js'></script>
	<script type='text/javascript' src='js/menu.js'></script>
</head>
<body>
	<table class='top'>
		<tr>
			<td class='img'>".$home."</td>
			<td class='banner'>".$banner."</td>
			<td><p class='date'>".$date."</p></td>
		</tr>
                <tr>
			<td colspan='2'><hr/></td>
			<td></td>		
                </tr>
		<tr>
			<td colspan='3'>
				".$bookmarks."
			</td>
		</tr>
		<tr>
			<td colspan='3'>&nbsp;
			</td>
		</tr>
	</table>
</body>
</html>";

//                <tr>
//                        <td>".$babylon."</td>
//                        <td>".$ncbi."</td>
//                        <td>".$google."</td>
//                </tr>

 $file="html/bookmarks.html_"; $io=fopen($file,'w'); fwrite($io,$html); fclose($io); 
 echo $html;

?>







