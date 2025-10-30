document.addEventListener("DOMContentLoaded", () => {
  const editLinks = Array.from(document.querySelectorAll(".edit-btn"));

  editLinks.forEach((link) => {
    link.addEventListener("click", async (event) => {
      event.preventDefault();

      try {
        const response = await fetch("/check_session", {
          method: "GET",
          credentials: "include",
        });

        const data = await response.json();

        if (data.authenticated) {
          console.log("user authenticated");
          window.location.href = link.href;
        } else {
          Swal.fire({
            icon: "warning",
            title: "Please log in first",
            text: "You need to be logged in to edit this product.",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
          });
        }
      } catch (error) {
        console.error("Error:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Authentication check failed!",
        });
      }
    });
  });

  const deleteForms = document.querySelectorAll(".delete-form");

  deleteForms.forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();

      try {
        const response = await fetch("/check_session", {
          method: "GET",
          credentials: "include",
        });

        const data = await response.json();

        if (!data.authenticated) {
          Swal.fire({
            icon: "warning",
            title: "Please log in first",
            text: "You must be logged in to delete this product.",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "OK",
          });
          return;
        }
        Swal.fire({
          title: "Are you sure?",
          text: "This action is permanent.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "Cancel",
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      } catch (error) {
        console.error("Error:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Authentication check failed!",
        });
      }
    });
  });
});


