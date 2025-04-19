document.addEventListener("DOMContentLoaded", () => {
  const saveButton = document.getElementById("save-button");
  const popup = document.getElementById("popup");
  const closeButton = document.querySelector(".close-button");
  const buttonVerification = document.getElementById("saveIcon");

  // Mostrar la ventana emergente al hacer clic en el botón "save-button"
  saveButton.addEventListener("click", () => {
    // Verificar si el botón tiene la clase "guardado"
    if (buttonVerification.classList.contains("guardado")) {
      return; // No hacer nada si ya está guardado
    }
    popup.style.display = "flex";
  });

  // Ocultar la ventana emergente al hacer clic en el botón de cerrar
  closeButton.addEventListener("click", () => {
    popup.style.display = "none";
  });

  // Ocultar la ventana emergente al hacer clic fuera del contenido
  window.addEventListener("click", (event) => {
    if (event.target === popup) {
      popup.style.display = "none";
    }
  });
});
