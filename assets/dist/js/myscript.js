const flashData = $(".flash-data").data("flashdata");
const flashData1 = $(".flash-dataError").data("flashdatax");

if (flashData) {
	Swal.fire({
		title: "Data ",
		text: "Success " + flashData,
		icon: "success",
	});
}
if (flashData1) {
	Swal.fire({
		title: "Data ",
		text: "Error " + flashData1,
		icon: "error",
	});
}

$(".tombol-status").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Are you sure?",
		text: "data will be Active/Nonactive!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "YES!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$(".tombol-delete").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Are you sure?",
		text: "data will be deleted!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "YES!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

$(".tombol-resetpass").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");

	Swal.fire({
		title: "Are you sure?",
		text: "password will be reset to 123456 ?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "YES!",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});

