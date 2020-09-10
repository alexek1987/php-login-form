
const email = document.getElementById('email')
const email_repeated = document.getElementById('email_repeated')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')
var regexEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;

form.addEventListener('submit', (e) => {
  let messages = []

  if (email.value == '' || email.value === null)
  {
    messages.push('Email cannot be blank')
  }

  else if (regexEmail.test(email.value)) {
  } else {
    alert("Mmh 🤔 seems like you didn't enter a valid email. ")
    e.preventDefault()
  }

  if (email.value != email_repeated.value)  {
    messages.push('Emails do not match')
  }

  if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join (', ')
  }
});

