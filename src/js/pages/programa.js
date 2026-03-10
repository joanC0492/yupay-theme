// Toggle course accordion
const toggleCourse = (header) => {
  console.log("toggleCourse", header);
  const item = header.parentElement;
  const wasActive = item.classList.contains("active");

  // Close all
  document
    .querySelectorAll(".course-item")
    .forEach((el) => el.classList.remove("active"));

  // Open clicked if it wasn't active
  if (!wasActive) {
    item.classList.add("active");
  }
};

const initAccordions = () => {
  const accordions = document.querySelectorAll(
    ".courses-accordion .course-header",
  );
  if (accordions.length === 0) return;
  accordions.forEach((header) => {
    header.addEventListener("click", () => toggleCourse(header));
  });
};

const toggleExpand = (id, btn) => {
  const content = document.getElementById(id);
  content.classList.toggle("expanded");
  btn.classList.toggle("expanded");
  btn.innerHTML = content.classList.contains("expanded")
    ? 'Leer menos <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>'
    : 'Leer más <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>';
};

const initReadMoreButton = () => {
  const readMoreBtn = document.querySelector(".read-more-btn");
  if (readMoreBtn) {
    readMoreBtn.addEventListener("click", () =>
      toggleExpand("aboutContent", readMoreBtn),
    );
  }
};

// ========================================
// VALIDACIONES DEL FORMULARIO
// ========================================

/**
 * Módulo de validaciones - Clean Code: Funciones puras y reutilizables
 */
const FormValidators = {
  /**
   * Valida que solo contenga letras, tildes, ñ, espacios, guion y apóstrofe
   * Máximo 60 caracteres
   */
  validateName: (value) => {
    if (value.length > 60) {
      return {
        isValid: false,
        message: "Máximo 60 caracteres permitidos.",
      };
    }
    const namePattern = /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s'\-]+$/;
    return {
      isValid: namePattern.test(value),
      message: "Solo se permiten letras, espacios, guion y apóstrofe.",
    };
  },

  /**
   * Valida DNI peruano (8 dígitos)
   */
  validateDNI: (value) => {
    const dniPattern = /^[0-9]{8}$/;
    return {
      isValid: dniPattern.test(value),
      message: "El DNI debe contener exactamente 8 dígitos.",
    };
  },

  /**
   * Valida celular peruano (9 dígitos, inicia con 9)
   */
  validatePhone: (value) => {
    const phonePattern = /^9[0-9]{8}$/;
    if (value.length !== 9) {
      return {
        isValid: false,
        message: "El celular debe tener 9 dígitos.",
      };
    }
    if (!value.startsWith("9")) {
      return {
        isValid: false,
        message: "El celular debe iniciar con 9.",
      };
    }
    return {
      isValid: phonePattern.test(value),
      message: "Ingrese un número de celular válido.",
    };
  },

  /**
   * Valida email con reglas específicas:
   * - Máximo 60 caracteres
   * - Debe contener exactamente un @
   * - No puede tener ñ ni espacios
   * - Antes del @ no debe comenzar ni terminar con caracteres especiales
   * - Después del @ debe tener al menos un punto
   */
  validateEmail: (value) => {
    // Verificar longitud máxima
    if (value.length > 60) {
      return {
        isValid: false,
        message: "Máximo 60 caracteres permitidos.",
      };
    }

    // Verificar que no contenga ñ o espacios
    if (/[ñÑ\s]/.test(value)) {
      return {
        isValid: false,
        message: "El correo no puede contener ñ ni espacios.",
      };
    }

    // Verificar que contenga exactamente un @
    const atCount = (value.match(/@/g) || []).length;
    if (atCount !== 1) {
      return {
        isValid: false,
        message: "El correo debe contener exactamente un @.",
      };
    }

    const [localPart, domainPart] = value.split("@");

    // Verificar parte local (antes del @)
    const localPattern =
      /^[a-zA-Z0-9._\-&][a-zA-Z0-9._\-&]*[a-zA-Z0-9._\-&]$|^[a-zA-Z0-9]$/;
    if (!localPattern.test(localPart)) {
      return {
        isValid: false,
        message:
          "El correo no debe comenzar ni terminar con caracteres especiales antes del @.",
      };
    }

    // Verificar parte del dominio (después del @)
    if (!domainPart.includes(".")) {
      return {
        isValid: false,
        message: "El correo debe tener un dominio válido (ej: @dominio.com).",
      };
    }

    // Patrón completo
    const emailPattern = /^[a-zA-Z0-9._\-&]+@[a-zA-Z0-9._\-]+\.[a-zA-Z]{2,}$/;
    return {
      isValid: emailPattern.test(value),
      message: "Ingrese un correo electrónico válido.",
    };
  },
};

/**
 * Muestra mensaje de error en el campo
 */
const showError = (fieldId, message) => {
  const errorElement = document.getElementById(`${fieldId}_error`);
  const inputElement = document.getElementById(fieldId);
  if (errorElement) {
    errorElement.textContent = message;
    errorElement.style.display = "block";
  }
  if (inputElement) {
    inputElement.classList.add("invalid");
  }
};

/**
 * Limpia mensaje de error del campo
 */
const clearError = (fieldId) => {
  const errorElement = document.getElementById(`${fieldId}_error`);
  const inputElement = document.getElementById(fieldId);
  if (errorElement) {
    errorElement.textContent = "";
    errorElement.style.display = "none";
  }
  if (inputElement) {
    inputElement.classList.remove("invalid");
  }
};

/**
 * Valida un campo específico
 */
const validateField = (fieldId, validator) => {
  const input = document.getElementById(fieldId);
  if (!input) return true;

  const value = input.value.trim();
  if (!value) {
    showError(fieldId, "Este campo es obligatorio.");
    return false;
  }

  const result = validator(value);
  if (!result.isValid) {
    showError(fieldId, result.message);
    return false;
  }

  clearError(fieldId);
  return true;
};

/**
 * Inicializa validaciones del formulario EDEX
 */
const initFormValidation = () => {
  const form = document.getElementById("contactForm");
  if (!form) return;

  // Configuración de validadores por campo
  const fieldValidators = {
    Name_First: FormValidators.validateName,
    Name_Last: FormValidators.validateName,
    SingleLine: FormValidators.validateDNI,
    PhoneNumber_countrycode: FormValidators.validatePhone,
    Email: FormValidators.validateEmail,
  };

  // Validación en tiempo real (blur)
  Object.keys(fieldValidators).forEach((fieldId) => {
    const input = document.getElementById(fieldId);
    if (input) {
      input.addEventListener("blur", () => {
        validateField(fieldId, fieldValidators[fieldId]);
        updateSubmitButtonState(); // Actualizar estado del botón
      });

      // Limpiar error al escribir y actualizar estado del botón
      input.addEventListener("input", () => {
        if (input.classList.contains("invalid")) {
          clearError(fieldId);
        }
        updateSubmitButtonState(); // Actualizar estado del botón
      });
    }
  });

  // Validación para checkbox de términos y condiciones
  const termsCheckbox = document.getElementById("DecisionBox1");
  if (termsCheckbox) {
    termsCheckbox.addEventListener("change", () => {
      if (termsCheckbox.checked) {
        clearError("DecisionBox1");
      }
    });
  }

  // Validación al enviar formulario
  form.addEventListener("submit", (e) => {
    let isFormValid = true;

    // Validar todos los campos
    Object.keys(fieldValidators).forEach((fieldId) => {
      const isValid = validateField(fieldId, fieldValidators[fieldId]);
      if (!isValid) {
        isFormValid = false;
      }
    });

    // Validar términos y condiciones
    const termsCheckbox = document.getElementById("DecisionBox1");
    if (termsCheckbox && !termsCheckbox.checked) {
      showError("DecisionBox1", "Debe aceptar las Políticas de Privacidad.");
      termsCheckbox.classList.add("invalid");
      isFormValid = false;
    } else if (termsCheckbox) {
      clearError("DecisionBox1");
    }

    if (!isFormValid) {
      e.preventDefault();
      // Scroll al primer error
      const firstError = form.querySelector(".invalid");
      if (firstError) {
        firstError.scrollIntoView({ behavior: "smooth", block: "center" });
        firstError.focus();
      }
    }
  });

  // Prevenir entrada de números en campos de nombre
  ["Name_First", "Name_Last"].forEach((fieldId) => {
    const input = document.getElementById(fieldId);
    if (input) {
      // Prevenir teclas inválidas
      input.addEventListener("keypress", (e) => {
        // Permitir solo letras, espacios, guion y apóstrofe
        const char = String.fromCharCode(e.which);
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s'\-]$/.test(char)) {
          e.preventDefault();
        }
      });

      // Validar al pegar
      input.addEventListener("paste", (e) => {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData(
          "text",
        );
        const cleanedText = pastedText.replace(
          /[^a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s'\-]/g,
          "",
        );
        input.value = cleanedText;
        updateSubmitButtonState(); // Actualizar estado del botón
      });
    }
  });

  // Prevenir entrada de letras en campos numéricos
  ["SingleLine", "PhoneNumber_countrycode"].forEach((fieldId) => {
    const input = document.getElementById(fieldId);
    if (input) {
      // Prevenir teclas inválidas
      input.addEventListener("keypress", (e) => {
        // Permitir solo números
        const char = String.fromCharCode(e.which);
        if (!/^[0-9]$/.test(char)) {
          e.preventDefault();
        }
      });

      // Validar al pegar
      input.addEventListener("paste", (e) => {
        e.preventDefault();
        const pastedText = (e.clipboardData || window.clipboardData).getData(
          "text",
        );
        const cleanedText = pastedText.replace(/\D/g, "");
        input.value = cleanedText;
        updateSubmitButtonState(); // Actualizar estado del botón
      });
    }
  });
};

/**
 * Verifica si un campo específico es válido
 */
const isFieldValid = (fieldId, validator) => {
  const input = document.getElementById(fieldId);
  if (!input) return false;

  const value = input.value.trim();
  if (!value) return false;

  const result = validator(value);
  return result.isValid;
};

/**
 * Verifica si todos los campos del formulario son válidos
 */
const areAllFieldsValid = () => {
  const fieldValidators = {
    Name_First: FormValidators.validateName,
    Name_Last: FormValidators.validateName,
    SingleLine: FormValidators.validateDNI,
    PhoneNumber_countrycode: FormValidators.validatePhone,
    Email: FormValidators.validateEmail,
  };

  // Verificar que todos los campos tengan valores válidos
  for (const [fieldId, validator] of Object.entries(fieldValidators)) {
    if (!isFieldValid(fieldId, validator)) {
      return false;
    }
  }

  return true;
};

/**
 * Actualiza el estado del botón de envío basándose en la validación completa
 */
const updateSubmitButtonState = () => {
  const submitBtn = document.querySelector(".btn-submit");
  const termsCheckbox = document.getElementById("DecisionBox1");

  if (!submitBtn || !termsCheckbox) return;

  // Habilitar solo si todos los campos son válidos Y el checkbox está marcado
  const isFormValid = areAllFieldsValid();
  const isTermsAccepted = termsCheckbox.checked;

  submitBtn.disabled = !(isFormValid && isTermsAccepted);
};

/**
 * Limpia todos los campos del formulario y resetea el estado
 */
const resetForm = () => {
  const form = document.getElementById("contactForm");
  if (!form) return;

  // Resetear el formulario completo
  form.reset();

  // Limpiar todos los errores visibles
  const errorElements = form.querySelectorAll(".error-message");
  errorElements.forEach((error) => {
    error.textContent = "";
    error.style.display = "none";
  });

  // Remover clases de 'invalid' de todos los inputs
  const inputs = form.querySelectorAll("input");
  inputs.forEach((input) => {
    input.classList.remove("invalid");
  });

  // Deshabilitar el botón de envío
  const submitBtn = document.querySelector(".btn-submit");
  if (submitBtn) {
    submitBtn.disabled = true;
  }
};

/**
 * Detecta cuando el usuario regresa desde la página de gracias
 * y limpia el formulario usando localStorage como indicador
 */
const initFormReset = () => {
  const checkAndResetForm = () => {
    // Verificar si el usuario viene desde la página de "gracias"
    const formWasSubmitted = localStorage.getItem("formSubmitted");

    if (formWasSubmitted === "true") {
      console.log("Detectado formulario enviado previamente, limpiando...");
      // Limpiar el formulario
      resetForm();

      // Eliminar el flag de localStorage
      localStorage.removeItem("formSubmitted");
    }
  };

  // Ejecutar al cargar la página
  checkAndResetForm();

  // También ejecutar cuando la página se muestre desde el caché (botón atrás)
  window.addEventListener("pageshow", (event) => {
    checkAndResetForm();
  });
};

const initCheckboxSubmit = () => {
  const checkbox = document.getElementById("DecisionBox1");
  const submitBtn = document.querySelector(".btn-submit");

  if (checkbox && submitBtn) {
    checkbox.addEventListener("change", () => {
      updateSubmitButtonState();
    });
  }
};

export const initProgramaPage = () => {
  initAccordions();
  initReadMoreButton();
  initFormValidation();
  initCheckboxSubmit();
  initFormReset(); // Detecta cuando el usuario regresa y limpia el formulario
};
