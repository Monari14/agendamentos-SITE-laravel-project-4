document.addEventListener("DOMContentLoaded", function() {
    const calendarInput = document.querySelector("#data");
    const calendarButton = document.querySelector("#calendarButton");
    const selectedDateSpan = document.querySelector("#selectedDate"); // Elemento para exibir a data selecionada
    const horaSelect = document.querySelector("#hora");
    const quadraSelect = document.querySelector("#quadra");

    // Inicializa o Flatpickr para a data
    const calendar = flatpickr(calendarInput, {
        dateFormat: "Y-m-d", // Formato compatível com o backend
        minDate: "today",
        locale: "pt",
        onChange: function(selectedDates, dateStr) {
            if (dateStr) {
                // Atualiza o texto do span com a data selecionada
                selectedDateSpan.textContent = `${dateStr}`;

                // Atualiza as quadras com base na data e hora selecionadas
                atualizarQuadras(dateStr, horaSelect.value);
            } else {
                selectedDateSpan.textContent = "Selecione uma data";
            }
        }
    });

    // Atualiza as quadras quando o horário é alterado
    horaSelect.addEventListener("change", function() {
        const dateStr = calendarInput.value; // Obtém a data selecionada
        const hora = horaSelect.value; // Obtém o horário selecionado

        if (dateStr && hora) {
            atualizarQuadras(dateStr, hora);
        }
    });

    // Função para atualizar as quadras indisponíveis
    function atualizarQuadras(data, hora) {
        if (data && hora) {
            fetch(`/dashboard/novo-agendamento/${data}/${hora}`)
                .then(response => response.json())
                .then(quadrasIndisponiveis => {
                    // Reseta as opções do select de quadras
                    const options = quadraSelect.querySelectorAll("option");
                    options.forEach(option => {
                        option.disabled = false; // Habilita todas as opções
                        option.style.color = ""; // Reseta a cor
                    });

                    // Desabilita as quadras indisponíveis
                    quadrasIndisponiveis.forEach(quadra => {
                        const option = quadraSelect.querySelector(`option[value="${quadra}"]`);
                        if (option) {
                            option.disabled = true; // Desabilita a opção
                            option.style.color = "red"; // Define a cor como vermelha
                        }
                    });
                })
                .catch(error => console.error("Erro ao buscar quadras indisponíveis:", error));
        }
    }

    // Abre o calendário ao clicar no botão
    calendarButton.addEventListener("click", function() {
        calendar.open();
    });
});
