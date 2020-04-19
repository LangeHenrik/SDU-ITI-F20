
// WARNING

// this script should not be loaded using blocking (i.e. putting in in the middle of the HTML)
// instead please load this script as <script src="js/script.js" defer></script> within the <head>
// https://stackoverflow.com/questions/436411/where-should-i-put-script-tags-in-html-markup/24070373#24070373

// main ///////////////////////////////////////////////////////////////////////////////////////////


// upload /////////////////////////////////////////////////////////////////////////////////////////

function uploadPreview(input)
{

	// https://developer.mozilla.org/en-US/docs/Web/API/FileReader/readAsDataURL

	const preview = document.querySelector("img#preview");
	const file = input.files[0];
	const reader = new FileReader();

	// hide image preview and return if no input provided
	if (!file) {
		preview.style.display = "none";
		return;
	}

	// convert image file to base64 string
	reader.onload = () => {

		preview.style.display = "block";
		preview.src = reader.result;

	};

	// read file
	reader.readAsDataURL(file);

}