const login = document.querySelector('input[type="submit"]');

var status;

login.addEventListener('click', (e) => {
	e.preventDefault();
	// const formData = new FormData(document.querySelector('form'));
	const email = document.querySelector('#email');
	const password = document.querySelector('#password');
	const data = new Object();
	data.email = email.value;
	data.password = password.value;

	const result = JSON.stringify(data);
	console.log(result);

	fetch('http://localhost/event-insider/api/login.php', {
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
