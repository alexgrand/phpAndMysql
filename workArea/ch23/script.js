var number = document.querySelector('#first_name');
var submit = document.querySelector('button');
var console = document.querySelector('#webConsole');

function isPrime(n) {
	if (n===1) {
		return false;
	}
	for (var d = 2; d*d<=n; d++) {
		if (n%d === 0) {
			return false;
		}
	}
}

submit.addEventListener('click',function () {
	
});
