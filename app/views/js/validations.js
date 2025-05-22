document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");

  form.addEventListener("submit", (event) => {
    // Limpiar mensajes de error previos
    const errorElements = document.querySelectorAll(".error-message");
    errorElements.forEach((el) => (el.innerHTML = "")); // Limpiar, no eliminar

    let hasErrors = false;

    // Validar nombre(s)
    const nombre = document.getElementById("input_name_reg");
    if (!validarNombreApellido(nombre.value, 3, 50)) {
      mostrarError(nombre, "El nombre debe tener entre 3 y 50 letras.");
      hasErrors = true;
    }

    // Validar apellido paterno
    const apellidoPaterno = document.getElementById("input_apeP_reg");
    if (!validarNombreApellido(apellidoPaterno.value, 3, 50)) {
      mostrarError(
        apellidoPaterno,
        "El apellido paterno debe tener entre 3 y 50 letras."
      );
      hasErrors = true;
    }

    // Validar apellido materno
    const apellidoMaterno = document.getElementById("input_apeM_reg");
    if (!validarNombreApellido(apellidoMaterno.value, 3, 50)) {
      mostrarError(
        apellidoMaterno,
        "El apellido materno debe tener entre 3 y 50 letras."
      );
      hasErrors = true;
    }

    // Validar nombre de usuario
    const username = document.getElementById("input_aka_reg");
    if (!validarUsername(username.value)) {
      mostrarError(
        username,
        "El nombre de usuario debe tener entre 5 y 50 caracteres."
      );
      hasErrors = true;
    }

    // Validar fecha de nacimiento
    const fechaNacimiento = document.getElementById("input_fecN_reg");
    if (!validarFechaNacimiento(fechaNacimiento.value)) {
      mostrarError(
        fechaNacimiento,
        "Debes tener entre 18 y 90 años y la fecha debe ser válida."
      );
      hasErrors = true;
    }

    // Validar sexo
    const sexoMasculino = document.querySelector(
      'input[name="sexo"][value="masculino"]'
    );
    const sexoFemenino = document.querySelector(
      'input[name="sexo"][value="femenino"]'
    );
    if (!(sexoMasculino.checked || sexoFemenino.checked)) {
      mostrarError(sexoMasculino.parentNode.parentNode, "Selecciona un sexo.");
      hasErrors = true;
    }

    // Validar correo electrónico
    const correo = document.getElementById("input_mail_reg");
    if (!validarCorreo(correo.value)) {
      mostrarError(correo, "El correo electrónico no es válido.");
      hasErrors = true;
    }

    // Validar contraseña solo si no está vacía
    const password = document.getElementById("input_pass_reg");
    const isModificarPage = window.location.pathname.includes("modificar");
    if (!isModificarPage || (isModificarPage && password.value.trim() !== "")) {
      if (!validarPassword(password.value)) {
        mostrarError(
          password,
          "La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial."
        );
        hasErrors = true;
      }
    }

    if (hasErrors) {
      event.preventDefault(); // Detener el envío del formulario
    }
  });

  // Mostrar mensaje de error debajo del input
  function mostrarError(input, mensaje) {
    let errorDiv = input.parentNode.querySelector(".error-message");
    if (!errorDiv) {
      errorDiv = document.createElement("div");
      errorDiv.className = "error-message";
      input.parentNode.appendChild(errorDiv);
    }
    errorDiv.innerHTML = `<p style="margin:0;text-align:center;color:red;">${mensaje}</p>`;
  }

  // Validar nombre o apellido (mínimo y máximo de letras, contando espacios)
  function validarNombreApellido(valor, min, max) {
    // Elimina espacios al inicio y final, pero permite espacios internos
    const limpio = valor.trim();
    // Solo permite letras y espacios, pero cuenta la longitud total
    const soloLetrasEspacios = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u;
    return (
      limpio.length >= min &&
      limpio.length <= max &&
      soloLetrasEspacios.test(limpio)
    );
  }

  // Validar nombre de usuario
  function validarUsername(username) {
    return username.length >= 5 && username.length <= 50;
  }

  // Validar fecha de nacimiento
  function validarFechaNacimiento(fecha) {
    if (!fecha) return false;
    const partes = fecha.split("-");
    if (partes.length !== 3) return false;
    const anio = parseInt(partes[0], 10);
    const mes = parseInt(partes[1], 10) - 1;
    const dia = parseInt(partes[2], 10);
    const fechaNacimiento = new Date(anio, mes, dia);
    if (
      fechaNacimiento.getFullYear() !== anio ||
      fechaNacimiento.getMonth() !== mes ||
      fechaNacimiento.getDate() !== dia
    ) {
      return false; // Fecha inválida
    }
    const hoy = new Date();
    let edad = hoy.getFullYear() - anio;
    if (
      hoy.getMonth() < mes ||
      (hoy.getMonth() === mes && hoy.getDate() < dia)
    ) {
      edad--;
    }
    return edad >= 18 && edad <= 90;
  }

  // Validar correo electrónico
  function validarCorreo(correo) {
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;
    return regexCorreo.test(correo);
  }

  // Validar contraseña
  function validarPassword(password) {
    const regexPassword =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;
    return regexPassword.test(password);
  }
});
