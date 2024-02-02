const options = {
    method: 'GET',
    headers: {
      'X-RapidAPI-Key': '3d79abd4ebmsh3f50a75b6e93199p19ae4ajsn66bf7372885f',
      'X-RapidAPI-Host': 'exercisedb.p.rapidapi.com'
    }
  };
  
  fetch('https://exercisedb.p.rapidapi.com/exercises', options)
    .then(response => response.json())
    .then(data => {
      // Process the data
      displayData(data);
    })
    .catch(error => {
      // Handle any errors
      console.error('Error:', error);
    });
  
  function displayData(data) {
    // Get the container element
    const container = document.getElementById('apiDataContainer');
  
    // Create an empty string to store the HTML content
    let html = '';
  
    // Iterate over the data and generate HTML for each item
    data.slice(0,32).forEach(item => {
      html += `
      <div class="card-col">
        <img src="${item.gifUrl}" alt="${item.gifUrl}" id="gifUrl">
        <div class="desc">
          <h4>${item.target}</h4>
          <h2>${item.name}</h2>
          <p>${item.equipment}</p>
          <span class="timer"></span>
        </div>
        <button class="start-btn" onclick="startTimer(this, 30)">Start</button>
      </div>
    </div>
    `;
    });
  
    // Set the HTML content of the container
    container.innerHTML = html;
  }
  
  function startTimer(button, seconds) {
    // Disable the button to prevent multiple clicks
    button.disabled = true;
  
    // Get the parent card element
    const card = button.parentNode;
  
    // Zoom in the card
    card.classList.add('zoomed');
  
    let remainingSeconds = seconds;
    button.textContent = remainingSeconds;
  
    let timerId = setInterval(() => {
      remainingSeconds--;
  
      if (remainingSeconds >= 0) {
        button.textContent = remainingSeconds;
      } else {
        // Timer has finished, enable the button again
        button.disabled = false;
  
        // Clear the interval to stop the timer
        clearInterval(timerId);
  
        // Reset the button text
        button.textContent = 'Start';
  
        // Remove the zoom effect from the card
        card.classList.remove('zoomed');
      }
    }, 1000);
  }
  
  