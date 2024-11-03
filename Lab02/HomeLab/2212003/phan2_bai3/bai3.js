const resetForm = () => {
	document.getElementById("myform").reset();
}

const submitForm = () => {
	// Check first name and last name
	let completed = true;
	const len_fname = document.getElementById("fname").value.length;
	const len_lname = document.getElementById("lname").value.length;
	if (len_fname < 2 || len_fname > 30) {
		alert("Please enter first name has 2-30 characters")
		completed = false;
	}
	if (len_lname < 2 || len_lname > 30) {
		alert("Please enter last name has 2-30 characters")
		completed = false;
	}

	// Check email
	const email = document.getElementById("email").value;
	const first = email.split("@")[0];
	const last = email.split("@")[1];
	if (email.length == 0 || email.split("@").length != 2 || email.split("@")[1].split(".").length != 2) {
		alert("Please enter email according to the syntax <sth>@<sth>.<sth>");
		completed = false;
	} else if (first.split(".").length > 1) {
		alert("Please enter email according to the syntax <sth>@<sth>.<sth>");
		completed = false;
	} else if (last.split(".").length > 2 || last.split(".")[0].length == 0 || last.split(".")[1].length == 0) {
		alert("Please enter email according to the syntax <sth>@<sth>.<sth>");
		completed = false;
	}

	// Check password
	const len_password = document.getElementById("password").value.length;
	if (len_password < 2 || len_password > 30) {
		alert("Please enter password has 2-30 characters");
		completed = false;
	}

	//Check gender
	const male = document.getElementById("male").checked;
	const female = document.getElementById("female").checked;
	const other = document.getElementById("other").checked;
	if (!male && !female && !other) {
		alert("Please enter gender");
		completed = false;
	}

	//Check about
	const len_about = document.getElementById("about").value.length;
	if (len_about > 10000) {
		alert("Please enter about has a maximum of 10000 characters")
		completed = false;
	}
	if (completed == true)
		alert("Complete!");
	else alert("Please re-enter form again")
}

// Populate day dropdown
const daySelect = document.getElementById('day');
for (let i = 1; i <= 31; i++) {
	const option = document.createElement('option');
	option.value = i;
	option.textContent = i;
	daySelect.appendChild(option);
}

// Populate month dropdown
const monthSelect = document.getElementById('month');
const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
months.forEach((month, index) => {
	const option = document.createElement('option');
	option.value = index + 1;
	option.textContent = month;
	monthSelect.appendChild(option);
});

// Populate year dropdown
const yearSelect = document.getElementById('year');
const currentYear = new Date().getFullYear();
for (let i = 1920; i <= currentYear; i++) {
	const option = document.createElement('option');
	option.value = i;
	option.textContent = i;
	yearSelect.appendChild(option);
}