
const email = document.getElementById('email')
const email_repeated = document.getElementById('email_repeated')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')


form.addEventListener('submit', (e) => {
let messages = []
if (email.value === '' || email.value === null) {
  messages.push('Email cant be blank')
}

if (messages.length > 0){
  e.preventDefault()
  errorElement.innerText = messages.join (', ')
}
})