const signup = document.querySelector('input[type="submit"]');

var status;

signup.addEventListener('click', (e) => {
	e.preventDefault();
	// const formData = new FormData(document.querySelector('form'));
	const fname = document.querySelector('#fname');
	const lname = document.querySelector('#lname');
	const email = document.querySelector('#email');
	const password = document.querySelector('#password');
	const confirm_password = document.querySelector('#confirm_password');
	const data = new Object();
	data.fname = fname.value;
	data.lname = lname.value;
	data.email = email.value;
	data.password = password.value;
	data.confirm_password = confirm_password.value;

	const result = JSON.stringify(data);
	console.log(result);

	fetch('http://localhost/event-insider/api/signup.php', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: result
	})
		.then((res) => {
			status = res.status;
			return res.text();
		})
		.then((data) => {
			alert(data);
			if (status == 200) {
				location.href =
					'http://localhost/event-insider/frontend/homepage.php';
			}
		})
		.catch((err) => {
			console.log(err);
		});
});
