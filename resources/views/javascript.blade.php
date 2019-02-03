<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	function addToList()
	{
		var select = document.getElementById('service_select');
		
		// list item za svaki servis
	    var li = document.createElement("li");
	    selectedValue = select.options[select.selectedIndex].value;
	    //li.textContent = selectedValue + ' ' +select.options[select.selectedIndex].text;
	    li.textContent = select.options[select.selectedIndex].text;

	    // text input za usluge
	    var inputService = document.createElement('input');
    	inputService.type = 'hidden';
	    inputService.name = 'service';
	    inputService.value = selectedValue;
	    li.appendChild(inputService);
	   
	    // number input za zeljenu kolicinu
	    var inputQuantity = document.createElement('input');
	    inputQuantity.type = 'number';
	    inputQuantity.name = 'quantity';
	    inputQuantity.value = 1;
	    //inputQuantity.onchange = function(){changeQuantity(this)};
	    li.appendChild(inputQuantity);

	    // button za uklanjanje servisa iz liste
	    var button = document.createElement("button");
	    button.innerHTML = 'Izbrisi';
	    button.onclick = function(){removeFromList(this)};
	    li.appendChild(button);

	    var lchosen = document.getElementById("list-chosen");
	    lchosen.appendChild(li)
	}

	function removeFromList(el)
	{
		var parent = el.parentNode;
		var remover = el.parentNode.parentNode;
		remover.removeChild(parent);
	}

	function changeQuantity(el)
	{
		var parent = el.parentNode;
		var changethis = parent.querySelector('input[name="services[]"]');
		var split = changethis.value.split(' ');
		var newvalue = split[0] + ' ' + el.value;
		changethis.value = newvalue;
	}

$(document).ready(function(){
	$('#stay-form').submit(function(){
		var services = [];
		var listitems = $('#list-chosen li');
		listitems.each(function(id, li){
			var service = {
				'id': $(this).children('input[name="service"]').val(),
				'quantity': $(this).children('input[name="quantity"]').val(),
				'pivot_id': $(this).children('input[name="pivot_id"]').val(),
			};
			services.push(service);
		});
		// data = {
		// 	'_method': $(this).children('input[name="_method"]').val(),
		// 	'_token':"",
		// 	'guest': $('#guest').children('option:selected').val(),
		// 	'room': $('#room').children('option:selected').val(),
		// 	'memo': $('#memo').val(),
		// 	'services': services
		// };
		var stringservices = JSON.stringify(services);
		$('#services-hidden').val(stringservices);

		return true;
	});
});
</script>