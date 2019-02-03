<div>
	<p>
	Dear {{ $bill->stay->guest->first_name }} {{ $bill->stay->guest->last_name }},<br>
	<br>
	For your stay in our hotel from {{ $bill->stay->check_in_time }}
	your bill is {{ $bill->amount }}<br>
	<br>
	Thank you for using our services
	</p>
</div>