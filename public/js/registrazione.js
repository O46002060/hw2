function checkName(event) {
    const input = event.currentTarget;

    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.parentNode.classList.add('errorj');
    }

}


function jsonCheckUsername(json) {
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errorj');
    } else {
        document.querySelector('.username span').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }

}

function jsonCheckEmail(json) {
    
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
    } else {
        document.querySelector('.email span').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }

}


function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}


function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.parentNode.classList.add('errorj');
        formStatus.username = false;
    } else {
        fetch("register"+"/username/"+encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }    
}


function checkEmail(event) {
    const emailInput = document.querySelector('.mail input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.mail span').textContent = "Email non valida";
        document.querySelector('.mail').classList.add('errorj');
        formStatus.email = false;
    } else {
        fetch("register" +"/email/"+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}


function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
        document.querySelector('.password span').textContent = "Caratteri password insufficienti";
        formStatus.password = false;
    }
}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.password1 input');
    if (formStatus.password1 = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.password1').classList.remove('errorj');
    } else {
        document.querySelector('.password1').classList.add('errorj');
        document.querySelector('.password1 span').textContent = "Le password non coincidono";
        formStatus.password1 = false;
    }
}


const link = document.querySelector('#menu');
link.addEventListener('click', menu);
console.log('link');

function menu(event) {
  const menu2 = event.currentTarget;
  const link = document.querySelector('.hidden3');
  console.log(link)
  console.log(menu2)

  link.classList.remove('hidden3')
  link.classList.add('links2')

  document.body.classList.add('no-scroll');

  const exit= document.querySelector('.links2 img');
  exit.addEventListener('click', exitF);
}


function exitF(event) {
  const link = document.querySelector('.links2');
  link.classList.remove('links2')
  link.classList.add('hidden3')
  document.body.classList.remove('no-scroll');
}


const formStatus = {'upload': true};

document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.mail input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.password1 input').addEventListener('blur', checkConfirmPassword);