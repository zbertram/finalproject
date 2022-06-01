<!doctype html>
<html>
	<head>
		<title>Hebcal examples</title>
		
		<script type="text/javascript" src="hebcal/client/hebcal.js"></script>
		<style>
			body{
    background-color: pink;
    
    font-family: Arial, Helvetica, sans-serif;
    background-color: rgb(224, 168, 202);
    text-align: center;
  

}
form{
    padding: 70px 0;
    margin:auto;
    text-align: center;
    
  }
h1{
 color:rgb(85, 11, 85);
 size: 50px;
 text-align: center;
}

		</style>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<h1>Want to calculate your bar/bat mitzvah?</h1>
		<p>Use the calculator below!</p>
		<p>Some things to keep in mind: <li>
			You must select your gender as a girl comes of age at 12 and a boy at 13
		</li>
	<li>
		You must select whether or not you were born after sunset as the Jewish day begins at night
	</li></p>
		<select id="textstyle">
			<option value="s">Sfardit</option>
			<option value="a">Ashkenazis</option>
			<option value="h">עברית</option>
		</select>
		<div id="today">
			<h2>Today - Zmanim</h2>
			<span></span>
			<pre></pre>
			<div></div>
		</div>
		<div id="barmitzvah">
			<h2>Bar Mitzvah Calculator</h2>
			<input type="date" id="barmitzvah-date" /><br/>
			<label><input type="radio" name="barmitzvah-gender" id="barmitzvah-gender-m" value="m" checked="checked" /> Male</label>
			<label><input type="radio" name="barmitzvah-gender" id="barmitzvah-gender-f" value="m" /> Female</label><br/>
			<label><input type="radio" name="barmitzvah-location" id="barmitzvah-location-chul" value="chul" checked="checked" /> Diaspora</label>
			<label><input type="radio" name="barmitzvah-location" id="barmitzvah-location-il" value="il" /> Israel</label><br/>
			<label><input type="checkbox" name="barmitzvah-sunset" id="barmitzvah-sunset" value="sunset" /> After sunset?</label><br/>
			<input type="submit" value="Calculate" id="barmitzvah-calc" />
			<div id="barmitzvah-result"></div>
		</div>
		<div id="holidays">
			

		<script type="text/javascript">
var d = document, o, year, today;
Hebcal.events.on('ready', function() {
	year = new Hebcal();
	function load() {
		o = d.querySelector('#textstyle').value;
		today = year.find('today')[0];

		d.querySelector('#today span').innerHTML = today.toString(o) + '<br/>' + Hebcal.defaultCity;
		d.querySelector('#today pre').innerHTML = JSON.stringify(today.getZemanim(), null, '\t');
		d.querySelector('#today div').innerHTML = today.getSedra(o) + '<br/>' + today.holidays().map(function(h){return h.getDesc(o)}).join('<br/>');
	}
	load();

	d.querySelector('#textstyle').onchange = load;

	
		
	

	d.querySelector('#barmitzvah-calc').onclick = function(){
		var male = d.querySelector('#barmitzvah-gender-m').checked,
			il = d.querySelector('#barmitzvah-location-il').checked,
			sunset = d.querySelector('#barmitzvah-sunset').checked;
		var birthday = new Hebcal.HDate(d.querySelector('#barmitzvah-date').valueAsDate);
		if (sunset) {
			birthday = birthday.next();
		}
		var bm = new Hebcal.HDate(birthday).setFullYear(birthday.getFullYear() + 12 + male);
		bm.il = il;

		d.querySelector('#barmitzvah-result').innerHTML = 'Actual: ' + bm.toString(o) + ', ' + bm.greg().toDateString() + '<br/>' +
			'Shabbat: ' + bm.onOrAfter(6).toString(o) + ', ' + bm.onOrAfter(6).greg().toDateString() + '<br/>' +
			'Parsha: ' + bm.getSedra(o);
	};
}).on('almostZeman', function(zeman, time){
	alert('It is ' + ~~(time / 1000 / 60) + ' minutes until ' + zeman + '.');
});

		</script>
		<p><button onclick="location.href='main.php'">Main Page</button></p>
	</body>
</html>
