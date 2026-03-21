// Функція для відображення статусу
export function displayEnvStatus() {
  const statusDiv = document.createElement('div');
  statusDiv.id = 'env-status';
  statusDiv.style.cssText = 'position: fixed; bottom: 10px; right: 10px; padding: 5px 10px; border-radius: 5px; font-size: 12px;';
  
  const mode = import.meta.env.VITE_APP_STATUS;
  
  if (mode === 'development') {
    statusDiv.style.backgroundColor = '#4CAF50';
    statusDiv.style.color = 'white';
    statusDiv.textContent = '🔧 Dev Mode';
  } else {
    statusDiv.style.backgroundColor = '#2196F3';
    statusDiv.style.color = 'white';
    statusDiv.textContent = '🚀 Production';
  }
  
  document.body.appendChild(statusDiv);
}

// Автоматично викликати функцію
displayEnvStatus();