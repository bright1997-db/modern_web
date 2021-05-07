const logout = document.querySelector('#logout');

logout.addEventListener('click', () => {
	fetch('http://localhost/event-insider/api/logout.php', {
		method: 'POST'
	})
		.then((res) => {
			location.href = res.url;
		})
		.catch((err) => console.log(err));
});
