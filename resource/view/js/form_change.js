function imageUpload(){
    const form = document.getElementById('image')
    const image = document.getElementById('preview')

    let path = URL.createObjectURL(form.files[0])
    image.setAttribute('src',path)

}