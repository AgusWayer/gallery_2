function previewImage(input,imgCont){
	const inputFile = document.getElementById(`${input}`);
	const imageContainer = document.getElementById(`${imgCont}`)
	const file = inputFile.files[0]
	if(file){
		const reader = new FileReader()
		reader.onload = (e)=>{
			imageContainer.innerHTML = `<img src="${e.target.result}" class="image-preview"/>`
		}
		reader.readAsDataURL(file)
	}
}