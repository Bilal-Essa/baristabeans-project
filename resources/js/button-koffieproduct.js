function selectOption(btn) {
    // Verwijder eerst 'selected' class van alle buttons
    var allBtns = document.querySelectorAll('.button-gram');
    allBtns.forEach(function (element) {
      element.classList.remove('button-gram.selected');
    });
  
    // Voeg 'selected' class toe aan de geklikte button
    btn.classList.add('button-gram.selected');
  }
  