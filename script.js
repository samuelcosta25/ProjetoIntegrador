function cadastrar() {
  let check = false;

  if (document.getElementById("checkbox").checked) {
    check = true
  }

  if (document.getElementById("confirmaPassword").value != document.getElementById("inputPassword").value) {
    alert("As senhas não coincidem!");
  } else if (document.getElementById("inputEmail").value == ''
    || document.getElementById("inputPassword").value == ''
    || document.getElementById("inputAddress").value == ''
    || document.getElementById("inputCity").value == ''
    || check == false) {
    alert("Preencha todos os campos!");

  }

}
function habilitaOption() {
  if (document.getElementById("inputEmail").value != ''
    && document.getElementById("inputPassword").value != ''
    && document.getElementById("inputAddress").value != ''
    && document.getElementById("inputCity").value != '') {
    document.getElementById("estado").removeAttribute("disabled");
    document.getElementById("stranger").removeAttribute("disabled");
  }

}

function entrar() {
  let check = false;

  if (document.getElementById("checkRobot").checked) {
    check = true
  }

  if (document.getElementById("email").value == ''
    || document.getElementById("password").value == ''
    || check == false) {
    alert("Preencha todos os campos!");
  }
}

function scrollDestaques() {
  var parteScroll = document.getElementById("destaques");
  parteScroll.scrollIntoView({ behavior: 'smooth' });
}
function addPetInput() {
  // Cria um novo elemento input
  var newInput = document.createElement("input");
  newInput.type = "text";
  newInput.className = "form-control";
  newInput.placeholder = "Nome do Pet";

  // Adiciona o novo input ao div com o id "petInputs"
  document.getElementById("petInputs").appendChild(newInput);
}

function inscrever() {
  var inscricao = document.getElementById("newsletter1");
}
