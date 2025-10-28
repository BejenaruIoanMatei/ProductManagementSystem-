document.addEventListener("DOMContentLoaded", () => {
    const links = Array.from(document.querySelectorAll(".product-link"));
    console.log(links);    
    
    links.forEach(
        link => {
            link.addEventListener("click", async (event) => {
              event.preventDefault();
        
              try {
                const response = await fetch("/check_session", {
                  method: "GET",
                  credentials: "include"
                });
      
                const data = await response.json();
        
                if (data.authenticated) {
                  window.location.href = link.href;
                  console.log('user authenticated')
                } else {
                  alert("Please log in first");
                }
              } catch (error) {
                console.error("Eroare la verificare:", error);
              }
            });
        }
    );
});
  