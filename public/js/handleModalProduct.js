const body = document.getElementById(`dark-body`);
    function showProductDetails() {
        const modal = document.getElementById(`product-modal`);
        console.log("diklik")
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        body.classList.remove('hidden');
        body.classList.add('fixed');
      }
      
      function closeModal() {
        const modal = document.getElementById(`product-modal`);
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        body.classList.remove('fixed');
        body.classList.add('hidden');
    }
