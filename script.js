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
    deleteButton.addEventListener("click", function () {
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
  var emailInput = document.getElementById("newsletter1");
  var email = emailInput.value;

  if (!validateEmail(email)) {
    alert("Por favor, insira um endereço de email válido.");
    return;
  }

  enviarParaServidor(email);
}

function validateEmail(email) {
  var regex = /\S+@\S+\.\S+/;
  return regex.test(email);
}

function enviarParaServidor(email) {
  fetch('testeEmail.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ email: email }),
  })
    .then(response => response.json())
    .then(data => {
      alert(data.message);

      // Limpar o conteúdo do campo de texto após a inscrição bem-sucedida
      document.getElementById("newsletter1").value = '';
    })
    .catch((error) => {
      console.error('Erro:', error);
    });
}

function buscarEndereco() {
  var cep = document.getElementById("inputCEP").value;

  // Verifica se o CEP tem o formato válido (apenas números)
  if (/^\d{8}$/.test(cep)) {
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
      .then(response => response.json())
      .then(data => {
        if (!data.erro) {
          // Preenche os campos de endereço e cidade
          document.getElementById("address").value = data.logradouro || '';
          document.getElementById("inputCity").value = data.localidade || '';
          document.getElementById("inputState").value = data.uf || '';
        } else {
          alert("CEP não encontrado.");
        }
      })
      .catch(error => {
        console.error('Erro na busca do CEP:', error);
      });
  } else {
    alert("Formato de CEP inválido. Informe apenas os números.");
  }
}

function mostrarAlerta(mensagem) {
  alert(mensagem);
}


