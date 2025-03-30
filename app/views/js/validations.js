document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registerForm");

  form.addEventListener("submit", (event) => {
    // Limpiar mensajes de error previos
    const errorElements = document.querySelectorAll(".error-message");
    errorElements.forEach((el) => el.remove());

    let hasErrors = false;

    // Validar nombre de usuario
    const username = document.getElementById("input_aka_reg");
    if (!validarUsername(username.value)) {
      mostrarError(
        username,
        "El nombre de usuario debe tener al menos 5 caracteres."
      );
      hasErrors = true;
    }

    // Validar fecha de nacimiento
    const fechaNacimiento = document.getElementById("input_fecN_reg");
    if (!validarFechaNacimiento(fechaNacimiento.value)) {
      mostrarError(fechaNacimiento, "Debes tener entre 18 y 90 años.");
      hasErrors = true;
    }

    // Validar correo electrónico
    const correo = document.getElementById("input_mail_reg");
    if (!validarCorreo(correo.value)) {
      mostrarError(correo, "El correo electrónico no es válido.");
      hasErrors = true;
    }

    // Validar contraseña
    const password = document.getElementById("input_pass_reg");
    if (!validarPassword(password.value)) {
      mostrarError(
        password,
        "La contraseña debe tener al menos 8 caracteres, incluyendo una mayúscula, una minúscula, un número y un carácter especial."
      );
      hasErrors = true;
    }

    if (hasErrors) {
      event.preventDefault(); // Detener el envío del formulario
    }
  });

  // Mostrar mensaje de error debajo del input
  function mostrarError(input, mensaje) {
    const error = document.createElement("div");
    error.className = "error-message";

    const errorText = document.createElement("p");
    errorText.textContent = mensaje;
    errorText.style.margin = "0";
    errorText.style.textAlign = "center";
    errorText.style.color = "red";

    error.appendChild(errorText);
    input.parentNode.appendChild(error);
  }

  // Validar nombre de usuario
  function validarUsername(username) {
    return username.length >= 5;
  }

  // Validar fecha de nacimiento
  function validarFechaNacimiento(fecha) {
    const hoy = new Date();
    const fechaNacimiento = new Date(fecha);

    if (fechaNacimiento > hoy) {
      return false;
    }

    const edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
    const mes = hoy.getMonth() - fechaNacimiento.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
      return edad - 1 >= 18 && edad - 1 <= 90;
    }

    return edad >= 18 && edad <= 90;
  }

  // Validar correo electrónico
  function validarCorreo(correo) {
    const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexCorreo.test(correo);
  }

  // Validar contraseña
  function validarPassword(password) {
    const regexPassword =
      /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regexPassword.test(password);
  }
});
