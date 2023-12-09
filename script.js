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
  // Obtém o contêiner de inputs para pets
  var petInputsContainer = document.getElementById("petInputs");

  // Verifica a quantidade atual de inputs para pets
  var currentPetCount = petInputsContainer.getElementsByClassName("pet-input").length;

  // Limita a adição de pets a 10
  if (currentPetCount < 10) {
      // Cria um novo elemento div para conter o input e o botão
      var newPetContainer = document.createElement("div");
      newPetContainer.className = "pet-container";

      // Cria um novo elemento input
      var newInput = document.createElement("input");
      newInput.type = "text";
      newInput.className = "form-control pet-input";
      newInput.placeholder = "Nome do Pet " + (currentPetCount + 1);

      // Cria um novo botão "Excluir Pet"
      var deleteButton = document.createElement("button");
      deleteButton.type = "button";
      deleteButton.className = "btn btn-danger btn-sm";
      deleteButton.textContent = "Excluir Pet";
      deleteButton.addEventListener("click", function() {
          // Remove o contêiner do pet ao clicar no botão
          petInputsContainer.removeChild(newPetContainer);
      });

      // Adiciona o novo input e botão ao div com o id "petInputs"
      newPetContainer.appendChild(newInput);
      newPetContainer.appendChild(deleteButton);
      petInputsContainer.appendChild(newPetContainer);
  } else {
      // Exibe um alerta se o limite for atingido
      alert("Você atingiu o limite máximo de 10 pets.");
  }
}



function inscrever() {
  var inscricao = document.getElementById("newsletter1");
}
