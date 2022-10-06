<html>
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>MAIAT</title>
	<style type="text/css">body {
			margin: 0;
			padding: 0;
			overflow: hidden;
			height: 100%; 
			max-height: 100%; 
			font-family:Sans-serif;
			line-height: 1.5em;
		}

		main {
			position: fixed;
			top: 100px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			left: 0; 
			right: 230px; /* Set this to the width of the right column */
			overflow: auto; 
			background: #fff;
		}
				
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100px; 
			overflow: hidden; /* Disables scrollbars on the header frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #98b2ce;
		}

		#footer {
			position: absolute;
			left: 0;
			bottom: 0;
			width: 100%;
			height: 50px; 
			overflow: hidden; /* Disables scrollbars on the footer frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #98b2ce;
		}
				
		#nav {
			position: absolute; 
			top: 100px; /* Set this to the height of the header */
			bottom: 50px; /* Set this to the height of the footer */
			right: 0; 
			width: 230px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #badbff; 		
		}
		
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		
		p {
			color: #555;
		}

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		
		nav ul a {
			color: darkgreen;
			text-decoration: none;
		}
				
		/*IE6 fix*/
		* html body{
			padding: 50px 0 50px 230px; /* Set the first value to the height of the header, the third value to the height of the footer, and last value to the width of the nav */
		}
		
		* html main{ 
			height: 100%; 
			width: 100%; 
		}
		.video {
			width:480px;
			margin-left:auto;
			margin-right:auto;
		}
		input[type="radio"].demo1 {
  display: none;
}
input[type="radio"].demo1 + label {
  padding: 0.3rem 0.5rem;
  border: 1px dashed #ccc;
}
input[type="radio"].demo1:checked + label {
  border: 1px solid #000;
}
	
	</style>
</head>
<body>
<header id="header">
<div class="innertube">
<h1>MAIAT</h1>

<h2>Mesure de l&#39;Acceptibilit&eacute; Sociale de l&#39;Intelligence Artificielle au Travail</h2>
</div>
</header>
<main>
<div class="innertube">
	<h2>Inscription</h2>
	<form method="POST" action="avecconnexion.php">
		<table>
			<tr>
				<td>
				<label for="mail">Mail : </label>
				<input type="email" placeholder="Votre mail" id="mail" name="mail"/>
				</td>
			</tr>
			<tr>
				<td>
				<label for="mail2">Confirmer votre mail : </label>
				<input type="email" placeholder="Votre mail de confrimation" id="mail2" name="mail2"/>
				</td>
			</tr>
			<tr>
				<td>
				<label for="motdepasse">Mot de passe : </label>
				<input type="password" placeholder="Votre mot de passe" id="motdepasse" name="motdepasse"/>
				</td>
			</tr>
		</table>
		<input type="submit" name="forminscription" value="Je m'inscris" />
			</form>
	

<p>&nbsp;</p> 
</main>

<nav id="nav">
<div class="innertube">
<h1>Menu</h1>

<p><button onclick="window.location.href = 'file:///C:/Users/salom/Downloads/MSR/site.html';">MAIAT</button><input name="critères" type="button" value="Les critères des risques sociaux" /> <input name="guide" type="button" value="Le guide de MAIAT" /> <input name="equipe" type="button" value="Equipe et partenaires" /><button onclick="window.location.href = 'file:///C:/Users/salom/Downloads/MSR/pagedidentification.html';">C&#39;est a vous</button></p>

<ul>
</ul>
</div>
</nav>

<footer id="footer">
<div class="innertube">
<p>Si vous souhaitez contacter notre &eacute;quipe, vous pouvez nous &eacute;crire &agrave; l&#39;adresse mail suivante : yann.ferguson@icam.fr</p>
</div>
</footer>
</body>
</html>