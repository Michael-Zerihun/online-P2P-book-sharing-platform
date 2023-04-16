const toggleVisibility = document.getElementById('toggle')
const reToggleVisibility = document.getElementById('reToggle')
const emailDiv = document.getElementById('emailDiv')
const emailInput = document.getElementById('email')
const passDiv = document.getElementById('passDiv')
const passInput = document.getElementById('password')
const rePassDiv = document.getElementById('rePassDiv')
const rePassInput = document.getElementById('rePass')
const nameDiv = document.getElementById('nameDiv')
const nameInput = document.getElementById('name')
const dropDown = document.getElementById('myDropdown')
const focusThePage = document.getElementById('4545454')

if(focusThePage !== null){
    console.log('1')
    function focus(){
        // document.getElementById('4545454').scrollIntoView()
        // alert("oh no")
    }
}

if (toggleVisibility !== null) {
    toggleVisibility.addEventListener('click', (e) => {
        e.preventDefault()
        if (passInput.getAttribute('type') === 'password') {
            passInput.setAttribute('type', 'text')
            toggleVisibility.classList.add('btn-hide')
            toggleVisibility.classList.remove('btn-show')
        } else {
            passInput.setAttribute('type', 'password')
            toggleVisibility.classList.remove('btn-hide')
            toggleVisibility.classList.add('btn-show')
        }
    })
}
if (passInput !== null) {
    passInput.addEventListener('focus', () => {
        passDiv.classList.remove('border-gray-400')
        passDiv.classList.add('border-red-400')
    })
    passInput.addEventListener('focusout', () => {
        passDiv.classList.remove('border-red-400')
        passDiv.classList.add('border-gray-400')
    })
}
if (emailInput !== null) {
    emailInput.addEventListener('focus', () => {
        emailDiv.classList.remove('border-gray-400')
        emailDiv.classList.add('border-red-400')
    })
    emailInput.addEventListener('focusout', () => {
        emailDiv.classList.add('border-gray-400')
        emailDiv.classList.remove('border-red-400')
    })
}
if (nameInput !== null) {
    nameInput.addEventListener('focus', () => {
        nameDiv.classList.remove('border-gray-400')
        nameDiv.classList.add('border-red-400')
    })
    nameInput.addEventListener('focusout', () => {
        nameDiv.classList.add('border-gray-400')
        nameDiv.classList.remove('border-red-400')
    })
}
if (reToggleVisibility !== null) {
    reToggleVisibility.addEventListener('click', (e) => {
        e.preventDefault()
        if (rePassInput.getAttribute('type') === 'password') {
            rePassInput.setAttribute('type', 'text')
            reToggleVisibility.classList.add('btn-hide')
            reToggleVisibility.classList.remove('btn-show')
        } else {
            rePassInput.setAttribute('type', 'password')
            reToggleVisibility.classList.remove('btn-hide')
            reToggleVisibility.classList.add('btn-show')
        }
    })
}
if (rePassInput !== null) {
    rePassInput.addEventListener('focus', () => {
        rePassDiv.classList.remove('border-gray-400')
        rePassDiv.classList.add('border-red-400')
    })
    rePassInput.addEventListener('focusout', () => {
        rePassDiv.classList.remove('border-red-400')
        rePassDiv.classList.add('border-gray-400')
    })
}
if (dropDown !== null) {
    function myFunction() {
        dropDown.classList.toggle('hidden')
    }

    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName('dropdown-content')
            var i
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i]
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden')
                }
            }
        }
    }
}
