document.getElementById('payment-method').addEventListener('change', function() {
  
  const creditCardInfo = document.getElementById('credit-card-info');
  
  
  if (this.value === 'credit-card') {
    creditCardInfo.classList.remove('hidden');
  } else {
    creditCardInfo.classList.add('hidden');
  }
});

document.getElementById('payment-method').addEventListener('change', function() {
  
  const Onlinepaymentinfo = document.getElementById('Online-payment-info');
  
  if (this.value === 'Online-payment') {
    Onlinepaymentinfo.classList.remove('hidden1');
  } else {
    Onlinepaymentinfo.classList.add('hidden1');
  }
});






document.getElementById('paymentForm').addEventListener('submit', function(event) {
  event.preventDefault();
  alert('Payment Submitted Successfully!');
  // Add actual payment processing here (like an API call to a payment gateway)
});
